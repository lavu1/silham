<?php

namespace App\Support;

use App\Models\CmsFragment;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Support\ViewErrorBag;
use ReflectionFunction;

class CmsTemplateImporter
{
    public function import(string $slug, bool $overwrite = false): array
    {
        $viewName = $this->resolveRouteViewTemplate($slug);

        if ($viewName === null || ! ViewFacade::exists($viewName)) {
            return [
                'ok' => false,
                'status' => 'missing-template',
                'message' => 'Unable to detect a Blade template for this page.',
            ];
        }

        if (! $overwrite) {
            $existing = CmsFragment::query()
                ->where('page_slug', $slug)
                ->where('fragment_key', 'body_html')
                ->first();

            if ($existing !== null && trim((string) $existing->content) !== '') {
                return [
                    'ok' => true,
                    'status' => 'skipped',
                    'message' => "Skipped {$slug}; body_html already has content.",
                ];
            }
        }

        $viewFactory = app('view');
        $originalErrors = $viewFactory->shared('errors');

        if (! $originalErrors instanceof ViewErrorBag) {
            $viewFactory->share('errors', new ViewErrorBag);
        }

        try {
            $viewInstance = view($viewName);
            $renderedSections = $viewInstance->renderSections();
            $content = array_key_exists('content', $renderedSections)
                ? (string) $renderedSections['content']
                : (string) $viewInstance->render();
        } catch (\Throwable $exception) {
            report($exception);

            return [
                'ok' => false,
                'status' => 'render-error',
                'message' => 'Could not render the Blade template.',
            ];
        } finally {
            $viewFactory->share('errors', $originalErrors);
        }

        CmsFragment::updateOrCreate(
            ['page_slug' => $slug, 'fragment_key' => 'body_html'],
            ['type' => 'html', 'content' => $content],
        );

        return [
            'ok' => true,
            'status' => 'imported',
            'message' => 'Blade template content imported into body_html.',
        ];
    }

    private function resolveRouteViewTemplate(string $slug): ?string
    {
        $route = Route::getRoutes()->getByName($slug);

        if (! $route) {
            return null;
        }

        $uses = $route->getAction('uses');

        if (! $uses instanceof \Closure) {
            return null;
        }

        try {
            $reflection = new ReflectionFunction($uses);
            $file = $reflection->getFileName();

            if (! is_string($file) || ! is_file($file)) {
                return null;
            }

            $startLine = max(1, $reflection->getStartLine());
            $endLine = max(1, $reflection->getEndLine());
            $lines = file($file, FILE_IGNORE_NEW_LINES) ?: [];
            $snippet = implode(PHP_EOL, array_slice($lines, $startLine - 1, ($endLine - $startLine) + 20));

            if (preg_match("/\breturn\s+view\(\s*['\"]([^'\"]+)['\"](\s*,[^\)]*)?\)/", $snippet, $matches)) {
                return $matches[1];
            }
        } catch (\Throwable $exception) {
            report($exception);
        }

        return null;
    }
}

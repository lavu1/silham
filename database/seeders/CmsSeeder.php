<?php

namespace Database\Seeders;

use App\Models\CmsFragment;
use App\Models\CmsPage;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class CmsSeeder extends Seeder
{
    /**
     * Run the CMS seeders.
     */
    public function run(): void
    {
        foreach (config('cms.global', []) as $key => $definition) {
            $settingPayload = [
                'value' => (string) ($definition['default'] ?? ''),
                'type' => $definition['type'] ?? 'text',
            ];

            if ((bool) ($definition['sync_default'] ?? false)) {
                SiteSetting::query()->updateOrCreate(['key' => $key], $settingPayload);
            } else {
                SiteSetting::query()->firstOrCreate(['key' => $key], $settingPayload);
            }
        }

        $definitions = config('cms.pages', []);

        foreach ($this->getFrontendRouteNames() as $slug) {
            if (! isset($definitions[$slug])) {
                $definitions[$slug] = [
                    'label' => $this->slugToLabel($slug),
                    'route_name' => $slug,
                    'meta' => [
                        'title' => $this->slugToTitle($slug),
                        'meta_title' => $this->slugToTitle($slug).' | '.config('app.name'),
                        'robots' => 'index,follow',
                    ],
                    'fragments' => [],
                ];
            }
        }

        foreach ($definitions as $slug => $definition) {
            if (! isset($definition['fragments']) || ! array_key_exists('body_html', $definition['fragments'])) {
                $definitions[$slug]['fragments']['body_html'] = [
                    'label' => 'Full page HTML',
                    'type' => 'html',
                    'default' => null,
                    'help' => 'Leave this blank to use the Blade template. Fill this to manage the full page in CMS.',
                ];
            }
        }

        foreach ($definitions as $slug => $config) {
            $meta = $config['meta'] ?? [];

            CmsPage::firstOrCreate(
                ['slug' => $slug],
                [
                    'label' => $config['label'] ?? $slug,
                    'title' => $meta['title'] ?? $slug,
                    'meta_title' => $meta['meta_title'] ?? '',
                    'meta_description' => $meta['meta_description'] ?? '',
                    'meta_keywords' => $meta['meta_keywords'] ?? null,
                    'canonical_url' => $meta['canonical_url'] ?? null,
                    'robots' => $meta['robots'] ?? 'index,follow',
                    'og_title' => $meta['og_title'] ?? $meta['meta_title'] ?? null,
                    'og_description' => $meta['og_description'] ?? $meta['meta_description'] ?? null,
                    'og_image' => $meta['og_image'] ?? null,
                    'sitemap_enabled' => true,
                ]
            );

            foreach ($config['fragments'] ?? [] as $key => $fragment) {
                $type = $fragment['type'] ?? 'text';
                $content = $fragment['default'] ?? '';
                $storedType = $type === 'textarea' ? 'text' : $type;
                if (! in_array($storedType, ['text', 'html', 'json', 'image'], true)) {
                    $storedType = 'text';
                }

                if ($storedType === 'json' && is_array($content)) {
                    $content = json_encode($content, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                } elseif ($storedType === 'text' && is_null($content)) {
                    $content = null;
                }

                $fragmentPayload = ['type' => $storedType, 'content' => $content];

                if ((bool) ($fragment['sync_default'] ?? false)) {
                    CmsFragment::query()->updateOrCreate(
                        ['page_slug' => $slug, 'fragment_key' => $key],
                        $fragmentPayload
                    );
                } else {
                    CmsFragment::query()->firstOrCreate(
                        ['page_slug' => $slug, 'fragment_key' => $key],
                        $fragmentPayload
                    );
                }
            }
        }
    }

    private function getFrontendRouteNames(): array
    {
        $names = [];

        foreach (Route::getRoutes()->getRoutes() as $route) {
            $routeName = $route->getName();
            if (! $routeName) {
                continue;
            }

            if (
                str_starts_with((string) $routeName, 'admin.')
                || str_starts_with((string) $routeName, 'filament.')
            ) {
                continue;
            }

            if (str_starts_with(ltrim($route->uri(), '/'), 'admin')) {
                continue;
            }

            if (in_array((string) $routeName, ['robots', 'sitemap', 'llms'], true) || str_ends_with((string) $routeName, '.alias')) {
                continue;
            }

            if (! in_array('GET', $route->methods(), true)) {
                continue;
            }

            $names[] = (string) $routeName;
        }

        return array_values(array_unique($names));
    }

    private function slugToLabel(string $slug): string
    {
        return Str::of($slug)
            ->replace(['.', '-', '_'], ' ')
            ->title()
            ->toString();
    }

    private function slugToTitle(string $slug): string
    {
        return $this->slugToLabel($slug);
    }
}

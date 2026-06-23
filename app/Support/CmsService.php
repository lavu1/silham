<?php

namespace App\Support;

use App\Models\CmsFragment;
use App\Models\CmsPage;
use App\Models\SiteSetting;

class CmsService
{
    /**
     * @var array<string, CmsPage|null>
     */
    private array $pageCache = [];

    /**
     * @var array<string, string|null>
     */
    private array $settingCache = [];

    public function getSetting(string $key, ?string $default = null): ?string
    {
        if (! array_key_exists($key, $this->settingCache)) {
            $this->settingCache[$key] = SiteSetting::getValue($key);
        }

        return $this->settingCache[$key] ?? $default;
    }

    public function setSetting(string $key, ?string $value = null, string $type = 'text'): void
    {
        SiteSetting::putValue($key, $value, $type);
    }

    public function getMeta(string $pageSlug, string $field, ?string $default = null): ?string
    {
        $page = $this->getPage($pageSlug);

        if (! $page) {
            return $default;
        }

        return $page->{$field} ?? $default;
    }

    public function getPage(string $pageSlug): ?CmsPage
    {
        if (! array_key_exists($pageSlug, $this->pageCache)) {
            $this->pageCache[$pageSlug] = CmsPage::query()->where('slug', $pageSlug)->first();
        }

        return $this->pageCache[$pageSlug];
    }

    public function getFragments(string $pageSlug): array
    {
        return CmsFragment::query()
            ->where('page_slug', $pageSlug)
            ->pluck('content', 'fragment_key')
            ->all();
    }

    public function getFragment(string $pageSlug, string $fragmentKey, mixed $default = null): mixed
    {
        return CmsFragment::getValue($pageSlug, $fragmentKey, $default);
    }

    public function getJsonFragment(string $pageSlug, string $fragmentKey, mixed $default = null): mixed
    {
        $content = CmsFragment::getValue($pageSlug, $fragmentKey);

        if (! is_string($content)) {
            return $default;
        }

        $decoded = json_decode($content, true);

        return json_last_error() === JSON_ERROR_NONE ? $decoded : $default;
    }

    public function setMeta(string $pageSlug, array $payload): CmsPage
    {
        return CmsPage::updateOrCreate(['slug' => $pageSlug], $payload);
    }

    public function setFragment(string $pageSlug, string $key, mixed $content, string $type = 'text'): CmsFragment
    {
        $normalized = is_array($content) ? json_encode($content, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) : (string) $content;

        $fragment = CmsFragment::updateOrCreate(
            [
                'page_slug' => $pageSlug,
                'fragment_key' => $key,
            ],
            [
                'type' => $type,
                'content' => $normalized,
            ]
        );

        return $fragment;
    }

    public function currentPageSlug(): string
    {
        return request()->route()?->getName() ?? request()->path();
    }

    public function currentMetaTitle(string $routeName, string $fallback): string
    {
        return $this->getMeta($routeName, 'meta_title', $fallback) ?? $fallback;
    }
}

<?php

use App\Support\CmsService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

if (! function_exists('cms_setting')) {
    function cms_setting(string $key, ?string $default = null): ?string
    {
        return app(CmsService::class)->getSetting($key, $default);
    }
}

if (! function_exists('cms_meta')) {
    function cms_meta(string $pageSlug, string $field, ?string $default = null): ?string
    {
        return app(CmsService::class)->getMeta($pageSlug, $field, $default);
    }
}

if (! function_exists('cms_fragment')) {
    function cms_fragment(string $pageSlug, string $fragmentKey, mixed $default = null): mixed
    {
        return app(CmsService::class)->getFragment($pageSlug, $fragmentKey, $default);
    }
}

if (! function_exists('cms_media_url')) {
    function cms_media_url(?string $value): ?string
    {
        if ($value === null || trim((string) $value) === '') {
            return $value;
        }

        $value = trim($value);

        if (Str::startsWith($value, ['http://', 'https://', '//', '/', 'data:', '#', 'mailto:', 'tel:'])) {
            return $value;
        }

        if (Str::startsWith($value, ['assets/', 'uploads/', 'storage/', 'favicon/', 'img/'])) {
            return asset($value);
        }

        return $value;
    }
}

if (! function_exists('cms_render_html')) {
    function cms_render_html(?string $html): string
    {
        if ($html === null || $html === '') {
            return '';
        }

        $html = preg_replace_callback(
            '/\\bsrc\\s*=\\s*([\'"])([^"\']+)\\1/i',
            static function (array $match) {
                $quote = $match[1];
                $src = cms_media_url($match[2]) ?: '';
                return 'src=' . $quote . $src . $quote;
            },
            $html
        );

        $html = preg_replace_callback(
            '/\\bhref\\s*=\\s*([\'"])([^"\']+)\\1/i',
            static function (array $match) {
                $value = trim((string) $match[2]);
                $quote = $match[1];

                if (Str::startsWith($value, ['http://', 'https://', '//', '/', '#', 'mailto:', 'tel:'])) {
                    return 'href=' . $quote . $value . $quote;
                }

                if (Route::has($value)) {
                    return 'href=' . $quote . route($value) . $quote;
                }

                return 'href=' . $quote . (cms_media_url($value) ?: $value) . $quote;
            },
            $html
        );

        $html = preg_replace_callback(
            '/url\\(\\s*([\'"]?)([^\'"\\)\\s]+)\\1\\s*\\)/i',
            static function (array $match) {
                $quote = $match[1] !== '' ? $match[1] : '"';
                $path = $match[2] ?? '';
                return 'url(' . $quote . (cms_media_url($path) ?: $path) . $quote . ')';
            },
            $html
        );

        return $html;
    }
}

if (! function_exists('cms_fragment_json')) {
    function cms_fragment_json(string $pageSlug, string $fragmentKey, mixed $default = null): mixed
    {
        return app(CmsService::class)->getJsonFragment($pageSlug, $fragmentKey, $default);
    }
}

if (! function_exists('cms_page_slug')) {
    function cms_page_slug(): string
    {
        return app(CmsService::class)->currentPageSlug();
    }
}

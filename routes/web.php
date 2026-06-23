<?php

use App\Http\Controllers\ContactController;
use App\Models\BlogPost;
use App\Models\CmsPage;
use App\Models\NewsEvent;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\View\Middleware\ShareErrorsFromSession;

Route::redirect('/home', '/')->name('home.alias');

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about-us', function () {
    return view('pages.about');
})->name('about');

Route::get('/blogs', function () {
    return view('pages.blog');
})->name('blog');

Route::get('/blogs/{blogPost}', function (BlogPost $blogPost) {
    abort_unless($blogPost->is_published, 404);

    return view('pages.blogs.show', compact('blogPost'));
})->name('blog.show');

Route::get('/contact-us', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');

Route::get('/events', function () {
    return view('pages.events_news');
})->name('events');

Route::get('/events/pecb-course', function () {
    if ($newsEvent = NewsEvent::query()->where('slug', 'pecb-course')->first()) {
        abort_unless($newsEvent->is_published, 404);

        return view('pages.eventsnews.dynamic.show', compact('newsEvent'));
    }

    return view('pages.eventsnews.pecb_course');
})->name('pecbCourse');

Route::get('/faqs', function () {
    return view('pages.faqs');
})->name('faqs');

Route::get('/services', function () {
    return view('pages.home');
})->name('services');

Route::get('/Outsourced-Data-Protection-Officer', function () {
    return view('pages.services_dpo');
})->name('services.dpo');

Route::get('/Data-Protection-Training', function () {
    return view('pages.services_dpt');
})->name('services.dpt');

Route::get('/Data-Protection-Consultancy', function () {
    return view('pages.services_dpc');
})->name('services.dpc');

Route::get('/Data-Protection-Auditor-Services', function () {
    return view('pages.services_dpas');
})->name('services.dpas');

Route::get('/Raising-Awareness-through-Data-Protection-Awareness-Workshops', function () {
    return view('pages.carasel.pageone');
})->name('carasel.one');

Route::get('/Building-Capacity-for-Compliance-Readiness-through-Advanced-Data-Protection-Training', function () {
    return view('pages.carasel.pagetwo');
})->name('carasel.two');

Route::get('/Achieving-Compliance-through-Outsourced-Data-Protection-Services', function () {
    return view('pages.carasel.pagethree');
})->name('carasel.three');

Route::get('/Demonstrating-Compliance-through-Data-Audits', function () {
    return view('pages.carasel.pagefour');
})->name('carasel.four');

Route::get('/Managing-Risk-through-Data-Protection-Impact-Assessments', function () {
    return view('pages.carasel.pagefive');
})->name('carasel.five');

Route::get('/Banking-and-Finance', function () {
    return view('pages.sectors.pageone');
})->name('sectors.one');

Route::get('/Pensions-and-Insurance', function () {
    return view('pages.sectors.pagetwo');
})->name('sectors.two');

Route::get('/Medical-and-Healthcare', function () {
    return view('pages.sectors.pagethree');
})->name('sectors.three');

Route::get('/Technology', function () {
    return view('pages.sectors.pagefour');
})->name('sectors.four');

Route::get('/Education', function () {
    return view('pages.sectors.pagefive');
})->name('sectors.five');

Route::get('/Non-Governmental-Organisations', function () {
    return view('pages.sectors.pagesix');
})->name('sectors.six');

Route::get('/news-events/data-governance-workshop', function () {
    if ($newsEvent = NewsEvent::query()->where('slug', 'data-governance-workshop')->first()) {
        abort_unless($newsEvent->is_published, 404);

        return view('pages.eventsnews.dynamic.show', compact('newsEvent'));
    }

    return view('pages.eventsnews.pageone');
})->name('dataGovernanceWorkshop');

Route::get('/news-events/trainers-workshop', function () {
    if ($newsEvent = NewsEvent::query()->where('slug', 'trainers-workshop')->first()) {
        abort_unless($newsEvent->is_published, 404);

        return view('pages.eventsnews.dynamic.show', compact('newsEvent'));
    }

    return view('pages.eventsnews.pagetwo');
})->name('trainersWorkshop');

Route::get('/news-events/press-release', function () {
    if ($newsEvent = NewsEvent::query()->where('slug', 'press-release')->first()) {
        abort_unless($newsEvent->is_published, 404);

        return view('pages.eventsnews.dynamic.show', compact('newsEvent'));
    }

    return view('pages.eventsnews.pagethree');
})->name('pressRelease');

Route::get('/news-events/data-protection-training-health-sector', function () {
    if ($newsEvent = NewsEvent::query()->where('slug', 'data-protection-training-health-sector')->first()) {
        abort_unless($newsEvent->is_published, 404);

        return view('pages.eventsnews.dynamic.show', compact('newsEvent'));
    }

    return view('pages.eventsnews.pagefour');
})->name('dataProtectionHealthSector');

Route::get('/news-events/{newsEvent}', function (NewsEvent $newsEvent) {
    abort_unless($newsEvent->is_published, 404);

    return view('pages.eventsnews.dynamic.show', compact('newsEvent'));
})->name('news-events.show');

$publicCmsPageEntries = static function (): array {
    $pageDefinitions = config('cms.pages', []);
    $cmsPages = CmsPage::query()->get()->keyBy('slug');

    foreach ($cmsPages as $slug => $cmsPage) {
        if (! isset($pageDefinitions[$slug])) {
            $pageDefinitions[$slug] = [
                'route_name' => $slug,
                'meta' => [
                    'meta_title' => $cmsPage->meta_title,
                    'meta_description' => $cmsPage->meta_description,
                    'robots' => $cmsPage->robots ?? 'index,follow',
                ],
            ];
        } elseif (! isset($pageDefinitions[$slug]['meta'])) {
            $pageDefinitions[$slug]['meta'] = [];
        }
    }

    $entries = [];
    foreach ($pageDefinitions as $slug => $definition) {
        $routeName = $definition['route_name'] ?? $slug;

        $route = Route::has($routeName) ? Route::getRoutes()->getByName($routeName) : null;
        if (! $route) {
            continue;
        }

        if (
            str_starts_with((string) $routeName, 'admin.')
            || str_starts_with((string) $routeName, 'filament.')
            || in_array((string) $routeName, ['robots', 'sitemap', 'llms'], true)
            || str_ends_with((string) $routeName, '.alias')
            || str_starts_with(ltrim($route->uri(), '/'), 'admin')
            || str_starts_with(ltrim($route->uri(), '/'), 'livewire')
            || count($route->parameterNames()) > 0
            || ! in_array('GET', $route->methods(), true)
        ) {
            continue;
        }

        $cmsPage = $cmsPages->get($slug);
        $sitemapEnabled = $cmsPage?->sitemap_enabled ?? true;
        $robots = $cmsPage?->robots ?? ($definition['meta']['robots'] ?? 'index,follow');

        if (! $sitemapEnabled || Str::contains((string) $robots, 'noindex')) {
            continue;
        }

        $updatedAt = $cmsPage?->updated_at?->toDateString() ?? now()->toDateString();
        $title = $cmsPage?->meta_title ?: ($definition['meta']['meta_title'] ?? $cmsPage?->title ?? $definition['label'] ?? $slug);
        $description = $cmsPage?->meta_description ?: ($definition['meta']['meta_description'] ?? '');

        $entries[] = [
            'loc' => route($routeName),
            'lastmod' => $updatedAt,
            'title' => html_entity_decode((string) $title, ENT_QUOTES, 'UTF-8'),
            'description' => html_entity_decode((string) $description, ENT_QUOTES, 'UTF-8'),
            'changefreq' => match (true) {
                (string) $routeName === 'home',
                str_starts_with((string) $routeName, 'blog'),
                str_starts_with((string) $routeName, 'data') => 'weekly',
                str_starts_with((string) $routeName, 'services'),
                str_starts_with((string) $routeName, 'carasel'),
                str_starts_with((string) $routeName, 'events') => 'monthly',
                default => 'yearly',
            },
            'priority' => match (true) {
                (string) $routeName === 'home' => '1.0',
                str_starts_with((string) $routeName, 'services') => '0.8',
                str_starts_with((string) $routeName, 'carasel'),
                str_starts_with((string) $routeName, 'sectors') => '0.7',
                default => '0.6',
            },
        ];
    }

    return $entries;
};

Route::get('/robots.txt', function () {
    $lines = [
        'User-agent: *',
        'Allow: /',
        'Disallow: /admin',
        'Disallow: /admin/',
        '',
        'User-agent: OAI-SearchBot',
        'Allow: /',
        'Disallow: /admin',
        'Disallow: /admin/',
        '',
        'User-agent: GPTBot',
        'Allow: /',
        'Disallow: /admin',
        'Disallow: /admin/',
        '',
        'User-agent: ChatGPT-User',
        'Allow: /',
        'Disallow: /admin',
        'Disallow: /admin/',
        '',
        'Sitemap: ' . url('/sitemap.xml'),
    ];

    return response(implode("\n", $lines) . "\n", 200)
        ->header('Content-Type', 'text/plain; charset=UTF-8')
        ->header('Cache-Control', 'public, max-age=3600');
})->withoutMiddleware([
    EncryptCookies::class,
    AddQueuedCookiesToResponse::class,
    StartSession::class,
    ShareErrorsFromSession::class,
    VerifyCsrfToken::class,
])->name('robots');

Route::get('/llms.txt', function () use ($publicCmsPageEntries) {
    $plain = static fn (?string $value): string => trim(
        preg_replace('/\s+/', ' ', html_entity_decode(strip_tags((string) $value), ENT_QUOTES, 'UTF-8'))
    );

    $siteName = $plain(cms_setting('site_name', config('app.name')));
    $summary = $plain(cms_meta('home', 'meta_description', 'Silham Consulting and Training Services provides data protection, privacy compliance, consultancy, training, and outsourced DPO services for organisations in Zambia.'));
    $email = $plain(cms_setting('contact_email', 'info@silhamconsulting.co.zm'));
    $phone = $plain(cms_setting('contact_phone', '+260 750 78 6820'));
    $address = $plain(cms_setting('contact_address', 'Plot 9698 Mitengo, Ndola Zambia'));

    $lines = [
        '# ' . $siteName,
        '',
        '> ' . $summary,
        '',
        'Silham Consulting and Training Services is a Zambia-based consultancy focused on data protection, privacy compliance, training, audits, impact assessments, and outsourced Data Protection Officer support.',
        '',
        'Contact: ' . implode(' | ', array_filter([$email, $phone, $address])),
        '',
        '## Primary Pages',
    ];

    foreach ($publicCmsPageEntries() as $entry) {
        $description = $plain($entry['description']);
        $lines[] = '- [' . $plain($entry['title']) . '](' . $entry['loc'] . ')' . ($description !== '' ? ': ' . $description : '');
    }

    $lines[] = '';
    $lines[] = '## Machine-Readable Files';
    $lines[] = '- [XML sitemap](' . url('/sitemap.xml') . '): Public indexable page URLs for search crawlers.';
    $lines[] = '- [Robots policy](' . url('/robots.txt') . '): Crawler access rules for public and admin paths.';

    return response(implode("\n", $lines) . "\n", 200)
        ->header('Content-Type', 'text/plain; charset=UTF-8')
        ->header('Cache-Control', 'public, max-age=3600');
})->withoutMiddleware([
    EncryptCookies::class,
    AddQueuedCookiesToResponse::class,
    StartSession::class,
    ShareErrorsFromSession::class,
    VerifyCsrfToken::class,
])->name('llms');

Route::get('/sitemap.xml', function () use ($publicCmsPageEntries) {
    $escape = static fn (string $value): string => htmlspecialchars($value, ENT_XML1 | ENT_COMPAT, 'UTF-8');
    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    foreach ($publicCmsPageEntries() as $url) {
        $xml .= '<url>';
        $xml .= '<loc>' . $escape($url['loc']) . '</loc>';
        $xml .= '<lastmod>' . $escape($url['lastmod']) . '</lastmod>';
        $xml .= '<changefreq>' . $escape($url['changefreq']) . '</changefreq>';
        $xml .= '<priority>' . $escape($url['priority']) . '</priority>';
        $xml .= '</url>';
    }
    $xml .= '</urlset>';

    return response($xml, 200)
        ->header('Content-Type', 'application/xml; charset=UTF-8')
        ->header('Cache-Control', 'public, max-age=3600');
})->withoutMiddleware([
    EncryptCookies::class,
    AddQueuedCookiesToResponse::class,
    StartSession::class,
    ShareErrorsFromSession::class,
    VerifyCsrfToken::class,
])->name('sitemap');

Route::get('/{cmsPage:slug}', function (CmsPage $cmsPage) {
    abort_unless($cmsPage->sitemap_enabled, 404);

    return view('pages.cms_page', compact('cmsPage'));
})->where('cmsPage', '^(?!admin|livewire|storage|assets|uploads|blogs|news-events|events).+')->name('cms.page');

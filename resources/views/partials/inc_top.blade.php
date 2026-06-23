@php
    $routeName = request()->route()?->getName() ?? 'home';
    $locale = str_replace('_', '-', app()->getLocale());
    $siteName = html_entity_decode(cms_setting('site_name', config('app.name')) ?: config('app.name'), ENT_QUOTES, 'UTF-8');
    $baseUrl = rtrim(url('/'), '/');

    $toAbsoluteUrl = static function (?string $value) {
        if ($value === null || trim($value) === '') {
            return null;
        }

        $value = trim($value);

        if (\Illuminate\Support\Str::startsWith($value, ['http://', 'https://'])) {
            return $value;
        }

        if (\Illuminate\Support\Str::startsWith($value, '//')) {
            return request()->getScheme() . ':' . $value;
        }

        return url($value);
    };

    $toAbsoluteMediaUrl = static function (?string $value) use ($toAbsoluteUrl) {
        if ($value === null || trim($value) === '') {
            return null;
        }

        return $toAbsoluteUrl(cms_media_url($value) ?: $value);
    };

    $cleanSchema = static fn (array $data): array => array_filter(
        $data,
        static fn ($value) => $value !== null && $value !== '' && $value !== []
    );
    $cleanText = static fn (?string $value, string $fallback = ''): string => trim(
        html_entity_decode($value ?: $fallback, ENT_QUOTES, 'UTF-8')
    );

    $rawMetaTitle = $cleanText(cms_meta($routeName, 'meta_title', null), $siteName);
    $metaTitle = \Illuminate\Support\Str::contains($rawMetaTitle, ['|', $siteName])
        ? $rawMetaTitle
        : $rawMetaTitle . ' | ' . $siteName;
    $metaDescription = $cleanText(cms_meta($routeName, 'meta_description', null), 'Data protection, privacy compliance, consultancy, and training services by Silham Consulting & Training Services.');
    $metaKeywords = $cleanText(cms_meta($routeName, 'meta_keywords', null), 'Silham, data protection, privacy, compliance, consultancy, training, Zambia');
    $robots = cms_meta($routeName, 'robots', 'index,follow') ?: 'index,follow';
    $robotsDirectives = \Illuminate\Support\Str::contains($robots, 'noindex')
        ? $robots
        : trim($robots . ', max-snippet:-1, max-image-preview:large, max-video-preview:-1', ', ');
    $canonicalUrl = $toAbsoluteUrl(cms_meta($routeName, 'canonical_url', null)) ?: url()->current();

    $ogTitle = $cleanText(cms_meta($routeName, 'og_title', null), $metaTitle);
    $ogDescription = $cleanText(cms_meta($routeName, 'og_description', null), $metaDescription);
    $ogImageUrl = $toAbsoluteMediaUrl(cms_meta($routeName, 'og_image', cms_setting('logo_path', 'assets/img/logo3.png')));
    $logoUrl = $toAbsoluteMediaUrl(cms_setting('logo_path', 'assets/img/logo3.png'));
    $contactEmail = cms_setting('contact_email', 'info@silhamconsulting.co.zm');
    $contactPhone = cms_setting('contact_phone', '+260 750 78 6820');
    $contactAddress = cms_setting('contact_address', 'Plot 9698 Mitengo, Ndola Zambia');
    $sameAs = array_values(array_filter([
        cms_setting('social_facebook'),
        cms_setting('social_twitter'),
        cms_setting('social_linkedin'),
        cms_setting('social_pinterest'),
    ], static fn ($url) => is_string($url) && trim($url) !== '' && trim($url) !== '#'));

    $organizationId = $baseUrl . '/#organization';
    $websiteId = $baseUrl . '/#website';

    $organizationSchema = $cleanSchema([
        '@type' => 'Organization',
        '@id' => $organizationId,
        'name' => $siteName,
        'url' => $baseUrl . '/',
        'logo' => $logoUrl ? [
            '@type' => 'ImageObject',
            'url' => $logoUrl,
        ] : null,
        'email' => $contactEmail,
        'telephone' => $contactPhone,
        'address' => $contactAddress ? [
            '@type' => 'PostalAddress',
            'streetAddress' => $contactAddress,
            'addressCountry' => 'ZM',
        ] : null,
        'sameAs' => $sameAs,
    ]);

    $websiteSchema = $cleanSchema([
        '@type' => 'WebSite',
        '@id' => $websiteId,
        'name' => $siteName,
        'url' => $baseUrl . '/',
        'publisher' => ['@id' => $organizationId],
        'inLanguage' => $locale,
    ]);

    $webPageSchema = $cleanSchema([
        '@type' => 'WebPage',
        '@id' => $canonicalUrl . '#webpage',
        'url' => $canonicalUrl,
        'name' => $rawMetaTitle,
        'description' => $metaDescription,
        'isPartOf' => ['@id' => $websiteId],
        'about' => ['@id' => $organizationId],
        'provider' => ['@id' => $organizationId],
        'primaryImageOfPage' => $ogImageUrl ? [
            '@type' => 'ImageObject',
            'url' => $ogImageUrl,
        ] : null,
        'inLanguage' => $locale,
    ]);

    $breadcrumbItems = [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Home',
            'item' => $baseUrl . '/',
        ],
    ];

    if ($routeName !== 'home') {
        $breadcrumbItems[] = [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => $cleanText(cms_meta($routeName, 'title', null), $rawMetaTitle),
            'item' => $canonicalUrl,
        ];
    }

    $schemaGraph = $cleanSchema([
        '@context' => 'https://schema.org',
        '@graph' => [
            $organizationSchema,
            $websiteSchema,
            $webPageSchema,
            [
                '@type' => 'BreadcrumbList',
                '@id' => $canonicalUrl . '#breadcrumb',
                'itemListElement' => $breadcrumbItems,
            ],
        ],
    ]);
@endphp

<title>{{ $metaTitle }}</title>
<meta name="description" content="{{ $metaDescription }}">
<meta name="keywords" content="{{ $metaKeywords }}">
<meta name="author" content="{{ $siteName }}">
<meta name="robots" content="{{ $robotsDirectives }}">
<meta name="googlebot" content="{{ $robotsDirectives }}">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#ffffff">

<link rel="canonical" href="{{ $canonicalUrl }}">
<link rel="sitemap" type="application/xml" href="{{ url('/sitemap.xml') }}" title="{{ $siteName }} sitemap">
<link rel="alternate" type="text/plain" href="{{ url('/llms.txt') }}" title="{{ $siteName }} LLM summary">

<meta property="og:type" content="website">
<meta property="og:locale" content="{{ $locale }}">
<meta property="og:title" content="{{ $ogTitle }}">
<meta property="og:description" content="{{ $ogDescription }}">
<meta property="og:url" content="{{ $canonicalUrl }}">
<meta property="og:site_name" content="{{ $siteName }}">
@if ($ogImageUrl)
<meta property="og:image" content="{{ $ogImageUrl }}">
<meta property="og:image:alt" content="{{ $ogTitle }}">
@endif

<meta name="twitter:card" content="{{ $ogImageUrl ? 'summary_large_image' : 'summary' }}">
<meta name="twitter:title" content="{{ $ogTitle }}">
<meta name="twitter:description" content="{{ $ogDescription }}">
@if ($ogImageUrl)
<meta name="twitter:image" content="{{ $ogImageUrl }}">
@endif

<script type="application/ld+json">{!! json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
<link rel="shortcut icon" href="{{ asset('favicon/114x114.png') }}">
<link rel="apple-touch-icon-precomposed" href="{{ asset('favicon/96x96.png') }}">

<!-- Google fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700%7CWork+Sans:400,500">

<!-- Icon fonts -->
<link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/all.css') }}">
<link rel="stylesheet" href="{{ asset('assets/fonts/themify-icons/css/themify-icons.css') }}">

<!-- Stylesheet -->
<link rel="stylesheet" href="{{ asset('assets/css/vendors.bundle.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/scss/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/scss/customize.css') }}">

@stack('head')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}">

    @include('partials.inc_top')
</head>

<body>

@include('partials.top_menu')


    @include('partials.menu')

@include('partials.header')

    @php
        $cmsBody = cms_fragment(cms_page_slug(), 'body_html', null);
        $hasCmsBody = is_string($cmsBody) ? trim($cmsBody) !== '' : $cmsBody !== null;
    @endphp

    @if ($hasCmsBody)
        {!! cms_render_html((string) $cmsBody) !!}
    @else
        @yield('content')
    @endif

@include('partials.inc_bottom')
@include('partials.footer')
@yield('scripts')
</body>

</html>

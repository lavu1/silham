<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="SILHAM CONSULTING &amp; TRAINING SERVICES">

    <title> @yield('page_title') | {{ config('app.name') }} </title>

    @include('partials.inc_top')
</head>

<body>

@include('partials.top_menu')


    @include('partials.menu')

@include('partials.header')

@yield('content')

@include('partials.inc_bottom')
@include('partials.footer')
@yield('scripts')
</body>

</html>

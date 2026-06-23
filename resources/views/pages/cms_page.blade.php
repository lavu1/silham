@extends('layouts.master')
@section('page_title', $cmsPage->meta_title ?: $cmsPage->title)
@section('content')
@php
    $body = cms_fragment($cmsPage->slug, 'body_html', '');
@endphp

    <div class="py-5 bg-cover text-white" data-dark-overlay="5" style="background:url({{ cms_media_url($cmsPage->og_image ?: 'assets/img/home/carousel/IMAGE07_12.jpg') }}) no-repeat">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2>{{ $cmsPage->title ?: $cmsPage->label }}</h2>
                </div>
                <div class="col-md-4">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">{{ $cmsPage->label ?: $cmsPage->title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    @if (filled($body))
                        {!! cms_render_html((string) $body) !!}
                    @else
                        <p>This page is ready for content.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

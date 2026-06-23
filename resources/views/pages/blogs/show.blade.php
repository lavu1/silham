@extends('layouts.master')
@section('page_title', $blogPost->meta_title ?: $blogPost->title)
@section('content')
    <div class="py-5 bg-cover text-white" data-dark-overlay="5" style="background:url({{ cms_media_url($blogPost->image ?: 'assets/img/home/carousel/IMAGE07_12.jpg') }}) no-repeat">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2>{{ $blogPost->title }}</h2>
                </div>
                <div class="col-md-4">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    @if ($blogPost->image)
                        <img class="rounded w-100 mb-4" src="{{ cms_media_url($blogPost->image) }}" alt="{{ $blogPost->title }}">
                    @endif
                    <p class="text-primary">
                        {{ optional($blogPost->published_at)->format('j M, Y') ?? $blogPost->created_at->format('j M, Y') }}
                        @if ($blogPost->author)
                            - by {{ $blogPost->author }}
                        @endif
                    </p>
                    <div class="lead">
                        {!! cms_render_html($blogPost->body ?: e($blogPost->excerpt ?? '')) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

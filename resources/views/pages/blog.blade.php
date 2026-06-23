@extends('layouts.master')
@section('page_title', 'Blogs')
@section('content')
@php
    $posts = \App\Models\BlogPost::query()
        ->published()
        ->orderByDesc('published_at')
        ->orderByDesc('created_at')
        ->paginate(9);
@endphp

    <div class="py-5 bg-cover text-white" data-dark-overlay="5" style="background:url({{ cms_media_url('assets/img/home/carousel/IMAGE07_12.jpg') }}) no-repeat">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Blog</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Blog</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="pt-5 paddingBottom-100">
        <div class="container">
            @if ($posts->isEmpty())
                <div class="text-center padding-y-60">
                    <h3>No blog posts published yet.</h3>
                    <p class="mb-0">Published blog posts will appear here automatically.</p>
                </div>
            @else
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-lg-4 col-md-6 marginTop-30">
                            <article class="card height-100p">
                                <div class="card-img">
                                    <a href="{{ $post->publicUrl() }}">
                                        <img class="rounded w-100" src="{{ cms_media_url($post->image ?: 'assets/img/home/carousel/IMAGE07_12.jpg') }}" alt="{{ $post->title }}">
                                    </a>
                                </div>
                                <div class="card-body px-0">
                                    @if ($post->category)
                                        <span class="text-primary">{{ $post->category }}</span>
                                    @endif
                                    <a href="{{ $post->publicUrl() }}" class="h4 my-2">
                                        {{ $post->title }}
                                    </a>
                                    <p>
                                        {{ optional($post->published_at)->format('j M, Y') ?? $post->created_at->format('j M, Y') }}
                                        @if ($post->author)
                                            - by <span class="text-primary">{{ $post->author }}</span>
                                        @endif
                                    </p>
                                    @if ($post->excerpt)
                                        <p>{{ $post->excerpt }}</p>
                                    @endif
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <div class="col-12 marginTop-70">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection

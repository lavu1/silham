@extends('layouts.master')
@section('page_title', $newsEvent->meta_title ?: $newsEvent->title)
@section('content')
    <div class="padding-y-60 bg-cover" data-dark-overlay="6"
         style="background:url({{ cms_media_url($newsEvent->image ?: 'assets/img/home/events/event_back.png') }}) no-repeat">
        <div class="container">
            <h1 class="text-white">Events & News</h1>
            <ol class="breadcrumb breadcrumb-double-angle text-white bg-transparent p-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('events') }}">Events & News</a></li>
                <li class="breadcrumb-item">{{ $newsEvent->title }}</li>
            </ol>
        </div>
    </div>

    <section class="padding-y-60 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if ($newsEvent->image)
                        <img class="w-100 rounded shadow-v1 mb-4" src="{{ cms_media_url($newsEvent->image) }}" alt="{{ $newsEvent->title }}">
                    @endif
                    <h2 class="mb-3">{{ $newsEvent->title }}</h2>
                    @if ($newsEvent->excerpt)
                        <p class="lead">{{ $newsEvent->excerpt }}</p>
                    @endif
                    <div>
                        {!! cms_render_html($newsEvent->body ?: '') !!}
                    </div>
                    @if ($newsEvent->slug === 'pecb-course' && ! str_contains((string) $newsEvent->body, 'pecb-cdpo-course-why.png'))
                        <figure class="mt-4">
                            <img class="w-100 rounded shadow-v1" src="{{ cms_media_url('assets/img/home/events/pecb-cdpo-course-why.png') }}" alt="Why take the PECB CDPO course">
                        </figure>
                    @endif
                    @if ($newsEvent->registration_url)
                        <a href="{{ $newsEvent->registration_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg mt-4">Register Now</a>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="card padding-30 shadow-v1 marginTop-30">
                        <h4 class="mb-3">Details</h4>
                        <ul class="list-unstyled">
                            @if ($newsEvent->dateLabel())
                                <li class="mb-3"><i class="fas fa-calendar-alt mr-1"></i> {{ $newsEvent->dateLabel() }}</li>
                            @endif
                            @if ($newsEvent->time_text)
                                <li class="mb-3"><i class="fas fa-clock mr-1"></i> {{ $newsEvent->time_text }}</li>
                            @endif
                            @if ($newsEvent->location)
                                <li class="mb-3"><i class="fas fa-map-marker-alt mr-1"></i> {{ $newsEvent->location }}</li>
                            @endif
                            @if ($newsEvent->price)
                                <li class="mb-3"><i class="fas fa-money-bill-wave mr-1"></i> {{ $newsEvent->price }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

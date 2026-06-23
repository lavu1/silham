@extends('layouts.master')
@section('page_title', 'Events and News')
@section('content')
@php
    $eventCards = cms_fragment_json('events', 'event_cards', []);
    $managedEvents = \App\Models\NewsEvent::query()
        ->published()
        ->orderByDesc('is_featured')
        ->orderByDesc('starts_at')
        ->orderBy('sort_order')
        ->get()
        ->map(fn (\App\Models\NewsEvent $event): array => [
            'title' => $event->title,
            'image' => $event->image ?: 'assets/img/home/events/event_back.png',
            'link' => $event->publicUrl(),
            'date' => $event->dateLabel(),
            'location' => $event->location,
            'extra' => $event->price,
            'summary' => $event->excerpt,
        ])
        ->all();
    $eventCards = ! empty($managedEvents) ? $managedEvents : (is_array($eventCards) ? $eventCards : []);
    $resolveCmsLink = static function (?string $link): string {
        if (! is_string($link) || trim($link) === '') {
            return '#';
        }

        return Route::has($link) ? route($link) : $link;
    };
    $featuredEvent = $eventCards[0] ?? null;
@endphp

<div class="padding-y-60 bg-cover" data-dark-overlay="6" style="background:url({{ cms_media_url(cms_fragment('events', 'hero_image', 'assets/img/home/events/event_back.png')) }}) no-repeat">
    <div class="container">
        <h1 class="text-white">
            Events
        </h1>
        <ol class="breadcrumb breadcrumb-double-angle text-white bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item">Events</li>
        </ol>
    </div>
</div>




<section class="padding-y-60 bg-light">
    <div class="container">

        @if ($featuredEvent)
            @php
                $featuredLink = $resolveCmsLink($featuredEvent['link'] ?? '#');
            @endphp
            <div class="list-card align-items-center shadow-v2 px-3">
                <div class="col-lg-4 py-4">
                    <img class="w-100" src="{{ cms_media_url($featuredEvent['image'] ?? 'assets/img/home/events/event_back.png') }}" alt="{{ $featuredEvent['title'] ?? 'Featured event' }}">
                </div>
                <div class="col-lg-8 py-4">
                    <a href="{{ $featuredLink }}" class="h4">
                        {{ $featuredEvent['title'] ?? '' }}
                    </a>
                    <ul class="list-inline text-gray mt-3">
                        @if (! empty($featuredEvent['date']))
                            <li class="list-inline-item mr-2">
                                <i class="ti-time text-primary mr-1"></i>
                                {{ $featuredEvent['date'] }}
                            </li>
                        @endif
                        @if (! empty($featuredEvent['location']))
                            <li class="list-inline-item mr-2">
                                <i class="ti-location-pin text-primary mr-1"></i>
                                {{ $featuredEvent['location'] }}
                            </li>
                        @endif
                        @if (! empty($featuredEvent['extra']))
                            <li class="list-inline-item mr-2">
                                <i class="ti-wallet text-primary mr-1"></i>
                                {{ $featuredEvent['extra'] }}
                            </li>
                        @endif
                    </ul>

                    @if (! empty($featuredEvent['summary']))
                        <p>{{ $featuredEvent['summary'] }}</p>
                    @endif

                    <a href="{{ $featuredLink }}" class="btn btn-primary mt-3">View Details</a>
                </div>
            </div>
        @endif

        <div class="row">
            @foreach ($eventCards as $event)
                @php
                    $eventLink = $resolveCmsLink($event['link'] ?? '#');
                @endphp
                <div class="col-lg-4 col-md-6 marginTop-30">
                    <div class="card height-100p shadow-v1">
                        <img class="card-img-top" src="{{ cms_media_url($event['image'] ?? 'assets/img/home/events/event_back.png') }}" alt="{{ $event['title'] ?? 'Event' }}">
                        <div class="card-body">
                            <a href="{{ $eventLink }}" class="h4">
                                {{ $event['title'] ?? '' }}
                            </a>
                            <ul class="list-unstyled line-height-lg mt-4">
                                @if (! empty($event['date']))
                                    <li><i class="ti-time text-primary mr-2"></i>{{ $event['date'] }}</li>
                                @endif
                                @if (! empty($event['location']))
                                    <li><i class="ti-location-pin text-primary mr-2"></i>{{ $event['location'] }}</li>
                                @endif
                                @if (! empty($event['extra']))
                                    <li><i class="ti-wallet text-primary mr-2"></i>{{ $event['extra'] }}</li>
                                @endif
                            </ul>
                            <a href="{{ $eventLink }}" class="btn btn-link pl-0">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>

@endsection

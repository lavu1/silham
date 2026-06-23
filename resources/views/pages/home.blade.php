@extends('layouts.master')
@section('page_title', 'Home')
@section('content')
@php
    $heroItems = cms_fragment_json(cms_page_slug(), 'hero_items', []);
    $serviceCards = cms_fragment_json(cms_page_slug(), 'service_cards', []);
    $missionVision = cms_fragment_json(cms_page_slug(), 'mission_vision', []);
    $faqBlock = cms_fragment_json(cms_page_slug(), 'faq_block', []);
    $eventCards = cms_fragment_json(cms_page_slug(), 'event_cards', []);
    $managedEventCards = \App\Models\NewsEvent::query()
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
        ])
        ->all();
    $eventCards = ! empty($managedEventCards) ? $managedEventCards : $eventCards;
    $partnerLogos = cms_fragment_json(cms_page_slug(), 'partner_logos', []);
    $resolveCmsLink = static function (?string $link): string {
        if (! is_string($link) || trim($link) === '') {
            return '#';
        }

        return Route::has($link) ? route($link) : $link;
    };
@endphp
    <style>
        .home-event-slide .container {
            position: relative;
            z-index: 2;
        }

        .home-event-slide__copy {
            max-width: 650px;
        }

        .home-event-slide__eyebrow {
            color: #00CB54;
            font-weight: 700;
            text-transform: uppercase;
        }

        .home-event-slide__flyer {
            width: auto;
            max-width: 100%;
            max-height: 68vh;
            object-fit: contain;
            padding: 8px;
            border-radius: 4px;
            background: #fff;
        }

        .home-event-slide__details {
            font-size: 1rem;
            line-height: 1.7;
        }

        .home-event-slide__detail:not(:last-child)::after {
            content: "|";
            margin: 0 0.45rem;
        }

        @media (max-width: 991.98px) {
            .home-event-slide {
                height: auto;
                min-height: 90vh;
            }

            .home-event-slide__copy {
                max-width: 100%;
                margin-right: auto;
                margin-left: auto;
                text-align: center;
            }

            .home-event-slide__flyer {
                max-height: 36vh;
            }
        }

        @media (max-width: 575.98px) {
            .home-event-slide {
                padding-top: 60px;
                padding-bottom: 70px;
            }

            .home-event-slide h2 {
                font-size: 1.55rem;
                line-height: 1.18;
            }

            .home-event-slide__flyer {
                max-height: 28vh;
            }

            .home-event-slide__detail {
                display: block;
            }

            .home-event-slide__detail:not(:last-child)::after {
                content: "";
                margin: 0;
            }
        }
    </style>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($heroItems as $index => $slide)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>

        <div class="carousel-inner">
            @forelse($heroItems as $index => $slide)
                @php
                    $buttons = $slide['buttons'] ?? null;
                    if (! is_array($buttons)) {
                        $buttons = [[
                            'text' => $slide['button_text'] ?? 'Read More',
                            'link' => $slide['button_link'] ?? '#',
                            'style' => 'primary',
                        ]];
                    }
                    $isEventSlide = ($slide['layout'] ?? null) === 'event_feature';
                    $slideImage = cms_media_url($slide['background_image'] ?? $slide['image'] ?? 'assets/img/home/carousel/IMAGE07_12.jpg');
                    $foregroundImage = $isEventSlide ? cms_media_url($slide['foreground_image'] ?? $slide['image'] ?? '') : null;
                    $titleLines = $isEventSlide && is_array($slide['title_lines'] ?? null) ? $slide['title_lines'] : [];
                    $descriptionLines = $isEventSlide && is_array($slide['description_lines'] ?? null) ? $slide['description_lines'] : [];
                @endphp
                <div class="carousel-item height-90vh padding-y-80 {{ $isEventSlide ? 'home-event-slide' : '' }} {{ $index === 0 ? 'active' : '' }}">
                    <div class="bg-absolute" data-dark-overlay="{{ $isEventSlide ? '7' : '5' }}"
                     style="background:url({{ $slideImage }}) center center / cover no-repeat"></div>
                    @if ($isEventSlide)
                        <div class="container h-100">
                            <div class="row align-items-center h-100">
                                <div class="col-lg-6 text-white">
                                    <div class="home-event-slide__copy animated slideInUp">
                                        @if (! empty($slide['eyebrow']))
                                            <p class="home-event-slide__eyebrow mb-2">{{ $slide['eyebrow'] }}</p>
                                        @endif
                                        <h2 class="display-lg-4 font-weight-bold text-white mb-0">
                                            @if (! empty($titleLines))
                                                @foreach ($titleLines as $line)
                                                    <span class="d-block">{{ $line }}</span>
                                                @endforeach
                                            @else
                                                {{ $slide['title'] ?? '' }}
                                            @endif
                                        </h2>
                                        @if (! empty($descriptionLines))
                                            <p class="home-event-slide__details mt-3 mb-0">
                                                @foreach ($descriptionLines as $line)
                                                    <span class="home-event-slide__detail">{{ $line }}</span>
                                                @endforeach
                                            </p>
                                        @elseif (! empty($slide['description']))
                                            <p class="font-size-md-18 mt-3 mb-0">{{ $slide['description'] }}</p>
                                        @endif
                                        <div class="d-flex flex-wrap justify-content-center justify-content-lg-start mt-3">
                                            @foreach ($buttons as $button)
                                                @php
                                                    $buttonStyle = ($button['style'] ?? 'primary') === 'outline-white' ? 'outline-white' : 'primary';
                                                @endphp
                                                <a href="{{ $resolveCmsLink($button['link'] ?? '#') }}"
                                                   class="btn btn-{{ $buttonStyle }} mt-3 mr-2"
                                                   @if (($button['target'] ?? null) === '_blank') target="_blank" rel="noopener noreferrer" @endif>
                                                    {{ $button['text'] ?? 'Read More' }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @if ($foregroundImage)
                                    <div class="col-lg-5 offset-lg-1 mt-5 mt-lg-0 text-center animated slideInUp">
                                        <img class="home-event-slide__flyer shadow-v2" src="{{ $foregroundImage }}" alt="{{ $slide['foreground_alt'] ?? $slide['title'] ?? 'Event flyer' }}">
                                    </div>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 mx-auto text-center text-white">
                                    <h2 class="display-lg-4 font-weight-bold text-white animated slideInUp mb-0">
                                        {{ $slide['title'] ?? '' }}
                                    </h2>
                                    @if (! empty($slide['description']))
                                        <p class="font-size-md-18 animated slideInUp mt-3">{{ $slide['description'] }}</p>
                                    @endif
                                    <div class="d-flex flex-wrap justify-content-center mt-3">
                                        @foreach ($buttons as $button)
                                            @php
                                                $buttonStyle = ($button['style'] ?? 'primary') === 'outline-white' ? 'outline-white' : 'primary';
                                            @endphp
                                            <a href="{{ $resolveCmsLink($button['link'] ?? '#') }}"
                                               class="btn btn-{{ $buttonStyle }} mt-3 mx-2 animated slideInUp"
                                               @if (($button['target'] ?? null) === '_blank') target="_blank" rel="noopener noreferrer" @endif>
                                                {{ $button['text'] ?? 'Read More' }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @empty
                <div class="carousel-item height-90vh padding-y-80 active">
                    <div class="bg-absolute" data-dark-overlay="5"
                         style="background:url({{ cms_media_url('assets/img/home/carousel/IMAGE07_12.jpg') }}) no-repeat"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 mx-auto text-center text-white">
                                <h2 class="display-lg-4 font-weight-bold text-white animated slideInUp mb-0">
                                    Raising Awareness through Data Protection Awareness Workshops
                                </h2>
                                <a href="{{ route('carasel.one') }}" class="btn btn-primary mt-3 mx-2 animated slideInUp">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <i class="ti-angle-left iconbox bg-black-0_5 hover:primary"></i>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <i class="ti-angle-right iconbox bg-black-0_5 hover:primary"></i>
        </a>
    </div>

    <section class="padding-y-100 bg-light-v2">
        <div class="container">
            <div class="row">

                <div class="col-12 text-center">
                    <h2 class="mb-4">
                        Data Protection Services
                    </h2>
                    <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
                </div>
            </div> <!-- END row-->
            <div class="row">
                @forelse ($serviceCards ?: [] as $card)
                        <div class="col-md-3 mt-4 text-center shadow-primary--onHover">
                            <div class="iconbox iconbox-xxl font-size-26 bg-primary-0_2 mt-5">
                            <i class="{{ $card['icon'] ?? 'ti-shield' }} text-primary text-center"></i>
                        </div>
                        <h4 class="my-4">
                            {{ $card['title'] ?? '' }}
                        </h4>
                        <p>
                            {{ $card['text'] ?? '' }}
                        </p>
                        <a href="{{ $resolveCmsLink($card['link'] ?? '#') }}" class="btn btn-outline-primary align-self-start mt-2 mb-3 p-3">
                            {{ $card['button'] ?? 'Read More' }}
                        </a>
                    </div>
                @empty
                    <div class="col-md-3 mt-4 text-center shadow-primary--onHover">
                        <div class="iconbox iconbox-xxl font-size-26 bg-primary-0_2 mt-5">
                            <i class="ti-shield text-primary text-center"></i>
                        </div>
                        <h4 class="my-4">Outsourced Data Protection Officers</h4>
                        <p>Support for organisations that need practical data protection leadership, governance, and compliance oversight.</p>
                        <a href="{{ route('services.dpo') }}" class="btn btn-outline-primary align-self-start mt-2 mb-3 p-3">Read More</a>
                    </div>
                    <div class="col-md-3 mt-4 text-center shadow-primary--onHover">
                        <div class="iconbox iconbox-xxl font-size-26 bg-primary-0_2 mt-5">
                            <i class="ti-shield text-primary text-center"></i>
                        </div>
                        <h4 class="my-4">Data Protection Training</h4>
                        <p>Tailor-made training that helps staff, managers, and officers understand privacy duties and safer data handling.</p>
                        <a href="{{ route('services.dpt') }}" class="btn btn-outline-primary align-self-start mt-2 mb-3 p-3">Read More</a>
                    </div>
                    <div class="col-md-3 mt-4 text-center shadow-primary--onHover">
                        <div class="iconbox iconbox-xxl font-size-26 bg-primary-0_2 mt-5">
                            <i class="ti-shield text-primary text-center"></i>
                        </div>
                        <h4 class="my-4">Data Protection Consultancy</h4>
                        <p>Advisory support for compliance readiness, privacy documentation, risk reviews, and implementation plans.</p>
                        <a href="{{ route('services.dpc') }}" class="btn btn-outline-primary align-self-start mt-2 mb-3 p-3">Read More</a>
                    </div>
                    <div class="col-md-3 mt-4 text-center shadow-primary--onHover">
                        <div class="iconbox iconbox-xxl font-size-26 bg-primary-0_2 mt-5">
                            <i class="ti-shield text-primary text-center"></i>
                        </div>
                        <h4 class="my-4">Data Audit</h4>
                        <p>Independent audit support to identify gaps, test controls, and improve evidence of compliance.</p>
                        <a href="{{ route('services.dpas') }}" class="btn btn-outline-primary align-self-start mt-2 mb-3 p-3">Read More</a>
                    </div>
                @endforelse
            </div>
        </div> <!-- END container-->
    </section>

    <section>
        <div class="container-fluid">
            <div class="row">

                @forelse (($missionVision ?: []) as $block)
                    <div class="col-md-6 bg-cover bg-center text-white padding-y-80"
                         style="background:url({{ cms_media_url($block['image'] ?? 'assets/img/home/IMAGE07_28.jpg') }}) no-repeat">
                        <div class="padding-x-lg-100 wow pulse" style="visibility: visible; animation-name: pulse;">
                            <h2 class="text-white mb-4">
                                {{ $block['title'] ?? '' }}
                            </h2>
                            <p class="font-weight-bold">
                                {{ $block['text'] ?? '' }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-md-6 bg-cover bg-center text-white padding-y-80"
                         style="background:url(assets/img/home/IMAGE07_28.jpg) no-repeat">
                        <div class="padding-x-lg-100 wow pulse" style="visibility: visible; animation-name: pulse;">
                            <h2 class="text-white mb-4">Mission</h2>
                            <p class="font-weight-bold">
                                We will delight our customers with exceptional quality consultancy and
                                training services in the areas of our service delivery, while helping them meet
                                their business objectives.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 bg-cover bg-center text-white padding-y-80"
                         style="background:url(assets/img/home/IMAGE07_28.jpg) no-repeat">
                        <div class="padding-x-lg-100 wow pulse" style="visibility: visible; animation-name: pulse;">
                            <h2 class="text-white mb-4">Vision</h2>
                            <p class="font-weight-bold">
                                To be the brand of choice in our chosen service markets in Zambia and
                                in the region
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div> <!-- END container-->
    </section>



    <section class="padding-y-60 bg-light">
        @php
            $homeBlogPosts = \App\Models\BlogPost::published()
                ->latest('published_at')
                ->latest()
                ->take(3)
                ->get();
        @endphp
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="mb-4">
                        Blogs
                    </h2>
                    <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('blog') }}" class="btn btn-primary mx-2 mt-3">View all Blogs</a>
            </div>

            <div class="row">
                @forelse ($homeBlogPosts as $post)
                    <div class="col-lg-4 col-md-6 marginTop-30 p-3">
                        <article class="card h-100">
                            <div class="card-img">
                                <a href="{{ route('blog.show', $post) }}">
                                    <img class="rounded w-100" src="{{ cms_media_url($post->image ?: 'assets/img/home/carousel/IMAGE07_12.jpg') }}" alt="{{ $post->title }}">
                                </a>
                            </div>
                            <div class="card-body px-0">
                                <a class="text-primary" href="{{ route('blog') }}">Data Protection</a>
                                <a href="{{ route('blog.show', $post) }}" class="h4 my-2 d-block">
                                    {{ $post->title }}
                                </a>
                                <p>
                                    {{ optional($post->published_at)->format('j M, Y') ?? $post->created_at->format('j M, Y') }}
                                    @if ($post->author)
                                        - by <span class="text-primary">{{ $post->author }}</span>
                                    @endif
                                </p>
                                @if ($post->excerpt)
                                    <p>{{ \Illuminate\Support\Str::limit($post->excerpt, 120) }}</p>
                                @endif
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12 marginTop-30 text-center">
                        <p class="mb-0">Published blog posts will appear here automatically.</p>
                    </div>
                @endforelse
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

    <section class="padding-y-100 bg-cover bg-center jarallax" data-primary-overlay="8"
             style="background:url({{ cms_media_url(is_array($faqBlock) ? ($faqBlock['image'] ?? 'assets/img/home/fqs/OIG3.npEsOFIiK9KbK6Saebc2.jpg') : 'assets/img/home/fqs/OIG3.npEsOFIiK9KbK6Saebc2.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center text-white">
                @php
                    $faqSmall = is_array($faqBlock) ? ($faqBlock['small_title'] ?? 'FAQs') : 'FAQs';
                    $faqTitle = is_array($faqBlock) ? ($faqBlock['title'] ?? 'What type of personal information do we collect?') : 'What type of personal information do we collect?';
                    $faqDescription = is_array($faqBlock) ? ($faqBlock['description'] ?? '') : 'Silham Consulting and Training Services helps organisations assess readiness, train staff, build compliance documentation, and implement practical data protection controls.';
                    $faqButton = is_array($faqBlock) ? ($faqBlock['button'] ?? 'Read More') : 'Read More';
                    $faqButtonLink = is_array($faqBlock) ? ($faqBlock['button_link'] ?? '#') : '#';
                    $faqLink = $resolveCmsLink($faqButtonLink);
                @endphp

                    <p>{{ $faqSmall }}</p>
                    <h2 class="text-white mb-4">
                        {{ $faqTitle }}
                    </h2>
                    <p class="font-size-18">
                        {{ $faqDescription }}
                    </p>
                    <a href="{{ $faqLink }}" class="btn btn-outline-white mx-2 mt-3">{{ $faqButton }}</a>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

    <section class="padding-y-60 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="mb-4">
                        Events & News
                    </h2>
                    <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
                </div>
            </div>
            <a href="{{ route('events') }}" class="btn btn-primary mx-2 mt-3 text-center">View all Events</a>

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

    <section class="paddingTop-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="mb-4">
                        Partners
                    </h2>
                    <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
                </div>
            </div> <!-- END row-->

            <div class="row marginTop-60">
                <div class="owl-carousel arrow-edge arrow-black" data-items="4" data-arrow="true" data-tablet-items="2"
                     data-mobile-items="1">
                    @foreach ($partnerLogos as $partner)
                        @php
                            $partnerImage = cms_media_url($partner['image'] ?? 'assets/img/website/pceb-logo.png');
                        @endphp
                        <div class="hover:parent">
                            <img class="w-100 transition-0_3 hover:zoomin" src="{{ $partnerImage }}" alt="{{ $partner['alt'] ?? 'Partner' }}">
                            <div class="card-img-overlay  transition-0_3 flex-center bg-black-0_7 hover:show">
                                <a href="{{ $partnerImage }}" data-fancybox="gallery1"
                                   class="iconbox bg-white ti-zoom-in text-primary"></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> <!-- END row-->

        </div> <!-- END container-->
    </section>
@endsection

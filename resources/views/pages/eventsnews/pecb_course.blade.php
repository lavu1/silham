@extends('layouts.master')
@section('page_title', 'GDPR Certified Data Protection Officer (CDPO) Course')
@section('content')
@php
    $pageSlug = 'pecbCourse';
    $registrationUrl = cms_fragment($pageSlug, 'registration_url', cms_setting('pecb_course_registration_url', 'https://docs.google.com/forms/d/e/1FAIpQLSehTitcpNv6eR6Ts14X21Hvd_uYrodOIZ5nLHO0oshLj7J4EQ/viewform'));
    $courseFacts = cms_fragment_json($pageSlug, 'course_facts', []);
    $targetAudience = cms_fragment_json($pageSlug, 'target_audience', []);
    $whyTakeCourse = cms_fragment_json($pageSlug, 'why_take_course', []);
    $flyerImages = cms_fragment_json($pageSlug, 'flyer_images', []);
    $eventDetails = cms_fragment_json($pageSlug, 'event_details', []);
@endphp

<div class="padding-y-60 bg-cover" data-dark-overlay="6"
     style="background:url({{ cms_media_url(cms_fragment($pageSlug, 'hero_image', 'assets/img/home/events/pecb-cdpo-course-2026.png')) }}) no-repeat">
    <div class="container">
        <h1 class="text-white">
            Events
        </h1>
        <ol class="breadcrumb breadcrumb-double-angle text-white bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('events') }}">Events</a></li>
            <li class="breadcrumb-item">GDPR Certified Data Protection Officer (CDPO) Course</li>
        </ol>
    </div>
</div>

<section class="padding-y-60 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="mb-5">
                    <img class="w-100 rounded shadow-v1 mb-4" src="{{ cms_media_url(cms_fragment($pageSlug, 'intro_image', 'assets/img/home/events/pecb-cdpo-course-2026.png')) }}" alt="PECB GDPR CDPO Course">
                    <h2 class="mb-3">{{ cms_fragment($pageSlug, 'title', 'PECB GDPR Certified Data Protection Officer (CDPO) Course') }}</h2>
                    <h4 class="text-primary">{{ cms_fragment($pageSlug, 'subtitle', 'BEYOND RECOGNITION') }}</h4>

                    <p class="lead mt-4">
                        {{ cms_fragment($pageSlug, 'lead', 'Silham Consulting and Training Services, in conjunction with Professional Evaluation and Certification Board (PECB) of Canada, will be running the GDPR Certified Data Protection Officer (CDPO) Course in July 2026.') }}
                    </p>

                    <div class="row my-5">
                        @foreach ($courseFacts as $fact)
                            <div class="col-md-6 mb-4">
                                <div class="card shadow-v2 h-100">
                                    <div class="card-body">
                                        <h4 class="text-primary"><i class="{{ $fact['icon'] ?? 'far fa-check-circle' }} mr-2"></i> {{ $fact['title'] ?? '' }}</h4>
                                        <p class="mb-0">{{ $fact['text'] ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <h3 class="mt-5 mb-3">{{ cms_fragment($pageSlug, 'fee_title', 'Course Fee: $1,200') }}</h3>
                    <p>{{ cms_fragment($pageSlug, 'fee_text', 'Per Person (Includes Tuition, Course Material, Examination, PECB Certificate & Silham Certificate of Course Completion)') }}</p>

                    <h3 class="mt-5 mb-3">Target Audience</h3>
                    <ul>
                        @foreach ($targetAudience as $target)
                            <li>{{ $target }}</li>
                        @endforeach
                    </ul>

                    <h3 class="mt-5 mb-3">Why Take This Course?</h3>
                    <ul>
                        @foreach ($whyTakeCourse as $reason)
                            <li>{{ $reason }}</li>
                        @endforeach
                    </ul>

                    <div class="alert alert-info mt-5">
                        <h4>Important Note:</h4>
                        <p>{{ cms_fragment($pageSlug, 'important_note', '') }}</p>
                    </div>
                </div>

                @if (! empty($flyerImages))
                    <div class="row">
                        @foreach ($flyerImages as $flyer)
                            <div class="col-md-6 mb-4">
                                <a href="{{ cms_media_url($flyer['image'] ?? '') }}" data-fancybox="pecb-course">
                                    <img class="w-100 rounded shadow-v1" src="{{ cms_media_url($flyer['image'] ?? '') }}" alt="{{ $flyer['alt'] ?? 'PECB course flyer' }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div id="register" class="text-center mt-5">
                    <a href="{{ $registrationUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg mx-2">Register Now</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg mx-2">Contact Us</a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="card padding-30 shadow-v1 marginTop-30">
                    <h4 class="mb-3">Event Details</h4>
                    <ul class="list-unstyled">
                        @foreach ($eventDetails as $detail)
                            <li class="mb-3">
                                <i class="{{ $detail['icon'] ?? 'fas fa-info-circle' }} mr-1"></i>
                                <span class="font-weight-semiBold">{{ $detail['label'] ?? '' }}:</span> <br>
                                {{ $detail['text'] ?? '' }}
                            </li>
                        @endforeach
                    </ul>
                    <hr>
                    <h5 class="mb-3">For More Information</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-envelope mr-2"></i>{{ cms_setting('contact_email', 'info@silhamconsulting.co.zm') }}</li>
                        <li class="mb-2"><i class="fas fa-phone mr-2"></i>{{ cms_setting('contact_phone', '+260 750 786820') }}</li>
                        <li><i class="fas fa-globe mr-2"></i>www.silhamconsulting.co.zm</li>
                    </ul>
                </div>

                <div class="card padding-30 shadow-v1 marginTop-30">
                    <h4 class="mb-3">Share This Event</h4>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('pecbCourse')) }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-facebook btn-sm"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('pecbCourse')) }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-twitter btn-sm"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('pecbCourse')) }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-linkedin btn-sm"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://wa.me/?text={{ urlencode(route('pecbCourse')) }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-whatsapp btn-sm"><i class="fab fa-whatsapp"></i></a>
                        <a href="mailto:?subject=PECB GDPR CDPO Course&body={{ urlencode(route('pecbCourse')) }}" class="btn btn-outline-envelope btn-sm"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

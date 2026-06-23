@extends('layouts.master')
@section('page_title', 'About us')
@section('content')
@php
    $whoImage = cms_fragment('about', 'who_image', 'assets/img/home/carousel/IMAGE07_12.jpg');
    $whoTitle = cms_fragment('about', 'who_title', 'Who Are we?');
    $whoText = cms_fragment('about', 'who_text', 'Silham Consulting and Training Services is the No1 Privacy and Data Protection Services provider in Zambia.');
    $servicesOverviewTitle = cms_fragment('about', 'services_overview_title', 'What do we do?');
    $servicesOverviewIntro = cms_fragment('about', 'services_overview_intro', 'Silham Consulting and Training Services was established to help organisations comply with the Data Protection Act of 2021 and related laws on data protection.');
    $servicesList = cms_fragment_json('about', 'services_list', []);
    $missionVision = cms_fragment_json('about', 'mission_vision', []);
    $missionBlock = $missionVision[0] ?? [
        'title' => 'Mission',
        'text' => 'We will delight our customers with exceptional quality consultancy and training services in the areas of our service delivery, while helping them meet their business objectives.',
    ];
    $visionBlock = $missionVision[1] ?? [
        'title' => 'Vision',
        'text' => 'To be the brand of choice in our chosen service markets in Zambia and in the region.',
    ];
@endphp

    <section class="padding-y-100 border-bottom">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 mb-4 mr-auto text-center">
                    <img class="wow fadeInLeft w-100 rounded" src="{{ cms_media_url($whoImage) }}" alt="{{ $whoTitle }}">
                </div>

                <div class="col-lg-6">
                    <h2>
                        <span class="text-primary">{{ $whoTitle }}</span>
                    </h2>
                    <div class="width-4rem height-4 bg-primary rounded mt-4 marginBottom-40"></div>
                    <p class="mb-5">
                        {{ $whoText }}
                    </p>
                    {{--                    <ul class="list-unstyled list-style-icon list-icon-check-circle">--}}
                    {{--                        <li>--}}
                    {{--                            Professional and easy to use software--}}
                    {{--                        </li>--}}
                    {{--                        <li>--}}
                    {{--                            Setup and installations takes 30 seconds--}}
                    {{--                        </li>--}}
                    {{--                        <li>--}}
                    {{--                            Perfect for any device with pixel perfect design--}}
                    {{--                        </li>--}}
                    {{--                        <li>--}}
                    {{--                            Setup and installations really really fast--}}
                    {{--                        </li>--}}
                    {{--                    </ul>--}}
                </div> <!-- END col-lg-6 ml-auto-->
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>





    <section class="padding-y-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2>
                        {{ $servicesOverviewTitle }}
                    </h2>
                    <div class="width-4rem height-4 bg-primary rounded mt-4 marginBottom-40"></div>
                    <p class="mb-5">
                        {{ $servicesOverviewIntro }}

                    </p>
                    <h4 class="h5">We provide the following:</h4>
                    <ul class="list-unstyled list-style-icon list-icon-check-circle">
                        @forelse (($servicesList ?: []) as $service)
                            @php
                                $serviceTitle = $service['title'] ?? '';
                                $serviceLink = $service['link'] ?? '#';
                            @endphp
                            <li>
                                <a class="link" href="{{ Route::has($serviceLink) ? route($serviceLink) : $serviceLink }}"> {{ $serviceTitle }} </a>
                            </li>
                        @empty
                            <li>
                                <a class="link" href="#"> Outsourced Data Protection Officer (DPO) Services </a>
                            </li>
                            <li>
                                <a class="link" href="#"> Data Protection and Privacy Consulting Services </a>
                            </li>
                            <li>
                                <a class="link" href="#"> Data Protection Awareness and Training Services </a>
                            </li>
                            <li>
                                <a class="link" href="#"> Data Protection Auditor Services </a>
                            </li>
                        @endforelse
                    </ul>
                </div> <!-- END col-lg-6 ml-auto-->
                <div class="col-lg-5 mb-4 mr-auto text-center">
                    <img class="wow fadeInRight w-100 rounded" src="{{ cms_media_url(cms_fragment('about', 'who_image', 'assets/img/home/IMAGE07_28.jpg')) }}" alt="{{ $whoTitle }}">
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>





    <section class="padding-y-100 bg-light-v4">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12 text-center">
                    <h2>
                        What is Our Vision, Mission and Core Values?
                    </h2>
                    <div class="width-4rem height-4 bg-primary rounded mt-4 marginBottom-40 mx-auto"></div>
                </div>
                {{--                <div class="col-lg-4 col-md-6 mt-5 wow slideInUp" data-wow-delay=".1s">--}}
                {{--                    <div class="media">--}}
                {{--                        <div class="iconbox iconbox-lg rounded font-size-24 bg-primary text-white mt-2">--}}
                {{--                            <i class="ti-pencil-alt"></i>--}}
                {{--                        </div>--}}
                {{--                        <div class="media-body ml-4">--}}
                {{--                            <h4 class="mt-0 mb-3">--}}
                {{--                                Mission--}}
                {{--                            </h4>--}}
                {{--                            <p>--}}
                {{--                                We will delight our customers with exceptional quality consultancy and--}}
                {{--                                training services in the areas of our service delivery, while helping them meet--}}
                {{--                                their business objectives.--}}
                {{--                            </p>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="col-md-6 mt-4 text-center">
                    <div class="iconbox iconbox-xxl font-size-26 bg-primary-0_2 text">
                        <i class="ti-rocket text-primary"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="mt-0 mb-3">
                            {{ $missionBlock['title'] ?? 'Mission' }}
                        </h4>
                        <p>
                            {{ $missionBlock['text'] ?? '' }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 text-center">
                    <div class="iconbox iconbox-xxl font-size-26 bg-primary-0_2">
                        <i class="ti-heart text-primary"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="mt-0 mb-3">
                            {{ $visionBlock['title'] ?? 'Vision' }}
                        </h4>
                        <p>
                            {{ $visionBlock['text'] ?? '' }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-5">

                <div class="col-12 text-center">
                    <h6>
                        Core Values
                    </h6>
                    <div class="width-4rem height-4 bg-primary rounded mt-4 marginBottom-40 mx-auto"></div>
                </div>
                {{--                <div class="col-md-4 mt-4 text-center">--}}
                {{--                    <div class="iconbox iconbox-xxl font-size-26 bg-primary-0_2">--}}
                {{--                        <i class="ti-bookmark-alt text-primary"></i>--}}
                {{--                    </div>--}}
                {{--                    <h4 class="my-4">--}}
                {{--                        Professionalism--}}
                {{--                    </h4>--}}
                {{--                    <p>--}}
                {{--                        We will be professional in the conduct of our business--}}
                {{--                        with all our customers and key stakeholders, adhering to the tenets of--}}
                {{--                        various professions our staff and consultancy partners belong to in all our--}}
                {{--                        business dealings.--}}
                {{--                    </p>--}}
                {{--                </div>--}}
                <div class="col-md-3 mt-4 text-center">
                    <div class="iconbox iconbox-xxl font-size-26 bg-primary-0_2">
                        <i class="ti-briefcase text-primary"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="mt-0 mb-3">
                            Professionalism
                        </h4>
                        <p>
                            We serve clients with practical advice, clear communication, and respect for professional standards.
                        </p>
                    </div>
                </div>
                <div class="col-md-3 mt-4 text-center">
                    <div class="iconbox iconbox-xxl font-size-26 bg-primary-0_2">
                        <i class="ti-book text-primary"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="mt-0 mb-3">
                            Specialist Knowledge
                        </h4>
                        <p>
                            Our work focuses on privacy, data protection compliance, governance, audit readiness, and staff training.
                        </p>
                    </div>
                </div>

                <div class="col-md-3 mt-4 text-center">
                    <div class="iconbox iconbox-xxl font-size-26 bg-primary-0_2">
                        <i class="ti-pie-chart text-primary"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="mt-0 mb-3">
                            Practical Compliance
                        </h4>
                        <p>
                            We help organisations turn legal requirements into workable policies, controls, and day-to-day processes.
                        </p>
                    </div>
                </div>

                <div class="col-md-3 mt-4 text-center">
                    <div class="iconbox iconbox-xxl font-size-26 bg-primary-0_2">
                        <i class="ti-map text-primary"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="mt-0 mb-3">
                            Client Support
                        </h4>
                        <p>
                            We work with teams through assessments, training, implementation support, and ongoing advisory services.
                        </p>
                    </div>
                </div>


            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>




    <section class="padding-y-100 wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h2>
                        The Executive Team
                    </h2>
                    <div class="width-4rem height-4 bg-primary rounded mt-4 marginBottom-40 mx-auto"></div>
                </div>

                <div class="col-lg-6 mt-2 wow fadeInUp">
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <img src="assets/img/avatar/lg/1.jpg" alt="">
                        </div>
                        <div class="col-md-6 my-4">
                            <h4 class="mb-0">
                                Natalie Paisley
                            </h4>
                            <p class="text-muted mb-0">
                                Founder &amp; CEO
                            </p>
                            <p class="my-4">
                                Nam liber tempor cum soluta nobis eleifend option congue is nihil they imper.
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-facebook iconbox iconbox-xs"><i
                                            class="ti-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-twitter iconbox iconbox-xs"><i class="ti-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-google-plus iconbox iconbox-xs"><i class="ti-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-linkedin iconbox iconbox-xs"><i
                                            class="ti-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-2 wow fadeInUp">
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <img src="assets/img/avatar/lg/2.jpg" alt="">
                        </div>
                        <div class="col-md-6 my-4">
                            <h4 class="mb-0">
                                Anthony Brooks
                            </h4>
                            <p class="text-muted mb-0">
                                Senior Developer
                            </p>
                            <p class="my-4">
                                Nam liber tempor cum soluta nobis eleifend option congue is nihil they imper.
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-facebook iconbox iconbox-xs"><i
                                            class="ti-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-twitter iconbox iconbox-xs"><i class="ti-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-google-plus iconbox iconbox-xs"><i class="ti-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-linkedin iconbox iconbox-xs"><i
                                            class="ti-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-2 wow fadeInUp">
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <img src="assets/img/avatar/lg/3.jpg" alt="">
                        </div>
                        <div class="col-md-6 my-4">
                            <h4 class="mb-0">
                                Philip Demarco
                            </h4>
                            <p class="text-muted mb-0">
                                Designer
                            </p>
                            <p class="my-4">
                                Nam liber tempor cum soluta nobis eleifend option congue is nihil they imper.
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-facebook iconbox iconbox-xs"><i
                                            class="ti-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-twitter iconbox iconbox-xs"><i class="ti-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-google-plus iconbox iconbox-xs"><i class="ti-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-linkedin iconbox iconbox-xs"><i
                                            class="ti-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-2 wow fadeInUp">
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <img src="assets/img/avatar/lg/4.jpg" alt="">
                        </div>
                        <div class="col-md-6 my-4">
                            <h4 class="mb-0">
                                Peter Spenser
                            </h4>
                            <p class="text-muted mb-0">
                                Creative Developer
                            </p>
                            <p class="my-4">
                                Nam liber tempor cum soluta nobis eleifend option congue is nihil they imper.
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-facebook iconbox iconbox-xs"><i
                                            class="ti-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-twitter iconbox iconbox-xs"><i class="ti-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-google-plus iconbox iconbox-xs"><i class="ti-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="btn btn-linkedin iconbox iconbox-xs"><i
                                            class="ti-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>





    <section class="padding-y-100 bg-light-v2">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="h1">
                        Who do we work <span class="text-primary">with?</span>
                        <div class="width-4rem height-4 bg-primary rounded mt-4 marginBottom-40 mx-auto"></div>
                    </h2>
                </div>
                <div class="col-lg-6 mt-4 pr-lg-5">
                    <p class="mb-4">
                        Silham Consulting and Training Services will work with any organisation, in need of data
                        protection services, that collects and processes personal data across different sectors,
                        both public and private, including
                    </p>
                    <ul class="list-unstyled list-style-icon list-icon-angle-right">
                        <li>
                            <a class="link" href="#"> Banking and Finance </a>
                        </li>
                        <li>
                            <a class="link" href="#"> Pension and Insurance </a>
                        </li>
                        <li>
                            <a class="link" href="#"> Medical and Healthcare </a>
                        </li>
                        <li>
                            <a class="link" href="#"> Software and Technology </a>
                        </li>
                        <li>
                            <a class="link" href="#"> Education and Schools </a>
                        </li>
                        <li>
                            <a class="link" href="#"> Charities and Non-Governmental Organisations </a>
                        </li>
                    </ul>
                </div> <!-- END col-lg-6-->
                <div class="col-md-6 mt-4">
                    <div class="mb-4">
{{--                        <div class="d-flex justify-content-between">--}}
{{--                            <p>HTML &amp; CSS</p>--}}
{{--                            <p>90%</p>--}}
{{--                        </div>--}}
{{--                        <div class="progress" style="height:4px">--}}
{{--                            <div class="progress-bar bg-primary" style="width:90%" role="progressbar" aria-valuenow="90"--}}
{{--                                 aria-valuemin="90" aria-valuemax="100"></div>--}}
{{--                        </div>--}}
                    </div>

                    <div class="mb-4">
{{--                        <div class="d-flex justify-content-between">--}}
{{--                            <p>React angular</p>--}}
{{--                            <p>75%</p>--}}
{{--                        </div>--}}
{{--                        <div class="progress" style="height:4px">--}}
{{--                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%"--}}
{{--                                 aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                        </div>--}}
                    </div>

                    <div class="mb-4">
{{--                        <div class="d-flex justify-content-between">--}}
{{--                            <p>PHP</p>--}}
{{--                            <p>80%</p>--}}
{{--                        </div>--}}
{{--                        <div class="progress mb-4" style="height:4px">--}}
{{--                            <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80"--}}
{{--                                 aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                        </div>--}}
                    </div>

                    <div class="mb-4">
{{--                        <div class="d-flex justify-content-between">--}}
{{--                            <p>Laravel</p>--}}
{{--                            <p>75%</p>--}}
{{--                        </div>--}}
{{--                        <div class="progress mb-4" style="height:4px">--}}
{{--                            <div class="progress-bar bg-warning" role="progressbar" style="width: 75%"--}}
{{--                                 aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>


    <section class="padding-y-100 bg-primary wow fadeIn">
        <div class="container">
            <div class="row">

                <div class="col-12 text-center mb-5">
                    <h4 class="text-white">
                        Message from our director
                    </h4>
                </div>

                <div class="col-lg-10 mx-auto">
                    <div class="owl-carousel dots-white" data-items="1" data-space="30" data-dots="true"
                         data-autoplay="false">

                        <div class="card card-body p-lg-5 text-center">
                            <img class="iconbox iconbox-xxxl mx-auto z-index-10" src="assets/img/avatar/4.jpg" alt="">
                            <div class="my-4">
                                <h6>
                                    Mr J Silungwe
                                </h6>
                                <p class="text-gray mb-0">
                                    Director
                                </p>
                            </div>
                            <p class="mb-0 lead text-dark">
                                Nam liber tempor cum soluta nobis eleifend option congue is nihil imper per tem por
                                legere me doming vulputate velit esse molestie possim. Ut wisi enim ad placerat facer Ut
                                wisi enim ad placerat facer.
                            </p>
                        </div>

{{--                        <div class="card card-body p-lg-5 text-center">--}}
{{--                            <img class="iconbox iconbox-xxxl mx-auto z-index-10" src="assets/img/avatar/5.jpg" alt="">--}}
{{--                            <div class="my-4">--}}
{{--                                <h6>--}}
{{--                                    Kenelia Deshmukh--}}
{{--                                </h6>--}}
{{--                                <p class="text-gray mb-0">--}}
{{--                                    Creative Director--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <p class="mb-0 lead text-dark">--}}
{{--                                Nam liber tempor cum soluta nobis eleifend option congue is nihil imper per tem por--}}
{{--                                legere me doming vulputate velit esse molestie possim. Ut wisi enim ad placerat facer Ut--}}
{{--                                wisi enim ad placerat facer.--}}
{{--                            </p>--}}
{{--                        </div>--}}

{{--                        <div class="card card-body p-lg-5 text-center">--}}
{{--                            <img class="iconbox iconbox-xxxl mx-auto z-index-10" src="assets/img/avatar/6.jpg" alt="">--}}
{{--                            <div class="my-4">--}}
{{--                                <h6>--}}
{{--                                    Ema Watson--}}
{{--                                </h6>--}}
{{--                                <p class="text-gray mb-0">--}}
{{--                                    Creative Director--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <p class="mb-0 lead text-dark">--}}
{{--                                Nam liber tempor cum soluta nobis eleifend option congue is nihil imper per tem por--}}
{{--                                legere me doming vulputate velit esse molestie possim. Ut wisi enim ad placerat facer Ut--}}
{{--                                wisi enim ad placerat facer.--}}
{{--                            </p>--}}
{{--                        </div>--}}

                    </div>
                </div> <!-- END col-12 -->
            </div>  <!-- END row-->
        </div> <!-- END container-->
    </section>
@endsection

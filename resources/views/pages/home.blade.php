@extends('layouts.master')
@section('page_title', 'Home')
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>

        <div class="carousel-inner">

            <div class="carousel-item height-90vh padding-y-80 active">
                <div class="bg-absolute" data-dark-overlay="5"
                     style="background:url(assets/img/home/carousel/IMAGE07_12.jpg) no-repeat"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 mx-auto text-center text-white">
                            <h2 class="display-lg-4 font-weight-bold text-white animated slideInUp mb-0">
                                Raising Awareness through Data Protection Awareness Workshops
                            </h2>
                            {{--                            <p class="font-size-md-18 animated slideInUp">--}}
                            {{--                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor--}}
                            {{--                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud--}}
                            {{--                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure--}}
                            {{--                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.--}}
                            {{--                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt--}}
                            {{--                                mollit anim id est laborum.--}}
                            {{--                            </p>--}}
                            <a href="{{ route('carasel.one') }}" class="btn btn-primary mt-3 mx-2 animated slideInUp">Read
                                more</a>
                            {{--                                                        <a href="#" class="btn btn-outline-white mt-3 mx-2 animated slideInUp">Registration</a>--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item height-90vh padding-y-80">
                <div class="bg-absolute" data-dark-overlay="5"
                     style="background:url(assets/img/home/carousel/two.jpg) no-repeat"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 mx-auto text-center text-white">
                            <h2 class="display-lg-4 font-weight-bold text-white animated slideInUp">
                                Building Capacity for Compliance Readiness through Advanced Data
                                Protection Training
                            </h2>
                            {{--                            <p class="font-size-md-18 animated slideInUp">--}}
                            {{--                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor--}}
                            {{--                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud--}}
                            {{--                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure--}}
                            {{--                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.--}}
                            {{--                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt--}}
                            {{--                                mollit anim id est laborum.--}}
                            {{--                            </p>--}}
                            <a href="{{ route('carasel.two') }}" class="btn btn-primary mt-3 mx-2 animated slideInUp">Read More</a>
                            {{--                            <a href="#" class="btn btn-outline-white mt-3 mx-2 animated slideInUp">Registration</a>--}}
                        </div>
                    </div>
                </div>
            </div>


            <div class="carousel-item height-90vh padding-y-80">
                <div class="bg-absolute" data-dark-overlay="5"
                     style="background:url(assets/img/home/carousel/three.jpg) no-repeat"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 mx-auto text-center text-white">
                            <h4 class="display-lg-4 font-weight-bold text-white animated slideInUp">
                                Achieving Compliance through Outsourced Data Protection Services
                            </h4>
                            {{--                            <p class="font-size-md-18 animated slideInUp">--}}
                            {{--                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor--}}
                            {{--                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud--}}
                            {{--                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure--}}
                            {{--                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.--}}
                            {{--                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt--}}
                            {{--                                mollit anim id est laborum.--}}
                            {{--                            </p>--}}
                            <a href="{{ route('carasel.three') }}" class="btn btn-primary mt-3 mx-2 animated slideInUp">Read More</a>
                            {{--                            <a href="#" class="btn btn-outline-white mt-3 mx-2 animated slideInUp">Registration</a>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item height-90vh padding-y-80">
                <div class="bg-absolute" data-dark-overlay="5"
                     style="background:url(assets/img/home/carousel/IMAGE07_6.jpg) no-repeat"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 mx-auto text-center text-white">
                            <h4 class="display-lg-4 font-weight-bold text-white animated slideInUp">
                                Demonstrating Compliance through Data Audits
                            </h4>
                            {{--                            <h2 class="display-lg-3 font-weight-bold text-primary animated slideInUp">--}}
                            {{--                                college / university--}}
                            {{--                            </h2>--}}
                            {{--                            <p class="font-size-md-18 animated slideInUp">--}}
                            {{--                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor--}}
                            {{--                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud--}}
                            {{--                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure--}}
                            {{--                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.--}}
                            {{--                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt--}}
                            {{--                                mollit anim id est laborum.--}}
                            {{--                            </p>--}}
                            <a href="{{ route('carasel.four') }}" class="btn btn-primary mt-3 mx-2 animated slideInUp">Read more</a>
                            {{--                            <a href="#" class="btn btn-outline-white mt-3 mx-2 animated slideInUp">Registration</a>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item height-90vh padding-y-80">
                <div class="bg-absolute" data-dark-overlay="5"
                     style="background:url(assets/img/home/carousel/IMAGE07_3.jpg) no-repeat"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 mx-auto text-center text-white">
                            <h4 class="display-lg-4 font-weight-bold text-white animated slideInUp">
                                Managing Risk through Data Protection Impact Assessments
                            </h4>
                            {{--                            <h2 class="display-lg-3 font-weight-bold text-primary animated slideInUp">--}}
                            {{--                                college / university--}}
                            {{--                            </h2>--}}
                            {{--                            <p class="font-size-md-18 animated slideInUp">--}}
                            {{--                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor--}}
                            {{--                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud--}}
                            {{--                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure--}}
                            {{--                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.--}}
                            {{--                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt--}}
                            {{--                                mollit anim id est laborum.--}}
                            {{--                            </p>--}}
                            <a href="{{ route('carasel.five') }}" class="btn btn-primary mt-3 mx-2 animated slideInUp">Read More</a>
                            {{--                            <a href="#" class="btn btn-outline-white mt-3 mx-2 animated slideInUp">Registration</a>--}}
                        </div>
                    </div>
                </div>
            </div>
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
                <div class="col-md-3 mt-4 text-center shadow-primary--onHover">
                    <div class="iconbox iconbox-xxl font-size-26 bg-primary-0_2 mt-5">
                        <i class="ti-shield text-primary text-center"></i>
                    </div>
                    <h4 class="my-4">
                        Outsourced Data Protection Officers
                    </h4>
                    <p>
                        Investig ationes demons travg ectores legere lrus quod legunt saepius.
                    </p>
                    <a href="#" class="btn btn-outline-primary align-self-start mt-2 mb-3 p-3">
                        Read More
                    </a>
                </div>
                <div class="col-md-3 mt-4 text-center shadow-primary--onHover">
                    <div class="iconbox iconbox-xxl font-size-26 bg-primary-0_2 mt-5">
                        <i class="ti-book text-primary text-center"></i>
                    </div>
                    <h4 class="my-4">
                        Data Protection Training
                    </h4>
                    <p>
                        Investig ationes demons travg ectores legere lrus quod legunt saepius.
                    </p>
                    <a href="#" class="btn btn-outline-primary align-self-start mt-2 mb-3 p-3">
                        Read More
                    </a>
                </div>
                <div class="col-md-3 mt-4 text-center shadow-primary--onHover">
                    <div class="iconbox iconbox-xxl font-size-26 bg-primary-0_2 mt-5">
                        <i class="ti-light-bulb text-primary text-center"></i>
                    </div>
                    <h4 class="my-4">
                        Data Protection Consultancy
                    </h4>
                    <p>
                        Investig ationes demons travg ectores legere lrus quod legunt saepius.
                    </p>
                    <a href="#" class="btn btn-outline-primary align-self-start mt-2 mb-3 p-3">
                        Read More
                    </a>
                </div>
                <div class="col-md-3 mt-4 text-center shadow-primary--onHover">
                    <div class="iconbox iconbox-xxl font-size-26 bg-primary-0_2 mt-5">
                        <i class="ti-clipboard text-primary text-center"></i>
                    </div>
                    <h4 class="my-4">
                        Data Audit
                    </h4>
                    <p>
                        Investig ationes demons travg ectores legere lrus quod legunt saepius.
                    </p>
                    <a href="#" class="btn btn-outline-primary align-self-start mt-2 mb-3 p-3">
                        Read More
                    </a>
                </div>
            </div>
        </div> <!-- END container-->
    </section>

    <section>
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6 bg-cover bg-center text-white padding-y-80"
                     style="background:url(assets/img/home/IMAGE07_28.jpg) no-repeat">
                    <div class="padding-x-lg-100 wow pulse" style="visibility: visible; animation-name: pulse;">
                        <h2 class="text-white mb-4">
                            Mission
                        </h2>
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
                        <h2 class="text-white mb-4">
                            Vision
                        </h2>
                        <p class="font-weight-bold">
                            To be the brand of choice in our chosen service markets in Zambia and
                            in the region
                        </p>
                        {{--                        <a href="#" class="btn btn-white mt-4">Apply now</a>--}}
                    </div>
                </div>
            </div>
        </div> <!-- END container-->
    </section>



    <section class="padding-y-60 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="mb-4">
                        Blogs
                    </h2>
                    <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
                </div>
            </div>
            <a href="#" class="btn btn-primary mx-2 mt-3 text-center">View all Blogs</a>

            <div class="row">

                <div class="col-lg-4 col-md-6 marginTop-30 hover:shadow-v3">
                    <article class="card p-3">
                        <div class="card-img">
                            <a href="">
                                <img class="rounded w-100" src="assets/img/blog/standard/2.jpg" alt="">
                            </a>
                        </div>
                        <div class="card-body px-0">
                            <a class="text-primary" href="#">Programming</a>
                            <a href="#" class="h4 my-2">
                                The Ultimate Guide to Game Development
                            </a>
                            <p>
                                30 Mar, 2018 - by <a class="text-primary" href="#">John doe</a>
                            </p>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 marginTop-30 p-3">
                    <article class="card">
                        <div class="card-img">
                            <a href="">
                                <img class="rounded w-100" src="assets/img/blog/standard/3.jpg" alt="">
                            </a>
                        </div>
                        <div class="card-body px-0">
                            <a class="text-primary" href="#">Corporate</a>
                            <a href="#" class="h4 my-2">
                                How to Incorporate This One Employee
                            </a>
                            <p>
                                6 Apr, 2018 - by <a class="text-primary" href="#">Anthony Brooks</a>
                            </p>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6 marginTop-30 p-3">
                    <article class="card">
                        <div class="card-img">
                            <a href="">
                                <img class="rounded w-100" src="assets/img/blog/standard/2.jpg" alt="">
                            </a>
                        </div>
                        <div class="card-body px-0">
                            <a class="text-primary" href="#">PHP &amp; My SQL</a>
                            <a href="#" class="h4 my-2">
                                Expand Your Programming Knowledge
                            </a>
                            <p>
                                28 Mar, 2018 - by <a class="text-primary" href="#">Alex</a>
                            </p>
                        </div>
                    </article>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

    <section class="padding-y-100 bg-cover bg-center jarallax" data-primary-overlay="8"
             style="background:url(assets/img/1920/530.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <p>FAQs</p>
                    <h2 class="text-white mb-4">
                        What type of personal information do we collect?
                    </h2>
                    <p class="font-size-18">
                        Investig tiones demons travge wunt ectores legere lkurus quod legunt saepiu clartas est
                        consectetur adipi sicing elitsed kdo eusmod tempor cididunt wuti labore.
                    </p>
                    {{--                    <a href="#" class="btn btn-white mx-2 mt-3">Take The Tour</a>--}}
                    <a href="#" class="btn btn-outline-white mx-2 mt-3">Read More</a>
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
            <a href="#" class="btn btn-primary mx-2 mt-3 text-center">View all Events</a>

            <div class="row">


                <div class="col-lg-4 col-md-6 marginTop-30">
                    <div class="card height-100p shadow-v1">
                        <img class="card-img-top" src="assets/img/384x320/5.jpg" alt="">
                        <div class="card-body">
                            <a href="{{ route('dataGovernanceWorkshop') }}" class="h4">
                                CEO Attends AUDA-NEPAD Data Governance Policy Stakeholder Engagement Workshop
                            </a>
                            <ul class="list-unstyled line-height-lg mt-4">
                                <li><i class="ti-time text-primary mr-2"></i>16-18 Sept, 2024</li>
                                <li><i class="ti-location-pin text-primary mr-2"></i>Kabwe, Zambia</li>
                            </ul>
                            <a href="{{ route('dataGovernanceWorkshop') }}" class="btn btn-link pl-0">View Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 marginTop-30">
                    <div class="card height-100p shadow-v1">
                        <img class="card-img-top" src="assets/img/384x320/4.jpg" alt="">
                        <div class="card-body">
                            <a href="{{ route('trainersWorkshop') }}" class="h4">
                                CEO Attends AUDA-NEPAD Training of Trainers Workshop
                            </a>
                            <ul class="list-unstyled line-height-lg mt-4">
                                <li><i class="ti-time text-primary mr-2"></i>20-22 Aug, 2024</li>
                                <li><i class="ti-location-pin text-primary mr-2"></i>Lusaka, Zambia</li>
                            </ul>
                            <a href="{{ route('trainersWorkshop') }}" class="btn btn-link pl-0">View Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 marginTop-30">
                    <div class="card height-100p shadow-v1">
                        <img class="card-img-top" src="assets/img/384x320/3.jpg" alt="">
                        <div class="card-body">
                            <a href="{{ route('pressRelease') }}" class="h4">
                                Press Release
                            </a>
                            <ul class="list-unstyled line-height-lg mt-4">
                                <li><i class="ti-time text-primary mr-2"></i>23 Sept, 2024</li>
                                <li><i class="ti-location-pin text-primary mr-2"></i>Global</li>
                            </ul>
                            <a href="{{ route('pressRelease') }}" class="btn btn-link pl-0">View Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 marginTop-30">
                    <div class="card height-100p shadow-v1">
                        <img class="card-img-top" src="assets/img/384x320/5.jpg" alt="">
                        <div class="card-body">
                            <a href="{{ route('dataProtectionHealthSector') }}" class="h4">
                                CEO &amp; Principal Consultant Delivers Data Protection Awareness Training to the Health Sector
                            </a>
                            <ul class="list-unstyled line-height-lg mt-4">
                                <li><i class="ti-time text-primary mr-2"></i>16-18 Sept, 2024</li>
                                <li><i class="ti-location-pin text-primary mr-2"></i>Kabwe, Zambia</li>
                            </ul>
                            <a href="{{ route('dataProtectionHealthSector') }}" class="btn btn-link pl-0">View Details</a>
                        </div>
                    </div>
                </div>


                {{--                <div class="col-lg-4 col-md-6 marginTop-30">--}}
{{--                    <div class="card height-100p shadow-v1">--}}
{{--                        <img class="card-img-top" src="assets/img/384x320/5.jpg" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <a href="#" class="h4">--}}
{{--                                Harvard Panel Examines Future of Cities--}}
{{--                            </a>--}}
{{--                            <ul class="list-unstyled line-height-lg mt-4">--}}
{{--                                <li><i class="ti-time text-primary mr-2"></i>25-30 Dec, 2018</li>--}}
{{--                                <li><i class="ti-location-pin text-primary mr-2"></i>Cambridge, USA</li>--}}
{{--                            </ul>--}}
{{--                            <a href="page-event-details.html" class="btn btn-link pl-0">View Details</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6 marginTop-30">--}}
{{--                    <div class="card height-100p shadow-v1">--}}
{{--                        <img class="card-img-top" src="assets/img/384x320/4.jpg" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <a href="#" class="h4">--}}
{{--                                Farmer's Market at Harvard ceremony--}}
{{--                            </a>--}}
{{--                            <ul class="list-unstyled line-height-lg mt-4">--}}
{{--                                <li><i class="ti-time text-primary mr-2"></i>25-30 Dec, 2018</li>--}}
{{--                                <li><i class="ti-location-pin text-primary mr-2"></i>Cambridge, USA</li>--}}
{{--                            </ul>--}}
{{--                            <a href="page-event-details.html" class="btn btn-link pl-0">View Details</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6 marginTop-30">--}}
{{--                    <div class="card height-100p shadow-v1">--}}
{{--                        <img class="card-img-top" src="assets/img/384x320/3.jpg" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <a href="#" class="h4">--}}
{{--                                A Conversation with Wynton Marsalis--}}
{{--                            </a>--}}
{{--                            <ul class="list-unstyled line-height-lg mt-4">--}}
{{--                                <li><i class="ti-time text-primary mr-2"></i>25-30 Dec, 2018</li>--}}
{{--                                <li><i class="ti-location-pin text-primary mr-2"></i>Cambridge, USA</li>--}}
{{--                            </ul>--}}
{{--                            <a href="page-event-details.html" class="btn btn-link pl-0">View Details</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

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
                    <div class="hover:parent">
                        <img class="w-100 transition-0_3 hover:zoomin" src="assets/img/school/1.jpg" alt="">
                        <div class="card-img-overlay  transition-0_3 flex-center bg-black-0_7 hover:show">
                            <a href="assets/img/school/1.jpg" data-fancybox="gallery1"
                               class="iconbox bg-white ti-zoom-in text-primary"></a>
                        </div>
                    </div>
                    <div class="hover:parent">
                        <img class="w-100 transition-0_3 hover:zoomin" src="assets/img/school/2.jpg" alt="">
                        <div class="card-img-overlay  transition-0_3 flex-center bg-black-0_7 hover:show">
                            <a href="assets/img/school/2.jpg" data-fancybox="gallery1"
                               class="iconbox bg-white ti-zoom-in text-primary"></a>
                        </div>
                    </div>
                    <div class="hover:parent">
                        <img class="w-100 transition-0_3 hover:zoomin" src="assets/img/school/3.jpg" alt="">
                        <div class="card-img-overlay  transition-0_3 flex-center bg-black-0_7 hover:show">
                            <a href="assets/img/school/3.jpg" data-fancybox="gallery1"
                               class="iconbox bg-white ti-zoom-in text-primary"></a>
                        </div>
                    </div>
                    <div class="hover:parent">
                        <img class="w-100 transition-0_3 hover:zoomin" src="assets/img/school/4.jpg" alt="">
                        <div class="card-img-overlay  transition-0_3 flex-center bg-black-0_7 hover:show">
                            <a href="assets/img/school/4.jpg" data-fancybox="gallery1"
                               class="iconbox bg-white ti-zoom-in text-primary"></a>
                        </div>
                    </div>
                    <div class="hover:parent">
                        <img class="w-100 transition-0_3 hover:zoomin" src="assets/img/school/2.jpg" alt="">
                        <div class="card-img-overlay  transition-0_3 flex-center bg-black-0_7 hover:show">
                            <a href="assets/img/school/2.jpg" data-fancybox="gallery1"
                               class="iconbox bg-white ti-zoom-in text-primary"></a>
                        </div>
                    </div>
                    <div class="hover:parent">
                        <img class="w-100 transition-0_3 hover:zoomin" src="assets/img/school/3.jpg" alt="">
                        <div class="card-img-overlay  transition-0_3 flex-center bg-black-0_7 hover:show">
                            <a href="assets/img/school/3.jpg" data-fancybox="gallery1"
                               class="iconbox bg-white ti-zoom-in text-primary"></a>
                        </div>
                    </div>
                    <div class="hover:parent">
                        <img class="w-100 transition-0_3 hover:zoomin" src="assets/img/school/4.jpg" alt="">
                        <div class="card-img-overlay  transition-0_3 flex-center bg-black-0_7 hover:show">
                            <a href="assets/img/school/4.jpg" data-fancybox="gallery1"
                               class="iconbox bg-white ti-zoom-in text-primary"></a>
                        </div>
                    </div>
                </div>
            </div> <!-- END row-->

        </div> <!-- END container-->
    </section>
@endsection

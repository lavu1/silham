@extends('layouts.master')
@section('page_title', 'Home')
@section('content')
    <div class="padding-y-60 bg-cover" data-dark-overlay="6"
         style="background:url(assets/img/breadcrumb-bg.jpg) no-repeat">
        <div class="container">
            <h1 class="text-white">
                Services
            </h1>
            <ol class="breadcrumb breadcrumb-double-angle text-white bg-transparent p-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Services</a></li>
                <li class="breadcrumb-item">Data Protection Training</li>
            </ol>
        </div>
    </div>


    <section class="padding-y-60 bg-light">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mt-4">
                    <div class="card shadow-v1">
                        <div class="card-body padding-40">
                            <h2 class="card-title">
                                Data Protection Training (DPT)
                            </h2>
                            <p>
                                Silham Consulting and Training Services offers tailor-made training in Data Protection
                                to
                                specific groups of any organisation’s staff and other stakeholders. From the top
                                management,
                                including board of directors, to the lowest level of data facing staff, Silham has
                                designed
                                appropriate awareness and training materials that would help equip each level of the
                                organisation
                                with the right knowledge and skills to be able to perform their respective data
                                protection roles more effectively.

                            </p>
                            <h4 class="my-3">
                                The following are the different awareness and training services that organisations can
                                access
                                at Silham Consulting & Training Services:
                            </h4>
                            <ul class="list-unstyled list-style-icon list-icon-check my-4">
                                <li>Data Protection Awareness Training for Top Management and Board Members
                                </li>
                                <li>Data Protection Training for Middle Managers & Data Owners
                                </li>
                                <li>Data Protection Training for Data Facing Staff
                                </li>
                                <li>Data Protection Training for Software Developers & Systems Analysts
                                </li>
                                <li>Fundamentals of Data Protection Training for DPO’s
                                </li>
                                <li>Data Protection Training for Data Protection Auditors
                                </li>

                            </ul>
                            <div class="row">
                                <h4 class="my-3 col-12">
                                    Topics Covered
                                </h4>
                                <div class="col-md-6 mb-4">
                                    <ul class="list-unstyled list-style-icon list-icon-bullet">
                                        <li><a class="nav-link__list" href="#"> Data Protection Consultancy </a></li>
                                        <li><a class="nav-link__list" href="#"> Data Protection Auditor Services </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <ul class="list-unstyled list-style-icon list-icon-bullet">
                                        <li><a class="nav-link__list" href="#"> Data Protection Training </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-4">
                    <div class="card shadow-v1">
                        <div class="card-body">
                            <h4 class="mb-2">
                                Get in touch
                            </h4>

                            <div class="border-bottom py-3">
                                <div class="media">
                                    <span class="iconbox iconbox-md bg-primary text-white"><i
                                            class="ti-email"></i></span>
                                    <div class="media-body ml-3">
                                        <a href="mailto:info@silhamconsulting.co.zm" class="h5">info@silhamconsulting.co.zm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-v1 mt-4">
                        <div class="card-body">
                            <h4 class="mb-4">
                                How To Register
                            </h4>
                            <p>
                                Investig ationes demons travge is vunt lectores legee kedlrus quodk legunt saepius was
                                claritas.
                            </p>
                            <ul class="list-unstyled list-style-icon list-icon-bullet mt-4 mb-0">
                                <li>Maecenas in finibus neque</li>
                                <li>Vivamus in ipsum vehicula</li>
                                <li>Interdum cursus venenatis</li>
                                <li>Morbi klibero elementum</li>
                            </ul>
                        </div>
                        <div class="card-footer border-top">
                            <div class="media">
                                <i class="ti-mobile text-primary mt-2"></i>
                                <div class="media-body ml-3">
                                    <h6 class="my-0">Call for Help: </h6>
                                    <a href="tel:+260750786820">+260 750 78 6820</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>
@endsection

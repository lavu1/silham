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
                <li class="breadcrumb-item">Outsourced Data Protection Officer (DPO)</li>
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
                                Data Protection Auditor Services
                            </h2>
                            <p>
                                The Zambian Data Protection Act of 2021 requires that annual audits on the compliance of data controllers and
                                processors are conducted by Data Protection Auditors registered with the Data Protection Commission (DPC)</p>
                            <img class="card-img-top w-100" src="assets/img/750/450.jpg" alt="">
                            <p>
                                Silham Consulting and Training Services is a registered Data Protection Auditor firm with the DPC
                                and provides Data Protection Audits as provided for in the Act. Silham follows industry best practices
                                in its Data Protection Audit assignments, from the time of engagement with the customer, right up to
                                the time of issuing the Final Audit Report.</p>
                            <h4 class="my-3">
                                The following are the activities performed by Silham during audits in line with the provisions of the Act:
                            </h4>
                            <ul class="list-unstyled list-style-icon list-icon-check my-4">
                                <li>Assess the organisation’s data protection policies, processes and procedures;</li>
                                <li>Review personal data handling practices;</li>
                                <li>Examine IT systems and infrastructure of the organisation;</li>
                                <li>Interview staff members who handle or face personal data;</li>
                                <li>Carry out an assessment of the organisation’s security measures,
                                    such as firewalls, encryption, and access controls, to ensure they are adequate;</li>
                                <li>Provide a report on the results of the audit, providing further information on
                                    areas where the controller or processor needs to improve its data protection practices
                                    and make recommendations for remediation.</li>

                                <li>Submit or facilitate the submission of the Final Audit Report to the regulator
                                    in line with the relevant provisions of the Data Protection Act. </li>
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
                                        <a href="mailto:support@echotheme.com" class="h5">support@silhma.com</a>
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
                                    <a href="tel:+8801740411513">+8801740411513</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>
@endsection

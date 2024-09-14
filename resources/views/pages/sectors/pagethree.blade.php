@extends('layouts.master')
@section('page_title', 'Medical & Healthcare')
@section('content')
    <section class="paddingBottom-100">
        <div class="container">

            <div class="row">
                <div class="col-lg-9 marginTop-30">
                    <div class="col-12 mt-4">
                        <h4>
                            Medical & Healthcare
                        </h4>
                        <p>
                            The Medical and Healthcare sector processes medical and health personal data of its clients
                            that is categorized as Sensitive Personal Data by the Data Protection Act. The Data
                            Protection Act imposes high restrictions on how sensitive personal data is collected, used,
                            stored, transmitted and shared with 3rd parties. Medical and health services providers such
                            as hospitals, clinics, medical laboratories, medical and health research institutions and
                            clinical trials sponsors, ought to be aware of the provisions of the Act regarding
                            processing of Sensitive Personal data and be compliant. The consequences for non-compliance
                            are very heavy, including stiff penalties and possible irreparable reputational damage.
                        </p>
                        <div class="wrapper mb-1 mt-2">
                            <p style="text-align: center;">
                                <a class="customBtn" style="float: none;color: #000; font-weight: bold;"
                                   href="mailto:info@silhamconsulting.co.zm"><i class="fas fa-envelope"></i> Email</a>
                                <a class="customBtn" style="float: none; color: #000; font-weight: bold;"
                                   href="Tel: +260750786820"><i class="fa fa-phone fa-fw fa-lg"></i>Call</a>
                            </p>
                        </div>
                        <p>
                            At Silham Consulting and Training services, we help the Medical and Health Services
                            Providers navigate the complexity that the Data Protection Act has introduced, in order to
                            ensure compliance to the Act. We offer a range of data protection services that are tailored
                            towards helping your organisation overcome obstacles related to data protection. The Data
                            Protection Awareness Training, Data Protection Advanced Training, Introduction to DPO
                            Practice Training, Data Protection Consultancy, Outsourced Data Protection Officer and Data
                            Protection Auditor services, are all designed to help your organisation better understand
                            and manage the personal data you process in line with the Data Protection Act and other
                            related laws.

                        </p>


                        <p><u><a class="link" href="#">For more information on how Silham can help your organisation
                                    move from mere awareness to actual compliance to the Data Protection Act, get in
                                    touch with us. </a></u>
                        </p>

                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="col-12 mb-4">
                                    <h2>
                                        Read on -
                                    </h2>
                                    <div class="width-5rem bg-primary height-4 rounded"></div>
                                </div>
                            </div>
                            <div class="col-md-6 my-2">
                                <ul class="list-unstyled list-style-icon list-icon-check">
                                    <li><a href="{{ route('sectors.one') }}" class="link"> Banking & Finance</a></li>
                                    <li><a href="{{ route('sectors.two') }}" class="link"> Medical & Healthcare</a>
                                    <li><a href="{{ route('sectors.four') }}" class="link"> Technology</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 my-2">
                                <ul class="list-unstyled list-style-icon list-icon-check">
                                    <li><a href="{{ route('sectors.five') }}" class="link"> Education</a></li>
                                    <li><a href="{{ route('sectors.six') }}" class="link">Non-Governmental
                                            Organisations </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6 my-2">
                                <h4>
                                    Services
                                </h4>
                                <ul class="list-unstyled list-style-icon list-icon-bullet">
                                    <li><a href="{{ route('services.dpo') }}" class="link">Outsourced Data Protection
                                            Officer (DPO)</a></li>
                                    <li><a href="{{ route('services.dpt') }}" class="link">Data Protection Training</a>
                                    </li>
                                    <li><a href="{{ route('services.dpc') }}" class="link">Data Protection
                                            Consultancy</a></li>
                                    <li><a href="{{ route('services.dpas') }}" class="link">Data Protection Auditor
                                            Services</a></li>
                                </ul>
                            </div>

                            <div class="col-md-6 my-2">
                                <h4>
                                    Related Topics
                                </h4>
                                <ul class="list-unstyled list-style-icon list-icon-bullet">
                                    <li><a class="link" href="{{ route('carasel.one') }}">Raising Awareness through Data
                                            Protection Awareness Workshops</a></li>
                                    <li><a class="link" href="{{ route('carasel.two') }}">Building Capacity for
                                            Compliance Readiness through Advanced Data Protection Training</a></li>
                                    <li><a class="link" href="{{ route('carasel.three') }}">Achieving Compliance through
                                            Outsourced Data Protection Services</a></li>
                                    <li><a class="link" href="{{ route('carasel.four') }}">Demonstrating Compliance
                                            through Data Audits</a></li>
                                    <li><a class="link" href="{{ route('carasel.five') }}">Managing Risk through Data
                                            Protection Impact Assessments</a></li>

                                </ul>
                            </div>
                        </div> <!-- END row-->
                    </div>
                </div> <!-- END col-lg-9 -->

                <aside class="col-lg-3">
                    <div class="card marginTop-30 shadow-v1 hover:parent">
                        <img class="hover:zoomin" src="assets/img/262x230/9.jpg" alt="">
                    </div>
                    <div class="card border border-light marginTop-30 shadow-v1 p-2">
                        <h4 class="text-center">
                         <span class="iconbox iconbox-lg border border-primary text-primary mt-1">
                            <i class="fa fa-exclamation font-size-24 text-center"></i>
                        </span>
                        </h4>
                        <p>
                            This page explains what the new legislation means for medical and
                            healthcare organisations and the key areas they need to consider
                            when managing and protecting personal data.
                        </p>
                    </div>

                    <div class="card border border-light marginTop-30 shadow-v1">
                        <h4 class="card-header border-bottom mb-0 h6">New & Events</h4>
                        <ul class="card-body list-unstyled mb-0">
                            <li class="mb-2"><a href="">All Events</a></li>
                            <li class="mb-2"><a href="">DPO session</a></li>
                            <li class="mb-2"><a href="">Free Courses</a></li>
                        </ul>
                    </div>
                    <div class="card marginTop-30 shadow-v1 hover:parent">
                        <img class="hover:zoomin" src="assets/img/262x230/9.jpg" alt="">
                        <div class="card-img-overlay text-white bg-black-0_6">
                            <h4 class="card-title">
                                Enriched Data Experiences
                            </h4>
                            <p class="my-3">
                                Get your data protection certificate now.
                            </p>
                            <a href="#" class="btn btn-white">Join Now</a>
                        </div>
                    </div>
                    <div class="card border border-light marginTop-30 shadow-v1">
                        <h4 class="card-header border-bottom mb-0 h6">Blogs</h4>
                        <ul class="card-body list-unstyled mb-0">
                            <li class="mb-2"><a href="">All Events</a></li>
                            <li class="mb-2"><a href="">DPO session</a></li>
                            <li class="mb-2"><a href="">Free Courses</a></li>
                        </ul>
                    </div>
                </aside> <!-- END col-lg-3 -->

            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>
@endsection

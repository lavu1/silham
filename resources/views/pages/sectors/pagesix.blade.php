@extends('layouts.master')
@section('page_title', 'Non-Governmental Organisations')
@section('content')
    <section class="paddingBottom-100">
        <div class="container">

            <div class="row">
                <div class="col-lg-9 marginTop-30">
                    <div class="col-12 mt-4">
                        <h4>
                            Non-Governmental Organisations
                        </h4>
                        <p>
                            Non-governmental organisations across different sectors, process huge volumes of personal
                            data in their work, especially when carrying out research work. Whatever the size of your
                            organisation, and whether you are an economic, social, environmental, animal, health, women,
                            children, or human rights non-governable organisation, you are obliged to comply with
                            various provisions of the Data Protection Act, as long as you collect, use, store and share
                            such data. The law is heavy on penalties for non-compliance and the reputational damage
                            arising out of non-compliance can be irreparable for an organisation. There is therefore no
                            excuse for non-compliance.
                        </p>
                        <div class="wrapper mb-1 mt-2">
                            <p style="text-align: center;">
                                <a class="customBtn" style="float: none;color: #000; font-weight: bold;"
                                   href="mailto:hello@dpocentre.com"><i class="fas fa-envelope"></i> Email</a>
                                <a class="customBtn" style="float: none; color: #000; font-weight: bold;"
                                   href="Tel: +260750786820"><i class="fa fa-phone fa-fw fa-lg"></i>Call</a>
                            </p>
                        </div>
                        <p>
                            At Silham Consulting and Training Services, we help take away the worry of how your
                            organisation will navigate the complexity of having to comply with the requirements of the
                            Act. Silham has assembled a team of consultants that are well vested in the data protection
                            law and relevant technological know-how to help your organisation navigate the complexities
                            of this law. We offer a range of data protection services that are tailored towards helping
                            your organisation overcome obstacles related to data protection. The Data Protection
                            Awareness Training, Data Protection Advanced Training, Introduction to DPO Practice
                            Training, Data Protection Consultancy, Outsourced Data Protection Officer and Data
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
                                    <li><a href="{{ route('sectors.two') }}" class="link"> Pensions & Insurance</a>
                                    <li><a href="{{ route('sectors.three') }}" class="link"> Medical & Healthcare</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 my-2">
                                <ul class="list-unstyled list-style-icon list-icon-check">
                                    <li><a href="{{ route('sectors.four') }}" class="link"> Technology </a></li>
                                    <li><a href="{{ route('sectors.five') }}" class="link">Education </a>
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

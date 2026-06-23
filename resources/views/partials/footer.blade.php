<footer class="site-footer">
    <div class="footer-top bg-dark text-white-0_6 pt-5 paddingBottom-100">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 mt-5">
                    <img src="{{ cms_media_url(cms_setting('footer_logo_path', 'assets/img/logo4.png')) }}" alt="Logo">
                    <div class="margin-y-40">
                        <p>
                            {{ cms_setting('footer_about', 'Silham Consulting and Training Services helps organisations strengthen privacy governance, data protection compliance, training, audits, and outsourced DPO support.') }}
                        </p>
                    </div>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="{{ cms_setting('social_facebook', '#') }}" rel="noreferrer"><i
                                    class="ti-facebook"> </i></a></li>
                        <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="{{ cms_setting('social_twitter', '#') }}" rel="noreferrer"><i
                                    class="ti-twitter"> </i></a></li>
                        <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="{{ cms_setting('social_linkedin', '#') }}" rel="noreferrer"><i
                                    class="ti-linkedin"> </i></a></li>
                        <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="{{ cms_setting('social_pinterest', '#') }}" rel="noreferrer"><i
                                    class="ti-pinterest"></i></a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mt-5">
                    <h4 class="h5 text-white">Contact Us</h4>
                    <div class="width-3rem bg-primary height-3 mt-3"></div>
                    <ul class="list-unstyled marginTop-40">
                        <li class="mb-3"><i class="ti-headphone mr-3"></i><a
                                href="tel:{{ preg_replace('/\\s+/', '', cms_setting('contact_phone', '+260750786820')) }}">{{ cms_setting('contact_phone', '+260 750 78 6820') }} </a></li>
                        <li class="mb-3"><i class="ti-email mr-3"></i><a href="mailto:{{ cms_setting('contact_email', 'info@silhamconsulting.co.zm') }}">{{ cms_setting('contact_email', 'info@silhamconsulting.co.zm') }}</a>
                        </li>
                        <li class="mb-3">
                            <div class="media">
                                <i class="ti-location-pin mt-2 mr-3"></i>
                                <div class="media-body">
                                    <span>{{ cms_setting('contact_address', 'Plot 9698 Mitengo , Ndola Zambia') }}</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 mt-5">
                    <h4 class="h5 text-white">Quick links</h4>
                    <div class="width-3rem bg-primary height-3 mt-3"></div>
                    <ul class="list-unstyled marginTop-40">
                        <li class="mb-2"><a href="{{ route('about') }}">About Us</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li class="mb-2"><a href="{{ route('faqs') }}">FAQs</a></li>
                        <li class="mb-2"><a href="{{ route('services.dpo') }}">Services</a></li>
                        <li class="mb-2"><a href="{{ route('blog') }}">Blogs</a></li>
                        <li class="mb-2"><a href="{{ route('events') }}">Latest News</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 mt-5">
                    <h4 class="h5 text-white">You may like</h4>
                    <div class="width-3rem bg-primary height-3 mt-3"></div>
                    <ul class="list-unstyled marginTop-40">
                        <li><a href="{{ route('services.dpo') }}" class="link" >Outsourced Data Protection Officer (DPO)</a> </li>
                        <li><a href="{{ route('services.dpt') }}" class="link" >Data Protection Training</a> </li>
                        <li><a href="{{ route('services.dpc') }}" class="link" >Data Protection Consultancy</a> </li>
                        <li><a href="{{ route('services.dpas') }}" class="link" >Data Protection Auditor Services</a></li>
                    </ul>
                </div>
{{--                <div class="col-lg-4 col-md-6 mt-5">--}}
{{--                    <h4 class="h5 text-white">Topics</h4>--}}
{{--                    <div class="width-3rem bg-primary height-3 mt-3"></div>--}}
{{--                    <ul class="list-unstyled marginTop-40">--}}
{{--                        <li><a class="link" href="#">Banking and Finance</a> </li>--}}
{{--                        <li><a class="link" href="#">Pensions & Insurance</a> </li>--}}
{{--                        <li><a class="link" href="#">Medical & Healthcare</a> </li>--}}
{{--                        <li><a class="link" href="#">Technology</a> </li>--}}
{{--                        <li><a class="link" href="#">Education</a> </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>

        </div> <!-- END row-->
    </div> <!-- END container-->
    </div> <!-- END footer-top-->

            <div class="footer-bottom bg-black-0_9 py-5 text-center">
                <div class="container">
                    <p class="text-white-0_5 mb-0">{{ cms_setting('footer_copyright', '© 2024 Silham. All rights reserved.') }} Created by <a href="/">Silham</a>
                    </p>
                </div>
            </div>  <!-- END footer-bottom-->
</footer> <!-- END site-footer -->


<div class="scroll-top">
    <i class="ti-angle-up"></i>
</div>

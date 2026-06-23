<header class="site-header bg-dark text-white-0_5">
    <div class="container">
        <div class="row align-items-center justify-content-end mx-0 p-3">
            <ul class="list-inline d-none d-lg-block mb-0">
                <li class="list-inline-item mr-3">
                    <div class="d-flex align-items-center">
                        <i class="ti-email mr-2"></i>
                        <a href="mailto:{{ cms_setting('topbar_email', 'info@silhamconsulting.co.zm') }}">{{ cms_setting('topbar_email', 'info@silhamconsulting.co.zm') }}</a>
                    </div>
                </li>
                <li class="list-inline-item mr-3">
                    <div class="d-flex align-items-center">
                        <i class="ti-headphone mr-2"></i>
                        <a href="tel:{{ preg_replace('/\\s+/', '', cms_setting('topbar_phone', '+260750786820')) }}">{{ cms_setting('topbar_phone', '+260750786820') }}</a>
                    </div>
                </li>
            </ul>
            <ul class="list-inline mb-0">
                <li class="list-inline-item mr-0 p-3 border-right border-left border-white-0_1">
                    <a href="{{ cms_setting('social_facebook', '#') }}" rel="noreferrer"><i class="ti-facebook"></i></a>
                </li>
                <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">
                    <a href="{{ cms_setting('social_twitter', '#') }}" rel="noreferrer"><i class="ti-twitter"></i></a>
                </li>
{{--                <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">--}}
{{--                    <a href="#"><i class="ti-vimeo"></i></a>--}}
{{--                </li>--}}
                <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">
                    <a href="{{ cms_setting('social_linkedin', '#') }}" rel="noreferrer"><i class="ti-linkedin"></i></a>
                </li>
            </ul>
{{--            <ul class="list-inline mb-0">--}}
{{--                <li class="list-inline-item mr-0 p-md-3 p-2 border-right border-left border-white-0_1">--}}
{{--                    <a href="#">login</a>--}}
{{--                </li>--}}
{{--                <li class="list-inline-item mr-0 p-md-3 p-2 border-right border-white-0_1">--}}
{{--                    <a href="#">Register</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
        </div> <!-- END END row-->
    </div> <!-- END container-->
</header><!-- END site header-->

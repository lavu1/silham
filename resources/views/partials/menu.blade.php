<nav class="ec-nav sticky-top bg-primary-0_9 border-primary shadow-danger--onHover shadow-primary text-white">
    <div class="container">
        <div class="navbar p-0 navbar-expand-lg">
            <div class="navbar-brand">
                <a class="logo-default" href="{{ route('home') }}"><img alt="" src="{{ asset('assets/img/logo4.png') }}"></a>
            </div>
            <span aria-expanded="false" class="navbar-toggler ml-auto collapsed" data-target="#ec-nav__collapsible"
                  data-toggle="collapse">
        <div class="hamburger hamburger--spin js-hamburger">
          <div class="hamburger-box">
            <div class="hamburger-inner"></div>
          </div>
        </div>
      </span>
            <div class="collapse navbar-collapse when-collapsed" id="ec-nav__collapsible">
                <ul class="nav navbar-nav ec-nav__navbar ml-auto font-weight-bold font-size-18">
                    <li class="nav-item nav-item__has-dropdown active">
                        <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#"> Services </a>
                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li><a class="nav-link__list {{ Route::is('services.dpo') ? 'active' : '' }}" href="{{ route('services.dpo') }}"> Outsourced Data Protection Officer (DPO)</a></li>
                                <li><a class="nav-link__list {{ Route::is('services.dpt') ? 'active' : '' }}" href="{{ route('services.dpt') }}"> Data Protection Training </a></li>
                                <li><a class="nav-link__list {{ Route::is('services.dpc') ? 'active' : '' }}" href="{{ route('services.dpc') }}"> Data Protection Consultancy </a></li>
                                <li><a class="nav-link__list {{ Route::is('services.dpas') ? 'active' : '' }}" href="{{ route('services.dpas') }}"> Data Protection Auditor Services </a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-item__has-dropdown active">
                        <a class="nav-link dropdown-toggle active mb-5 text-white" data-toggle="dropdown" href="#">Sector</a>
                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li><a class="nav-link__list" href="#">Pensions &amp; Insurance</a></li>
                                <li><a class="nav-link__list" href="#">Medical &amp; Healthcare</a></li>
                                <li><a class="nav-link__list" href="#">Software &amp; Technology</a></li>
                                <li><a class="nav-link__list" href="#">Education</a></li>
                                <li><a class="nav-link__list" href="#">NGO’s</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item navi list-unstyled mt-4">
                        <a class="nav-link__list px-1 {{ Route::is('about') ? 'active' : '' }}" href="{{ route('about') }}"> About Us </a>
                    </li>
                    <li class="nav-item list-unstyled mt-4">
                        <a class="nav-link__list px-2 {{ Route::is('events') ? 'active' : '' }}" href="{{ route('events') }}" > Events & News </a>
                    </li>
                    <li class="nav-item list-unstyled mt-4">
                        <a class="nav-link__list px-1 {{ Route::is('blog') ? 'active' : '' }}" href="{{ route('blog') }}"> Blog </a>
                    </li>
                    <li class="nav-item list-unstyled mt-4">
                        <a class="nav-link__list px-1 {{ Route::is('contact') ? 'active' : '' }}" href="{{ route('contact') }}"> Contact Us</a>
                    </li>

                    <li class="nav-item list-unstyled nav-item__has-dropdown mt-4">
                        <a class="nav-link__list px-1 {{ Route::is('faqs') ? 'active' : '' }}" href="{{ route('faqs') }}"> FAQ's </a>
                    </li>

                </ul>

            </div>

            <div class="nav-toolbar">
                <ul class="navbar-nav ec-nav__navbar">
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a class="nav-link site-search-toggler" href="#">--}}
                    {{--                            <i class="ti-search"></i>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                </ul>
            </div>
        </div>
    </div> <!-- END container-->
</nav> <!-- END ec-nav -->

<div class="site-search">
    <div class="site-search__close bg-black-0_8"></div>
    <form class="form-site-search" action="#" method="POST">
        <div class="input-group">
            <input type="text" placeholder="Search" class="form-control py-3 border-white" required="">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><i class="ti-search"></i></button>
            </div>
        </div>
    </form>
</div>

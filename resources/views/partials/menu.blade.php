<nav class="ec-nav sticky-top bg-white border-primary shadow-danger--onHover shadow-primary">
    <div class="container-fluid">
        <div class="navbar p-0 navbar-expand-lg">
            <div class="navbar-brand">
                <a class="logo-default" href="{{ route('home') }}"><img alt="" src="{{ asset('assets/img/logo3.png') }}"></a>
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
                <ul class="nav navbar-nav ec-nav__navbar ml-auto font-weight-bold font-size-24">
                    <li class="nav-item nav-item__has-dropdown {{ in_array(Route::currentRouteName(), ['services.dpo','services.dpt','services.dpc','services.dpas']) ? 'active bg-primary text-white' : '' }}">
                        <a class="nav-link dropdown-toggle  {{ in_array(Route::currentRouteName(), ['services.dpo','services.dpt','services.dpc','services.dpas']) ? 'text-white' : '' }}" data-toggle="dropdown" href="#"> Services </a>
                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li><a class="nav-link__list {{ Route::is('services.dpo') ? 'active bg-primary text-white' : '' }}" href="{{ route('services.dpo') }}"> Outsourced Data Protection Officer (DPO)</a></li>
                                <li><a class="nav-link__list {{ Route::is('services.dpt') ? 'active bg-primary text-white' : '' }}" href="{{ route('services.dpt') }}"> Data Protection Training </a></li>
                                <li><a class="nav-link__list {{ Route::is('services.dpc') ? 'active bg-primary text-white' : '' }}" href="{{ route('services.dpc') }}"> Data Protection Consultancy </a></li>
                                <li><a class="nav-link__list {{ Route::is('services.dpas') ? 'active bg-primary text-white' : '' }}" href="{{ route('services.dpas') }}"> Data Protection Auditor Services </a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-item__has-dropdown hover:bg-primary">
                        <a class="nav-link dropdown-toggle active mb-0" data-toggle="dropdown" href="#">Sector</a>
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
                    <li class="nav-item nav-item__has-dropdown hover:bg-primary">
                        <a class="nav-link mb-0 {{ Route::is('about') ? 'active bg-primary text-white' : '' }}" href="{{ route('about') }}"> About Us </a>
                    </li>
                    <li class="nav-item nav-item__has-dropdown hover:bg-primary">
                        <a class="nav-link mb-0 hover:text-white {{ Route::is('events') ? 'active bg-primary text-white' : '' }}" href="{{ route('events') }}" > Events & News </a>
                    </li>
                    <li class="nav-item nav-item__has-dropdown hover:bg-primary">
                        <a class="nav-link mb-0 hover:text-white {{ Route::is('blog') ? 'active bg-primary text-white' : '' }}" href="{{ route('blog') }}"> Blog </a>
                    </li>
                    <li class="nav-item nav-item__has-dropdown hover:bg-primary">
                        <a class="nav-link mb-0 hover:text-white {{ Route::is('contact') ? 'active bg-primary text-white' : '' }}" href="{{ route('contact') }}"> Contact Us</a>
                    </li>

                    <li class="nav-item nav-item__has-dropdown hover:bg-primary">
                        <a class="nav-link mb-0 hover:text-white {{ Route::is('faqs') ? 'active bg-primary text-white' : '' }}" href="{{ route('faqs') }}"> FAQ's </a>
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

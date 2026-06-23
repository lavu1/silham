@extends('layouts.master')
@section('page_title', 'Contact us')
@section('content')
    @php
        $heroImage = cms_fragment('contact', 'hero_image', 'assets/img/home/carousel/IMAGE07_12.jpg');
        $leadText = cms_fragment('contact', 'lead', 'Send us a message and our team will get back to you.');
    @endphp

    <div class="py-5 bg-cover" data-dark-overlay="6" style="background:url({{ cms_media_url($heroImage) }}) no-repeat">
    <div class="container">
        <h2 class="text-white">
            Contact us
        </h2>
        <ol class="breadcrumb breadcrumb-double-angle text-white bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('contact') }}">Contact us</a></li>
            <li class="breadcrumb-item">Contact</li>
        </ol>
    </div>
</div>



<div class="py-5 shadow-v2 position-relative">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6 mt-4">
                <div class="media">
                    <span class="iconbox iconbox-md bg-primary text-white"><i class="ti-mobile"></i></span>
                    <div class="media-body ml-3">
                        <h5 class="mb-0">{{ cms_setting('contact_phone', '+260750786820') }}</h5>
                        <p>Call Us (8AM-5PM)</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4">
                <div class="media">
                    <span class="iconbox iconbox-md bg-primary text-white"><i class="ti-email"></i></span>
                    <div class="media-body ml-3">
                        <a href="mailto:{{ cms_setting('contact_email', 'info@silhamconsulting.co.zm') }}" class="h5">{{ cms_setting('contact_email', 'info@silhamconsulting.co.zm') }}</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4">
                <div class="media">
                    <span class="iconbox iconbox-md bg-primary text-white"><i class="ti-location-pin"></i></span>
                    <div class="media-body ml-3">
                        <h5 class="mb-0">Ndola, Zambia</h5>
                        <p>{{ cms_setting('contact_address', 'Plot 9698 Mitengo') }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<section class="padding-y-100 bg-light-v2">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2>
                    Send Message
                </h2>
                <div class="width-4rem height-4 bg-primary my-2 mx-auto rounded"></div>
            </div>
            <div class="col-12 text-center">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0 pl-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="card p-4 p-md-5 shadow-v1">
                    @csrf
                    <p class="lead mt-2">
                        {{ $leadText }}
                    </p>
                    <div class="row mt-5 mx-0">
                        <div class="col-md-4 mb-4">
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required>
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required>
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone number">
                        </div>
                        <div class="col-md-4 mb-4">
                            <input type="text" class="form-control" name="company" value="{{ old('company') }}" placeholder="Company">
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" name="message" placeholder="Message" rows="7" required>{{ old('message') }}</textarea>
                            <button type="submit" class="btn btn-primary mt-4">Send Message</button>
                        </div>
                        <a href="#" class="link link-body-emphasis mt-4">Read our privacy policy</a>
                    </div>
                </form>
            </div>

        </div> <!-- END row-->
    </div> <!-- END container-->
</section>

@endsection

<!-- Topbar Start -->
<div class="container-fluid nav-top bg-dark text-white-50 py-2 px-0 d-none d-lg-block">
    <div class="row gx-0 align-items-center">
        <div class="col-lg-7 px-5 text-start">
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="fa fa-phone-alt me-2"></small>
                <small>718-438-0400</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="far fa-envelope-open me-2"></small>
                <small>INFO@SRCINSURANCE.COM</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center me-4">
            </div>
        </div>
        <div class="col-lg-5 px-5 text-end">
            <div class="h-100 d-inline-flex align-items-center">
                <small class="far fa-clock me-2"></small>
                <small>Mon - Fri : 09 AM - 05 PM</small>
            </div>
        </div>

    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
    <a href="{{ route('frontend.home') }}" class="navbar-brand d-flex align-items-center">
        <h1 class="m-0">
            <img class="img-fluid" src="{{ asset('frontend/img/logo-insurance-broker.jpg') }}" alt="" /> {{ __('messages.src_insurance') }}
        </h1>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <style>
        .navbar .navbar-nav .nav-link {
            margin-left: 0px;
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto rounded pe-4 py-3 py-lg-0 text-uppercase">
            <a href="{{ route('frontend.home') }}" class="nav-item nav-link border-end border-2 border-light" style="border-color: #e0e0e0 !important;">{{ __('messages.home') }}</a>
            <a href="{{ route('frontend.services') }}" class="nav-item nav-link border-end border-2 border-light" style="border-color: #e0e0e0 !important;">{{ __('messages.services') }}</a>
            {{-- <a href="{{ route('frontend.about-us') }}" class="nav-item nav-link border-end border-2 border-light" style="border-color: #e0e0e0 !important;">{{ __('messages.about_us') }}</a>
            <a href="{{ route('frontend.contact-us') }}" class="nav-item nav-link border-end border-2 border-light" style="border-color: #e0e0e0 !important;">{{ __('messages.contact_us') }}</a> --}}
            <a href="{{ route('frontend.client-login') }}" class="nav-item nav-link" style="border-right: 2px solid #e0e0e0;">{{ __('messages.client_login') }}</a>
            <a href="{{ route('frontend.src-partners') }}" class="nav-item nav-link" >{{ __('messages.partner_login') }}</a>
            <div class="dropdown align-self-center ms-lg-5">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ __('messages.english') }}
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item {{ App::getLocale() == 'en' ? 'active' : '' }}"
                            href="{{ route('setLocale', ['locale' => 'en']) }}">
                            {{ __('messages.english') }}
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item {{ App::getLocale() == 'es' ? 'active' : '' }}"
                            href="{{ route('setLocale', ['locale' => 'es']) }}">
                            {{ __('messages.spanish') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <a href="{{ route('frontend.request-a-quote') }}" class="btn btn-primary px-3 d-none d-lg-block text-uppercase">{{ __('messages.request_a_quote') }}</a>
</nav>
<!-- Navbar End -->

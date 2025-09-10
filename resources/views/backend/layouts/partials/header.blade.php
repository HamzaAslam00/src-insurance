
<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal " href="index.html">
                <img src="{{ asset('backend/images/brand/logo-4.png') }}" class="header-brand-img desktop-logo"
                    alt="logo">
                <img src="{{ asset('backend/images/brand/logo-3.png') }}" class="header-brand-img light-logo1 "  style="max-width: 229px;"
                    alt="logo">
            </a>
            <!-- LOGO -->
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <!-- SEARCH -->
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">
                            <!-- Website Button -->
                            <div class="dropdown d-flex">
                                <a class="nav-link icon full-screen-link nav-link-bg">
                                    <a href="{{ route('frontend.home') }}" target="_blank" class="btn btn-sm btn-primary-light">View <i class="fe fe-arrow-up-right"></i></a>
                                </a>
                            </div>
                            <!-- Theme-Layout -->
                            {{-- <div class="d-flex country">
                                <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                    <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                    <span class="light-layout"><i class="fe fe-sun"></i></span>
                                </a>
                            </div> --}}
                            <!-- FULL-SCREEN -->
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
                            <div class="dropdown d-flex">
                                <a class="nav-link icon full-screen-link nav-link-bg">
                                    <i class="fe fe-minimize fullscreen-button"></i>
                                </a>
                            </div>
                            <!-- Profile -->
                            <div class="dropdown d-flex profile-1">
                                <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                                    <img src="{{ getImage(auth()->user()->avatar, true) }}" alt="profile-user"
                                        class="avatar  profile-user brround cover-image">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <div class="drop-heading">
                                        <div class="text-center">
                                            <h5 class="text-dark mb-0 fs-14 fw-semibold">
                                                {{ getFullName(auth()->user()) }}</h5>
                                            <small class="text-muted">{{ ucfirst(auth()->user()->user_type) }}</small>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <a class="dropdown-item" href="{{ route('profile.edit', auth()->user()->id) }}">
                                        <i class="dropdown-icon fe fe-user"></i> {{ __('messages.profile') }}
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            <i class="dropdown-icon fe fe-alert-circle"></i>  {{ __('messages.sign_out') }}
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .navbar-menu a {
        color: black;
    }

    .navbar-menu a:hover,
    .navbar-menu a.active {
        color: var(--primary-bg-color);
    }

    .makeDisabled {
        pointer-events: none !important;
        color: #94DEE1 !important;
        text-decoration: none;
        cursor: not-allowed !important;
    }
    .callInBetterTimeDisabled, .hours-submitted {
        /* pointer-events: none !important; */
        color: #94DEE1 !important;
        text-decoration: none;
        /* cursor: not-allowed !important; */
    }
    .tooltip {
        z-index: 9999 !important; /* Ensure the tooltip is on top */
    }
</style>

<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                href="javascript:void(0)"></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal" href="#">
                <img src="{{ asset('backend/images/brand/logo-4.png') }}" class="header-brand-img desktop-logo"
                    alt="logo" style="max-height: 170px;">
                <img src="{{ asset('backend/images/brand/logo-3.png') }}" class="header-brand-img light-logo1 p-8"
                    alt="logo" style="max-height: 170px;">
            </a>
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <!-- LOGO -->
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <!-- SEARCH -->
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">

                        @role('employee')
                        <div class="d-flex align-items-center navbar-menu">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-wrap gap-3">
                                <li class="nav-item">
                                    <a class="nav-link fw-semibold {{ Route::currentRouteName() == 'register.index' ? 'text-primary' : '' }}"
                                        href="{{ route('register.index') }}">{{ __('messages.register_hours') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-semibold {{ checkSubmittedHours() ?
                                    'hours-submitted' : 'hours-not-submitted' }}" href="#">{{ __('messages.submit_hours') }}</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link fw-semibold {{checkCallInBetter() == 0 ? 'makeDisabled':'can-apply-sick-leave' }}"
                                        href="#" id="sick_leave_request">{{ __('messages.report_sick') }}</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link fw-semibold {{ Route::currentRouteName() == 'leaves.create' ? 'text-primary' : '' }}"
                                        href="{{ route('leaves.create') }}">{{ __('messages.request_leave') }}</a>
                                </li>
                                {{-- <li class="nav-item abc">
                                    <a class="nav-link fw-semibold {{checkCallInBetterTime() == false ? 'callInBetterTimeDisabled' : ''}} {{checkCallInBetter() == 1 ? 'makeDisabled':'' }} {{ Route::currentRouteName() == 'call-in-better' ? 'text-primary' : '' }}"
                                        href="{{ route('call-in-better') }}">{{__('messages.call_in_better')}}
                                    </a>

                                </li> --}}
                            </ul>
                        </div>
                        @endrole

                        <div class="d-flex order-lg-2">
                            <div class="dropdown align-self-center ms-lg-5">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ __('messages.language') }}
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item {{ App::getLocale() == 'en' ? 'active' : '' }}"
                                            href="{{ route('setLocale', ['locale' => 'en']) }}">
                                            {{ __('messages.english') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ App::getLocale() == 'nl' ? 'active' : '' }}"
                                            href="{{ route('setLocale', ['locale' => 'nl']) }}">
                                            {{ __('messages.dutch') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- FULL-SCREEN -->
                            <div class="dropdown d-flex">
                                <a class="nav-link icon full-screen-link nav-link-bg">
                                    <i class="fe fe-minimize fullscreen-button"></i>
                                </a>
                            </div>
                            <!-- Profile -->
                            <div class="dropdown d-flex profile-1">
                                <a href="javascript:void(0)" data-bs-toggle="dropdown"
                                    class="nav-link leading-none d-flex">
                                    <img src="{{ getImage(auth()->user()->avatar, true) }}" alt="profile-user"
                                        class="avatar profile-user brround cover-image">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <div class="drop-heading">
                                        <div class="text-center">
                                            <h5 class="text-dark mb-0 fs-14 fw-semibold">{{ getFullName(auth()->user())
                                                }}</h5>
                                            <small class="text-muted">{{ __('messages.'.ucfirst(auth()->user()->user_type)) }}</small>
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
                                            <i class="dropdown-icon fe fe-alert-circle"></i> {{ __('messages.sign_out') }}
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

<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('dashboard') }}">
                <img src="{{ asset('backend/images/brand/logo-white.png') }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('backend/images/brand/logo-1.png') }}" class="header-brand-img toggle-logo" alt="logo">
                <img src="{{ asset('backend/images/brand/favi.jpg') }}" class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset('backend/images/brand/logoleef.jpg') }}" class="header-brand-img light-logo1 p-12" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg>
            </div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>{{__('messages.main')}}</h3>
                </li>
                <li class="slide">

                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('dashboard')}}">
                        <i class="side-menu__icon fe fe-home"></i>
                        <span class="side-menu__label">{{ __('messages.dashboard') }} {{ Auth::user()->role }}</span>
                    </a>
                </li>

                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('profile.edit', auth()->user()->id) }}">
                        <i class="side-menu__icon fe fe-info"></i>
                        <span class="side-menu__label">{{ __('messages.personal_information') }}</span>
                    </a>
                </li>
                @role('employee')
                    <li class="slide">
                        <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('personal-files.index') }}">
                            <i class="side-menu__icon fe fe-file-text"></i>
                            <span class="side-menu__label">{{ __('messages.personal_files') }}</span>
                        </a>
                    </li>
                @endrole

                @role('admin')
                @can('view_users')
                    <li class="slide">
                        <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('users.index') }}">
                            <i class="side-menu__icon fe fe-users"></i>
                            <span class="side-menu__label">{{ __('messages.system_users') }}</span>
                        </a>
                    </li>
                @endcan

                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('projects.index') }}">
                        <i class="side-menu__icon fe fe-activity"></i>
                        <span class="side-menu__label">{{ __('messages.projects') }}</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('holiday-agenda.index') }}">
                        <i class="side-menu__icon fe fe-command"></i>
                        <span class="side-menu__label">{{ __('messages.holiday_agenda') }}</span>
                    </a>
                </li>

                @endrole
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('leaves.index', 'all') }}">
                        <i class="side-menu__icon fe fe-briefcase"></i>
                        <span class="side-menu__label">{{ __('messages.leave_application') }}</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('sick-leave.index') }}">
                        <i class="side-menu__icon fe fe-plus-square"></i>
                        <span class="side-menu__label">{{ __('messages.sick_reports') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

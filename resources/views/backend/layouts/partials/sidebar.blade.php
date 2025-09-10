<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header" style="padding: 10px 17px;">
            <a class="header-brand1" href="{{ route('dashboard') }}" style="width: -webkit-fill-available;">
                <img src="{{ asset('backend/images/brand/logo-white.png') }}" class="header-brand-img desktop-logo" alt="logo" style="width: -webkit-fill-available;">
                <img src="{{ asset('backend/images/brand/logo-1.png') }}" class="header-brand-img toggle-logo" alt="logo">
                <img src="{{ asset('backend/images/brand/logo-2.png') }}" class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset('backend/images/brand/logo-3.png') }}" class="header-brand-img light-logo1" alt="logo" style="width: -webkit-fill-available;">
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
            @role('admin')
            <ul class="side-menu">
                <li class="sub-category">
                    <h3> {{ __('messages.main') }}</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('dashboard') }}">
                        <i class="side-menu__icon fe fe-home"></i>
                        <span class="side-menu__label"> {{ __('messages.dashboard') }}</span>
                    </a>
                </li>
                <li class="sub-category">
                    <h3>  {{ __('messages.manage') }}</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('quotes.index') }}">
                        <i class="side-menu__icon fe fe-file-plus"></i>
                        <span class="side-menu__label"> {{ __('messages.quotes') }}</span>
                        <span class="badge bg-yellow side-badge">{{ $quotesCount }}</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('clients.index') }}">
                        <i class="side-menu__icon fe fe-users"></i>
                        <span class="side-menu__label"> {{ __('messages.clients') }}</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('partners.index') }}">
                        <i class="side-menu__icon fe fe-users"></i>
                        <span class="side-menu__label"> {{ __('messages.src_partners') }}</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('quotes.index', 'partner') }}">
                        <i class="side-menu__icon fe fe-file-plus"></i>
                        <span class="side-menu__label"> {{ __('messages.partner_quotes') }}</span>
                        <span class="badge bg-yellow side-badge">{{ $partnerQuotesCount }}</span>
                    </a>
                </li>
            </ul>
            @endrole

            @role('partner')
                <ul class="side-menu">
                    <li class="sub-category">
                        <h3> {{ __('messages.main') }}</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('dashboard') }}">
                            <i class="side-menu__icon fe fe-home"></i>
                            <span class="side-menu__label"> {{ __('messages.dashboard') }}</span>
                        </a>
                    </li>
                    <li class="sub-category">
                        <h3>  {{ __('messages.manage') }}</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('quotes.index') }}">
                            <i class="side-menu__icon fe fe-file-plus"></i>
                            <span class="side-menu__label"> {{ __('messages.quotes') }}</span>
                            <span class="badge bg-yellow side-badge">{{ \App\Models\Quote::where('status', 'pending')->where('partner_id',auth()->user()->id)->count() }}</span>
                        </a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('clients.index') }}">
                            <i class="side-menu__icon fe fe-users"></i>
                            <span class="side-menu__label"> {{ __('messages.clients') }}</span>
                        </a>
                    </li>
                </ul>
            @endrole

            @if(auth()->user()->hasRole('client'))
                <ul class="side-menu">
                    <li class="sub-category">
                        <h3>Main</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('clients.edit', auth()->user()->client->id) }}">
                            <i class="side-menu__icon fe fe-home"></i>
                            <span class="side-menu__label"> {{ __('messages.dashboard') }}</span>
                        </a>
                    </li>
                </ul>
             @endif

        </div>
    </div>
</div>

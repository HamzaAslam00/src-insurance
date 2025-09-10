@extends('frontend.layouts.app')

@section('title', '| '. __('messages.src_partners'))

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-4 animated slideInDown mb-4">{{ __('messages.src_partners') }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">{{ __('messages.home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('messages.src_partners') }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Appointment Start -->
    <div class="container-fluid py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7 mx-auto wow fadeIn" data-wow-delay="0.3s">

                    <p class="mb-4 text-center mt-4">
                        {{ __('messages.if_you_would_like_to') }} <a href="{{ route('frontend.contact-us') }}">{{ __('messages.here') }}
                        </a>
                    </p>
                    <div class="rounded">
                        <div class="d-flex align-items-center bg-white rounded ">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mx-auto wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-5" id="login-form">
                        <div class="text-center mb-4">
                            <h3>{{ __('messages.src_partners_login') }}
                            </h3>
                        </div>

                        <!-- Check if there are any errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input type="hidden" value="partner" name="user_type">
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" />
                                        <label for="email">{{ __('messages.email') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-floating">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
                                        <label for="password">{{ __('messages.password') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-floating">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} /> {{ __('messages.remember_me') }}

                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn btn-primary py-3 px-5" type="submit">
                                        {{ __('messages.login') }}

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->

    <script>
        @if ($errors->any())
            document.getElementById('login-form').scrollIntoView({ behavior: 'smooth', block: 'start' });
        @endif
    </script>
@endsection

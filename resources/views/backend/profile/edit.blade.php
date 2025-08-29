@extends('backend.layouts.app')
@section('title', '| Edit Profile')

@section('breadcrumb')
    <div class="page-header">
        <h1 class="page-title">{{ __('messages.profile') }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('messages.dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.profile') }}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <!-- COL-END -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="panel panel-primary">
                        <div class="tab-menu-heading">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                    <li><a href="#tab25" class="active" data-bs-toggle="tab">{{ __('messages.profile') }}</a></li>
                                    <li><a href="#tab26" data-bs-toggle="tab">{{ __('messages.change_password') }}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body pb-0">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab25">
                                    <div class="col-xl-12 px-0">
                                        <form action="{{ route('profile.update', auth()->user()->id) }}" method="post" data-form="ajax-form" enctype="multipart/form-data">
                                            @method('PUT')
                                            <div class="text-center chat-image mb-5">
                                                <div class="avatar chat-profile mb-3 brround upload-button"
                                                    style="width: 150px; height: 150px;">
                                                    <a href="javascript:void(0)">
                                                        <img alt="avatar" class="profile-pic chat-profile mb-3 brround"
                                                            src="{{ getImage(auth()->user()->avatar, true) }}" alt="profile pic" style="width: 150px;height: 150px;">
                                                    </a>
                                                </div>
                                                <input class="file-upload d-none" type="file" accept="image/*" name="image" id="profile" />
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="first_name">{{ __('messages.first_name') }}</label>
                                                        <input type="text" class="form-control" id="first_name"
                                                            name="first_name" placeholder="{{ __('messages.first_name') }}" value="{{ auth()->user()->first_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="last_name">{{ __('messages.last_name') }}</label>
                                                        <input type="text" class="form-control" id="last_name"
                                                            name="last_name" placeholder="{{ __('messages.last_name') }}" value="{{ auth()->user()->last_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="email">{{ __('messages.email') }}</label>
                                                        <input type="email" class="form-control" id="email" name="email"
                                                            placeholder="Email address" value="{{ auth()->user()->email }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="phone">{{ __('messages.phone') }}</label>
                                                        <input type="tel" class="form-control" id="phone" name="phone"
                                                            placeholder="Contact number" value="{{ auth()->user()->phone }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" data-button="submit">{{ __('messages.update') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab26">
                                    <div class="col-xl-12 px-0">
                                        <form action="{{ route('change-password', auth()->user()->id) }}" method="post"
                                            data-form="ajax-form">
                                            @method('PUT')
                                            <div class="form-group">
                                                <label class="form-label" for="current_password">{{ __('messages.current_password') }}</label>
                                                <div class="wrap-input100 validate-input input-group"
                                                    id="Password-toggle">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 form-control" type="password"
                                                        placeholder="{{ __('messages.current_password') }}" autocomplete="current_password" id="current_password" name="current_password">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label class="form-label" for="password">{{ __('messages.new_password') }}</label>
                                                    <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                        </a>
                                                        <input class="input100 form-control" type="password"
                                                            placeholder="{{ __('messages.new_password') }}" autocomplete="password" id="password" name="password">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="password_confirmation">{{ __('messages.confirm_password') }}</label>
                                                    <div class="wrap-input100 validate-input input-group"
                                                        id="Password-toggle2">
                                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                            <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                        </a>
                                                        <input class="input100 form-control" type="password"
                                                            placeholder="{{ __('messages.confirm_password') }}" autocomplete="password_confirmation"
                                                            id="password_confirmation" name="password_confirmation">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" data-button="submit">{{ __('messages.update') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- COL-END -->
    </div>
    @push('scripts')
        <!-- SHOW PASSWORD JS -->
        <script src="{{ asset('backend/js/show-password.min.js') }}"></script>
    @endpush
@endsection

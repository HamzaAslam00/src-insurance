@extends('backend.layouts.app')

@section('title', '| '. __('messages.clients'))

@section('breadcrumb')
<div class="page-header">
    <h1 class="page-title">{{__('messages.clients_list')}}</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('messages.dashboard')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('messages.clients')}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="tabs-menu1 d-flex justify-content-end">
                <a href="{{ route('quotes.index', 'partner') }}" class="btn btn-sm dark-icon btn-primary" data-method="get"
                    data-title="Back">
                    <i class="fe fe-arrow-left"></i> {{ __('messages.back') }}
                </a>
            </div>
            <div class="panel-body tabs-menu-body pb-0">
                <div class="tab-content">
                    <div class="col-xl-12 px-0">
                        <h3 style="text-align: center;">{{ __('messages.business_details') }}</h3> <br>
                        <div class="row mb-5">
                            <!-- Photo of Insured -->
                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                <a href="javascript:void(0)" id="image-trigger-business">
                                    <div class="avatar business-chat-profile upload-button"
                                        style="width: 150px; height: 150px; background:none">
                                        <img alt="avatar" class="profile-pic businesschat-profile"
                                            src="{{ getImage(old('business_image') ?: ($client ? $client->business_image : ''), true) }}"
                                            style="width: 150px; height: 150px;">
                                        <input class="file-upload-business d-none" type="file" accept="image/*"
                                            name="business_image" id="business_profile" />
                                        <label class="mt-2">{{ __('messages.photo_of_business') }}</label>
                                    </div>
                                </a>

                            </div>
                            <!-- Right side fields -->
                            <div class="col-md-9">
                                <div class="row">
                                    <!-- Business Name -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" readonly id="business_name"
                                                name="business_name" placeholder="{{ __('messages.business_name') }}"
                                                value="{{ old('business_name', $quote->business_name ?? '') }}">
                                        </div>
                                    </div>
                                    <!-- Owner's Name -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" readonly id="owner_name" name="owner_name"
                                                placeholder="{{ __('messages.owners_name') }}"
                                                value="{{ old('owner_name', $quote->business_owner ?? '') }}">
                                        </div>
                                    </div>
                                    <!-- Telephone -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="tel" class="form-control" readonly id="phone" name="phone"
                                                placeholder="{{ __('messages.phone') }}"
                                                value="{{ old('phone', $quote->business_telephone ?? '') }}">
                                        </div>
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" readonly id="email" name="email"
                                                placeholder="{{ __('messages.email') }}" value="{{ old('email', $quote->business_email ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="container mt-4">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-4">
                                <a href="{{ route('quotes.print.acrobat-form', [$quote->id, 125]) }}" target="_blank" class="btn btn-light" id="form125-button" style="height: 50px; width: 100%;">{{ __('messages.form125') }}</a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('quotes.print.acrobat-form', [$quote->id, 126]) }}" target="_blank" class="btn btn-light" id="form126-button" style="height: 50px; width: 100%;">{{ __('messages.form126') }}</a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('quotes.print.acrobat-form', [$quote->id, 140]) }}" target="_blank" class="btn btn-light" id="form140-button" style="height: 50px; width: 100%;">{{ __('messages.form140') }}</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
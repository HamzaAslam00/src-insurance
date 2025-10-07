@extends('backend.layouts.app')

@section('title', '| '. __('messages.request_a_quote'))

@section('breadcrumb')
<div class="page-header">
    <h1 class="page-title">{{__('messages.request_a_quote')}}</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('messages.dashboard')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('messages.request_a_quote')}}</li>
        </ol>
    </div>
</div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="panel panel-primary">
                <div class="tab-menu-heading">
                    <div class="tabs-menu1 d-flex justify-content-end">
                        <a href="{{ route('quotes.index') }}" class="btn btn-sm dark-icon btn-primary" data-method="get"
                            data-title="Back">
                            <i class="fe fe-arrow-left"></i> {{ __('messages.back') }}
                        </a>
                    </div>
                </div>
                <div class="panel-body tabs-menu-body pb-0">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab25">
                            <div class="col-xl-12 px-0">
                                <form action="{{ route('request-quote-by-partner') }}" method="post" data-form="ajax-form" data-redirect='true' enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="partner_id" value="{{ auth()->user()->id }}">
                                    <div class="row mb-5">
                                        <!-- Business Photo -->
                                        <h3>{{ __('messages.business_detail') }}</h3>
                                        <div class="col-md-3 d-flex justify-content-center align-items-center">
                                            <a href="javascript:void(0)" id="image-trigger-business">
                                                <div class="avatar business-chat-profile upload-button"
                                                    style="width: 150px; height: 150px;background:none">
                                                    <img alt="avatar" class="profile-pic businesschat-profile"
                                                        src="{{ getImage(old('business_image'), true) }}"
                                                        style="width: 150px; height: 150px;">
                                                    <input class="file-upload-business d-none" type="file"
                                                        accept="image/*" name="business_image" id="business_profile" />
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
                                                        <input type="text" class="form-control" id="business_name"
                                                            name="business_name" placeholder="{{ __('messages.business_name') }}"
                                                            value="{{ old('business_name') }}">
                                                    </div>
                                                </div>
                                                <!-- Owner's Name -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="owner_name"
                                                            name="owner_name" placeholder="{{ __('messages.owners_name') }}"
                                                            value="{{ old('owner_name') }}">
                                                    </div>
                                                </div>
                                                <!-- Telephone -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="tel" class="form-control" id="phone"
                                                            name="phone" placeholder="{{ __('messages.phone') }}"
                                                            value="{{ old('phone') }}">
                                                    </div>
                                                </div>
                                                <!-- Email -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" placeholder="{{ __('messages.email') }}" value="{{ old('email') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row mb-5">
                                        <h3>{{ __('messages.clients_detail') }}</h3>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <!-- Service Type -->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="client_name">{{ __('messages.select_service') }} <span class="text-danger">*</span></label>
                                                        <select required class="form-control form-select" name="service_type" id="service_type">
                                                            <option value="" selected disabled>{{ __('messages.select_service') }}</option>
                                                            @foreach (config('policyservices') as $key => $service)
                                                                <option value="{{ $key }}">{{ $service }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Client Name -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="client_name">{{ __('messages.client_name') }} <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="client_name"
                                                            name="client_name" placeholder="{{ __('messages.name') }}"
                                                            value="{{ old('client_name') }}">
                                                    </div>
                                                </div>
                                                <!-- Client Telephone -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="client_phone">{{ __('messages.client_phone') }} <span class="text-danger">*</span></label>
                                                        <input type="tel" class="form-control" id="client_phone"
                                                            name="client_phone" placeholder="{{ __('messages.phone') }}"
                                                            value="{{ old('client_phone') }}">
                                                    </div>
                                                </div>
                                                <!-- Client Email -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="client_email">{{ __('messages.client_email') }}<span class="text-danger">*</span></label>
                                                        <input type="email" class="form-control" id="client_email"
                                                            name="client_email" placeholder="{{ __('messages.email') }}"
                                                            value="{{ old('client_email') }}">
                                                    </div>
                                                </div>
                                                <!-- Client Address -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="client_address">{{ __('messages.client_address') }}</label>
                                                        <input type="text" class="form-control" id="client_address"
                                                            name="client_address" placeholder="{{ __('messages.address') }}"
                                                            value="{{ old('client_address') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="client_city">{{ __('messages.city') }}</label>
                                                        <input type="text" class="form-control" id="client_city"
                                                            name="client_city" placeholder="{{ __('messages.city') }}"
                                                            value="{{ old('client_city') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="client_state">{{ __('messages.state') }}</label>
                                                    <select class="form-control form-select" name="client_state" id="client_state">
                                                        <option value="" selected disabled>{{ __('messages.select_state') }}</option>
                                                        <option value="new-york">{{ __('messages.new_york') }}</option>
                                                        <option value="new-jersey">{{ __('messages.new_jersey') }}</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="client_zip_code">{{ __('messages.zip_code') }}</label>
                                                        <input type="text" class="form-control" id="client_zip_code"
                                                            name="client_zip_code" placeholder="{{ __('messages.zip_code') }}"
                                                            value="{{ old('client_zip_code') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="client_business_type">{{ __('messages.business_type') }}</label>
                                                    <div class="">
                                                        <select required class="form-control form-select select-style col-md-12" name="client_business_type" id="client_business_type">
                                                            <option value="" selected disabled>{{ __('messages.select_business_type') }}</option>
                                                            <option value="grocery_store">{{ __('messages.grocery_store') }}</option>
                                                            <option value="salon_barbershop">{{ __('messages.salon_barbershop') }}</option>
                                                            <option value="restaurant">{{ __('messages.restaurant') }}</option>
                                                            <option value="bar">{{ __('messages.bar') }}</option>
                                                            <option value="liquor">{{ __('messages.liquor') }}</option>
                                                            <option value="store">{{ __('messages.store') }}</option>
                                                            <option value="retail_store">{{ __('messages.retail_store') }}</option>
                                                            <option value="auto_repair_shop">{{ __('messages.auto_repair_shop') }}</option>
                                                            <option value="office">{{ __('messages.office') }}</option>
                                                            <option value="commercial_building">{{ __('messages.commercial_building') }}</option>
                                                            <option value="residential_building">{{ __('messages.residential_building') }}</option>
                                                            <option value="other">{{ __('messages.other') }}</option>
                                                        </select>
                                                        <div class="col-md-8 other">
                                                            <input type="text" class="form-control" name="client_business_type_other" id="client_business_type_other" placeholder="{{ __('messages.other_business_type') }}" value="{{ old('client_business_type_other') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="client_business_organization">{{ __('messages.business_organization') }}</label>
                                                    <div class="">
                                                        <select required class="form-control form-select select-style col-md-12" name="client_business_organization" id="client_business_organization">
                                                            <option value="" selected disabled>{{ __('messages.select_business_organization') }}</option>
                                                            <option value="corp">{{ __('messages.corp') }}</option>
                                                            <option value="LLC">{{ __('messages.llc') }}</option>
                                                            <option value="sole-prop">{{ __('messages.sole_prop') }}</option>
                                                            <option value="non-profit">{{ __('messages.non_profit') }}</option>
                                                            <option value="other">{{ __('messages.other') }}</option>
                                                        </select>
                                                        <div class="col-md-8 other">
                                                            <input type="text" class="form-control" name="client_business_organization_other" id="client_business_organization_other" placeholder="{{ __('messages.other_business_organization') }}" value="{{ old('client_business_organization_other') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="client_fein">{{ __('messages.fein') }}</label>
                                                        <input type="text" class="form-control" id="client_fein"
                                                            name="client_fein" placeholder="{{ __('messages.fein') }}"
                                                            value="{{ old('client_fein') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="client_no_of_employees">{{ __('messages.no_of_employees') }}</label>
                                                        <input type="number" min="0" step="1" class="form-control" id="client_no_of_employees"
                                                            name="client_no_of_employees" placeholder="{{ __('messages.no_of_employees') }}"
                                                            value="{{ old('client_no_of_employees') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="year_business_started">{{ __('messages.year_business_started') }}</label>
                                                    <div class="">
                                                        <select required class="form-control form-select select-style col-md-12" name="year_business_started" id="year_business_started">
                                                            <option value="" selected disabled>{{ __('messages.select_year_business_started') }} <span class="text-danger">*</span></option>
                                                            <option value="new-venture">{{ __('messages.new_venture') }}</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2020">2020</option>
                                                            <option value="other">{{ __('messages.other_year_business_started') }}</option>
                                                        </select>
                                                        <div class="col-md-8 other">
                                                            <input type="text" class="form-control" name="year_business_started_other" id="year_business_started_other" placeholder="{{ __('messages.other_year_business_started') }}" value="{{ old('year_business_started_other') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr style="border-top: 1px solid black;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="client_accountant_name">{{ __('messages.accountant_name') }}</label>
                                                        <input type="text" class="form-control" id="client_accountant_name"
                                                            name="client_accountant_name" placeholder="{{ __('messages.accountant_name') }}"
                                                            value="{{ old('client_accountant_name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="client_accountant_phone">{{ __('messages.accountant_phone') }}</label>
                                                        <input type="text" class="form-control" id="client_accountant_phone"
                                                            name="client_accountant_phone" placeholder="{{ __('messages.accountant_telephone') }}"
                                                            value="{{ old('client_accountant_phone') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="client_accountant_email">{{ __('messages.accountant_email') }}</label>
                                                        <input type="text" class="form-control" id="client_accountant_email"
                                                            name="client_accountant_email" placeholder="{{ __('messages.accountant_email') }}"
                                                            value="{{ old('client_accountant_email') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr style="border-top: 1px solid black;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="client_estimated_sales">{{ __('messages.estimated_sales') }}</label>
                                                        <input type="text" class="form-control" id="client_estimated_sales"
                                                            name="client_estimated_sales" placeholder="{{ __('messages.estimated_sales') }}"
                                                            value="{{ old('client_estimated_sales') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="client_estimated_sales">{{ __('messages.estimated_payroll') }}</label>
                                                        <input type="text" class="form-control" id="client_estimated_payroll"
                                                            name="client_estimated_payroll" placeholder="{{ __('messages.estimated_payroll') }}"
                                                            value="{{ old('client_estimated_payroll') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="password">{{ __('messages.password') }}</label>
                                                        <input type="password" class="form-control" placeholder="{{ __('messages.password') }}" name="password" id="password">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="password_confirmation">{{ __('messages.confirm_password') }}</label>
                                                        <input type="password" class="form-control" name="password_confirmation" placeholder="{{ __('messages.confirm_password') }}" id="password_confirmation">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="col-md-12 px-0 text-right">
                                        <button type="submit" class="btn btn-primary"
                                            data-button="submit">{{ __('messages.submit') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>

        $('.form-fields, .other').addClass('d-none');

        $('[name="client_business_organization"], [name="client_business_type"], [name="year_business_started"]').on('change', function (e) {
            if ($(this).val() == 'other') {
                $(this).siblings('.other').removeClass('d-none');
                $(this).addClass('col-md-4');
                $(this).removeClass('col-md-12');
                $(this).parent().addClass('row');
            } else {
                $(this).siblings('.other').addClass('d-none');
                $(this).addClass('col-md-12');
                $(this).removeClass('col ms-3');
                $(this).parent().removeClass('row');
            }
        });

        // Preview for Business Image
        document.getElementById('image-trigger-business').addEventListener('click', function() {
            document.querySelector('.file-upload-business').click();
        });

        document.querySelector('.file-upload-business').addEventListener('change', function(event) {
            if (event.target.files && event.target.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.businesschat-profile').setAttribute('src', e.target.result);
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        });

        // Preview for Client Image
        document.getElementById('image-trigger-client').addEventListener('click', function() {
            document.querySelector('.file-upload-client').click();
        });

        document.querySelector('.file-upload-client').addEventListener('change', function(event) {
            if (event.target.files && event.target.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.clientchat-profile').setAttribute('src', e.target.result);
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        });
    </script>
@endpush

@extends('frontend.layouts.app')

@section('title',  '| '. __('messages.request_a_quote'))

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-4 animated slideInDown mb-4">{{ __('messages.request_a_quote') }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">{{ __('messages.home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('messages.request_a_quote') }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <style>
        .select-style {
            height: calc(3.5rem + 2px);
            padding: 1rem 0.75rem;
        }
    </style>

    <!-- Appointment Start -->
    <div class="container-fluid py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="mb-4 mt-1">{{ __('messages.quote_online') }}</h1>
                    <p class="mb-3">
                        {{ __('messages.ready_to_explore_your_insurance') }}
                    </p>
                    <div class="rounded" id="quotation-form">
                        <div class="d-flex align-items-center bg-white rounded ">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-light rounded p-5">
                        <div class="mb-5">
                            <h3>{{ __('messages.Please_complete') }}
                            </h3>
                        </div>

                        <!-- Check if there are any errors -->
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success">
                                Request  has been sent successfully! We will contact you soon.
                            </div>
                        @endif --}}
                        <form action="{{ route('request-a-quote') }}" method="post" data-form="ajax-form"  data-modal="#ajax_model" data-form-reset='true'>
                            @csrf
                            <div class="row g-3 mb-3">
                                <div class="col-sm-6">
                                    <select required class="form-select select-style" name="service_type" id="service_type">
                                        <option value="" selected disabled>{{ __('messages.select_service') }}</option>
                                        @foreach (config('policyservices') as $key => $service)
                                            <option value="{{ $key }}">{{ $service }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row g-3 ">
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input required type="text" class="form-control" id="business_name" placeholder="{{ __('messages.business_name') }}" name="business_name" value="{{ old('business_name') }}"/>
                                        <label for="business_name">{{ __('messages.business_name') }} <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input required type="text" class="form-control" id="business_owner" placeholder="Business Owner" name="business_owner" value="{{ old('business_owner') }}"/>
                                        <label for="business_owner">{{ __('messages.business_owner') }}  <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input required type="email" class="form-control" id="business_email" placeholder="Business Email" name="business_email" value="{{ old('business_email') }}"/>
                                        <label for="business_email">{{ __('messages.business_email') }}  <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="">
                                        <select required class="form-select select-style col-md-12" name="organization" id="organization">
                                            <option value="" selected disabled> {{ __('messages.select_organization') }} <span class="text-danger">*</span></option>
                                            <option value="corporation">{{ __('messages.corporation') }}</option>
                                            <option value="llc">{{ __('messages.llc') }}</option>
                                            <option value="sole-propriorship">{{ __('messages.sole_proprietorship') }}</option>
                                            <option value="other">{{ __('messages.other') }}</option>
                                        </select>
                                        <div class="col-md-8 form-floating ms-2 other ps-0">
                                            <input type="text" class="form-control" name="organization_other" id="organization_other" placeholder="{{ __('messages.other_organization') }}" value="{{ old('organization_other') }}">
                                            <label for="organization_other">{{ __('messages.other_organization') }} <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input required type="text" class="form-control" id="business_address" placeholder="Business Address" name="business_address" value="{{ old('business_address') }}"/>
                                        <label for="business_address">{{ __('messages.business_address') }} <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input required type="text" class="form-control" id="business_telephone" placeholder="Business Telephone" name="business_telephone" value="{{ old('business_telephone') }}"/>
                                        <label for="business_telephone">{{ __('messages.business_telephone') }} <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input required type="text" class="form-control" id="city" placeholder="City" name="city" value="{{ old('city') }}"/>
                                        <label for="city">{{ __('messages.city') }} <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <select required class="form-select select-style" name="state" id="state">
                                        <option value="" selected disabled>{{ __('messages.select_state') }} <span class="text-danger">*</span></option>
                                        <option value="new-york">{{ __('messages.new_york') }}</option>
                                        <option value="new-jersey">{{ __('messages.new_jersey') }}</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input required type="text" class="form-control" id="zip_code" placeholder="{{ __('messages.zip_code') }}" name="zip_code" value="{{ old('zip_code') }}"/>
                                        <label for="zip_code">{{ __('messages.zip_code') }} <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-sm-6 service-group-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="fein" placeholder="FEIN (Employee Identification Number)" name="fein" value="{{ old('fein') }}"/>
                                        <label for="fein">{{ __('messages.employee_identification_number') }} <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="">
                                        <select required class="form-select select-style col-md-12" name="year_business_started" id="year_business_started">
                                            <option value="" selected disabled>{{ __('messages.select_year_business_started') }} <span class="text-danger">*</span></option>
                                            <option value="new-venture">{{ __('messages.new_venture') }}</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="other">{{ __('messages.other_year_business_started') }}</option>
                                        </select>
                                        <div class="col-md-8 form-floating ms-2 other ps-0">
                                            <input type="text" class="form-control" name="year_business_started_other" id="year_business_started_other" placeholder="{{ __('messages.other_year_business_started') }}" value="{{ old('year_business_started_other') }}">
                                            <label for="year_business_started_other">{{ __('messages.other_year_business_started') }} <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="">
                                        <select required class="form-select select-style col-md-12" name="business_kind" id="business_kind">
                                            <option value="" selected disabled>{{ __('messages.select_kind_of_business') }} <span class="text-danger">*</span></option>
                                            @foreach (config('businesstypes') as $key => $businessType)
                                                <option value="{{ $key }}">{{ $businessType }}</option>
                                            @endforeach
                                        </select>
                                        <div class="col-md-8 form-floating ms-2 other ps-0">
                                            <input type="text" class="form-control" name="business_kind_other" id="business_kind_other" placeholder="{{ __('messages.explain_other_kind_of_business') }}" value="{{ old('business_kind_other') }}">
                                            <label for="business_kind_other">{{ __('messages.other_kind_of_business') }}
                                                <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="">
                                        <select required class="form-select select-style col-md-12" name="no_of_employees" id="no_of_employees">
                                            <option value="" selected disabled>{{ __('messages.select_no_of_employee') }} <span class="text-danger">*</span></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="other">{{ __('messages.other') }} </option>
                                        </select>
                                        <div class="col-md-8 form-floating ms-2 other ps-0">
                                            <input type="text" class="form-control" name="no_of_employees_other" id="no_of_employees_other" placeholder="{{ __('messages.other_no_of_employee') }}" value="{{ old('no_of_employees_other') }}">
                                            <label for="no_of_employees_other">{{ __('messages.other_no_of_employee') }} <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="">
                                        <select required class="form-select select-style col-md-12" name="business_personal_property" id="business_personal_property">
                                            <option value="" selected disabled>{{ __('messages.select_business_personal_property') }}  <span class="text-danger">*</span></option>
                                            <option value="10000">$10,000</option>
                                            <option value="25000">$25,000</option>
                                            <option value="50000">$50,000</option>
                                            <option value="75000">$75,000</option>
                                            <option value="100000">$100,000</option>
                                            <option value="other">{{ __('messages.other') }}</option>
                                        </select>
                                        <div class="col-md-8 form-floating ms-2 other ps-0">
                                            <input type="text" class="form-control" name="business_personal_property_other" id="business_personal_property_other" placeholder="{{ __('messages.other_select_business_personal_property') }}"  value="{{ old('business_personal_property_other') }}">
                                            <label for="business_personal_property_other">{{ __('messages.other_select_business_personal_property') }} <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 service-group-2">
                                    <div class="">
                                        <select class="form-select select-style col-md-12" name="annual_employee_payroll" id="annual_employee_payroll">
                                            <option value="" selected disabled>{{ __('messages.select_annual_employee_payroll') }}  <span class="text-danger">*</span></option>
                                            <option value="10000">$10,000</option>
                                            <option value="25000">$25,000</option>
                                            <option value="50000">$50,000</option>
                                            <option value="75000">$75,000</option>
                                            <option value="100000">$100,000</option>
                                            <option value="other">{{ __('messages.other') }}</option>
                                        </select>
                                        <div class="col-md-8 form-floating ms-2 other ps-0">
                                            <input type="text" class="form-control" name="annual_employee_payroll_other" id="annual_employee_payroll_other" placeholder="{{ __('messages.other_annual_employee_payroll') }}" value="{{ old('annual_employee_payroll_other') }}">
                                            <label for="annual_employee_payroll_other">{{ __('messages.other_annual_employee_payroll') }}                                                <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 service-group-2">
                                    <div class="">
                                        <select class="form-select select-style col-md-12" name="owner_payroll" id="owner_payroll">
                                            <option value="" selected disabled>{{ __('messages.select_annual_officer') }} <span class="text-danger">*</span></option>
                                            <option value="10000">$10,000</option>
                                            <option value="25000">$25,000</option>
                                            <option value="50000">$50,000</option>
                                            <option value="75000">$75,000</option>
                                            <option value="100000">$100,000</option>
                                            <option value="other">{{ __('messages.other') }}</option>
                                        </select>
                                        <div class="col-md-8 form-floating ms-2 other ps-0">
                                            <input type="text" class="form-control" name="owner_payroll_other" id="owner_payroll_other" placeholder="{{ __('messages.other_owner_payroll') }}" value="{{ old('owner_payroll_other') }}">
                                            <label for="owner_payroll_other">{{ __('messages.other_owner_payroll') }} <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 service-group-2">
                                    <select class="form-select select-style" name="include_officer" id="include_officer">
                                        <option value="" selected disabled>{{ __('messages.select_include_owner') }}
                                        </option>
                                        <option value="yes">{{ __('messages.yes') }}</option>
                                        <option value="no">{{ __('messages.no') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 service-group-2">
                                    <select class="form-select select-style" name="include_disablility" id="include_disablility">
                                        <option value="" selected disabled>{{ __('messages.select_include_disability') }} </option>
                                        <option value="yes">{{ __('messages.yes') }}</option>
                                        <option value="no">{{ __('messages.no') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 service-group-1">
                                    <div class="">
                                        <select class="form-select select-style col-md-12" name="revenue" id="revenue">
                                            <option value="" selected disabled>{{ __('messages.select_sales') }}<span class="text-danger">*</span></option>
                                            <option value="100000">$100,000</option>
                                            <option value="150000">$150,000</option>
                                            <option value="300000">$300,000</option>
                                            <option value="500000">$500,000</option>
                                            <option value="other">{{ __('messages.other') }}</option>
                                        </select>
                                        <div class="col-md-8 form-floating ms-2 other ps-0">
                                            <input type="text" class="form-control" name="revenue_other" id="revenue_other" placeholder="Explain other revenue" value="{{ old('revenue_other') }}">
                                            <label for="revenue_other">{{ __('messages.other_revenue') }}<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="note" placeholder="Note" name="note" value="{{ old('note') }}"/>
                                        <label for="note">{{ __('messages.note') }}
                                        </label>
                                    </div>
                                </div>
                                {{-- dd(env('RECAPTCHA_SITE_KEY')); --}}

                                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Google Recaptcha -->
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary py-3 px-5" type="submit" data-button="submit">
                                        {{ __('messages.submit') }}
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
            document.getElementById('quotation-form').scrollIntoView({ behavior: 'smooth', block: 'start' });
        @endif
    </script>
@endsection

@push('scripts')
    <script>
        $('.form-fields, .other').addClass('d-none');
        $('#service_type').on('change', function (e) {
            $('.form-fields').removeClass('d-none');
            var selectedValue = $(this).val();
            if (selectedValue === 'business_owners_policy' || selectedValue === 'umbrellas' || selectedValue === 'commercial_packages') {
                $('.service-group-2').addClass('d-none');
                $('.service-group-1').removeClass('d-none');
            } else {
                $('.service-group-1').addClass('d-none');
                $('.service-group-2').removeClass('d-none');
            }
        });
        var url = window.location.href;
        var parts = url.split('?');
        $('#service_type').val(parts[1]).trigger('change');

        $('[name="organization"], [name="year_business_started"], [name="business_kind"], [name="no_of_employees"], [name="business_personal_property"], [name="annual_employee_payroll"], [name="owner_payroll"], [name="revenue"]').on('change', function (e) {
            if ($(this).val() == 'other') {
                $(this).siblings('.other').removeClass('d-none');
                $(this).addClass('col ms-3');
                $(this).removeClass('col-md-12');
                $(this).parent().addClass('row');
            } else {
                $(this).siblings('.other').addClass('d-none');
                $(this).addClass('col-md-12');
                $(this).removeClass('col ms-3');
                $(this).parent().removeClass('row');
            }
        });
    </script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush

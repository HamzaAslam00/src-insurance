@php
    $isEdit = isset($client);
@endphp
<style>
    .select2-container {
        width: 100% !important;
    }
</style>
<div class="card">
    <div class="card-body">
        <div class="tabs-menu1 d-flex justify-content-end">
            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm dark-icon btn-primary" data-method="get"
                data-title="Back">
                <i class="fe fe-arrow-left"></i> {{ __('messages.back') }}
            </a>
        </div>
        <div class="panel-body tabs-menu-body pb-0">
            <div class="tab-content">
                <div class="col-xl-12 px-0">
                    <form action="{{ route('clients.update', $client->id) }}" method="POST" data-form="ajax-form" data-modal="#ajax_model"
                        data-redirect='true' enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h3 style="text-align: center;">{{ __('messages.business_details') }}</h3> <br>
                        <div class="row mb-5">
                            <!-- Photo of Insured -->
                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                <a href="javascript:void(0)" id="image-trigger-business">
                                    <div class="avatar business-chat-profile upload-button"
                                        style="width: 150px; height: 150px; background:none">
                                        <img alt="avatar" class="profile-pic businesschat-profile"
                                            src="{{ getImage(old('business_image') ?: ($isEdit ? $client->business_image : null), true) }}"
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
                                            <input type="text" class="form-control" id="business_name"
                                                name="business_name" placeholder="{{ __('messages.business_name') }}"
                                                value="{{ old('business_name', $client->business_name ?? '') }}">
                                        </div>
                                    </div>
                                    <!-- Owner's Name -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="owner_name" name="owner_name"
                                                placeholder="{{ __('messages.owners_name') }}"
                                                value="{{ old('owner_name', $client->owner_name ?? '') }}">
                                        </div>
                                    </div>
                                    <!-- Telephone -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="tel" class="form-control" id="phone" name="phone"
                                                placeholder="{{ __('messages.phone') }}"
                                                value="{{ old('phone', $client->phone ?? '') }}">
                                        </div>
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="{{ __('messages.email') }}" value="{{ old('email', $client->email ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- Submit Button -->
                        <div class="col-md-12 px-0 text-right d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" data-button="submit">{{ __('messages.submit') }}</button>
                        </div>
                    </form>
                </div>
                <div class="container mt-4">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="{{ auth()->user()->hasRole('client') ? 'col-md-4' : 'col-md-6' }}">
                            <button class="btn btn-light" id="policies-button" style="height: 50px; width: 100%;">{{ __('messages.policies') }}</button>
                        </div>

                        @if(auth()->user()->hasRole('client'))
                            <div class="col-md-4">
                                <button class="btn btn-light" style="height: 50px; width: 100%;" id="toggle-client-request">
                                    {{ __('messages.request_a_certificate') }}
                                </button>
                            </div>
                        @endif

                        <div class="{{ auth()->user()->hasRole('client') ? 'col-md-4' : 'col-md-6' }}">
                            <button class="btn btn-light" id="toggle-client-details" style="height: 50px; width: 100%;">{{ __('messages.client_details') }}</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- Client Details Tab --}}
<div class="card" id="client-details" style="display: none;">
    <div class="card-body">
        <div class="panel-body tabs-menu-body pb-0">
            <div class="tab-content">
                <div class="col-xl-12 px-0">
                    <form action="{{ route('edit-client', $client->id) }}" method="POST" data-form="ajax-form"
                        data-modal="#ajax_model" data-redirect='true' enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @php
                            $disabled = auth()->user()->roles[0]->name != 'admin' ? 'disabled' : '';
                        @endphp
                        <div class="row mb-5">
                            <h3 style="text-align: center;">{{ __('messages.client_details') }}</h3> <br>
                            <div class="col-md-12">
                                <div class="row">
                                    <!-- Client Name -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="client_name">{{ __('messages.client_name') }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="client_name"
                                                name="client_name" placeholder="{{ __('messages.name') }}"
                                                value="{{ old('client_name', $client->client_name ?? '') }}" {{ $disabled }}>
                                        </div>
                                    </div>
                                    <!-- Telephone -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_phone">{{ __('messages.client_phone') }} <span class="text-danger">*</span></label>
                                            <input type="tel" class="form-control" id="client_phone"
                                                name="client_phone" placeholder="{{ __('messages.phone') }}"
                                                value="{{ old('client_phone', $client->client_phone ?? '') }}" {{ $disabled }}>
                                        </div>
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_email">{{ __('messages.client_email') }} <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="client_email"
                                                name="client_email" placeholder="{{ __('messages.email') }}"
                                                value="{{ old('client_email', $client->client_email ?? '') }}" {{ $disabled }}>
                                        </div>
                                    </div>
                                    <!-- Address -->
                                    <div class="col-md-6">
                                        <label for="client_address">{{ __('messages.client_address') }}</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="client_address"
                                                name="client_address" placeholder="{{ __('messages.client_address') }}"
                                                value="{{ old('client_address', $client->client_address ?? '') }}" {{ $disabled }}>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_city">{{ __('messages.city') }}</label>
                                            <input type="text" class="form-control" id="client_city"
                                                name="client_city" placeholder="{{ __('messages.city') }}"
                                                value="{{ old('client_city',$client->client_city ?? '') }}" {{ $disabled }}>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="client_state">{{ __('messages.state') }}</label>
                                        <select class="form-control form-select" name="client_state" id="client_state" {{ $disabled }}>
                                            <option value="" selected disabled>{{ __('messages.select_state') }}</option>
                                            <option value="new-york" @if($client->client_state == 'new-york') selected @endif>{{ __('messages.new_york') }}</option>
                                            <option value="new-jersey" @if($client->client_state == 'new-jersey') selected @endif>{{ __('messages.new_jersey') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_zip_code">{{ __('messages.zip_code') }}</label>
                                            <input type="text" class="form-control" id="client_zip_code"
                                                name="client_zip_code" placeholder=" {{ __('messages.zip_code') }}"
                                                value="{{ old('client_zip_code',$client->client_zip_code ?? '') }}" {{ $disabled }}>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="client_business_type">{{ __('messages.business_type') }}</label>
                                        <div class="{{ $client->client_business_type != 'other' ? '' : 'row' }}">
                                            <select required class="form-control form-select select-style {{ $client->client_business_type != 'other' ? 'col-md-12' : 'col-md-4' }}" name="client_business_type"
                                                id="client_business_type" {{ $disabled }}>
                                                <option value="" selected disabled>{{ __('messages.select_business_type') }}</option>
                                                <option value="grocery_store" @if($client->client_business_type == 'grocery_store') selected @endif>{{ __('messages.grocery_store') }}</option>
                                                <option value="salon_barbershop" @if($client->client_business_type == 'salon_barbershop') selected @endif>{{ __('messages.salon_barbershop') }}</option>
                                                <option value="restaurant" @if($client->client_business_type == 'restaurant') selected @endif>{{ __('messages.restaurant') }}</option>
                                                <option value="bar" @if($client->client_business_type == 'bar') selected @endif>{{ __('messages.bar') }}</option>
                                                <option value="liquor" @if($client->client_business_type == 'liquor') selected @endif>{{ __('messages.liquor') }}</option>
                                                <option value="store" @if($client->client_business_type == 'store') selected @endif>{{ __('messages.store') }}</option>
                                                <option value="retail_store" @if($client->client_business_type == 'retail_store') selected @endif>{{ __('messages.retail_store') }}</option>
                                                <option value="auto_repair_shop" @if($client->client_business_type == 'auto_repair_shop') selected @endif>{{ __('messages.auto_repair_shop') }}</option>
                                                <option value="office" @if($client->client_business_type == 'office') selected @endif>{{ __('messages.office') }}</option>
                                                <option value="commercial_building" @if($client->client_business_type == 'commercial_building') selected @endif>{{ __('messages.commercial_building') }}</option>
                                                <option value="residential_building" @if($client->client_business_type == 'residential_building') selected @endif>{{ __('messages.residential_building') }}</option>
                                                <option value="other" @if($client->client_business_type == 'other') selected @endif>{{ __('messages.other') }}</option>
                                            </select>
                                            <div class="col-md-8 other {{ $client->client_business_type != 'other' ? 'd-none' : '' }}" {{ $disabled }}>
                                                <input type="text" class="form-control" name="client_business_type_other" id="client_business_type_other"
                                                    placeholder="{{ __('messages.other_business_type') }}" value="{{ old('client_business_type_other', $client->client_business_type_other) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="client_business_organization">{{ __('messages.business_organization') }}</label>
                                        <div class="{{ $client->client_business_organization != 'other' ? '' : 'row' }}">
                                            <select required class="form-control form-select select-style {{ $client->client_business_organization != 'other' ? 'col-md-12' : 'col-md-4' }}" name="client_business_organization"
                                                id="client_business_organization" {{ $disabled }}>
                                                <option value="" selected disabled>{{ __('messages.select_business_organization') }}</option>
                                                <option value="corp" @if($client->client_business_organization == 'corp') selected @endif>{{ __('messages.corp') }}</option>
                                                <option value="LLC" @if($client->client_business_organization == 'LLC') selected @endif>{{ __('messages.llc') }}</option>
                                                <option value="sole-prop" @if($client->client_business_organization == 'sole-prop') selected @endif>{{ __('messages.sole_prop') }}</option>
                                                <option value="non-profit" @if($client->client_business_organization == 'non-profit') selected @endif>{{ __('messages.non_profit') }}t</option>
                                                <option value="other" @if($client->client_business_organization == 'other') selected @endif>{{ __('messages.other') }}</option>
                                            </select>
                                            <div class="col-md-8 other {{ $client->client_business_organization != 'other' ? 'd-none' : '' }}" {{ $disabled }}>
                                                <input type="text" class="form-control" name="client_business_organization_other"
                                                    id="client_business_organization_other" placeholder="Explain other business organization"
                                                    value="{{ old('client_business_organization_other', $client->client_business_organization_other) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_fein">{{ __('messages.fein') }}</label>
                                            <input type="text" class="form-control" id="client_fein" name="client_fein" placeholder="{{ __('messages.fein') }}"
                                                value="{{ old('client_fein',$client->fein ?? '') }}" {{ $disabled }}>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_no_of_employees">{{ __('messages.no_of_employees') }}</label>
                                            <input type="number" min="0" step="1" class="form-control" id="client_no_of_employees"
                                                name="client_no_of_employees" placeholder="{{ __('messages.no_of_employees') }}" value="{{ old('client_no_of_employees', $client->client_no_of_employees ?? '') }}" {{ $disabled }}>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border-top: 1px solid black;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_accountant_name">{{ __('messages.accountant_name') }}</label>
                                            <input type="text" class="form-control" id="client_accountant_name" name="client_accountant_name"
                                                placeholder="{{ __('messages.accountant_name') }}" value="{{ old('client_accountant_name', $client->client_accountant_name ?? '') }}" {{ $disabled }}>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_accountant_phone">{{ __('messages.accountant_phone') }}</label>
                                            <input type="text" class="form-control" id="client_accountant_phone" name="client_accountant_phone"
                                                placeholder="{{ __('messages.accountant_phone') }}" value="{{ old('client_accountant_phone', $client->client_accountant_phone ?? '') }}" {{ $disabled }}>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_accountant_email">{{ __('messages.accountant_email') }}</label>
                                            <input type="text" class="form-control" id="client_accountant_email" name="client_accountant_email"
                                                placeholder="{{ __('messages.accountant_email') }}" value="{{ old('client_accountant_email', $client->client_accountant_email ?? '') }}" {{ $disabled }}>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border-top: 1px solid black;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_estimated_sales">{{ __('messages.estimated_sales') }}</label>
                                            <input type="text" class="form-control" id="client_estimated_sales" name="client_estimated_sales"
                                                placeholder="{{ __('messages.estimated_sales') }}" value="{{ old('client_estimated_sales', $client->client_estimated_sales ?? '') }}" {{ $disabled }}>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_estimated_sales">{{ __('messages.estimated_payroll') }}</label>
                                            <input type="text" class="form-control" id="client_estimated_payroll" name="client_estimated_payroll"
                                                placeholder="{{ __('messages.estimated_payroll') }}" value="{{ old('client_estimated_payroll', $client->client_estimated_payroll ?? '') }}" {{ $disabled }}>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password">{{ __('messages.password') }} <span class="text-danger"><small>{{ $isEdit ? __('messages.leave_blank_to_keep') : '*' }}</small></span></label>
                                        <input type="password" class="form-control" name="password" placeholder="{{ __('messages.password') }}"
                                            id="password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password_confirmation">{{ __('messages.confirm_password') }}<span class="text-danger"><small>{{ $isEdit ? __('messages.leave_blank_to_keep') : '*' }}</small></span></label>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="{{ __('messages.confirm_password') }}"
                                            id="password_confirmation">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 px-0 text-right d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary" data-button="submit">{{ __('messages.submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- CERTIFICATE TAB --}}
<div class="card" id="client-request" style="display: none;">
    <div class="card-body">
        <div class="panel-body tabs-menu-body pb-0">
            <div class="tab-content">
                <div class="col-xl-12 px-0">
                    <form action="{{ route('request-certificate', [$client->id]) }}" method="POST"
                        data-form="ajax-form" data-modal="#ajax_model" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="row mb-5">
                            <h3 style="text-align: center;">{{ __('messages.request_a_certificate') }}</h3> <br>
                            <!-- Right side fields -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-center mb-4">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="certificate_option"
                                                id="proof_insurance" value="proof_insurance">
                                            <label class="form-check-label" for="proof_insurance">{{ __('messages.proof_of_insurance') }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="certificate_option"
                                                id="aditional_insurance" value="aditional_insurance">
                                            <label class="form-check-label" for="aditional_insurance">{{ __('messages.additional_insurance') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="request_name"
                                                name="request_name" placeholder="{{ __('messages.name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="name" class="form-control" id="request_addres"
                                                name="request_addres" placeholder="{{ __('messages.address') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" id="information" name="information" rows="4" placeholder="{{ __('messages.additional_information') }}"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12 px-0 text-right d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary" data-button="submit">{{ __('messages.submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- POLICIES TAB --}}
<div class="col-md-12 mt-3" id="policies-menu" style="display: none;"> <!-- Initially hidden -->
    <div class="row">
        @include('backend.policies.index')
    </div>
</div>
@push('scripts')
    <script>

        $('[name="client_business_organization"], [name="client_business_type"]').on('change', function (e) {
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

        $(document).ready(function() {

            $('#toggle-client-details').click(function() {
                $('#policies-menu').hide();
                $('#client-request').hide();
                $('#client-details').toggle();

                // Update colors
                $(this).css({
                    'background-color': '#6c5ffc',
                    'color': 'white'
                });
                $('#policies-button, #toggle-client-request').css({
                    'background-color': '',
                    'color': ''
                });
            });

            $('#policies-button').click(function() {
                $('#client-details').hide();
                $('#client-request').hide();
                $('#policies-menu').toggle();

                // Update colors
                $(this).css({
                    'background-color': '#6c5ffc',
                    'color': 'white'
                });
                $('#toggle-client-details, #toggle-client-request').css({
                    'background-color': '',
                    'color': ''
                });
            });

            $('#toggle-client-request').click(function() {
                $('#client-details').hide();
                $('#policies-menu').hide();
                $('#client-request').toggle();

                // Update colors
                $(this).css({
                    'background-color': '#6c5ffc',
                    'color': 'white'
                });
                $('#policies-button, #toggle-client-details').css({
                    'background-color': '',
                    'color': ''
                });
            });
            document.getElementById('image-trigger-business').addEventListener('click', function() {
                document.querySelector('.file-upload-business').click();
            });
            document.querySelector('.file-upload-business').addEventListener('change', function(event) {
                if (event.target.files && event.target.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.querySelector('.businesschat-profile').setAttribute('src', e.target
                            .result);
                    };
                    reader.readAsDataURL(event.target.files[0]);
                }
            });
            document.getElementById('image-trigger-client').addEventListener('click', function() {
                document.querySelector('.file-upload-client').click();
            });
            document.querySelector('.file-upload-client').addEventListener('change', function(event) {
                if (event.target.files && event.target.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.querySelector('.clientchat-profile').setAttribute('src', e.target
                            .result);
                    };
                    reader.readAsDataURL(event.target.files[0]);
                }
            });
        });
    </script>
@endpush

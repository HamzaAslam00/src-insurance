@extends('backend.layouts.app')

@section('title', '| '. __('messages.worker_compensation_insurance_proposal_form'))

@section('breadcrumb')
<div class="page-header">
    <h1 class="page-title">{{__('messages.worker_compensation_insurance_proposal_form')}}</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('messages.dashboard')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('messages.worker_compensation_insurance_proposal_form')}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="panel panel-primary">
            <div class="panel-body tabs-menu-body pb-0">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab25">
                        <div class="col-xl-12 px-0">
                            <form action="{{ route('create-proposal', $quote->id) }}" method="post" data-form="ajax-form" data-modal="#ajax_model" data-redirect="true">
                                @csrf
                                <input type="hidden" name="client_id" value="{{ $client->id }}" readonly>
                                <input type="hidden" name="quote_id" value="{{ $quote->id }}" readonly>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="business_name">{{ __('messages.business_name') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="business_name" id="business_name" value="{{ $client->business_name }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="owner_name">{{ __('messages.owners_name') }}</label>
                                        <input type="text" class="form-control" name="owner_name" id="owner_name" value="{{ $client->owner_name }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="business_telephone">{{ __('messages.business_telephone') }}</label>
                                        <input type="text" class="form-control" name="business_telephone" id="business_telephone" value="{{ $client->phone }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="address">{{ __('messages.address') }}</label>
                                        <input type="text" class="form-control" name="address" id="address" value="{{ $client->client_address }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="city">{{ __('messages.city') }}</label>
                                        <input type="text" class="form-control" name="city" id="city" value="{{ $client->client_city }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="state">{{ __('messages.state') }}</label>
                                        <div class="">
                                            <select class="form-control form-select select-style col-md-12" name="state" id="state" readonly>
                                                <option value="" selected disabled>{{ __('messages.select_state') }}</option>
                                                <option value="new-york" @if($client->client_state == 'new-york') selected @endif>{{ __('messages.new_york') }}</option>
                                                <option value="new-jersey" @if($client->client_state == 'new-jersey') selected @endif>{{ __('messages.new_jersey') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="zip_code">{{ __('messages.zip_code') }}</label>
                                        <input type="text" class="form-control" name="zip_code" id="zip_code" value="{{ $client->client_zip_code }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="insurance_carrier">{{ __('messages.insurance_carrier') }}</label>
                                        <input type="text" class="form-control" name="insurance_carrier" id="insurance_carrier" value="">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="down_payment">{{ __('messages.down_payment') }}</label>
                                        <input type="text" class="form-control" name="down_payment" id="down_payment" value="">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="monthly_payment">{{ __('messages.monthly_payment') }}</label>
                                        <input type="text" class="form-control" name="monthly_payment" id="monthly_payment" value="">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="no_of_monthly_payment">{{ __('messages.no_of_monthly_payment') }}</label>
                                        <input type="text" class="form-control" name="no_of_monthly_payment" id="no_of_monthly_payment" value="">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="finance_charge">{{ __('messages.finance_charge') }}</label>
                                        <input type="text" class="form-control" name="finance_charge" id="finance_charge" value="">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="total">{{ __('messages.total') }}</label>
                                        <input type="text" class="form-control" name="total" id="total" value="">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="dbl_policy_cost">{{ __('messages.dbl_policy_cost') }}</label>
                                        <input type="text" class="form-control" name="dbl_policy_cost" id="dbl_policy_cost" value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="brokers_fee_wc">{{ __('messages.brokers_fee_wc') }}</label>
                                        <div class="">
                                            <select class="form-control form-select select-style col-md-12" name="brokers_fee_wc" id="brokers_fee_wc">
                                                <option value="" selected disabled>{{ __('messages.select_brokers_fee_wc') }}</option>
                                                <option value="$650">$650</option>
                                                <option value="$350">$350</option>
                                                <option value="$250">$250</option>
                                                <option value="other">{{ __('messages.other') }}</option>
                                            </select>
                                            <div class="col-md-8 other">
                                                <input type="text" class="form-control" name="brokers_fee_wc_other" id="brokers_fee_wc_other" placeholder="{{ __('messages.other_brokers_fee_wc') }}" value="{{ old('brokers_fee_wc_other') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="service_fee_dbl">{{ __('messages.service_fee_dbl') }}</label>
                                        <div class="">
                                            <select class="form-control form-select select-style col-md-12" name="service_fee_dbl" id="service_fee_dbl">
                                                <option value="" selected disabled>{{ __('messages.select_service_fee_dbl') }}</option>
                                                <option value="$650">$150</option>
                                                <option value="other">{{ __('messages.other') }}</option>
                                            </select>
                                            <div class="col-md-8 other">
                                                <input type="text" class="form-control" name="service_fee_dbl_other" id="service_fee_dbl_other" placeholder="{{ __('messages.other_service_fee_dbl') }}" value="{{ old('service_fee_dbl_other') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="wc_coverage_by_accident">{{ __('messages.wc_coverage_by_accident') }}</label>
                                        <div class="">
                                            <select class="form-control form-select select-style col-md-12" name="wc_coverage_by_accident" id="wc_coverage_by_accident">
                                                <option value="" selected disabled>{{ __('messages.select_wc_coverage_by_accident') }}</option>
                                                <option value="$650">$150</option>
                                                <option value="other">{{ __('messages.other') }}</option>
                                            </select>
                                            <div class="col-md-8 other">
                                                <input type="text" class="form-control" name="wc_coverage_by_accident_other" id="wc_coverage_by_accident_other" placeholder="{{ __('messages.other_wc_coverage_by_accident') }}" value="{{ old('wc_coverage_by_accident_other') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="wc_coverage_each_employee">{{ __('messages.wc_coverage_each_employee') }}</label>
                                        <div class="">
                                            <select class="form-control form-select select-style col-md-12" name="wc_coverage_each_employee" id="wc_coverage_each_employee">
                                                <option value="" selected disabled>{{ __('messages.select_wc_coverage_each_employee') }}</option>
                                                <option value="$650">$150</option>
                                                <option value="other">{{ __('messages.other') }}</option>
                                            </select>
                                            <div class="col-md-8 other">
                                                <input type="text" class="form-control" name="wc_coverage_each_employee_other" id="wc_coverage_each_employee_other" placeholder="{{ __('messages.other_wc_coverage_each_employee') }}" value="{{ old('wc_coverage_each_employee_other') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="policy_limit">{{ __('messages.policy_limit') }}</label>
                                        <input type="text" class="form-control" name="policy_limit" id="policy_limit" value="">
                                    </div>
                                </div>
                                <div class="col-lg-12 px-0">
                                    <button type="submit" class="btn btn-primary" data-button="submit">{{ __('messages.submit') }}</button>
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

        $('[name="brokers_fee_wc"], [name="service_fee_dbl"], [name="wc_coverage_by_accident"], [name="wc_coverage_each_employee"]').on('change', function (e) {
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
    </script>
@endpush
@extends('backend.layouts.app')

@section('title', '| '. __('messages.general_insurance_proposal_form'))

@section('breadcrumb')
<div class="page-header">
    <h1 class="page-title">{{__('messages.general_insurance_proposal_form')}}</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('messages.dashboard')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('messages.general_insurance_proposal_form')}}</li>
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
                                        <label for="total">{{ __('messages.total_policy_cost') }}</label>
                                        <input type="text" class="form-control" name="total" id="total" value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="aggregate">{{ __('messages.aggregate') }}</label>
                                        <div class="">
                                            <select class="form-control form-select select-style col-md-12" name="aggregate" id="aggregate">
                                                <option value="" selected disabled>{{ __('messages.select_aggregate') }}</option>
                                                <option value="$2,000,000">$2,000,000</option>
                                                <option value="$1,000,000">$1,000,000</option>
                                                <option value="$4,000,000">$4,000,000</option>
                                                <option value="other">{{ __('messages.other') }}</option>
                                            </select>
                                            <div class="col-md-8 other">
                                                <input type="text" class="form-control" name="aggregate_other" id="aggregate_other" placeholder="{{ __('messages.other_aggregate') }}" value="{{ old('aggregate_other') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="products_complicated_oprations">{{ __('messages.products_completed_operations') }}</label>
                                        <div class="">
                                            <select class="form-control form-select select-style col-md-12" name="products_complicated_oprations" id="products_complicated_oprations">
                                                <option value="" selected disabled>{{ __('messages.select_products_complicated_oprations') }}</option>
                                                <option value="$2,000,000">$2,000,000</option>
                                                <option value="$1,000,000">$1,000,000</option>
                                                <option value="other">{{ __('messages.other') }}</option>
                                            </select>
                                            <div class="col-md-8 other">
                                                <input type="text" class="form-control" name="products_complicated_oprations_other" id="products_complicated_oprations_other" placeholder="{{ __('messages.other_products_complicated_oprations') }}" value="{{ old('products_complicated_oprations_other') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="each_occurence">{{ __('messages.each_occurence') }}</label>
                                        <div class="">
                                            <select class="form-control form-select select-style col-md-12" name="each_occurence" id="each_occurence">
                                                <option value="" selected disabled>{{ __('messages.select_each_occurence') }}</option>
                                                <option value="$1,000,000">$1,000,000</option>
                                                <option value="$2,000,000">$2,000,000</option>
                                                <option value="other">{{ __('messages.other') }}</option>
                                            </select>
                                            <div class="col-md-8 other">
                                                <input type="text" class="form-control" name="each_occurence_other" id="each_occurence_other" placeholder="{{ __('messages.other_each_occurence') }}" value="{{ old('each_occurence_other') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="damage_to_rented_premises">{{ __('messages.damage_to_rented_premises') }}</label>
                                        <div class="">
                                            <select class="form-control form-select select-style col-md-12" name="damage_to_rented_premises" id="damage_to_rented_premises">
                                                <option value="" selected disabled>{{ __('messages.select_damage_to_rented_premises') }}</option>
                                                <option value="$50,000">$50,000</option>
                                                <option value="$100,000">$100,000</option>
                                                <option value="$150,000">$150,000</option>
                                                <option value="$250,000">$250,000</option>
                                                <option value="other">{{ __('messages.other') }}</option>
                                            </select>
                                            <div class="col-md-8 other">
                                                <input type="text" class="form-control" name="damage_to_rented_premises_other" id="damage_to_rented_premises_other" placeholder="{{ __('messages.other_damage_to_rented_premises') }}" value="{{ old('damage_to_rented_premises_other') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="medical_expenses">{{ __('messages.medical_expenses') }}</label>
                                        <div class="">
                                            <select class="form-control form-select select-style col-md-12" name="medical_expenses" id="medical_expenses">
                                                <option value="" selected disabled>{{ __('messages.select_medical_expenses') }}</option>
                                                <option value="$50,000">$5,000</option>
                                                <option value="other">{{ __('messages.other') }}</option>
                                            </select>
                                            <div class="col-md-8 other">
                                                <input type="text" class="form-control" name="medical_expenses_other" id="medical_expenses_other" placeholder="{{ __('messages.other_medical_expenses') }}" value="{{ old('medical_expenses_other') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="business_personal_property">{{ __('messages.business_personal_property') }}</label>
                                        <div class="">
                                            <select class="form-control form-select select-style col-md-12" name="business_personal_property" id="business_personal_property">
                                                <option value="" selected disabled>{{ __('messages.select_business_personal_property') }}</option>
                                                <option value="NONE">NONE</option>
                                                <option value="other">{{ __('messages.other') }}</option>
                                            </select>
                                            <div class="col-md-8 other">
                                                <input type="text" class="form-control" name="business_personal_property_other" id="business_personal_property_other" placeholder="{{ __('messages.other_business_personal_property') }}" value="{{ old('business_personal_property_other') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="building_coverage">{{ __('messages.building_coverage') }}</label>
                                        <div class="">
                                            <select class="form-control form-select select-style col-md-12" name="building_coverage" id="building_coverage">
                                                <option value="" selected disabled>{{ __('messages.select_building_coverage') }}</option>
                                                <option value="NONE">NONE</option>
                                                <option value="other">{{ __('messages.other') }}</option>
                                            </select>
                                            <div class="col-md-8 other">
                                                <input type="text" class="form-control" name="building_coverage_other" id="building_coverage_other" placeholder="{{ __('messages.other_building_coverage') }}" value="{{ old('building_coverage_other') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="deductible">{{ __('messages.deductible') }}</label>
                                        <div class="">
                                            <select class="form-control form-select select-style col-md-12" name="deductible" id="deductible">
                                                <option value="" selected disabled>{{ __('messages.select_deductible') }}</option>
                                                <option value="$1,000">$1,000</option>
                                                <option value="$5,000">$5,000</option>
                                                <option value="other">{{ __('messages.other') }}</option>
                                            </select>
                                            <div class="col-md-8 other">
                                                <input type="text" class="form-control" name="deductible_other" id="deductible_other" placeholder="{{ __('messages.other_deductible') }}" value="{{ old('deductible_other') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="service_fee">{{ __('messages.service_fee') }}</label>
                                        <div class="">
                                            <select class="form-control form-select select-style col-md-12" name="service_fee" id="service_fee">
                                                <option value="" selected disabled>{{ __('messages.select_service_fee') }}</option>
                                                <option value="$650">$650</option>
                                                <option value="$350">$350</option>
                                                <option value="other">{{ __('messages.other') }}</option>
                                            </select>
                                            <div class="col-md-8 other">
                                                <input type="text" class="form-control" name="service_fee_other" id="service_fee_other" placeholder="{{ __('messages.other_service_fee') }}" value="{{ old('service_fee_other') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="liqour_interruption">{{ __('messages.liqour_interruption') }}</label>
                                        <input type="text" class="form-control" name="liqour_interruption" id="liqour_interruption" value="">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="business_interruption">{{ __('messages.business_interruption') }}</label>
                                        <input type="text" class="form-control" name="business_interruption" id="business_interruption" value="">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="professional_liability">{{ __('messages.professional_liability') }}</label>
                                        <select class="form-control select2 form-select" name="professional_liability" id="professional_liability">
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="theft">{{ __('messages.theft') }}</label>
                                        <select class="form-control select2 form-select" name="theft" id="theft">
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="food_water_damage">{{ __('messages.food_water_damage') }}</label>
                                        <select class="form-control select2 form-select" name="food_water_damage" id="food_water_damage">
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="vandalism">{{ __('messages.vandalism') }}</label>
                                        <select class="form-control select2 form-select" name="vandalism" id="vandalism">
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="fire_wind">{{ __('messages.fire_wind') }}</label>
                                        <select class="form-control select2 form-select" name="fire_wind" id="fire_wind">
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
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

        $('[name="aggregate"], [name="products_complicated_oprations"], [name="each_occurence"], [name="damage_to_rented_premises"], [name="medical_expenses"], [name="business_personal_property"], [name="building_coverage"], [name="deductible"], [name="service_fee"]').on('change', function (e) {
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
<div class="row">
    <div class="form-group col-md-6">
        <label for="service_type">{{ __('messages.selected_service') }}</label>
        <select class="form-control select2 form-select form-select-modal" name="service_type" id="service_type" disabled>
            <option value="" selected disabled>{{ __('messages.select_service_dropdown') }}</option>
            @foreach (config('policyservices') as $key => $service)
                <option value="{{ $key }}">{{ $service }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row form-fields">
    <div class="form-group col-md-6">
        <label for="business_name">{{ __('messages.business_name') }}</label>
        <input type="text" class="form-control" name="business_name" id="business_name" value="{{ $quote->business_name }}" disabled>
    </div>
    {{-- {{ dd($quote->business_name ) }} --}}
    <div class="form-group col-md-6">
        <label for="business_owner">{{ __('messages.business_owner') }}</label>
        <input type="text" class="form-control" name="business_owner" id="business_owner" value="{{ $quote->business_owner }}" disabled>
    </div>
    <div class="form-group col-md-6">
        <label for="business_email">{{ __('messages.business_email') }}</label>
        <input type="text" class="form-control" name="business_email" id="business_email" value="{{ $quote->business_email }}" disabled>
    </div>
    <div class="form-group col-md-6">
        <label for="organization">{{ __('messages.organiztion') }}</label>
        <select class="form-control select2 form-select form-select-modal" name="organization" id="organization" disabled>
            <option value="" selected disabled>{{ __('messages.other') }}</option>
            <option value="corporation" @if($quote->organization == 'corporation') selected @endif>{{ __('messages.corporation') }}</option>
            <option value="llc" @if($quote->organization == 'llc') selected @endif>{{ __('messages.llc') }}</option>
            <option value="sole-propriorship" @if($quote->organization == 'sole-propriorship') selected @endif>{{ __('messages.sole_proprietorship') }}</option>
            <option value="other" @if($quote->organization == 'other') selected @endif>{{ __('messages.other') }}</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="business_address">{{ __('messages.business_address') }}</label>
        <input type="text" class="form-control" name="business_address" id="business_address" value="{{ $quote->business_address }}" disabled>
    </div>
    <div class="form-group col-md-6">
        <label for="business_telephone">{{ __('messages.business_telephone') }}</label>
        <input type="tel" class="form-control" name="business_telephone" id="business_telephone" value="{{ $quote->business_telephone }}" disabled>
    </div>
    <div class="form-group col-md-6">
        <label for="city">{{ __('messages.city') }}</label>
        <input type="text" class="form-control" name="city" id="city" value="{{ $quote->city }}" disabled>
    </div>
    <div class="form-group col-md-6">
        <label for="state">{{ __('messages.state') }}</label>
        <select class="form-control select2 form-select form-select-modal" name="state" id="state" disabled>
            <option value="" selected disabled>{{ __('messages.select_state') }}</option>
            <option value="new-york" @if($quote->state == 'new-york') selected @endif>{{ __('messages.new_york') }}</option>
            <option value="new-jersey" @if($quote->state == 'new-jersey') selected @endif>{{ __('messages.new_jersey') }}</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="zip_code">{{ __('messages.zip_code') }} </label>
        <input type="text" class="form-control" name="zip_code" id="zip_code" value="{{ $quote->zip_code }}" disabled>
    </div>
    <div class="form-group col-md-6 service-group-2">
        <label for="fein">{{ __('messages.employee_identification_number') }}</label>
        <input type="text" class="form-control" name="fein" id="fein" value="{{ $quote->fein }}" disabled>
    </div>
    <div class="form-group col-md-6">
        <label for="year_business_started">{{ __('messages.year_business_started') }}</label>
        <select class="form-control select2 form-select form-select-modal" name="year_business_started" id="year_business_started" disabled>
            <option value="" selected disabled>{{ __('messages.select_year_business_started') }}</option>
            <option value="new-venture" @if($quote->year_business_started == 'new-venture') selected @endif>{{ __('messages.new_venture') }}</option>
            <option value="2023" @if($quote->year_business_started == '2023') selected @endif>2023</option>
            <option value="2022" @if($quote->year_business_started == '2022') selected @endif>2022</option>
            <option value="2021" @if($quote->year_business_started == '2021') selected @endif>2021</option>
            <option value="2020" @if($quote->year_business_started == '2020') selected @endif>2020</option>
            <option value="other" @if($quote->year_business_started == 'other') selected @endif>{{ __('messages.other') }}</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="business_kind">{{ __('messages.kind_of_business') }}</label>
        <select class="form-control select2 form-select form-select-modal" name="business_kind" id="business_kind" disabled>
            <option value="" selected disabled>{{ __('messages.select') }}</option>
            @foreach (config('businesstypes') as $key => $businessType)
                <option value="{{ $key }}" @if($quote->business_kind == $key) selected @endif>{{ $businessType }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="no_of_employees">{{ __('messages.no_of_employees') }}</label>
        <select class="form-control select2 form-select form-select-modal" name="no_of_employees" id="no_of_employees" disabled>
            <option value="" selected disabled>{{ __('messages.other') }}</option>
            @foreach ([1, 2, 3, 4, 5] as $key => $counter)
                <option value="{{ $counter }}" @if($quote->no_of_employees == $counter) selected @endif>{{ $counter }}</option>
            @endforeach
            <option value="other" @if($quote->no_of_employees == 'other') selected @endif>{{ __('messages.other') }}</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="business_personal_property">{{ __('messages.business_personal_property') }}</label>
        <select class="form-control select2 form-select form-select-modal" name="business_personal_property" id="business_personal_property" disabled>
            <option value="" selected disabled>{{ __('messages.other') }}</option>
            <option value="10000" @if($quote->business_personal_property == '10000') selected @endif>$10,000</option>
            <option value="25000" @if($quote->business_personal_property == '25000') selected @endif>$25,000</option>
            <option value="50000" @if($quote->business_personal_property == '50000') selected @endif>$50,000</option>
            <option value="75000" @if($quote->business_personal_property == '75000') selected @endif>$75,000</option>
            <option value="100000" @if($quote->business_personal_property == '100000') selected @endif>$100,000</option>
            <option value="other" @if($quote->business_personal_property == 'other') selected @endif>{{ __('messages.other') }}</option>
        </select>
    </div>
    <div class="form-group col-md-6 service-group-2">
        <label for="annual_employee_payroll">{{ __('messages.annual_employee_payroll') }}</label>
        <select class="form-control select2 form-select form-select-modal" name="annual_employee_payroll" id="annual_employee_payroll" disabled>
            <option value="" selected disabled>{{ __('messages.other') }}</option>
            <option value="10000" @if($quote->annual_employee_payroll == '10000') selected @endif>$10,000</option>
            <option value="25000" @if($quote->annual_employee_payroll == '25000') selected @endif>$25,000</option>
            <option value="50000" @if($quote->annual_employee_payroll == '50000') selected @endif>$50,000</option>
            <option value="75000" @if($quote->annual_employee_payroll == '75000') selected @endif>$75,000</option>
            <option value="100000" @if($quote->annual_employee_payroll == '100000') selected @endif>$100,000</option>
            <option value="other" @if($quote->annual_employee_payroll == 'other') selected @endif>{{ __('messages.other') }}</option>
        </select>
    </div>
    <div class="form-group col-md-6 service-group-2">
        <label for="owner_payroll">{{ __('messages.annual_officer') }}</label>
        <select class="form-control select2 form-select form-select-modal" name="owner_payroll" id="owner_payroll" disabled>
            <option value="" selected disabled>{{ __('messages.other') }}</option>
            <option value="10000" @if($quote->owner_payroll == '10000') selected @endif>$10,000</option>
            <option value="25000" @if($quote->owner_payroll == '25000') selected @endif>$25,000</option>
            <option value="50000" @if($quote->owner_payroll == '50000') selected @endif>$50,000</option>
            <option value="75000" @if($quote->owner_payroll == '75000') selected @endif>$75,000</option>
            <option value="100000" @if($quote->owner_payroll == '100000') selected @endif>$100,000</option>
            <option value="other" @if($quote->owner_payroll == 'other') selected @endif>{{ __('messages.other') }}</option>
        </select>
    </div>
    <div class="form-group col-md-6 service-group-2">
        <label for="include_officer">{{ __('messages.include_owner') }}</label>
        <select class="form-control select2 form-select form-select-modal" name="include_officer" id="include_officer" disabled>
            <option value="" selected disabled>{{ __('messages.other') }}</option>
            <option value="yes" @if($quote->include_officer == 'yes') selected @endif>{{ __('messages.yes') }}</option>
            <option value="no" @if($quote->include_officer == 'no') selected @endif>{{ __('messages.no') }}</option>
        </select>
    </div>
    <div class="form-group col-md-6 service-group-2">
        <label for="include_disablility">{{ __('messages.include_disability') }}</label>
        <select class="form-control select2 form-select form-select-modal" name="include_disablility" id="include_disablility" disabled>
            <option value="" selected disabled>{{ __('messages.other') }}</option>
            <option value="yes" @if($quote->include_disablility == 'yes') selected @endif>{{ __('messages.yes') }}</option>
            <option value="no" @if($quote->include_disablility == 'no') selected @endif>{{ __('messages.no') }}</option>
        </select>
    </div>
    <div class="form-group col-md-6 service-group-1">
        <label for="revenue">{{ __('messages.sales') }}</label>
        <select class="form-control select2 form-select form-select-modal" name="revenue" id="revenue" disabled>
            <option value="" selected disabled>{{ __('messages.other') }}</option>
            <option value="100000" @if($quote->revenue == '100000') selected @endif>$100,000</option>
            <option value="150000" @if($quote->revenue == '150000') selected @endif>$150,000</option>
            <option value="300000" @if($quote->revenue == '300000') selected @endif>$300,000</option>
            <option value="500000" @if($quote->revenue == '500000') selected @endif>$500,000</option>
            <option value="other" @if($quote->revenue == 'other') selected @endif>{{ __('messages.other') }}</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="note">{{ __('messages.notes') }}</label>
        <input type="text" class="form-control" name="note" id="note" value="{{ $quote->note }}" disabled>
    </div>
</div>

<script>
    $('.form-fields').addClass('d-none');
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
    $('#service_type').val('{{ $quote->service_type }}').trigger('change');
</script>

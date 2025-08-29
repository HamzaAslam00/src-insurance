@php
    $isEdit = isset($policy);
    $url = $isEdit ? route('policies.update', $policy->id) : route('policies.store');
@endphp
<form action="{{ $url }}" method="post" data-form="ajax-form" data-modal="#ajax_model"
    data-datatable="#policies_datatable">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif
    <input type="hidden" name="client_id" value="{{ $clientId }}">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="name">{{ __('messages.policy_name') }} <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" id="name"
                value="{{ $isEdit ? $policy->name : '' }}">
        </div>
        <div class="form-group col-md-6">
            <label for="company_name">{{ __('messages.insurance_company_name') }}<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="company_name" id="company_name"
                value="{{ $isEdit ? $policy->company_name : '' }}">
        </div>
        <div class="form-group col-md-6">
            <label for="policy_type">{{ __('messages.policy_type') }} <span class="text-danger">*</span></label>
            <div class="{{ $isEdit ? ($policy->policy_type != 'other' ? '' : 'row') : '' }}">
                <select required class="form-control form-select select-style {{ $isEdit ? ($policy->policy_type != 'other' ? 'col-md-12' : 'col-md-4') : 'col-md-12' }}" name="policy_type"
                    id="policy_type">
                    <option value="" selected disabled>{{ __('messages.select_policy_type') }}</option>
                    <option value="commercial-general-liability" @if($isEdit && $policy->policy_type == 'commercial-general-liability') selected @endif>{{ __('messages.commercial_general_liability') }}</option>
                    <option value="worker-compensation" @if($isEdit && $policy->policy_type == 'worker-compensation') selected @endif>{{ __('messages.workers_compensation') }}</option>
                    <option value="property" @if($isEdit && $policy->policy_type == 'property') selected @endif>{{ __('messages.property') }}</option>
                    <option value="bop" @if($isEdit && $policy->policy_type == 'bop') selected @endif>{{ __('messages.bop') }}</option>
                    <option value="package" @if($isEdit && $policy->policy_type == 'package') selected @endif>{{ __('messages.package') }}</option>
                    <option value="bond" @if($isEdit && $policy->policy_type == 'bond') selected @endif>{{ __('messages.bond') }}</option>
                    <option value="other" @if($isEdit && $policy->policy_type == 'other') selected @endif>{{ __('messages.other') }}</option>
                </select>
                <div class="col-md-8 other {{ $isEdit ? ($policy->policy_type != 'other' ? 'd-none' : '') : 'd-none' }}">
                    <input type="text" class="form-control" name="policy_type_other"
                        id="policy_type_other" placeholder="{{ __('messages.explain_other_policy_type') }}"
                        value="{{ old('policy_type_other', $isEdit ? $policy->policy_type_other : '') }}">
                </div>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="policy_number">{{ __('messages.policy_number') }} <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="policy_number" id="policy_number"
                value="{{ $isEdit ? $policy->policy_number : '' }}">
        </div>
        <div class="form-group col-md-6">
            <label for="effective_date">{{ __('messages.effective_date') }}</label>
            <input type="date" class="form-control" name="effective_date" id="effective_date"
                value="{{ $isEdit ? $policy->effective_date : '' }}">
        </div>
        <div class="form-group col-md-6">
            <label for="expiration_date">{{ __('messages.expiration_date') }}</label>
            <input type="date" class="form-control" name="expiration_date" id="expiration_date"
                value="{{ $isEdit ? $policy->expiration_date : '' }}">
        </div>
        <div class="form-group col-md-6">
            <label for="premium">{{ __('messages.total_premium') }}<span class="text-danger">*</span></label>
            <input type="number" step="0.1" min="0" class="form-control" name="premium" id="premium"
                value="{{ $isEdit ? $policy->premium : '' }}">
        </div>
        <div class="form-group col-md-6">
            <label for="file">{{ __('messages.policy_document') }}<span class="text-danger">* @if ($isEdit)
                        <small>{{ __('messages.dont_select_file') }}</small>
                    @endif
                </span></label>
            <input type="file" class="form-control" name="file" id="file"
                value="{{ $isEdit ? $policy->file : '' }}">
            @if ($isEdit && $policy->file)
                <a href="{{ getFiles($policy->file) }}" target="_blank"> View existing file</a>
            @endif
        </div>
        <div class="form-group col-md-6">
            <label for="status">{{ __('messages.status') }}</label>
            <select class="form-control select2 form-select form-select-modal" name="status" id="status">
                <option value="active" @if($isEdit && $policy->status == 'active') selected @endif>{{ __('messages.active') }}</option>
                <option value="expired" @if($isEdit && $policy->status == 'expired') selected @endif>{{ __('messages.expired') }}</option>
                <option value="cancelled" @if($isEdit && $policy->status == 'cancelled') selected @endif>{{ __('messages.cancelled') }}</option>
                <option value="pending_cancellation" @if($isEdit && $policy->status == 'pending_cancellation') selected @endif>{{ __('messages.pending_cancellation') }}</option>
            </select>
        </div>
        <div class="form-group col-md-12">
            <label for="description">{{ __('messages.additional_information') }}</label>
            <textarea class="form-control" name="description" id="description">{{ $isEdit ? $policy->description : '' }}</textarea>
        </div>
    </div>
    <div class="col-md-12 px-0">
        <button type="submit" class="btn btn-primary" data-button="submit">{{ __('messages.submit') }}</button>
    </div>
</form>

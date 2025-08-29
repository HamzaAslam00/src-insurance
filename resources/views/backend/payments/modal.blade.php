@php
    $isEdit = isset($payment) ? true : false;
    $url = $isEdit ? route('payments.update', [$policy, $payment->id]) : route('payments.store', $policy);

@endphp
<form action="{{$url}}" method="post" data-form="ajax-form" data-modal="#ajax_model" data-datatable="#payments_datatable">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif
    <input type="hidden" name="policy_id" value="{{ $policy }}">
    <div class="row form-fields">
        <div class="form-group col-md-6">
            <label for="name">{{ __('messages.client_name') }}<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" id="name"
                value="{{ isset($payment) ? $payment->policy->client->client_name : ($policy->client->client_name ?? 'N/A') }}" readonly>
        </div>

        <div class="form-group col-md-6">
            <label for="email">{{ __('messages.client_email') }} <span class="text-danger">*</span></label>
            <input type="email" class="form-control" name="email" id="email"
                value="{{ isset($payment) ? $payment->policy->client->client_email : ($policy->client->client_email ?? 'N/A') }}" readonly>
        </div>

        <div class="form-group col-md-6">
            <label for="paid_amount">{{ __('messages.paid_amount') }} <span class="text-danger">*</span></label>
            <input type="number" class="form-control" name="paid_amount" id="paid_amount"
            value="{{$isEdit ? $payment->paid_amount : ''}}"  required>
        </div>

        <div class="form-group col-md-6">
            <label for="transaction_date">{{ __('messages.transaction_date') }}<span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="transaction_date" id="transaction_date"
                   value="{{ $isEdit ? $payment->transaction_date : date('Y-m-d') }}">
        </div>
        <div class="form-group col-md-6">
            <label for="payment_method">{{ __('messages.payment_method') }}<span class="text-danger">*</span></label>
            <select class="form-control select2 form-select w-100" name="payment_method" id="payment_method">
                <option value="" disabled>{{ __('messages.select') }}</option>
                <option value="cash_payment" {{ $isEdit && $payment->payment_method === 'cash_payment' ? 'selected' : '' }}>{{ __('messages.cash_payment') }}</option>
                <option value="ach_payment" {{ $isEdit && $payment->payment_method === 'ach_payment' ? 'selected' : '' }}>{{ __('messages.ach_payment') }}</option>
                <option value="check_payment" {{ $isEdit && $payment->payment_method === 'check_payment' ? 'selected' : '' }}>{{ __('messages.check_payment') }}</option>
                <option value="Credit/Debit" {{ $isEdit && $payment->payment_method === 'Credit/Debit' ? 'selected' : '' }}>{{ __('messages.credit_debit') }}</option>
                <option value="other" {{ $isEdit && $payment->payment_method === 'other' ? 'selected' : '' }}>{{ __('messages.other') }}</option>
            </select>
        </div>
        <div class="col-md-12 px-0">
            <button type="submit" class="btn btn-primary" data-button="submit">{{ __('messages.submit') }}</button>
        </div>
    </div>

</form>

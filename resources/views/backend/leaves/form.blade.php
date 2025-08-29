@extends('backend.layouts.app')
@section('title', '| ' . __('messages.apply_leave'))

@section('breadcrumb')
    <div class="page-header">
        <h1 class="page-title">{{ __('messages.apply_leave') }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('messages.dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.apply_leave') }}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    @php
        $isEdit = isset($leave) ? true : false;
        $url = $isEdit ? route('leaves.update', $leave->id) : route('leaves.store');

    @endphp

    @if ($errors->any())
        <div class="alert bg-danger text-light">
            <ol>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ol>
        </div>
    @endif
    <div class="card p-5">
        <form action="{{ $url }}" method="post" data-form="ajax-form" data-form-reset="form-reset"
            data-modal="#ajax_model" data-datatable="#leaves_datatable"
            enctype="multipart/form-data>
        @csrf
        @if ($isEdit)
@method('PUT')
@endif
        <div class="row">
            <input type="hidden" name="applied_by" value="{{ Auth::user()->id }}">
            <div class="form-group col-lg-6">
                <label for="start_date">{{ __('messages.start_date') }}<span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="start_date" id="start_date"
                    value="{{ $isEdit ? $leave->start_date->format('Y-m-d\TH:i') : '' }}" required>
            </div>
            <div class="form-group col-lg-6">
                <label for="end_date">{{ __('messages.end_date') }}<span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="end_date" id="end_date"
                    value="{{ $isEdit ? $leave->end_date->format('Y-m-d\TH:i') : '' }}" required>
            </div>
            <div id="day_options" style="display: none; margin-top: 10px;">
                <label>{{ __('messages.day_type') }}</label><br>
                <input type="radio" id="full_day" name="day_type" value="Full Day">
                <label for="full_day">Full Day</label><br>
                <input type="radio" id="half_day" name="day_type" value="Half Day">
                <label for="half_day">Half Day</label>
            </div>
            <div class="form-group col-lg-12">
                <label for="reason">{{ __('messages.reason') }} <span class="text-danger">*</span></label>
                <textarea class="form-control" name="reason" id="reason" required>{{ $isEdit ? $leave->reason : '' }}</textarea>
            </div>

            <div class="form-group col-lg-12">
                <label for="detail">{{ __('messages.detail_optional') }}</label>
                <textarea class="form-control" name="detail" id="detail">{{ $isEdit ? $leave->detail : '' }}</textarea>
            </div>

            <div class="form-group col-lg-6">
                <label for="document">{{ __('messages.document_optional') }}</label>
                <input type="file" class="form-control" name="document" id="document">
                @if ($isEdit && $leave->document)
                    <a href="{{ asset('storage/' . $leave->document) }}"
                        target="_blank">{{ __('messages.view_document') }}</a>
                @endif
            </div>


    </div>
    <div class="col-lg-12 px-0">
        <button type="submit" data-button="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
    </div>
    </form>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            const $startDateInput = $('#start_date');
            const $endDateInput = $('#end_date');
            const $dayOptionsDiv = $('#day_options');

            function toggleDayOptions() {
                const startDate = $startDateInput.val();
                const endDate = $endDateInput.val();

                // Show radio buttons only if the dates are the same
                if (startDate && endDate && startDate === endDate) {
                    $dayOptionsDiv.show();
                } else {
                    $dayOptionsDiv.hide();
                }
            }

            // Attach event listeners to both date inputs
            $startDateInput.on('change', toggleDayOptions);
            $endDateInput.on('change', toggleDayOptions);
        });
    </script>
@endpush

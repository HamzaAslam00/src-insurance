@php
    $isEdit = isset($leave) ? true : false;
    $url = $isEdit ? route('leaves.update', $leave->id) : route('leaves.store');

@endphp
<form action="{{$url}}" method="post" data-form="ajax-form" data-modal="#ajax_model" data-datatable="#leaves_datatable">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif
    <div class="row">
        <input type="hidden" name="applied_by" value="{{ Auth::user()->id }}">
        <div class="form-group col-lg-6">
            <label for="start_date">Start Date <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $isEdit ? $leave->start_date : '' }}" required>
        </div>
        <div class="form-group col-lg-6">
            <label for="end_date">End Date <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $isEdit ? $leave->end_date : '' }}" required>
        </div>
        <div id="day_options" style="display: none; margin-top: 10px;">
            <label>{{__('messages.day_type')}}</label><br>
            <input type="radio" id="full_day" name="day_type"  name="day_type" value="Full Day" {{ ($isEdit && $leave->day_type == 'Full Day') ? 'checked' : '' }}>
            <label for="full_day">Full Day</label><br>
            <input type="radio" id="half_day" name="day_type"  value="Half Day" {{ ($isEdit && $leave->day_type == 'Half Day') ? 'checked' : '' }}>
            <label for="half_day">Half Day</label>
        </div>

        <div class="form-group col-lg-12">
            <label for="reason">Reason <span class="text-danger">*</span></label>
            <textarea class="form-control" name="reason" id="reason" required>{{ $isEdit ? $leave->reason : '' }}</textarea>
        </div>

        <div class="form-group col-lg-12">
            <label for="detail">Detail (optional)</label>
            <textarea class="form-control" name="detail" id="detail">{{ $isEdit ? $leave->detail : '' }}</textarea>
        </div>

        <div class="form-group col-lg-6">
            <label for="document">Document (optional)</label>
            <input type="file" class="form-control" name="document" id="document">
            @if ($isEdit && $leave->document)
                <a href="{{ asset('storage/' . $leave->document) }}" target="_blank">View Document</a>
            @endif
        </div>
    </div>
    <div class="col-lg-12 px-0">
        <button type="submit" class="btn btn-primary" data-button="submit">Submit</button>
    </div>
</form>
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
            // Optionally, you can reset the radio buttons if they are already selected
            $('input[name="day_type"]').prop('checked', false);
        }
    }

    // Attach event listeners to both date inputs
    $startDateInput.on('change', toggleDayOptions);
    $endDateInput.on('change', toggleDayOptions);

    // Call it once in case the dates are already filled (e.g., on page load for editing)
    toggleDayOptions();
});

</script>

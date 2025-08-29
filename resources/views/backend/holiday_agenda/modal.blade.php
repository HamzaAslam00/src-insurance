@php
    $isEdit = isset($holiday) ? true : false;
    $url = $isEdit ? route('holiday-agenda.update', $holiday->id) : route('holiday-agenda.store');
    $isShow = isset($show) ? true : false;

@endphp
<form action="{{$url}}" method="post" data-form="ajax-form" data-modal="#ajax_model" data-datatable="#holidays_datatable">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif
    <div class="row">
        <div class="form-group col-lg-6">
            <label for="start_date">{{__('messages.start_date')}} <span class="text-danger">*</span></label>
            <input type="date" {{$isShow ? 'disabled' : ''}} class="form-control" name="start_date" id="start_date" value="{{ $isEdit ? $holiday->start_date : ''}}" required>
        </div>
        <div class="form-group col-lg-6">
            <label for="end_date">{{__('messages.end_date')}} <span class="text-danger">*</span></label>
            <input type="date" {{$isShow ? 'disabled' : ''}} class="form-control" name="end_date" id="end_date" value="{{$isEdit ? $holiday->end_date : ''}}" required>
        </div>

        <div class="form-group col-lg-12">
            <label for="detail">{{__('messages.details')}} <span class="text-danger">*</span></label>
             <textarea name="detail" {{$isShow ? 'disabled' : ''}} class="form-control" id="detail" rows="5" required>{{$isEdit ? $holiday->detail : ''}}</textarea>
        </div>

    </div>
    @if(!$isShow)
        <div class="col-lg-12 px-0">
            <button type="submit" class="btn btn-primary" data-button="submit">{{__('messages.submit')}}</button>
        </div>
    @endif

</form>

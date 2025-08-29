@php
    $isEdit = isset($work) ? true : false;
    $url = $isEdit ? route('working.update', $work->id) : route('working.store');

@endphp


<form action="{{$url}}" method="post" data-form="ajax-form" data-modal="#ajax_model" data-datatable="#work_datatable">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif
    <div class="row">
        <div class="form-group col-lg-6">
            <label for="start_date">{{__('messages.start_date_time')}} <span class="text-danger">*</span></label>
            <input type="datetime-local" class="form-control" name="start_date" id="start_date" value="{{ $isEdit ? $work->start_date : '' }}" required>
        </div>
        <div class="form-group col-lg-6">
            <label for="end_date">{{__('messages.end_date_time')}} <span class="text-danger">*</span></label>
            <input type="datetime-local" class="form-control" name="end_date" id="end_date" value="{{ $isEdit ? $work->end_date: '' }}" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            <label for="location">{{__('messages.location')}} <span class="text-danger">*</span></label>
            <select class="form-control select2 form-select form-select-modal" name="location" id="location">
                @foreach ($locations as $location)
                    <option value="{{$location->id}}"  @if ($isEdit && $work->location_id == $location->id) selected @endif>{{$location->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="mb-3">
            <label for="workFormControlTextarea1" class="form-label">{{__('messages.work_detail_optional')}}</label>
            <textarea name="work_detail" class="form-control" id="workFormControlTextarea1" rows="3">@if($isEdit){{$work->work_detail}}@endif
            </textarea>
        </div>
    </div>
    <div class="col-lg-12 px-0">
        <button type="submit" class="btn btn-primary" data-button="submit">{{__('messages.submit')}}</button>
    </div>
</form>

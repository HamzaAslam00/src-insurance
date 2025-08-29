@php
    $isEdit = isset($location) ? true : false;
    $url = $isEdit ? route('locations.update', $location->id) : route('locations.store');

@endphp
<form action="{{$url}}" method="post" data-form="ajax-form" data-modal="#ajax_model" data-datatable="#locations_datatable">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif
    <div class="row">
        <div class="form-group col-lg-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$isEdit ? $location->name : ''}}">
        </div>
     
        <div class="form-group col-lg-6">
            <label for="status">Status</label>
            <select class="form-control select2 form-select form-select-modal" name="status" id="status">
                <option value="active" @if ($isEdit && $location->status == 'active') selected @endif>Active</option>
                <option value="inactive" @if ($isEdit && $location->status == 'inactive') selected @endif>Inactive</option>
            </select>
        </div>
    </div>
    <div class="col-lg-12 px-0">
        <button type="submit" class="btn btn-primary" data-button="submit">Submit</button>
    </div>
</form>

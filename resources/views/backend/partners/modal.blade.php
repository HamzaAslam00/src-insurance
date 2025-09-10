@php
    $isEdit = isset($partner) ? true : false;
    $url = $isEdit ? route('partners.update', $partner->id) : route('partners.store');

@endphp
<form action="{{$url}}" method="post" data-form="ajax-form" data-modal="#ajax_model" data-datatable="#partners_datatable">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif
    <div class="row">
        <div class="form-group col-lg-6">
            <label for="first_name">First Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="first_name" id="first_name" value="{{$isEdit ? $partner->first_name : ''}}">
        </div>
        <div class="form-group col-lg-6">
            <label for="last_name">Last Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="last_name" id="last_name" value="{{$isEdit ? $partner->last_name : ''}}">
        </div>

        <div class="form-group col-lg-6">
            <label for="email">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" name="email" id="email" value="{{$isEdit ? $partner->email : ''}}">
        </div>
        <div class="form-group col-lg-6">
            <label for="phone">Phone</label>
            <input type="tel" class="form-control" name="phone" id="phone" value="{{$isEdit ? $partner->phone : ''}}">
        </div>

        <div class="form-group col-lg-6">
            <label for="password">Password <span class="text-danger"><small>{{ $isEdit ? '(Leave blank to keep the password unchanged)' : '*' }}</small></span></label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group col-lg-6">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
        </div>
        <div class="form-group col-lg-6">
            <label for="status">Status</label>
            <select class="form-control select2 form-select form-select-modal" name="status" id="status">
                <option value="active" @if ($isEdit && $partner->status == 'active') selected @endif>Active</option>
                <option value="inactive" @if ($isEdit && $partner->status == 'inactive') selected @endif>Inactive</option>
            </select>
        </div>
    </div>
    <div class="col-lg-12 px-0">
        <button type="submit" class="btn btn-primary btn-sm" data-button="submit">Submit</button>
    </div>
</form>

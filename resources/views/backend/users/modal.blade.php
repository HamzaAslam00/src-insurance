@php
    $isEdit = isset($user) ? true : false;
    $url = $isEdit ? route('users.update', $user->id) : route('users.store');

@endphp
<form action="{{$url}}" method="post" data-form="ajax-form" data-form-reset="reset" data-modal="#ajax_model" data-datatable="#users_datatable">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif
    <div class="row">
        <div class="form-group col-lg-6">
            <label for="first_name">{{__('messages.first_name')}} <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="first_name" id="first_name" value="{{$isEdit ? $user->first_name : ''}}">
        </div>
        <div class="form-group col-lg-6">
            <label for="last_name">{{__('messages.last_name')}} <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="last_name" id="last_name" value="{{$isEdit ? $user->last_name : ''}}">
        </div>

        <div class="form-group col-lg-6">
            <label for="email">{{__('messages.email')}} <span class="text-danger">*</span></label>
            <input type="email" class="form-control" name="email" id="email" value="{{$isEdit ? $user->email : ''}}">
        </div>
        <div class="form-group col-lg-6">
            <label for="phone">{{__('messages.phone')}}</label>
            <input type="text" class="form-control" name="phone" id="phone" value="{{$isEdit ? $user->phone : ''}}">
        </div>

        <div class="form-group col-lg-6">
            <label for="password">{{__('messages.password')}} <span class="text-danger">*</span></label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        
        <div class="form-group col-lg-6">
            <label for="password_confirmation">{{__('messages.confirm_password')}}</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
        </div>

        <div class="form-group col-lg-6">
            <label for="designation">{{__('messages.designation')}}</label>
            <input type="text" class="form-control" name="designation" id="designation" value="{{$isEdit ? $user->designation : ''}}">
        </div>

        <div class="form-group col-lg-6">
            <label for="role">{{__('messages.role')}}</label>
            <select class="form-control select2 form-select form-select-modal" name="role" id="role">
                <option value="" selected disabled> --- {{__('messages.select_role')}} --- </option>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}" @if ($isEdit && $role->name == $user->user_type) selected @endif>{{ __('messages.'.$role->title) }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-lg-6">
            <label for="status">{{__('messages.status')}}</label>
            <select class="form-control select2 form-select form-select-modal" name="status" id="status">
                <option value="active" @if ($isEdit && $user->status == 'active') selected @endif>{{__('messages.active')}}</option>
                <option value="inactive" @if ($isEdit && $user->status == 'inactive') selected @endif>{{__('messages.inactive')}}</option>
            </select>
        </div>
        <div class="form-group col-lg-6">
            <label for="status">{{__('messages.working_hour')}}</label>
            <input type="number" min="0" step="0.01" class="form-control" name="working_hour" id="working_hour" value="{{$isEdit ? $user->working_hour : ''}}">
        </div>
    </div>
    <div class="col-lg-12 px-0">
        <button type="submit" class="btn btn-primary" data-button="submit">{{__('messages.submit')}}</button>
    </div>
</form>

@php
    $isEdit = isset($project) ? true : false;
    $url = $isEdit ? route('projects.update', $project->id) : route('projects.store');
@endphp


<form action="{{$url}}" method="post" data-form="ajax-form" data-modal="#ajax_model" data-datatable="#project_datatable">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif
    <div class="row">
        <div class="form-group col-lg-6">
            <label for="project_name">{{__('messages.project_name')}}<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="name" id="project_name" value="{{ $isEdit ? $project->name : '' }}" required>
        </div>

        <div class="form-group col-lg-6">
            <label for="client_name">{{__('messages.client_name')}}</label>
            <input type="text" class="form-control" name="client_name" id="client_name" value="{{ $isEdit ? $project->client_name : '' }}">
        </div>

        <div class="form-group col-lg-6">
            <label for="cost">{{__('messages.project_fee')}}</label>
            <input type="number" min="0" step="0.01" class="form-control" name="cost" id="cost" value="{{ $isEdit ? $project->cost : '' }}">
        </div>

        <div class="form-group col-lg-6">
            <label for="start_date">{{__('messages.start_date_time')}} <span class="text-danger">*</span></label>
            <input type="datetime-local" class="form-control" name="start_date" id="start_date" value="{{ $isEdit ? $project->start_date : '' }}" required>
        </div>

        <div class="form-group col-lg-6">
            <label for="end_date">{{__('messages.end_date_time')}}<span class="text-danger">*</span></label>
            <input type="datetime-local" class="form-control" name="end_date" id="end_date" value="{{ $isEdit ? $project->end_date: '' }}" required>
        </div>
        <div class="form-group col-lg-6">
            <label for="end_date">{{__('messages.select_user')}} <span class="text-danger">*</span></label>
            <select class="form-control select2 form-select-modal vehicle-select" multiple data-live-search="true" name="user[]" id="user" required>
                <option value="" disabled>--{{__('messages.select_user')}}  --</option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}"  {{ $isEdit && $user->id == $project->users->contains($user->id) ? 'selected': '' }}> {{$user->first_name}} {{$user->last_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="mb-3">
            <label for="workFormControlTextarea1" class="form-label">{{__('messages.description_optional')}}</label>
            <textarea name="description" class="form-control" id="workFormControlTextarea1" rows="3">@if($isEdit){{$project->description}}@endif</textarea>
        </div>
    </div>
    <div class="col-lg-12 px-0">
        <button type="submit" class="btn btn-primary" data-button="submit">{{__('messages.submit')}}</button>
    </div>
</form>

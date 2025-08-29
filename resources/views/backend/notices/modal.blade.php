@php
    $isEdit = isset($notice) ? true : false;
    $url = $isEdit ? route('notices-and-files.update', [$policy, $notice->id]) : route('notices-and-files.store', $policy);

@endphp
<form action="{{$url}}" method="post" data-form="ajax-form" data-modal="#ajax_model" data-datatable="#notices_datatable">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif
    <input type="hidden" name="policy_id" value="{{ $policy }}">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="title">{{ __('messages.title') }}</label>
            <input type="text" class="form-control"@if(auth()->user()->hasRole('client')) readonly @endif  name="title" id="title" value="{{$isEdit ? $notice->title : ''}}">
        </div>
        <div class="form-group col-md-6">
            <label for="file">{{ __('messages.file_attachment') }} <span class="text-danger">*
                @if($isEdit)
                    <small>{{ __('messages.dont_select_file') }}</small>
                @endif
            </span></label>
            <input type="file" class="form-control"
                @if(auth()->user()->hasRole('client')) disabled @endif
                name="file" id="file"
                value="{{ $isEdit ? $notice->file : '' }}">
        </div>

        <div class="form-group col-md-12">
            <label for="description">{{ __('messages.detail_description') }}</label>
            <textarea type="text" class="form-control" @if(auth()->user()->hasRole('client')) readonly @endif  name="description" id="description">{{$isEdit ? $notice->description : ''}}</textarea>
        </div>
        @if (!$isEdit)
            <div class="form-group col-md-12">
                <div class="custom-control custom-control-md custom-checkbox custom-control pb-2">
                    <input type="checkbox" class="custom-control-input permission-checkbox" value="send_mail" id="send_mail" name="send_mail" checked>
                    <label class="custom-control-label text-capitalize" for="send_mail">{{ __('messages.send_client_email') }}</label>
                </div>
            </div>
        @endif
        <div class="form-group col-md-12">
            <div class="custom-control custom-control-md custom-checkbox custom-control pb-2">
                <input type="checkbox" class="custom-control-input permission-checkbox" value="required_followup" id="required_followup" name="required_followup" @if ($isEdit && $notice->required_followup) checked @endif>
                <label class="custom-control-label text-capitalize" for="required_followup">{{ __('messages.required_followup') }}</label>
            </div>
        </div>
    </div>
    <div class="col-md-12 px-0">
        <button type="submit" class="btn btn-primary" data-button="submit">{{ __('messages.submit') }}</button>
    </div>
</form>

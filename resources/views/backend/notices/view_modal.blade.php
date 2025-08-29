<div class="row mb-2">
    <div class="col-md-3">
        <label class="bold">{{ __('messages.title') }}</label>
    </div>
    <div class="col-md-9">
        {{ isValue($notice->title) }}
    </div>
</div>
<div class="row mb-2">
    <div class="col-md-3">
        <label class="bold">{{ __('messages.detail_description') }}</label>
    </div>
    <div class="col-md-9">
        {{ isValue($notice->description) }}
    </div>
</div>
<div class="row mb-2">
    <div class="col-md-3">
        <label class="bold">{{ __('messages.created_date') }}</label>
    </div>
    <div class="col-md-9">
        {{ Carbon\Carbon::parse($notice->created_at)->toDateString() }}
    </div>
</div>
<div class="row mb-2">
    <div class="col-md-3">
        <label class="bold">{{ __('messages.file_attachment') }}</label>
    </div>
    <div class="col-md-9">
        @if($notice->file)
            <a href="{{ getFiles($notice->file) }}" target="_blank">{{ __('messages.view_file') }}</a>
        @else
            N/A
        @endif
    </div>
</div>

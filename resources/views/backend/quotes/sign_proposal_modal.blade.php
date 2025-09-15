<form action="{{ route('sign-proposal', $client->id) }}" id="update_sign" method="POST" data-form="form" data-modal="#ajax_model" enctype="multipart/form-data">
    @csrf
    <h4 class="card-title font-weight-bold text-capitalize table-title">{{ __('messages.update_signature') }}</h4>
    <div>
        <div id="sig"></div>
    </div>
    <button id="clear" class="btn btn-primary mr-2 mt-2" type="button">{{ __('messages.clear_signature') }}</button>
    <button type="submit" class="btn btn-primary mt-2" data-id="update">{{ __('messages.save') }}</button>
    <textarea id="signature64" name="profile_signature" style="display: none"></textarea>
</form>
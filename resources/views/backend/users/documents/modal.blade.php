@php
    //$isEdit = isset($user) ? true : false;
    //$url = $isEdit ? route('users.update', $user->id) : route('users.store');

@endphp
<form action="{{route('user.documents.store', $user)}}" method="post" data-form="ajax-form" data-modal="#ajax_model" data-datatable="#user_documents_datatable">
    @csrf
    <div class="row">
        <div class="form-group col-lg-6">
            <label for="first_name">{{__('messages.upload_document')}} <span class="text-danger">*</span></label>
            <input type="file" class="form-control" name="document" accept=".pdf, .doc, .docx" id="document">
        </div>

    </div>
    <div class="col-lg-12 px-0">
        <button type="submit" class="btn btn-primary" data-button="submit">{{__('messages.submit')}}</button>
    </div>
</form>

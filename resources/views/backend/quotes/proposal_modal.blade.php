<form action="{{ route('create-proposal', $client->id) }}" method="post" data-form="ajax-form" data-modal="#ajax_model">
    @csrf
    <div class="row">
        <div class="form-group col-lg-6">
            <label for="client_name">Client Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="client_name" id="client_name" value="{{$client->owner_name}}" readonly>
        </div>
    </div>
    <div class="col-lg-12 px-0">
        <button type="submit" class="btn btn-primary" data-button="submit">Submit</button>
    </div>
</form>

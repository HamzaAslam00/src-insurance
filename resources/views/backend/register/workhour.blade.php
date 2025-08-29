<div class="col-8">
    <label for="form-select"><span class="fw-semibold"> {{__('messages.projects')}} </span></label>
    <select class="form-select" aria-label="Default select example">
      @if($projects->isEmpty())
        <option selected>{{__('messages.no_projects_available')}}</option>
      @else
        @foreach($projects as $project)
          <option value="{{ $project->id }}">{{ $project->name }}</option>
        @endforeach
      @endif
    </select>

    <label for="form-select"> <span class="fw-semibold"> {{__('messages.select_type')}} </span> </label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
        <label class="form-check-label" for="exampleRadios1">
            {{__('messages.default_radio')}}
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
        <label class="form-check-label" for="exampleRadios2">
            {{__('messages.second_default_radio')}}
        </label>
    </div>

</div>

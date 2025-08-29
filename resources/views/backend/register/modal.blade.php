@php
    $isEdit = isset($working_hour) ? true : false;
    $url = $isEdit ? route('register.update', $working_hour->id) : route('register.store');

@endphp
<form action="{{$url}}" method="post" data-form="ajax-form" data-refresh="refresh" data-modal="#ajax_model" data-datatable="#leaves_datatable">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif
    <div class="row">
        <input type="hidden" name="applied_by" value="{{ Auth::user()->id }}">
        <input type="hidden" name="type" value="{{$working_hour->register_type}}">


        <div class="form-group col-lg-12">
            <label for="project">{{ __('messages.projects') }} <span class="text-danger">*</span></label>
            <select class="form-control select2" name="project" id="project" {{ $isEdit ? 'readonly' : '' }}>
                <option value="">{{__('messages.select_project')}}</option>
                @foreach($projects as $project)
                    <option @if ($isEdit && $project->id == $working_hour->project_id) selected @endif  value="{{$project->id}}" >{{$project->name}}</option>
                @endforeach
            </select>
        </div>

        @if($working_hour->register_type == "hours")



        <div class="form-group col-lg-6">

            <div class="form-group">
                <label class="form-label" for="startTime">{{ __('messages.start_time') }}</label>
                <div class="input-group">
                    <select id="startTime" name="start_time" class="form-control">
                        @foreach(range(1, 12) as $hour)
                            <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}"
                                {{ old('start_time', date('h', strtotime($working_hour->start_time))) == str_pad($hour, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                {{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}
                            </option>
                        @endforeach
                    </select>
                    <span class="input-group-text">:</span>
                    <select id="startAmPm" name="start_am_pm" class="form-control">
                        <option value="AM" {{ old('start_am_pm', date('A', strtotime($working_hour->start_time))) == 'AM' ? 'selected' : '' }}>AM</option>
                        <option value="PM" {{ old('start_am_pm', date('A', strtotime($working_hour->start_time))) == 'PM' ? 'selected' : '' }}>PM</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group col-lg-6">

            <div class="form-group">
                <label class="form-label" for="endTime">{{ __('messages.end_time') }}</label>
                <div class="input-group">
                    <select id="endTime" name="end_time" class="form-control">
                        @foreach(range(1, 12) as $hour)
                            <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}"
                                {{ old('end_time', date('h', strtotime($working_hour->end_time))) == str_pad($hour, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                {{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}
                            </option>
                        @endforeach
                    </select>
                    <span class="input-group-text">:</span>
                    <select id="endAmPm" name="end_am_pm" class="form-control">
                        <option value="AM" {{ old('end_am_pm', date('A', strtotime($working_hour->end_time))) == 'AM' ? 'selected' : '' }}>AM</option>
                        <option value="PM" {{ old('end_am_pm', date('A', strtotime($working_hour->end_time))) == 'PM' ? 'selected' : '' }}>PM</option>
                    </select>
                </div>
            </div>
        </div>





        <div id="error-message" style="color: red; display: none;"></div>

            <div class="form-group col-lg-6">
                <label for="totalHours">{{__('messages.hours')}} <span class="text-danger">*</span></label>
                <input type="text"  class="form-control" name="hour" id="totalHours" value="{{ $isEdit ? $working_hour->hours : '' }}" readonly>
            </div>
            <div class="form-group col-lg-6">
                <div class="form-group">
                    <label class="form-label" for="breakDuration">{{ __('messages.break_duration') }}
                        (minutes)</label>
                    <input type="number" min="0" step="1" class="form-control"id="breakDuration" name="break_duration"  value="{{ $isEdit ? $working_hour->break_duration : '' }}"  >
                </div>
            </div>
        @endif
        @if($working_hour->register_type == "km")
            <div class="form-group col-lg-6">
                <label for="kilometer">{{__('messages.kilometer')}} <span class="text-danger">*</span></label>
                <input type="number" min="0" step="0.01" class="form-control" name="kilometer" id="kilometer" value="{{ $isEdit ? $working_hour->kilometer : '' }}" required>
            </div>
        @endif



    </div>
    <div class="col-lg-12 px-0">
        <button type="submit" class="btn btn-primary" data-button="submit">{{__('messages.update')}}</button>
    </div>
</form>
<script>

function calculateHours() {
        const startTime = document.getElementById('startTime').value;
        const startAmPm = document.getElementById('startAmPm').value;
        const endTime = document.getElementById('endTime').value;
        const endAmPm = document.getElementById('endAmPm').value;

        const errorMessage = document.getElementById('error-message');
        errorMessage.style.display = 'none';

        // Convert start time to 24-hour format
        let startHour = parseInt(startTime);
        if (startAmPm === 'PM' && startHour !== 12) {
            startHour += 12;
        }
        if (startAmPm === 'AM' && startHour === 12) {
            startHour = 0;
        }

        // Convert end time to 24-hour format
        let endHour = parseInt(endTime);
        if (endAmPm === 'PM' && endHour !== 12) {
            endHour += 12;
        }
        if (endAmPm === 'AM' && endHour === 12) {
            endHour = 0;
        }

        // Validation: Ensure start time is less than end time
        if (endHour <= startHour) {
            errorMessage.innerText = 'Invalid time range. End time must be greater than Start time.';
            errorMessage.style.display = 'block';
            document.getElementById('totalHours').value = '';
            return;
        }

        // Calculate total hours
        let totalHours = endHour - startHour;

        // Set total hours
        document.getElementById('totalHours').value = totalHours;
    }

    // Add event listeners
    document.getElementById('startTime').addEventListener('change', calculateHours);
    document.getElementById('startAmPm').addEventListener('change', calculateHours);
    document.getElementById('endTime').addEventListener('change', calculateHours);
    document.getElementById('endAmPm').addEventListener('change', calculateHours);


</script>

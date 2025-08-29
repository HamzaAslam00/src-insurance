@extends('backend.layouts.app')

@section('title', '| ' . __('messages.register_hours'))


@section('breadcrumb')
    <div class="page-header">
        <h1 class="page-title">{{ __('messages.register_hours') }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('messages.dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.register_hours') }}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">

        <div class="card-body">
            <div class="card-pay">
                <div class="tab-content">

                    {{-- <div class="py-2 mb-1 fs-5 fw-bold">{{__('messages.kind')}}</div> --}}
                    <i class="fa fa-clock-o"></i> {{ __('messages.hours') }}
                    <br>
                    <form action="{{ route('register.store') }}" method="post" data-refresh="refresh"
                        data-form="ajax-form">
                        @csrf
                        <input type="hidden" value="hours" name="register_type" id="register_hour">

                        <div class="row d-flex">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="kind">{{ __('messages.select_kind') }}</label>
                                    <select class="form-control select2" name="kind" id="kind"
                                        onchange="ChangeDropdowns(this.value);">
                                        <option value="" disabled selected>{{ __('messages.select_kind') }}</option>
                                        <option value="working_hours">{{ __('messages.working_hours') }}</option>
                                        <option value="overtime">{{ __('messages.overtime') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">{{ __('messages.Choose_the_days_option') }}</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dateOption" id="oneDay"
                                            value="oneDay" checked>
                                        <label class="form-check-label" for="oneDay">{{ __('messages.one_day') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dateOption" id="multipleDays"
                                            value="multipleDays">
                                        <label class="form-check-label"
                                            for="multipleDays">{{ __('messages.multiple_days') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4" id="startDateField">
                                <div class="form-group">
                                    <label class="form-label" for="startDate">{{ __('messages.start_date') }}</label>
                                    <input type="date" class="form-control" id="startDate" value="{{ $date }}"
                                        name="start_date">
                                </div>
                            </div>
                            <div class="col-md-4" id="endDateField" style="display: none;">
                                <div class="form-group">
                                    <label class="form-label" for="endDate">{{ __('messages.end_date') }}</label>
                                    <input type="date" class="form-control" id="endDate" value="{{ $date }}"
                                        name="end_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="project">{{ __('messages.select_project') }}</label>
                                    <select class="form-control select2" name="project" id="project">
                                        <option value="" selected disabled>{{ __('messages.select_project') }}
                                        </option>
                                        @foreach ($HoursProjects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4" id= "typeworking">
                                <div class="form-group">
                                    <label class="form-label"
                                        for="working_hour">{{ __('messages.select_working_type') }}</label>
                                    <select class="form-control select2" name="working_hour" id="working_hour">
                                        <option value="" selected disabled>{{ __('messages.select_working_type') }}
                                        </option>
                                        <option value="working_hours">{{ __('messages.working_hours') }}</option>
                                        <option value="working_home">{{ __('messages.billable_hours_working_from_home') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" id= "typeovertime" style="display: none;">
                                <div class="form-group">
                                    <label class="form-label" for="overtime">{{ __('messages.select_over_time') }}</label>
                                    <select class="form-control select2" name="overtime" id="overtime_type"
                                        style="width: 100%">
                                        <option value="" selected disabled>{{ __('messages.select_over_time') }}
                                        </option>
                                        <option value="overtime">{{ __('messages.overtime') }}</option>
                                        <option value="overtime_25">{{ __('messages.overtime_+_25%') }}</option>
                                        <option value="overtime_50">{{ __('messages.overtime_+_50%') }}</option>
                                        <option value="overtime_100">{{ __('messages.overtime_+_100%') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="startTime">{{ __('messages.start_time') }}</label>
                                    <div class="input-group">
                                        <select id="startTime" name="start_time" class="form-control">
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                        <span class="input-group-text">:</span>
                                        <select id="startAmPm" name="start_am_pm" class="form-control">
                                            <option value="AM">AM</option>
                                            <option value="PM">PM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="endTime">{{ __('messages.end_time') }}</label>
                                    <div class="input-group">
                                        <select id="endTime" name="end_time" class="form-control">
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                        <span class="input-group-text">:</span>
                                        <select id="endAmPm" name="end_am_pm" class="form-control">
                                            <option value="AM">AM</option>
                                            <option value="PM">PM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="breakDuration">{{ __('messages.break_duration') }}
                                        (minutes)</label>
                                    <input type="number" min="0" step="1" class="form-control"
                                        id="breakDuration" name="break_duration">
                                </div>
                            </div>
                            <div id="error-message" style="color: red; display: none;"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="totalHours">{{ __('messages.hour') }}</label>
                                    <input type="text" class="form-control" id="totalHours" name="hour" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"
                                    data-button="submit">{{ __('messages.save') }}</button>
                            </div>
                        </div>
                    </form>
                    <!--- end hour then working hour tab --->
                    <br> <br>
                    <i class="fa fa-car"></i>{{ __('messages.km') }}
                    <hr class="my-4 border-primary">

                    <form action="{{ route('register.store') }}" method="post" data-form="ajax-form">
                        @csrf
                        <input type="hidden" value="km" name="register_type" id="register_km">


                        <div class="row d-flex">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">{{ __('messages.choose_the_days_option') }}</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dateOption" id="oneDay_km"
                                            value="oneDay" checked>
                                        <label class="form-check-label"
                                            for="oneDay_km">{{ __('messages.one_day') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="dateOption"
                                            id="multipleDays_km" value="multipleDays">
                                        <label class="form-check-label"
                                            for="multipleDays_km">{{ __('messages.multiple_days') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="startDateField_km">
                                <div class="form-group">
                                    <label class="form-label" for="startDate_km">{{ __('messages.start_date') }}</label>
                                    <input type="date" class="form-control" id="startDate_km"
                                        value="{{ $date }}" name="start_date">
                                </div>
                            </div>
                            <div class="col-md-4" id="endDateField_km" style="display: none;">
                                <div class="form-group">
                                    <label class="form-label" for="endDate">{{ __('messages.end_date') }}</label>
                                    <input type="date" class="form-control" id="endDate_km"
                                        value="{{ $date }}" name="end_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="project">{{ __('messages.select_project') }}</label>
                                    <select class="form-control select2" name="project" id="project" required
                                        style="width: 100%">
                                        <option value="" selected disabled>{{ __('messages.select_project') }}
                                        </option>
                                        @foreach ($KMProjects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label"
                                        for="number_km">{{ __('messages.total_number_of_km,s') }}</label>
                                    <input type="number" min="0" step="0.01" class="form-control"
                                        id="number_km" name="kilometer">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"
                                    data-button="submit">{{ __('messages.save') }}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('a[href="#tabWorkhour"]').on('click', function(e) {
                e.preventDefault();
                if ($('#tabOvertime').hasClass('d-none')) {
                    $('#tabOvertime').removeClass('d-none');
                } else {
                    $('#tabOvertime').addClass('d-none');
                }
                if ($('#tabWorkhour').hasClass('d-none')) {
                    $('#tabWorkhour').removeClass('d-none');
                } else {
                    $('#tabWorkhour').addClass('d-none');
                }
            });

            $('a[href="#tabOvertime"]').on('click', function(e) {
                e.preventDefault();
                if ($('#tabWorkhour').hasClass('d-none')) {
                    $('#tabWorkhour').removeClass('d-none');
                } else {
                    $('#tabWorkhour').addClass('d-none');
                }
                if ($('#tabOvertime').hasClass('d-none')) {
                    $('#tabOvertime').removeClass('d-none');
                } else {
                    $('#tabOvertime').addClass('d-none');
                }
            });
        });

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
        document.addEventListener('DOMContentLoaded', function() {
            /// km date change
            const oneDayRadio_km = document.getElementById('oneDay_km');
            const multipleDaysRadio_km = document.getElementById('multipleDays_km');
            const startDateField = document.getElementById('startDateField_km');
            const endDateField_km = document.getElementById('endDateField_km');
            const startDateInput_km = document.getElementById('startDate_km');
            const endDateInput_km = document.getElementById('endDate_km');

            // Set the default date to today
            const today = new Date().toISOString().split('T')[0];
            //startDateInput_km.value = today;
            //endDateInput_km.value = today;

            oneDayRadio_km.addEventListener('change', function() {
                if (oneDayRadio_km.checked) {
                    endDateField_km.style.display = 'none';
                }
            });

            multipleDaysRadio_km.addEventListener('change', function() {
                if (multipleDaysRadio_km.checked) {
                    endDateField_km.style.display = 'block';
                }
            });
        });

        function ChangeDropdowns(value) {
            if (value == "working_hours" || value == '') {
                document.getElementById('typeovertime').style.display = 'none';
                document.getElementById('typeworking').style.display = 'block';
            } else if (value == "overtime") {
                document.getElementById('typeworking').style.display = 'none';
                document.getElementById('typeovertime').style.display = 'block';
            }
        }
    </script>
@endpush

@extends('backend.layouts.app')

@section('title', '| ' .  __('messages.register_hours'))

<style>

    .circle {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 10px;
            vertical-align: middle;
        }

        .circle-hour { background-color: #28a745; } /* Green for Official Holidays */
        .circle-holiday { background-color: #007bff; } /* Green for Official Holidays */
        .circle-approved { background-color: gray; } /* Blue for Approved Leaves */
        .circle-pending { background-color: #ffc107; } /* Yellow for Pending Leaves */
        .circle-canceled { background-color: #dc3545; } /* Red for Canceled Leaves */

        .fc .fc-daygrid-day.fc-day-today
        {
            background-color: #54a767 !important;
        }

        .selected-day {
            background-color: #a4e9b4 !important;
        }

</style>
@section('styles')

@endsection

@section('breadcrumb')
    <div class="page-header">
        <h1 class="page-title">{{ __('messages.register_hours') }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('messages.dashboard')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.register_hours') }}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

<div class="container d-flex flex-wrap align-items-start justify-content-between">
    <div class="col-md-6">
        <div class="card p-4">
            <div id="calendar"></div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><span class="circle circle-hour"></span>{{__('messages.registered_hours')}} </p>
                <p><span class="circle circle-holiday"></span>{{__('messages.official_holidays')}} </p>
                <p><span class="circle circle-approved"></span> {{__('messages.approved_leaves')}}</p>
                <p><span class="circle circle-pending"></span>{{__('messages.pending_leaves')}} </p>
                <p><span class="circle circle-canceled"></span> {{__('messages.canceled_leaves')}}</p>
            </div>
            <div class="col-md-6">
                <button id="addHoursBtn" type="button" class="btn dark-icon btn-primary btn-sm w-auto rounded-pill px-3 py-2 float-end">
                    <i class="ri-add-fill"></i> {{__('messages.add_hours')}}
                </button>
            </div>
        </div>
    </div>

    <div class="card col-md-6 p-4">
        <div id="results"></div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
<script>
$(document).ready(function() {

    var dateArray = @json($dateArray);

    var calendarEl = document.getElementById('calendar');
    var today = new Date().toISOString().split('T')[0];
    var selectedDate = today;

    // Initialize FullCalendar
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        eventDidMount: function(info) {
            // Find the main event element
            var mainEventElement = $(info.el).find('.fc-event-main');

            // Check if it has a parent with fc-daygrid-event class
            if (mainEventElement.parents('.fc-daygrid-event').length > 0) {
                // Remove fc-daygrid-event class from the parent element
                mainEventElement.parents('.fc-daygrid-event').removeClass('fc-daygrid-event');
            }
            if (mainEventElement.parents('.fc-h-event').length > 0) {
                // Remove fc-daygrid-event class from the parent element
                mainEventElement.parents('.fc-h-event').removeClass('fc-h-event');
            }
        },
        dateClick: function(info) {
            var date = info.dateStr;
            selectedDate = date;

            // Remove the selected-day class from all days
            $('.fc-daygrid-day').removeClass('selected-day');

            // Add the selected-day class to the clicked day
            $(info.dayEl).addClass('selected-day');

            getRecordByDate(date);
        },
        eventContent: function(arg) {
            var dotColor = arg.event.extendedProps.dotColor || '#22222'; // Default color if not provided
            return {
                html: '<div class="fc-daygrid-event-dot" style="margin:auto; border: 5px solid ' + dotColor + ';"></div>'
            };
        }
    });

    // Render calendar
    calendar.render();

    // Fetch holidays and leaves
    fetchHolidaysAndLeaves();

    // Fetch records for today's date
    getRecordByDate(today);

    // Function to fetch holidays and leaves
    function fetchHolidaysAndLeaves() {
        $.ajax({
            url: "{{ route('fetch.dates') }}",
            method: 'GET',
            success: function(response) {
                if (response) {
                    var events = [];


                    // Process hours with green dot
                    response.hours.forEach(function(date) {
                        events.push({ title: 'hours', start: date, dotColor: 'green' });
                    });

                    // Process holidays with green dot
                    response.holidays.forEach(function(date) {
                        events.push({ title: 'Holiday', start: date, dotColor: 'blue' });
                    });
                    // Process approved leaves with black dot
                    response.approvedLeaves.forEach(function(date) {
                        events.push({ title: 'Approved Leave', start: date, dotColor: 'gray' });
                    });

                    // Process approved sick leaves with black dot
                    response.approvedSickLeaves.forEach(function(date) {
                        events.push({ title: 'Approved Sick Leave', start: date, dotColor: 'gray' });
                    });

                    // Process pending leaves with gray dot
                    response.pendingLeaves.forEach(function(date) {
                        events.push({ title: 'Pending Leave', start: date, dotColor: 'orange' });
                    });

                    // Process pending sick leaves with gray dot
                    response.pendingSickLeaves.forEach(function(date) {
                        events.push({ title: 'Pending Sick Leave', start: date, dotColor: 'orange' });
                    });

                    // Process cancelled leaves with orange dot
                    if (response.cancelledLeaves) {
                        response.cancelledLeaves.forEach(function(date) {
                            events.push({ title: 'Cancelled Leave', start: date, dotColor: 'red' });
                        });
                    }

                    // Process cancelled sick leaves with orange dot
                    response.cancelledSickLeaves.forEach(function(date) {
                        events.push({ title: 'Cancelled Sick Leave', start: date, dotColor: 'red' });
                    });

                    // Add events to calendar
                    calendar.addEventSource(events);
                }
            },
            error: function(xhr, status, error) {
                console.error("{{__('messages.error_fetching_holidays_and_leaves')}}:", error);
            }
        });
    }

    // Function to fetch records by date
    function getRecordByDate(date) {
        $.ajax({
            url: "{{ route('fetch.records') }}",
            method: 'GET',
            data: { date: date },
            success: function(response) {
                $('#results').empty();

                var yearMonth = getYearMonthFromDate(date);
                var display;

                if (dateArray.includes(yearMonth)) {
                    display = "none";
                    // Hide edit buttons where yearMonth exists in dateArray

                } else {
                    display = "block";
                    // Show edit buttons where yearMonth does not exist in dateArray

                }

                if (response.hasOwnProperty('hours')) {
                    var k = 0;
                    $.each(response.hours, function(index, project) {
                        var hour;
                        var type_value;
                        if(project.register_type == 'hours')
                        {
                            hour = 1;
                            type_value = "Hours";

                        }
                        else
                        {
                            hour = 2;
                            type_value = "KM";
                        }

                        var editUrl = "{{ route('register.edit', ':id') }}".replace(':id', project.id+'_'+date+'_'+hour);
                        var deleteUrl = "{{ route('register.destroy', ':id') }}".replace(':id', project.id);

                        var cardHtml = `
                            <div class="card mb-3 shadow-sm">
                            ${k === 0 ? ` <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title">${date}</h5>
                            </div>` : ''}

                            <div class="card-body d-flex flex-wrap">
                                <div class="flex-grow-1 p-2">
                                    <a class="btn btn-sm btn-primary edit-btn" data-act="ajax-modal" data-action-url="${editUrl}" data-title="{{__('messages.edit_hour')}}" style="float:right;margin-right:10px; display:${display};">
                                        <span class="fe fe-edit"></span>
                                    </a>
                                     <button type="button" class="btn btn-sm btn-danger delete" data-url="${deleteUrl}" data-method="get" data-refresh ="refresh" data-table="#users_datatable" style="float:right;margin-right:10px; display:${display};">
                                        <span class="fe fe-trash-2"> </span>
                                    </button>

                                    <h6 class="card-subtitle mb-2 text-muted">Project Name: ${project.project.name}</h6>
                                    ${project.hours != null ? `<p class="card-text">Hours: ${project.hours}</p>` : ''}
                                    ${project.kilometer != null ? `<p class="card-text">Kilometer: ${project.kilometer}</p>` : ''}
                                </div>


                            </div>
                        </div>
                        `;


                        if (dateArray.includes(yearMonth)) {
                            $('#addHoursBtn').hide();
                        }
                        else
                        {
                            $('#addHoursBtn').show();
                        }
                        $('#results').append(cardHtml);
                        k = 1;

                    });
                }
                else if (response.type === 'hour' || response.type === 'sick' || response.type === 'leave' || response.type === 'holiday') {


                        // if(response.type === 'hour')
                        // {
                        //     $('#addHoursBtn').show();
                        // }
                        // else
                        // {
                        //     $('#addHoursBtn').hide();
                        // }
                        $('#addHoursBtn').hide();

                        var cardTitle = response.date;
                        var cardSubtitle = '';

                        switch (response.type) {
                            case 'hour':
                                cardSubtitle = `<strong>${response.hour} Working hours</strong>`;
                                cardText = response.project;
                                break;
                            case 'sick':
                                cardSubtitle = `<strong>${capitalizeFirstLetter(response.type)} Leave - ${capitalizeFirstLetter(response.status)}</strong>`;
                                cardText = response.reason;
                                break;
                            case 'leave':
                                cardSubtitle = `<strong>${capitalizeFirstLetter(response.type)} - ${capitalizeFirstLetter(response.status)}</strong>`;
                                cardText = response.reason;
                                break;
                            case 'holiday':
                                cardSubtitle = `<strong>${capitalizeFirstLetter(response.type)}</strong>`;
                                cardText = response.reason;
                                break;
                        }

                        var cardHtml = `
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">${cardTitle}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">${cardSubtitle}</h6>
                                    <p class="card-text">${cardText}</p>
                                </div>
                            </div>
                        `;
                        $('#results').append(cardHtml);

                        if(response.status == "cancelled")
                        {
                            $('#addHoursBtn').show();
                        }


                } else {

                    const dateString = new Date(date);
                    const dayOfWeek = dateString.getDay(); // getDay returns 0 for Sunday, 1 for Monday, ..., 6 for Saturday

                    const isWeekend = (dayOfWeek === 0 || dayOfWeek === 6);

                    if (!isWeekend) {
                        if(dateArray.includes(yearMonth)) {
                            $('#addHoursBtn').hide();
                        }
                        else
                        {
                            $('#addHoursBtn').show();
                        }
                        //$('#addHoursBtn').show();
                        $('#results').append('<p>{{__("messages.no_hours_added")}}.</p>');
                    }
                    else
                    {
                        $('#addHoursBtn').hide();
                        $('#results').append('<p>{{__("messages.can_not_add_hours_on_weekend")}}.</p>');
                    }


                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching records:', error);
            }
        });
    }

    // Add event listener for the add hours button
    $('#addHoursBtn').click(function() {
        var url = "{{ route('create.register', ':date') }}";
        url = url.replace(':date', selectedDate);
        window.location.href = url;
    });

    // Function to capitalize first letter of a string
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    function getYearMonthFromDate(dateString) {
        return dateString.slice(0, 7); // Extracts the first 7 characters (YYYY-MM)
    }

});
</script>
@endpush

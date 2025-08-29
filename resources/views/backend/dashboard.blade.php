@extends('backend.layouts.app')

@section('title', '| '. __('messages.dashboard'))
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

        .circle_register_hour {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border:3px solid green;
            color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto;
        }
        .circle_total_hour
        {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border:3px solid blue;
            color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto;
        }
        .register_btn
        {
            font-size: 15px !important;
        }
        .marquee
        {
            font-size: 16px;
            color: red;
            font-style: italic;
        }
        .li_bold
        {
            font-size: 22px !important;
            font-weight: 600 !important;
        }
        .bold-payout
        {
            font-size: 20px !important;
            font-weight: 500 !important;
        }
        .payout_hidden {
            display: none;
        }
        #payout-list
        {
            margin-bottom: 25px !important;
        }
        #hide-future-dates
        {
            display: none;
        }
        #show-more {
            text-decoration: none;
            position: relative;
            display: inline-block;
        }

        #show-more::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px; /* Adjust the thickness of the line */
            bottom: -2px; /* Position the line just below the text */
            left: 0;
            top:30px;
            background-color: #df8824; /* Set the line color */
            transition: width 0.3s; /* Add transition for a smooth effect */
        }

        #show-more:hover::after {
            width: 100%; /* Expand the line on hover */
        }
        #hide-future-dates {
            text-decoration: none;
            position: relative;
        }

        #hide-future-dates::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px; /* Adjust the thickness of the line */
            bottom: -2px; /* Position the line just below the text */
            left: 0;
            top:30px;
            background-color: #df8824; /* Set the line color */
            transition: width 0.3s; /* Add transition for a smooth effect */
        }

        #hide-future-dates:hover::after {
            width: 100%; /* Expand the line on hover */
        }

        .fc .fc-daygrid-day.fc-day-today
        {
            background-color: #54a767 !important;
        }

        .selected-day {
            background-color: #a4e9b4 !important;
        }

</style>

@section('breadcrumb')
    <div class="page-header">
        <h1 class="page-title">{{__('messages.dashboard')}}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">{{__('messages.dashboard')}}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
        @role('employee')
            @if($upcomingHolidays && $upcomingHolidays->start_date && $upcomingHolidays->end_date)
                <marquee class="marquee" behavior="scroll" direction="left" scrollamount="10">
                    {{__('messages.official_holiday_message')}}: {{date('F j, Y', strtotime($upcomingHolidays->start_date))}} {{__('messages.to')}} {{date('F j, Y', strtotime($upcomingHolidays->end_date))}}.
                </marquee>
            @endif
        @endrole
    @include('backend.leaves.view_modal')
    <h1>
    {{ __('messages.hi') }}, {{ Auth::user()->full_name }}!
    </h1>
    <!-- ROW-1 -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <div class="row">
                @if(auth()->user()->user_type == 'admin')
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <a href="{{ route('users.index') }}">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mt-2">
                                        <h6 class="">{{ __('messages.total_employees') }}</h6>
                                        <h2 class="mb-0 number-font">{{ $employeesCount }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <a href="{{ route('leaves.index', 'pending') }}">
                        <div class="card overflow-hidden bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mt-2">
                                        <h6 class="">{{ __('messages.pending_leaves') }}</h6>
                                        <h2 class="mb-0 number-font">{{ $pendingLeavesCount }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="card col-lg-12">
                    <div class="card-header justify-content-between">
                        <h3 class="card-title font-weight-bold">{{ __('messages.latest_leave_applications') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="latest_leave_datatable" class="table table-bordered text-nowrap key-buttons border-bottom w-100">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">{{ __('messages.id') }}</th>
                                        <th class="border-bottom-0">{{ __('messages.employee_name') }}</th>
                                        <th class="border-bottom-0">{{ __('messages.start_date') }}</th>
                                        <th class="border-bottom-0">{{ __('messages.end_date') }}</th>
                                        <th class="border-bottom-0">{{ __('messages.reason') }}</th>
                                        <th class="border-bottom-0">{{ __('messages.document') }}</th>
                                        <th class="border-bottom-0">{{ __('messages.status') }}</th>
                                        <th class="border-bottom-0">{{ __('messages.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be populated via Ajax -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif

                @if(auth()->user()->user_type == 'employee')
                <div class="col-md-6">
                    <div class="card text-center shadow-sm" style="width: 100%; border-color: #3490dc; height:94%;">
                        <div class="card-body">
                            <h5 class="card-title">{{__('messages.'.date('F')) }} {{ date('Y') }}</h5>
                            <div class="row" style="margin-top: 13%;">
                                <div class="col-md-5 col-sm-12 mb-2"><div class="circle_total_hour" id="required-hours">{{ auth()->user()->working_hour }}</div></div>
                                <div class="col-md-7 col-sm-12 align-content-center ml-3">
                                    <h6 class="card-subtitle mb-2 text-muted float-md-start font-weight-bolder fs-4" style="font-size:22px !important;">{{ __('messages.required_hours_agenda') }}</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-sm-12 mb-2"><div class="circle_register_hour" id="registered-hours">{{ $registeredHour }}</div></div>
                                <div class="col-md-7 col-sm-12 align-content-center ml-3">
                                    <h6 class="card-subtitle mb-2 text-muted float-md-start font-weight-bolder fs-4" style="font-size:22px !important;">{{ __('messages.total_registered_hours') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('messages.hours_agenda') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="chartPie" class="h-275"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header justify-content-between d-flex">
                            <div class="bold-payout">{{ __('messages.payout') }}</div>
                            <div style="background-color: #c4e5c4; padding:8px; border-radius:12px;"> {{ __('messages.in') }} {{ getReminingDaya() }} {{ __('messages.days') }}</div>
                        </div>
                        <div class="card-body">
                            <h4 style="margin-bottom: 10px;">{{ __('messages.next') }}</h4>
                            <ul id="payout-list">
                                @foreach(getNextSixMonth() as $key => $month)
                                <li class="{{ $key === 0 ? 'li_bold' : 'payout_hidden' }}">
                                    {{ $month['month'] }}
                                </li>
                                @endforeach
                            </ul>
                            <a href="#" id="show-more">{{ __('messages.view_all_data') }}</a>
                            <a href="#" id="hide-future-dates">{{ __('messages.hide_future_dates') }}</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            @if(auth()->user()->user_type == 'employee')
            <!-- Agenda Section -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card p-4">
                        <div id="calendar"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <p><span class="circle circle-hour"></span>{{ __('messages.registered_hours') }} </p>
                            <p><span class="circle circle-holiday"></span>{{ __('messages.official_holidays') }} </p>
                            <p><span class="circle circle-approved"></span>{{ __('messages.approved_leaves') }} </p>
                            <p><span class="circle circle-pending"></span>{{ __('messages.pending_leaves') }} </p>
                            <p><span class="circle circle-canceled"></span>{{ __('messages.cancelled_leaves') }} </p>
                        </div>
                        <div class="col-md-6">
                            <button id="addHoursBtn" type="button" class="btn dark-icon btn-primary btn-sm w-auto rounded-pill px-3 py-2 float-end">
                                <i class="ri-add-fill"></i> {{ __('messages.add_hours') }}
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card p-4" style="height: fit-content;">
                        <div id="results">

                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- ROW-1 END -->



@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script>
        $(function() {
            $('#latest_leave_datatable').DataTable({
                ajax: '{{ route('latest-leaves-datatable') }}',
                processing: true,
                serverSide: true,
                scrollX: false,
                autoWidth: true,
                columnDefs: [{
                        width: 1,
                        targets: 7
                    },
                    {
                        width: '5%',
                        targets: 0
                    }
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'start_date',
                        name: 'start_date'
                    },
                    {
                        data: 'end_date',
                        name: 'end_date'
                    },
                    {
                        data: 'reason',
                        name: 'reason'
                    },
                    {
                        data: 'document',
                        name: 'document'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ],
            });
        });

        function updateStatus(leaveId, status) {
            $.ajax({
                url: '{{ route("leaves.updateStatus") }}', // Define this route
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    id: leaveId,
                    status: status
                },
                success: function(response) {
                    if (response.success) {
                        alert("{{ __('messages.leave_status_updated_sucessfully') }}");
                        $('#latest_leave_datatable').DataTable().ajax.reload(); // Reload the DataTable
                    } else {
                        alert("{{__('messages.failed_to_update_leave_status')}}");
                    }
                },
                error: function(xhr) {
                    alert("{{__('messages.error_updating_leave_status')}}");
                }
            });
        }

        function showDetails(leaveId) {
            $.ajax({
                url: '{{ url("leaves") }}/' + leaveId,
                method: 'GET',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    id: leaveId,
                },
                success: function(response) {
                    if (response.success) {
                        $('#viewDetailsContent').html(
                            // '<p><strong>Employee Name:</strong> ' + response.data.appliedByUser->first_name + '</p>' +
                            '<p><strong>{{__("messages.start_date")}}:</strong> ' + response.data.start_date + '</p>' +
                            '<p><strong>{{__("messages.end_date")}}:</strong> ' + response.data.end_date + '</p>' +
                            '<p><strong>{{__("messages.reason")}}:</strong> ' + response.data.reason + '</p>' +
                            '<p><strong>{{__("messages.details")}}:</strong> ' + response.data.detail + '</p>' +
                            '<p><strong>{{__("messages.status")}}:</strong> ' + response.data.status + '</p>'
                        );
                        $('#viewDetails').modal('show');
                    } else {
                        alert("{{__('messages.failed_to_load')}}");
                    }
                },
                error: function(xhr) {
                    alert("{{__('messages.loading_error')}}");
                }
            });
        }

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
                console.log(response.hours);

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
                                    <a class="btn btn-sm btn-primary" data-act="ajax-modal" data-action-url="${editUrl}" data-title="{{__('messages.edit_hour')}}" style="float:right;margin-right:10px; display:${display};">
                                        <span class="fe fe-edit"></span>
                                    </a>

                                    <button type="button" class="btn btn-sm btn-danger delete" data-url="${deleteUrl}" data-method="get"  data-refresh ="refresh" data-table="#users_datatable" style="float:right;margin-right:10px; display:${display};">
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
                    //     {
                    //         $('#addHoursBtn').show();
                    //     }
                    //     else
                    //     {
                    //         $('#addHoursBtn').hide();
                    //     }

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


                } else {4
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
                        // $('#addHoursBtn').show();
                        $('#results').append('<p>{{__("messages.no_hours_added")}}.</p>');
                    }
                    else
                    {
                        $('#addHoursBtn').hide();
                        $('#results').append('<p>{{__("messages.can_not_add_hours_on_weekend")}}.</p>');
                    }
                    console.log("show");

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
});

/// payout script
document.addEventListener('DOMContentLoaded', function() {
  const showMoreButton = document.getElementById('show-more');
  const hideFutureDatesButton = document.getElementById('hide-future-dates');
  const hiddenItems = document.querySelectorAll('#payout-list .payout_hidden');
  const items = document.querySelectorAll('#payout-list li');

  showMoreButton.addEventListener('click', function(e) {
    console.log("hh");
    e.preventDefault();
    hiddenItems.forEach(item => {
      item.classList.remove('payout_hidden');
    });
    showMoreButton.style.display = 'none'; // Hide the "show more" link after revealing all items
    hideFutureDatesButton.style.display = 'inline-block';
  });

  hideFutureDatesButton.addEventListener('click', function(e) {
    e.preventDefault();
    items.forEach((item, index) => {
      if (index > 0) { // Skip the first item
        item.classList.add('payout_hidden');
      }
    });
    showMoreButton.style.display = 'block'; // Show the "show more" link
    hideFutureDatesButton.style.display = 'none';
  });
});

/// chart js code
var registeredHours = @json($registeredHour);
var missingHours = @json($missingHours);

var datapie = {
    labels: ["{{__('messages.registered_hour')}}", "{{__('messages.missing_hours')}}"],
    datasets: [{
        data: [registeredHours, missingHours],
        backgroundColor: ['green', 'red']
    }]
};
var optionpie = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
        display: false,
    },
    animation: {
        animateScale: true,
        animateRotate: true
    }
};

/* Doughbut Chart*/
var ctx6 = document.getElementById('chartPie');
var myPieChart6 = new Chart(ctx6, {
    type: 'doughnut',
    data: datapie,
    options: optionpie
});

function getYearMonthFromDate(dateString) {
        return dateString.slice(0, 7); // Extracts the first 7 characters (YYYY-MM)
    }

    </script>
@endpush

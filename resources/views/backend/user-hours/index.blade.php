@extends('backend.layouts.app')
@section('title', '| ' . __('messages.user'))


@section('breadcrumb')
    <div class="page-header">
        <h1 class="page-title">{{__('messages.user_hour_list')}}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('messages.dashboard')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('messages.user_hour')}}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

<div class="row">
    <!-- COL-END -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="panel panel-primary">
                    <div class="tab-menu-heading">
                        <div class="tabs-menu1">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs">
                                <li><a href="#tab25" class="active" data-bs-toggle="tab">{{__('messages.hour')}}</a></li>
                                <li><a href="#tab26" data-bs-toggle="tab">{{__('messages.kilometer')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body pb-0">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab25">
                                <!---- hours --->
                                <div class="">
                                    <div class="d-flex justify-content-between my-4">
                                        <h3 class="card-title font-weight-bold mb-0">{{__('messages.hours_list')}}</h3>
                                        <a href="{{ route('user.hours.create', $user->id) }}" class="btn btn-primary btn-sm">{{__('messages.add_hour')}}</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <label for="date" class="font-weight-bold">Month</label>
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                    </div>
                                                    <input class="form-control date1" id="datepicker-month1" placeholder="-- Select Month --" type="text"
                                                        name="date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="user_hour_datatable" class="table table-bordered text-nowrap key-buttons border-bottom w-100">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">{{__('messages.#')}}</th>
                                                    <th class="border-bottom-0">{{__('messages.project_name')}}</th>

                                                    <th class="border-bottom-0">{{__('messages.start_date')}}</th>
                                                    <th class="border-bottom-0">{{__('messages.end_date')}}</th>
                                                    <th class="border-bottom-0">{{__('messages.start_time')}}</th>
                                                    <th class="border-bottom-0">{{__('messages.end_time')}}</th>
                                                    <th class="border-bottom-0">{{__('messages.hours')}}</th>
                                                    <th class="border-bottom-0">{{__('messages.actions')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab26">
                                <!--- kilometer --->
                                <div class="d-flex justify-content-between my-4">
                                    <h3 class="card-title font-weight-bold mb-0">{{__('messages.kilometers_List')}}</h3>
                                    <a href="{{ route('user.hours.create', $user->id) }}" class="btn btn-primary btn-sm">{{__('messages.add_kilometer')}}</a>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label for="date" class="font-weight-bold">Month</label>
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                                                </div>
                                                <input class="form-control date2" id="datepicker-month2" placeholder="-- Select Month --" type="text"
                                                    name="date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="user_km_datatable" class="table table-bordered text-nowrap key-buttons border-bottom w-100">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">{{__('messages.#')}}</th>
                                                <th class="border-bottom-0">{{__('messages.project_name')}}</th>

                                                <th class="border-bottom-0">{{__('messages.start_date')}}</th>
                                                <th class="border-bottom-0">{{__('messages.end_date')}}</th>
                                                <th class="border-bottom-0">{{__('messages.kilometer')}}</th>
                                                <th class="border-bottom-0">{{__('messages.actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- COL-END -->
</div>



@endsection

@push('scripts')
    <script>
        // MONTH PICKER
        $('#datepicker-month1, #datepicker-month2').bootstrapdatepicker({
            format: "MM yyyy",
            viewMode: "months",
            minViewMode: "months",
            multidate: false,
            multidateSeparator: "-",
        })

        $(function() {
            /// hour table
            var dataTable1 = $('#user_hour_datatable').DataTable({
                ajax: {
                    url: '{{ route('user-hours-datatable', $user->id) }}',
                    type: 'GET',
                    data: function (d) {
                        d.date = $('.date1').val();
                    },
                },
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
                        data: 'project_name',
                        name: 'project_name'
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
                        data: 'start_time',
                        name: 'start_time'
                    },
                    {
                        data: 'end_time',
                        name: 'end_time'
                    },
                    {
                        data: 'hours',
                        name: 'hours'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ],
                order: [[ 0, 'desc' ]]
            });
            // Create DataTable buttons
             /// km table

             var dataTable2 = $('#user_km_datatable').DataTable({
                ajax: {
                    url: '{{ route('user-kilometer-datatable', $user->id) }}',
                    type: 'GET',
                    data: function (d) {
                        d.date = $('.date2').val();
                    },
                },
                processing: true,
                serverSide: true,
                scrollX: false,

                autoWidth: true,
                columnDefs: [{
                        width: 1,
                        targets: 5
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
                        data: 'project_name',
                        name: 'project_name'
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
                        data: 'kilometer',
                        name: 'kilometer'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ],
                order: [[ 0, 'desc' ]]
            });

            $(document).on('change', '.date1', function() {
                dataTable1.draw();
            });

            $(document).on('change', '.date2', function() {
                dataTable2.draw();
            });
        });

        // Add event listener for the add hours button


    </script>
@endpush

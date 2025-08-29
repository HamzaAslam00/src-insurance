@extends('backend.layouts.app')

@section('title', '| ' . __('messages.user'))

@section('breadcrumb')
    <div class="page-header">
        <h1 class="page-title">{{__('messages.user_list')}}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('messages.dashboard')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('messages.users')}}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header justify-content-between">
            <h3 class="card-title font-weight-bold">{{__('messages.users')}}</h3>
            @can('add_user')
                <button type="button" class="btn dark-icon btn-primary btn-sm" data-act="ajax-modal" data-method="get"
                    data-action-url="{{ route('users.create') }}" data-title="{{__('messages.add_new_user')}}">
                    <i class="ri-add-fill"></i> {{__('messages.add_user')}}
                </button>
            @endcan
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="date" class="font-weight-bold">Month</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fa fa-clock-o tx-16 lh-0 op-6"></span>
                            </div>
                            <input class="form-control date" id="datepicker-month" placeholder="-- Select Month --" type="text" name="date">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="font-weight-bold">Status</label>
                        <select class="form-control select2 status" name="status">
                            <option value="" disabled selected>--- Select Status ---</option>
                            <option value="all_status">All</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="users_datatable" class="table table-bordered text-nowrap key-buttons border-bottom w-100">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">{{__('messages.#')}}</th>
                            <th class="border-bottom-0">{{__('messages.name')}}</th>
                            <th class="border-bottom-0">{{__('messages.email')}}</th>
                            <th class="border-bottom-0">{{__('messages.phone')}}</th>
                            <th class="border-bottom-0">{{__('messages.hour')}}</th>
                            <th class="border-bottom-0">{{__('messages.registered_hour')}}</th>
                            <th class="border-bottom-0">{{__('messages.status')}}</th>
                            <th class="border-bottom-0">{{__('messages.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // MONTH PICKER
        $('#datepicker-month').bootstrapdatepicker({
            format: "MM yyyy",
            viewMode: "months",
            minViewMode: "months",
            multidate: false,
            multidateSeparator: "-",
        })
        
        $(function() {
            var dataTable = $('#users_datatable').DataTable({
                ajax: {
                    url: '{{ route('users-datatable') }}',
                    type: 'GET',
                    data: function (d) {
                        d.date = $('.date').val();
                        d.status = $('.status').val();
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
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'hours',
                        name: 'hours'
                    },
                    {
                        data: 'register_hours',
                        name: 'register_hours'
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
                order: [[ 0, 'desc' ]]
            });
            // Create DataTable buttons
            new $.fn.dataTable.Buttons(dataTable, {
                buttons: ['excel', 'pdf', 'colvis']
            }).container().appendTo($('#buttons-container'));

            dataTable.buttons().container().appendTo('#users_datatable_wrapper .col-md-6:eq(0)');

            $(document).on('change', '.date, .status', function() {
                dataTable.draw();
            });
        });
    </script>
@endpush

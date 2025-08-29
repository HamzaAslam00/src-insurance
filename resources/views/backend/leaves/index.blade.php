@extends('backend.layouts.app')
@section('title', '| '. __('messages.leaves'))


@section('breadcrumb')
    <div class="page-header">
        <h1 class="page-title">{{__('messages.leave_list')}}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('messages.dashboard')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('messages.leaves')}}</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    @include('backend.leaves.view_modal')
    <div class="card">
       <div class="card-header justify-content-between">
            <h3 class="card-title font-weight-bold">{{__('messages.leaves')}}</h3>
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
        <div class="card-body">
            <div class="table-responsive">
                <table id="leaves_datatable" class="table table-bordered text-nowrap key-buttons border-bottom w-100">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">{{__('messages.id')}}</th>
                            <th class="border-bottom-0">{{__('messages.employee_name')}}</th>
                            <th class="border-bottom-0">{{__('messages.start_date')}}</th>
                            <th class="border-bottom-0">{{__('messages.end_date')}}</th>
                            <th class="border-bottom-0">{{__('messages.day_type')}}</th>
                            <th class="border-bottom-0">{{__('messages.reason')}}</th>
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
    </div>
@endsection

@push('scripts')
    <script>
       $('#datepicker-month1').bootstrapdatepicker({
        format: "MM yyyy",      // Format: Month Year
        viewMode: "months",     // Show months view
        minViewMode: "months",  // Only allow month selection
        multidate: false,
        multidateSeparator: "-",
    });

    $(function() {
        var status = '{{ $status }}';
        var leavesDataTable = $('#leaves_datatable').DataTable({
            ajax: {
                url: '{{ route('leaves-datatable', ':status') }}'.replace(':status', status),
                type: 'GET',
                data: function(d) {
                    d.date = $('.date1').val();  // Pass the selected date (Month/Year)
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
                    data: 'day_type',
                    name: 'day_type'
                },
                {
                    data: 'reason',
                    name: 'reason'
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
            order: [[0, 'desc']]  // Default sorting by the first column
        });
        $(document).on('change', '.date1', function() {
            leavesDataTable.draw();  // Redraw the DataTable with new date filter
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
                        toastMessage(response.message, 'success');
                        //alert('Leave status updated successfully');
                        $('#leaves_datatable').DataTable().ajax.reload(); // Reload the DataTable
                    } else {
                        toastMessage(response.message, 'error');
                        //alert('Failed to update leave status');
                    }
                },
                error: function(xhr) {
                    toastMessage(xhr.message, 'error');
                    //alert('Error updating leave status');
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
                            '<p><strong>Start Date:</strong> ' + response.data.start_date + '</p>' +
                            '<p><strong>End Date:</strong> ' + response.data.end_date + '</p>' +
                            '<p><strong>Day Type:</strong> ' + response.data.day_type + '</p>' +
                            '<p><strong>Reason:</strong> ' + response.data.reason + '</p>' +
                            '<p><strong>Detail:</strong> ' + (response.data.detail ? response.data.detail : '') + '</p>' +
                            '<p><strong>Status:</strong> ' + response.data.status + '</p>'
                        );
                        $('#viewDetails').modal('show');
                    } else {
                        alert('Failed to load');
                    }
                },
                error: function(xhr) {
                    alert('Loading error');
                }
            });
        }


    </script>
@endpush

@extends('backend.layouts.app')
@section('title', '| ' . __('messages.sick_leaves'))
@section('breadcrumb')
    <div class="page-header">
        <h1 class="page-title">{{__('messages.sick_leaves_list')}}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('messages.dashboard')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('messages.sick_leaves')}}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    @include('backend.sick_report.view_modal')
    <div class="card">
        <div class="card-header justify-content-between">
            <h3 class="card-title font-weight-bold">{{__('messages.sick_leaves')}}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="sick_datatable" class="table table-bordered text-nowrap key-buttons border-bottom w-100">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">{{__('messages.id')}}</th>
                            <th class="border-bottom-0">{{__('messages.employee_name')}}</th>
                            <th class="border-bottom-0">{{__('messages.date')}}</th>
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
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#sick_datatable').DataTable({
                ajax: '{{ route('sick-datatable') }}',
                processing: true,
                serverSide: true,
                scrollX: false,
                autoWidth: true,
                columnDefs: [{
                        width: 1,
                        targets: 4
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
                        data: 'date',
                        name: 'date'
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
            });
        });

        function updateStatus(sickId, status) {
            $.ajax({
                url: '{{ route("sick.updateStatus") }}', // Define this route
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    id: sickId,
                    status: status
                },
                success: function(response) {
                    if (response.success) {
                        alert('Sick Leave status updated successfully');
                        $('#sick_datatable').DataTable().ajax.reload(); // Reload the DataTable
                    } else {
                        alert('Failed to update leave status');
                    }
                },
                error: function(xhr) {
                    alert('Error updating sick status');
                }
            });
        }

        function showDetails(sickId) {
            $.ajax({
                url: '{{ url("sick-leave") }}/' + sickId,
                method: 'GET',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    id: sickId,
                },
                success: function(response) {
                    if (response.success) {
                        $('#viewSickDetailsContent').html(
                            // '<p><strong>Employee Name:</strong> ' + response.data.appliedByUser->first_name + '</p>' +
                            '<p><strong>Start Date:</strong> ' + response.data.sending_date + '</p>' +
                            '<p><strong>Reason:</strong> ' + (response.data.reason ? response.data.reason : '') + '</p>' +
                            '<p><strong>Status:</strong> ' + response.data.status + '</p>'
                        );
                        $('#viewSickDetails').modal('show');
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

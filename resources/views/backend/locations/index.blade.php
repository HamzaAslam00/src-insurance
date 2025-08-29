@extends('backend.layouts.app')

@section('title', '| Locations')

@section('breadcrumb')
    <div class="page-header">
        <h1 class="page-title">Locations List</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Locations</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header justify-content-between">
            <h3 class="card-title font-weight-bold">Locations</h3>
                <button type="button" class="btn dark-icon btn-primary btn-sm" data-act="ajax-modal" data-method="get"
                    data-action-url="{{ route('locations.create') }}" data-title="Add New Location">
                    <i class="ri-add-fill"></i> Add Location
                </button>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="locations_datatable" class="table table-bordered text-nowrap key-buttons border-bottom w-100">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">#</th>
                            <th class="border-bottom-0">Name</th>
                            <th class="border-bottom-0">Status</th>
                            <th class="border-bottom-0">Actions</th>
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
         $('#locations_datatable').DataTable({
            ajax: '{{ route('locations-datatable') }}',
            processing: true,
            serverSide: true,
            scrollX: false,
            autoWidth: true,
            columnDefs: [
                { width: 1, targets: 3 },
                { width: '5%', targets: 0 }
            ],
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' },
            ]
        });
    });
    </script>
@endpush

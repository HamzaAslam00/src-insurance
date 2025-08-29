@extends('backend.layouts.app')

@section('title', '| '. __('messages.clients'))
@section('breadcrumb')
<div class="page-header">
    <h1 class="page-title">{{__('messages.clients_list')}}</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('messages.dashboard')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('messages.clients')}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header justify-content-between">
        <h3 class="card-title font-weight-bold">{{__('messages.clients')}}</h3>
        @can('add_client')
        <a href="{{ route('clients.create') }}">
            <button type="button" class="btn dark-icon btn-primary btn-sm" data-title="Add New Clint">
                <i class="ri-add-fill"></i> {{__('messages.add_client')}}
            </button>
        </a>
        @endcan
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="clients_datatable" class="table table-bordered text-nowrap key-buttons border-bottom w-100">
                <thead>
                    <tr>
                        {{-- <th class="border-bottom-0">#</th> --}}
                        <th class="border-bottom-0">{{__('messages.name')}} </th>
                        <th class="border-bottom-0"> {{__('messages.email')}}</th>
                        <th class="border-bottom-0">{{__('messages.phone')}} </th>
                        <th class="border-bottom-0">{{__('messages.actions')}}</th>
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
            $('#clients_datatable').DataTable({
                ajax: '{{ route('clients-datatable') }}',
                processing: true,
                serverSide: true,
                scrollX: false,
                autoWidth: true,
                order: [[0, 'asc']],
                serverSide: false,
                columnDefs: [{
                        width: 1,
                        targets: 3
                    },
                    {
                        width: '5%',
                        targets: 0
                    }
                ],
                columns: [{
                        data: 'client_name',
                        name: 'client_name'
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
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endpush

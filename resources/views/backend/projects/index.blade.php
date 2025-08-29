@extends('backend.layouts.app')

@section('title', '| '. __('messages.projects'))


@section('breadcrumb')
    <div class="page-header">
        <h1 class="page-title">{{__('messages.project_list')}}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('messages.dashboard')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('messages.projects')}}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header justify-content-between">
            <h3 class="card-title font-weight-bold">{{__('messages.projects')}}</h3>
            {{-- @can('add_working_hours') --}}
                <button type="button" class="btn dark-icon btn-primary btn-sm" data-act="ajax-modal" data-method="get"
                    data-action-url="{{ route('projects.create') }}" data-title="{{__('messages.add_new_project')}}">
                    <i class="ri-add-fill"></i> {{__('messages.add_project')}}
                </button>
            {{-- @endcan --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="project_datatable" class="table table-bordered text-nowrap key-buttons border-bottom w-100">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">{{__('messages.id')}}</th>
                            <th class="border-bottom-0">{{__('messages.name')}}</th>
                            <th class="border-bottom-0">{{__('messages.client')}}</th>
                            <th class="border-bottom-0">{{__('messages.fee')}}</th>
                            <th class="border-bottom-0">{{__('messages.users')}}</th>
                            <th class="border-bottom-0">{{__('messages.start_date')}}</th>
                            <th class="border-bottom-0">{{__('messages.end_date')}}</th>
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
            $('#project_datatable').DataTable({
                ajax: '{{ route('project-datatable') }}',
                processing: true,
                serverSide: true,
                scrollX: false,
                autoWidth: true,
                columnDefs: [{
                        width: 1,
                        targets: 6
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
                        data: 'client_name',
                        name: 'client_name'
                    },
                    {
                        data: 'cost',
                        name: 'cost'
                    },
                    {
                        data: 'users',
                        name: 'users'
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
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ],
            });
        });
    </script>
@endpush

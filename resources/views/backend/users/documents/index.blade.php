@extends('backend.layouts.app')
@section('title', '| ' . __('messages.user_document'))


@section('breadcrumb')
    <div class="page-header">
        <h1 class="page-title">{{__('messages.projects')}}User Document List</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('messages.dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{__('messages.users')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('messages.document')}}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header justify-content-between">
            <h3 class="card-title font-weight-bold">{{__('messages.document')}}</h3>
            @can('add_user')
                <button type="button" class="btn dark-icon btn-primary btn-sm" data-act="ajax-modal" data-method="get"
                    data-action-url="{{ route('user.documents.create', $user->id) }}" data-title="{{__('messages.upload_new_document')}}">
                    <i class="ri-add-fill"></i> {{__('messages.add_document')}}
                </button>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="user_documents_datatable" class="table table-bordered text-nowrap key-buttons border-bottom w-100">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">{{__('messages.#')}}</th>
                            <th class="border-bottom-0">{{__('messages.name')}}</th>
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
            $('#user_documents_datatable').DataTable({
                ajax: '{{ route('user-documents-datatable', $user->id) }}',
                processing: true,
                serverSide: true,
                scrollX: false,
                autoWidth: true,
                columnDefs: [
                    { width: '5%', targets: 0 },
                    { width: '50%', targets: 1 },
                    { width: '45%', targets: 2, orderable: false, searchable: false }
                ],
                columns: [
                    { data: 'DT_RowIndex', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush

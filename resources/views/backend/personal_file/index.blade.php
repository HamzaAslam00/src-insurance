@extends('backend.layouts.app')

@section('title', '| ' . __('messages.personal_files'))


@section('breadcrumb')
    <div class="page-header">
        <h1 class="page-title">{{ __('messages.personal_files_list') }}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('messages.dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.personal_files') }}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header justify-content-between">
            <h3 class="card-title font-weight-bold">{{ __('messages.personal_files') }}</h3>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="personal_file_datatable" class="table table-bordered text-nowrap key-buttons border-bottom w-100">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">{{ __('messages.#') }}</th>
                            <th class="border-bottom-0">{{ __('messages.name') }}</th>
                            <th class="border-bottom-0">{{ __('messages.action') }}</th>

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
            $('#personal_file_datatable').DataTable({
                ajax: '{{ route('personal-file-datatable') }}',
                processing: true,
                serverSide: true,
                scrollX: false,
                autoWidth: true,
                columnDefs: [{
                        width: 1,
                        targets: 2
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
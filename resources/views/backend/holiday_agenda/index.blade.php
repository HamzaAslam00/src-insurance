@extends('backend.layouts.app')
@section('title', '| '. __('messages.holiday_agenda'))


@section('breadcrumb')
    <div class="page-header">
        <h1 class="page-title">{{__('messages.holidays_list')}}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('messages.dashboard')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('messages.holidays')}}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header justify-content-between">
            <h3 class="card-title font-weight-bold">{{__('messages.holidays')}}</h3>
            @can('add_user')
                <button type="button" class="btn dark-icon btn-primary btn-sm" data-act="ajax-modal" data-method="get"
                    data-action-url="{{ route('holiday-agenda.create') }}" data-title="{{__('messages.add_new_holiday')}}">
                    <i class="ri-add-fill"></i>{{__('messages.add_holiday')}}
                </button>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="holidays_datatable" class="table table-bordered text-nowrap key-buttons border-bottom w-100">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">{{__('messages.#')}}</th>
                            <th class="border-bottom-0">{{__('messages.start_date')}}</th>
                            <th class="border-bottom-0">{{__('messages.end_date')}}</th>
                            <th class="border-bottom-0">{{__('messages.details')}} </th>
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
            $('#holidays_datatable').DataTable({
                ajax: '{{ route('holiday-datatable') }}',
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
                        data: 'start_date',
                        name: 'start_date'
                    },
                    {
                        data: 'end_date',
                        name: 'end_date'
                    },
                    {
                        data: 'detail',
                        name: 'detail'
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

@extends('backend.layouts.app')

@section('title')
    | Pending Proposals
@endsection

@section('breadcrumb')
    <div class="page-header">
        <h1 class="page-title">{{__('messages.pending_proposals_list')}}</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('messages.dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.pending_proposals') }}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header justify-content-between">
            <h3 class="card-title font-weight-bold">{{ __('messages.pending_proposals') }}</h3>
            @role('partner')
                <a type="button" class="btn dark-icon btn-primary btn-sm" href="{{ route('request-quote-by-partner') }}">
                    <i class="ri-add-fill"></i> {{ __('messages.request_a_quote') }}
                </a>
            @endrole
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="quote_datatable" class="table table-bordered text-nowrap key-buttons border-bottom w-100">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">#</th>
                            @if($type == 'partner')
                                <th class="border-bottom-0">{{ __('messages.src_partner_name') }}</th>
                            @endif
                            <th class="border-bottom-0">{{ __('messages.business_owner') }}</th>
                            <th class="border-bottom-0">{{ __('messages.city') }}</th>
                            <th class="border-bottom-0">{{ __('messages.requested_service') }}</th>
                            <th class="border-bottom-0">{{ __('messages.business_name') }}</th>
                            <th class="border-bottom-0">{{ __('messages.status') }}</th>
                            <th class="border-bottom-0">{{ __('messages.actions') }}</th>
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
            var dataTable = $('#quote_datatable').DataTable({
                processing: true,
                serverSide: true,
                scrollX: false,
                autoWidth: true,
                ajax: {
                    url: '{{ route('quotes-dt', $type) }}',
                    type: 'GET',

                },
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
                    @if($type == 'partner')
                        { data: 'partner_name', name: 'partner_name' },
                    @endif
                    {
                        data: 'business_owner',
                        name: 'business_owner'
                    },
                    {
                        data: 'city',
                        name: 'city'
                    },
                    {
                        data: 'service',
                        name: 'service'
                    },
                    {
                        data: 'business_name',
                        name: 'business_name'
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
                ]
            });
        });
    </script>
@endpush

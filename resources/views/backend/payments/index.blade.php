
        <div class="d-flex justify-content-between p-0 m-0 mb-2">
            <h3 class="card-title font-weight-bold mb-0">{{ __('messages.payments') }}</h3>
            @can('add_payment')
                <button type="button" class="btn dark-icon btn-primary btn-sm" data-act="ajax-modal" data-method="get"
                    data-action-url="{{ route('payments.create', $policy) }}" data-title="{{ __('messages.add_new_payments') }}">
                    <i class="ri-add-fill"></i> {{ __('messages.add_new_payments') }}
                </button>
            @endcan
        </div>

            <div class="table-responsive">
                <table id="payments_datatable" class="table table-bordered text-nowrap key-buttons border-bottom w-100">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">#</th>
                            <th class="border-bottom-0">{{ __('messages.payment_type') }}</th>
                            <th class="border-bottom-0">{{ __('messages.amount') }}</th>
                            <th class="border-bottom-0">{{ __('messages.transaction_date') }}</th>
                            <th class="border-bottom-0">{{ __('messages.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>


@push('scripts')
    <script>
        $(function() {
            $('#payments_datatable').DataTable({
                ajax: '{{ route('payments-datatable', $policy) }}',
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
                        data: 'payment_method',
                        name: 'payment_method'
                    },
                    {
                        data: 'paid_amount',
                        name: 'paid_amount'
                    },
                    {
                        data: 'transaction_date',
                        name: 'transaction_date'
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

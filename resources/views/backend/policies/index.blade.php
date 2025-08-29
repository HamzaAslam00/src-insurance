
    <div class="card">
        <div class="card-header justify-content-between">
            <h3 class="card-title font-weight-bold">{{__('messages.policies')}}</h3>
            @can('add_policy')
                <button type="button" class="btn dark-icon btn-primary btn-sm" data-act="ajax-modal" data-method="get"
                    data-action-url="{{ route('policies.create',['clientId'=>$client->id]) }}" data-title="{{ __('messages.add_new_policy') }}">
                    <i class="ri-add-fill"></i> {{ __('messages.add_policy') }}
                </button>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="policies_datatable" class="table table-bordered text-nowrap key-buttons border-bottom w-100">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">#</th>
                            <th class="border-bottom-0">{{ __('messages.name') }}</th>
                            <th class="border-bottom-0">{{ __('messages.effective_date') }}</th>
                            <th class="border-bottom-0">{{ __('messages.expiration_date') }}</th>
                            <th class="border-bottom-0">{{ __('messages.file') }}</th>
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
    {{-- {{ dd($client->id) }} --}}
@push('scripts')
    <script>
        $(function() {
            $('#policies_datatable').DataTable({
                ajax: '{{ route('policies-datatable', $client->id)}}',
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
                        data: 'effective_date',
                        name: 'effective_date'
                    },
                    {
                        data: 'expiration_date',
                        name: 'expiration_date'
                    },
                    {
                        data: 'file',
                        name: 'file'
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

        $(document).on('change', '[name="policy_type"]', function (e) {
            if ($(this).val() == 'other') {
                $(this).siblings('.other').removeClass('d-none');
                $(this).addClass('col-md-4');
                $(this).removeClass('col-md-12');
                $(this).parent().addClass('row');
            } else {
                $(this).siblings('.other').addClass('d-none');
                $(this).addClass('col-md-12');
                $(this).removeClass('col ms-3');
                $(this).parent().removeClass('row');
            }
        });

        $(document).on('change', '#effective_date', function() {
            var effectiveDate = $(this).val();
            if (effectiveDate) {
                var date = new Date(effectiveDate);
                date.setFullYear(date.getFullYear() + 1);
                var expirationDate = date.toISOString().split('T')[0];
                $('#expiration_date').val(expirationDate);
            }
        });
    </script>
@endpush

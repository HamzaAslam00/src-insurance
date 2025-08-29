
        <div class="d-flex justify-content-between p-0 m-0 mb-2">
            <h3 class="card-title font-weight-bold mb-0">{{ __('messages.notices_files') }}</h3>
            @can('add_notice')
                <button type="button" class="btn dark-icon btn-primary btn-sm" data-act="ajax-modal" data-method="get"
                    data-action-url="{{ route('notices-and-files.create', $policy) }}" data-title="{{ __('messages.add_new_notice') }}">
                    <i class="ri-add-fill"></i>{{ __('messages.add_new') }}
                </button>
            @endcan
        </div>

            <div class="table-responsive">
                <table id="notices_datatable" class="table table-bordered text-nowrap key-buttons border-bottom w-100">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">#</th>
                            <th class="border-bottom-0">{{ __('messages.title') }}</th>
                            <th class="border-bottom-0">{{ __('messages.description') }}</th>
                            <th class="border-bottom-0">{{ __('messages.file') }}</th>
                            <th class="border-bottom-0">{{ __('messages.created_date') }}</th>
                            <th class="border-bottom-0">{{ __('messages.required_followup') }}</th>
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
            $('#notices_datatable').DataTable({
                ajax: '{{ route('notices-and-files-datatable', $policy) }}',
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
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'file',
                        name: 'file'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },

                    {
                        data: 'required_followup',
                        name: 'required_followup'
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

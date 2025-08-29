<!doctype html>
<html lang="en" dir="ltr">

<head>
    @include('backend.layouts.partials.head')
    <style>
        .swal2-confirm:focus {
            box-shadow: 0 0 0 0.2rem rgba(65, 162, 51, 0.25) !important;
        }
    </style>
</head>

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('backend/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            @include('backend.layouts.partials.header')
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            @include('backend.layouts.partials.sidebar')
            <!--/APP-SIDEBAR-->

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        @yield('breadcrumb')
                        <!-- PAGE-HEADER END -->

                        @yield('content')

                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->

        </div>

        <!-- FOOTER -->
        @include('backend.layouts.partials.footer')
        <!-- FOOTER END -->

    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <div class="modal fade" id="ajax_model" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize" id="ajax_model_title">Modal title</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab-content" id="ajax_model_content">

                    </div>
                    <div id="ajax_model_spinner">
                        <div class="modal-body">
                            <div id="loader" class="background">
                                <div class="dots container">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.AppLocale = '{{ app()->getLocale() }}';
        window.translations = {
        @foreach (__('messages') as $key => $value)
            "{{ $key }}": "{{ addslashes($value) }}",
        @endforeach
    };
    </script>
    @include('backend.layouts.partials.scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

    {{-- Common Js --}}
    <script src="{{ asset('backend/js/common.js') }}"></script>

    @stack('scripts')

    <script>
        $(document).on('click', '.callInBetterTimeDisabled', function(e) {
            e.preventDefault();
            Swal.fire({
            title: 'Sorry',
            text: "{{ __('messages.you_cant_call_in_better_before_12_hours_of_request_submission') }}",
            icon: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#41a233',
            didRender: () => {
                const confirmButton = Swal.getConfirmButton();
                confirmButton.style.borderColor = '#41a233';
            },
            confirmButtonText: 'Ok'
            }).then((result) => {
                //
            });
        })

        $(document).on('click', '.hours-submitted', function(e) {
            e.preventDefault();
            Swal.fire({
            title: "{{ __('messages.already_submitted') }}",
            text: "{{ __('messages.you_already_submitted_the_hours_for_this_month') }}",
            icon: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#41a233',
            didRender: () => {
                const confirmButton = Swal.getConfirmButton();
                confirmButton.style.borderColor = '#41a233';
            },
            confirmButtonText: 'Ok'
            }).then((result) => {
                //
            });
        })

        $(document).on('click', '.hours-not-submitted', function(e) {
            Swal.fire({
                title: "{{ __('messages.are_you_sure') }}",
                text: "{{ __('messages.modify_hours_warning') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#41a233',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('messages.yes_submit_it') }}",
                cancelButtonText: "{{ __('messages.cancel') }}",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.swal.fire({
                        title: "",
                        text: "{{ __('messages.please_wait') }}",
                        showConfirmButton: false,
                        backdrop: true
                    });
                    $.ajax({
                        url: '{{ route("request-submit-hour") }}', // Define this route
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}', // CSRF token for security
                        },
                        success: function(response) {
                            if (response.success) {
                                toastMessage(response.message, 'success');
                                window.location.href = response.redirect_url;
                            } else {
                                Swal.fire(
                            "{{ __('messages.failed') }}",
                            "{{ __('messages.failed_to_send_submit_hours_request') }}",
                            'error'
                        );
                            }
                        },
                        error: function(xhr) {
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                Swal.fire('Error', xhr.responseJSON.message, 'error');
                            } else {
                                Swal.fire(
                            "{{ __('messages.error') }}",
                            "{{ __('messages.error_in_sending_submit_hours_request') }}",
                            'error'
                        );
                            }
                        }
                    });
                }
            });
        });

        $(document).on('click', '.can-apply-sick-leave', function(e) {
            Swal.fire({
                title: "{{ __('messages.enter_sick_details') }}" ,
                input: 'text',
                inputPlaceholder: "{{ __('messages.write_message_for_admin') }}" ,
                showCancelButton: true,
                confirmButtonColor: '#41a233',
                confirmButtonText: "{{ __('messages.submit') }}",
                cancelButtonText: "{{ __('messages.cancel') }}",
                inputValidator: (value) => {
                    if (!value) {
                        return "{{ __('messages.you_need_to_enter_something') }}";
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const enteredValue = result.value;
                    window.swal.fire({
                        title: "",
                        text: "{{ __('messages.please_wait') }}",
                        showConfirmButton: false,
                        backdrop: true
                    });
                    $.ajax({
                        url: '{{ route("request-sick-leave") }}', // Define this route
                        method: 'POST',
                        data: {
                            reason: enteredValue,
                            _token: '{{ csrf_token() }}', // CSRF token for security
                        },
                        success: function(response) {
                            if (response.success) {
                                toastMessage(response.message, 'success');
                                window.location.href = response.redirect_url;
                            } else {
                        Swal.fire(
                            "{{ __('messages.error') }}",
                            "{{ __('messages.failed_to_send_sick_leave_request') }}",
                            'error'
                        );
                    }
                            swal.close();
                        },
                        error: function(xhr) {
                            console.log(xhr.responseJSON);
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                Swal.fire('Error', xhr.responseJSON.message, 'error');
                            } else {
                                Swal.fire(
                            "{{ __('messages.error') }}",
                            "{{ __('messages.error_in_sending_sick_leave_request') }}",
                            'error'
                        );
                            }
                            // swal.close();
                        },
                        complete: function() {
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>

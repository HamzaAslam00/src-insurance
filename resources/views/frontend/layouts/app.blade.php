<!doctype html>
<html lang="en" dir="ltr">

<head>
    @include('frontend.layouts.partials.head')
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->
    
    <!-- app-Header -->
    @include('frontend.layouts.partials.header')
    <!-- /app-Header -->
    
    @yield('content')
    
    <!-- CONTACT FORM -->
    @include('frontend.layouts.partials.contact_form')
    <!-- CONTACT FORM END -->

    <!-- Footer -->
    @include('frontend.layouts.partials.footer')
    <!-- FOOTER END -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <!-- BACK-TO-TOP -->
    
    @vite(['resources/js/app.js'])
    @include('frontend.layouts.partials.scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
</body>

</html>

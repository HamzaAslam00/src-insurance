<!-- META DATA -->
<meta charset="UTF-8">
<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- FAVICON -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/images/brand/favicon.ico') }}" />

<!-- TITLE -->
<title>{{ env('APP_NAME') }} @yield('title') </title>

<!-- BOOTSTRAP CSS -->
<link id="style" href="{{ asset('backend/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap"
    rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
<link href="{{ asset('frontend/lib/animate/animate.min.css') }}" rel="stylesheet" />
<link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
<link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" />

<!-- Stylesheet -->
<link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
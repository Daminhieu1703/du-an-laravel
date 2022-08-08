<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('assets/filter/css/reset.css') }}"> <!-- CSS reset -->
	<link rel="stylesheet" href="{{ asset('assets/filter/css/style.css') }}"> <!-- Resource style -->
	<script src="{{ asset('assets/filter/js/modernizr.js') }}"></script> <!-- Modernizr -->
    <link rel="stylesheet" href="{{ asset('assets/client/order/style.css') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/client/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/client/css/style.css') }}" rel="stylesheet">
    <title>@yield('content-title')</title>
</head>
<body>
    @include('client.layout.header')
    @yield('content')
    @include('client.layout.footer')
     <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('assets/client/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/client/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/client/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/client/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/filter/js/main.js') }}"></script>
     <!-- Template Javascript -->
    <script src="{{ asset('assets/client/js/main.js') }}"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
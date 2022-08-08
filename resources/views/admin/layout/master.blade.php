<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="{{ asset('assets/admin/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/dist/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>@yield('content-title')</title>
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('admin.layout.header')
        @include('admin.layout.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                              <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">@yield('page-name')</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">@yield('page-name')</h1> 
                    </div>
                    <div class="col-6">
                        <div class="text-end upgrade-btn">
                            <a href="https://www.wrappixel.com/templates/flexy-bootstrap-admin-template/" class="btn btn-primary text-white"
                                target="_blank">Upgrade to Pro</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                @yield('content')
            </div>
            @include('admin.layout.footer')
        </div>
    </div>
    <script src="{{ asset('assets/admin/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/admin/dist/js/app-style-switcher.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('assets/admin/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('assets/admin/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('assets/admin/dist/js/custom.js')}}"></script>
    <script src="{{ asset('assets/admin/libs/filter/dist/filter.js')}}"></script>
</body>
</html>
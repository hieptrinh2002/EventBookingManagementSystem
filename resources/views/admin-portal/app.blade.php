<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('merchant/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('merchant/assets/img/favicon.png') }}">
    <title>
        Admin portal
    </title>
    <script src="{{ asset('app/js/jquery.min.js') }}"></script>

    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('merchant/assets/css//nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('merchant/assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('merchant/assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('admin-portal.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('merchant.layouts.navbar')
        <!-- End Navbar -->
        <div class="container-fluid pb-4 py-1">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </main>

    <!--   Core JS Files   -->
    @include('merchant.layouts.javascript')
</body>

</html>
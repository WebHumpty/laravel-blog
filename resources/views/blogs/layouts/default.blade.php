<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="author" content="WebHumpty">
    <meta name="keywords" content="laravel">
    <meta name="description" content="Демонстрационный проект блога на Laravel">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/js/html5shiv.js') }}"></script>
    <script src="{{ 'assets/js/respond.js' }}"></script>
    <![endif]-->
    <link rel="icon" type="image/png" href="{{ '/favicon.png' }}">
</head>
<body>
@include('blogs.blocks._navbar')
<div class="container">
    @include('blogs.blocks._form-search')
</div>
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @yield('content')
            </div>
            <div class="col-md-4" data-sticky_column>
                @include('blogs.blocks._sidebar')
            </div>
        </div>
    </div>
</div>
@include('blogs.blocks._footer')

<script type="text/javascript" src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.stickit.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>
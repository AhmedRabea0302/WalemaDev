<!DOCTYPE html>
<html>
<head>
    <!-- Meta Tags
    ========================== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Site Title
    ========================== -->
    <title>ًوليمة</title>

    <!-- Favicon
    ===========================-->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/site/images/fav.png')}}">


    <!-- Web Fonts
    ========================== -->

    <!-- Base & Vendors
    ========================== -->
    <link href="{{asset('assets/site/vendor/bootstrap/css/bootstrap-ar.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Site Style
    ========================== -->
    <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    @include('site.layouts.header')

        @yield('content')

    @include('site.layouts.footer')


<script src="{{asset('assets/site/vendor/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/site/vendor/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/site/js/main.js')}}"></script>
<script src="{{asset('assets/site/js/ajax-validation.js')}}"></script>

    @yield('scripts')
</body>
</html>
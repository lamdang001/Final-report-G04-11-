<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/web/images/favicon.png') }}" type="image/x-icon">
    <title>@yield('title')</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/admin/bower_components/bootstrap/dist/css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/web/css/style.css') }}"/>
    <link rel="stylesheet" id="cpswitch" href="{{ asset('assets/web/css/orange.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/flexslider.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/web/css/datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/style_tour.css') }}">
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</head>
<body>
@include('sweetalert::alert')
@include('web.includes.header')
@yield('content')
@include('web.includes.footer')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/admin/bower_components/bootstrap/dist/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/web/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/web/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('assets/web/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/web/js/custom-navigation.js') }}"></script>
<script src="{{ asset('assets/web/js/custom-flex.js') }}"></script>
<script src="{{ asset('assets/web/js/custom-owl.js') }}"></script>
<script src="{{ asset('assets/web/js/custom-date-picker.js') }}"></script>
<script src="{{ asset('assets/web/js/step.js') }}"></script>
</body>
</html>
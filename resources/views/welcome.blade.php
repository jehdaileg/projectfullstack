<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Full Stack Project</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <link rel="stylesheet" href="{{ asset('css/all.css') }}">

        <link rel="stylesheet" href="{{ asset('css/grid.min.css') }}">

        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    </head>
    <body>


        <div id="app">

            <main-app></main-app>

        </div>



        <script src="{{ asset('/js/app.js') }}"></script>

        <script src="{{ asset('js/jquery.js') }}"></script>

       <!-- <script src="{{ asset('js/ambassador.js') }}"></script> -->

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

       <!-- <script src="{{ asset('js/custom.js') }}"></script>  -->

        <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>

        <script src="{{ asset('js/jquery.min.css') }}"></script>

        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

        <script src="{{ asset('js/sweetalert.js') }}"></script>

        <script src="{{ asset('js/swiper.min.js') }}"></script>
    </body>
</html>

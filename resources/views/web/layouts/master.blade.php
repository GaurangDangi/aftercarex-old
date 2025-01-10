<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Xaftercare</title>
        <!-- CSS FILES -->
        <link href="{{asset('web/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('web/css/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('web/css/templatemo-kind-heart-charity.css')}}" rel="stylesheet">
        <!--
        TemplateMo 581 Kind Heart Charity
        https://templatemo.com/tm-581-kind-heart-charity
        -->
    </head>
    <body id="section_1">
        @include('web.partials.header')
        <main>
            @yield('content')

            @include('web.partials.footer')
        </main>
    <!-- JAVASCRIPT FILES -->
    <script src="{{asset('web/js/jquery.min.js')}}"></script>
    <script src="{{asset('web/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('web/js/jquery.sticky.js')}}"></script>
    {{-- <script src="{{asset('web/js/click-scroll.js')}}"></script> --}}
    <script src="{{asset('web/js/counter.js')}}"></script>
    <script src="{{asset('web/js/custom.js')}}"></script>
</body>
</html>
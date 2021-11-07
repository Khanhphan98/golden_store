<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="ngApp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{url('/')}}/images/gold.ico" sizes="16x16">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TK Golden Store | Trang sức, vàng bạc, thời trang, đá quý</title>

    @includeIf('layouts.partial._angular')
    @includeIf('welcomes.partial._welcomeCSS')
    @yield('myCss')
    <script>
        var SiteUrl = '{{url("/")}}';
    </script>

</head>
<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        @includeIf('welcomes.partial._headerWelcome')

        @yield('welcomes')

        @includeIf('welcomes.partial._footerWelcome')

    </main>

    @includeIf('layouts.partial._default_js')
    @includeIf('layouts.partial._js')
    @includeIf('welcomes.partial._welcomeJS')
    @yield('myJs')

</body>
</html>

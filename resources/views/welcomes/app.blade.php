<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="ngApp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{url('/')}}/images/gold.ico" sizes="16x16">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Trang chủ - Welcome to TK Golden Store</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    @includeIf('layouts.partial._angular')
    <!-- Styles -->
    @includeIf('layouts.partial._default_css')
    @includeIf('layouts.partial._css')
    @includeIf('welcomes.partial._welcomeCSS')
    @yield('myCss')
    <script>
        var SiteUrl = '{{ url("/") }}';
    </script>

</head>
<body>
    <div id="page-top">
        <div id="wrapper">
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                <!-- Header -->
                @includeIf('welcomes.partial._headerWelcome')
                <!-- End of Header -->
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <main>
                            @yield('welcomes')
                        </main>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
                <!-- Footer -->
                @includeIf('welcomes.partial._footerWelcome')
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
    </div>
    @includeIf('layouts.partial._default_js')
    @includeIf('layouts.partial._js')
    @includeIf('welcomes.partial._welcomeJS')
    @yield('myJs')
    <script>
        feather.replace();
    </script>
</body>
</html>

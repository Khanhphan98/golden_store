<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="ngApp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{url('/')}}/images/gold.ico" sizes="16x16">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tiệm Vàng') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @includeIf('layouts.partial._angular')
    <!-- Styles -->
    @includeIf('layouts.partial._default_css')
    @includeIf('layouts.partial._css')
    @yield('myCss')
    <script>
        var SiteUrl = '{{url("/")}}';
    </script>

</head>
<body>
    <div id="page-top">
        <div id="wrapper">

            <!-- Menu -->
            @includeIf('layouts.partial._menu')
            <!-- End of Menu -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Header -->
                    @includeIf('layouts.partial._header')
                    <!-- End of Header -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <main>
                            @yield('content')
                        </main>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
                <!-- Footer -->
                @includeIf('layouts.partial._footer')
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
    </div>
    @includeIf('layouts.partial._default_js')
    @includeIf('layouts.partial._js')
    @yield('myJs')
</body>
</html>

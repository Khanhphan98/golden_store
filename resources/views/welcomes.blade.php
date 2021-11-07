<!DOCTYPE html>
<html lang="en" ng-app="ngApp" ng-cloak>

<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{url('/')}}/images/gold.ico" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - Welcome to TK Golden Store </title>
    @includeIf('layouts.partial._angular')

    <!-- Styles -->
    @includeIf('layouts.partial._default_css')
    @includeIf('layouts.partial._css')

    @yield('myCss')
    <script>
        let SiteUrl = '{{ url("/") }}';
    </script>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-center">
                    @yield('welcome')
                </div>
                <div class="design">© 2016 Classy Login Form. All rights reserved | Design by K.P</div>
            </div>
        </div>
    </div>
    @includeIf('layouts.partial._default_js')
    @includeIf('layouts.partial._js')
    @yield('myJs')
</body>
</html>

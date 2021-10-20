<!DOCTYPE html>
<html lang="en" ng-app="ngApp" ng-cloak>

<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{url('/')}}/images/gold.ico" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @includeIf('layouts.partial._angular')

    <!-- Styles -->
    @includeIf('layouts.partial._default_css')
    @includeIf('layouts.partial._css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @yield('myCss')
    <script>
        var SiteUrl = '{{url("/")}}';
    </script>

</head>
<body ng-controller="loginCtrl">
    <div class="container-fluid login">
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <section class="showcase">
                            <header>
                                <h2 class="logo">
                                    <img src="{{ url('') }}/images/gold-ingot.png" class="image">
                                    Golden TK Store
                                </h2>
                                <div class="col-md-12 toggle">
                                    <form ng-dom="formLogin" data-parsley-validate>
                                        @csrf
                                        <div class="form-group">
                                            <label class="text-label" for="email">Email address</label>
                                            <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" required autocomplete="email"
                                                   ng-model="data.email" aria-describedby="emailHelp" placeholder="Enter email" required>

                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        </div>
                                        <div class="form-group password">
                                            <label class="text-label" for="password">Password</label>
                                            <input name="password" type="@{{ data.typePassword }}" class="form-control" id="password" ng-model="data.password" placeholder="Password" required>
                                            <i ng-show="data.checkPass" ng-click="action.showPassword(false)" class="far fa-eye"></i>
                                            <i ng-show="!data.checkPass" ng-click="action.showPassword(true)" class="fas fa-eye-slash"></i>
                                        </div>
                                        <div class="form-group form-check">
                                            <input ng-model="data.rememberToken" type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Remember</label>
                                            <a class="forgot">Forgot password?</a>
                                        </div>
                                        <button ng-click="action.login()" type="submit" class="col-md-12 btn btn-primary">Login</button>
                                    </form>
                                </div>
                                <div class="or text-center">
                                    <span>or</span>
                                </div>
                                <div class="social">
                                    <a href="{{ url('') }}/register">
                                        <i class="fa fa-user-plus"></i>
                                        <span>Sign up</span>
                                    </a>
                                    <a href="{{ url('') }}/auth/redirect/facebook">
                                        <i class="fab fa-facebook-f"></i>
                                        <span>Facebook</span>
                                    </a>
                                    <a href="{{ url('') }}/auth/redirect/google">
                                        <i class="fab fa-google-plus-g"></i>
                                        <span>Google</span>
                                    </a>
                                </div>
                            </header>
                        </section>
                    </div>
                </div>
                <div class="overlay"></div>
                <video src="{{ url('') }}/video/movie.mp4" muted loop autoplay></video>
                <div class="design">© 2016 Classy Login Form. All rights reserved | Design by K.P</div>
            </div>
        </div>
    </div>
    @includeIf('layouts.partial._default_js')
    @includeIf('layouts.partial._js')
    @yield('myJs')
</body>
</html>

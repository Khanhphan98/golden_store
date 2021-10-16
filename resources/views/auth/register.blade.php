<!DOCTYPE html>
<html lang="en" ng-app="ngApp" ng-cloak>

<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{url('/')}}/images/gold.ico" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    @includeIf('layouts.partial._angular')

    <!-- Styles -->
    @includeIf('layouts.partial._default_css')
    @includeIf('layouts.partial._css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    @yield('myCss')
    <script>
        var SiteUrl = '{{url("/")}}';
    </script>

</head>
<body ng-controller="registerCtrl">
<div class="container-fluid login">
    <div class="row">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <section class="showcase">
                        <header>
                            <h2 class="logo">
                                <img src="{{ url('') }}/images/gold-ingot.png" class="image">
                                Golden TK Store</h2>
                            <div class="col-md-12 toggle">
                                <form ng-dom="formRegister">
                                    <div class="form-group" style="display: flex">
                                        <div class="col-md-6">
                                            <label class="text-label" for="name">Full Name</label>
                                            <input ng-model="data.name" type="text" class="form-control" id="name" placeholder="Enter name" required>
                                            <small class="form-text text-muted"></small>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="text-label" for="phone">Phone</label>
                                            <input ng-model="data.phone" type="text" class="form-control" id="phone" placeholder="Enter phone" required>
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="form-group" style="display: flex">
                                        <div class="col-md-6">
                                            <label class="text-label" for="email">Email address</label>
                                            <input ng-model="data.email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="text-label" for="address">Address</label>
                                            <input ng-model="data.address" type="text" class="form-control" id="address" placeholder="Enter address" required>
                                            <small id="emailHelp" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="form-group" style="display: flex">
                                        <div class="col-md-4">
                                            <label class="text-label" for="day">Day</label>
                                            <select class="form-control" id="day" ng-model="data.day" required>
                                                <option value="">-- Select Day --</option>
                                                <option value="@{{ day }}" ng-repeat="(key, day) in data.days">@{{ day }}</option>
                                            </select>
                                            <small class="form-text text-muted"></small>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="text-label" for="month">Month</label>
                                            <select class="form-control" id="month" ng-model="data.month" required>
                                                <option value="">-- Select Month --</option>
                                                <option value="@{{ month.displayView }}" ng-repeat="(key, month) in data.months">@{{ month.displayView }}</option>
                                            </select>
                                            <small class="form-text text-muted"></small>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="text-label" for="year">Year</label>
                                            <select class="form-control" id="year" ng-model="data.year" required>
                                                <option value="">-- Select Year --</option>
                                                <option value="@{{ year }}" ng-repeat="(key, year) in data.years">@{{ year }}</option>
                                            </select>
                                            <small class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="form-group" style="display: flex">
                                        <div class="col-md-6">
                                            <label for="password" class="text-label">Password</label>
                                            <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" ng-model="data.password" type="@{{ data.typePassword }}" id="password" class="form-control" placeholder="Password" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="confirm" class="text-label">Confirm Password</label>
                                            <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" ng-model="data.confirmPassword" type="@{{ data.typePassword }}" id="confirm" class="form-control" placeholder="Password" required>
                                        </div>
                                        <span ng-show="data.error" class="error">Password is not the same, re-enter.</span>
                                    </div>
                                    <div class="form-group form-check">
                                        <div class="col-md-12">
                                            <input type="checkbox" ng-model="data.checkShowPassword" id="showPass" ng-click="action.showPassword()" class="form-check-input">
                                            <label class="form-check-label" for="showPass">Show Password</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button ng-click="action.register()" type="submit" class="col-md-12 btn btn-primary">Sign Up</button>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <span class="loginNow">Do you have an Account?<a href="{{ url('') }}/login"> Login now!</a></span>
                                    </div>
                                </form>
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

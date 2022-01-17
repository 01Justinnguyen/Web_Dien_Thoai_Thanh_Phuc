@extends('client.master')
@section('content')
<div class="breadcrumb-area" style="margin-top: -20px;">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Login Register</li>
            </ul>
        </div>
    </div>
</div>
<div class="page-section mb-60" style="margin-top: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                {{-- <form action="#"> --}}
                    <div class="login-form">
                        <h4 class="login-title">Login</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Email Address*</label>
                                <input class="mb-0" type="email" placeholder="Email Address" id="emailLogin">
                            </div>
                            <div class="col-12 mb-20">
                                <label>Password</label>
                                <input class="mb-0" type="password" placeholder="Password" id="passwordLogin">
                            </div>
                            <div class="col-md-8">
                                <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                    <input type="checkbox" id="remember_meLogin">
                                    <label for="remember_me">Remember me</label>
                                </div>
                            </div>
                            <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                <a href="#"> Forgotten pasward?</a>
                            </div>
                            <div class="col-md-12">
                                <button class="register-button mt-0" id="loginButton">Login</button>
                            </div>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                {{-- <form action="#"> --}}
                    <div class="login-form">
                        <h4 class="login-title">Register</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Full Name</label>
                                <input class="mb-0" type="text" placeholder="First Name" id="fullname_register">
                            </div>
                            {{-- <div class="col-md-6 col-12 mb-20">
                                <label>Last Name</label>
                                <input class="mb-0" type="text" placeholder="Last Name">
                            </div> --}}
                            <div class="col-md-12 mb-20">
                                <label>Email Address*</label>
                                <input class="mb-0" type="email" placeholder="Email Address" id="email_register">
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Password</label>
                                <input class="mb-0" type="password" placeholder="Password" id="password_register">
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Confirm Password</label>
                                <input class="mb-0" type="password" placeholder="Confirm Password" id="re_password_register">
                            </div>
                            <div class="col-12">
                                <button class="register-button mt-0" id="registerButton">Register</button>
                            </div>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @include('client.ajax') --}}

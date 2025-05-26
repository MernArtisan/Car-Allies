@extends('web.layouts.master')

@section('title', 'Login')
@section('description', 'Login to your account')

@section('content')

    <div class="ltn__utilize-overlay"></div>

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
        data-bs-bg="{{ asset('web/img/bg/9.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// Login</h6>
                            <h1 class="section-title white-color">Login</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li>Login</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- LOGIN AREA START -->
    <div class="ltn__login-area pb-110 pt-100">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Login Form -->
                <div class="col-lg-6">
                    <div class="account-login-inner shadow p-5 rounded bg-white">
                        <div class="section-title-area text-center mb-4">
                            <h2 class="section-title text-dark">Sign In</h2>
                            <p class="text-dark">Access your dashboard, track orders & more.</p>
                        </div>

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST" class="ltn__form-box">
                            @csrf

                            <div class="form-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email Address"
                                    required>
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label text-dark" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                                <a href="#" class="text-primary" data-bs-toggle="modal"
                                    data-bs-target="#ltn_forget_password_modal">
                                    Forgot Password?
                                </a>
                            </div>

                            <button type="submit" class="theme-btn-1 btn btn-effect-1 btn-block w-100">
                                <i class="fas fa-sign-in-alt me-2"></i> Login
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Promo Panel -->
                <div class="col-lg-6">
                    <div class="bg-light p-5 rounded shadow-sm text-center">
                        <h3 class="mb-3 text-dark">New to our site?</h3>
                        <p class="text-dark">Create an account and enjoy personalized recommendations, faster checkout, and
                            order tracking.</p>
                        <a href="{{ route('register') }}" class="theme-btn-1 btn btn-effect-1 mt-3 w-100">Create Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN AREA END -->

    <!-- FORGOT PASSWORD MODAL -->
    <div class="modal fade" id="ltn_forget_password_modal" tabindex="-1" role="dialog" aria-labelledby="forgetModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ route('password.email') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="text-dark" style="margin-left: 20px">Forget Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-dark">Enter your email and we’ll send you a link to reset your password.</p>
                    <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="theme-btn-1 btn btn-effect-1 w-100">Send Reset Link</button>
                </div>
            </form>
        </div>
    </div>

@endsection

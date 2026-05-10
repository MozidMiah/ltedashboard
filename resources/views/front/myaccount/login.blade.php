@extends('front.layouts.app')

@section('content')
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">My Account</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>My account</li>
            </ul>
        </div>
    </nav>

    <style>
        .auth-area {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 15px;
            background: #f5f7fa;
        }

        .login-popup {
            width: 100%;
            max-width: 450px;
            background: #fff;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }
    </style>

    <div class="auth-area">
        <div class="login-popup">
            <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                <ul class="nav nav-tabs text-uppercase" role="tablist">
                    <li class="nav-item">
                        <a href="#sign-in" class="nav-link active">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a href="#sign-up" class="nav-link">Sign Up</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <!-- Login -->
                    <div class="tab-pane active" id="sign-in">
                        <div class="form-group">
                            <label>Username or email address *</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>

                        <div class="form-group mb-0">
                            <label>Password *</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>

                        <div class="form-checkbox d-flex align-items-center justify-content-between">
                            <div>
                                <input type="checkbox" class="custom-checkbox" id="remember" name="remember">
                                <label for="remember">Remember me</label>
                            </div>

                            <a href="#">Lost your password?</a>
                        </div>

                        <a href="#" class="btn btn-primary btn-block">
                            Sign In
                        </a>
                    </div>
                    <!-- Register -->
                    <div class="tab-pane" id="sign-up">
                        <div class="form-group">
                            <label>Your Email address *</label>
                            <input type="text" class="form-control" name="email_1" id="email_1" required>
                        </div>

                        <div class="form-group mb-5">
                            <label>Password *</label>
                            <input type="password" class="form-control" name="password_1" id="password_1" required>
                        </div>

                        <p>
                            Your personal data will be used to support your experience
                            throughout this website, to manage access to your account,
                            and for other purposes described in our
                            <a href="#" class="text-primary">privacy policy</a>.
                        </p>
                        <a href="#" class="d-block mb-5 text-primary">
                            Signup as a vendor?
                        </a>

                        <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">
                            <div>
                                <input type="checkbox" class="custom-checkbox" id="agree" name="agree">
                                <label for="agree" class="font-size-md">
                                    I agree to the
                                    <a href="#" class="text-primary font-size-md">
                                        privacy policy
                                    </a>
                                </label>
                            </div>
                        </div>

                        <a href="#" class="btn btn-primary btn-block">
                            Sign Up
                        </a>
                    </div>
                </div>

                <p class="text-center mt-4">
                    Sign in with social account
                </p>

                <div class="social-icons social-icon-border-color d-flex justify-content-center">
                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                    <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                    <a href="#" class="social-icon social-google fab fa-google"></a>
                </div>
            </div>
        </div>
    </div>
@endsection

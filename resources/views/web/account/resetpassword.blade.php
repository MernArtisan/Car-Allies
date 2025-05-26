@extends('web.layouts.master')

@section('title', 'Account')

@section('content')
    <div class="ltn__utilize-overlay"></div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
        data-bs-bg="{{ asset('web/img/bg/9.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// Welcome to our company</h6>
                            <h1 class="section-title white-color">My Account</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li>My Account Bookings</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @include('web.account.account-sidebar')

            <div class="col-xl-9 col-lg-8 col-md-12">
                <div class="tutor-dashboard-content p-4 bg-white shadow-sm rounded">
                    <div class="settings-widget profile-details">
                        <div class="profile-heading mb-4">
                            <h3 class="text-dark font-weight-bold">Reset Password</h3>
                            <p class="text-muted">Edit your account settings and change your password here.</p>
                        </div>

                        <div class="checkout-form-profile personal-address">
                            <form action="{{ route('account.updatepassword') }}" method="post" enctype="multipart/form-data"
                                class="row" onsubmit="showLoader()">
                                @csrf
                                @method('PUT')

                                <!-- Current Password -->
                                <div class="col-lg-6 col-md-12 mb-4">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" name="previous_password" class="form-control" required>
                                </div>

                                <!-- New Password -->
                                <div class="col-lg-6 col-md-12 mb-4">
                                    <label class="form-label">New Password</label>
                                    <div class="password-input-wrapper">
                                        <input type="password" name="new_password" id="new-password-1" class="form-control"
                                            required>
                                        <span class="show-hide-btn"
                                            onclick="togglePasswordVisibility('new-password-1')">Show</span>
                                    </div>
                                </div>

                                <!-- Confirm New Password -->
                                <div class="col-lg-6 col-md-12 mb-4">
                                    <label class="form-label">Re-type New Password</label>
                                    <div class="password-input-wrapper">
                                        <input type="password" name="new_password_confirmation" id="tutor-confirm-password"
                                            class="form-control" required>
                                        <span class="show-hide-btn"
                                            onclick="togglePasswordVisibility('tutor-confirm-password')">Show</span>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-success px-4 py-2">
                                        <i class="fas fa-lock me-2"></i> Reset Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        .dashboard-sec {
            background-color: #f9f9f9;
        }

        .tutor-dashboard-content {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-heading h3 {
            font-size: 1.5rem;
            color: #333;
        }

        .form-label {
            font-size: 1rem;
            color: #333;
            font-weight: 600;
        }

        .form-control {
            font-size: 1rem;
            padding: 10px 15px;
            color: #555;
        }

        .btn-primary {
            padding: 10px 30px;
            font-size: 1rem;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
        }

        .password-input-wrapper {
            position: relative;
        }

        .show-hide-btn {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #007bff;
            font-weight: 600;
        }
    </style>

    <script>
        function togglePasswordVisibility(inputId) {
            const input = document.getElementById(inputId);
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
        }
    </script>

@endsection
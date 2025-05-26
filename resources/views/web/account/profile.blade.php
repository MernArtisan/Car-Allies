@extends('web.layouts.master')

@section('title', 'Account')

@section('content')
    {{-- <x-innerbanner :key="10" /> --}}
    <div class="ltn__utilize-overlay"></div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
        data-bs-bg="{{asset('web/img/bg/9.jpg')}}">
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
                    <div class="settings-widget">
                        <div class="settings-inner-blk p-4">
                            <div class="profile-header d-flex justify-content-between align-items-center mb-4">
                                <h3 class="profile-title text-dark font-weight-bold">My Profile</h3>
                                <a href="{{ route('account.editprofile') }}" class="theme_btn">
                                    <i class="fa-solid fa-edit"></i> Edit Profile
                                </a>
                            </div>

                            <div class="row">
                                <!-- Profile Image -->
                                <div class="col-lg-4 text-center mb-4">
                                    <img src="{{ asset('uploads/profileImage/'.$user->image) ? asset('uploads/profileImage/'.$user->image) : asset('default.png') }}"
                                        class="img-fluid rounded-circle shadow-sm" alt="Profile Image" width="150">
                                </div>

                                <!-- Profile Details -->
                                <div class="col-lg-8">
                                    <div class="row">
                                        <!-- First Name -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label font-weight-bold">Name</label>
                                                <p class="form-control-static">{{ $user->name }}</p>
                                            </div>
                                        </div>
                                        <!-- Registration Date -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label font-weight-bold">Registration Date</label>
                                                <p class="form-control-static">
                                                    {{ $user->created_at->format('F j, Y, g:i a') }}
                                                </p>
                                            </div>
                                        </div>
                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label font-weight-bold">Email</label>
                                                <p class="form-control-static">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                        <!-- Phone Number -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label font-weight-bold">Phone Number</label>
                                                <p class="form-control-static">{{ $user->phone }}</p>
                                            </div>
                                        </div>
                                        <!-- Bio -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label font-weight-bold">Bio</label>
                                                <p class="form-control-static">{{ $user->description ?? 'No Bio' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Media or Additional Info (Optional) -->
                            <div class="social-links mt-4">
                                <h5 class="font-weight-bold">Social Media</h5>
                                <p class="text-muted">No social links added.</p>
                            </div>
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

        .profile-header {
            border-bottom: 2px solid #eee;
            padding-bottom: 15px;
        }

        .profile-title {
            font-size: 1.5rem;
            color: #333;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 5px;
        }

        .form-group label {
            font-size: 1rem;
            color: #333;
        }

        .form-control-static {
            font-size: 1rem;
            color: #555;
            margin-top: 5px;
        }

        .social-links {
            margin-top: 30px;
        }
    </style>

@endsection
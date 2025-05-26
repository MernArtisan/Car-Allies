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

    <!-- ACCOUNT PAGE CONTENT -->
    <div class="container py-5">
        <div class="row">
            @include('web.account.account-sidebar')

            <div class="col-xl-9 col-lg-8 col-md-12">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4">
                        <h4 class="mb-2">My Profile</h4>
                        <form action="{{ route('account.updateprofile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="d-flex flex-column align-items-center text-center mb-4">
                                <img id="avatarPreview" 
                                     src="{{ $user->image ? asset('uploads/profileImage/' . $user->image) : asset('default.png') }}" 
                                     alt="User Avatar" 
                                     class="rounded-circle shadow" 
                                     width="120" height="120" 
                                     style="object-fit: cover;">
                            
                                <label for="image" class="btn btn-outline-primary btn-sm mt-3">
                                    <i class="bi bi-upload me-1"></i> Upload Avatar
                                </label>
                            
                                <input id="image" type="file" name="image" class="d-none" accept="image/*">
                                <small class="text-muted mt-1">PNG/JPG up to 800x800px</small>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Name</label>
                                    <input class="form-control" type="text" name="name" value="{{ $user->name ?? 'N/A'}}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <input class="form-control" type="text" name="phone" value="{{ $user->phone }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Country</label>
                                    <input class="form-control" type="text" name="country" value="{{ $user->country }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">State</label>
                                    <input class="form-control" type="text" name="state" value="{{ $user->state }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">City</label>
                                    <input class="form-control" type="text" name="city" value="{{ $user->city }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Zip</label>
                                    <input class="form-control" type="text" name="zip" value="{{ $user->zip }}">
                                </div>
                                <div class="col-lg-6">
                                    <h6>Gender</h6>
                                    <div class="input-item">
                                        <select class="form-control" name="gender">
                                            <option value="">Select gender</option>
                                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>
                                                Female</option>
                                            <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>
                                                Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="address"
                                        rows="4">{{ $user->address ?? 'N/A' }}</textarea>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">About Me</label>
                                    <textarea class="form-control" name="about_me" rows="4">{{ $user->about_me  ?? 'N/A'}}</textarea>
                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-success px-4 py-2">
                                    <i class="bi bi-check2-square me-1"></i> Update Profile
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        const imageInput = document.getElementById('image');
        const avatarPreview = document.getElementById('avatarPreview');
    
        imageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    avatarPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    
@endsection
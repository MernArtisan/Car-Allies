@extends('admin.layouts.master')
@section('title', 'Profile Edit')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Profile Edit</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                @if (Auth::user()->hasRole('vendor'))
                                    <h4>Vendor Profile</h4>
                                @else
                                    <h4>Admin Profile</h4>
                                @endif
                            </div>
                            <div class="card-body">
                                <!-- Tabs for Profile and Change Password -->
                                <ul class="nav nav-tabs" id="profileTabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile"
                                            role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="password-tab" data-toggle="tab" href="#password"
                                            role="tab" aria-controls="password" aria-selected="false">Change
                                            Password</a>
                                    </li>
                                </ul>

                                <!-- Tab Content -->
                                <div class="tab-content" id="profileTabsContent">
                                    <!-- Profile Tab -->
                                    <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <form action="{{ route('admin.profile.update') }}" method="POST"
                                            enctype="multipart/form-data" class="mt-4">
                                            @csrf
                                            @method('PUT')

                                            <div class="row">
                                                <!-- Name -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" name="name" id="name"
                                                            class="form-control" value="{{ $user->name ?? '' }}" required>
                                                    </div>
                                                </div>

                                                <!-- Email -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" name="email" id="email"
                                                            class="form-control" value="{{ $user->email ?? '' }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Vendor Name (Only for Vendor) -->
                                            @if (Auth::user()->hasRole('vendor'))
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="vendor_name">Vendor Name</label>
                                                            <input type="text" name="vendor_name" id="vendor_name"
                                                                class="form-control" value="{{ $vendor->name ?? '' }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="location"><i class="fas fa-map-marker-alt"></i>
                                                            Location:
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text" name="location" id="location"
                                                            class="form-control" placeholder="Enter Location" value="{{ $vendor->location ?? '' }}">
                                                        <span id="location_error" class="text-danger"></span>
                                                        <!-- Error message -->
                                                    </div>

                                                    <div class="form-row" style="display: none">
                                                        <div class="form-group col-md-6">
                                                            <label for="latitude"><i class="fas fa-map-pin"></i>
                                                                Latitude:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-map-marker-alt"></i></span>
                                                                </div>
                                                                <input type="number" step="any" class="form-control"
                                                                    name="latitude" id="latitude"
                                                                    placeholder="Enter Latitude" readonly
                                                                    value="{{ old('latitude') }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="longitude"><i class="fas fa-map-pin"></i>
                                                                Longitude:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-map-marker-alt"></i></span>
                                                                </div>
                                                                <input type="number" step="any" class="form-control"
                                                                    name="longitude" id="longitude"
                                                                    placeholder="Enter Longitude" readonly
                                                                    value="{{ old('longitude') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            <!-- Description and Location (Only for Vendor) -->
                                            @if (Auth::user()->hasRole('vendor'))
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="description">Description</label>
                                                            <textarea name="description" id="description" class="form-control summernote" rows="3">{{ $vendor->description ?? '' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            <!-- Image Upload (Common for Admin and Vendor) -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="imageUploader">Upload Image</label>

                                                        <div id="imagePreview" class="mb-2">
                                                            @if (Auth::user()->hasRole('admin') && Auth::user()->image)
                                                                <img src="{{ asset('uploads/profileImage/' . Auth::user()->image) }}"
                                                                    alt="Image Preview" id="previewImage"
                                                                    style="width: 150px; height: 150px; border-radius: 15px; object-fit: cover;">
                                                            @elseif (Auth::user()->hasRole('vendor') && $vendor->image)
                                                                <img src="{{ asset('uploads/vendors/' . $vendor->image) }}"
                                                                    alt="Image Preview" id="previewImage"
                                                                    style="width: 150px; height: 150px; border-radius: 15px; object-fit: cover;">
                                                            @else
                                                                <p>No image available.</p>
                                                            @endif
                                                        </div>

                                                        <div class="d-flex">
                                                            <button type="button" class="btn btn-dark" id="selectBtn"
                                                                onclick="document.getElementById('imageUploader').click();">
                                                                Select Image
                                                            </button>
                                                            <button type="button" class="btn btn-danger ml-2"
                                                                id="removeBtn" style="display: none;"
                                                                onclick="removeImage();">
                                                                Remove Image
                                                            </button>
                                                        </div>

                                                        <input type="file" name="image" id="imageUploader"
                                                            class="form-control-file" accept="image/*"
                                                            style="display: none;" onchange="previewFile();">
                                                        <small id="imageError" class="text-danger"></small>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Update
                                                            Profile</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Change Password Tab -->
                                    <div class="tab-pane fade" id="password" role="tabpanel"
                                        aria-labelledby="password-tab">
                                        <form action="{{ route('admin.password.update') }}" method="POST"
                                            class="mt-4">
                                            @csrf
                                            @method('PUT')

                                            <!-- Current Password -->
                                            <div class="form-group">
                                                <label for="current_password">Current Password</label>
                                                <input type="password" name="current_password" id="current_password"
                                                    class="form-control" required>
                                            </div>

                                            <!-- New Password -->
                                            <div class="form-group">
                                                <label for="new_password">New Password</label>
                                                <input type="password" name="new_password" id="new_password"
                                                    class="form-control" required>
                                            </div>

                                            <!-- Confirm New Password -->
                                            <div class="form-group">
                                                <label for="new_password_confirmation">Confirm New Password</label>
                                                <input type="password" name="new_password_confirmation"
                                                    id="new_password_confirmation" class="form-control" required>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Change Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2zcZWYTrnjovVYwCR9zwHJwVEtUEufJk&libraries=places">
    </script>
    <script>
        function initialize() {
            var input = document.getElementById('location');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    return;
                }

                var lat = place.geometry.location.lat();
                var lng = place.geometry.location.lng();

                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;

                document.getElementById('map-container').style.display = 'block';

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: place.geometry.location
                });

                var marker = new google.maps.Marker({
                    position: place.geometry.location,
                    map: map
                });
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
@endsection

@extends('admin.layouts.master')
@section('title', 'Create User with Vendors')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Create User with Vendors</h4>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-dark">
                                    <i class="fas fa-arrow-left"></i> Back To List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.users.store') }}" method="POST" id="userForm"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="user_type"><i class="fas fa-user-tag"></i> Select User Type: <span
                                                    class="text-danger">*</span></label>
                                            <select name="user_type" id="user_type" class="form-control"
                                                onchange="toggleVendorFields()">
                                                <option value="user">Customer</option>
                                                <option value="vendor">Vendor</option>
                                            </select>
                                            <span id="user_type_error" class="text-danger"></span> <!-- Error message -->
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="name"><i class="fas fa-user"></i> Name: <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Enter Name">
                                            <span id="name_error" class="text-danger"></span> <!-- Error message -->
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="email"><i class="fas fa-envelope"></i> Email: <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Enter Email">
                                            <span id="email_error" class="text-danger"></span> <!-- Error message -->
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password"><i class="fas fa-lock"></i> Password: <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Enter Password">
                                            <span id="password_error" class="text-danger"></span> <!-- Error message -->
                                        </div>
                                    </div>
                                    <div class="form-row" id="addressFields">
                                        <div class="form-group col-md-4">
                                            <label for="country"><i class="fas fa-globe"></i> Country:</label>
                                            <input type="text" name="country" id="country" class="form-control"
                                                placeholder="Enter country">
                                            <span id="country_error" class="text-danger"></span> <!-- Error message -->
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="state"><i class="fas fa-map-marker-alt"></i> State:</label>
                                            <input type="text" name="state" id="state" class="form-control"
                                                placeholder="Enter state">
                                            <span id="state_error" class="text-danger"></span> <!-- Error message -->
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="city"><i class="fas fa-city"></i> City:</label>
                                            <input type="text" name="city" id="city" class="form-control"
                                                placeholder="Enter city">
                                            <span id="city_error" class="text-danger"></span> <!-- Error message -->
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="zip"><i class="fas fa-mail-bulk"></i> Zip:</label>
                                            <input type="text" name="zip" id="zip" class="form-control"
                                                placeholder="Enter zip">
                                            <span id="zip_error" class="text-danger"></span> <!-- Error message -->
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="phone"><i class="fas fa-phone"></i> Phone:</label>
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                placeholder="Enter phone number">
                                            <span id="phone_error" class="text-danger"></span> <!-- Error message -->
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="gender"><i class="fas fa-venus-mars"></i> Gender:</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                            <span id="gender_error" class="text-danger"></span> <!-- Error message -->
                                        </div>
                                    </div>
                                    <div id="vendor_fields" style="display: none;">
                                        <span>Vendor Fields</span>
                                        <hr>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="store_name"><i class="fas fa-store"></i> Vendor Store Name:
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" name="store_name" id="store_name"
                                                    class="form-control" placeholder="Enter Store Name">
                                                <span id="store_name_error" class="text-danger"></span>
                                                <!-- Error message -->
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="location"><i class="fas fa-map-marker-alt"></i> Location:
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" name="location" id="location"
                                                    class="form-control" placeholder="Enter Location">
                                                <span id="location_error" class="text-danger"></span>
                                                <!-- Error message -->
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="establish_since"><i class="fas fa-calendar-alt"></i> Establish
                                                    Since: <span class="text-danger">*</span></label>
                                                <input type="date" name="establish_since" id="establish_since"
                                                    class="form-control">
                                                <span id="establish_since_error" class="text-danger"></span>
                                                <!-- Error message -->
                                            </div>
                                        </div>

                                        <div class="form-group" id="map-container" style="display: none;">
                                            <label for="map"><i class="fas fa-map"></i> Location Map</label>
                                            <div id="map" style="width: 100%; height: 400px;"></div>
                                        </div>

                                        <div class="form-row"style="display: none;">
                                            <div class="form-group col-md-6">
                                                <label for="latitude"><i class="fas fa-map-pin"></i> Latitude:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-map-marker-alt"></i></span>
                                                    </div>
                                                    <input type="number" step="any" class="form-control"
                                                        name="latitude" id="latitude" placeholder="Enter Latitude"
                                                        readonly value="{{ old('latitude') }}">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="longitude"><i class="fas fa-map-pin"></i> Longitude:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-map-marker-alt"></i></span>
                                                    </div>
                                                    <input type="number" step="any" class="form-control"
                                                        name="longitude" id="longitude" placeholder="Enter Longitude"
                                                        readonly value="{{ old('longitude') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="store_description"><i class="fas fa-info-circle"></i> Vendor Store
                                                Description: <span class="text-danger">*</span></label>
                                            <textarea name="description" id="description" class="form-control summernote" placeholder="Enter Description"></textarea>
                                            <span id="description_error" class="text-danger"></span>
                                            <!-- Error message -->
                                        </div>

                                        <div class="form-group">
                                            <label for="imageUploader"><i class="fas fa-image"></i> Store Image</label>
                                            <div id="imagePreview" class="mb-2" style="display: none;">
                                                <img src="" alt="Image Preview" id="previewImage"
                                                    style="width: 150px; height: 150px; border-radius: 15px; object-fit: cover; box-shadow: 0px 4px 8px rgba(0,0,0,0.1);">
                                            </div>
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-dark" id="selectBtn"
                                                    onclick="document.getElementById('imageUploader').click();">
                                                    <i class="fas fa-upload"></i> Select Image
                                                </button>
                                                <button type="button" class="btn btn-danger ml-2" id="removeBtn"
                                                    style="display: none;" onclick="removeImage();">
                                                    <i class="fas fa-trash"></i> Remove Image
                                                </button>
                                            </div>
                                            <input type="file" name="image" id="imageUploader"
                                                class="form-control-file" accept="image/*" style="display: none;"
                                                onchange="previewFile();">
                                            <small id="imageError" class="text-danger"></small>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-dark" id="btnSubmit"><i
                                            class="fas fa-save"></i> Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2zcZWYTrnjovVYwCR9zwHJwVEtUEufJk&libraries=places">
    </script>
    <script>
        function toggleVendorFields() {
            var userType = document.getElementById('user_type').value;
            var vendorFields = document.getElementById('vendor_fields');
            if (userType === 'vendor') {
                vendorFields.style.display = 'block';
            } else {
                vendorFields.style.display = 'none';
            }
        }

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

        // Function to toggle vendor fields
        function toggleVendorFields() {
            const userType = document.getElementById('user_type').value;
            const vendorFields = document.getElementById('vendor_fields');

            if (userType === 'vendor') {
                vendorFields.style.display = 'block';
            } else {
                vendorFields.style.display = 'none';
            }
        }

        document.getElementById('userForm').addEventListener('submit', function(event) {
            event.preventDefault();
            clearErrors();

            if (validateForm()) {
                const formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.users.store') }}",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        // Show SweetAlert processing loader
                        Swal.fire({
                            title: 'Processing...',
                            text: 'Please wait while we process your request.',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading(); // Show loading spinner
                            }
                        });
                    },
                    success: function(response) {
                        Swal.close();

                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'User created successfully!',
                            showConfirmButton: false,
                            timer: 3000 // Auto-close after 3 seconds
                        });

                    },
                    error: function(xhr) {
                        // Close the processing loader
                        Swal.close();

                        const errors = xhr.responseJSON.errors;

                        if (errors) {
                            // Show error messages using SweetAlert
                            Object.keys(errors).forEach(field => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: errors[field][0],
                                });
                                document.getElementById(`${field}_error`).innerText = errors[
                                    field][0];
                            });
                        } else {
                            // Generic error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occurred. Please try again.',
                            });
                        }
                    }
                });
            }
        });

        // Form validation function
        function validateForm() {
            const userType = document.getElementById('user_type').value;
            let isValid = true;

            // Required fields for all users
            const requiredFields = ['name', 'email', 'password'];
            requiredFields.forEach(field => {
                const input = document.getElementById(field);
                if (!input.value.trim()) {
                    isValid = false;
                    document.getElementById(`${field}_error`).innerText =
                        `${field.replace(/_/g, ' ').toLocaleLowerCase()} is required!`;
                }
            });

            // Additional validation for vendors
            if (userType === 'vendor') {
                const vendorRequiredFields = ['store_name', 'location', 'establish_since', 'description'];
                vendorRequiredFields.forEach(field => {
                    const input = document.getElementById(field);
                    if (!input.value.trim()) {
                        isValid = false;
                        document.getElementById(`${field}_error`).innerText =
                            `${field.replace(/_/g, ' ').toLocaleLowerCase()} is required for vendors!`;
                    }
                });
            }

            return isValid;
        }

        // Function to clear all error messages
        function clearErrors() {
            const errorSpans = document.querySelectorAll('.text-danger');
            errorSpans.forEach(span => span.innerText = '');
        }
    </script>
@endsection




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
                                <h4 class="page-title m-b-0">
                                    @if ($user->hasRole('vendor'))
                                        Vendor {{ $user->vendor->name }}
                                    @else
                                        Customer {{ $user->name }}
                                    @endif
                                </h4>
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
                                <form action="{{ route('admin.users.update', $user->id) }}') }}" method="POST"
                                    id="userUpdateForm" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="user_type"><i class="fas fa-user-tag"></i> Select User Type: <span
                                                    class="text-danger">*</span></label>

                                            <select name="user_type_display" id="user_type" class="form-control" disabled>
                                                <option value="user" {{ $user->hasRole('user') ? 'selected' : '' }}>
                                                    Customer</option>
                                                <option value="vendor" {{ $user->hasRole('vendor') ? 'selected' : '' }}>
                                                    Vendor</option>
                                            </select>

                                            <!-- Hidden input to submit the selected value -->
                                            <input type="hidden" name="user_type"
                                                value="{{ $user->hasRole('vendor') ? 'vendor' : 'user' }}">

                                            <span id="user_type_error" class="text-danger"></span>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label for="name"><i class="fas fa-user"></i> Name: <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Enter Name" value="{{ $user->name }}">
                                            <span id="name_error" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        @if ($user->hasRole('vendor'))
                                            <div class="form-group col-md-6">
                                            @else
                                                <div class="form-group col-md-12">
                                        @endif
                                        <label for="email"><i class="fas fa-envelope"></i> Email: <span
                                                class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Enter Email" value="{{ $user->email }}" readonly>
                                        <span id="email_error" class="text-danger"></span>
                                    </div>
                                    @if ($user->hasRole('vendor'))
                                        <div class="form-group col-md-6">
                                            <label for="status">Change Status:</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="2" {{ $user->vendor->status == 2 ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value="1" {{ $user->vendor->status == 1 ? 'selected' : '' }}>
                                                    Hold
                                                </option>
                                                <option value="0" {{ $user->vendor->status == 0 ? 'selected' : '' }}>
                                                    Block
                                                </option>
                                            </select>
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-row" id="addressFields">
                                    <div class="form-group col-md-4">
                                        <label for="country"><i class="fas fa-globe"></i> Country:</label>
                                        <input type="text" name="country" id="country" class="form-control"
                                            placeholder="Enter country" value="{{ $user->country }}">
                                        <span id="country_error" class="text-danger"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="state"><i class="fas fa-map-marker-alt"></i> State:</label>
                                        <input type="text" name="state" id="state" class="form-control"
                                            placeholder="Enter state" value="{{ $user->state }}">
                                        <span id="state_error" class="text-danger"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="city"><i class="fas fa-city"></i> City:</label>
                                        <input type="text" name="city" id="city" class="form-control"
                                            placeholder="Enter city" value="{{ $user->city }}">
                                        <span id="city_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="zip"><i class="fas fa-mail-bulk"></i> Zip:</label>
                                        <input type="text" name="zip" id="zip" class="form-control"
                                            placeholder="Enter zip"value="{{ $user->zip }}">
                                        <span id="zip_error" class="text-danger"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="phone"><i class="fas fa-phone"></i> Phone:</label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            placeholder="Enter phone number"value="{{ $user->phone }}">
                                        <span id="phone_error" class="text-danger"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="gender"><i class="fas fa-venus-mars"></i> Gender:</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>
                                                Female</option>
                                            <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>
                                                Other</option>
                                        </select>
                                        <span id="gender_error" class="text-danger"></span>
                                    </div>

                                </div>
                                <div id="vendor_fields" style="display: none;">
                                    <span>Vendor Fields</span>
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="store_name"><i class="fas fa-store"></i> Vendor Store Name:
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="store_name" id="store_name" class="form-control"
                                                placeholder="Enter Store Name" value="{{ $user->vendor->name ?? '' }}">
                                            <span id="store_name_error" class="text-danger"></span>

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="location"><i class="fas fa-map-marker-alt"></i> Location:
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="location" id="location" class="form-control"
                                                placeholder="Enter Location"value="{{ $user->vendor->location ?? '' }}">
                                            <span id="location_error" class="text-danger"></span>

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="establish_since"><i class="fas fa-calendar-alt"></i> Establish
                                                Since: <span class="text-danger">*</span></label>
                                            <input type="date" name="establish_since" id="establish_since"
                                                class="form-control" value="{{ $user->vendor->establish_since ?? '' }}">
                                            <span id="establish_since_error" class="text-danger"></span>

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
                                                <input type="number" step="any" class="form-control" name="latitude"
                                                    id="latitude" placeholder="Enter Latitude" readonly
                                                    value="{{ old('latitude') }}">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="longitude"><i class="fas fa-map-pin"></i> Longitude:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-map-marker-alt"></i></span>
                                                </div>
                                                <input type="number" step="any" class="form-control" name="longitude"
                                                    id="longitude" placeholder="Enter Longitude" readonly
                                                    value="{{ old('longitude') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="store_description"><i class="fas fa-info-circle"></i> Vendor Store
                                            Description: <span class="text-danger">*</span></label>
                                        <textarea name="description" id="description" class="form-control summernote" placeholder="Enter Description">{{ $user->vendor->description ?? '' }}</textarea>
                                        <span id="description_error" class="text-danger"></span>

                                    </div>

                                    <div class="form-group">
                                        <label for="imageUploader"><i class="fas fa-image"></i> Store Image</label>
                                        <div id="imagePreview" class="mb-2"
                                            style="display: {{ $user->vendor && $user->vendor->image ? 'block' : 'none' }};">
                                            @if ($user->vendor && $user->vendor->image)
                                                <img src="{{ asset('uploads/vendors/' . $user->vendor->image) }}"
                                                    alt="Image Preview" id="previewImage"
                                                    style="width: 150px; height: 150px; border-radius: 15px; object-fit: cover;">
                                            @endif
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
                                        <input type="file" name="image" id="imageUploader" class="form-control-file"
                                            accept="image/*" style="display: none;" onchange="previewFile();">
                                        <small id="imageError" class="text-danger"></small>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-dark" id="btnSubmit"><i class="fas fa-save"></i>
                                    Submit</button>
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

        window.onload = function() {
            var userType = document.getElementById('user_type').value;
            toggleVendorFields();
        };


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

        document.getElementById('userUpdateForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            clearErrors(); // Clear any previous error messages

            if (validateForm()) { // Validate the form fields
                const formData = new FormData(this); // Create FormData object to send the form data

                $.ajax({
                    url: "{{ route('admin.users.update', $user->id) }}", // Correct route for update
                    method: "POST", // Use POST with a hidden _method of PUT
                    data: formData,
                    processData: false, // Don't process the files (needed for file upload)
                    contentType: false, // Don't set the content type header
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Processing...',
                            text: 'Please wait while we process your request.',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal
                                    .showLoading(); // Show a loading spinner while the request is being processed
                            }
                        });
                    },
                    success: function(response) {
                        Swal.close(); // Close the loading spinner

                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'User updated successfully!',
                            showConfirmButton: false,
                            timer: 3000 // Show success message for 3 seconds
                        });

                        // Optionally, you can refresh the page or redirect to another page here
                        // setTimeout(() => {
                        //     location.reload();
                        // }, 3000);
                    },
                    error: function(xhr) {
                        Swal.close(); // Close the loading spinner on error
                        const errors = xhr.responseJSON.errors;
                        if (errors) {
                            Object.keys(errors).forEach(field => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: errors[field][
                                        0
                                    ], // Display the first error message
                                });
                                document.getElementById(`${field}_error`).innerText = errors[
                                    field][0]; // Show error message next to the field
                            });
                        } else {
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

        function validateForm() {
            const userType = document.getElementById('user_type').value;
            let isValid = true;

            const requiredFields = ['name', 'email']; // Assuming password is not required for updates
            requiredFields.forEach(field => {
                const input = document.getElementById(field);
                if (!input.value.trim()) {
                    isValid = false;
                    document.getElementById(`${field}_error`).innerText =
                        `${field.replace(/_/g, ' ').toLocaleLowerCase()} is required!`;
                }
            });

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

        function clearErrors() {
            const errorSpans = document.querySelectorAll('.text-danger'); // Select all error message spans
            errorSpans.forEach(span => span.innerText = ''); // Clear all error messages
        }
    </script>
@endsection

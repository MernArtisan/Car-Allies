@extends('admin.layouts.master')
@section('title', 'General Details')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Update Generals Details</h4>
                                {{-- <a href="{{ route('admin.homebanners.index') }}" class="btn btn-dark"><i
                                        class="fas fa-arrow-left"></i> Back To List</a> --}}
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
                            <div class="card-body">
                                <h4 class="card-title">Edit General</h4>
                                {{-- <p class="text-muted m-b-15 f-s-12">Use the input classes on an <code>.input-default, input-flat, .input-rounded</code> for Default input.</p> --}}

                                <!-- Nav tabs -->
                                <ul class="mb-3 nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                            href="#home8"><span><i class="ti-settings"></i></span></a></li>
                                    {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile8"><span><i class="ti-user"></i></span></a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages8"><span><i class="ti-email"></i></span></a></li> --}}
                                </ul>
                                <!-- Tab panes -->

                                <div class="tab-content tabcontent-border">

                                    <div class="tab-pane fade show active" id="home8" role="tabpanel">
                                        <div class="p-t-15">
                                            <div class="basic-form">
                                                <form action="{{ route('admin.generals.update', $general->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                
                                                    {{-- Address --}}
                                                    <label>Address:</label>
                                                    <div class="form-group">
                                                        <input type="text" name="address" class="form-control input-rounded"
                                                            value="{{ old('address', $general->address) }}" placeholder="Address">
                                                    </div>
                                                
                                                    {{-- Email --}}
                                                    <label>Email:</label>
                                                    <div class="form-group">
                                                        <input type="email" name="email" class="form-control input-rounded"
                                                            value="{{ old('email', $general->email) }}" placeholder="Email">
                                                    </div>
                                                
                                                    {{-- Office Email --}}
                                                    <label>Office Email:</label>
                                                    <div class="form-group">
                                                        <input type="email" name="office_email" class="form-control input-rounded"
                                                            value="{{ old('office_email', $general->office_email) }}" placeholder="Office Email">
                                                    </div>
                                                
                                                    {{-- Phone --}}
                                                    <label>Phone:</label>
                                                    <div class="form-group">
                                                        <input type="text" name="phone" class="form-control input-rounded"
                                                            value="{{ old('phone', $general->phone) }}" placeholder="Phone">
                                                    </div>
                                                
                                                    {{-- Office Phone --}}
                                                    <label>Office Phone:</label>
                                                    <div class="form-group">
                                                        <input type="text" name="office_phone" class="form-control input-rounded"
                                                            value="{{ old('office_phone', $general->office_phone) }}" placeholder="Office Phone">
                                                    </div>
                                                    <label>Office Phone:</label>
                                                    <div class="form-group">
                                                        <input type="text" name="location" id="location"
                                                            class="form-control" placeholder="Enter Location" value="{{ old('location', $general->location) }}">
                                                        <!-- Error message -->
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
                                                                    name="lat" id="lat" placeholder="Enter Latitude"
                                                                    readonly value="{{ old('lat') }}">
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
                                                                    name="long" id="long" placeholder="Enter Longitude"
                                                                    readonly value="{{ old('long') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label>Facebook:</label>
                                                    <div class="form-group">
                                                        <input type="text" name="facebook" class="form-control input-rounded"
                                                            value="{{ old('facebook', $general->facebook) }}" placeholder="Facebook URL">
                                                    </div>
                                                
                                                    {{-- Instagram --}}
                                                    <label>Instagram:</label>
                                                    <div class="form-group">
                                                        <input type="text" name="instagram" class="form-control input-rounded"
                                                            value="{{ old('instagram', $general->instagram) }}" placeholder="Instagram URL">
                                                    </div>
                                                
                                                    {{-- LinkedIn --}}
                                                    <label>LinkedIn:</label>
                                                    <div class="form-group">
                                                        <input type="text" name="linkedin" class="form-control input-rounded"
                                                            value="{{ old('linkedin', $general->linkedin) }}" placeholder="LinkedIn URL">
                                                    </div>
                                                
                                                    {{-- Twitter --}}
                                                    <label>Twitter:</label>
                                                    <div class="form-group">
                                                        <input type="text" name="twitter" class="form-control input-rounded"
                                                            value="{{ old('twitter', $general->twitter) }}" placeholder="Twitter URL">
                                                    </div>
                                                
                                                    {{-- Submit --}}
                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" class="mb-1 btn btn-rounded btn-outline-success">Update</button>
                                                    </div>
                                                </form>
                                                
                                            </div>

                                        </div>
                                    </div>

                                </div>
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

            document.getElementById('lat').value = lat;
            document.getElementById('long').value = lng;

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

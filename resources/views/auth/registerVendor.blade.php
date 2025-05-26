@extends('web.layouts.master')

@section('title', 'Register Store')
@section('description', 'Create your store account to get started')

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
                            <h6 class="section-subtitle ltn__secondary-color">// Store Register</h6>
                            <h1 class="section-title white-color">Store Register</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li>Store Register</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ltn__login-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="account-login-inner shadow p-5 rounded bg-white">
                        <div class="section-title-area text-center mb-4">
                            <h2 class="section-title text-dark">Register Your Store</h2>
                            <p class="text-dark">Join our vendor network and start selling with confidence.</p>
                        </div>

                        {{-- Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Form Start --}}
                        <form action="{{ route('registerVendor') }}" method="POST" enctype="multipart/form-data"
                            class="row g-3">
                            @csrf

                            <div class="col-12 text-center mb-2">
                                <img src="{{ asset('old_logo.png') }}" id="profile-preview"
                                    class="img-fluid rounded-circle border shadow-sm mb-2"
                                    style="width: 120px; height: 120px; object-fit: cover;">
                                <div>
                                    <input type="file" name="vendor_image" id="vendor_image" accept="image/*"
                                        class="d-none">
                                    <button type="button" class="btn btn-sm btn-outline-primary"
                                        onclick="document.getElementById('vendor_image').click()">
                                        add Logo <i class="fas fa-camera"></i>
                                    </button>
                                </div>
                            </div>

                            {{-- Store Info --}}
                            <div class="col-md-6">
                                <input type="text" name="vendor_name" placeholder="Store Name" class="form-control"
                                    value="{{ old('vendor_name') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="vendor_location" id="location" placeholder="Store Location"
                                    class="form-control" value="{{ old('vendor_location') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="establish_since" placeholder="Established Since (Year)"
                                    min="1900" max="2099" class="form-control" value="{{ old('establish_since') }}">
                            </div>
                            <input type="hidden" name="vendor_lat" id="vendor_lat" class="form-control">
                            <input type="hidden" name="vendor_long" id="vendor_long" class="form-control">
                            <div class="col-md-6">
                                <input type="text" name="name" placeholder="Your Name" class="form-control"
                                    value="{{ old('name') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" placeholder="Email" class="form-control"
                                    value="{{ old('email') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password" placeholder="Password" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                    class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <input type="text" name="phone" placeholder="Phone Number" class="form-control"
                                    value="{{ old('phone') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="zip" placeholder="ZIP Code" class="form-control"
                                    value="{{ old('zip') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="country" placeholder="Country" value="United States" readonly>
                            </div>

                            <div class="col-md-6 input-item">
                                <select id="state-dropdown" name="state" class="form-control">
                                    <option value="">-- Select State --</option>
                                </select>
                            </div>

                            <div class="col-md-6 input-item">
                                <select id="city-dropdown" name="city" class="form-control">
                                    <option value="">-- Select City --</option>
                                </select>
                            </div>
                            <br><br><br>
                            <style>
                                /* Fix width and height of select2 */
                                .select2-container--default .select2-selection--single {
                                    height: 55px !important;
                                    padding: 10px 12px;
                                    /* border: 1px solid #ccc;
                                    border-radius: 4px; */
                                }
                            
                                .select2-container--default .select2-selection--single .select2-selection__rendered {
                                    line-height: 28px;
                                    font-size: 14px;
                                }
                            
                                .select2-container--default .select2-selection--single .select2-selection__arrow {
                                    height: 45px !important;
                                    top: 0px;
                                    right: 10px;
                                }
                            
                                /* Ensure full width */
                                .select2-container {
                                    width: 100% !important;
                                }
                            </style>

                            <div class="col-md-12">
                                <textarea name="description" placeholder="Store Description" id=""></textarea>
                            </div>

                            <div class="col-12 mt-3">
                                <button type="submit" class="theme-btn-1 btn btn-effect-1 btn-block w-100">
                                    <i class="fas fa-store me-2"></i> Register Store
                                </button>
                            </div>
                        </form>

                        {{-- Terms & Redirect --}}
                        <div class="text-center mt-4">
                            <small>
                                By registering, you agree to our <a href="{{ route('terms.condition') }}">Terms</a> and <a
                                    href="{{ route('privacy.policy') }}">Privacy
                                    Policy</a>.
                            </small>
                            <p class="mt-3 text-dark">Already have an account? <a href="{{ route('login') }}">Login
                                    here</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Preview Script -->
    <script>
        document.getElementById('vendor_image').addEventListener('change', function(e) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('profile-preview').src = event.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        });
    </script>
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
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            const statesWithCities = {
                "California": ["Los Angeles", "San Diego", "San Francisco"],
                "Texas": ["Houston", "Dallas", "Austin"],
                "Florida": ["Miami", "Orlando", "Tampa"],
                "New York": ["New York City", "Buffalo", "Rochester"],
                "Illinois": ["Chicago", "Aurora", "Naperville"],
                "Pennsylvania": ["Philadelphia", "Pittsburgh", "Allentown"],
                "Arizona": ["Phoenix", "Tucson", "Mesa"],
                "Ohio": ["Columbus", "Cleveland", "Cincinnati"],
                "Georgia": ["Atlanta", "Savannah", "Augusta"],
                "North Carolina": ["Charlotte", "Raleigh", "Durham"],
                "Michigan": ["Detroit", "Grand Rapids", "Ann Arbor"],
                "Washington": ["Seattle", "Spokane", "Tacoma"],
                "Massachusetts": ["Boston", "Worcester", "Springfield"],
                "Virginia": ["Virginia Beach", "Norfolk", "Chesapeake"],
                "New Jersey": ["Newark", "Jersey City", "Paterson"],
                "Nevada": ["Las Vegas", "Reno", "Henderson"],
                "Colorado": ["Denver", "Colorado Springs", "Aurora"],
                "Indiana": ["Indianapolis", "Fort Wayne", "Evansville"],
                "Tennessee": ["Nashville", "Memphis", "Knoxville"],
                "Missouri": ["Kansas City", "St. Louis", "Springfield"],
                "Maryland": ["Baltimore", "Frederick", "Rockville"],
                "Wisconsin": ["Milwaukee", "Madison", "Green Bay"],
                "Minnesota": ["Minneapolis", "St. Paul", "Rochester"],
                "Alabama": ["Birmingham", "Montgomery", "Mobile"],
                "South Carolina": ["Columbia", "Charleston", "Greenville"],
                "Kentucky": ["Louisville", "Lexington", "Bowling Green"],
                "Louisiana": ["New Orleans", "Baton Rouge", "Lafayette"],
                "Oregon": ["Portland", "Salem", "Eugene"],
                "Oklahoma": ["Oklahoma City", "Tulsa", "Norman"],
                "Connecticut": ["Bridgeport", "New Haven", "Stamford"],
                "Iowa": ["Des Moines", "Cedar Rapids", "Davenport"],
                "Utah": ["Salt Lake City", "Provo", "Ogden"],
                "Arkansas": ["Little Rock", "Fayetteville", "Fort Smith"],
                "Mississippi": ["Jackson", "Gulfport", "Southaven"],
                "Kansas": ["Wichita", "Overland Park", "Topeka"],
                "New Mexico": ["Albuquerque", "Santa Fe", "Las Cruces"],
                "Nebraska": ["Omaha", "Lincoln", "Bellevue"],
                "West Virginia": ["Charleston", "Morgantown", "Huntington"],
                "Idaho": ["Boise", "Meridian", "Nampa"],
                "Hawaii": ["Honolulu", "Hilo", "Kailua"],
                "Maine": ["Portland", "Lewiston", "Bangor"],
                "New Hampshire": ["Manchester", "Nashua", "Concord"],
                "Montana": ["Billings", "Missoula", "Bozeman"],
                "Rhode Island": ["Providence", "Warwick", "Cranston"],
                "Delaware": ["Wilmington", "Dover", "Newark"],
                "South Dakota": ["Sioux Falls", "Rapid City", "Aberdeen"],
                "North Dakota": ["Fargo", "Bismarck", "Grand Forks"],
                "Alaska": ["Anchorage", "Juneau", "Fairbanks"],
                "Vermont": ["Burlington", "South Burlington", "Rutland"],
                "Wyoming": ["Cheyenne", "Casper", "Laramie"]
            };

            $('#state-dropdown, #city-dropdown').select2({
                width: '100%',
                placeholder: "Select State",
                allowClear: true
            });
            $('#city-dropdown').select2({
                width: '100%',
                placeholder: "Select City",
                allowClear: true
            });

            $.each(statesWithCities, function (state, cities) {
                $('#state-dropdown').append(new Option(state, state));
            });

            $('#state-dropdown').on('change', function () {
                const selectedState = $(this).val();
                const cityDropdown = $('#city-dropdown');
                cityDropdown.empty().append('<option value="">-- Select City --</option>');
                if (statesWithCities[selectedState]) {
                    $.each(statesWithCities[selectedState], function (index, city) {
                        cityDropdown.append(new Option(city, city));
                    });
                }
                cityDropdown.trigger('change');
            });
        });
    </script>
@endsection
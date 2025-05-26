@extends('web.layouts.master')

@section('title', 'Register')
@section('description', 'Create your account to get started')

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
                            <h6 class="section-subtitle ltn__secondary-color">// Register</h6>
                            <h1 class="section-title white-color">Register</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li>Register</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ltn__login-area pb-110 pt-100">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Register Form -->
                <div class="col-lg-8">
                    <div class="account-login-inner shadow p-5 rounded bg-white">
                        <div class="section-title-area text-center mb-4">
                            <h2 class="section-title text-dark">Register Your Account</h2>
                            <p class="text-dark">Fill out the form below to get started. It's fast, easy, and secure.</p>
                        </div>

                        {{-- Show validation errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('register') }}" method="POST" class="row g-3">
                            @csrf

                            <div class="col-md-6">
                                <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="zip" placeholder="ZIP Code" value="{{ old('zip') }}">
                            </div>

                            <div class="col-md-12 md">
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
                            

                            <div class="col-12 mt-2">
                                <button class="theme-btn-1 btn btn-effect-1 btn-block" type="submit">
                                    <i class="fas fa-user-plus me-2"></i> Create Account
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <small class="text-dark">By registering, you agree to our
                                <a href="{{ route('terms.condition') }}">Terms & Conditions</a> and <a
                                    href="{{ route('privacy.policy') }}">Privacy Policy</a>.
                            </small>
                            <p class="mt-3 text-dark">Already have an account? <a href="{{ route('login') }}">Login
                                    here</a>.</p>
                        </div>
                    </div>
                </div>
 
                <div class="col-lg-4">
                    <div class="bg-light p-4 rounded shadow-sm text-center h-100 d-flex flex-column justify-content-center">
                        <h3 class="mb-3 text-dark">Become a Vendor</h3>
                        <p class="text-dark">Join our seller network and showcase your products to a wider audience.</p>
                        <a href="{{ route('registerVendor') }}" class="theme-btn-1 btn btn-effect-1 btn-block mt-3">
                            Register as Vendor
                        </a>
                        <div class="mt-4 text-dark small">
                            <p class="text-dark"><i class="fas fa-check-circle me-2 text-success"></i>No hidden fees</p>
                            <p class="text-dark"><i class="fas fa-check-circle me-2 text-success"></i>Easy onboarding</p>
                            <p class="text-dark"><i class="fas fa-check-circle me-2 text-success"></i>Grow your business</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   



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

            // Populate state options
            $.each(statesWithCities, function (state, cities) {
                $('#state-dropdown').append(new Option(state, state));
            });

            // On state change → populate city dropdown
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
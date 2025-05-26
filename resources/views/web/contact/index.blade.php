@extends('web.layouts.master')

@section('title', 'Home')
@section('description', 'Lorem Ipsum')

@section('content')

    <div class="ltn__utilize-overlay"></div>

    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
        data-bs-bg="{{ asset('web/img/bg/9.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// Welcome to our company</h6>
                            <h1 class="section-title white-color">Contact Us</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li>Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ltn__contact-address-area mb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="{{ asset('web/img/icons/10-1.png') }}" alt="Icon Image">
                        </div>
                        <h3>Email Address</h3>
                        <p>{{ $generals->email ?? 'N/A' }} <br>
                            {{ $generals->office_email ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="{{ asset('web/img/icons/11-1.png') }}" alt="Icon Image">
                        </div>
                        <h3>Phone Number</h3>
                        <p>{{ $generals->phone ?? 'N/A' }} <br> {{ $generals->office_phone ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="{{ asset('web/img/icons/12-1.png') }}" alt="Icon Image">
                        </div>
                        <h3>Office Address</h3>
                        <p>{{ $generals->address ?? 'N/A' }} <br> {{ $generals->office_address ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ltn__contact-message-area mb-120 mb--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__form-box contact-form-box box-shadow white-bg">
                        <h4 class="title-2">Get A Quote</h4>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" name="name" placeholder="Enter your name" required>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="input-item input-item-email ltn__custom-icon">
                                        <input type="email" name="email" placeholder="Enter email address" required>
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-12">
                                    <div class="input-item input-item-phone ltn__custom-icon">
                                        <input type="text" name="phone" placeholder="Enter phone number" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="input-item input-item-textarea ltn__custom-icon">
                                <textarea name="message" placeholder="Enter message" required></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="btn-wrapper mt-0">
                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">
                                    Send Message
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="google-map">
        @if ($generals->lat && $generals->long)
            <iframe width="100%" height="100%" frameborder="0" style="border:0"
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps?q={{ $generals->lat }},{{ $generals->long }}&hl=es;z=14&output=embed"
                allowfullscreen loading="lazy">
            </iframe>
        @else
            <p class="text-center text-muted">Location not set</p>
        @endif
    </div>


@endsection

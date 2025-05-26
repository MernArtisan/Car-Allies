@extends('web.layouts.master')

@section('title', 'Home')
@section('description', 'Lorem Ipsum')

@section('content')

    <div class="ltn__utilize-overlay"></div>

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
        data-bs-bg="{{asset('web/img/bg/9.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// Welcome to our company</h6>
                            <h1 class="section-title white-color">Checkout</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    <div class="ltn__checkout-area mb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__checkout-inner">
                        <div class="ltn__checkout-single-content mt-50">
                            <h4 class="title-2">Billing Details</h4>
                            <div class="ltn__checkout-single-content-info">
                                @php
                                    $user = auth()->user();
                                @endphp

                                <form action="{{ route('checkout.store') }}" id="checkout-form" method="POST">
                                    @csrf
                                    <h6>Personal Information</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="name" placeholder="First name"
                                                    value="{{ old('name', $user->name ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-email ltn__custom-icon">
                                                <input type="email" name="email" placeholder="Email address"
                                                    value="{{ old('email', $user->email ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                <input type="text" name="phone" placeholder="Phone number"
                                                    value="{{ old('phone', $user->phone ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-website ltn__custom-icon">
                                                <input type="text" name="company_name" placeholder="Company name (optional)"
                                                    value="{{ old('company_name', $user->company_name ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-item input-item-website ltn__custom-icon">
                                                <input type="text" name="company_address"
                                                    placeholder="Company address (optional)"
                                                    value="{{ old('company_address', $user->company_address ?? '') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-6">
                                            <h6>Country</h6>
                                            <div class="input-item">
                                                <select class="form-control" name="country">
                                                    <option value="">Select Country</option>
                                                    @foreach(['Australia', 'Canada', 'China', 'Morocco', 'Saudi Arabia', 'United Kingdom (UK)', 'US'] as $country)
                                                        <option value="{{ $country }}" {{ old('country', $user->country ?? '') == $country ? 'selected' : '' }}>{{ $country }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <h6>Address</h6>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-item">
                                                        <input type="text" name="address" placeholder="Address"
                                                            value="{{ old('address', $user->address ?? '') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-item">
                                                        <input type="text"
                                                            placeholder="Apartment, suite, unit etc. (optional)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <h6>Town / City</h6>
                                            <div class="input-item">
                                                <input type="text" name="city" placeholder="City"
                                                    value="{{ old('city', $user->city ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <h6>State</h6>
                                            <div class="input-item">
                                                <input type="text" name="state" placeholder="State"
                                                    value="{{ old('state', $user->state ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <h6>Zip</h6>
                                            <div class="input-item">
                                                <input type="text" name="zip" placeholder="Zip"
                                                    value="{{ old('zip', $user->zip ?? '') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <h6>Order Notes (optional)</h6>
                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <textarea name="order_notes"
                                            placeholder="Notes about your order, e.g. special notes for delivery.">{{ old('order_notes') }}</textarea>
                                    </div>

                                    {{-- <button type="button" class="btn btn-primary mt-3" onclick="submitCheckoutForm()">Place
                                        Order</button> --}}
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="shoping-cart-total mt-50">
                        <h4 class="title-2">Cart Totals</h4>
                        <table class="table">
                            <tbody>
                                @foreach ($cart as $key => $item)
                                    <tr>
                                        <td>Product : {{ $item->name }} | X {{ $item->quantity }}</td>
                                        <td>${{ number_format($item->price, 2) }}</td>
                                        <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>Shipping</td>
                                    <td></td>
                                    <td>${{ number_format($shipping, 2) }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Order Total</strong></td>
                                    <td></td>
                                    <td><strong>${{ number_format($grandTotal, 2) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <button onclick="submitCheckoutForm()"
                            class="btn theme-btn-1 btn-effect-1 text-uppercase my-checkout" type="submit">Place
                            order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function clearErrors(form) {
            form.querySelectorAll('.text-danger').forEach(el => el.remove());
            form.querySelectorAll('input, select, textarea').forEach(el => el.classList.remove('is-invalid'));
        }

        function showError(input, message) {
            alert(message); // 🔥 Show as alert instead of inline
            input.classList.add('is-invalid');
        }

        function validateCheckoutForm() {
            const form = document.getElementById('checkout-form');
            clearErrors(form);

            let valid = true;

            const fields = [
                { name: 'name', message: 'First name is required' },
                { name: 'email', message: 'Valid email is required', pattern: /^\S+@\S+\.\S+$/ },
                { name: 'phone', message: 'Phone number is required' },
                { name: 'country', message: 'Please select a country' },
                { name: 'address', message: 'Address is required' },
                { name: 'city', message: 'City is required' },
                { name: 'state', message: 'State is required' },
                { name: 'zip', message: 'ZIP is required' }
            ];

            for (const field of fields) {
                const input = form.querySelector(`[name="${field.name}"]`);
                if (!input) continue;

                const value = input.value.trim();
                const pattern = field.pattern;

                if (!value || (pattern && !pattern.test(value))) {
                    valid = false;
                    showError(input, field.message);
                    break; // ❗ Alert only the first error
                }
            }

            return valid;
        }

        function submitCheckoutForm() {
            if (validateCheckoutForm()) {
                document.getElementById('checkout-form').submit();
            }
        }

    </script>
    <style>
        .is-invalid {
            border-color: red !important;
        }

        .text-danger {
            font-size: 13px;
            margin-top: 4px;
            display: block;
        }
    </style>

@endsection
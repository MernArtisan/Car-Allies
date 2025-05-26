@extends('web.layouts.master')

@section('title', 'Order Details')

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

    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="order-info-card p-4 shadow-sm bg-white rounded mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="font-weight-bold">Order Details</h3>
                        <p class="text-dark">{{ $order->created_at->format('d M, Y') }} &nbsp;&nbsp; <span
                                class="order-id">Order ID: #{{ $order->orderId }}</span></p>
                                <a href="{{url()->previous()}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <table class="table table-borderless">
                        <thead class="table-light">
                            <tr>
                                <th>Product</th>
                                <th class="text-center">QTY</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td>
                                        @php
                                            $images = $item->product->images ?? collect();
                                            $primaryImage = $images->where('is_primary', 1)->first() ?? $images->first();
                                            $imageSrc = $primaryImage ? asset('uploads/productImages/' . $primaryImage->image) : asset('default.png');
                                        @endphp

                                        <div class="d-flex align-items-center">
                                            <img src="{{ $imageSrc }}" alt="Product Image" class="product-img mr-3"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                            <span class="product-name">{{ $item->product->name }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-center">${{ number_format($item->price, 2) }}</td>
                                    <td class="text-center font-weight-bold">
                                        ${{ number_format($item->price * $item->quantity, 2) }}</td>
                                </tr>                                                  
                            @endforeach


                        </tbody>
                    </table>
                </div>

                <div class="order-summary p-4 shadow-sm bg-white rounded">
                    <h4 class="font-weight-bold mb-3">Order Summary</h4>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total:</span>
                        <span>${{ number_format($order->orderItems->sum(fn($item) => $item->price * $item->quantity), 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Shipping:</span>
                        <span>${{ number_format($order->shipping_cost, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between font-weight-bold">
                        <span>SubTotal:</span>
                        <span class="text-primary">${{ number_format($order->grand_total, 2) }}</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="address-card p-4 shadow-sm bg-white rounded mb-4">
                    <h5 class="font-weight-bold">Shipping Address</h5>
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Phone:</strong> {{ $user->phone ?? 'No phone provided' }}</p>
                    <p><strong>Address:</strong> {{ $user->address ?? 'No address provided' }}</p>
                </div>
                <div class="payment-card p-4 shadow-sm bg-white rounded">
                    <p><strong>Store</strong>: {{$order->vendor->name}}:</p>
                    <img src="{{ asset('uploads/vendors/' . $order->vendor->image) }}" alt="Store Image"
                        style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">

                </div>
            </div>
        </div>
    </div>

    <style>
        .payment-card {
            border: 1px solid #e0e0e0;
            /* Light grey border */
            border-radius: 8px;
            /* Rounded corners */
        }

        .theme_btn {
            background-color: #000000;
            /* Bootstrap primary color */
            color: #ffffff;
            /* White text */
            padding: 8px 16px;
            /* Padding */
            border-radius: 4px;
            /* Rounded corners */
        }

        /* General Style */
        .order-details-section {
            background-color: #f9f9f9;
            padding: 50px 0;
        }

        .order-info-card,
        .order-summary,
        .address-card,
        .payment-card {
            border: 1px solid #ececec;
            border-radius: 8px;
        }

        /* Typography */
        h3,
        h4,
        h5 {
            font-family: 'Roboto', sans-serif;
            color: #333;
        }

        p {
            font-family: 'Open Sans', sans-serif;
            color: #555;
        }

        /* Product Table */
        .table {
            margin-bottom: 0;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .product-img {
            width: 50px;
            height: 50px;
            border-radius: 5px;
            object-fit: cover;
            margin-right: 15px;
        }

        .product-name {
            font-size: 14px;
            color: #333;
        }

        .text-primary {
            color: #007bff;
        }

        /* Badge */
        .badge-success {
            background-color: #28a745;
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 12px;
        }

        /* Shadows */
        .shadow-sm {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .order-info-card {
                margin-bottom: 20px;
            }

            .address-card,
            .payment-card {
                margin-bottom: 20px;
            }

            .invoice_heading {
                text-align: center;
                color: red;
            }
        }
    </style>
@endsection
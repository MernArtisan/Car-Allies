@extends('web.layouts.master')

@section('title', 'Cart')
@section('description', 'Your shopping cart with selected items')

@section('content')
    <div class="ltn__utilize-overlay"></div>

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
        data-bs-bg="web/img/bg/9.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// Welcome to our company</h6>
                            <h1 class="section-title white-color">Cart</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li>Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            background-color: #0b0b2b;
        }

        .cart-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
        }

        .cart-title {
            color: #fff;
            margin-bottom: 30px;
        }

        .custom-cart-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-cart-table th,
        .custom-cart-table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        .custom-cart-table thead {
            background-color: #f2f2f2;
            color: #333;
        }

        .cart-thumb {
            width: 70px;
            height: auto;
            border-radius: 5px;
        }

        .qty-form {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 29px;
        }

        .qty-btn {
            width: 32px;
            height: 32px;
            border: 1px solid #ccc;
            background: transparent;
            font-size: 18px;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
        }

        .qty-btn:hover {
            background-color: #f0f0f0;
        }

        .qty-input {
            width: 50px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
            background-color: #f9f9f9;
        }

        .remove-btn {
            color: #dc3545;
            font-size: 18px;
        }

        .remove-btn:hover {
            color: #a71d2a;
        }

        .summary-box {
            background: #f9f9f9;
            border-radius: 10px;
            padding: 25px;
            color: #333;
        }

        .summary-box h5 {
            margin-bottom: 20px;
            font-weight: bold;
        }

        .summary-box ul {
            padding: 0;
            list-style: none;
        }

        .summary-box li {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .summary-total {
            font-weight: bold;
            font-size: 20px;
        }

        .btn-checkout {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            width: 100%;
            margin-bottom: 10px;
        }

        .btn-checkout:hover {
            background-color: #0056b3;
        }

        .btn-continue {
            width: 100%;
            border: 1px solid #ccc;
            color: #333;
            background: white;
        }

        .btn-continue:hover {
            background-color: #f2f2f2;
        }

        @media (max-width: 768px) {

            .custom-cart-table th,
            .custom-cart-table td {
                font-size: 14px;
                padding: 10px;
            }

            .summary-box {
                margin-top: 30px;
            }
        }

        .rounded-3 {
            border-radius: var(--mdb-border-radius-lg) !important;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        img,
        svg {
            vertical-align: middle;
        }
    </style>

    <div class="container py-5">
        <h3 class="cart-title">My Cart <span class="">({{ $cart->count() }} items)</span></h3>

        <div class="row">
            <!-- Cart Items -->
            <div class="col-lg-8">
                <div class="cart-container">
                    <table class="custom-cart-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cart->sortKeys() as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset($item->attributes->image) }}" class="img-fluid rounded-3"
                                            alt="{{ $item->name }}">
                                    </td>
                                    <td><strong>{{ $item->name }}</strong></td>
                                    <td>
                                        <div class="qty-form" data-id="{{ $item->id }}" style="display: flex; align-items: center;">
                                            <button type="button"
                                                class="qty-btn decrease"
                                                style="margin-bottom: 31px;height: 47px;width: 40px; font-size: 22px; border: 1px solid #ccc; background: #eee;margin-left: 48px;">
                                                −
                                            </button>
                                    
                                            <input type="text"
                                                class="qty-input"
                                                value="{{ $item->quantity }}"
                                                min="1"
                                                readonly
                                                style="width: 100px;height: 48px; text-align: center; border: 1px solid #ccc; margin: 0 5px;margin-bottom: 31px;">
                                    
                                            <button type="button"
                                                class="qty-btn increase"
                                                style="margin-bottom: 31px;height: 47px;width: 40px; font-size: 22px; border: 1px solid #ccc; background: #eee;">
                                                +
                                            </button>
                                        </div>
                                    </td>
                                    
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td class="subtotal-amount">${{ number_format($item->price * $item->quantity, 2) }}</td>
                                    <td>
                                        <a href="{{ route('cart.remove', $item->id) }}" class="remove-btn" title="Remove">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-muted text-center">Your cart is empty.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Summary -->
            <div class="col-lg-4 mt-4 mt-lg-0">
                @php
                    $cart = \Cart::session(auth()->check() ? auth()->id() : session()->getId())->getContent();

                    $subtotal = $cart->sum(fn($item) => $item->price * $item->quantity);

                    $vendorIds = $cart->map(fn($item) => $item->associatedModel->vendor_id ?? null)->filter()->unique();

                    $shipping = \App\Models\Vendor::whereIn('id', $vendorIds)
                        ->with('shipping')
                        ->get()
                        ->sum(fn($vendor) => $vendor->shipping->shipping_cost ?? 0);

                    $grandTotal = $subtotal + $shipping;
                @endphp

                <div class="summary-box">
                    <h5 class="mb-3 text-dark">Order Summary</h5>

                    {{-- <ul class="list-unstyled mb-3 text-dark">
                        <li class="d-flex justify-content-between mb-2 text-dark">
                            <span>Subtotal</span>
                            <span>${{ number_format($subtotal, 2) }}</span>
                        </li>
                        <li class="d-flex justify-content-between mb-2 text-dark">
                            <span>Shipping</span>
                            <span>${{ number_format($shipping, 2) }}</span>
                        </li>
                        <li class="d-flex justify-content-between fw-bold fs-5 text-dark">
                            <span>Total</span>
                            <span>${{ number_format($grandTotal, 2) }}</span>
                        </li>
                    </ul> --}}
                    <ul class="list-unstyled mb-3 text-dark">
                        <li class="d-flex justify-content-between mb-2 text-dark">
                            <span>Subtotal</span>
                            <span class="subtotal-amount">${{ number_format($subtotal, 2) }}</span>
                        </li>
                        <li class="d-flex justify-content-between mb-2 text-dark">
                            <span>Shipping</span>
                            <span class="shipping-amount">${{ number_format($shipping, 2) }}</span>
                        </li>
                        <li class="d-flex justify-content-between fw-bold fs-5 text-dark">
                            <span>Total</span>
                            <span class="grandtotal-amount">${{ number_format($grandTotal, 2) }}</span>
                        </li>
                    </ul>


                    <a href="{{ url('/checkout') }}" class="btn btn-primary w-100 mb-2">PROCEED TO CHECKOUT</a>
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary w-100">CONTINUE SHOPPING</a>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.qty-btn').click(function () {
                let $row = $(this).closest('.qty-form');
                let id = $row.data('id');
                let type = $(this).hasClass('increase') ? 'increase' : 'decrease';

                $.ajax({
                    url: "{{ route('cart.update') }}",
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        type: type
                    },
                    success: function (res) {
                        if (res.success) {
                            // Update the quantity input
                            $row.find('.qty-input').val(res.qty);

                            // Update totals
                            $('.subtotal-amount').text(`$${res.subtotal}`);
                            $('.shipping-amount').text(`$${res.shipping}`);
                            $('.grandtotal-amount').text(`$${res.total}`);
                        } else {
                            alert(res.message || 'Something went wrong!');
                        }
                    }
                });
            });
        });
    </script>

@endsection
@extends('web.layouts.master')

@section('title', 'Account')

@section('content')
    <div class="ltn__utilize-overlay"></div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
        data-bs-bg="{{asset('web/img/bg/9.jpg')}}">
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

    <div class="container mb-4">
        <div class="page-content dashboard">
            <div class="container">
                <div class="row card-body">
                    @include('web.account.account-sidebar')
                    <div class="col-xl-9 col-lg-8 col-md-12">
                        <div class="tutor-dashboard-content">
                            <div class="tutor-dashboard-content-inner">

                                <div class="row">
                                    <div class="col-md-6 d-flex mb-3">
                                        <div class="card instructor-card w-100 shadow-lg">
                                            <div class="card-body d-flex align-items-center justify-content-center">
                                                <div class="instructor-inner text-center">
                                                    <div class="mb-3">
                                                        <i class="bi bi-bag-check-fill"
                                                            style="font-size: 40px; color: #0d6efd;"></i>
                                                    </div>
                                                    <h6 class="text-dark">Total Orders</h6>
                                                    <h3 class="text-primary fw-bold">{{ $orderCount }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 d-flex mb-3">
                                        <div class="card instructor-card w-100 shadow-lg">
                                            <div class="card-body d-flex align-items-center justify-content-center">
                                                <div class="instructor-inner text-center">
                                                    <div class="mb-3">
                                                        <i class="bi bi-calendar-check-fill"
                                                            style="font-size: 40px; color: #198754;"></i>
                                                    </div>
                                                    <h6 class="text-dark">Total Bookings</h6>
                                                    <h3 class="text-success fw-bold">{{ $BookingCount }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @if ($bookings->isNotEmpty())
                            <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Service</th>
                                        <th scope="col">Store</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Amount</th>
                                        {{-- <th scope="col">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->id }}</td>
                                            <td>{{ $booking->service->name }}</td>
                                            <td><span class="badge badge-success">{{ $booking->vendor->name }}</span></td>
                                            <td>{{ $booking->created_at->format('M-d-Y') }}</td>
                                            <td>
                                                @if ($booking->status == 'confirmed')
                                                    <span class="badge badge-warning">Confirmed</span>
                                                @else
                                                    <span class="badge badge-success">Completed</span>
                                                @endif
                                            </td>
                                            <td>${{ number_format($booking->service->price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-center">You haven't placed any orders yet.</p>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .dashboard-sec {
            background-color: #f9f9f9;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .sell-course-head h3 {
            color: #333;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .table {
            background-color: #fff;
            border-radius: 8px;
        }

        .badge {
            padding: 6px 12px;
            font-size: 14px;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-warning {
            background-color: #ffc107;
        }

        .badge-secondary {
            background-color: #6c757d;
        }
    </style>


@endsection
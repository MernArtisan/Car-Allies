@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('content')


    <div class="main-content">
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">Dashboard</h4>
                </li>
                <li class="breadcrumb-item">
                    <a href="index-2.html">
                        <i data-feather="home"></i></a>
                </li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ul>

            <div class="row">
                <!-- New Orders -->
                <div class="col-xl-3 col-lg-6">
                    <div class="card" style="background-color: #f5f5f5; border: 1px solid #dcdcdc;">
                        <div class="card-statistic-3" style="color: black;">
                            <div class="card-icon card-icon-large"><i class="fa fa-shopping-cart"></i></div>
                            <div class="card-content">
                                <h4 class="card-title" style="color: #353c48;">New Orders</h4>
                                <span style="color: black;">{{ $orders }}</span>
                                <div class="progress mt-1 mb-1" data-height="8">
                                    <div class="progress-bar" style="background-color: #6a1b9a;" role="progressbar"
                                        data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0 text-sm" style="color: black;">
                                    <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Orders -->
                <div class="col-xl-3 col-lg-6">
                    <div class="card" style="background-color: #f0f4f7; border: 1px solid #dcdcdc;">
                        <div class="card-statistic-3" style="color: black;">
                            <div class="card-icon card-icon-large"><i class="fa fa-file-invoice"></i></div>
                            <div class="card-content">
                                <h4 class="card-title" style="color: #353c48;">Total Orders</h4>
                                <span style="color: black;">{{ $totalOrders }}</span>
                                <div class="progress mt-1 mb-1" data-height="8">
                                    <div class="progress-bar" style="background-color: #ff8c00;" role="progressbar"
                                        data-width="50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0 text-sm" style="color: black;">
                                    <span class="mr-2"><i class="fa fa-arrow-up"></i> 15%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- New Booking -->
                <div class="col-xl-3 col-lg-6">
                    <div class="card" style="background-color: #e8f5e9; border: 1px solid #dcdcdc;">
                        <div class="card-statistic-3" style="color: black;">
                            <div class="card-icon card-icon-large"><i class="fa fa-calendar-check"></i></div>
                            <div class="card-content">
                                <h4 class="card-title" style="color: #353c48;">New Booking</h4>
                                <span style="color: black;">{{ $newBookings }}</span>
                                <div class="progress mt-1 mb-1" data-height="8">
                                    <div class="progress-bar" style="background-color: #4caf50;" role="progressbar"
                                        data-width="40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0 text-sm" style="color: black;">
                                    <span class="mr-2"><i class="fa fa-arrow-up"></i> 8%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Booking -->
                <div class="col-xl-3 col-lg-6">
                    <div class="card" style="background-color: #fff3e0; border: 1px solid #dcdcdc;">
                        <div class="card-statistic-3" style="color: black;">
                            <div class="card-icon card-icon-large"><i class="fa fa-book-open"></i></div>
                            <div class="card-content">
                                <h4 class="card-title" style="color: #353c48;">Total Booking</h4>
                                <span style="color: black;">{{ $totalBookings }}</span>
                                <div class="progress mt-1 mb-1" data-height="8">
                                    <div class="progress-bar" style="background-color: #ff9800;" role="progressbar"
                                        data-width="60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0 text-sm" style="color: black;">
                                    <span class="mr-2"><i class="fa fa-arrow-up"></i> 20%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Filter Form -->
                            <form id="filterForm" class="form-inline">
                                <div class="form-group">
                                    <label for="month" class="sr-only">Month</label>
                                    <select id="month" name="month" class="form-control">
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}" {{ $month == $i ? 'selected' : '' }}>
                                                {{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group mx-sm-3">
                                    <label for="year" class="sr-only">Year</label>
                                    <select id="year" name="year" class="form-control">
                                        @for ($i = date('Y'); $i >= 2000; $i--)
                                            <option value="{{ $i }}" {{ $year == $i ? 'selected' : '' }}>
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Filter</button>  ||
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-dark mb-2">Reset</a>
                            </form>

                            <!-- Chart Canvas -->
                            <canvas id="revenueChart" width="400" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            @if (Auth::user()->hasRole('admin'))
                <div class="row">
                    <!-- Store -->
                    <div class="col-xl-3 col-lg-6">
                        <div class="card" style="background-color: #f3e5f5; border: 1px solid #dcdcdc;">
                            <div class="card-statistic-3" style="color: black;">
                                <div class="card-icon card-icon-large"><i class="fa fa-store"></i></div>
                                <div class="card-content">
                                    <h4 class="card-title" style="color: #353c48;">Store</h4>
                                    <span style="color: black;">{{ $activeVendors }}</span>
                                    <div class="progress mt-1 mb-1" data-height="8">
                                        <div class="progress-bar" style="background-color: #9c27b0;" role="progressbar"
                                            data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <p class="mb-0 text-sm" style="color: black;">
                                        <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Customer -->
                    <div class="col-xl-3 col-lg-6">
                        <div class="card" style="background-color: #e3f2fd; border: 1px solid #dcdcdc;">
                            <div class="card-statistic-3" style="color: black;">
                                <div class="card-icon card-icon-large"><i class="fa fa-users"></i></div>
                                <div class="card-content">
                                    <h4 class="card-title" style="color: #353c48;">Customer</h4>
                                    <span style="color: black;">{{ $customers }}</span>
                                    <div class="progress mt-1 mb-1" data-height="8">
                                        <div class="progress-bar" style="background-color: #2196f3;" role="progressbar"
                                            data-width="%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <p class="mb-0 text-sm" style="color: black;">
                                        <span class="mr-2"><i class="fa fa-arrow-up"></i> 1%</span>
                                        <span class="text-nowrap">Order & Bookings</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Inquiry -->
                    <div class="col-xl-3 col-lg-6">
                        <div class="card" style="background-color: #e0f7fa; border: 1px solid #dcdcdc;">
                            <div class="card-statistic-3" style="color: black;">
                                <div class="card-icon card-icon-large"><i class="fa fa-question-circle"></i></div>
                                <div class="card-content">
                                    <h4 class="card-title" style="color: #353c48;">Inquiry</h4>
                                    <span style="color: black;">{{$contacts}}</span>
                                    <div class="progress mt-1 mb-1" data-height="8">
                                        <div class="progress-bar" style="background-color: #00bcd4;" role="progressbar"
                                            data-width="30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <p class="mb-0 text-sm" style="color: black;">
                                        <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earning -->
                    <div class="col-xl-3 col-lg-6">
                        <div class="card" style="background-color: #f1f8e9; border: 1px solid #dcdcdc;">
                            <div class="card-statistic-3" style="color: black;">
                                <div class="card-icon card-icon-large"><i class="fa fa-money-bill"></i></div>
                                <div class="card-content">
                                    <h4 class="card-title" style="color: #353c48;">Earning</h4>
                                    <span style="color: black;">${{$totalAmount}}</span>
                                    <div class="progress mt-1 mb-1" data-height="8">
                                        <div class="progress-bar" style="background-color: #8bc34a;" role="progressbar"
                                            data-width="70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <p class="mb-0 text-sm" style="color: black;">
                                        <span class="mr-2"><i class="fa fa-arrow-up"></i> 20%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </section>
    </div>

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('revenueChart').getContext('2d');
        var revenueChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @if (Auth::user()->hasRole('vendor'))
                        '{{ $vendorName }} Revenue',
                        'Car Allies Commission'
                    @else
                        'Car Allies Commission',
                        'Vendors Commission'
                    @endif
                ],
                datasets: [{
                    label: 'Revenue',
                    data: [
                        @if (Auth::user()->hasRole('vendor'))
                            {{ $vendorCommission }},
                            {{ $carAlliesCommission }}
                        @else
                            {{ $platformCommission }},
                            {{ $vendorsRevenue }}
                        @endif
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)', // Blue for Commission
                        'rgba(75, 192, 192, 0.2)' // Green for Commission
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)',
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 14
                        },
                        footerFont: {
                            size: 14
                        }
                    }
                }
            }
        });

        // Form submission to filter data
        document.getElementById('filterForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var month = document.getElementById('month').value;
            var year = document.getElementById('year').value;
            window.location.href = "{{ route('admin.dashboard') }}?month=" + month + "&year=" + year;
        });
    </script>
@endsection

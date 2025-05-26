@extends('admin.layouts.master')
@section('title', 'Booking Management')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Booking Management</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Filter Form -->
                                <form id="filterForm">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <!-- Status filter for both admin and vendor -->
                                            <select name="status" id="statusFilter" class="form-control">
                                                <option value="">Select Status</option>
                                                {{-- <option value="pending">Pending</option> --}}
                                                <option value="confirmed">Confirmed</option>
                                                {{-- <option value="cancelled">Cancelled</option> --}}
                                                <option value="completed">Completed</option>
                                            </select>
                                        </div>

                                        @if (Auth::user()->hasRole('admin'))
                                            <!-- Vendor filter for admin only -->
                                            <div class="col-md-5">
                                                <select name="vendor" id="vendorFilter" class="form-control">
                                                    <option value="">Select Vendor</option>
                                                    @foreach ($vendors as $vendor)
                                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif

                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary">Apply</button>
                                            <a href="{{route('admin.bookings.index')}}" class="btn btn-dark">Reset</a>
                                        </div>
                                    </div>
                                </form>

                                <!-- End Filter Form -->

                                <div class="table-responsive mt-3">
                                    <table class="table table-striped" id="bookingsTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Customer</th>
                                                <th>Vendor</th>
                                                <th>Service Name</th>
                                                <th>Availability</th>
                                                <th>Date</th>
                                                <th>Note</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @include('admin.booking.partials.booking_rows', ['bookings' => $bookings])
                                        </tbody>
                                    </table>
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
    <script>
        document.getElementById('filterForm').addEventListener('submit', function (e) {
            e.preventDefault();
            filterBookings();
        });

        document.getElementById('resetFilter').addEventListener('click', function () {
            document.getElementById('statusFilter').value = '';
            document.getElementById('vendorFilter').value = '';
            filterBookings();
        });

        function filterBookings() {
            const status = document.getElementById('statusFilter').value;
            const vendor = document.getElementById('vendorFilter')?.value ?? '';

            fetch(`{{ route('admin.bookings.index') }}?status=${status}&vendor=${vendor}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest' // tell Laravel this is AJAX
                }
            })
                .then(response => response.text())
                .then(data => {
                    document.querySelector('#bookingsTable tbody').innerHTML = data;
                });
        }

    </script>
@endsection
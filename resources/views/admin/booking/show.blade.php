@extends('admin.layouts.master')
@section('title', 'Booking Details')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Booking Details</h4>
                                <a href="{{ route('admin.bookings.index') }}" class="btn btn-dark">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="row g-5 gy-7">
                <!-- Left Column: Booking Details -->
                <div class="col-12 col-xl-8 col-xxl-9">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Booking Information</h5>
                            <div class="row">
                                <!-- Customer Details -->
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <h6>Customer Details</h6>
                                        <p><strong>Name:</strong> {{ $booking->user->name ?? 'N/A' }}</p>
                                        <p><strong>Email:</strong> {{ $booking->user->email ?? 'N/A' }}</p>
                                        <p><strong>Phone:</strong> {{ $booking->user->phone ?? 'N/A' }}</p>
                                    </div>
                                </div>

                                <!-- Vendor Details -->
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <h6>Vendor Details</h6>
                                        <p><strong>Name:</strong> {{ $booking->vendor->name ?? 'N/A' }}</p>
                                        <p><strong>Email:</strong> {{ $booking->vendor->email ?? 'N/A' }}</p>
                                        <p><strong>Phone:</strong> {{ $booking->vendor->phone ?? 'N/A' }}</p>
                                    </div>
                                </div>

                                <!-- Service Details -->
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <h6>Service Details</h6>
                                        <p><strong>Service Name:</strong> {{ $booking->service->name ?? 'N/A' }}</p>
                                        <p><strong>Date:</strong> {{ $booking->date ?? 'N/A' }}</p>
                                        <p><strong>Time Slot:</strong>
                                            {{ $booking->availability->time_slot 
                                                ? \Carbon\Carbon::parse($booking->availability->time_slot)->format('Y-m-d h:i A') 
                                                : 'N/A' }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Additional Notes -->
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <h6>Additional Notes</h6>
                                        <p>{{ $booking->note ?? 'No notes provided.' }}</p>
                                    </div>
                                </div>

                                <!-- Status Update -->
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <h6>Booking Status</h6>
                                        @if($booking->status == 'completed' || auth()->user()->hasRole('admin'))
                                            <!-- Show Status Only (Readonly) -->
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="{{ ucfirst($booking->status) }}" readonly>
                                            </div>
                                        @elseif(auth()->user()->hasRole('vendor'))
                                            <!-- Vendor: Allow Status Change -->
                                            <form id="updateStatusForm" method="POST" action="{{ route('admin.bookings.update-status', $booking->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <select name="status" class="form-control" onchange="updateStatus(this)">
                                                        {{-- <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option> --}}
                                                        <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                                        {{-- <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option> --}}
                                                        <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                    </select>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Customer and Vendor Details -->
                <div class="col-12 col-xl-4 col-xxl-3">
                    <div class="row">
                        <!-- Customer Details Card -->
                        <div class="col-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Customer Details</h5>
                                    <p><strong>Name:</strong> {{ $booking->user->name ?? 'N/A' }}</p>
                                    <p><strong>Email:</strong> {{ $booking->user->email ?? 'N/A' }}</p>
                                    <p><strong>Phone:</strong> {{ $booking->user->phone ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Vendor Details Card -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Vendor Details</h5>
                                    <p><strong>Name:</strong> {{ $booking->vendor->name ?? 'N/A' }}</p>
                                    <p><strong>Email:</strong> {{ $booking->vendor->email ?? 'N/A' }}</p>
                                    <p><strong>Phone:</strong> {{ $booking->vendor->phone ?? 'N/A' }}</p>
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
    function updateStatus(selectElement) {
        if (confirm('Are you sure you want to update the status?')) {
            document.getElementById('updateStatusForm').submit();
        } else {
            // Reset the select element to its previous value
            selectElement.value = '{{ $booking->status }}';
        }
    }
</script>
@endsection
@extends('admin.layouts.master')
@section('title', 'Payment List')

@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Payment List</h4>
                                {{-- <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                    data-target="#createpermission">
                                    <i class="fas fa-key"></i> + Create New Permission
                                </button> --}}
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
                                <form method="GET" class="row mb-3">
                                    <input type="hidden" name="tab" value="{{ $tab }}">
                                
                                    <div class="col-md-3">
                                        <label>From</label>
                                        <input type="date" name="from" class="form-control" value="{{ $from }}">
                                    </div>
                                
                                    <div class="col-md-3">
                                        <label>To</label>
                                        <input type="date" name="to" class="form-control" value="{{ $to }}">
                                    </div>
                                
                                    @if(Auth::user()->hasRole('admin'))
                                        <div class="col-md-3">
                                            <label>Vendor</label>
                                            <select name="vendor_id" class="form-control">
                                                <option value="">All Vendors</option>
                                                @foreach($vendors as $id => $name)
                                                    <option value="{{ $id }}" {{ $vendorFilter == $id ? 'selected' : '' }}>{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                
                                    <div class="col-md-1 d-flex align-items-end" style="margin-bottom:4px">
                                        <button type="submit" class="btn btn-primary w-40">Filter</button>
                                        &nbsp;
                                        <a href="{{ route('admin.payments') }}" class="btn btn-dark w-40">Reset</a>
                                    </div>
                                </form>
                                

                                <ul class="nav nav-tabs" id="paymentTabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link {{ $tab == 'orders' ? 'active' : '' }}" id="orders-tab" data-toggle="tab" href="#orders"
                                            role="tab" onclick="switchTab('orders')">Order Payments</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $tab == 'bookings' ? 'active' : '' }}" id="bookings-tab" data-toggle="tab" href="#bookings"
                                            role="tab" onclick="switchTab('bookings')">Booking Payments</a>
                                    </li>
                                </ul>
                                
                                <div class="tab-content mt-3">
                                    <div class="tab-pane fade {{ $tab == 'orders' ? 'show active' : '' }}" id="orders" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-2">
                                                <thead>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Customer</th>
                                                        @if(Auth::user()->hasRole('admin'))
                                                            <th>Vendor</th>
                                                        @endif
                                                        <th>SubTotal</th>
                                                        <th>platformCommission</th>
                                                        <th>Grand Total</th>
                                                        <th>Order Status</th>
                                                        @if(Auth::user()->hasRole('admin'))
                                                        <th>Actions</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orderPayments as $key => $payment)
                                                        <tr>
                                                            <td>{{ $payment->order->orderId }}</td>
                                                            <td>{{ $payment->user->name ?? '-' }}</td>
                                                            @if(Auth::user()->hasRole('admin'))
                                                                <td>{{ $payment->vendor->name ?? '-' }}</td>
                                                            @endif
                                                            <td>${{ $payment->order->grand_total }}</td>
                                                            <td>${{ number_format($payment->order->grand_total * 0.15, 2) }}
                                                            </td>
                                                            <td>${{ number_format($payment->order->grand_total * 0.85, 2) }}
                                                            </td>
                                                            <td>
                                                                @if ($payment->order->status == 'in-progress')
                                                                    <button class="btn btn-sm btn-warning">In Progress</button>
                                                                @elseif($payment->order->status == 'packing')
                                                                    <button class="btn btn-sm btn-dark">Packing</button>
                                                                @elseif($payment->order->status == 'ready to deliver')
                                                                    <button class="btn btn-sm btn-info">Ready To Deliver</button>
                                                                @elseif($payment->order->status == 'delivered')
                                                                    <button class="btn btn-sm btn-primary">Delivered</button>
                                                                @elseif($payment->order->status == 'completed')
                                                                    <button class="btn btn-sm btn-success">Completed</button>
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>
                                                            @if(Auth::user()->hasRole('admin'))
                                                            <td>
                                                                @if ($payment->vendor_pay_status == 'pending' && optional($payment->order)->status == 'completed')
                                                                    <form
                                                                        action="{{ route('admin.payments.markPaid', $payment->id) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('Are you sure to mark this as paid?')">
                                                                        @csrf
                                                                        <button class="btn btn-dark btn-sm">Mark As Paid</button>
                                                                    </form>
                                                                @elseif ($payment->vendor_pay_status == 'paid')
                                                                    <span class="badge badge-success">Paid</span>
                                                                @else
                                                                    <span class="badge badge-warning">Not Complete</span>
                                                                @endif
                                                            </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                
                                    <div class="tab-pane fade {{ $tab == 'bookings' ? 'show active' : '' }}" id="bookings" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th>Booking ID</th>
                                                        <th>Customer</th>
                                                        @if(Auth::user()->hasRole('admin'))
                                                            <th>Vendor</th>
                                                        @endif
                                                        <th>Service Name</th>
                                                        <th>Price</th>
                                                        <th>Time</th>
                                                        <th>Status</th>
                                                        @if(Auth::user()->hasRole('admin'))
                                                            <th>Actions</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($bookingPayments as $key => $payment)
                                                        <tr>
                                                            <td>{{ $payment->booking->id }}</td>
                                                            <td>{{ $payment->user->name ?? '-' }}</td>
                                                            @if(Auth::user()->hasRole('admin'))
                                                                <td>{{ $payment->vendor->name ?? '-' }}</td>
                                                            @endif
                                                            <td>{{ $payment->booking->service->name ?? '-' }}</td>
                                                            <td>${{ $payment->booking->service->price ?? '-' }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($payment->booking->availability->time_slot)->format('Y-m-d h:i A') }}
                                                            </td>
                                                            <td>
                                                                @if ($payment->booking->status == 'confirmed')
                                                                    <button class="btn btn-sm btn-warning">Confirmed</button>
                                                                @elseif($payment->booking->status == 'cancelled')
                                                                    <button class="btn btn-sm btn-dark">Cancelled</button>
                                                                @elseif($payment->booking->status == 'completed')
                                                                    <button class="btn btn-sm btn-success">Completed</button>
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>
                                                            </td>

                                                            @if(Auth::user()->hasRole('admin'))
                                                            <td>
                                                                @if ($payment->vendor_pay_status == 'pending' && optional($payment->booking)->status == 'completed')
                                                                    <form
                                                                        action="{{ route('admin.payments.markPaid', $payment->id) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('Are you sure to mark this as paid?')">
                                                                        @csrf
                                                                        <button class="btn btn-dark btn-sm">Mark As Paid</button>
                                                                    </form>
                                                                @elseif ($payment->vendor_pay_status == 'paid')
                                                                    <span class="badge badge-success">Paid</span>
                                                                @else
                                                                    <span class="badge badge-warning">Not Complete</span>
                                                                @endif
                                                            </td>
                                                            @endif

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
    function switchTab(tab) {
        document.querySelector('input[name="tab"]').value = tab;
    }
</script>
@endsection
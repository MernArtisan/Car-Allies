@extends('admin.layouts.master')
@section('title', 'Order Management')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Order Management</h4>
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
                                <form method="GET" action="{{ route('admin.orders.index') }}">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <select name="status" id="statusFilter" class="form-control">
                                                <option value="">Select Status</option>
                                                <option value="in-progress" {{ request('status') == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                                                <option value="packing" {{ request('status') == 'packing' ? 'selected' : '' }}>Packing</option>
                                                <option value="ready to deliver" {{ request('status') == 'ready to deliver' ? 'selected' : '' }}>Ready to Deliver</option>
                                                <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                            </select>
                                        </div>
                                        @if (Auth::user()->hasRole('admin'))
                                        <div class="col-md-5">
                                            <select name="vendor" id="vendorFilter" class="form-control">
                                                <option value="">Select Vendor</option>
                                                @foreach ($vendors as $vendor)
                                                    <option value="{{ $vendor->id }}" {{ request('vendor') == $vendor->id ? 'selected' : '' }}>
                                                        {{ $vendor->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary">Apply</button>
                                        
                                            <!-- Reset button -->
                                            <a href="{{ route('admin.orders.index') }}" class="btn btn-dark">Reset</a>
                                        </div>
                                    </div>
                                </form>
                                
                                <!-- End Filter Form -->

                                <div class="table-responsive mt-3">
                                    <table class="table table-striped" id="tableExport">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Product Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Country</th>
                                                <th>Vendor</th>
                                                <th>Status</th>
                                                <th>Created Date</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $order)
                                                <tr>
                                                    <td>{{ $order->orderId ?? 'N/A' }}</td>
                                                    <td>{{ $order->name ?? 'N/A' }}</td>
                                                    <td>{{ $order->email ?? 'N/A' }}</td>
                                                    <td>{{ $order->phone ?? 'N/A' }}</td>
                                                    <td>{{ $order->country ?? 'N/A' }}</td>
                                                    <td>{{ $order->vendor->name ?? 'N/A' }}</td>
                                                    <td>
                                                        @if ($order->status == 'in-progress')
                                                            <button class="btn btn-sm btn-warning">In Progress</button>
                                                        @elseif($order->status == 'packing')
                                                            <button class="btn btn-sm btn-dark">Packing</button>
                                                        @elseif($order->status == 'ready to deliver')
                                                            <button class="btn btn-sm btn-info">Ready To Deliver</button>
                                                        @elseif($order->status == 'delivered')
                                                            <button class="btn btn-sm btn-primary">Delivered</button>
                                                        @elseif($order->status == 'completed')
                                                            <button class="btn btn-sm btn-success">Completed</button>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('admin.orders.show', $order->id) }}"
                                                            class="btn btn-dark btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9" class="text-center">No orders found</td>
                                                </tr>
                                            @endforelse
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


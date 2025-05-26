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
                                <h4 class="page-title m-b-0">
                                    Order #{{ $order->orderId }}
                                </h4>
                                <a href="{{ route('admin.orders.index') }}" class="btn btn-dark">
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
                <div class="col-12 col-xl-8 col-xxl-9">
                    <div class="card">
                        <div class="card-body">
                            <div id="orderTable">
                                <div class="table-responsive scrollbar">
                                    <table class="table fs-9 mb-0 border-top border-translucent">
                                        <thead>
                                            <tr>
                                                <th class="sort white-space-nowrap align-middle fs-10" scope="col">Image
                                                </th>
                                                <th class="sort white-space-nowrap align-middle" scope="col"
                                                    style="min-width:300px;" data-sort="products">PRODUCTS</th>
                                                <th class="sort align-middle ps-4" scope="col" data-sort="size"
                                                    style="width:300px;">ORDER ID</th>
                                                <th class="sort align-middle text-end ps-4" scope="col" data-sort="price"
                                                    style="width:150px;">PRICE</th>
                                                <th class="sort align-middle text-end ps-4" scope="col"
                                                    data-sort="quantity" style="width:200px;">QUANTITY</th>
                                                <th class="sort align-middle text-end ps-4" scope="col" data-sort="total"
                                                    style="width:250px;">TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list" id="order-table-body">

                                            @foreach ($order->orderItems as $item)
                                                @php
                                                    // Fixing the variable name to reference $item instead of $orderItem
                                                    $product = $item ? $item->product : null;
                                                    $primaryImage = $product ? $product->images->first() : null;
                                                @endphp
                                                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                                    <td class="align-middle white-space-nowrap py-2">
                                                        <a class="d-block border border-translucent rounded-2"
                                                            href="#">
                                                            <img src="{{ $primaryImage ? asset('uploads/productImages/' . $primaryImage->image) : asset('default.png') }}"
                                                                alt="{{ $item->product->name }}" width="53">
                                                        </a>
                                                    </td>
                                                    <td class="products align-middle py-0">
                                                        {{ $item->product->name }}
                                                    </td>
                                                    <td
                                                        class="size align-middle white-space-nowrap text-body-tertiary fw-semibold py-0 ps-4">
                                                        {{ $order->orderId }}
                                                    </td>
                                                    <td class="price align-middle text-body fw-semibold text-end py-0 ps-4">
                                                        ${{ $item->product->price }}
                                                    </td>
                                                    <td class="quantity align-middle text-end py-0 ps-4 text-body-tertiary">
                                                        {{ $item->quantity }}
                                                    </td>
                                                    <td
                                                        class="total align-middle fw-bold text-body-highlight text-end py-0 ps-4">
                                                        ${{ $item->quantity * $item->product->price }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-between align-items-center py-3 border-bottom mb-4 ml-3"
                                        style="margin-right: 49px;">
                                        <h5 class="text-dark fw-semibold">Sub Total:</h5>
                                        <h5 class="text-dark fw-bold">
                                            ${{ $order->orderItems->sum(function ($item) {
                                                return $item->product->price * $item->quantity;
                                            }) }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-sm rounded-lg text-dark">
                        <div class="card-body">
                            <div class="row gx-5 gy-4">
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <h4 class="text-dark mb-4">Billing Details</h4>
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="feather feather-user me-2 text-secondary"></i>
                                        <h6 class="mb-0">Customer</h6>
                                    </div>
                                    <a href="#" class="d-block text-muted">{{ $order->name ?? 'N/A' }}</a>

                                    <div class="d-flex align-items-center mt-3 mb-2">
                                        <i class="feather feather-mail me-2 text-secondary"></i>
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <a href="mailto:shatinon@jeemail.com"
                                        class="d-block text-muted">{{ $order->email ?? 'N/A' }}</a>

                                    <div class="d-flex align-items-center mt-3 mb-2">
                                        <i class="feather feather-home me-2 text-secondary"></i>
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <p class="text-muted">{{ $order->address ?? 'N/A' }}</p>

                                    <div class="d-flex align-items-center mt-3 mb-2">
                                        <i class="feather feather-phone me-2 text-secondary"></i>
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <a href="tel:+1234567890" class="d-block text-muted">{{ $order->phone ?? 'N/A' }}</a>
                                </div>

                                <div class="col-12 col-sm-6 col-lg-4">
                                    <h4 class="text-dark mb-4">Shipping Details</h4>
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="feather feather-mail me-2 text-secondary"></i>
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <a href="mailto:shatinon@jeemail.com"
                                        class="d-block text-muted">{{ $order->email ?? 'N/A' }}</a>

                                    <div class="d-flex align-items-center mt-3 mb-2">
                                        <i class="feather feather-phone me-2 text-secondary"></i>
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <a href="tel:+1234567890" class="d-block text-muted">{{ $order->phone ?? 'N/A' }}</a>

                                    <div class="d-flex align-items-center mt-3 mb-2">
                                        <i class="feather feather-home me-2 text-secondary"></i>
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <p class="text-muted mb-0">{{ $order->address ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-xl-4 col-xxl-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title mb-4">Summary</h3>
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-body fw-semibold">Items subtotal :</p>
                                            <p class="text-body-emphasis fw-semibold">
                                                ${{ $order->orderItems->sum(function ($item) {
                                                    return $item->product->price * $item->quantity;
                                                }) }}
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-body fw-semibold">Discount :</p>
                                            <p class="text-danger fw-semibold">$0.00</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-body fw-semibold">Tax :</p>
                                            <p class="text-body-emphasis fw-semibold">$0.00</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-body fw-semibold">Subtotal :</p>
                                            <p class="text-body-emphasis fw-semibold">
                                                ${{ $order->orderItems->sum(function ($item) {
                                                    return $item->product->price * $item->quantity;
                                                }) }}
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-body fw-semibold">Shipping Cost :</p>
                                            <p class="text-body-emphasis fw-semibold">
                                                ${{ $order->shipping_cost ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between border-top border-translucent border-dashed pt-4">
                                        <h4 class="mb-0">Total :</h4>
                                        <h4 class="mb-0">
                                            ${{ $order->grand_total ?? 'N/A' }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body" style="height: 313px">
                                    <h3 class="card-title mb-4">Order Status</h3>
                                    <h6 class="mb-2">Payment status</h6>
                                    <p class="text-success fw-bold">Paid</p>
                                    <h6 class="mb-2">Order Status</h6>

                                    @if ($order->status == 'completed')
                                        <p class="text-success fw-bold">Completed</p>
                                    @else
                                        <form action="{{ route('admin.order.updateStatus', $order->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')

                                            <select class="form-control mb-4" name="status" aria-label="delivery type"
                                                @if (Auth::user()->hasRole('admin')) disabled @endif>
                                                <option value="completed"
                                                    {{ $order->status == 'completed' ? 'selected' : '' }}>Completed
                                                </option>
                                                <option value="in-progress"
                                                    {{ $order->status == 'in-progress' ? 'selected' : '' }}>In Progress
                                                </option>
                                                <option value="ready to deliver"
                                                    {{ $order->status == 'ready to deliver' ? 'selected' : '' }}>Ready to
                                                    Deliver</option>
                                                <option value="packing"
                                                    {{ $order->status == 'packing' ? 'selected' : '' }}>Packing</option>
                                                <option value="delivered"
                                                    {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered
                                                </option>
                                            </select>

                                            @if (Auth::user()->hasRole('vendor'))
                                                <button type="submit" class="btn btn-primary">Update Status</button>
                                            @endif
                                        </form>
                                    @endif
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

@endsection

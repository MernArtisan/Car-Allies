@extends('admin.layouts.master')
@section('title', 'Product Management')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Product: {{ $product->name ?? '' }}</h4>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-dark">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="section-body">
                <div class="row">

                    @if (auth()->user()->hasRole('admin'))
                        <!-- Admin ke liye dono sections -->
                        <div class="col-6">
                            <div class="card mb-4 shadow-sm"> <!-- Added shadow for better depth -->
                                <div class="card-body">
                                    <h5 class="card-title mb-4">
                                        <i class="fas fa-info-circle"></i> <!-- Added icon -->
                                        Product Details
                                    </h5>
                                    <ul class="list-group list-group-flush">
                                        <!-- Name -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-tag mr-2"></i>Name:</strong></span>
                                            <span>{{ $product->name }}</span>
                                        </li>
                        
                                        <!-- Category -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-layer-group mr-2"></i>Category:</strong></span>
                                            <span>{{ $product->category->name }}</span>
                                        </li>
                        
                                        <!-- Price -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-dollar-sign mr-2"></i>Price:</strong></span>
                                            <span>${{ number_format($product->price, 2) }}</span>
                                        </li>
                        
                                        <!-- Quantity -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-boxes mr-2"></i>Quantity:</strong></span>
                                            <span>{{ $product->qty }}</span>
                                        </li>
                        
                                        <!-- SKU -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-barcode mr-2"></i>SKU:</strong></span>
                                            <span>{{ $product->sku }}</span>
                                        </li>
                        
                                        <!-- Shipping Price -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-shipping-fast mr-2"></i>Shipping Price:</strong></span>
                                            <span>${{ number_format($product->shipping_price, 2) }}</span>
                                        </li>
                        
                                        <!-- Estimated Time -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-clock mr-2"></i>Estimated Time:</strong></span>
                                            <span>{{ $product->estimated_time }}</span>
                                        </li>
                        
                                        <!-- Status -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-check-circle mr-2"></i>Status:</strong></span>
                                            <span class="badge {{ $product->status ? 'badge-success' : 'badge-danger' }}">
                                                {{ $product->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </li>
                        
                                        <!-- Created Date -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-calendar-alt mr-2"></i>Created Date:</strong></span>
                                            <span>{{ $product->created_at->format('Y-m-d') }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Vendor Information</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item text-center">
                                            <strong>Vendor Logo:</strong>
                                            <a href="{{ asset('uploads/vendors/' . $product->vendor->image) }}"
                                                target="_blank">
                                                <img src="{{ asset('uploads/vendors/' . $product->vendor->image) }}"
                                                    alt="Vendor Logo"
                                                    style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%; border: 2px solid #ddd;">
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Vendor Name:</strong> {{ $product->vendor->name }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Location:</strong> {{ $product->vendor->location }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Established Since:</strong> {{ $product->vendor->establish_since }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Description:</strong> {{ $product->vendor->description }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @elseif (auth()->user()->hasRole('vendor'))
                        <!-- Vendor ke liye sirf product details -->
                        <div class="col-12">
                            <div class="card mb-4 shadow-sm"> <!-- Added shadow for better depth -->
                                <div class="card-body">
                                    <h5 class="card-title mb-4">
                                        <i class="fas fa-info-circle"></i> <!-- Added icon -->
                                        Product Details
                                    </h5>
                                    <ul class="list-group list-group-flush">
                                        <!-- Name -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-tag mr-2"></i>Name:</strong></span>
                                            <span>{{ $product->name }}</span>
                                        </li>
                        
                                        <!-- Category -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-layer-group mr-2"></i>Category:</strong></span>
                                            <span>{{ $product->category->name }}</span>
                                        </li>
                        
                                        <!-- Price -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-dollar-sign mr-2"></i>Price:</strong></span>
                                            <span>${{ number_format($product->price, 2) }}</span>
                                        </li>
                        
                                        <!-- Quantity -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-boxes mr-2"></i>Quantity:</strong></span>
                                            <span>{{ $product->qty }}</span>
                                        </li>
                        
                                        <!-- SKU -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-barcode mr-2"></i>SKU:</strong></span>
                                            <span>{{ $product->sku }}</span>
                                        </li>
                        
                                        <!-- Shipping Price -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-shipping-fast mr-2"></i>Shipping Price:</strong></span>
                                            <span>${{ number_format($product->shipping_price, 2) }}</span>
                                        </li>
                        
                                        <!-- Estimated Time -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-clock mr-2"></i>Estimated Time:</strong></span>
                                            <span>{{ $product->estimated_time }}</span>
                                        </li>
                        
                                        <!-- Status -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-check-circle mr-2"></i>Status:</strong></span>
                                            <span class="badge {{ $product->status ? 'badge-success' : 'badge-danger' }}">
                                                {{ $product->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </li>
                        
                                        <!-- Created Date -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span><strong><i class="fas fa-calendar-alt mr-2"></i>Created Date:</strong></span>
                                            <span>{{ $product->created_at->format('Y-m-d') }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif


                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body" style="height: 401px">
                                <h5 class="card-title">Description</h5>
                                <p>{!! $product->description !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Product Images</h5>
                                <div id="productImagesCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($product->images as $index => $image)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <img src="{{ asset('uploads/productImages/' . $image->image) }}"
                                                    class="d-block w-100 img-fluid rounded" alt="Product Image"
                                                    style="height: 326px; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#productImagesCarousel" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#productImagesCarousel" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    <style>
                                        .carousel-control-prev-icon,
                                        .carousel-control-next-icon {
                                            background-color: black;
                                            border-radius: 50%;
                                            width: 40px;
                                            height: 40px;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-dark">Product Reviews</h5>
                                <div class="reviews-container" style="max-height: 400px; overflow-y: auto;">
                                    @forelse ($product->reviews as $review)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h6 class="card-subtitle mb-2 text-dark">{{ $review->user->name }}</h6>
                                                <!-- Corrected image source with fallback -->
                                                <img src="{{ $review->user->image ? asset('uploads/profileImage/' . $review->user->image) : asset('default.png') }}"
                                                    alt="Profile Image"
                                                    style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                                                <p class="card-text">{{ $review->review }}</p>

                                                <p class="card-text">
                                                    Rating:
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $review->rating)
                                                            <i class="fas fa-star text-warning"></i>
                                                        @else
                                                            <i class="far fa-star text-warning"></i>
                                                        @endif
                                                    @endfor
                                                </p>
                                            </div>
                                        </div>
                                    @empty
                                    <p>No reviews found for this product.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
    </div>
@endsection

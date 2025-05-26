@extends('web.layouts.master')

@section('title', 'Home')
@section('description', 'Lorem Ipsum')

@section('content')

    <div class="ltn__utilize-overlay"></div>

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image plr--9"
        data-bs-bg="{{ asset('web/img/bg/9.jpg') }}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// Car Allies</h6>
                            <h1 class="section-title white-color">{{ $vendor->name }}</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li>Store</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-2 mb-100" id="main-content-col">
                    <div class="ltn__shop-options">
                        <ul>
                            <li>
                                <div class="ltn__grid-list-tab-menu">
                                    <div class="nav">
                                        <a class="{{ request('tab') !== 'service' ? 'active show' : '' }}"
                                           href="{{ request()->fullUrlWithQuery(['tab' => 'product']) }}">
                                            <h2 class="my-shop bg-white">Product</h2>
                                        </a>
                                        <a class="{{ request('tab') === 'service' ? 'active show' : '' }}"
                                           href="{{ request()->fullUrlWithQuery(['tab' => 'service']) }}">
                                            <h2 class="my-shop bg-white">Service</h2>
                                        </a>
                                    </div>
                                </div>
                                
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade {{ request('tab') !== 'service' ? 'show active' : '' }}" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    @forelse($products as $product)
                                    @php
                                        $primaryImage = $product->images->where('is_primary', 1)->first();
                                    @endphp
                                    <div class="col-xl-4 col-sm-6 col-6">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="{{route('product.show', $product->slug)}}"><img
                                                        src="{{ asset('uploads/productImages/' . $primaryImage->image) }}"
                                                        alt="#" style="width: 220px; height: 220px; object-fit: cover;"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        @if($product->qty > 0)
                                                            <li class="sale-badge">Sale</li>
                                                        @else
                                                            <li class="sale-badge">Out Of Stock</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul>
                                                        <li><a href="{{ route('product.show', $product->slug) }}"><i
                                                                    class="far fa-eye"></i></a></li>
                                                        @if($product->qty > 0)
                                                            <li><a href="javascript:void(0)" class="add-to-cart-link"
                                                                    data-product-id="{{ $product->id }}"><i
                                                                        class="fas fa-shopping-cart"></i></a></li>
                                                        @endif
                                                        @php
                                                            $isWishlisted = auth()->check() && $product->wishlists->where('user_id', auth()->id())->count();
                                                        @endphp
                                                        <li>
                                                            <a href="javascript:void(0);" class="wishlist-btn"
                                                                data-id="{{ $product->id }}">
                                                                <i
                                                                    class="{{ $isWishlisted ? 'fas heart-red' : 'far' }} fa-heart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @php
                                                $avgRating = round($product->reviews->avg('rating'), 1);
                                                $fullStars = floor($avgRating);
                                                $halfStar = ($avgRating - $fullStars) >= 0.5;
                                                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                            @endphp
                                            <div class="product-info">
                                                <div class="product-ratting">
                                                    <ul>
                                                        @for ($i = 0; $i < $fullStars; $i++)
                                                            <li><i class="fas fa-star"></i></li>
                                                        @endfor
                                                        @if($halfStar)
                                                            <li><i class="fas fa-star-half-alt"></i></li>
                                                        @endif
                                                        @for ($i = 0; $i < $emptyStars; $i++)
                                                            <li><i class="far fa-star"></i></li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                                <h2 class="product-title">
                                                    <a
                                                        href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                                </h2>
                                                <div class="product-price">
                                                    <span>${{ number_format($product->price, 2) }}</span>
                                                    {{-- <del>$162.00</del> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h1>Product Not Found</h1>
                                @endforelse
                                </div>
                    
                                <!-- Pagination -->
                                <div class="text-center mt-4">
                                    {{ $products->appends(request()->query())->onEachSide(1)->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ request('tab') === 'service' ? 'show active' : '' }}" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                    @forelse($services as $Service)
                                    <div class="{{ request('tab') === 'service' ? 'col-lg-12' : 'col-lg-8' }}" id="content-col">
                                        <div class="row g-0 border rounded overflow-hidden shadow-sm">
                                            <!-- Image Left -->
                                            <div class="col-md-3">
                                                    <img src="{{ asset('serviceImage/' . $Service->image) }}" alt="#"
                                                        class="img-fluid rounded-start h-100 w-100"
                                                        style="object-fit: cover; margin-left: -15px;">
                                            </div>
                                            <div class="col-md-9 p-3 d-flex flex-column justify-content-between">
                                                <div>
                                                    <h5 class="mb-1 text-white">
                                                        <p class="text-white">{{ $Service->name }}</p>
                                                    </h5>

                                                    <p class="text-white mb-1">{{ $Service->type }}</p>

                                                    <h6 class="text-success mb-2">
                                                        ${{ number_format($Service->price ?? 0, 2) }}
                                                    </h6>

                                                    <p class="text-white mb-3" style="font-size: 14px;">
                                                        {{ Str::limit(strip_tags($Service->description), 200) }}
                                                    </p>

                                                    @if($Service->vendor)
                                                        <div class="d-flex align-items-center gap-2">
                                                            <img src="{{ asset('uploads/vendors/' . $Service->vendor->image) }}"
                                                                alt="vendor" class="rounded-circle"
                                                                style="width: 30px; height: 30px; object-fit: cover;">

                                                            <span class="text-white" style="font-size: 14px;">
                                                                {{ $Service->vendor->name }}
                                                            </span>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="text-end mt-2">
                                                    <a href="#" class="btn btn-sm btn-outline-primary open-service-modal"
                                                        data-bs-toggle="modal" data-bs-target="#quick_view_product"
                                                        data-id="{{ $Service->id }}"
                                                        data-name="{{ $Service->name }}" data-type="{{ $Service->type }}"
                                                        data-price="{{ number_format($Service->price, 2) }}"
                                                        data-image="{{ asset('serviceImage/' . $Service->image) }}"
                                                        data-vendor-name="{{ $Service->vendor->name ?? 'Unknown' }}"
                                                        data-vendor-image="{{ $Service->vendor ? asset('uploads/vendors/' . $Service->vendor->image) : asset('default.png') }}"
                                                        data-description="{{ strip_tags(Str::limit($Service->description, 200)) }}">
                                                        <i class="far fa-eye"></i> Quick View
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h1>Service Not Found</h1>
                                @endforelse
                                </div>
                    
                                <!-- Pagination -->
                                {{ $services->appends(request()->query())->onEachSide(1)->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  mb-100" id="sidebar-col">
                    <aside class="sidebar ltn__shop-sidebar">
                        <div class="widget ltn__search-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Search Products</h4>
                            <form method="GET" action="{{ route('vendor.show', ['id' => $vendor->id]) }}">
                                <input type="text" name="search" placeholder="Search your keyword..."
                                    value="{{ request('search') }}">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>

                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Product Categories</h4>
                            <ul>
                                <li>
                                    <a href="{{ route('vendor.show', ['id' => $vendor->id]) }}">All Categories</a>
                                </li>
                                @foreach ($categories as $category)
                                    <li>
                                        <a
                                            href="{{ route('vendor.show', ['id' => $vendor->id, 'category_id' => $category->id] + request()->except('category_id', 'page')) }}">
                                            {{ $category->name }}
                                            <span><i class="fas fa-long-arrow-alt-right"></i></span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <form method="GET" action="{{ route('vendor.show', ['id' => $vendor->id]) }}">
                            @foreach(request()->except(['min_price', 'max_price', 'page']) as $key => $val)
                                <input type="hidden" name="{{ $key }}" value="{{ $val }}">
                            @endforeach

                            <div class="widget ltn__price-filter-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border">Filter by price</h4>
                                <div class="price_filter">
                                    <div class="price_slider_amount mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="number" name="min_price" class="form-control" placeholder="Min"
                                                    value="{{ request('min_price') }}">
                                            </div>
                                            <div class="col-6">
                                                <input type="number" name="max_price" class="form-control" placeholder="Max"
                                                    value="{{ request('max_price') }}">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-dark mt-3 w-100">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="widget ltn__top-rated-product-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Top rated Products</h4>
                            <ul>
                                @foreach($topRatedProducts as $product)
                                    @php
                                        $image = $product->images->where('is_primary', 1)->first()?->image ?? 'web/img/default.png';
                                        $avgRating = round($product->reviews->avg('rating'), 1);
                                        $fullStars = floor($avgRating);
                                        $halfStar = ($avgRating - $fullStars) >= 0.5;
                                        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                    @endphp
                                    <li>
                                        <div class="top-rated-product-item clearfix">
                                            <div class="top-rated-product-img">
                                                <a href="{{ route('product.show', $product->slug) }}">
                                                    <img src="{{ asset('uploads/productImages/' . $image) }}"
                                                        alt="{{ $product->name }}">
                                                </a>
                                            </div>
                                            <div class="top-rated-product-info">
                                                <div class="product-ratting">
                                                    <ul>
                                                        @for ($i = 0; $i < $fullStars; $i++)
                                                            <li><i class="fas fa-star"></i></li>
                                                        @endfor
                                                        @if($halfStar)
                                                            <li><i class="fas fa-star-half-alt"></i></li>
                                                        @endif
                                                        @for ($i = 0; $i < $emptyStars; $i++)
                                                            <li><i class="far fa-star"></i></li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                                <h6><a
                                                        href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                                </h6>
                                                <div class="product-price">
                                                    <span>${{ number_format($product->price, 2) }}</span>
                                                    @if($product->discount_price)
                                                        <del>${{ number_format($product->discount_price, 2) }}</del>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div> 
    <!-- Shop Tab Start -->
    <div class="container">
        <div class="col-lg-12">
            <div class="gerage">
                <div class="row">
                    <div class="col-xl-6">
                        <h3>{{ $vendor->name }}</h3>
                    </div>
                </div>
            </div>
            <div class="gerage">
                <div class="row">
                    <div class="col-xl-6">
                        <h3>{{ $vendor->estalish_since }}</h3>
                    </div>
                    <div class="col-xl-6">
                        <h5>Ratings : {{ $averageRating }}</h5>
                    </div>
                </div>
            </div>
            <div class="gerage">
                <div class="row">
                    <div class="col-xl-6">
                        <h3><i class="fa-solid fa-location-dot"></i>  {{$vendor->location}}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="ltn__shop-details-tab-inner ltn__shop-details-tab-inner-2">
                <div class="ltn__shop-details-tab-menu">
                    <div class="nav">
                        <a class="active show" data-bs-toggle="tab" href="#liton_tab_details_1_1">Description</a>
                        <a data-bs-toggle="tab" href="#liton_tab_details_1_2" class="">Reviews</a>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                        <div class="ltn__shop-details-tab-content-inner">
                            <p>{!! $vendor->description !!}</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="liton_tab_details_1_2">
                        <div class="ltn__shop-details-tab-content-inner">
                            <h4 class="title-2">Customer Reviews</h4>
                            <div class="product-ratting">
                                <ul>
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if($averageRating >= $i)
                                            <li><a><i class="fas fa-star"></i></a></li>
                                        @elseif($averageRating >= $i - 0.5)
                                            <li><a><i class="fas fa-star-half-alt"></i></a></li>
                                        @else
                                            <li><a><i class="far fa-star"></i></a></li>
                                        @endif
                                    @endfor
                                    <li class="review-total">
                                        <a href="#">({{ $totalReviews }} Reviews)</a>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <!-- comment-area -->
                            <div class="ltn__comment-area mb-30">
                                <div class="ltn__comment-inner">
                                    <ul id="review-list">
                                        @forelse ($vendor->reviews as $index => $review)
                                            <li class="review-item" style="display: {{ $index < 3 ? 'block' : 'none' }};">
                                                <div class="ltn__commenter-comment">
                                                    <h6><a href="#">{{ $review->user->name }}</a></h6>
                                                    <div class="product-ratting">
                                                        <ul>
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if($review->rating >= $i)
                                                                    <li><a><i class="fas fa-star"></i></a></li>
                                                                @elseif($review->rating >= $i - 0.5)
                                                                    <li><a><i class="fas fa-star-half-alt"></i></a></li>
                                                                @else
                                                                    <li><a><i class="far fa-star"></i></a></li>
                                                                @endif
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                    <p>{{ $review->review }}</p>
                                                </div>
                                            </li>
                                        @empty
                                        <p>No reviews yet. Be the first to review this Store {{ $vendor->name }}!</p>
                                        @endforelse
                                    </ul>
                                    
                                    @if ($vendor->reviews->count() > 3)
                                        <div class="text-center mt-2">
                                            <a id="show-more-btn" class="btn btn-outline-primary btn-sm">Show More</a>
                                        </div>
                                    @endif
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            const batchSize = 3;
                                            let shownCount = 3;
                                            const reviews = document.querySelectorAll('.review-item');
                                            const btn = document.getElementById('show-more-btn');
                                    
                                            btn?.addEventListener('click', function () {
                                                let nextCount = shownCount + batchSize;
                                                for (let i = shownCount; i < nextCount && i < reviews.length; i++) {
                                                    reviews[i].style.display = 'block';
                                                }
                                                shownCount = nextCount;
                                    
                                                if (shownCount >= reviews.length) {
                                                    btn.style.display = 'none'; // Hide button when all shown
                                                }
                                            });
                                        });
                                    </script>
                                               <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
                                
                                               {{-- Style for yellow stars --}}
                                               <style>
                                                   .rating-stars .star {
                                                       background: none;
                                                       border: none;
                                                       cursor: pointer;
                                                       font-size: 24px;
                                                   }
                                               
                                                   .rating-stars .star i.fas {
                                                       color: rgb(255, 179, 16);  
                                                   }
                                               
                                                   .rating-stars .star i.far {
                                                       color: #ccc;  
                                                   }
                                               </style>                         
                                </div>
                            </div>
                            @if(auth()->check())
                                <div class="ltn__comment-reply-area ltn__form-box mb-30">
                                    @if(session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                            
                                    <form id="ratingform" action="{{ route('vendor.postReview') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <h4 class="title-2 text-dark">Add a Review</h4>
                            
                                        {{-- Star Rating --}}
                                        <div class="mb-30">
                                            <div class="add-a-review">
                                                <h6 class="text-dark">Your Ratings:</h6>
                                                <div class="product-ratting">
                                                    <ul class="rating-stars" style="list-style: none; padding: 0; display: flex; gap: 5px;">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <li>
                                                                <button type="button" class="star" data-value="{{ $i }}">
                                                                    <i class="far fa-star"></i>
                                                                </button>
                                                            </li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                                <input type="hidden" name="rating" id="rating-value">
                                            </div>
                                        </div>
                            
                                        {{-- Review Text --}}
                                        <div class="input-item input-item-textarea ltn__custom-icon">
                                            <textarea name="review" placeholder="Type your comments...." required></textarea>
                                        </div>
                                        <input type="file" name="image">
                                        {{-- Hidden Product ID --}}
                                        <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                            
                                        <div class="btn-wrapper">
                                            <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <p class="text-muted">Please <a href="{{ route('login') }}">login</a> to leave a review.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row"> 
             <div class="gerage">
                <div class="row">
                    <div class="col-xl-6 mb-30">
                        <h3 class="pt-20">Return Policy</h3>
                    </div>
                    <div class="col-xl-6">
                        <button class="theme-btn-1 btn btn-effect-1" data-bs-toggle="modal"
                            data-bs-target="#returnPolicyModal">Click here View</button>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="returnPolicyModal" tabindex="-1" aria-labelledby="returnPolicyModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content gerage">
                        <div class="modal-header">
                            {{-- <h5 class="modal-title text-dark" id="returnPolicyModalLabel">Return Policy</h5> --}}
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-dark">
                            <p class="text-dark" style="color: black">{!! $cms_content[9]['description'] ?? '' !!}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="theme-btn-1 btn btn-effect-1"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="quick_view_product" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!-- Close Button -->
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="ltn__quick-view-modal-inner">
                            <div class="modal-product-item">
                                <div class="row">
                                    <!-- Service Image -->
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-img">
                                            <img id="modal-service-image" src="" alt="Service Image"
                                            class="img-fluid rounded-start h-100 w-100">
                                        </div>
                                    </div>

                                    <!-- Service Details -->
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-info">

                                            <h3 id="modal-service-name" class="mb-2">Service Name</h3>

                                            <div class="product-price mb-2">
                                                <span id="modal-service-price">$0.00</span>
                                            </div>

                                            <div class="product-price mb-2">
                                                <span id="modal-service-vendor-id">0</span>
                                            </div>

                                            <p id="modal-service-type" class="text-muted mb-2">Type: --</p>

                                            <p id="modal-service-description" class="mb-3 text-dark">
                                                Description will be shown here...
                                            </p>

                                            <div class="d-flex align-items-center gap-2 mb-3">
                                                <img id="modal-vendor-image" src="" alt="Vendor"
                                                    style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;">
                                                <strong id="modal-vendor-name">Vendor Name</strong>
                                            </div>

                                            <hr>

                                            <button id="make-appointment" class="theme-btn-1 btn btn-effect-1">
                                                Make an Appointment
                                            </button>

                                        </div>
                                    </div>
                                </div> <!-- row -->
                            </div>
                        </div>
                    </div> <!-- modal-body -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         $(document).ready(function () {
            let selectedRating = null;
            $('.rating-stars .star').on('click', function () {
                selectedRating = $(this).data('value');
                $('#rating-value').val(selectedRating);
                $('.rating-stars .star i').removeClass('fas').addClass('far');
                $('.rating-stars .star').each(function () {
                    if ($(this).data('value') <= selectedRating) {
                        $(this).find('i').removeClass('far').addClass('fas');
                    }
                });
            });
            $('#ratingform').on('submit', function (e) {
                if (!selectedRating) {
                    e.preventDefault();
                    alert('Please select a star rating before submitting your review.');
                }
            });
        });
        $(document).ready(function () {
            $('.open-service-modal').on('click', function () {
                let btn = $(this);
                $('#modal-service-vendor-id').text(btn.data('id'));
                $('#modal-service-name').text(btn.data('name'));
                $('#modal-service-price').text('$' + btn.data('price'));
                $('#modal-service-type').text('Type: ' + btn.data('type'));
                $('#modal-service-description').text(btn.data('description'));
                $('#modal-service-image').attr('src', btn.data('image'));
                $('#modal-vendor-image').attr('src', btn.data('vendor-image'));
                $('#modal-vendor-name').text(btn.data('vendor-name'));
            });
            $('#make-appointment').on('click', function () {
                let btn = $(this);
                let vendorId = $('#modal-service-vendor-id').text();

                window.location.href = '/appointment/' + vendorId;
            });
        });
   
        document.addEventListener("DOMContentLoaded", function () {
            const sidebar = document.getElementById("sidebar-col");
    
            const productTab = document.querySelector('a[href="#liton_product_grid"]');
            const serviceTab = document.querySelector('a[href="#liton_product_list"]');
    
            if (sidebar && productTab && serviceTab) {
                productTab.addEventListener("click", function () {
                    sidebar.style.display = "block";
                });
    
                serviceTab.addEventListener("click", function () {
                    sidebar.style.display = "none";
                });
            }
        });
   
        document.addEventListener("DOMContentLoaded", function () {
            const sidebar = document.getElementById("sidebar-col");
            const content = document.getElementById("main-content-col");
            const urlParams = new URLSearchParams(window.location.search);
            const tab = urlParams.get("tab");
    
            if (tab === "service") {
                if (sidebar) sidebar.style.display = "none";
                if (content) {
                    content.classList.remove("col-lg-8", "col-lg-9");
                    content.classList.add("col-lg-12");
                }
            }
        });
    </script>
     <style>
        .heart-red {
            color: red !important;
        }
    </style>
@endsection
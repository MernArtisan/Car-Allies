@extends('web.layouts.master')

@section('title', 'Home')
@section('description', 'Lorem Ipsum')

@section('content')
    <div class="ltn__utilize-overlay"></div>

    <div class="ltn__slider-area ltn__slider-3 ltn__slider-6 section-bg-1">
        <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1 arrow-white">
            @forelse ($banners as $banner)
                <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3 ltn__slide-item-5 text-color-white bg-overlay-theme-black-80"style="background-image: url('{{ asset('web/img/slider/41.jpg') }}'); background-repeat: no-repeat; background-size: cover; background-position: center;"
                >
                    <div class="ltn__slide-item-inner">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="slide-item-info">
                                        <div class="slide-item-info-inner ltn__slide-animation">
                                            <h1 class="slide-title animated">
                                                {!! nl2br(e($banner->title ?? 'Welcome to Our Marketplace')) !!}
                                            </h1>
                                            <div class="slide-brief animated">
                                                <p>{!! $banner->description ?? 'Discover vendors, services, and products near you.' !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <div class="slide-item-img">
                                        <img src="{{ $banner->image ? asset('uploads/homebanners/' . $banner->image) : asset('web/img/slider/default-banner.png') }}"
                                            alt="Banner Image" style="max-height: 500px; width: auto;">
                                        <span class="call-to-circle-1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                @for ($i = 0; $i < 5; $i++)
                    <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3 ltn__slide-item-5 text-color-white bg-overlay-theme-black-80"
                        style="background-color: #ffffff;" data-bs-bg="{{ asset('web/img/slider/41.jpg') }}">
                        <div class="ltn__slide-item-inner half-screen-banner">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="slide-item-info">
                                            <div class="slide-item-info-inner ltn__slide-animation">
                                                <h1 class="slide-title animated">Welcome to Our Marketplace</h1>
                                                <div class="slide-brief animated">
                                                    <p>Find amazing vendors and services near you with one click.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-center">
                                        <div class="slide-item-img">
                                            <img src="{{ asset('web/img/1744214164.png') }}" alt="Default Banner"
                                                style="max-height: 500px; width: auto;">
                                            <span class="call-to-circle-1"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            @endforelse
        </div>
    </div>

    {{-- Done --}}
    <div class="ltn__product-area ltn__product-gutter mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-lg-2 mb-100">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row" id=" nearest-vendors-wrapper">
                                    @forelse ($vendors as $vendor)
                                        <div class="col-xl-4 col-sm-6 col-6">
                                            <a href="{{ route('vendor.show', $vendor->id) }}">
                                                <div class="ltn__product-item ltn__product-item-3 text-center main-b-str">
                                                    <div class="product-img">
                                                        <img src="{{ asset('uploads/vendors/' . $vendor->image) }}"
                                                            alt="{{ $vendor->name }}"
                                                            style="width: 100%; height: 220px; object-fit: cover; border-radius: 8px;">

                                                    </div>
                                                    <div class="product-info">
                                                        <div class="product-ratting">
                                                            <ul>
                                                                @php
                                                                    $avgRating = round(
                                                                        $vendor->reviews->avg('rating'),
                                                                        1,
                                                                    );
                                                                    $fullStars = floor($avgRating);
                                                                    $halfStar =
                                                                        $avgRating - $fullStars >= 0.5 ? true : false;
                                                                @endphp

                                                                @for ($i = 0; $i < $fullStars; $i++)
                                                                    <li><i class="fas fa-star"></i></li>
                                                                @endfor

                                                                @if ($halfStar)
                                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                                @endif

                                                                @for ($i = $fullStars + ($halfStar ? 1 : 0); $i < 5; $i++)
                                                                    <li><i class="far fa-star"></i></li>
                                                                @endfor
                                                            </ul>
                                                        </div>
                                                        <h2 class="product-title b-str-t">{{ $vendor->name }}</h2>
                                                        <p class="b-str-p">
                                                            {!! \Illuminate\Support\Str::limit($vendor->description, 60) !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @empty
                                        <p>No Vendors Found</p>
                                    @endforelse
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-12 text-center">
                                        <a href="{{ route('stores.index') }}" class="theme-btn-1 btn btn-effect-1">View
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="ltn__why-choose-us-area section-bg-1 pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="why-choose-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// {{ $cms_content[6]['name'] ?? '' }}</h6>
                            <h1 class="section-title">{{ $cms_content[6]['item_1'] ?? '' }}<span>.</span></h1>
                            <p>{!! $cms_content[6]['description_1'] ?? '' !!}</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="why-choose-us-feature-item">
                                    <div class="why-choose-us-feature-icon">
                                        <i class="icon-car-parts-1"></i>
                                    </div>
                                    <div class="why-choose-us-feature-brief">
                                        <h3>{{ $cms_content[6]['item_2'] ?? '' }}</h3>
                                        <p>{!! $cms_content[6]['description_2'] ?? '' !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="why-choose-us-feature-item">
                                    <div class="why-choose-us-feature-icon">
                                        <i class="icon-automobile"></i>
                                    </div>
                                    <div class="why-choose-us-feature-brief">
                                        <h3>{{ $cms_content[6]['item_3'] ?? '' }}</h3>
                                        <p>{!! $cms_content[6]['description_3'] ?? '' !!}</p>
                                    </div>
                                </div>
                                <a href="{{route('about.index')}}" class="theme-btn-1 btn btn-effect-1" tabindex="0">View
                                    More</a>
                            </div>

                        </div>
                    </div>
                </div>
                @php
                    $targetContent = $cms_content->where('id', 7)->first();
                    $cms_image = [];

                    if ($targetContent && $targetContent->images) {
                        $cms_image = json_decode($targetContent->images, true); // ✅ THIS IS THE FIX
                    }
                @endphp

                <div class="col-lg-6">
                    <div class="why-choose-us-img-wrap">
                        @if (!empty($cms_image))
                            @if (isset($cms_image[0]))
                                <div class="why-choose-us-img-1 text-start">
                                    <img src="{{ asset('uploads/contents/' . $cms_image[0]) }}" alt="Image 1">
                                </div>
                            @endif
                            @if (isset($cms_image[1]))
                                <div class="why-choose-us-img-2 text-end">
                                    <img src="{{ asset('uploads/contents/' . $cms_image[1]) }}" alt="Image 2">
                                </div>
                            @endif
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="ltn__product-tab-area ltn__product-gutter pt-115 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h6 class="section-subtitle ltn__secondary-color">// Top Stores</h6>
                        <h1 class="section-title">Best Selling Stores</h1>
                    </div>

                    <!-- Tab Menu -->
                    <div class="ltn__tab-menu ltn__tab-menu-2 ltn__tab-menu-top-right-- text-uppercase text-center">
                        <div class="nav">
                            @foreach ($bestVendors as $key => $vendor)
                                <a class="{{ $key == 0 ? 'active show' : '' }}" data-bs-toggle="tab"
                                    href="#vendor_tab_{{ $vendor->id }}">
                                    {{ $vendor->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Tab Content -->
                    <div class="tab-content">
                        @foreach ($bestVendors as $key => $vendor)
                                        <div class="tab-pane fade {{ $key == 0 ? 'active show' : '' }}" id="vendor_tab_{{ $vendor->id }}">
                                            <div class="ltn__product-tab-content-inner">
                                                <div class="row">
                                                    @foreach ($vendor->top_products as $product)
                                                                                @php
                                                                                    $primaryImage = $product->images->where('is_primary', 1)->first();
                                                                                @endphp
                                                                                <div class="col-lg-3 col-sm-6">
                                                                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                                                                        <div class="product-img">
                                                                                            <a href="#">
                                                                                                <img src="{{ asset('uploads/productImages/' . ($primaryImage->image ?? 'default.png')) }}"
                                                                                                    alt="{{ $product->name }}" class="img-fluid rounded"
                                                                                                    style="width: 220px; height: 220px; object-fit: cover;">
                                                                                            </a>

                                                                                            <div class="product-badge">
                                                                                                <ul>
                                                                                                    <li class="sale-badge">Top</li>
                                                                                                    @if($product->qty == 0)
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
                                                                                        <div class="product-info">
                                                                                            <h2 class="product-title"><a href="#">{{ $product->name }}</a></h2>
                                                                                            <div class="product-price">
                                                                                                <span>${{ $product->price }}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="ltn__why-choose-us-area section-bg-1 pt-120 pb-120">
        <div class="container">
            <div class="row">

                @php
                    $targetContent = $cms_content->where('id', 10)->first();
                    $cms_image = [];

                    if ($targetContent && $targetContent->images) {
                        $cms_image = json_decode($targetContent->images, true);
                    }
                @endphp
                <div class="col-lg-6">
                    <div class="why-choose-us-img-wrap">
                        <div class="why-choose-us-img-1 text-start">
                            <img src="{{ asset('uploads/contents/' . $cms_image[0]) }}" alt="Image">
                        </div>
                        <div class="why-choose-us-img-2 text-end">
                            <img src="{{ asset('uploads/contents/' . $cms_image[1]) }}" alt="Image">
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="why-choose-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// {{ $cms_content[8]['name'] ?? '' }}</h6>
                            <h1 class="section-title">{{ $cms_content[8]['item_1'] ?? '' }}<span>.</span></h1>
                            <p>{!! $cms_content[8]['description_1'] ?? '' !!}</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="why-choose-us-feature-item">
                                    <div class="why-choose-us-feature-icon">
                                        <i class="icon-car-parts-1"></i>
                                    </div>
                                    <div class="why-choose-us-feature-brief">
                                        <h3><a href="#">{{ $cms_content[8]['item_2'] ?? '' }}</a></h3>
                                        <p>{!! $cms_content[8]['description_2'] ?? '' !!}</p>
                                    </div>
                                </div>
                                <a href="{{route('stores.index')}}" class="theme-btn-1 btn btn-effect-1"
                                    tabindex="0">Stores</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="custom-testimonial-wrapper py-5 text-white">
        <div class="container">
            <h2 class="text-center mb-5">Client Testimonials</h2>
            <div class="custom-testimonial-slider position-relative">
                @foreach ($testimonials as $vendor)
                    @php $review = $vendor->reviews->first(); @endphp
                    @if ($review)
                        <div class="custom-testimonial-item d-flex justify-content-center align-items-center" style="min-height: 350px;">
                            <div class="custom-testimonial-inner text-center mx-auto">
                                <div class="image-wrapper d-flex justify-content-center mb-3">
                                    <img src="{{ asset('uploads/vendors/' . $vendor->image) }}" alt="Client"
                                         class="rounded-circle"
                                         style="width: 90px; height: 90px; object-fit: cover;">
                                </div>
                                <p class="fst-italic text-light custom-testimonial-text">"{{ $review->review }}"</p>
                                <h5 class="text-white">{{ $vendor->name }}</h5>
    
                                <div class="mb-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="{{ $i <= $review->rating ? 'fas' : 'far' }} fa-star text-warning"></i>
                                    @endfor
                                </div>                            
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('.custom-testimonial-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 4000,
                arrows: true,
                dots: false,
                infinite: true,
                prevArrow: '<button type="button" class="slick-prev custom-arrow"><i class="fas fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next custom-arrow"><i class="fas fa-chevron-right"></i></button>',
            });
        });
    </script>
    <style>
        .custom-testimonial-slider .custom-testimonial-item {
            height: 100%;
        }
    
        .custom-testimonial-inner {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
    
        .custom-testimonial-text {
            color: #ddd;
            max-width: 450px;
            margin: 0 auto 15px;
            font-size: 16px;
            line-height: 1.6;
        }
    
        .custom-arrow {
            background: #1e6b8f;
            border: none;
            color: #fff;
            font-size: 20px;
            padding: 10px 15px;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 2;
            transition: all 0.3s ease-in-out;
        }
    
        .slick-prev { left: -30px; }
        .slick-next { right: -30px; }
    
        .slick-arrow:hover {
            background: #ffffff44;
        }
    
        @media (max-width: 768px) {
            .custom-testimonial-inner {
                max-width: 90%;
            }
    
            .custom-testimonial-text {
                font-size: 15px;
            }
    
            .slick-prev { left: -10px; }
            .slick-next { right: -10px; }
        }
    </style>
    

    <style>
        .heart-red {
            color: red !important;
        }
    </style>
    @if (!request()->has('lat') || !request()->has('long'))
        <script>
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    const lat = position.coords.latitude;
                    const long = position.coords.longitude;

                    const newUrl = window.location.pathname + '?lat=' + lat + '&long=' + long;
                    window.location.href = newUrl;
                });
            }
        </script>

        <div style="text-align:center; padding:50px;">
            <h4>📍 Fetching your location...</h4>
        </div>
    @else
    @endif

@endsection
@extends('web.layouts.master')
@section('title', 'Cart')
@section('description', 'Your shopping cart with selected items')
@section('content')
    @php
        $productUrl = url()->current(); // full URL of the current product
    @endphp
    <style>
        .large-product-image {
            max-width: 100%;
            height: 450px;
            object-fit: cover;
            display: block;
            margin: 0 auto;
            border-radius: 8px;
        }

        .small-product-thumb {
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .small-product-thumb:hover {
            transform: scale(1.05);
        }

        .ltn__shop-details-small-img {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
            justify-content: center;
        }
    </style>
    <div class="ltn__utilize-overlay"></div>
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image plr--9"
        data-bs-bg="{{ asset('web/img/bg/9.jpg') }}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// Welcome to our company</h6>
                            <h1 class="section-title white-color">Product Details</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li>Product Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ltn__shop-details-area pb-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ltn__shop-details-inner mb-60">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ltn__shop-details-img-gallery">
                                    <div class="ltn__shop-details-large-img">
                                        @foreach($product->images as $image)
                                            @php
                                                $imagePath = 'uploads/productImages/' . $image->image;
                                                $imageExists = file_exists(public_path($imagePath));
                                                $imageUrl = $imageExists ? asset($imagePath) : asset('web/img/default.jpg');
                                                @endphp
                                            <div class="single-large-img">
                                                <a href="#">
                                                    <img src="{{ $imageUrl }}" alt="Product Image" class="large-product-image">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="ltn__shop-details-small-img slick-arrow-2">
                                        @foreach($product->images as $image)
                                            @php
                                                $imagePath = 'uploads/productImages/' . $image->image;
                                                $imageExists = file_exists(public_path($imagePath));
                                                $imageUrl = $imageExists ? asset($imagePath) : asset('web/img/default.jpg');
                                                @endphp
                                            <div class="single-small-img">
                                                <img src="{{ $imageUrl }}" alt="Product Thumb" class="small-product-thumb">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-product-info shop-details-info pl-0">
                                    <div class="product-ratting">
                                        <ul>
                                            @php
                                                $fullStars = floor($averageRating);
                                                $halfStar = ($averageRating - $fullStars) >= 0.5;
                                                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                              @endphp
                                            {{-- Full Stars --}}
                                            @for ($i = 0; $i < $fullStars; $i++)
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            @endfor
                                            {{-- Half Star --}}
                                            @if ($halfStar)
                                                <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            @endif
                                            {{-- Empty Stars --}}
                                            @for ($i = 0; $i < $emptyStars; $i++)
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                            @endfor
                                            {{-- Total Reviews --}}
                                            <li class="review-total">
                                                <a href="#"> ({{ $reviewCount }}
                                                    {{ Str::plural('Review', $reviewCount) }})</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="text-white">{{$product->name}}</h3>
                                    <div class="product-price">
                                        <span>${{$product->price}}</span>
                                    </div>
                                    <div class="modal-product-meta ltn__product-details-menu-1">
                                        <ul>
                                            <li>
                                                <strong>Categories:</strong>
                                                <span>
                                                    <a href="#">{{$product->category->name}}</a>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="ltn__product-details-menu-2 product-block">
                                        <ul>
                                            <li>
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1" name="qtybutton"
                                                        class="cart-plus-minus-box qty-input">
                                                </div>
                                            </li>
                                            @if($product->qty > 0)
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="theme-btn-1 btn btn-effect-1 add-to-cart-link"
                                                        data-product-id="{{ $product->id }}">
                                                        <i class="fas fa-shopping-cart"></i> <span>ADD TO CART</span>
                                                    </a>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="theme-btn-1 btn btn-effect-1 add-to-cart-link"
                                                        data-product-id="{{ $product->id }}">
                                                        <i class="fas fa-shopping-cart"></i> <span>Out of Stock</span>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>

                                    <div class="ltn__product-details-menu-3">
                                        <ul>
                                            @php
                                            $isWishlisted = auth()->check() && $product->wishlists->where('user_id', auth()->id())->count();
                                            @endphp
                                            <li>
                                                <a href="javascript:void(0);" class="wishlist-btn" title="Wishlist" data-id="{{ $product->id }}">
                                                    <i class="{{ $isWishlisted ? 'fas heart-red' : 'far' }} fa-heart"></i>
                                                    <span>Add to Wishlist</span>
                                                </a>
                                            </li> 
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li>Share:</li>
                                            {{-- Facebook --}}
                                            <li>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($productUrl) }}"
                                                    target="_blank" title="Facebook">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            {{-- Twitter --}}
                                            <li>
                                                <a href="https://twitter.com/intent/tweet?url={{ urlencode($productUrl) }}&text={{ urlencode($product->name) }}"
                                                    target="_blank" title="Twitter">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            {{-- LinkedIn --}}
                                            <li>
                                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($productUrl) }}&title={{ urlencode($product->name) }}"
                                                    target="_blank" title="LinkedIn">
                                                    <i class="fab fa-linkedin"></i>
                                                </a>
                                            </li>
                                            {{-- WhatsApp (optional) --}}
                                            <li>
                                                <a href="https://wa.me/?text={{ urlencode($product->name . ' ' . $productUrl) }}"
                                                    target="_blank" title="WhatsApp">
                                                    <i class="fab fa-whatsapp"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Tab Start -->
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
                                    <p>{!! $product->description !!}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_details_1_2">
                                <div class="ltn__shop-details-tab-content-inner">
                                    <h4 class="title-2">Customer Reviews</h4>
                                    <div class="product-ratting">
                                        <ul>
                                            @php
                                                $fullStars = floor($averageRating);
                                                $halfStar = ($averageRating - $fullStars) >= 0.5;
                                                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                              @endphp
                                            {{-- Full Stars --}}
                                            @for ($i = 0; $i < $fullStars; $i++)
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            @endfor
                                            {{-- Half Star --}}
                                            @if ($halfStar)
                                                <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            @endif
                                            {{-- Empty Stars --}}
                                            @for ($i = 0; $i < $emptyStars; $i++)
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                            @endfor
                                            {{-- Total Reviews --}}
                                            <li class="review-total">
                                                <a href="#"> ({{ $reviewCount }}
                                                    {{ Str::plural('Review', $reviewCount) }})</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <!-- comment-area -->
                                    @if($product->reviews->count())
                                        <div class="ltn__comment-area mb-30">
                                            <div class="ltn__comment-inner">
                                                <ul>
                                                    @foreach($product->reviews as $review)
                                                        <li>
                                                            <div class="ltn__comment-item clearfix">
                                                                <div class="ltn__commenter-img">
                                                                    @php
                                                                        $userImage = $review->user->image ?? null;
                                                                    @endphp
                                                                    <img src="{{ $userImage ? asset('uploads/profileImage/' . $userImage) : asset('default.png') }}"
                                                                        alt="Image">
                                                                </div>
                                                                <div class="ltn__commenter-comment">
                                                                    <h6><a href="#">{{ $review->user->name ?? 'Anonymous' }}</a>
                                                                    </h6>

                                                                    {{-- Star Rating --}}
                                                                    <div class="product-ratting">
                                                                        <ul>
                                                                            @for ($i = 1; $i <= 5; $i++)
                                                                                @if ($i <= $review->rating)
                                                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                                @else
                                                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                                @endif
                                                                            @endfor
                                                                        </ul>
                                                                    </div>

                                                                    {{-- Review Content --}}
                                                                    <p>{{ $review->review }}</p>
                                                                    <span class="ltn__comment-reply-btn text-white">
                                                                        {{ $review->created_at->format('F j, Y') }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-muted">No reviews yet. Be the first to review this product!</p>
                                    @endif

                                    <!-- comment-reply -->
                                    @if(auth()->check())
                                    <div class="ltn__comment-reply-area ltn__form-box mb-30">
                                        @if(session('success'))
                                            <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif
                                
                                        <form id="ratingform" action="{{ route('review.submit') }}" method="POST">
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
                                
                                            {{-- Hidden Product ID --}}
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                
                                            <div class="btn-wrapper">
                                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                @else
                                    <p class="text-muted">Please <a href="{{ route('login') }}">login</a> to leave a review.</p>
                                @endif
                                
                                {{-- Font Awesome for stars --}}
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
                        </div>
                    </div>
                    <!-- Shop Tab End -->
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <!-- Top Rated Product Widget -->
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
                                                <img src="{{ asset('uploads/productImages/'.$image) }}" alt="{{ $product->name }}">
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
                                            <h6><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h6>
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
    <!-- SHOP DETAILS AREA END -->
    <!-- PRODUCT SLIDER AREA START -->
    <div class="ltn__product-slider-area ltn__product-gutter pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color">// cars</h6>
                        <h1 class="section-title">Related Store Products<span>.</span></h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__related-product-slider-one-active slick-arrow-1">
                @foreach($relatedVendorProducts as $related)
                    @php
                        $image = $related->images->where('is_primary', 1)->first()?->image ?? 'web/img/default.png';
                        $avgRating = round($related->reviews->avg('rating'), 1);
                        $fullStars = floor($avgRating);
                        $halfStar = ($avgRating - $fullStars) >= 0.5;
                        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                    @endphp
            
                    <div class="col-lg-12">
                        <div class="ltn__product-item ltn__product-item-3 text-center">
                            <div class="product-img">
                                <a href="{{ route('product.show', $related->slug) }}">
                                    <img src="{{ asset('uploads/productImages/'.$image) }}" alt="{{ $related->name }}" style="width: 305px;height: 305px;object-fit: cover;">
                                </a>
                                <div class="product-badge">
                                    <ul>
                                        @if($related->qty == 0)
                                            <li class="sale-badge">Out Of Stock</li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="product-badge">
                                    @if($related->created_at > now()->subDays(10))
                                        <ul><li class="sale-badge">New</li></ul>
                                    @endif
                                </div>
                                <div class="product-hover-action">
                                    <ul>
                                        <li>
                                            <a href="{{ route('product.show', $related->slug) }}" >
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </li>
                                        @if($related->qty > 0)
                                        <li><a href="javascript:void(0)" class="add-to-cart-link"
                                                data-product-id="{{ $related->id }}"><i
                                                    class="fas fa-shopping-cart"></i></a></li>
                                        @endif
                                        @php
                                        $isWishlisted = auth()->check() && $related->wishlists->where('user_id', auth()->id())->count();
                                         @endphp

                                    <li>
                                        <a href="javascript:void(0);" class="wishlist-btn"
                                            data-id="{{ $related->id }}">
                                            <i
                                                class="{{ $isWishlisted ? 'fas heart-red' : 'far' }} fa-heart"></i>
                                        </a>
                                    </li>
                                    </ul>
                                </div>
                            </div>
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
                                    <a href="{{ route('product.show', $related->slug) }}">{{ $related->name }}</a>
                                </h2>
                                <div class="product-price">
                                    <span>${{ number_format($related->price, 2) }}</span>
                                    @if($related->discount_price)
                                        <del>${{ number_format($related->price, 2) }}</del>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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

                // Reset all stars
                $('.rating-stars .star i').removeClass('fas').addClass('far');

                // Highlight selected stars
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
   </script>
   <style>
    .heart-red {
        color: red !important;
    }
</style>

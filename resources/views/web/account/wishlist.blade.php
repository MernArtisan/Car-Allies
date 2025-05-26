@extends('web.layouts.master')

@section('title', 'Account')

@section('content')
    <div class="ltn__utilize-overlay"></div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
        data-bs-bg="{{ asset('web/img/bg/9.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// Welcome to our company</h6>
                            <h1 class="section-title white-color">My Wishlist</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li>My Wishlist</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="page-content dashboard">
            <div class="container">
                <div class="row">
                    @include('web.account.account-sidebar')
                    <div class="col-9">
                        <div class="container">
                            <div class="row">
                                @forelse($wishlists as $Wishlist)
                                    @php
                                        $image = $Wishlist->product->images->where('is_primary', 1)->first()?->image ?? 'web/img/default.png';
                                        $avgRating = round($Wishlist->product->reviews->avg('rating'), 1);
                                        $fullStars = floor($avgRating);
                                        $halfStar = ($avgRating - $fullStars) >= 0.5;
                                        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                    @endphp
                                    <div class="col-md-4">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="{{route('product.show', $Wishlist->product->slug)}}"><img
                                                    src="{{ asset('uploads/productImages/' . $image) }}"
                                                    alt="#" style="width: 220px; height: 220px; object-fit: cover;"></a>
                                                <div class="product-badge">
                                                    <ul>
                                                        @if ($Wishlist->product->qty > 0)
                                                        <li class="sale-badge">Sale</li>
                                                        @else
                                                        <li class="sale-badge">Out Of Stock</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul>
                                                        <li><a href="{{ route('product.show', $Wishlist->product->slug) }}"><i
                                                                    class="far fa-eye"></i></a></li>
                                                        @if($Wishlist->product->qty > 0)
                                                            <li><a href="javascript:void(0)" class="add-to-cart-link"
                                                                    data-product-id="{{ $Wishlist->product->id }}"><i
                                                                        class="fas fa-shopping-cart"></i></a></li>
                                                        @endif
                                                        @php
                                                            $isWishlisted = auth()->check() && $Wishlist->product->wishlists->where('user_id', auth()->id())->count();
                                                        @endphp
                                                       <li>
                                                        <a href="{{ route('account.removewishlist', $Wishlist->id) }}"
                                                           onclick="event.preventDefault(); document.getElementById('remove-wishlist-{{ $Wishlist->id }}').submit();"
                                                           title="Remove from Wishlist">
                                                            <i class="fas fa-heart text-danger"></i>
                                                        </a>
                                                    
                                                        <form id="remove-wishlist-{{ $Wishlist->id }}"
                                                              action="{{ route('account.removewishlist', $Wishlist->id) }}"
                                                              method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
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
                                                <h2 class="product-title"><a href="product-details.php">{{ $Wishlist->product->name }}</a></h2>
                                                <div class="product-price">
                                                    <span>${{ number_format($Wishlist->product->price, 2) }}</span> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>No Wishlists Found</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .heart-red {
            color: red !important;
        }
    </style>

@endsection
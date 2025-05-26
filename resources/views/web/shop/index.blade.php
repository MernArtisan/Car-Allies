@extends('web.layouts.master')
@section('title', 'Shop')
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
                            <h1 class="section-title white-color">Shop</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{route('home.index')}}">Home</a></li>
                                <li>Shop</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ltn__product-area ltn__product-gutter">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-2 mb-100" id="main-content-col">
                    <div class="ltn__shop-options">
                        <ul>
                            <li>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="on_product_list active show" data-bs-toggle="tab"
                                            href="#liton_product_grid">
                                            <h2 class="my-shop bg-white">Product</h2>
                                        </a>
                                        <a class="on_service_list" data-bs-toggle="tab" href="#liton_service_list">
                                            <h2 class="my-shop bg-white">Service</h2>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li id="service-search-input" style="display: none;">
                                <form id="serviceSearchForm" method="GET" action="{{ route('shop.index') }}"
                                    class="d-flex align-items-center" style="gap: 8px;">
                                    <input type="text" name="service_search" placeholder="Search service..."
                                        value="{{ request('service_search') }}" class="form-control"
                                        style="height: 53px; width: 230px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; padding: 5px 10px;margin-left: 486px;margin-top: 42px;">

                                    <button type="submit" class="btn"
                                        style="height: 55px; background-color: #e53e29; color: white; border-radius: 5px;margin-top: 11px;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="liton_product_grid">
                            <div class="row">
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
                            </div>
                            {{ $products->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                        <div class="tab-pane fade" id="liton_service_list">
                            <div class="row">
                                @forelse($services as $Service)
                                    <div class="col-lg-12 mb-4">
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
                            {{ $services->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  mb-100" id="sidebar-col">
                    <aside class="sidebar ltn__shop-sidebar">
                        <div class="widget ltn__search-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Search Objects</h4>
                            <form method="GET" action="{{ route('shop.index') }}">
                                <input type="text" name="search" placeholder="Search your keyword..."
                                    value="{{ request('search') }}">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Product categories</h4>
                            <ul>
                                <li>
                                    {{-- All Category --}}
                                    <a href="{{ route('shop.index') }}">
                                        All Category
                                        <span><i class="fas fa-long-arrow-alt-right"></i></span>
                                    </a>
                                    {{-- Dynamic Categories --}}
                                    @foreach ($categories as $category)
                                        <a
                                            href="{{ route('shop.index', ['category_id' => $category->id] + request()->except('page')) }}">
                                            {{ $category->name }}
                                            <span><i class="fas fa-long-arrow-alt-right"></i></span>
                                        </a>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <form method="GET" action="{{ route('shop.index') }}">
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
                        <br>
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

    <style>
        .heart-red {
            color: red !important;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
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
    </script>
   
   <script>
    $(document).ready(function () {
    
        // ✅ Append hash before clicking pagination links
        $(document).on('click', '.pagination a', function (e) {
            const isServiceTab = $('#liton_service_list').hasClass('active show');
            const hash = isServiceTab ? '#liton_service_list' : '#liton_product_grid';
    
            // Replace old hash
            let href = $(this).attr('href').split('#')[0] + hash;
            $(this).attr('href', href);
        });
    
        // ✅ Fix hash on service search form submit
        $('#serviceSearchForm').on('submit', function () {
            const action = $(this).attr('action').split('#')[0];
            $(this).attr('action', action + '#liton_service_list');
        });
    
        // ✅ Tab Switching
        $('.on_service_list').on('click', function () {
            window.location.hash = 'liton_service_list';
            $('#sidebar-col').hide();
            $('#main-content-col').removeClass('col-lg-8 order-lg-2').addClass('col-12');
            $('#short-by').hide();
            $('#service-search-input').show();
        });
    
        $('.on_product_list').on('click', function () {
            window.location.hash = 'liton_product_grid';
            $('#sidebar-col').show();
            $('#main-content-col').removeClass('col-12').addClass('col-lg-8 order-lg-2');
            $('#short-by').show();
            $('#service-search-input').hide();
        });
    
        // ✅ On load, force correct tab
        if (window.location.hash === '#liton_service_list') {
            $('.on_service_list').trigger('click');
            $('[href="#liton_service_list"]').tab('show');
        } else {
            $('.on_product_list').trigger('click');
            $('[href="#liton_product_grid"]').tab('show');
        }
    
    });
    </script>
    
@endsection
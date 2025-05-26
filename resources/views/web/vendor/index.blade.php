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
                            <h1 class="section-title white-color">Stores</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li>Stores</li>
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
                <div class="col-lg-12 order-lg-2 mb-100">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    @foreach ($vendors as $vendor)
                                        <div class="col-xl-4 col-sm-6 col-6">
                                            <a href="{{ route('vendor.show', $vendor->id) }}">
                                                <div class="ltn__product-item ltn__product-item-3 text-center main-b-str">
                                                    <div class="product-img"
                                                        style="width: 100%; height: 150px; overflow: hidden;">
                                                        <img src="{{ asset('uploads/vendors/' . $vendor->image) }}"
                                                            alt="{{ $vendor->name }}"
                                                            style="width: 220px; height: 160px; object-fit: cover;">
                                                    </div>
                                                    <div class="product-info">
                                                        {{-- Star Ratings --}}
                                                        <div class="product-ratting">
                                                            <ul>
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= floor($vendor->avg_rating))
                                                                        <li><i class="fas fa-star"></i></li>
                                                                    @elseif ($i - $vendor->avg_rating < 1)
                                                                        <li><i class="fas fa-star-half-alt"></i></li>
                                                                    @else
                                                                        <li><i class="far fa-star"></i></li>
                                                                    @endif
                                                                @endfor
                                                            </ul>
                                                        </div>

                                                        {{-- Vendor Name --}}
                                                        <h2 class="product-title b-str-t">{{ $vendor->name }}</h2>

                                                        {{-- Optional Description --}}
                                                        <p class="b-str-p">
                                                            {!! Str::limit(strip_tags($vendor->description), 60, '...') !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                    <div class="text-center mt-4">
                                        {{ $vendors->onEachSide(1)->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->

@endsection

@extends('web.layouts.master')

@section('title', 'Home')
@section('description', 'Lorem Ipsum')

@section('content')

    <div class="ltn__utilize-overlay"></div>
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
        data-bs-bg="{{ asset('web/img/bg/9.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// Welcome to our company</h6>
                            <h1 class="section-title white-color">About Us</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li>About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-120-- pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-left">
                        @php
                            $targetContent = $cms_content->where('id', 7)->first();
                            $cms_image = [];

                            if ($targetContent && $targetContent->images) {
                                $cms_image = json_decode($targetContent->images, true); // ✅ THIS IS THE FIX
                            }
                        @endphp
                        @if (!empty($cms_image))
                            @if (isset($cms_image[0]))
                                <div class="why-choose-us-img-1 text-start">
                                    <img src="{{ asset('uploads/contents/' . $cms_image[0]) }}" alt="Image 1">
                                </div>
                            @endif
                        @endif
                        <div class="about-us-img-info about-us-img-info-2">
                            <div class="about-us-img-info-inner">
                                <h1>{{ $cms_content[6]['item_5'] ?? '' }}<span>+</span></h1>
                                <h6>Years Experience</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// {{ $cms_content[6]['name'] ?? '' }}</h6>
                            <h1 class="section-title">{{ $cms_content[6]['item_4'] ?? '' }}<span>.</span></h1>
                            <p>{!! $cms_content[6]['description_4'] ?? '' !!}</p>
                        </div>

                        <p>{!! $cms_content[6]['description_5'] ?? '' !!}</p>
                        <div class="btn-wrapper">
                            <a href="{{route('stores.index')}}" class="theme-btn-3 btn btn-effect-4">OUR STORES</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->

    <!-- FEATURE AREA START ( Feature - 6) -->
    <div class="ltn__feature-area section-bg-1 pt-115 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h6 class="section-subtitle ltn__secondary-color">// features //</h6>
                        <h1 class="section-title">{{ $cms_content[5]['name'] ?? '' }}<span>.</span></h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-7">
                        <div class="ltn__feature-icon-title">
                            <div class="ltn__feature-icon">
                                <span><i class="icon-car-parts-3"></i></span>
                            </div>
                            <h3><a href="{{route('stores.index')}}">{{ $cms_content[5]['item_1'] ?? '' }}</a></h3>
                        </div>
                        <div class="ltn__feature-info">
                            <p>{!! $cms_content[5]['description_1'] ?? '' !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-7">
                        <div class="ltn__feature-icon-title">
                            <div class="ltn__feature-icon">
                                <span><i class="icon-mechanic"></i></span>
                            </div>
                            <h3><a href="{{route('stores.index')}}">{{ $cms_content[5]['item_2'] ?? '' }}</a></h3>
                        </div>
                        <div class="ltn__feature-info">
                            <p>{!! $cms_content[5]['description_2'] ?? '' !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-7">
                        <div class="ltn__feature-icon-title">
                            <div class="ltn__feature-icon">
                                <span><i class="icon-repair"></i></span>
                            </div>
                            <h3><a href="{{route('stores.index')}}">{{ $cms_content[5]['item_3'] ?? '' }}</a></h3>
                        </div>
                        <div class="ltn__feature-info">
                            <p>{!! $cms_content[5]['description_3'] ?? '' !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ltn__progress-bar-area before-bg-right pt-115 pb-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ltn__progress-bar-wrap">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// {{ $cms_content[7]['name'] ?? '' }}</h6>
                            <h1 class="section-title">{{ $cms_content[7]['item_1'] ?? '' }}<span>.</span></h1>
                            <p>{!! $cms_content[7]['description_1'] ?? '' !!}</p>
                        </div>
                        @php
                            $count1 = $cms_content[7]['count_1'] ?? 0;
                            $count2 = $cms_content[7]['count_2'] ?? 0;
                            $count3 = $cms_content[7]['count_3'] ?? 0;
                        @endphp

                        <style>
                            .progress {
                                background-color: #eee;
                                height: 6px;
                                border-radius: 5px;
                                position: relative;
                            }

                            .progress-bar {
                                background-color: #e4002b !important;
                                /* 🔴 Red bar */
                                height: 6px;
                                border-radius: 5px;
                            }

                            .progress-count {
                                position: absolute;
                                right: 0;
                                top: -20px;
                                color: #e4002b;
                                /* 🔴 Red text */
                                font-weight: bold;
                                font-size: 14px;
                            }
                        </style>

                        <div class="ltn__progress-bar-inner">
                            <div class="ltn__progress-bar-item mb-4">
                                <p>{{ $cms_content[7]['item_2'] ?? '' }}</p>
                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ $count1 }}%;"></div>
                                    <span class="progress-count">{{ $count1 }}%</span>
                                </div>
                            </div>

                            <div class="ltn__progress-bar-item mb-4">
                                <p>{{ $cms_content[7]['item_3'] ?? '' }}</p>
                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ $count2 }}%;"></div>
                                    <span class="progress-count">{{ $count2 }}%</span>
                                </div>
                            </div>

                            <div class="ltn__progress-bar-item mb-4">
                                <p>{{ $cms_content[7]['item_4'] ?? '' }}</p>
                                <div class="progress">
                                    <div class="progress-bar" style="width: {{ $count3 }}%;"></div>
                                    <span class="progress-count">{{ $count3 }}%</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @php
                    $videoUrl = $cms_content[7]['video'] ?? null;
                    $videoId = null;

                    if ($videoUrl) {
                        if (preg_match('/youtu\.be\/([^\?&]+)/', $videoUrl, $matches)) {
                            $videoId = $matches[1];
                        } elseif (preg_match('/youtube\.com\/watch\?v=([^\?&]+)/', $videoUrl, $matches)) {
                            $videoId = $matches[1];
                        } elseif (preg_match('/embed\/([^\?&]+)/', $videoUrl, $matches)) {
                            $videoId = $matches[1];
                        }
                    }

                    $thumb = $videoId ? "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg" : null;
                @endphp

                @if ($videoId)
                    <div class="col-lg-6 align-self-center">
                        <div class="ltn__video-bg-img ltn__video-popup-height-500 bg-overlay-black-50-- bg-image ml-30"
                            style="background: #000 url('{{ $thumb }}') center center / cover no-repeat; min-height: 300px;">
                            <a class="ltn__video-icon-2 ltn__video-icon-2-border---"
                                href="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&showinfo=0"
                                data-rel="lightcase:myCollection">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection
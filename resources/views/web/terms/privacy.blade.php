@extends('web.layouts.master')

@section('title', 'Privacy Policy')
@section('description', 'Privacy policy page for users')

@section('content')

<div class="ltn__utilize-overlay"></div>

<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
    data-bs-bg="{{asset('web/img/bg/9.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color">// Welcome to our company</h6>
                        <h1 class="section-title white-color">Privacy Policy</h1>
                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>Privacy Policy</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- Privacy Policy Content -->
<div class="ltn__about-us-area pt-120 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 align-self-center">
                <div class="about-us-info-wrap">

                    @if($content)
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// Privacy Policy</h6>
                            <h1 class="section-title">{{ $content->title ?? 'Privacy Policy' }}<span>.</span></h1>
                        </div>
                        <div class="policy-content">
                            {!! $content->description !!}
                        </div>
                    @else
                        <div class="alert alert-warning">
                            Privacy policy content not found.
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

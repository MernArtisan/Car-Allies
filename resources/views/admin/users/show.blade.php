@extends('admin.layouts.master')
@section('title', 'User Management')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">
                                    @if ($user->hasRole('vendor'))
                                        Vendor: {{ $user->vendor->name }}
                                    @else
                                        Customer: {{ $user->name }}
                                    @endif
                                </h4>

                                <a href="{{ route('admin.users.index') }}" class="btn btn-dark">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if ($user->hasRole('vendor'))
            <section class="section">
                <div class="section-body">
                    <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="card author-box">
                                <div class="card-body">
                                    <div class="author-box-center">
                                        @if ($user->hasRole('vendor'))
                                            <img alt="image" src="{{ asset('uploads/vendors/' . $user->vendor->image) }}"
                                                class="author-box-picture">
                                        @else
                                            <img alt="image" src="{{ asset('uploads/profileImage/' . $user->image) }}"
                                                class="author-box-picture">
                                        @endif
                                        <div class="clearfix"></div>
                                        <div class="author-box-name">
                                            <a href="#">{{ $user->vendor->name ?? 'N/A' }}</a>
                                        </div>
                                        <div class="author-box-job">{{ $user->name ?? 'N/A' }}</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="author-box-description">
                                            <p>
                                                {!! Str::limit($user->vendor->description) ?? 'N/A' !!}
                                            </p>
                                            <p>
                                                Profile Rating {{ round($averageVendorRating, 2) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Personal Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="py-4">
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Registered Date
                                            </span>
                                            <span class="float-right text-muted">
                                                {{ $user->vendor->created_at->format('d M Y') }}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Phone
                                            </span>
                                            <span class="float-right text-muted">
                                                {{ $user->phone ?? 'N/A' }}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Email
                                            </span>
                                            <span class="float-right text-muted">
                                                {{ $user->email ?? 'N/A' }}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Country/State
                                            </span>
                                            <span class="float-right text-muted">
                                                <a href="#">{{ $user->country ?? 'N/A' }} |
                                                    {{ $user->state ?? 'N/A' }}</a>
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                City/Zip
                                            </span>
                                            <span class="float-right text-muted">
                                                <a href="#">{{ $user->city ?? 'N/A' }} |
                                                    {{ $user->zip ?? 'N/A' }}</a>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Product & Services Overview</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="media-title"><strong>Total Products:</strong>
                                                    {{ $totalProducts }}
                                                </div>
                                                <div class="media-title"><strong>Product Rating:</strong>
                                                    {{ round($averageProductRating, 2) }}</div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="media-title"><strong>Total Services:</strong>
                                                    {{ $totalServices }}
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-12 col-lg-8">
                            <div class="card">
                                <div class="padding-20">
                                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about"
                                                role="tab" aria-selected="true">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="nav-link">Edit</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content tab-bordered" id="myTab3Content">
                                        <div class="tab-pane fade show active" id="about" role="tabpanel"
                                            aria-labelledby="home-tab2">
                                            <div class="row">
                                                <div class="col-md-3 col-6 b-r">
                                                    <strong>Full Name</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $user->name ?? 'N/A' }}</p>
                                                </div>
                                                <div class="col-md-3 col-6 b-r">
                                                    <strong>Mobile</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $user->phone ?? 'N/A' }}</p>
                                                </div>
                                                <div class="col-md-3 col-6 b-r">
                                                    <strong>Email</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $user->email ?? 'N/A' }}</p>
                                                </div>
                                                <div class="col-md-3 col-6">
                                                    <strong>Country</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $user->country ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                            <div class="section-title">About</div>
                                            <p class="m-t-30">{!! $user->vendor->description ?? 'N/A' !!}</p>
                                            <div class="section-title">Location</div>
                                            <p class="m-t-30">{!! $user->vendor->location ?? 'N/A' !!}</p>
                                            <div class="section-title">Establish Since</div>
                                            <ul>
                                                <li>{{ $user->vendor->establish_since ?? 'N/A' }}</li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="section">
                <div class="section-body">
                    <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="card author-box">
                                <div class="card-body">
                                    <div class="author-box-center">
                                        <img alt="image" src="{{ asset('uploads/profileImage/' . $user->image) }}"
                                            class="author-box-picture">
                                        <div class="clearfix"></div>
                                        <div class="author-box-name">
                                            <a href="#">{{ $user->name }}</a>
                                        </div>
                                        <div class="author-box-job">{{ $user->name }}</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="author-box-description">
                                            <p>Customer Profile</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Personal Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="py-4">
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Registered Date
                                            </span>
                                            <span class="float-right text-muted">
                                                {{ $user->created_at->format('d M Y') }}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Phone
                                            </span>
                                            <span class="float-right text-muted">
                                                {{ $user->phone ?? 'N/A' }}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Email
                                            </span>
                                            <span class="float-right text-muted">
                                                {{ $user->email ?? 'N/A' }}
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Country/State
                                            </span>
                                            <span class="float-right text-muted">
                                                <a href="#">{{ $user->country ?? 'N/A' }} |
                                                    {{ $user->state ?? 'N/A' }}</a>
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                City/Zip
                                            </span>
                                            <span class="float-right text-muted">
                                                <a href="#">{{ $user->city ?? 'N/A' }} |
                                                    {{ $user->zip ?? 'N/A' }}</a>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-8">
                            <div class="card">
                                <div class="padding-20">
                                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about"
                                                role="tab" aria-selected="true">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="nav-link">Edit</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content tab-bordered" id="myTab3Content">
                                        <div class="tab-pane fade show active" id="about" role="tabpanel"
                                            aria-labelledby="home-tab2">
                                            <div class="row">
                                                <div class="col-md-3 col-6 b-r">
                                                    <strong>Full Name</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $user->name ?? 'N/A' }}</p>
                                                </div>
                                                <div class="col-md-3 col-6 b-r">
                                                    <strong>Mobile</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $user->phone ?? 'N/A' }}</p>
                                                </div>
                                                <div class="col-md-3 col-6 b-r">
                                                    <strong>Email</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $user->email ?? 'N/A' }}</p>
                                                </div>
                                                <div class="col-md-3 col-6">
                                                    <strong>Country</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $user->country ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </div>
@endsection

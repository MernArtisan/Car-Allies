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
                                    {{-- @if ($user->hasRole('vendor')) --}}
                                    Vendor: {{ $vendor->name }}
                                    {{-- @else
                                        Customer: {{ $user->name }}
                                    @endif --}}
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
        <section class="section">
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="card author-box">
                            <div class="card-body">
                                <div class="author-box-center">
                                    <img alt="image" src="{{ asset('uploads/vendors/' . $vendor->image) }}"
                                        class="author-box-picture">
                                    <div class="clearfix"></div>
                                    <div class="author-box-name">
                                        <a href="#">{{ $vendor->name ?? 'N/A' }}</a>
                                    </div>
                                    <div class="author-box-job">{{ $vendor->name ?? 'N/A' }}</div>
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
                                            {{ $vendor->created_at->format('d M Y') }}
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Phone
                                        </span>
                                        <span class="float-right text-muted">
                                            {{ $vendor->user->phone ?? 'N/A' }}
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Email
                                        </span>
                                        <span class="float-right text-muted">
                                            {{ $vendor->user->email ?? 'N/A' }}
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Country/State
                                        </span>
                                        <span class="float-right text-muted">
                                            <a href="#">{{ $vendor->user->country ?? 'N/A' }} |
                                                {{ $vendor->user->state ?? 'N/A' }}</a>
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            City/Zip
                                        </span>
                                        <span class="float-right text-muted">
                                            <a href="#">{{ $vendor->user->city ?? 'N/A' }} |
                                                {{ $vendor->user->zip ?? 'N/A' }}</a>
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
                                </ul>
                                <div class="tab-content tab-bordered" id="myTab3Content">
                                    <div class="tab-pane fade show active" id="about" role="tabpanel"
                                        aria-labelledby="home-tab2">
                                        <div class="row">
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Name</strong>
                                                <br>
                                                <p class="text-muted">{{ $vendor->user->name ?? 'N/A' }}</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted">{{ $vendor->user->phone ?? 'N/A' }}</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">{{ $vendor->user->email ?? 'N/A' }}</p>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <strong>Country</strong>
                                                <br>
                                                <p class="text-muted">{{ $vendor->user->country ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                        <div class="section-title">About</div>
                                        <p class="m-t-30">{!! $vendor->description ?? 'N/A' !!}</p>
                                        <div class="section-title">Location</div>
                                        <p class="m-t-30">{!! $vendor->location ?? 'N/A' !!}</p>
                                        <div class="section-title">Establish Since</div>
                                        <ul>
                                            <li>{{ $vendor->establish_since ?? 'N/A' }}</li>
                                        </ul>

                                        <!-- Buttons for Approve, Hold, Block -->
                                        <div class="mt-4">
                                            <button class="btn btn-success"
                                                onclick="changeVendorStatus('approved')">Approve</button>
                                            {{-- <button class="btn btn-warning"
                                                onclick="changeVendorStatus('hold')">Hold</button> --}}
                                            <button class="btn btn-danger"
                                                onclick="changeVendorStatus('blocked')">Block</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        function changeVendorStatus(status) {
                            let vendorId = {{ $vendor->id }};
                            let statusValue;

                            // Map the status to numerical values
                            if (status === 'approved') {
                                statusValue = 2; // Active
                            } else if (status === 'hold') {
                                statusValue = 1; // Hold
                            } else if (status === 'blocked') {
                                statusValue = 0; // Block
                            }

                            // Send AJAX request to change status
                            $.ajax({
                                url: '/admin/vendors/change-status/' + vendorId,
                                type: 'POST',
                                data: {
                                    status: statusValue,
                                    _token: '{{ csrf_token() }}' // Laravel CSRF protection
                                },
                                success: function(response) {
                                    alert(response.message); // Display success message
                                    location.href = '/admin/dashboard'; // Reload the page after success
                                },
                                error: function(response) {
                                    alert(response.responseJSON.message); // Display error message
                                }
                            });
                        }
                    </script>


                </div>
            </div>
        </section>

    </div>
@endsection

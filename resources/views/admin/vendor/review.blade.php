@extends('admin.layouts.master')
@section('title', 'Vendors Reviews')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Vendors Reviews</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="tableExport">
                                        <!-- Vendor Reviews Table -->
                                        <thead>
                                            <tr>
                                                <th width="10%">Image</th>
                                                <th width="70%">Name</th>
                                                <th>Total Reviews</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productTableBody">
                                            @forelse ($vendorsReview as $vendor)
                                                <tr>
                                                    <td>
                                                        <a href="{{ $vendor->image ? asset('uploads/vendors/' . $vendor->image) : asset('default.png') }}"
                                                            target="_blank">
                                                            <img src="{{ $vendor->image ? asset('uploads/vendors/' . $vendor->image) : asset('default.png') }}"
                                                                width="65" height="65" style="object-fit: cover;">
                                                        </a>
                                                    </td>
                                                    <td>{{ $vendor->name ?? 'N/A' }} <br> {{ $vendor->user->email ?? 'N/A' }} </td>
                                                    <td>{{ $vendor->reviews->count() ?? 'N/A' }}</td>
                                                    <td>
                                                        <!-- Button to trigger modal -->
                                                        <button type="button" class="btn btn-dark btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#reviewsModal{{ $vendor->id }}">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">No vendors found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @foreach ($vendorsReview as $vendor)
    <div class="modal fade" id="reviewsModal{{ $vendor->id }}" tabindex="-1" role="dialog"
        aria-labelledby="reviewsModalLabel{{ $vendor->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewsModalLabel{{ $vendor->id }}">
                        Reviews for {{ $vendor->name }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($vendor->reviews->count() > 0)
                    <div class="reviews-container">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vendor->reviews as $review)
                                <tr>
                                    <td>{{ $review->user->name ?? 'N/A' }}</td>
                                    <td>{{ $review->rating ?? 'N/A' }}</td>
                                    <td>{{ $review->review ?? 'N/A' }}</td>
                                    <td>
                                        @if ($review->image)
                                        <img src="{{ asset('uploads/vendorReviews/' . $review->image) }}" alt="Review Image"
                                            style="max-width: 100px;">
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p>No reviews found for this vendor.</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <style>
        /* Custom CSS to position modal on the right side */
        .modal.fade .modal-dialog {
            position: fixed;
            right: 0;
            top: 0;
            margin: 0;
            height: 100%;
            transform: translateX(100%);
            transition: transform 0.3s ease-out;
        }
    
        .modal.fade.show .modal-dialog {
            transform: translateX(0);
        }
    
        .modal-content {
            height: 100%;
            border-radius: 0;
        }
    
        /* Fix for modal backdrop */
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.5);
        }
    
        .modal-backdrop.show {
            opacity: 1;
        }
    
        /* Custom CSS for Scrollable Reviews */
        .reviews-container {
            max-height: 70vh; /* Adjust height as needed */
            overflow-y: auto; /* Enable vertical scrolling */
            padding-right: 10px; /* Add some padding to avoid overlap with scrollbar */
        }
    
        .reviews-container table {
            width: 100%;
        }
    
        .reviews-container table th,
        .reviews-container table td {
            padding: 10px;
            text-align: left;
        }
    
        .reviews-container table img {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
        }
    </style>
@endsection

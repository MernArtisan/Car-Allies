@extends('admin.layouts.master')
@section('title', 'Requested Vendors')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Blocked Vendors</h4>
                                {{-- <a href="{{ route('admin.users.create') }}" class="btn btn-dark"><i class="fas fa-plus"></i>
                                    Create</a> --}}
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
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Location</th>
                                                <th>Established Since</th>
                                                <th>status</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productTableBody">
                                            @forelse ($vendors as $vendor)
                                                <tr>
                                                    <td>
                                                        <a href="{{ $vendor->image ? asset('uploads/vendors/' . $vendor->image) : asset('default.png') }}"
                                                            target="_blank">
                                                            <img src="{{ $vendor->image ? asset('uploads/vendors/' . $vendor->image) : asset('default.png') }}"
                                                            width="65" height="65" style="object-fit: cover;">
                                                        </a>
                                                    </td>

                                                    <td>{{ $vendor->name ?? 'N/A' }}</td>
                                                    <td>{{ $vendor->location ?? 'N/A' }}</td>
                                                    <td>{{ $vendor->establish_since ?? 'N/A' }}</td>
                                                    <td>
                                                        @if ($vendor->status == 2)
                                                            <!-- Status is Active, show a green button -->
                                                            <span class="badge badge-success">Approved</span>
                                                        @elseif ($vendor->status == 1)
                                                            <!-- Status is Hold, show a yellow (warning) button -->
                                                            <span class="badge badge-warning">Hold</span>
                                                        @elseif ($vendor->status == 0)
                                                            <!-- Status is Blocked, show a red button -->
                                                            <span class="badge badge-danger">Blocked</span>
                                                        @else
                                                            <!-- Default case, if status is not found -->
                                                            <span class="badge badge-secondary">N/A</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $vendor->created_at->format('Y-m-d') }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.vendors.show', $vendor->id) }}"
                                                            class="btn btn-dark btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
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
@endsection

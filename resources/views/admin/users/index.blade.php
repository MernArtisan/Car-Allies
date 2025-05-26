@extends('admin.layouts.master')
@section('title', 'User Management')
@section('content')
    <style>
        .nav-link {
            cursor: pointer;
        }
    </style>
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">User/Vendors Management</h4>
                                <a href="{{ route('admin.users.create') }}" class="btn btn-dark"><i class="fas fa-plus"></i>
                                    Create</a>
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
                                <ul class="nav nav-tabs" id="userTabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-dark active" id="total-vendor-tab" data-toggle="tab"
                                            href="#total-vendor" role="tab" aria-controls="total-vendor"
                                            aria-selected="false">
                                            Total Vendor <span class="badge badge-dark">{{ $vendors->count() }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" id="all-customer-tab" data-toggle="tab"
                                            href="#all-customer" role="tab" aria-controls="all-customer"
                                            aria-selected="false">
                                            All Customer <span class="badge badge-dark">{{ $customers->count() }}</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab Content -->
                                <div class="tab-content mt-4" id="userTabContent">
                                    <div class="tab-pane fade show active" id="total-vendor" role="tabpanel"
                                        aria-labelledby="total-vendor-tab">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-2">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Vendor/Store Name</th>
                                                        {{-- <th>Description</th> --}}
                                                        <th>location</th>
                                                        <th>Country</th>
                                                        <th>State</th>
                                                        <th>City</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($vendors as $key => $vendor)
                                                        <tr>
                                                            <td>
                                                                <a href="{{ $vendor->vendor->image ? asset('uploads/vendors/' . $vendor->vendor->image) : asset('default.png') }}" target="_blank">
                                                                    <img src="{{ $vendor->vendor->image ? asset('uploads/vendors/' . $vendor->vendor->image) : asset('default.png') }}" width="65" height="65" style="object-fit: cover;">
                                                                </a>
                                                            </td>
                                                            
                                                            <td>{{ $vendor->vendor->name ?? 'N/A' }}</td>
                                                            <td>{{ $vendor->vendor->location ?? 'N/A' }}</td>
                                                            <td>{{ $vendor->country ?? 'N/A' }}</td>
                                                            <td>{{ $vendor->state ?? 'N/A' }}</td>
                                                            <td>{{ $vendor->city ?? 'N/A' }}</td>
                                                            <td>
                                                                <a href="{{ route('admin.users.show', $vendor->id) }}"
                                                                    class="btn btn-dark btn-sm">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>

                                                                <a href="{{ route('admin.users.edit', $vendor->id) }}"
                                                                    class="btn btn-sm btn-primary">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>

                                                                {{-- <form id="deleteForm-{{ $vendor->id }}"
                                                                    action="{{ route('admin.users.destroy', $vendor->id) }}"
                                                                    method="POST" style="display: inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button type="button" class="btn btn-danger btn-sm"
                                                                        onclick="confirmDelete('deleteForm-{{ $vendor->id }}')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form> --}}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- All Customer Tab -->
                                    <div class="tab-pane fade" id="all-customer" role="tabpanel"
                                        aria-labelledby="all-customer-tab">
                                        <!-- Customer Table -->
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Customer Name</th>
                                                        <th>Country</th>
                                                        <th>State</th>
                                                        <th>City</th>
                                                        <th>Email</th>
                                                        <th>Registered Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($customers as $customer)
                                                        <tr>
                                                            <td>
                                                                <a href="{{ $customer->image ? asset('uploads/profileImage/' . $customer->image) : asset('default.png') }}" target="_blank">
                                                                    <img src="{{ $customer->image ? asset('uploads/profileImage/' . $customer->image) : asset('default.png') }}" width="65" height="65" style="object-fit: cover;">
                                                                </a>
                                                            </td>
                                                            
                                                            <td>{{ $customer->name ?? 'N/A' }}</td>
                                                            <td>{{ $customer->country ?? 'N/A' }}</td>
                                                            <td>{{ $customer->state ?? 'N/A' }}</td>
                                                            <td>{{ $customer->city ?? 'N/A' }}</td>
                                                            <td>{{ $customer->email ?? 'N/A' }}</td>
                                                            <td>{{ $customer->created_at->format('Y-m-d') }}</td>
                                                            <td>
                                                                <a href="{{ route('admin.users.show', $customer->id) }}"
                                                                    class="btn btn-dark btn-sm">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>

                                                                <a href="{{ route('admin.users.edit', $customer->id) }}"
                                                                    class="btn btn-sm btn-primary">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>

                                                                <form id="deleteForm-{{ $customer->id }}"
                                                                    action="{{ route('admin.users.destroy', $customer->id) }}"
                                                                    method="POST" style="display: inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button type="button" class="btn btn-danger btn-sm"
                                                                        onclick="confirmDelete('deleteForm-{{ $customer->id }}')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- Card body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@extends('admin.layouts.master')
@section('title', 'Services Management')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Services Management</h4>
                                @if (Auth::user()->hasRole('vendor'))
                                    <a href="{{ route('admin.services.create') }}" class="btn btn-dark"><i
                                            class="fas fa-plus"></i>
                                        Create</a>
                                @endif
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
                                                <th>Service Name</th>
                                                <th>type</th>
                                                <th>Vendor Name</th>
                                                <th>Price</th>
                                                <th>Status</th> 
                                                <th>Created Date</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productTableBody">
                                            @forelse ($services as $service)
                                                <tr>
                                                    <td>
                                                        @if ($service->image)
                                                            <img src="{{ asset('serviceImage/' . $service->image) }}" alt="Image"
                                                                style="max-width: 60px; max-height: 100px;">
                                                        @else
                                                            <img src="{{ asset('default.png') }}" alt="Image"
                                                                style="max-width: 60px; max-height: 100px;">
                                                        @endif
                                                    </td>
                                                    <td>{{ $service->name ?? 'N/A' }}</td>
                                                    <td>{{ $service->type ?? 'N/A' }}</td>
                                                    <td>{{ $service->vendor->name ?? 'N/A' }}</td>
                                                    <td>${{ $service->price ?? 'N/A' }}</td>
                                                    <td>
                                                        @if ($service->status == 'active')
                                                            <button class="btn btn-sm btn-success">Active</button>
                                                        @elseif($service->status == 'inactive')
                                                            <button class="btn btn-sm btn-danger">Inactive</button>
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>

                                                    <td>{{ $service->created_at->format('Y-m-d') }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('admin.services.show', $service->id) }}"
                                                            class="btn btn-dark btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                        </a>

                                                        @if (Auth::user()->hasRole('vendor'))
                                                            <a href="{{ route('admin.services.edit', $service->id) }}"
                                                                class="btn btn-sm btn-primary">
                                                                <i class="fas fa-edit"></i>
                                                            </a>

                                                            <form id="deleteForm-{{ $service->id }}"
                                                                action="{{ route('admin.services.destroy', $service->id) }}"
                                                                method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    onclick="confirmDelete('deleteForm-{{ $service->id }}')">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        @endif
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
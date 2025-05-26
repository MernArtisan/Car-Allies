@extends('admin.layouts.master')
@section('title', 'Home Banners')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Home Banners</h4>
                                <a href="{{ route('admin.homebanners.create') }}" class="btn btn-dark"><i
                                        class="fas fa-plus"></i> Create</a>
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
                                                <th>Title</th>
                                                <th style="width:50%">Description</th>
                                                <th>Created Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($homeBanners as $key => $homeBanner)
                                                <tr>
                                                    <td>
                                                        <a href="{{ asset('uploads/homebanners/' . $homeBanner->image) }}"
                                                            target="_blank"><img
                                                                src="{{ asset('uploads/homebanners/' . $homeBanner->image) }}" width="65" height="65" style="object-fit: cover;"></a>
                                                    </td>
                                                    <td>{{ $homeBanner->title }}</td>
                                                    <td>{!! $homeBanner->description !!}</td>
                                                    <td>{{ $homeBanner->created_at->format('Y-m-d') }}</td>

                                                    <td>
                                                        @if ($homeBanner->status == 1)
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('admin.homebanners.edit', $homeBanner->id) }}"
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fas fa-edit"></i> <!-- Edit icon -->
                                                        </a>

                                                        <!-- Delete Form -->
                                                        <form id="deleteForm-{{ $homeBanner->id }}" action="{{ route('admin.homebanners.destroy', $homeBanner->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            
                                                            <!-- Button trigger for SweetAlert confirmation -->
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('deleteForm-{{ $homeBanner->id }}')">
                                                                <i class="fas fa-trash"></i> <!-- Trash icon -->
                                                            </button>
                                                        </form>
                                                        
                                                    </td>

                                                </tr>
                                            @endforeach
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

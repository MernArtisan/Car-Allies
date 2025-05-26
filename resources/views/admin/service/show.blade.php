@extends('admin.layouts.master')
@section('title', 'Product Management')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row mt-5">
                    <div class="offset-3 col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Service: {{ $service->name ?? '' }}</h4>
                                <a href="{{ route('admin.services.index') }}" class="btn btn-dark">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <strong>ID: </strong> {{ $service->id }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Vendor: </strong> {{ $service->vendor->name }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Name: </strong> {{ $service->name }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Type: </strong> {{ $service->type }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Status: </strong>
                                                <span class="badge badge-{{ $service->status == 'active' ? 'success' : 'danger' }}">
                                                    {{ ucfirst($service->status) }}
                                                </span>
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Price: </strong> ${{ number_format($service->price, 2) }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

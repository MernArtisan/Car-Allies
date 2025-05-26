@extends('admin.layouts.master')
@section('title', 'Product Management')
@section('content')

    <style>
        select {
            border-radius: 10px !important;
        }

        input {
            border-radius: 10px !important;
        }
    </style>
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Product Management</h4>
                                @if ($user->hasRole('vendor'))
                                    <a href="{{ route('admin.products.create') }}" class="btn btn-dark"><i
                                            class="fas fa-plus"></i>
                                        Create</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if ($user->hasRole('admin'))
            <section class="section">
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div class="col-4">
                                        <select name="" id="categoryFilter" class="form-control">
                                            <option value="">All Categories</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- @if ($user->hasRole('admin')) --}}
                                    <div class="col-4">
                                        <input type="number" id="priceFilter" class="form-control"
                                            placeholder="Search By Price" style="height:43px">
                                    </div>

                                    <div class="col-4">
                                        <select name="" id="vendorFilter" class="form-control">
                                            <option value="">All Vendors</option>
                                            @foreach ($vendors as $vendor)
                                                <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
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
                                                <th>product Name</th>
                                                <th>Category</th>
                                                <th>Vendor Name</th>
                                                <th>Price</th>
                                                <th>QTY</th>
                                                <th>Sold</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productTableBody">
                                            @forelse ($products as $product)
                                                <tr>
                                                    <td>
                                                        @php
                                                            $primaryImage = $product->images
                                                                ->where('is_primary', 1)
                                                                ->first();
                                                        @endphp
                                                    
                                                        <a href="{{ $primaryImage ? asset('uploads/productImages/' . $primaryImage->image) : asset('default.png') }}"
                                                            target="_blank">
                                                            <img src="{{ $primaryImage ? asset('uploads/productImages/' . $primaryImage->image) : asset('default.png') }}"
                                                                width="65" height="65" style="object-fit: cover;">
                                                        </a>
                                                    </td>
                                                    


                                                    <td>{{ $product->name ?? 'N/A' }}</td>
                                                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                                                    <td>{{ $product->vendor->name ?? 'N/A' }}</td>
                                                    <td>${{ $product->price ?? 'N/A' }}</td>
                                                    <td>{{ $product->qty ?? 'N/A' }}</td>
                                                    <td>{{ $totalSold[$product->id] ?? 0 }}</td>
                                                    <td>{{ $product->created_at->format('Y-m-d') }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.products.show', $product->id) }}"
                                                            class="btn btn-dark btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                        </a>

                                                        @if (Auth::user()->hasRole('vendor'))
                                                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                                                class="btn btn-sm btn-primary">
                                                                <i class="fas fa-edit"></i>
                                                            </a>

                                                            <form id="deleteForm-{{ $product->id }}"
                                                                action="{{ route('admin.products.destroy', $product->id) }}"
                                                                method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    onclick="confirmDelete('deleteForm-{{ $product->id }}')">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryFilter = document.getElementById('categoryFilter');
            const vendorFilter = document.getElementById('vendorFilter');
            const priceFilter = document.getElementById('priceFilter');
            const productTableBody = document.getElementById('productTableBody');

            function filterTable() {
                const categoryValue = categoryFilter.value;
                const vendorValue = vendorFilter.value;
                const priceValue = priceFilter.value;

                const rows = productTableBody.querySelectorAll('tr');
                rows.forEach(row => {
                    const category = row.querySelector('td:nth-child(3)').innerText.trim();
                    const vendor = row.querySelector('td:nth-child(4)').innerText.trim();
                    const price = parseFloat(row.querySelector('td:nth-child(5)').innerText.replace('$', '')
                        .trim());

                    let categoryMatch = categoryValue === "" || category === categoryFilter.options[
                        categoryFilter.selectedIndex].text;
                    let vendorMatch = vendorValue === "" || vendor === vendorFilter.options[vendorFilter
                        .selectedIndex].text;
                    let priceMatch = priceValue === "" || price <= parseFloat(priceValue);

                    if (categoryMatch && vendorMatch && priceMatch) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                });
            }
            categoryFilter.addEventListener('change', filterTable);
            vendorFilter.addEventListener('change', filterTable);
            priceFilter.addEventListener('input', filterTable);
        });
    </script>

@endsection

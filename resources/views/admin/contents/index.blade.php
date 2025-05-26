@extends('admin.layouts.master')
@section('title', 'Content Management')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Content Management</h4>
                                {{-- <a href="{{ route('admin.homebanners.create') }}" class="btn btn-dark"><i
                                        class="fas fa-plus"></i> Create</a> --}}
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
                                                <th>ID</th>
                                                <th>Page Name</th>
                                                <th>Name</th>
                                                <th style="width:50%">Description</th>
                                                <th>Updated Date</th>
                                                {{-- <th>Uses</th> --}}
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contents as $key => $content)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $content->page_name ?? 'N/A' }}</td>
                                                    <td>{{ $content->name ?? 'N/A' }}</td>
                                                    <td>{!! Str::limit(strip_tags($content->description ?? 'N/A'), 80) !!} </td>

                                                    <td>{{ $content->updated_at->format('F d, Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.contents.edit', $content->id) }}"
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
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

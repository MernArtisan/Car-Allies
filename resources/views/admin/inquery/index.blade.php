@extends('admin.layouts.master')
@section('title', 'inqueries Management')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Inqueries Management</h4>
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
                                <div class="table-responsive mt-3">
                                    <table class="table table-striped" id="tableExport">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Message</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($inqueries as $key => $contact)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $contact->name ?? 'N/A' }}</td>
                                                    <td>{{ $contact->email ?? 'N/A' }}</td>
                                                    <td>{{ $contact->phone ?? 'N/A' }}</td>
                                                    <td>{{ $contact->message ?? 'N/A' }}</td>
                                                    <td>
                                                        @if ($contact->seen)
                                                            <span class="badge badge-success">Seen</span>
                                                        @else
                                                            <span class="badge badge-danger">Unseen</span>
                                                        @endif
                                                    </td>
                                                    @if ($contact->seen == 1)
                                                        <td class="text-center">
                                                            <a href="#" class="btn btn-success btn-sm">
                                                                Read
                                                            </a>
                                                        </td>
                                                    @else
                                                        <td class="text-center">
                                                            <a href="{{ route('admin.inquiries.show', $contact->id) }}"
                                                                class="btn btn-dark btn-sm">
                                                                Mark As Read
                                                            </a>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">No inquiries found</td>
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
@endsection

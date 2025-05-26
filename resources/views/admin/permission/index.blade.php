@extends('admin.layouts.master')
@section('title', 'Permission List')

@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Permission List</h4>
                                {{-- <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                    data-target="#createpermission">
                                    <i class="fas fa-key"></i> + Create New Permission
                                </button> --}}
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
                                                <th width="2%">ID</th>
                                                <th width="20%">Permission Name</th>
                                                <th>Permission Details</th>
                                                <th width="10%" class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permissions as $key => $permission)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $permission->name }}</td>
                                                    <td>{{ $permission->details }}</td>
                                                    <td class="text-red text-center">
                                                        <span data-toggle="tooltip" data-placement="top"
                                                            title="Only Developer Can Change">
                                                            Note
                                                        </span>
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



    <div class="modal fade" id="createpermission" tabindex="-1" role="dialog" aria-labelledby="createPermissionLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="createPermissionLabel">Create Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.permissions.store') }}" id="createPermissionForm"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="name" class="form-label">Permission Name</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="fas fa-key"></i></div>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name') }}" required>
                                    </div>
                                    @error('name')
                                        <small id="nameError" class="text-danger">{{ $message }}</small>
                                    @enderror

                                    <label for="details" class="form-label">Permission Details</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="fas fa-file-alt"></i>
                                        </div>
                                        <input type="text" class="form-control" id="details" name="details"
                                            value="{{ old('details') }}" required>
                                    </div>
                                    @error('details')
                                        <small id="nameError" class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Create Permission</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    <script></script>
@endsection

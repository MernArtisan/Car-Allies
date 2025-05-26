@extends('admin.layouts.master')
@section('title', 'Create New Role')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="page-title m-b-0">Create Role</h4>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-dark">
                            <i class="fas fa-arrow-left"></i> Back To List
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.roles.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Role Name -->
                            <div class="form-group">
                                <label for="name" class="text-dark font-weight-bold">Role Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-dark text-white"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ old('name') }}" placeholder="Enter role name" required>
                                </div>
                                @error('name')
                                    <small id="nameError" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Assign Permissions -->
                            <div class="form-group">
                                <label for="permissions" class="text-dark font-weight-bold">Assign Permissions</label>
                                <div class="border border-info p-3 rounded">
                                    <!-- "Select All" Checkbox -->
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="select-all">
                                        <label class="form-check-label text-dark font-weight-bold" for="select-all">
                                            Select All
                                        </label>
                                    </div>
                                    <hr>

                                    <!-- List all available permissions with checkboxes -->
                                    <div class="row">
                                        @foreach ($permissions as $permission)
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input permission-checkbox" type="checkbox"
                                                           name="permissions[]" value="{{ $permission->id }}"
                                                           id="permission-{{ $permission->id }}">
                                                    <label class="form-check-label text-dark"
                                                           for="permission-{{ $permission->id }}">
                                                        <b class="text-info">{{ $permission->name }}</b>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @error('permissions')
                                    <small id="permissionsError" class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @section('scripts')
        <script>
            // Select/Deselect all permissions when "Select All" checkbox is toggled
            document.getElementById('select-all').addEventListener('change', function () {
                var checkboxes = document.querySelectorAll('.permission-checkbox');
                for (var checkbox of checkboxes) {
                    checkbox.checked = this.checked;
                }
            });
        </script>
    @endsection
@endsection

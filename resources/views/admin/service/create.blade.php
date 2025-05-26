@extends('admin.layouts.master')
@section('title', 'Service Create')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Create Service</h4>
                                <a href="{{ route('admin.services.index') }}" class="btn btn-dark"><i
                                        class="fas fa-arrow-left"></i> Back To List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.services.store') }}" method="POST"
                                    enctype="multipart/form-data" id="serviceForm">
                                    @csrf
                                    <div class="row">
                                        <!-- Service Name Field -->
                                        <div class="form-group col-lg-6 col-md-8">
                                            <label for="name">Service Name</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-tag"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="name" name="name" class="form-control"
                                                    placeholder="Enter service name">
                                            </div>
                                            <small class="text-danger" id="nameError"
                                                style="color: red; display: none;">Please enter a valid service
                                                name.</small>
                                        </div>
                                        <!-- Service Type Field -->
                                        <div class="form-group col-lg-6 col-md-8">
                                            <label for="type">Service Type</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-list-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="type" name="type" class="form-control"
                                                    placeholder="Enter service type">
                                            </div>
                                            <small class="text-danger" id="typeError"
                                                style="color: red; display: none;">Please enter a valid service
                                                type.</small>
                                        </div>

                                        <!-- Price Field -->
                                        <div class="form-group col-lg-6 col-md-8">
                                            <label for="price">Price</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </span>
                                                </div>
                                                <input type="number" id="price" name="price" class="form-control"
                                                    placeholder="Enter price">
                                            </div>
                                            <small class="text-danger" id="priceError"
                                                style="color: red; display: none;">Please enter a valid price.</small>
                                        </div>

                                        <!-- Status Field -->
                                        <div class="form-group col-lg-6 col-md-8">
                                            <label for="status">Status</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-info-circle"></i>
                                                    </span>
                                                </div>
                                                <select id="status" name="status" class="form-control">
                                                    <option value="">Select Status</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </div>
                                            <small class="text-danger" id="statusError"
                                                style="color: red; display: none;">Please select a valid status.</small>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="description">Description</label>
                                            <div class="input-group">
                                                <textarea id="description" name="description" class="form-control summernote"
                                                    placeholder="Enter product description" rows="3"></textarea>
                                            </div>
                                            <small class="text-danger" id="descriptionError"
                                                style="color: red; display: none;">Description is required.</small>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-8">
                                            <label for="status">Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark">Submit</button>
                                    </div>
                                </form>

                                <script>
                                    document.getElementById('serviceForm').addEventListener('submit', function (e) {
                                        e.preventDefault();
                                        let isFormValid = true;

                                        const fieldsToValidate = ['name', 'type', 'price', 'status'];

                                        fieldsToValidate.forEach(function (fieldId) {
                                            const field = document.getElementById(fieldId);
                                            const isValid = validateField(field);

                                            if (!isValid) {
                                                isFormValid = false;
                                            }
                                        });

                                        if (isFormValid) {
                                            e.target.submit();
                                        }
                                    });

                                    function validateField(field) {
                                        let isValid = true;

                                        switch (field.id) {
                                            case 'name':
                                                isValid = field.value.trim().length > 0;
                                                toggleError(field, 'nameError', isValid);
                                                break;
                                            case 'type':
                                                isValid = field.value.trim().length > 0;
                                                toggleError(field, 'typeError', isValid);
                                                break;
                                            case 'price':
                                                isValid = field.value > 0;
                                                toggleError(field, 'priceError', isValid);
                                                break;
                                            case 'status':
                                                isValid = field.value !== '';
                                                toggleError(field, 'statusError', isValid);
                                                break;
                                        }

                                        return isValid;
                                    }

                                    function toggleError(field, errorId, isValid) {
                                        const errorField = document.getElementById(errorId);
                                        if (isValid) {
                                            errorField.style.display = 'none';
                                            field.classList.remove('is-invalid');
                                        } else {
                                            errorField.style.display = 'block';
                                            field.classList.add('is-invalid');
                                        }
                                    }
                                </script>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
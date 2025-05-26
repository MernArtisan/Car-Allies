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
                                <h4 class="page-title m-b-0">Create Home Banners</h4>
                                <a href="{{ route('admin.homebanners.index') }}" class="btn btn-dark"><i
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
                                <form action="{{ route('admin.homebanners.store') }}" method="POST"
                                    enctype="multipart/form-data" onsubmit="return validateForm();">
                                    @csrf
                                    <!-- Title Field -->
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" name="title" class="form-control"
                                            placeholder="Enter title">
                                        <small id="titleError" class="text-danger"></small> <!-- Error message -->
                                    </div>

                                    <!-- Description Field (with editor) -->
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control summernote" placeholder="Enter description"></textarea>
                                        <small id="descriptionError" class="text-danger"></small> <!-- Error message -->
                                    </div>

                                    <div class="form-group">
                                        <label for="imageUploader">Upload Image</label>

                                        <!-- Image preview with styling -->
                                        <div id="imagePreview" class="mb-2" style="display: none;">
                                            <img src="" alt="Image Preview" id="previewImage"
                                                style="width: 150px; height: 150px; border-radius: 15px; object-fit: cover; box-shadow: 0px 4px 8px rgba(0,0,0,0.1);">
                                        </div>

                                        <!-- File Input with buttons -->
                                        <div class="d-flex">
                                            <!-- Select Button -->
                                            <button type="button" class="btn btn-dark" id="selectBtn"
                                                onclick="document.getElementById('imageUploader').click();">
                                                Select Image
                                            </button>

                                            <!-- Remove Button -->
                                            <button type="button" class="btn btn-danger ml-2" id="removeBtn"
                                                style="display: none;" onclick="removeImage();">
                                                Remove Image
                                            </button>
                                        </div>

                                        <!-- Hidden file input -->
                                        <input type="file" name="image" id="imageUploader" class="form-control-file"
                                            accept="image/*" style="display: none;" onchange="previewFile();">

                                        <small id="imageError" class="text-danger"></small>
                                    </div>

                                    <!-- Status Field -->
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <small id="statusError" class="text-danger"></small> <!-- Error message -->
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')

    <script>
        // Function to validate the form
        function validateForm() {
            // Clear previous error messages initially
            clearErrors();

            let isValid = true;

            const title = document.getElementById('title').value.trim();
            const description = document.getElementById('description').value.trim();
            const image = document.getElementById('imageUploader').value;
            const status = document.getElementById('status').value;

            // Validate Title
            if (title === '') {
                document.getElementById('titleError').innerText = 'Please enter a title.';
                isValid = false;
            }

            // Validate Description
            if (description === '') {
                document.getElementById('descriptionError').innerText = 'Please enter a description.';
                isValid = false;
            }

            // Validate Image Upload
            if (image === '') {
                document.getElementById('imageError').innerText = 'Please select an image to upload.';
                isValid = false;
            }

            // Validate Status
            if (status === '') {
                document.getElementById('statusError').innerText = 'Please select a status.';
                isValid = false;
            }

            return isValid; // If all validations pass, allow form submission
        }

        // Function to clear all error messages
        function clearErrors() {
            document.getElementById('titleError').innerText = '';
            document.getElementById('descriptionError').innerText = '';
            document.getElementById('imageError').innerText = '';
            document.getElementById('statusError').innerText = '';
        }

        // Event listeners to remove error messages on input
        document.getElementById('title').addEventListener('input', function() {
            document.getElementById('titleError').innerText = '';
        });

        document.getElementById('description').addEventListener('input', function() {
            document.getElementById('descriptionError').innerText = '';
        });

        document.getElementById('imageUploader').addEventListener('change', function() {
            document.getElementById('imageError').innerText = '';
        });

        document.getElementById('status').addEventListener('change', function() {
            document.getElementById('statusError').innerText = '';
        });
    </script>
@endsection

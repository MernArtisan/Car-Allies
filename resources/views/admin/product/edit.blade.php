@extends('admin.layouts.master')
@section('title', 'Product Edit')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Create Edit</h4>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-dark"><i
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
                                <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                                    enctype="multipart/form-data" id="productForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <!-- Product Name Field -->
                                        <div class="form-group col-lg-4 col-md-6">
                                            <label for="name">Product Name</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-tag"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="name" name="name" class="form-control"
                                                    placeholder="Enter product name" value="{{ $product->name }}">
                                            </div>
                                            <small class="text-danger" id="nameError"
                                                style="color: red; display: none;">Please enter a valid product
                                                name.</small>
                                        </div>

                                        <!-- Shipping Price Field -->
                                        <div class="form-group col-lg-4 col-md-6">
                                            <label for="shipping_price">Shipping Price</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-shipping-fast"></i>
                                                    </span>
                                                </div>
                                                <input type="number" id="shipping_price" name="shipping_price"
                                                    class="form-control" placeholder="Enter shipping price"
                                                    value="{{ $product->shipping_price }}">
                                            </div>
                                            <small class="text-danger" id="shippingPriceError"
                                                style="color: red; display: none;">Please enter a valid shipping
                                                price.</small>
                                        </div>

                                        <div class="form-group col-lg-4 col-md-6">
                                            <label for="estimated_time">Estimated Delivery Time(3 to 5 days)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-shipping-fast"></i>
                                                    </span>
                                                </div>
                                                <input type="number" id="estimated_time" name="estimated_time"
                                                    class="form-control" placeholder="Enter shipping price"
                                                    value="{{ $product->estimated_time }}">
                                            </div>
                                            <small class="text-danger" id="estimated_timeError"
                                                style="color: red; display: none;">Please enter a valid shipping Estimated
                                                Time</small>
                                        </div>

                                        <!-- Quantity Field -->
                                        <div class="form-group col-lg-4 col-md-6">
                                            <label for="qty">Quantity</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-box"></i>
                                                    </span>
                                                </div>
                                                <input type="number" id="qty" name="qty" class="form-control"
                                                    placeholder="Enter quantity" min="1" value="{{ $product->qty }}">
                                            </div>
                                            <small class="text-danger" id="qtyError"
                                                style="color: red; display: none;">Please enter a valid quantity.</small>
                                        </div>

                                        <!-- Price Field -->
                                        <div class="form-group col-lg-4 col-md-6">
                                            <label for="price">Price</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </span>
                                                </div>
                                                <input type="number" id="price" name="price" class="form-control"
                                                    placeholder="Enter price" value="{{ $product->price }}">
                                            </div>
                                            <small class="text-danger" id="priceError"
                                                style="color: red; display: none;">Please enter a valid price.</small>
                                        </div>

                                        <!-- Category Field -->
                                        <div class="form-group col-lg-4 col-md-6">
                                            <label for="category_id">Category</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-list"></i>
                                                    </span>
                                                </div>
                                                <select id="category_id" name="category_id" class="form-control">
                                                    <option value="">Select category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('category_id') == $category->id || (isset($product) && $product->category_id == $category->id) ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <small class="text-danger" id="categoryError"
                                                style="color: red; display: none;">Please select a category.</small>
                                        </div>


                                        <!-- Description Field -->
                                        <div class="form-group col-lg-12">
                                            <label for="description">Description</label>
                                            <div class="input-group">
                                                <textarea id="description" name="description" class="form-control summernote"
                                                    placeholder="Enter product description" rows="3">{{ $product->description }}</textarea>
                                            </div>
                                            <small class="text-danger" id="descriptionError"
                                                style="color: red; display: none;">Description is required.</small>
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label for="images">Upload Images</label>
                                            <div class="input-group custom-file">
                                                <input type="file" name="images[]" id="images"
                                                    class="custom-file-input" accept="image/*" multiple
                                                    onchange="previewImages()">
                                                <label class="custom-file-label" for="images">Choose images</label>
                                            </div>
                                            <small class="text-muted">You can upload multiple images. (Allowed types: jpeg,
                                                png, jpg, gif, svg, webp)</small>
                                            <small class="text-danger" id="imageError"
                                                style="color: red; display: none;">Please upload valid image files (jpeg,
                                                png, jpg, gif, svg, webp).</small>

                                            <!-- Display existing images if available -->
                                            @if (isset($product) && $product->images)
                                                <div class="mt-3">
                                                    <label>Existing Images:</label>
                                                    <div id="existing-image-preview" class="d-flex flex-wrap">
                                                        @foreach ($product->images as $image)
                                                            <div class="image-container"
                                                                style="position: relative; margin-right: 10px;">
                                                                <img src="{{ asset('uploads/productImages/' . $image->image) }}"
                                                                    alt="Image"
                                                                    style="width: 100px; height: 100px; object-fit: cover;">
                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm remove-image"
                                                                    onclick="removeProductImage('{{ $image->image }}', {{ $product->id }})"
                                                                    style="position: absolute; top: 0; right: 0;">
                                                                    &times;
                                                                </button>

                                                                <input type="hidden" name="existing_images[]"
                                                                    class="" value="{{ $image->image }}">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif

                                            <div id="image-preview" class="mt-3 d-flex flex-wrap"></div>
                                        </div>
                                    </div>

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
        function removeProductImage(imageName, productId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.remove.image') }}', // Route name should be correct
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                            image: imageName,
                            product_id: productId
                        },
                        success: function(response) {
                            if (response.success) {
                                // Remove the image container from the DOM
                                let imageContainer = document.querySelector(
                                    `input[value="${imageName}"]`).parentElement;
                                imageContainer.remove();

                                Swal.fire(
                                    'Deleted!',
                                    'Your image has been deleted.',
                                    'success'
                                );
                            } else {
                                Swal.fire(
                                    'Error!',
                                    response.error,
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong. Please try again.',
                                'error'
                            );
                        }
                    });
                }
            });
        }


        document.getElementById('productForm').addEventListener('submit', function(e) {
            // Prevent form submission initially
            e.preventDefault();
            debugger;

            let isFormValid = true;

            // Validate all fields one by one
            const fieldsToValidate = ['name', 'shipping_price', 'estimated_time', 'qty', 'price', 'category_id',
                'description',
                'images'
            ];

            fieldsToValidate.forEach(function(fieldId) {
                const field = document.getElementById(fieldId);
                const isValid = validateField(field);

                if (!isValid) {
                    isFormValid = false; // If any field is invalid, mark form as invalid
                }
            });

            // If the form is valid, submit the form
            if (isFormValid) {
                e.target.submit();
            } else {
                console.log("Form has errors, fix them before submitting.");
            }
        });


        function validateField(field) {
            debugger;
            let isValid = true;

            switch (field.id) {
                case 'name':
                    isValid = field.value.trim().length > 0;
                    toggleError(field, 'nameError', isValid);
                    break;
                case 'shipping_price':
                    isValid = field.value > 0;
                    toggleError(field, 'shippingPriceError', isValid);
                    break;
                case 'estimated_time':
                    isValid = field.value > 0;
                    toggleError(field, 'estimated_timeError', isValid);
                    break;
                case 'qty':
                    isValid = field.value > 0;
                    toggleError(field, 'qtyError', isValid);
                    break;
                case 'price':
                    isValid = field.value > 0;
                    toggleError(field, 'priceError', isValid);
                    break;
                case 'category_id':
                    isValid = field.value !== '';
                    toggleError(field, 'categoryError', isValid);
                    break;
                case 'description':
                    isValid = field.value.trim().length > 0;
                    toggleError(field, 'descriptionError', isValid);
                    break;
                // case 'images':
                //     isValid = validateImages(field);
                //     toggleError(field, 'imageError', isValid);
                //     break;
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

        function validateImages(input) {
            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml', 'image/webp'];
            const files = input.files;

            if (files.length === 0) return false;

            for (let i = 0; i < files.length; i++) {
                if (!allowedTypes.includes(files[i].type)) {
                    return false;
                }
            }

            return true;
        }

        function previewImages() {
            const preview = document.getElementById('image-preview');
            preview.innerHTML = '';
            const files = document.getElementById('images').files;

            if (files) {
                Array.from(files).forEach(function(file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'img-thumbnail m-2';
                        img.style.width = '150px';
                        img.style.height = '150px';
                        preview.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                });
            }
        }
    </script>

@endsection

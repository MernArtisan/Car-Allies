@extends('admin.layouts.master')
@section('title', 'Edit Home Banner')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="page-title m-b-0">Edit Content : {{ $content->name }}</h4>
                                <a href="{{ route('admin.contents.index') }}" class="btn btn-dark"><i
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
                                <form action="{{ route('admin.contents.update', $content->id) }}" method="POST"
                                    enctype="multipart/form-data" onsubmit="return validateForm();">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="title">Name</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="{{ $content->name }}" placeholder="Enter name">
                                        <small id="userError" class="text-danger"></small>
                                    </div>
                                    @if (in_array($content->id, [1, 2, 3, 4, 5,11]))
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control summernote" placeholder="Enter description">{{ $content->description }}</textarea>
                                            <small id="descriptionError" class="text-danger"></small>
                                        </div>
                                    @endif
                                    @if (in_array($content->id, [6,7,9,10]))
                                        <div class="form-group">
                                            <label for="title">Item 1</label>
                                            <input type="text" id="item_1" name="item_1" class="form-control"
                                                value="{{ $content->item_1 }}" placeholder="Enter item_1">
                                            <small id="userError" class="text-danger"></small>
                                        </div>
                                    @endif
                                    @if (in_array($content->id, [6,7,9,10]))
                                        <div class="form-group">
                                            <label for="description_1">Description 1</label>
                                            <textarea name="description_1" id="description_1" class="form-control summernote" placeholder="Enter description 1">{{ $content->description_1 }}</textarea>
                                            <small id="descriptionError" class="text-danger"></small>
                                        </div>
                                    @endif

                                    @if (in_array($content->id, [6,7,9,10]))
                                        <div class="form-group">
                                            <label for="title">Item 2</label>
                                            <input type="text" id="item_2" name="item_2" class="form-control"
                                                value="{{ $content->item_2 }}" placeholder="Enter item_2">
                                            <small id="userError" class="text-danger"></small>
                                        </div>
                                    @endif
                                    @if (in_array($content->id, [6,7,10]))
                                        <div class="form-group">
                                            <label for="description_1">Description 2</label>
                                            <textarea name="description_2" id="description_2" class="form-control summernote" placeholder="Enter description 2">{{ $content->description_2 }}</textarea>
                                            <small id="descriptionError" class="text-danger"></small>
                                        </div>
                                    @endif

                                    @if (in_array($content->id, [6,7,8,9]))
                                        <div class="form-group">
                                            <label for="title">Item 3</label>
                                            <input type="text" id="item_3" name="item_3" class="form-control"
                                                value="{{ $content->item_3 }}" placeholder="Enter item_3">
                                            <small id="userError" class="text-danger"></small>
                                        </div>
                                    @endif
                                    @if (in_array($content->id, [6,7]))
                                        <div class="form-group">
                                            <label for="description_3">Description 3</label>
                                            <textarea name="description_3" id="description_3" class="form-control summernote" placeholder="Enter description 3">{{ $content->description_3 }}</textarea>
                                            <small id="descriptionError" class="text-danger"></small>
                                        </div>
                                    @endif


                                    @if (in_array($content->id, [7,9]))
                                        <div class="form-group">
                                            <label for="title">Item 4</label>
                                            <input type="text" id="item_4" name="item_4" class="form-control"
                                                value="{{ $content->item_4 }}" placeholder="Enter item_4">
                                            <small id="userError" class="text-danger"></small>
                                        </div>
                                    @endif
                                    @if (in_array($content->id, [7]))
                                        <div class="form-group">
                                            <label for="description_3">Description 4</label>
                                            <textarea name="description_4" id="description_4" class="form-control summernote" placeholder="Enter description 4">{{ $content->description_4 }}</textarea>
                                            <small id="descriptionError" class="text-danger"></small>
                                        </div>
                                    @endif
                                    @if (in_array($content->id, [7]))
                                        <div class="form-group">
                                            <label for="title">Item 5</label>
                                            <input type="text" id="item_5" name="item_5" class="form-control"
                                                value="{{ $content->item_5 }}" placeholder="Enter item_5">
                                            <small id="userError" class="text-danger"></small>
                                        </div>
                                    @endif
                                    @if (in_array($content->id, [7]))
                                        <div class="form-group">
                                            <label for="description_5">Description 5</label>
                                            <textarea name="description_5" id="description_5" class="form-control summernote" placeholder="Enter description 5">{{ $content->description_5 }}</textarea>
                                            <small id="descriptionError" class="text-danger"></small>
                                        </div>
                                    @endif


                                    @if (in_array($content->id, [9]))
                                        <div class="form-group">
                                            <label for="count_1">Count 1</label>
                                            <input type="text" id="count_1" name="count_1" class="form-control"
                                                value="{{ $content->count_1 }}" placeholder="Enter count_1">
                                            <small id="userError" class="text-danger"></small>
                                        </div>
                                    @endif
                                    @if (in_array($content->id, [9]))
                                        <div class="form-group">
                                            <label for="count_1">Count 2</label>
                                            <input type="text" id="count_1" name="count_1" class="form-control"
                                                value="{{ $content->count_1 }}" placeholder="Enter count_1">
                                            <small id="userError" class="text-danger"></small>
                                        </div>
                                    @endif
                                    @if (in_array($content->id, [9]))
                                        <div class="form-group">
                                            <label for="count_3">Count 3</label>
                                            <input type="text" id="count_3" name="count_3" class="form-control"
                                                value="{{ $content->count_3 }}" placeholder="Enter count_3">
                                            <small id="userError" class="text-danger"></small>
                                        </div>
                                    @endif
                                    @if (in_array($content->id, [9]))
                                        <div class="form-group">
                                            <label for="Video">Video</label>
                                            <input type="text" id="video" name="video" class="form-control"
                                                value="{{ $content->video }}" placeholder="Enter video">
                                            <small id="userError" class="text-danger"></small>
                                        </div>
                                    @endif


                                    @if (in_array($content->id, [7,10]))
                                        <div class="form-group">
                                            <label for="imagesUploader">Upload Images</label>
                                            <div id="imagePreview" class="mb-2 d-flex flex-wrap gap-2">
                                                @if ($content->images)
                                                    @foreach (json_decode($content->images, true) as $img)
                                                        <img src="{{ asset('uploads/contents/' . $img) }}"
                                                            alt="Image Preview"
                                                            style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-dark"
                                                    onclick="document.getElementById('imagesUploader').click();">
                                                    Select Images
                                                </button>
                                            </div>
                                            <input type="file" name="images[]" id="imagesUploader"
                                                class="form-control-file" accept="image/*" multiple
                                                style="display: none;" onchange="previewMultipleFiles(event)">
                                        </div>
                                        <script>
                                            function previewMultipleFiles(event) {
                                                let files = event.target.files;
                                                let preview = document.getElementById('imagePreview');
                                                preview.innerHTML = '';

                                                for (let i = 0; i < files.length; i++) {
                                                    let reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        let img = document.createElement('img');
                                                        img.src = e.target.result;
                                                        img.style = 'width:100px;height:100px;margin:5px;object-fit:cover;border-radius:8px;';
                                                        preview.appendChild(img);
                                                    };
                                                    reader.readAsDataURL(files[i]);
                                                }
                                            }
                                        </script>
                                    @endif

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark">Update</button>
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

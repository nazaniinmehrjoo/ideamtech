@extends('layouts.app')

@section('content')
<div class="container" style="padding: 3%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mb-4">
                <img src="/assets/images/logotest2.png" alt="Logo">
            </div>

            <div class="card bg-dark text-white">
                <div class="card-header text-center">{{ __('اضافه کردن مقاله') }}</div>

                <div class="card-body">
                    <form id="createPostForm" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" style="direction: rtl;">
                        @csrf

                        <!-- Blog Title Input -->
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('عنوان مقاله') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="title" id="title" class="form-control bg-dark text-white @error('title') is-invalid @enderror" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Blog Category Input -->
                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('دسته‌بندی') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="category" id="category" class="form-control bg-dark text-white @error('category') is-invalid @enderror" required>
                                @error('category')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Blog Content Input -->
                        <div class="row mb-3">
                            <label for="content" class="col-md-4 col-form-label text-md-end">{{ __('محتوای مقاله') }}</label>
                            <div class="col-md-6">
                                <textarea name="content" id="content" rows="5" class="form-control bg-dark text-white @error('content') is-invalid @enderror" required></textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Main Image Upload -->
                        <div class="row mb-3">
                            <label for="main_image" class="col-md-4 col-form-label text-md-end">{{ __('تصویر اصلی') }}</label>
                            <div class="col-md-6 d-flex flex-wrap">
                                <button type="button" class="btn btn-primary mb-2" onclick="document.getElementById('main_image').click()">+</button>
                                <input type="file" id="main_image" name="main_image" class="d-none" onchange="previewMainImage(event)">
                                <div id="main-image-preview" class="d-flex flex-wrap mt-2"></div>
                                @error('main_image')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Additional Images Upload -->
                        <div class="row mb-3">
                            <label for="images" class="col-md-4 col-form-label text-md-end">{{ __('تصاویر مقاله') }}</label>
                            <div class="col-md-6 d-flex flex-wrap">
                                <button type="button" class="btn btn-primary mb-2" onclick="document.getElementById('images').click()">+</button>
                                <input type="file" id="images" name="images[]" class="d-none" multiple onchange="previewImages(event)">
                                <div id="image-preview" class="d-flex flex-wrap mt-2"></div>
                                @error('images')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                @error('images.*')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="theme-btn btn-style-two">{{ __('ایجاد') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .large-dash { font-size: 1.5em; font-weight: bold; margin-left: 10px; cursor: pointer; }
    .preview-image { max-width: 100px; margin-right: 10px; }
</style>

<script>
let selectedFiles = []; // Array to hold selected additional files for preview

function previewMainImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewContainer = document.getElementById('main-image-preview');
            previewContainer.innerHTML = `<img src="${e.target.result}" alt="Main Image" class="preview-image img-fluid">`;
        };
        reader.readAsDataURL(file);
    }
}

function previewImages(event) {
    const newFiles = Array.from(event.target.files);
    selectedFiles = selectedFiles.concat(newFiles);
    renderImagePreviews();
}

function renderImagePreviews() {
    const previewContainer = document.getElementById('image-preview');
    previewContainer.innerHTML = ''; // Clear existing previews

    selectedFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewDiv = document.createElement('div');
            previewDiv.classList.add('d-flex', 'align-items-center', 'mb-2');
            previewDiv.innerHTML = `<img src="${e.target.result}" alt="New Image" class="preview-image img-fluid"><span class="text-danger large-dash" onclick="removeImage(${index})">&ndash;</span>`;
            previewContainer.appendChild(previewDiv);
        };
        reader.readAsDataURL(file);
    });
}

function removeImage(index) {
    selectedFiles.splice(index, 1); // Remove the selected file
    renderImagePreviews(); // Update the preview display
}
</script>
@endsection

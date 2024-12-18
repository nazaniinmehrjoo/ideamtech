@extends('layouts.app')

@section('content')
<div class="container" style="padding: 3%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mb-4">
                <img src="/assets/images/logotest2.png" alt="Logo">
            </div>

            <div class="card bg-dark text-white">
                <div class="card-header text-center">{{ __('ویرایش مقاله') }}</div>
                <div class="card-body">
                    <form id="postForm" action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data" style="direction: rtl;">
                        @csrf
                        @method('PUT')

                        <!-- Blog Title (EN & FA) -->
                        <div class="row mb-3">
                            <label for="title_en" class="col-md-4 col-form-label text-md-end">{{ __('عنوان مقاله (انگلیسی)') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="title[en]" id="title_en" value="{{ old('title.en', $post->title['en'] ?? '') }}" class="form-control bg-dark text-white @error('title.en') is-invalid @enderror" required>
                                @error('title.en')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title_fa" class="col-md-4 col-form-label text-md-end">{{ __('عنوان مقاله (فارسی)') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="title[fa]" id="title_fa" value="{{ old('title.fa', $post->title['fa'] ?? '') }}" class="form-control bg-dark text-white @error('title.fa') is-invalid @enderror" required>
                                @error('title.fa')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Blog Category (EN & FA) -->
                        <div class="row mb-3">
                            <label for="category_en" class="col-md-4 col-form-label text-md-end">{{ __('دسته‌بندی (انگلیسی)') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="category[en]" id="category_en" value="{{ old('category.en', $post->category['en'] ?? '') }}" class="form-control bg-dark text-white @error('category.en') is-invalid @enderror" required>
                                @error('category.en')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="category_fa" class="col-md-4 col-form-label text-md-end">{{ __('دسته‌بندی (فارسی)') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="category[fa]" id="category_fa" value="{{ old('category.fa', $post->category['fa'] ?? '') }}" class="form-control bg-dark text-white @error('category.fa') is-invalid @enderror" required>
                                @error('category.fa')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Blog Content (EN & FA) -->
                        <div class="row mb-3">
                            <label for="content_en" class="col-md-4 col-form-label text-md-end">{{ __('محتوای مقاله (انگلیسی)') }}</label>
                            <div class="col-md-6">
                                <textarea name="content[en]" id="content_en" rows="5" class="form-control bg-dark text-white @error('content.en') is-invalid @enderror" required>{{ old('content.en', $post->content['en'] ?? '') }}</textarea>
                                @error('content.en')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="content_fa" class="col-md-4 col-form-label text-md-end">{{ __('محتوای مقاله (فارسی)') }}</label>
                            <div class="col-md-6">
                                <textarea name="content[fa]" id="content_fa" rows="5" class="form-control bg-dark text-white @error('content.fa') is-invalid @enderror" required>{{ old('content.fa', $post->content['fa'] ?? '') }}</textarea>
                                @error('content.fa')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Main Image Section -->
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('تصویر اصلی') }}</label>
                            <div class="col-md-6 d-flex flex-wrap">
                                @if($post->image)
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="Main Image" class="img-fluid" style="max-width: 100px; margin-right: 10px;" id="main-image-preview">
                                        <span class="text-danger large-dash" onclick="document.getElementById('delete_main_image').checked = true;">&ndash;</span>
                                        <input type="checkbox" name="delete_main_image" value="1" id="delete_main_image" class="d-none">
                                    </div>
                                @endif
                                <input type="file" name="main_image" id="main_image" class="d-none" onchange="addMainImage(event)">
                                <button type="button" class="btn theme-btn btn-style-two mb-2" onclick="document.getElementById('main_image').click()">+</button>
                                @error('main_image')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Existing Images Section with Delete Option -->
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('تصاویر موجود') }}</label>
                            <div class="col-md-6 d-flex flex-wrap">
                                @foreach($post->images as $image)
                                    <div class="d-flex align-items-center mb-2" id="existing-image-{{ $image->id }}">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Existing Image" class="img-fluid preview-image" style="max-width: 100px; margin-right: 10px;">
                                        <span class="text-danger large-dash" onclick="markImageForDeletion({{ $image->id }})">&ndash;</span>
                                        <input type="checkbox" name="delete_images[]" value="{{ $image->id }}" id="delete_image_{{ $image->id }}" class="d-none">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- New Images Section with Preview and Remove Option -->
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('تصاویر جدید') }}</label>
                            <div class="col-md-6 d-flex flex-wrap">
                                <div id="new-image-preview" class="d-flex flex-wrap mt-2"></div>
                                <button type="button" class="btn theme-btn btn-style-two mb-2" onclick="document.getElementById('images').click()">+</button>
                                <input type="file" id="images" name="images[]" class="d-none" multiple onchange="addImages(event)">
                                @error('images.*')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn theme-btn btn-style-two">{{ __('ویرایش') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .large-dash {
        font-size: 1.5em;
        font-weight: bold;
        margin-left: 10px;
        cursor: pointer;
    }
    .preview-image {
        max-width: 100px;
        margin-right: 10px;
    }
</style>

<script>
let selectedFiles = [];
let mainImageFile = null;

function addMainImage(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('main-image-preview').src = e.target.result;
    };
    reader.readAsDataURL(file);
}

function markImageForDeletion(imageId) {
    const checkbox = document.getElementById('delete_image_' + imageId);
    checkbox.checked = !checkbox.checked;
    const container = document.getElementById('existing-image-' + imageId);
    container.style.opacity = checkbox.checked ? "0.5" : "1";
}

function addImages(event) {
    const files = event.target.files;
    const previewContainer = document.getElementById('new-image-preview');
    previewContainer.innerHTML = '';
    Array.from(files).forEach(file => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'img-fluid preview-image';
            previewContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
}

// Function to render new images previews
function renderNewPreviews() {
    const previewContainer = document.getElementById('new-image-preview');
    previewContainer.innerHTML = '';
    selectedFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewDiv = document.createElement('div');
            previewDiv.classList.add('d-flex', 'align-items-center', 'mb-2');
            previewDiv.innerHTML = `<img src="${e.target.result}" alt="New Image" class="preview-image img-fluid"><span class="text-danger large-dash" onclick="removeNewImage(${index})">&ndash;</span>`;
            previewContainer.appendChild(previewDiv);
        };
        reader.readAsDataURL(file);
    });
}

// Function to remove a specific new image from the preview
function removeNewImage(index) {
    selectedFiles.splice(index, 1);
    renderNewPreviews();
}

// Function to submit the form
function submitForm() {
    const form = document.getElementById('postForm');
    const formData = new FormData(form);

    // Append the main image if selected
    if (mainImageFile) {
        formData.append('main_image', mainImageFile);
    }

    // Append new images
    selectedFiles.forEach((file, index) => {
        formData.append(`images[${index}]`, file);
    });

    // Submit the form via AJAX
    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else if (response.status === 422) {
            return response.json().then(errorData => {
                alert("Validation error. Please check the form fields.");
                displayValidationErrors(errorData.errors);
                throw new Error("Validation failed");
            });
        } else {
            throw new Error("Unexpected response from the server");
        }
    })
    .then(data => {
        if (data.success) {
            alert(data.message || 'Images uploaded successfully!');
            window.location.reload();
        } else {
            alert("An error occurred during the upload.");
        }
    })
    .catch(error => {
        console.error("Error during submission:", error);
    });
}

// Function to display validation errors
function displayValidationErrors(errors) {
    document.querySelectorAll('.validation-error').forEach(el => el.remove());
    Object.keys(errors).forEach(field => {
        const fieldElement = field.startsWith('images') ? document.getElementById('images') : document.getElementsByName(field)[0];
        if (fieldElement) {
            const errorMessage = document.createElement('div');
            errorMessage.className = 'validation-error text-danger';
            errorMessage.innerText = errors[field][0];
            fieldElement.parentNode.appendChild(errorMessage);
        }
    });
}
</script>
@endsection

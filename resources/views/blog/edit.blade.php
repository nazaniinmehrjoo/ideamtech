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

                        <!-- Blog Title -->
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('عنوان مقاله') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="form-control bg-dark text-white @error('title') is-invalid @enderror" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Blog Category -->
                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('دسته‌بندی') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="category" id="category" value="{{ old('category', $post->category) }}" class="form-control bg-dark text-white @error('category') is-invalid @enderror" required>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Blog Content -->
                        <div class="row mb-3">
                            <label for="content" class="col-md-4 col-form-label text-md-end">{{ __('محتوای مقاله') }}</label>
                            <div class="col-md-6">
                                <textarea name="content" id="content" rows="5" class="form-control bg-dark text-white @error('content') is-invalid @enderror" required>{{ old('content', $post->content) }}</textarea>
                                @error('content')
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
                                        <input type="checkbox" name="delete_images[]" value="{{ $post->id }}" id="delete_main_image" class="d-none">
                                    </div>
                                @endif
                                <input type="file" name="main_image" id="main_image" class="d-none" onchange="addMainImage(event)">
                                <button type="button" class="btn btn-primary mb-2" onclick="document.getElementById('main_image').click()">+</button>
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
                                <button type="button" class="btn btn-primary mb-2" onclick="document.getElementById('images').click()">+</button>
                                <input type="file" id="images" class="d-none" multiple onchange="addImages(event)">
                                @error('images.*')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" onclick="submitForm()" class="theme-btn btn-style-two">{{ __('ویرایش') }}</button>
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

// Mark an existing image for deletion
function markImageForDeletion(imageId) {
    const deleteCheckbox = document.getElementById('delete_image_' + imageId);
    deleteCheckbox.checked = !deleteCheckbox.checked;
    const imageDiv = document.getElementById('existing-image-' + imageId);
    imageDiv.style.opacity = deleteCheckbox.checked ? "0.5" : "1";
}

// Function to add main image
function addMainImage(event) {
    mainImageFile = event.target.files[0]; // Store the selected main image
    const reader = new FileReader();
    reader.onload = function(e) {
        const previewDiv = document.createElement('div');
        previewDiv.classList.add('d-flex', 'align-items-center', 'mb-2');
        previewDiv.innerHTML = `<img src="${e.target.result}" alt="Main Image" class="img-fluid" style="max-width: 100px; margin-right: 10px;">`;
        const mainImagePreview = document.getElementById('main-image-preview');
        mainImagePreview.replaceWith(previewDiv); // Replace the existing image with the new preview
    };
    reader.readAsDataURL(mainImageFile); // Read the image as a data URL
}

// Function to add new images
function addImages(event) {
    const newFiles = Array.from(event.target.files);
    selectedFiles = selectedFiles.concat(newFiles);
    renderNewPreviews();
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

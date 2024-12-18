@extends('layouts.app')

@section('content')
<div class="container dashboard-container" style="padding: 3%; direction:rtl">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Logo -->
            <div class="text-center mb-4">
                <img src="/assets/images/logotest2.png" alt="Logo">
            </div>

            <!-- Dark Card -->
            <div class="card bg-dark text-white">
                <div class="card-header text-center">{{ __('blogCreate.create_post') }}</div>

                <div class="card-body">
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Post Title Inputs -->
                        <div class="row mb-3">
                            <label for="title_en" class="col-md-4 col-form-label text-md-end">{{ __('blogCreate.title_en') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="title[en]" id="title_en"
                                    class="form-control bg-dark text-white @error('title.en') is-invalid @enderror"
                                    value="{{ old('title.en') }}" required>
                                @error('title.en')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title_fa" class="col-md-4 col-form-label text-md-end">{{ __('blogCreate.title_fa') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="title[fa]" id="title_fa"
                                    class="form-control bg-dark text-white @error('title.fa') is-invalid @enderror"
                                    value="{{ old('title.fa') }}" required>
                                @error('title.fa')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Post Content Inputs -->
                        <div class="row mb-3">
                            <label for="content_en" class="col-md-4 col-form-label text-md-end">{{ __('blogCreate.content_en') }}</label>
                            <div class="col-md-6">
                                <textarea name="content[en]" id="content_en" rows="5"
                                    class="form-control bg-dark text-white @error('content.en') is-invalid @enderror" required>{{ old('content.en') }}</textarea>
                                @error('content.en')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="content_fa" class="col-md-4 col-form-label text-md-end">{{ __('blogCreate.content_fa') }}</label>
                            <div class="col-md-6">
                                <textarea name="content[fa]" id="content_fa" rows="5"
                                    class="form-control bg-dark text-white @error('content.fa') is-invalid @enderror" required>{{ old('content.fa') }}</textarea>
                                @error('content.fa')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Post Category Inputs -->
                        <div class="row mb-3">
                            <label for="category_en" class="col-md-4 col-form-label text-md-end">{{ __('blogCreate.category_en') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="category[en]" id="category_en"
                                    class="form-control bg-dark text-white @error('category.en') is-invalid @enderror"
                                    value="{{ old('category.en') }}" required>
                                @error('category.en')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="category_fa" class="col-md-4 col-form-label text-md-end">{{ __('blogCreate.category_fa') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="category[fa]" id="category_fa"
                                    class="form-control bg-dark text-white @error('category.fa') is-invalid @enderror"
                                    value="{{ old('category.fa') }}" required>
                                @error('category.fa')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Post Main Image -->
                        <div class="row mb-3">
                            <label for="main_image" class="col-md-4 col-form-label text-md-end">{{ __('blogCreate.main_image') }}</label>
                            <div class="col-md-6 d-flex flex-wrap">
                                <button type="button" class="btn theme-btn btn-style-two mb-2" onclick="document.getElementById('main_image').click()">+</button>
                                <input type="file" id="main_image" name="main_image" class="d-none" onchange="previewMainImage(event)">
                                <div id="main-image-preview" class="d-flex flex-wrap mt-2"></div>
                                @error('main_image')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Post Additional Images -->
                        <div class="row mb-3">
                            <label for="images" class="col-md-4 col-form-label text-md-end">{{ __('blogCreate.additional_images') }}</label>
                            <div class="col-md-6 d-flex flex-wrap">
                                <button type="button" class="btn theme-btn btn-style-two mb-2" onclick="document.getElementById('images').click()">+</button>
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
                                <button type="submit" class="btn theme-btn btn-style-two">{{ __('blogCreate.submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let selectedFiles = []; // Array to hold selected additional files for preview

function previewMainImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewContainer = document.getElementById('main-image-preview');
            previewContainer.innerHTML = `<img src="${e.target.result}" alt="Main Image" class="img-fluid preview-image">`;
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
            previewDiv.innerHTML = `<img src="${e.target.result}" alt="Image" class="img-fluid preview-image">
                <span class="text-danger large-dash" onclick="removeImage(${index})">&ndash;</span>`;
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

<style>
    .large-dash { font-size: 1.5em; font-weight: bold; margin-left: 10px; cursor: pointer; }
    .preview-image { max-width: 100px; margin-right: 10px; border-radius: 8px; }
</style>
@endsection

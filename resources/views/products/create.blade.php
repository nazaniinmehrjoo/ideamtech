@extends('layouts.app2')

@section('content')
<div class="container" style="padding: 3%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mb-4">
                <img src="/assets/images/logotest2.png" alt="Logo">
            </div>

            <div class="card bg-dark text-white">
                <div class="card-header text-center">{{ __('ایجاد محصول جدید') }}</div>

                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" style="direction: rtl;">
                        @csrf

                        <!-- Product Name Input -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('نام محصول') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control bg-dark text-white @error('name') is-invalid @enderror" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Description Input -->
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('توضیحات') }}</label>

                            <div class="col-md-6">
                                <textarea name="description" id="description" class="form-control bg-dark text-white @error('description') is-invalid @enderror"></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Page Name Dropdown -->
                        <div class="row mb-3">
                            <label for="page_name" class="col-md-4 col-form-label text-md-end">{{ __('نام صفحه') }}</label>

                            <div class="col-md-6">
                                <select name="page_name" id="page_name" class="form-control bg-dark text-white @error('page_name') is-invalid @enderror" required>
                                    <option value="">{{ __('-- Select Page --') }}</option>
                                    <option value="khoskkon">خشک کن</option>
                                    <option value="korepokht">کوره پخت</option>
                                    <option value="mashinAlatShekldehi">ماشین آلات شکل دهی</option>
                                    <option value="mashinalatvatajhizat">ماشین آلات و تجهیزات</option>
                                </select>

                                @error('page_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Category Dropdown -->
                        <div class="row mb-3">
                            <label for="category_id" class="col-md-4 col-form-label text-md-end">{{ __('دسته‌بندی') }}</label>

                            <div class="col-md-6">
                                <select name="category_id" id="category" class="form-control bg-dark text-white @error('category_id') is-invalid @enderror" required>
                                    <option value="">{{ __('-- Select Category --') }}</option>
                                    <!-- Options will be added dynamically via JavaScript based on page_name -->
                                </select>

                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('تصویر محصول') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="image" id="image" class="form-control bg-dark text-white @error('image') is-invalid @enderror">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="theme-btn btn-style-two">{{ __('ثبت') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to dynamically update categories based on the selected page -->
<script>
    // JavaScript to update the categories dropdown dynamically based on the selected page
    const categories = @json($categories);  // Pass categories from controller

    const pageNameSelect = document.getElementById('page_name');
    const categorySelect = document.getElementById('category');

    pageNameSelect.addEventListener('change', function () {
        const selectedPage = this.value;

        // Clear existing options in the category dropdown
        categorySelect.innerHTML = '<option value="">{{ __('-- Select Category --') }}</option>';

        // Populate the category dropdown based on the selected page
        if (categories[selectedPage]) {
            categories[selectedPage].forEach(function (category) {
                const option = document.createElement('option');
                option.value = category.id;
                option.textContent = category.name;
                categorySelect.appendChild(option);
            });
        }
    });
</script>
@endsection

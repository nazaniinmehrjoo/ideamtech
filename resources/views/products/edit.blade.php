@extends('layouts.app')

@section('content')
<div class="container" style="padding: 3%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Logo -->
            <div class="text-center mb-4">
                <img src="/assets/images/logotest2.png" alt="Logo">
            </div>

            <!-- Dark Card -->
            <div class="card bg-dark text-white">
                <div class="card-header text-center">{{ __('productEdit.edit_product') }}</div>

                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" style="direction: rtl;">
                        @csrf
                        @method('PUT')

                        <!-- Product Name (English) -->
                        <div class="row mb-3">
                            <label for="name_en" class="col-md-4 col-form-label text-md-end">{{ __('productEdit.product_name_en') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="name[en]" id="name_en"
                                    class="form-control bg-dark text-white @error('name.en') is-invalid @enderror"
                                    value="{{ old('name.en', $product->name['en'] ?? '') }}" required>
                                @error('name.en')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Product Name (Persian) -->
                        <div class="row mb-3">
                            <label for="name_fa" class="col-md-4 col-form-label text-md-end">{{ __('productEdit.product_name_fa') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="name[fa]" id="name_fa"
                                    class="form-control bg-dark text-white @error('name.fa') is-invalid @enderror"
                                    value="{{ old('name.fa', $product->name['fa'] ?? '') }}" required>
                                @error('name.fa')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Product Description (English) -->
                        <div class="row mb-3">
                            <label for="description_en" class="col-md-4 col-form-label text-md-end">{{ __('productEdit.description_en') }}</label>
                            <div class="col-md-6">
                                <textarea name="description[en]" id="description_en"
                                    class="form-control bg-dark text-white @error('description.en') is-invalid @enderror">{{ old('description.en', $product->description['en'] ?? '') }}</textarea>
                                @error('description.en')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Product Description (Persian) -->
                        <div class="row mb-3">
                            <label for="description_fa" class="col-md-4 col-form-label text-md-end">{{ __('productEdit.description_fa') }}</label>
                            <div class="col-md-6">
                                <textarea name="description[fa]" id="description_fa"
                                    class="form-control bg-dark text-white @error('description.fa') is-invalid @enderror">{{ old('description.fa', $product->description['fa'] ?? '') }}</textarea>
                                @error('description.fa')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Page Name Dropdown -->
                        <div class="row mb-3">
                            <label for="page_name" class="col-md-4 col-form-label text-md-end">{{ __('productEdit.page_name') }}</label>
                            <div class="col-md-6">
                                <select name="page_name" id="page_name"
                                    class="form-control bg-dark text-white @error('page_name') is-invalid @enderror" required>
                                    <option value="">{{ __('-- Select Page --') }}</option>
                                    @foreach($pages as $key => $label)
                                        <option value="{{ $key }}" {{ old('page_name', $product->page_name) === $key ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('page_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Category Dropdown -->
                        <div class="row mb-3">
                            <label for="category_id" class="col-md-4 col-form-label text-md-end">{{ __('productEdit.category') }}</label>
                            <div class="col-md-6">
                                <select name="category_id" id="category_id"
                                    class="form-control bg-dark text-white @error('category_id') is-invalid @enderror" required>
                                    <option value="">{{ __('productEdit.select_category') }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('productEdit.upload_image') }}</label>
                            <div class="col-md-6">
                                <input type="file" name="image" id="image"
                                    class="form-control bg-dark text-white @error('image') is-invalid @enderror">
                                @error('image')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('productEdit.submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

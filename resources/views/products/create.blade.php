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
                <div class="card-header text-center">{{ __('productCreate.create_new_product') }}</div>

                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
                        style="direction: rtl;">
                        @csrf

                        <!-- Product Name Input (Localized) -->
                        <div class="row mb-3">
                            <label for="name_en"
                                class="col-md-4 col-form-label text-md-end">{{ __('productCreate.product_name_en') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="name[en]" id="name_en"
                                    class="form-control bg-dark text-white @error('name.en') is-invalid @enderror"
                                    required>
                                @error('name.en')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name_fa"
                                class="col-md-4 col-form-label text-md-end">{{ __('productCreate.product_name_fa') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="name[fa]" id="name_fa"
                                    class="form-control bg-dark text-white @error('name.fa') is-invalid @enderror"
                                    required>
                                @error('name.fa')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Description Input (Localized) -->
                        <div class="row mb-3">
                            <label for="description_en"
                                class="col-md-4 col-form-label text-md-end">{{ __('productCreate.description_en') }}</label>
                            <div class="col-md-6">
                                <textarea name="description[en]" id="description_en"
                                    class="form-control bg-dark text-white @error('description.en') is-invalid @enderror"></textarea>
                                @error('description.en')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description_fa"
                                class="col-md-4 col-form-label text-md-end">{{ __('productCreate.description_fa') }}</label>
                            <div class="col-md-6">
                                <textarea name="description[fa]" id="description_fa"
                                    class="form-control bg-dark text-white @error('description.fa') is-invalid @enderror"></textarea>
                                @error('description.fa')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Category Dropdown -->
                        <div class="row mb-3">
                            <label for="category_id"
                                class="col-md-4 col-form-label text-md-end">{{ __('productCreate.select_category') }}</label>
                            <div class="col-md-6">
                                <select name="category_id" id="category_id"
                                    class="form-control bg-dark text-white @error('category_id') is-invalid @enderror"
                                    required>
                                    <option value="">{{ __('productCreate.choose_category') }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name[app()->getLocale()] ?? $category->name['en'] }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Page Name Dropdown -->
                        <div class="row mb-3">
                            <label for="page_name"
                                class="col-md-4 col-form-label text-md-end">{{ __('نام صفحه') }}</label>
                            <div class="col-md-6">
                                <select name="page_name" id="page_name"
                                    class="form-control bg-dark text-white @error('page_name') is-invalid @enderror"
                                    required>
                                    <option value="">{{ __('-- Select Page --') }}</option>
                                    <option value="khoskkon">خشک کن</option>
                                    <option value="korepokht">کوره پخت</option>
                                    <option value="mashinAlatShekldehi">ماشین آلات شکل دهی</option>
                                    <option value="mashinalatvatajhizat">ماشین آلات و تجهیزات</option>
                                </select>
                                @error('page_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>


                        <!-- Image Upload -->
                        <div class="row mb-3">
                            <label for="image"
                                class="col-md-4 col-form-label text-md-end">{{ __('productCreate.upload_image') }}</label>
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
                                <button type="submit" class="btn btn-primary">{{ __('productCreate.submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
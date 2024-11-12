@extends('layouts.app')

@section('content')
<div class="container" style="padding: 3%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Logo Image Centered -->
            <div class="text-center mb-4">
                <img src="/assets/images/logotest2.png" alt="Logo">
            </div>

            <div class="card bg-dark text-white">
                <div class="card-header text-center">{{ __('ویرایش محصول') }}</div>

                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" style="direction: rtl;">
                        @csrf
                        @method('PUT')

                        <!-- Product Name Input -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('نام محصول') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control bg-dark text-white @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required>

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
                                <textarea name="description" id="description" class="form-control bg-dark text-white @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>

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
                                    <option value="khoskkon" {{ $product->page_name == 'khoskkon' ? 'selected' : '' }}>خشک کن</option>
                                    <option value="korepokht" {{ $product->page_name == 'korepokht' ? 'selected' : '' }}>کوره پخت</option>
                                    <option value="mashinAlatShekldehi" {{ $product->page_name == 'mashinAlatShekldehi' ? 'selected' : '' }}>ماشین آلات شکل دهی</option>
                                    <option value="mashinalatvatajhizat" {{ $product->page_name == 'mashinalatvatajhizat' ? 'selected' : '' }}>ماشین آلات و تجهیزات</option>
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
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Metric Fields for 'khoskkon' Page -->
                        <div id="khoskkonFields" style="display: {{ $product->page_name == 'khoskkon' ? 'block' : 'none' }};">
                            @php
                                $metrics = [
                                    'total_cost' => 'هزینه تمام شده',
                                    'energy_consumption' => 'مصرف انرژی',
                                    'production_variety' => 'تنوع تولید',
                                    'occupied_area' => 'مساحت اشغال شده',
                                    'drying_time' => 'زمان خشک شدن',
                                    'maintenance_cost' => 'هزینه تعمیر و نگهداری',
                                    'product_quality' => 'کیفیت محصول',
                                    'operation_cost' => 'هزینه اپراتوری',
                                    'machine_quality' => 'کیفیت ماشین آلات'
                                ];
                            @endphp
                            @foreach ($metrics as $field => $label)
                                <div class="row mb-3">
                                    <label for="{{ $field }}" class="col-md-4 col-form-label text-md-end">{{ __($label) }}</label>
                                    <div class="col-md-6">
                                        <input type="number" name="{{ $field }}" id="{{ $field }}" class="form-control bg-dark text-white @error($field) is-invalid @enderror" value="{{ old($field, $product->$field) }}">
                                        @error($field)
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Product Image Input -->
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('تصویر محصول') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="image" id="image" class="form-control bg-dark text-white @error('image') is-invalid @enderror">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <!-- Display Existing Image -->
                                @if($product->image)
                                    <div class="mt-3">
                                        <label>{{ __('Current Image:') }}</label><br>
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" width="150">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="theme-btn btn-style-two">
                                    {{ __('ویرایش محصول') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to dynamically show/hide metric fields based on selected page -->
<script>
    const pageNameSelect = document.getElementById('page_name');
    const khoskkonFields = document.getElementById('khoskkonFields');

    pageNameSelect.addEventListener('change', function () {
        khoskkonFields.style.display = this.value === 'khoskkon' ? 'block' : 'none';
    });
</script>
@endsection

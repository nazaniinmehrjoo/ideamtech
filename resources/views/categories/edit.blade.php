@extends('layouts.app2')

@section('content')
<div class="container" style="padding: 3%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Logo Image Centered -->
            <div class="text-center mb-4">
                <img src="/assets/images/logotest2.png" alt="Logo">
            </div>

            <!-- Use Bootstrap Dark Card -->
            <div class="card bg-dark text-white">
                <div class="card-header text-center">{{ __('ویرایش دسته‌بندی') }}</div>

                <div class="card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST" style="direction: rtl;">
                        @csrf
                        @method('PUT')

                        <!-- Category Name Input -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('نام دسته‌بندی') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control bg-dark text-white @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" required>

                                @error('name')
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
                                    <option value="khoskkon" {{ $category->page_name == 'khoskkon' ? 'selected' : '' }}>خشک کن</option>
                                    <option value="korepokht" {{ $category->page_name == 'korepokht' ? 'selected' : '' }}>کوره پخت</option>
                                    <option value="mashinAlatShekldehi" {{ $category->page_name == 'mashinAlatShekldehi' ? 'selected' : '' }}>ماشین آلات شکل دهی</option>
                                    <option value="mashinalatvatajhizat" {{ $category->page_name == 'mashinalatvatajhizat' ? 'selected' : '' }}>ماشین آلات و تجهیزات</option>
                                </select>

                                @error('page_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="theme-btn btn-style-two">
                                    {{ __('بروزرسانی دسته‌بندی') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

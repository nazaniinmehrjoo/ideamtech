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
                <div class="card-header text-center">{{ __('اضافه کردن مقاله ') }}</div>

                <div class="card-body">
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" style="direction: rtl;">
                        @csrf

                        <!-- Blog Title Input -->
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('عنوان مقاله') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="title" id="title" class="form-control bg-dark text-white @error('title') is-invalid @enderror" required>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Blog Category Input -->
                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('دسته‌بندی') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="category" id="category" class="form-control bg-dark text-white @error('category') is-invalid @enderror" required>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Blog Content Input -->
                        <div class="row mb-3">
                            <label for="content" class="col-md-4 col-form-label text-md-end">{{ __('محتوای مقاله') }}</label>

                            <div class="col-md-6">
                                <textarea name="content" id="content" rows="5" class="form-control bg-dark text-white @error('content') is-invalid @enderror" required></textarea>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Blog Image Upload -->
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('تصویر مقاله') }}</label>

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
                                <button type="submit" class="theme-btn btn-style-two">
                                    {{ __('ایجاد') }}
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

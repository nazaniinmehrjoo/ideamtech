@extends('layouts.app')

@section('content')
<div class="container" style="padding: 3%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mb-4">
                <img src="/assets/images/logotest2.png" alt="Logo">
            </div>

            <div class="card bg-dark text-white">
                <div class="card-header text-center">
                    {{ isset($service) ? __('ویرایش خدمت') : __('ایجاد خدمت جدید') }}
                </div>

                <div class="card-body">
                    <form action="{{ isset($service) ? route('services.update', $service->id) : route('services.store') }}" method="POST" enctype="multipart/form-data" style="direction: rtl;">
                        @csrf
                        @if(isset($service))
                            @method('PUT')
                        @endif

                        <!-- Service Title Input -->
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('عنوان خدمت') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="title" id="title" class="form-control bg-dark text-white @error('title') is-invalid @enderror" value="{{ $service->title ?? '' }}">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Description Input -->
                        <div class="row mb-3">
                            <label for="content" class="col-md-4 col-form-label text-md-end">{{ __('توضیحات') }}</label>

                            <div class="col-md-6">
                                <textarea name="content" id="content" class="form-control bg-dark text-white @error('content') is-invalid @enderror">{{ $service->content ?? '' }}</textarea>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Category Input -->
                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('دسته‌بندی') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="category" id="category" class="form-control bg-dark text-white @error('category') is-invalid @enderror" value="{{ $service->category ?? '' }}">

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Banner Image Upload -->
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('آپلود تصویر بنر') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="image" id="image" class="form-control bg-dark text-white @error('image') is-invalid @enderror">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Page Selection Dropdown -->
                        <div class="row mb-3">
                            <label for="page_name" class="col-md-4 col-form-label text-md-end">{{ __('انتخاب صفحه') }}</label>

                            <div class="col-md-6">
                                <select name="page_name" id="page_name" class="form-control bg-dark text-white @error('page_name') is-invalid @enderror">
                                    <option value="">{{ __('-- Select Page --') }}</option>
                                    <option value="consulting" {{ isset($service) && $service->page_name == 'consulting' ? 'selected' : '' }}>مشاوره</option>
                                    <option value="parts_repairs" {{ isset($service) && $service->page_name == 'parts_repairs' ? 'selected' : '' }}>تامین قطعات و تعمیرات</option>
                                    <option value="engineering" {{ isset($service) && $service->page_name == 'engineering' ? 'selected' : '' }}>خدمات مهندسی</option>
                                    <option value="installation" {{ isset($service) && $service->page_name == 'installation' ? 'selected' : '' }}>نصب و راه اندازی</option>
                                    <option value="after_sales" {{ isset($service) && $service->page_name == 'after_sales' ? 'selected' : '' }}>خدمات پس از فروش</option>
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
                                    {{ isset($service) ? __('بروزرسانی') : __('ثبت') }}
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

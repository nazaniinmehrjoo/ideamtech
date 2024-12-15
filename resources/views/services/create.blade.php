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
                    {{ isset($service) ? __('serviceCreate.edit_service') : __('serviceCreate.create_service') }}
                </div>

                <div class="card-body">
                    <form
                        action="{{ isset($service) ? route('services.update', ['locale' => app()->getLocale(), 'service' => $service->id]) : route('services.store', ['locale' => app()->getLocale()]) }}"
                        method="POST" enctype="multipart/form-data" style="direction: rtl;">
                        @csrf
                        @if(isset($service))
                            @method('PUT')
                        @endif

                        <!-- Service Title Input -->
                        <div class="row mb-3">
                            <label for="title"
                                class="col-md-4 col-form-label text-md-end">{{ __('serviceCreate.service_title') }}</label>
                            <div class="col-md-6">
                                @foreach(['fa' => 'فارسی', 'en' => 'English'] as $locale => $language)
                                    <div class="mb-2">
                                        <input type="text" name="title[{{ $locale }}]" id="title_{{ $locale }}"
                                            class="form-control bg-dark text-white @error('title.' . $locale) is-invalid @enderror"
                                            placeholder="{{ __('serviceCreate.service_title') . ' (' . $language . ')' }}"
                                            value="{{ $service->title[$locale] ?? old('title.' . $locale) }}">
                                        @error('title.' . $locale)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Description Input -->
                        <div class="row mb-3">
                            <label for="content"
                                class="col-md-4 col-form-label text-md-end">{{ __('serviceCreate.description') }}</label>
                            <div class="col-md-6">
                                @foreach(['fa' => 'فارسی', 'en' => 'English'] as $locale => $language)
                                    <div class="mb-2">
                                        <textarea name="content[{{ $locale }}]" id="content_{{ $locale }}"
                                            class="form-control bg-dark text-white @error('content.' . $locale) is-invalid @enderror"
                                            placeholder="{{ __('serviceCreate.description') . ' (' . $language . ')' }}">{{ $service->content[$locale] ?? old('content.' . $locale) }}</textarea>
                                        @error('content.' . $locale)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Category Input -->
                        <div class="row mb-3">
                            <label for="category"
                                class="col-md-4 col-form-label text-md-end">{{ __('serviceCreate.category') }}</label>
                            <div class="col-md-6">
                                @foreach(['fa' => 'فارسی', 'en' => 'English'] as $locale => $language)
                                    <div class="mb-2">
                                        <input type="text" name="category[{{ $locale }}]" id="category_{{ $locale }}"
                                            class="form-control bg-dark text-white @error('category.' . $locale) is-invalid @enderror"
                                            placeholder="{{ __('serviceCreate.category') . ' (' . $language . ')' }}"
                                            value="{{ $service->category[$locale] ?? old('category.' . $locale) }}">
                                        @error('category.' . $locale)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Banner Image Upload -->
                        <div class="row mb-3">
                            <label for="image"
                                class="col-md-4 col-form-label text-md-end">{{ __('serviceCreate.upload_banner') }}</label>
                            <div class="col-md-6">
                                <input type="file" name="image" id="image"
                                    class="form-control bg-dark text-white @error('image') is-invalid @enderror">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <!-- Show Existing Images (if editing) -->
                                @if(isset($service) && $service->banner_images)
                                    <div class="mt-3">
                                        @foreach(json_decode($service->banner_images, true) as $image)
                                            <img src="{{ asset('storage/' . $image) }}" alt="Banner Image" class="img-thumbnail"
                                                style="max-width: 100px;">
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Page Selection Dropdown -->
                        <div class="row mb-3">
                            <label for="page_name"
                                class="col-md-4 col-form-label text-md-end">{{ __('serviceCreate.select_page') }}</label>
                            <div class="col-md-6">
                                <select name="page_name" id="page_name"
                                    class="form-control bg-dark text-white @error('page_name') is-invalid @enderror">
                                    <option value="">{{ __('serviceCreate.select_page') }}</option>
                                    <option value="consulting" {{ (isset($service) && $service->page_name == 'consulting') ? 'selected' : '' }}>{{ __('serviceCreate.consulting') }}</option>
                                    <option value="parts_repairs" {{ (isset($service) && $service->page_name == 'parts_repairs') ? 'selected' : '' }}>
                                        {{ __('serviceCreate.parts_repairs') }}</option>
                                    <option value="engineering" {{ (isset($service) && $service->page_name == 'engineering') ? 'selected' : '' }}>
                                        {{ __('serviceCreate.engineering') }}</option>
                                    <option value="installation" {{ (isset($service) && $service->page_name == 'installation') ? 'selected' : '' }}>
                                        {{ __('serviceCreate.installation') }}</option>
                                    <option value="after_sales" {{ (isset($service) && $service->page_name == 'after_sales') ? 'selected' : '' }}>
                                        {{ __('serviceCreate.after_sales') }}</option>
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
                                    {{ isset($service) ? __('serviceCreate.update') : __('serviceCreate.submit') }}
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
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
                    {{ __('serviceCreate.edit_service') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data" style="direction: rtl;">
                        @csrf
                        @method('PUT')

                        <!-- Service Title Input -->
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('serviceCreate.service_title') }}</label>
                            <div class="col-md-6">
                                @foreach(['fa' => 'فارسی', 'en' => 'English'] as $locale => $language)
                                    <div class="mb-2">
                                        <input type="text" name="title[{{ $locale }}]" id="title_{{ $locale }}" 
                                               class="form-control bg-dark text-white @error('title.' . $locale) is-invalid @enderror"
                                               placeholder="{{ __('serviceCreate.service_title').' ('.$language.')' }}"
                                               value="{{ old('title.' . $locale, json_decode($service->title, true)[$locale] ?? '') }}">
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
                            <label for="content" class="col-md-4 col-form-label text-md-end">{{ __('serviceCreate.description') }}</label>
                            <div class="col-md-6">
                                @foreach(['fa' => 'فارسی', 'en' => 'English'] as $locale => $language)
                                    <div class="mb-2">
                                        <textarea name="content[{{ $locale }}]" id="content_{{ $locale }}"
                                                  class="form-control bg-dark text-white @error('content.' . $locale) is-invalid @enderror"
                                                  placeholder="{{ __('serviceCreate.description').' ('.$language.')' }}">{{ old('content.' . $locale, json_decode($service->content, true)[$locale] ?? '') }}</textarea>
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
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('serviceCreate.category') }}</label>
                            <div class="col-md-6">
                                @foreach(['fa' => 'فارسی', 'en' => 'English'] as $locale => $language)
                                    <div class="mb-2">
                                        <input type="text" name="category[{{ $locale }}]" id="category_{{ $locale }}" 
                                               class="form-control bg-dark text-white @error('category.' . $locale) is-invalid @enderror"
                                               placeholder="{{ __('serviceCreate.category').' ('.$language.')' }}"
                                               value="{{ old('category.' . $locale, json_decode($service->category, true)[$locale] ?? '') }}">
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
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('serviceCreate.upload_banner') }}</label>
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
                            <label for="page_name" class="col-md-4 col-form-label text-md-end">{{ __('serviceCreate.select_page') }}</label>
                            <div class="col-md-6">
                                <select name="page_name" id="page_name" class="form-control bg-dark text-white @error('page_name') is-invalid @enderror">
                                    <option value="">{{ __('serviceCreate.select_page') }}</option>
                                    <option value="consulting" {{ (old('page_name', $service->page_name) == 'consulting') ? 'selected' : '' }}>{{ __('serviceCreate.consulting') }}</option>
                                    <option value="parts_repairs" {{ (old('page_name', $service->page_name) == 'parts_repairs') ? 'selected' : '' }}>{{ __('serviceCreate.parts_repairs') }}</option>
                                    <option value="engineering" {{ (old('page_name', $service->page_name) == 'engineering') ? 'selected' : '' }}>{{ __('serviceCreate.engineering') }}</option>
                                    <option value="installation" {{ (old('page_name', $service->page_name) == 'installation') ? 'selected' : '' }}>{{ __('serviceCreate.installation') }}</option>
                                    <option value="after_sales" {{ (old('page_name', $service->page_name) == 'after_sales') ? 'selected' : '' }}>{{ __('serviceCreate.after_sales') }}</option>
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
                                    {{ __('serviceCreate.update') }}
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

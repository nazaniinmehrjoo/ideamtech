@extends('layouts.app')

@section('content')
<div class="container" style="padding: 3%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mb-4">
                <img src="/assets/images/logotest2.png" alt="Logo">
            </div>

            <div class="card bg-dark text-white">
                <div class="card-header text-center">{{ __('categoryEdit.edit_category') }}</div>

                <div class="card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST" style="direction: rtl;">
                        @csrf
                        @method('PUT')

                        <!-- Category Name Input (Localized) -->
                        <div class="row mb-3">
                            <label for="name_en" class="col-md-4 col-form-label text-md-end">{{ __('categoryEdit.category_name_en') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="name[en]" id="name_en"
                                    class="form-control bg-dark text-white @error('name.en') is-invalid @enderror"
                                    value="{{ old('name.en', $category->name['en'] ?? '') }}" required>
                                @error('name.en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name_fa" class="col-md-4 col-form-label text-md-end">{{ __('categoryEdit.category_name_fa') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="name[fa]" id="name_fa"
                                    class="form-control bg-dark text-white @error('name.fa') is-invalid @enderror"
                                    value="{{ old('name.fa', $category->name['fa'] ?? '') }}" required>
                                @error('name.fa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Page Name Dropdown -->
                        <div class="row mb-3">
                            <label for="page_name" class="col-md-4 col-form-label text-md-end">{{ __('categoryEdit.page_name') }}</label>
                            <div class="col-md-6">
                                <select name="page_name" id="page_name"
                                    class="form-control bg-dark text-white @error('page_name') is-invalid @enderror"
                                    required>
                                    <option value="">{{ __('categoryEdit.select_page') }}</option>
                                    @foreach($pages as $page)
                                        <option value="{{ $page }}" {{ $category->page_name === $page ? 'selected' : '' }}>
                                            {{ __('pages.'.$page) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('page_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Description Input (Localized) -->
                        <div class="row mb-3">
                            <label for="description_en" class="col-md-4 col-form-label text-md-end">{{ __('categoryEdit.description_en') }}</label>
                            <div class="col-md-6">
                                <textarea name="description[en]" id="description_en"
                                    class="form-control bg-dark text-white @error('description.en') is-invalid @enderror">{{ old('description.en', $category->description['en'] ?? '') }}</textarea>
                                @error('description.en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description_fa" class="col-md-4 col-form-label text-md-end">{{ __('categoryEdit.description_fa') }}</label>
                            <div class="col-md-6">
                                <textarea name="description[fa]" id="description_fa"
                                    class="form-control bg-dark text-white @error('description.fa') is-invalid @enderror">{{ old('description.fa', $category->description['fa'] ?? '') }}</textarea>
                                @error('description.fa')
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
                                    {{ __('categoryEdit.update_category') }}
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

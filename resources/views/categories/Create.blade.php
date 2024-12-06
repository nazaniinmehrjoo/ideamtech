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
                <div class="card-header text-center">{{ __('categoryCreate.create_category') }}</div>

                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST" style="direction: rtl;">
                        @csrf

                        <!-- Category Name Inputs -->
                        <div class="row mb-3">
                            <label for="name_en"
                                class="col-md-4 col-form-label text-md-end">{{ __('categoryCreate.category_name_en') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="name[en]" id="name_en"
                                    class="form-control bg-dark text-white @error('name.en') is-invalid @enderror"
                                    value="{{ old('name.en') }}" required>
                                @error('name.en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name_fa"
                                class="col-md-4 col-form-label text-md-end">{{ __('categoryCreate.category_name_fa') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="name[fa]" id="name_fa"
                                    class="form-control bg-dark text-white @error('name.fa') is-invalid @enderror"
                                    value="{{ old('name.fa') }}" required>
                                @error('name.fa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Description Inputs -->
                        <div class="row mb-3">
                            <label for="description_fa"
                                class="col-md-4 col-form-label text-md-end">{{ __('categoryCreate.description_fa') }}</label>
                            <div class="col-md-6">
                                <textarea name="description[fa]" id="description_fa"
                                    class="form-control bg-dark text-white @error('description.fa') is-invalid @enderror">{{ old('description.fa') }}</textarea>
                                @error('description.fa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description_en"
                                class="col-md-4 col-form-label text-md-end">{{ __('categoryCreate.description_en') }}</label>
                            <div class="col-md-6">
                                <textarea name="description[en]" id="description_en"
                                    class="form-control bg-dark text-white @error('description.en') is-invalid @enderror">{{ old('description.en') }}</textarea>
                                @error('description.en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Page Name Dropdown -->
                        <div class="row mb-3">
                            <label for="page_name"
                                class="col-md-4 col-form-label text-md-end">{{ __('categoryCreate.page_name') }}</label>
                            <div class="col-md-6">
                                <select name="page_name" id="page_name"
                                    class="form-control bg-dark text-white @error('page_name') is-invalid @enderror"
                                    required onchange="toggleAdditionalFields(this.value)">
                                    <option value="">{{ __('categoryCreate.select_page') }}</option>
                                    @foreach($pages as $page)
                                        <option value="{{ $page }}" {{ old('page_name') == $page ? 'selected' : '' }}>{{ __('pages.' . $page) }}</option>
                                    @endforeach
                                </select>
                                @error('page_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Additional Fields for 'خشک کن' -->
                        <div id="additionalFields" style="display: none;">
                            @foreach(['total_cost', 'energy_consumption', 'production_variety', 'drying_time', 'maintenance_cost', 'operation_cost'] as $field)
                                <div class="row mb-3">
                                    <label for="{{ $field }}"
                                        class="col-md-4 col-form-label text-md-end">{{ __('categoryCreate.' . $field) }}</label>
                                    <div class="col-md-6">
                                        <input type="number" name="{{ $field }}" id="{{ $field }}"
                                            class="form-control bg-dark text-white @error($field) is-invalid @enderror"
                                            value="{{ old($field) }}">
                                        @error($field)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('categoryCreate.submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleAdditionalFields(value) {
        const additionalFields = document.getElementById('additionalFields');
        additionalFields.style.display = value === 'khoskkon' ? 'block' : 'none';
    }
</script>
@endsection

@extends('layouts.app')

@section('content')
<div class="container dashboard-container" style="padding: 3%;">
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

                        <!-- Category Name Inputs (Localized) -->
                        <div class="row mb-3">
                            <label for="name_en"
                                class="col-md-4 col-form-label text-md-end">{{ __('categoryCreate.category_name_en') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="name[en]" id="name_en"
                                    class="form-control bg-dark text-white @error('name.en') is-invalid @enderror"
                                    required>
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
                                    required>
                                @error('name.fa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Description Input -->
                        <div class="row mb-3">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-end">{{ __('categoryCreate.description_en') }}</label>
                            <div class="col-md-6">
                                <textarea name="description" id="description"
                                    class="form-control bg-dark text-white @error('description') is-invalid @enderror"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-end">{{ __('categoryCreate.description_fa') }}</label>
                            <div class="col-md-6">
                                <textarea name="description" id="description"
                                    class="form-control bg-dark text-white @error('description') is-invalid @enderror"></textarea>
                                @error('description')
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
                                        <option value="{{ $page }}">{{ __('pages.' . $page) }}</option>
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
                            <div class="row mb-3">
                                <label for="total_cost"
                                    class="col-md-4 col-form-label text-md-end">{{ __('categoryCreate.total_cost') }}</label>
                                <div class="col-md-6">
                                    <input type="number" name="total_cost" id="total_cost"
                                        class="form-control bg-dark text-white @error('total_cost') is-invalid @enderror">
                                    @error('total_cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="energy_consumption"
                                    class="col-md-4 col-form-label text-md-end">{{ __('categoryCreate.energy_consumption') }}</label>
                                <div class="col-md-6">
                                    <input type="number" name="energy_consumption" id="energy_consumption"
                                        class="form-control bg-dark text-white @error('energy_consumption') is-invalid @enderror">
                                    @error('energy_consumption')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="production_variety"
                                    class="col-md-4 col-form-label text-md-end">{{ __('categoryCreate.production_variety') }}</label>
                                <div class="col-md-6">
                                    <input type="number" name="production_variety" id="production_variety"
                                        class="form-control bg-dark text-white @error('production_variety') is-invalid @enderror">
                                    @error('production_variety')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="drying_time"
                                    class="col-md-4 col-form-label text-md-end">{{ __('categoryCreate.drying_time') }}</label>
                                <div class="col-md-6">
                                    <input type="number" name="drying_time" id="drying_time"
                                        class="form-control bg-dark text-white @error('drying_time') is-invalid @enderror">
                                    @error('drying_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="maintenance_cost"
                                    class="col-md-4 col-form-label text-md-end">{{ __('categoryCreate.maintenance_cost') }}</label>
                                <div class="col-md-6">
                                    <input type="number" name="maintenance_cost" id="maintenance_cost"
                                        class="form-control bg-dark text-white @error('maintenance_cost') is-invalid @enderror">
                                    @error('maintenance_cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="operation_cost"
                                    class="col-md-4 col-form-label text-md-end">{{ __('categoryCreate.operation_cost') }}</label>
                                <div class="col-md-6">
                                    <input type="number" name="operation_cost" id="operation_cost"
                                        class="form-control bg-dark text-white @error('operation_cost') is-invalid @enderror">
                                    @error('operation_cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
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
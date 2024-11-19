@extends('layouts.app')

@section('content')
<div class="container" style="padding: 3%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Logo Image Centered -->
            <div class="text-center mb-4">
                <img src="/assets/images/logotest2.png" alt="Logo">
            </div>

            <!-- Bootstrap Dark Card -->
            <div class="card bg-dark text-white">
                <div class="card-header text-center">{{ __('ایجاد دسته جدید') }}</div>

                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST" style="direction: rtl;">
                        @csrf

                        <!-- Category Name Input -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('نام دسته محصول') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control bg-dark text-white @error('name') is-invalid @enderror" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Page Name Dropdown -->
                        <div class="row mb-3">
                            <label for="page_name" class="col-md-4 col-form-label text-md-end">{{ __('نمایش در صفحه') }}</label>
                            <div class="col-md-6">
                                <select name="page_name" id="page_name" class="form-control bg-dark text-white @error('page_name') is-invalid @enderror" required onchange="toggleKhoskkonFields(this.value)">
                                    <option value="">{{ __('-- انتخاب صفحه --') }}</option>
                                    <option value="khoskkon">خشک کن</option>
                                    <option value="korepokht">کوره پخت</option>
                                    <option value="mashinAlatShekldehi">ماشین آلات شکل دهی</option>
                                    <option value="mashinalatvatajhizat">ماشین آلات و تجهیزات</option>
                                </select>
                                @error('page_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Additional Fields for Khoskkon -->
                        <div id="khoskkonFields" style="display: none;">
                            <div class="row mb-3">
                                <label for="total_cost" class="col-md-4 col-form-label text-md-end">هزینه تمام شده</label>
                                <div class="col-md-6">
                                    <input type="number" name="total_cost" id="total_cost" class="form-control bg-dark text-white @error('total_cost') is-invalid @enderror">
                                    @error('total_cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="energy_consumption" class="col-md-4 col-form-label text-md-end">مصرف انرژی</label>
                                <div class="col-md-6">
                                    <input type="number" name="energy_consumption" id="energy_consumption" class="form-control bg-dark text-white @error('energy_consumption') is-invalid @enderror">
                                    @error('energy_consumption')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="production_variety" class="col-md-4 col-form-label text-md-end">تنوع تولید</label>
                                <div class="col-md-6">
                                    <input type="number" name="production_variety" id="production_variety" class="form-control bg-dark text-white @error('production_variety') is-invalid @enderror">
                                    @error('production_variety')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="drying_time" class="col-md-4 col-form-label text-md-end">زمان خشک شدن</label>
                                <div class="col-md-6">
                                    <input type="number" name="drying_time" id="drying_time" class="form-control bg-dark text-white @error('drying_time') is-invalid @enderror">
                                    @error('drying_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="maintenance_cost" class="col-md-4 col-form-label text-md-end">هزینه تعمیر و نگهداری</label>
                                <div class="col-md-6">
                                    <input type="number" name="maintenance_cost" id="maintenance_cost" class="form-control bg-dark text-white @error('maintenance_cost') is-invalid @enderror">
                                    @error('maintenance_cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="operation_cost" class="col-md-4 col-form-label text-md-end">هزینه اپراتوری</label>
                                <div class="col-md-6">
                                    <input type="number" name="operation_cost" id="operation_cost" class="form-control bg-dark text-white @error('operation_cost') is-invalid @enderror">
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
                                <button type="submit" class="theme-btn btn-style-two">
                                    {{ __('ثبت') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleKhoskkonFields(value) {
        const khoskkonFields = document.getElementById('khoskkonFields');
        khoskkonFields.style.display = value === 'khoskkon' ? 'block' : 'none';
    }
</script>
@endsection

@extends('layouts.app')

@section('content')
<div class="container" style="padding: 3%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mb-4">
                <img src="/assets/images/logotest2.png" alt="Logo">
            </div>

            <div class="card bg-dark text-white">
                <div class="card-header text-center">{{ __('ویرایش ') }}</div>

                <div class="card-body">
                    <form action="{{ route('cooperations.update', $cooperation->id) }}" method="POST" enctype="multipart/form-data" style="direction: rtl;">
                        @csrf
                        @method('PUT')

                        <!-- Company Name Input -->
                        <div class="row mb-3">
                            <label for="company_name" class="col-md-4 col-form-label text-md-end">{{ __('نام شرکت') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="company_name" id="company_name" class="form-control bg-dark text-white @error('company_name') is-invalid @enderror" value="{{ old('company_name', $cooperation->company_name) }}" required>

                                @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Company Phone Input -->
                        <div class="row mb-3">
                            <label for="company_phone" class="col-md-4 col-form-label text-md-end">{{ __('تلفن شرکت') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="company_phone" id="company_phone" class="form-control bg-dark text-white @error('company_phone') is-invalid @enderror" value="{{ old('company_phone', $cooperation->company_phone) }}" required>

                                @error('company_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Company Email Input -->
                        <div class="row mb-3">
                            <label for="company_email" class="col-md-4 col-form-label text-md-end">{{ __('ایمیل شرکت') }}</label>

                            <div class="col-md-6">
                                <input type="email" name="company_email" id="company_email" class="form-control bg-dark text-white @error('company_email') is-invalid @enderror" value="{{ old('company_email', $cooperation->company_email) }}" required>

                                @error('company_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Country Input -->
                        <div class="row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('کشور') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="country" id="country" class="form-control bg-dark text-white @error('country') is-invalid @enderror" value="{{ old('country', $cooperation->country) }}" required>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- National ID Input -->
                        <div class="row mb-3">
                            <label for="national_id" class="col-md-4 col-form-label text-md-end">{{ __('شناسه ملی') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="national_id" id="national_id" class="form-control bg-dark text-white @error('national_id') is-invalid @enderror" value="{{ old('national_id', $cooperation->national_id) }}" required>

                                @error('national_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Address Input -->
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('آدرس') }}</label>

                            <div class="col-md-6">
                                <textarea name="address" id="address" class="form-control bg-dark text-white @error('address') is-invalid @enderror" required>{{ old('address', $cooperation->address) }}</textarea>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Activity Field Input -->
                        <div class="row mb-3">
                            <label for="activity_field" class="col-md-4 col-form-label text-md-end">{{ __('زمینه فعالیت') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="activity_field" id="activity_field" class="form-control bg-dark text-white @error('activity_field') is-invalid @enderror" value="{{ old('activity_field', $cooperation->activity_field) }}" required>

                                @error('activity_field')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="theme-btn btn-style-two">{{ __('بروزرسانی') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

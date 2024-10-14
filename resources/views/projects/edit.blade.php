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
                    {{ __('ویرایش پروژه') }}
                </div>

                <div class="card-body">
                    <!-- Form to Edit a Project -->
                    <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" style="direction: rtl;">
                        @csrf
                        @method('PUT')

                        <!-- Project Name Input -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('نام پروژه') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control bg-dark text-white @error('name') is-invalid @enderror" value="{{ $project->name }}" required>
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Capacity Input -->
                        <div class="row mb-3">
                            <label for="capacity" class="col-md-4 col-form-label text-md-end">{{ __('ظرفیت') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="capacity" id="capacity" class="form-control bg-dark text-white @error('capacity') is-invalid @enderror" value="{{ $project->capacity }}" required>
                                
                                @error('capacity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Client Input -->
                        <div class="row mb-3">
                            <label for="client" class="col-md-4 col-form-label text-md-end">{{ __('کارفرما') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="client" id="client" class="form-control bg-dark text-white @error('client') is-invalid @enderror" value="{{ $project->client }}" required>
                                
                                @error('client')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Start Date Input -->
                        <div class="row mb-3">
                            <label for="start_date" class="col-md-4 col-form-label text-md-end">{{ __('تاریخ شروع') }}</label>

                            <div class="col-md-6">
                                <input type="date" name="start_date" id="start_date" class="form-control bg-dark text-white @error('start_date') is-invalid @enderror" value="{{ $project->start_date }}" required>
                                
                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- End Date Input -->
                        <div class="row mb-3">
                            <label for="end_date" class="col-md-4 col-form-label text-md-end">{{ __('تاریخ پایان (اختیاری)') }}</label>

                            <div class="col-md-6">
                                <input type="date" name="end_date" id="end_date" class="form-control bg-dark text-white @error('end_date') is-invalid @enderror" value="{{ $project->end_date }}">
                                
                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Status Input -->
                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('وضعیت') }}</label>

                            <div class="col-md-6">
                                <select name="status" id="status" class="form-control bg-dark text-white @error('status') is-invalid @enderror">
                                    <option value="تکمیل شده" {{ $project->status == 'تکمیل شده' ? 'selected' : '' }}>تکمیل شده</option>
                                    <option value="در حال انجام" {{ $project->status == 'در حال انجام' ? 'selected' : '' }}>در حال انجام</option>
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Project Type Input -->
                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('نوع پروژه') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="type" id="type" class="form-control bg-dark text-white @error('type') is-invalid @enderror" value="{{ $project->type }}" required>
                                
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Latitude Input -->
                        <div class="row mb-3">
                            <label for="lat" class="col-md-4 col-form-label text-md-end">{{ __('عرض جغرافیایی (Latitude)') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="lat" id="lat" class="form-control bg-dark text-white @error('lat') is-invalid @enderror" value="{{ $project->lat }}" required>
                                
                                @error('lat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Longitude Input -->
                        <div class="row mb-3">
                            <label for="lng" class="col-md-4 col-form-label text-md-end">{{ __('طول جغرافیایی (Longitude)') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="lng" id="lng" class="form-control bg-dark text-white @error('lng') is-invalid @enderror" value="{{ $project->lng }}" required>
                                
                                @error('lng')
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
                                    {{ __('بروزرسانی پروژه') }}
                                </button>
                                <a href="{{ route('projects.index') }}" class="btn btn-secondary">{{ __('لغو') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

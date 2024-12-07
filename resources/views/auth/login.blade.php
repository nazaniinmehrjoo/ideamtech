@extends('layouts.app')

@section('content')
<div class="container" style="padding: 3%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Logo Image Centered -->
            <div class="text-center mb-4">
                <img src="/assets/images/logotest2.png" alt="برناگستر پارسی ">
            </div>

            <!-- Use Bootstrap Dark Card -->
            <div class="card bg-dark text-white">
                <div class="card-header text-center">{{ __('ورود') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" style="direction:rtl">
                        @csrf

                        <!-- Email Input -->
                        <div class="row mb-3 justify-content-center">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-center">{{ __('آدرس ایمیل') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control bg-dark text-white @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="row mb-3 justify-content-center">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-center">{{ __('رمز عبور') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control bg-dark text-white @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-8">
                                <div class="form-check d-flex align-items-center gap-2">
                                    <input class="form-check-input bg-dark text-white" type="checkbox" name="remember" id="remember">

                                    <label class="form-check-label fw-bold mb-0" for="remember">
                                        مرا به خاطر بسپار
                                    </label>
                                </div>
                            </div>  
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="theme-btn btn-style-two">
                                    {{ __('ورود') }}
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

@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش فرم</title>
    <style>
        body {
            direction: rtl;
            /* Right-to-left layout */
        }

        .form-label {
            text-align: right;
            direction: rtl;
        }

        .form-control {
            direction: rtl;
            text-align: right;
        }

        .bg-dark {
            background-color: #343a40 !important;
        }

        .text-light {
            color: #f8f9fa !important;
        }
    </style>
</head>

@php
    // Decode stored JSON fields
    $customerProducts = json_decode($customer->products, true) ?? [];
    $customerMessengers = json_decode($customer->messenger, true) ?? [];
@endphp

<div class="container my-5 bg-dark text-light p-4 rounded" style="direction:rtl">
    <div class="text-center mb-4">
        <img src="/assets/images/logotest2.png" alt="Logo">
    </div>
    <h1 class="text-center mb-4">ویرایش فرم</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('customer.update', ['locale' => app()->getLocale(), 'customer' => $customer->id]) }}"
        method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="factory_code" class="form-label">کد</label>
            <input type="text" class="form-control bg-secondary text-light" id="factory_code" name="factory_code"
                value="{{ $customer->factory_code }}" required>
        </div>

        <div class="mb-3">
            <label for="factory_name" class="form-label">نام کارخانه</label>
            <input type="text" class="form-control bg-secondary text-light" id="factory_name" name="factory_name"
                value="{{ $customer->factory_name }}" required>
        </div>

        <div class="mb-3">
            <label for="first_name" class="form-label">نام</label>
            <input type="text" class="form-control bg-secondary text-light" id="first_name" name="first_name"
                value="{{ $customer->first_name }}" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">نام خانوادگی</label>
            <input type="text" class="form-control bg-secondary text-light" id="last_name" name="last_name"
                value="{{ $customer->last_name }}" required>
        </div>

        <div class="mb-3">
            <label for="factory_phone" class="form-label">شماره کارخانه</label>
            <input type="text" class="form-control bg-secondary text-light" id="factory_phone" name="factory_phone"
                value="{{ $customer->factory_phone }}" required>
        </div>

        <div class="mb-3">
            <label for="mobile_phone" class="form-label">شماره همراه</label>
            <input type="text" class="form-control bg-secondary text-light" id="mobile_phone" name="mobile_phone"
                value="{{ $customer->mobile_phone }}" required>
        </div>

        <div class="mb-3">
            <label for="province" class="form-label">استان</label>
            <input type="text" class="form-control bg-secondary text-light" id="province" name="province"
                value="{{ $customer->province }}" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">شهر</label>
            <input type="text" class="form-control bg-secondary text-light" id="city" name="city"
                value="{{ $customer->city }}" required>
        </div>
        <div class="mb-3">
            <label for="products" class="form-label">محصولات</label>
            <select multiple class="form-control bg-secondary text-light" id="products" name="products[]">
                <option value="سفال 10" {{ in_array('سفال 10', $customerProducts) ? 'selected' : '' }}>سفال 10</option>
                <option value="سفال 15" {{ in_array('سفال 15', $customerProducts) ? 'selected' : '' }}>سفال 15</option>
                <option value="سقفی" {{ in_array('سقفی', $customerProducts) ? 'selected' : '' }}>سقفی</option>
                <option value="سه گل" {{ in_array('سه گل', $customerProducts) ? 'selected' : '' }}>سه گل</option>
                <option value="فشاری" {{ in_array('فشاری', $customerProducts) ? 'selected' : '' }}>فشاری</option>
                <option value="لفتون" {{ in_array('لفتون', $customerProducts) ? 'selected' : '' }}>لفتون</option>
            </select>
        </div>

        <!-- Display Selected Products -->
        <div id="selected-products-section" class="bg-dark p-3 rounded text-light mb-3"
            style="display: {{ count($customerProducts) > 0 ? 'block' : 'none' }};">
            <h3>محصول های انتخاب شده</h3>
            <ul id="selected-products-list">
                @foreach($customerProducts as $product)
                    <li>{{ $product }}</li>
                @endforeach
            </ul>
        </div>

        <!-- ✅ Kiln Type -->
        <div class="mb-3">
            <label for="kiln_type" class="form-label">نوع کوره</label>
            <select class="form-control bg-secondary text-light" id="kiln_type" name="kiln_type" required>
                <option value="تونلی" {{ $customer->kiln_type == 'تونلی' ? 'selected' : '' }}>تونلی</option>
                <option value="شیطونی" {{ $customer->kiln_type == 'شیطونی' ? 'selected' : '' }}>شیطونی</option>
                <option value="هافمن" {{ $customer->kiln_type == 'هافمن' ? 'selected' : '' }}>هافمن</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="dryer_type" class="form-label">نوع خشک کن</label>
            <select class="form-control bg-secondary text-light" id="dryer_type" name="dryer_type" required>
                <option value="آفتابی" {{ $customer->dryer_type == 'آفتابی' ? 'selected' : '' }}>آفتابی</option>
                <option value="اتاقکی" {{ $customer->dryer_type == 'اتاقکی' ? 'selected' : '' }}>اتاقکی</option>
                <option value="تونلی" {{ $customer->dryer_type == 'تونلی' ? 'selected' : '' }}>تونلی</option>
                <option value="سریع خشک" {{ $customer->dryer_type == 'سریع خشک' ? 'selected' : '' }}>سریع خشک</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="messenger" class="form-label">پیام رسان‌ها</label>
            @foreach (['تلگرام', 'واتساپ', 'اینستاگرام', 'روبیکا', 'ایتا'] as $platform)
                <div class="mb-2">
                    <input type="checkbox" id="messenger_{{ $platform }}" class="messenger-checkbox" name="messenger[]"
                        value="{{ $platform }}" {{ array_key_exists($platform, $customerMessengers) ? 'checked' : '' }}>
                    <label for="messenger_{{ $platform }}">{{ $platform }}</label>

                    <input type="text" class="form-control bg-secondary text-light mt-1 messenger-input"
                        name="messenger_details[{{ $platform }}]" value="{{ $customerMessengers[$platform] ?? '' }}"
                        placeholder="شماره {{ $platform }}"
                        style="display: {{ array_key_exists($platform, $customerMessengers) ? 'block' : 'none' }};">
                </div>
            @endforeach
        </div>
        <!-- ✅ Dough Count -->
        <div class="mb-3">
            <label for="dough_count" class="form-label">تعداد قمیر</label>
            <input type="number" class="form-control bg-secondary text-light" id="dough_count" name="dough_count"
                value="{{ $customer->dough_count }}" required>
        </div>

        <div class="row">
            <div class="col-md-6">
                <button type="submit" class="theme-btn btn-style-two">ذخیره تغییرات</button>
            </div>
            <div class="col-md-6">
                <a href="{{ route('customer.index', ['locale' => app()->getLocale()]) }}"
                    class="btn btn-secondary">برگشت</a>
            </div>
        </div>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.messenger-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const inputField = this.closest('div').querySelector('.messenger-input');
                if (this.checked) {
                    inputField.style.display = 'block';
                    inputField.required = true;
                } else {
                    inputField.style.display = 'none';
                    inputField.required = false;
                    inputField.value = ''; // Clear input if unchecked
                }
            });
        });
    });
</script>
@endsection
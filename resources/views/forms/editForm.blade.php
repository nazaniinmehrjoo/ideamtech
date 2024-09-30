@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش فرم</title>
    <style>
        body {
            direction: rtl; /* Ensure the body text direction is right-to-left */
        }
        .form-label {
            text-align: right; /* Align labels to the right */
        }
        .form-control {
            direction: rtl; /* Right-to-left for inputs */
        }
    </style>
    <script>
        // Function to show/hide input fields based on selected social media
        function toggleMessengerInput(selectedValue) {
            const platforms = ['تلگرام', 'واتساپ', 'اینستاگرام', 'روبیکا', 'ایتا'];
            platforms.forEach(platform => {
                const inputField = document.getElementById(`messenger_${platform}`);
                if (platform === selectedValue) {
                    inputField.style.display = 'block';
                } else {
                    inputField.style.display = 'none';
                }
            });
        }
    </script>
</head>

<div class="container my-5">
    <h1 class="text-center mb-4">ویرایش فرم</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('customer.update', $customer->id) }}" method="POST" class="text-right">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="factory_code" class="form-label">کد</label>
            <input type="text" class="form-control" id="factory_code" name="factory_code" value="{{ $customer->factory_code }}">
        </div>

        <div class="mb-3">
            <label for="factory_name" class="form-label">نام کارخانه</label>
            <input type="text" class="form-control" id="factory_name" name="factory_name" value="{{ $customer->factory_name }}">
        </div>

        <div class="mb-3">
            <label for="first_name" class="form-label">نام</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $customer->first_name }}">
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">نام خانوادگی</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $customer->last_name }}">
        </div>

        <div class="mb-3">
            <label for="factory_phone" class="form-label">شماره کارخانه</label>
            <input type="text" class="form-control" id="factory_phone" name="factory_phone" value="{{ $customer->factory_phone }}">
        </div>

        <div class="mb-3">
            <label for="mobile_phone" class="form-label">شماره همراه</label>
            <input type="text" class="form-control" id="mobile_phone" name="mobile_phone" value="{{ $customer->mobile_phone }}">
        </div>

        <div class="mb-3">
            <label for="province" class="form-label">استان</label>
            <input type="text" class="form-control" id="province" name="province" value="{{ $customer->province }}">
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">شهر</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ $customer->city }}">
        </div>

        <div class="mb-3">
            <label for="products" class="form-label">محصولات</label>
            <input type="text" class="form-control" id="products" name="products" value="{{ is_array($customer->products) ? implode(', ', $customer->products) : ($customer->products ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="kiln_type" class="form-label">نوع کوره</label>
            <input type="text" class="form-control" id="kiln_type" name="kiln_type" value="{{ $customer->kiln_type }}">
        </div>

        <div class="mb-3">
            <label for="dryer_type" class="form-label">نوع خشک کن</label>
            <input type="text" class="form-control" id="dryer_type" name="dryer_type" value="{{ $customer->dryer_type }}">
        </div>

        <div class="mb-3">
            <label for="dough_count" class="form-label">تعداد قمیر</label>
            <input type="number" class="form-control" id="dough_count" name="dough_count" value="{{ $customer->dough_count }}">
        </div>

        <div class="mb-3">
            <label for="messenger" class="form-label">پیام رسان‌ها</label>
            <select id="messenger" class="form-control" name="messenger_platform" onchange="toggleMessengerInput(this.value)">
                <option value="">انتخاب کنید</option>
                <option value="تلگرام" {{ isset($customer->messenger) && array_key_exists('تلگرام', $customer->messenger) ? 'selected' : '' }}>تلگرام</option>
                <option value="واتساپ" {{ isset($customer->messenger) && array_key_exists('واتساپ', $customer->messenger) ? 'selected' : '' }}>واتساپ</option>
                <option value="روبیکا" {{ isset($customer->messenger) && array_key_exists('روبیکا', $customer->messenger) ? 'selected' : '' }}>روبیکا</option>
                <option value="ایتا" {{ isset($customer->messenger) && array_key_exists('ایتا', $customer->messenger) ? 'selected' : '' }}>ایتا</option>
                <option value="اینستاگرام" {{ isset($customer->messenger) && array_key_exists('اینستاگرام', $customer->messenger) ? 'selected' : '' }}>اینستاگرام</option>
            </select>
        </div>

        @foreach (['تلگرام', 'واتساپ', 'اینستاگرام', 'روبیکا', 'ایتا',] as $platform)
            <div class="mb-3" id="messenger_{{ $platform }}" style="display: {{ isset($customer->messenger) && array_key_exists($platform, $customer->messenger) ? 'block' : 'none' }};">
                <label for="messenger_{{ $platform }}_number" class="form-label">{{ $platform }} شماره</label>
                <input type="text" class="form-control" id="messenger_{{ $platform }}_number" name="messenger[{{ $platform }}]" value="{{ isset($customer->messenger[$platform]) ? $customer->messenger[$platform] : '' }}">
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        <a href="{{ route('customer.index') }}" class="btn btn-secondary">برگشت</a>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection

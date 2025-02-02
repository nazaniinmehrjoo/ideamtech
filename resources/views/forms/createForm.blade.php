@extends('layouts.app')

@section('content')
<div class="form-container bg-dark text-light p-4 rounded">

    <div class="text-center mb-4">
        <img src="/assets/images/logotest2.png" alt="Logo">
    </div>

    <form action="{{ route('customer.store', ['locale' => app()->getLocale()]) }}" method="POST"
        class="needs-validation" novalidate>
        @csrf

        <div class="form-row mb-3">

            <div class="col">
                <label for="factory_phone">شماره کارخانه</label>
                <input type="text" class="form-control bg-secondary text-light" id="factory_phone" name="factory_phone"
                    required>
                <div class="invalid-feedback">Please enter the factory phone number.</div>
            </div>
            <div class="col">
                <label for="factory_name">نام کار خانه</label>
                <input type="text" class="form-control bg-secondary text-light" id="factory_name" name="factory_name"
                    required>
                <div class="invalid-feedback">Please enter the factory name.</div>
            </div>
        </div>

        <div class="form-row mb-3">
            <div class="col">
                <label for="last_name">نام خانوادگی</label>
                <input type="text" class="form-control bg-secondary text-light" id="last_name" name="last_name"
                    required>
                <div class="invalid-feedback">Please enter your last name.</div>
            </div>
            <div class="col">
                <label for="first_name">نام</label>
                <input type="text" class="form-control bg-secondary text-light" id="first_name" name="first_name"
                    required>
                <div class="invalid-feedback">Please enter your first name.</div>
            </div>
        </div>

        <div class="form-row mb-3">
            <div class="col">
                <label for="factory_code">کد</label>
                <input type="text" class="form-control bg-secondary text-light" id="factory_code" name="factory_code"
                    required>
                <div class="invalid-feedback">Please enter a valid code.</div>
            </div>
            <div class="col">
                <label for="mobile_phone">شماره همراه</label>
                <input type="text" class="form-control bg-secondary text-light" id="mobile_phone" name="mobile_phone"
                    required>
                <div class="invalid-feedback">Please enter your mobile phone number.</div>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="province">استان</label>
            <select class="form-control bg-secondary text-light" id="province" name="province" required>
                <option value="">Select Province</option>
                <option value="آذربایجان شرقی">آذربایجان شرقی</option>
                <option value="آذربایجان غربی">آذربایجان غربی</option>
                <option value="اردبیل">اردبیل</option>
                <option value="اصفهان">اصفهان</option>
                <option value="البرز">البرز</option>
                <option value="ایلام">ایلام</option>
                <option value="بوشهر">بوشهر</option>
                <option value="تهران">تهران</option>
                <option value="چهارمحال و بختیاری">چهارمحال و بختیاری</option>
                <option value="خراسان جنوبی">خراسان جنوبی</option>
                <option value="خراسان رضوی">خراسان رضوی</option>
                <option value="خراسان شمالی">خراسان شمالی</option>
                <option value="خوزستان">خوزستان</option>
                <option value="زنجان">زنجان</option>
                <option value="سمنان">سمنان</option>
                <option value="سیستان و بلوچستان">سیستان و بلوچستان</option>
                <option value="فارس">فارس</option>
                <option value="قزوین">قزوین</option>
                <option value="قم">قم</option>
                <option value="کردستان">کردستان</option>
                <option value="کرمان">کرمان</option>
                <option value="کرمانشاه">کرمانشاه</option>
                <option value="کهگیلویه و بویراحمد">کهگیلویه و بویراحمد</option>
                <option value="گلستان">گلستان</option>
                <option value="گیلان">گیلان</option>
                <option value="لرستان">لرستان</option>
                <option value="مازندران">مازندران</option>
                <option value="مرکزی">مرکزی</option>
                <option value="هرمزگان">هرمزگان</option>
                <option value="همدان">همدان</option>
                <option value="یزد">یزد</option>
            </select>
            <div class="invalid-feedback">Please select a province.</div>
        </div>

        <div class="form-group mb-3">
            <label for="city">نام شهر</label>
            <select class="form-control bg-secondary text-light" id="city" name="city" required>
                <option value="">انتخاب شهر</option>
                <option value="حبیب آباد">حبیب آباد</option>
                <option value="دولت آباد">دولت آباد</option>
                <option value="گز برخوار">گز برخوار</option>
                <option value="محمد آباد">محمد آباد</option>
            </select>
            <div class="invalid-feedback">انتخاب شهر</div>
        </div>

        <div class="form-group mb-3">
            <label for="address">آدرس</label>
            <textarea class="form-control bg-secondary text-light" id="address" name="address" rows="3"
                required></textarea>
            <div class="invalid-feedback">Please enter your address.</div>
        </div>

        <div class="form-group mb-3">
            <label for="products">محصولات</label>
            <select multiple class="form-control bg-secondary text-light" id="products" name="products[]" required>
                <option value="سفال 10">سفال 10</option>
                <option value="سفال 15">سفال 15</option>
                <option value="سقفی">سقفی</option>
                <option value="سه گل">سه گل</option>
                <option value="فشاری">فشاری</option>
                <option value="لفتون">لفتون</option>
            </select>
            <div class="invalid-feedback">Please select at least one product.</div>
        </div>

        <!-- Selected Products Section -->
        <div id="selected-products-section" class="bg-dark p-3 rounded text-light mb-3" style="display:none;">
            <h3>محصول های انتخاب شده</h3>
            <ul id="selected-products-list"></ul>
        </div>

        <div class="form-group mb-3">
            <label for="kiln_type">نوع کوره</label>
            <select class="form-control bg-secondary text-light" id="kiln_type" name="kiln_type" required>
                <option value="تونلی">تونلی</option>
                <option value="شیطونی">شیطونی</option>
                <option value="هافمن">هافمن</option>
            </select>
            <div class="invalid-feedback">Please select a kiln type.</div>
        </div>

        <div class="form-group mb-3">
            <label for="dryer_type">نوع خشک کن</label>
            <select class="form-control bg-secondary text-light" id="dryer_type" name="dryer_type" required>
                <option value="آفتابی">آفتابی</option>
                <option value="اتاقکی">اتاقکی</option>
                <option value="تونلی">تونلی</option>
                <option value="سریع خشک">سریع خشک</option>
            </select>
            <div class="invalid-feedback">Please select a dryer type.</div>
        </div>

        <div class="form-group mb-3">
            <label for="dough_count">تعداد قمیر</label>
            <input type="number" class="form-control bg-secondary text-light" id="dough_count" name="dough_count"
                required>
            <div class="invalid-feedback">Please enter the dough count.</div>
        </div>

        <div class="form-group mb-4">
            <label>پیام‌رسان‌ها</label>
            @foreach (['ایتا', 'تلگرام', 'روبیکا', 'واتس اپ', 'اینستاگرام'] as $platform)
                <div class="form-check">
                    <input class="form-check-input messenger-checkbox" type="checkbox" value="{{ $platform }}"
                        id="messenger_{{ $platform }}" name="messenger[]">
                    <label class="form-check-label" for="messenger_{{ $platform }}">{{ $platform }}</label>
                    <input type="text" class="form-control mt-2 bg-secondary text-light d-none messenger-input"
                        id="messenger_input_{{ $platform }}" name="messenger_details[{{ $platform }}]"
                        placeholder="شماره {{ $platform }}">
                </div>
            @endforeach
        </div>


        <button type="submit" class="theme-btn btn-style-two">ثبت فرم</button>

    </form>

</div>

<!-- jQuery and Select2 JS Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.messenger-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const inputField = document.getElementById(`messenger_input_${this.value}`);
                inputField.classList.toggle('d-none', !this.checked);
                inputField.required = this.checked;
            });
        });
    });
</script>
<!-- Custom JS for form validation and select2 -->
<script>
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            const forms = document.getElementsByClassName('needs-validation');
            for (let i = 0; i < forms.length; i++) {
                forms[i].addEventListener('submit', function (event) {
                    if (forms[i].checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    forms[i].classList.add('was-validated');
                }, false);
            }
        }, false);
    })();

    $('#province').select2({
        placeholder: 'Select Province',
        allowClear: true
    });

    $('#products').on('change', function () {
        const selectedOptions = Array.from(this.selectedOptions);
        const selectedValues = selectedOptions.map(option => option.value);
        const productList = $('#selected-products-list');
        productList.empty();
        selectedValues.forEach(product => {
            const listItem = $('<li>').text(product);
            productList.append(listItem);
        });
        if (selectedValues.length) {
            $('#selected-products-section').show();
        } else {
            $('#selected-products-section').hide();
        }
    });

    function toggleInput(id) {
        const input = document.getElementById(id);
        if (input.classList.contains('d-none')) {
            input.classList.remove('d-none');
            input.required = true;
        } else {
            input.classList.add('d-none');
            input.required = false;
        }
    }
</script>

@endsection
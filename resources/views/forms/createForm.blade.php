@extends('layouts.app')

@section('content')
<div class="form-container">

    <h2 class="mb-4">فرم مشتریان</h2>

    <form action="{{ route('customer.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf

        <div class="form-row mb-3">
            <div class="col">
                <label for="factory_code">کد</label>
                <input type="text" class="form-control" id="factory_code" name="factory_code" required>
                <div class="invalid-feedback">Please enter a valid code.</div>
            </div>
            <div class="col">
                <label for="factory_name">نام کار خانه</label>
                <input type="text" class="form-control" id="factory_name" name="factory_name" required>
                <div class="invalid-feedback">Please enter the factory name.</div>
            </div>
        </div>

        <div class="form-row mb-3">
            <div class="col">
                <label for="first_name">نام</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
                <div class="invalid-feedback">Please enter your first name.</div>
            </div>
            <div class="col">
                <label for="last_name">نام خانوادگی</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
                <div class="invalid-feedback">Please enter your last name.</div>
            </div>
        </div>

        <div class="form-row mb-3">
            <div class="col">
                <label for="factory_phone">شماره کارخانه</label>
                <input type="text" class="form-control" id="factory_phone" name="factory_phone" required>
                <div class="invalid-feedback">Please enter the factory phone number.</div>
            </div>
            <div class="col">
                <label for="mobile_phone">شماره همراه</label>
                <input type="text" class="form-control" id="mobile_phone" name="mobile_phone" required>
                <div class="invalid-feedback">Please enter your mobile phone number.</div>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="province">استان</label>
            <select class="form-control" id="province" name="province" required>
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
            <select class="form-control" id="city" name="city" required>
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
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            <div class="invalid-feedback">Please enter your address.</div>
        </div>

        <div class="form-group mb-3">
            <label for="products">محصولات</label>
            <select multiple class="form-control" id="products" name="products[]" required>
                <option value="سفال 10">سفال 10</option>
                <option value="سفال 15">سفال 15</option>
                <option value="سقفی">سقفی</option>
                <option value="سه گل">سه گل</option>
                <option value="فشاری">فشاری</option>
                <option value="لفتون">لفتون</option>
            </select>
            <div class="invalid-feedback">Please select at least one product.</div>
        </div>

        <!-- Selected Products Section (Initially Hidden) -->
        <div id="selected-products-section">
            <h3>محصول های انتخاب شده</h3>
            <ul id="selected-products-list"></ul>
        </div>

        <div class="form-group mb-3">
            <label for="kiln_type">نوع کوره</label>
            <select class="form-control" id="kiln_type" name="kiln_type" required>
                <option value="تونلی">تونلی</option>
                <option value="شیطونی">شیطونی</option>
                <option value="هافمن">هافمن</option>
            </select>
            <div class="invalid-feedback">Please select a kiln type.</div>
        </div>

        <div class="form-group mb-3">
            <label for="dryer_type">نوع خشک کن</label>
            <select class="form-control" id="dryer_type" name="dryer_type" required>
                <option value="آفتابی">آفتابی</option>
                <option value="اتاقکی">اتاقکی</option>
                <option value="تونلی">تونلی</option>
                <option value="سریع خشک">سریع خشک</option>
            </select>
            <div class="invalid-feedback">Please select a dryer type.</div>
        </div>

        <div class="form-group mb-3">
            <label for="dough_count">تعداد قمیر</label>
            <input type="number" class="form-control" id="dough_count" name="dough_count" required>
            <div class="invalid-feedback">Please enter the dough count.</div>
        </div>

        <div class="form-group mb-4">
            <label>پیام رسان ها</label>
            <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="ایتا" id="messenger_ita" name="messenger[]" onclick="toggleInput('ita_id')">
                        <label class="form-check-label" for="messenger_ita">ایتا</label>
                        <input type="text" class="form-control mt-2 d-none" id="ita_id" name="ita_id" placeholder="ID/Number for ایتا">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="تلگرام" id="messenger_telegram" name="messenger[]" onclick="toggleInput('telegram_id')">
                        <label class="form-check-label" for="messenger_telegram">تلگرام</label>
                        <input type="text" class="form-control mt-2 d-none" id="telegram_id" name="telegram_id" placeholder="ID/Number for تلگرام">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="روبیکا" id="messenger_rubika" name="messenger[]" onclick="toggleInput('rubika_id')">
                        <label class="form-check-label" for="messenger_rubika">روبیکا</label>
                        <input type="text" class="form-control mt-2 d-none" id="rubika_id" name="rubika_id" placeholder="ID/Number for روبیکا">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="واتس اپ" id="messenger_whatsapp" name="messenger[]" onclick="toggleInput('whatsapp_id')">
                        <label class="form-check-label" for="messenger_whatsapp">واتس اپ</label>
                        <input type="text" class="form-control mt-2 d-none" id="whatsapp_id" name="whatsapp_id" placeholder="ID/Number for واتس اپ">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="اینستاگرام" id="messenger_instagram" name="messenger[]" onclick="toggleInput('instagram_id')">
                        <label class="form-check-label" for="messenger_instagram">اینستاگرام</label>
                        <input type="text" class="form-control mt-2 d-none" id="instagram_id" name="instagram_id" placeholder="ID/Number for اینستاگرام">
                    </div>
                </div>

        <button type="submit" class="theme-btn btn-style-two">ثبت فرم</button> 
        

    </form>

    <!-- Add jQuery and Select2 JS at the bottom of the body section -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
       function toggleInput(id) {
            const input = document.getElementById(id);
            if (input.classList.contains('d-none')) {
                input.classList.remove('d-none');
                input.required = true; // Add required attribute when visible
            } else {
                input.classList.add('d-none');
                input.required = false; // Remove required attribute when hidden
            }
        }
    </script>
    <script>
        
        (function () {
            'use strict'
            window.addEventListener('load', function () {
                const forms = document.getElementsByClassName('needs-validation')
                for (let i = 0; i < forms.length; i++) {
                    forms[i].addEventListener('submit', function (event) {
                        if (forms[i].checkValidity() === false) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        forms[i].classList.add('was-validated')
                    }, false)
                }
            }, false)
        })();
    </script>
    </script>
    <script>
    $(document).ready(function() {
        $('#province').select2({
            placeholder: 'Select Province',
            allowClear: true
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Handle product click
        document.querySelectorAll('.product-card').forEach(function(card) {
            card.addEventListener('click', function() {
                // Toggle the selected state
                card.classList.toggle('selected');
            });
        });
    });
</script>
<script>
        const productSelect = document.getElementById('products');
        const selectedProductsSection = document.getElementById('selected-products-section');
        const selectedProductsList = document.getElementById('selected-products-list');

        // Function to show selected products
        productSelect.addEventListener('change', function() {
            const selectedOptions = Array.from(productSelect.selectedOptions);
            const selectedValues = selectedOptions.map(option => option.value);

            // Clear previous list
            selectedProductsList.innerHTML = '';

            // Check if any product is selected
            if (selectedValues.length > 0) {
                selectedValues.forEach(product => {
                    const listItem = document.createElement('li');
                    listItem.className = 'product-item';

                    const productName = document.createElement('span');
                    productName.textContent = product;

                    const removeButton = document.createElement('button');
                    removeButton.className = 'remove-btn';
                    removeButton.innerHTML = '&minus;'; // HTML entity for minus sign

                    // Add event listener to remove button
                    removeButton.addEventListener('click', () => {
                        removeProduct(product);
                    });

                    listItem.appendChild(productName);
                    listItem.appendChild(removeButton);
                    selectedProductsList.appendChild(listItem);
                });

                // Show the selected products section
                selectedProductsSection.style.display = "block";
            } else {
                // Hide the selected products section if no product is selected
                selectedProductsSection.style.display = "none";
            }
        });

        // Function to remove a selected product
        function removeProduct(productName) {
            // Deselect the product in the dropdown
            const options = productSelect.options;
            for (let i = 0; i < options.length; i++) {
                if (options[i].value === productName) {
                    options[i].selected = false;
                    break;
                }
            }

            // Trigger the change event to update the list
            productSelect.dispatchEvent(new Event('change'));
        }
    </script>

</div>
@endsection

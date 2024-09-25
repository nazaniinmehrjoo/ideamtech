@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم اطلاعات کارخانه</title>
    <style>
        section {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            backdrop-filter: blur(20px) saturate(119%);
            -webkit-backdrop-filter: blur(20px) saturate(119%);
            background-color: rgba(17, 25, 40, 0.49);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.125);
            direction: rtl; /* Set direction to RTL */
        }

        h2 {
            text-align: center;
            color: white;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 15px;
            font-weight: bold;
            color: white;
            text-align: right;
        }

        input[type="text"],
        input[type="number"],
        select {
            margin-top: 5px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: right; 
        }

        select {
            width: 100%;
        }

        input[type="checkbox"] {
            margin-left: 10px; 
        }

        .product-boxes {
            display: flex;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .product-box {
            padding: 10px;
            background-color: #f05928;
            color: white;
            border-radius: 5px;
            margin-left: 10px; 
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            height: 61px;
        }

        .product-box span {
            margin-left: 10px; 
        }

        .product-box button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }

        button {
            margin-top: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        .messaging-platform input[type="text"] {
            display: none;
            margin-top: 10px;
            text-align: right; 
            color: gray;
        }

        .messaging-platform label {
            display: flex;
            align-items: center;
            margin-top: 10px;
            direction: rtl; 
            text-align: right; 
        }

        .messaging-platform input[type="checkbox"] {
            margin-left: 5px;
        }
    </style>
</head>
<body>

<section>
    <h2>فرم اطلاعات کارخانه</h2>

    <form action="{{ route('customer_forms.store') }}" method="POST">
    @csrf
        <!-- کد -->
        <label for="code">کد:</label>
        <input type="text" name="code" id="code" required>

        <!-- نام کارخانه -->
        <label for="factory_name">نام کارخانه:</label>
        <input type="text" name="factory_name" id="factory_name" required>

        <!-- نام -->
        <label for="first_name">نام:</label>
        <input type="text" name="first_name" id="first_name" required>

        <!-- نام خانوادگی -->
        <label for="last_name">نام خانوادگی:</label>
        <input type="text" name="last_name" id="last_name" required>

        <!-- شماره کارخانه -->
        <label for="factory_number">شماره کارخانه:</label>
        <input type="number" name="factory_number" id="factory_number" required>

        <!-- شماره همراه -->
        <label for="mobile_number">شماره همراه:</label>
        <input type="number" name="mobile_number" id="mobile_number" required>

        <!-- استان -->
        <label for="province">استان:</label>
        <input type="text" name="province" id="province" required>

        <!-- نام شهر -->
        <label for="city">نام شهر:</label>
        <select name="city" id="city" required>
            <option value="Habib Abad">حبیب آباد</option>
            <option value="Dowlat Abad">دولت آباد</option>
            <option value="Gaz Barkhar">گز برخوار</option>
            <option value="Mohammad Abad">محمد آباد</option>
        </select>

        <!-- آدرس -->
        <label for="address">آدرس:</label>
        <input type="text" name="address" id="address" required>

        <!-- محصولات -->
        <label for="products">محصولات:</label>
        <select name="products" id="products" multiple required>
            <option value="سفال 10">سفال 10</option>
            <option value="سفال 15">سفال 15</option>
            <option value="سقفی">سقفی</option>
            <option value="سه گل">سه گل</option>
            <option value="فشاری">فشاری</option>
            <option value="مفتون">لفتون</option>
        </select>

        <!-- Display selected products -->
        <div class="product-boxes" id="selectedProducts"></div>

        <!-- نوع کوره -->
        <label for="kiln_type">نوع کوره:</label>
        <select name="kiln_type" id="kiln_type" required>
            <option value="Tunnel">تونلی</option>
            <option value="Shaytooni">شیطونی</option>
            <option value="Hoffman">هافمن</option>
        </select>

        <!-- نوع خشک کن -->
        <label for="drying_method">نوع خشک کن:</label>
        <select name="drying_method" id="drying_method" required>
            <option value="Aftabi">آفتابی</option>
            <option value="Otaghaki">اتاقکی</option>
            <option value="Tunnel">تونلی</option>
            <option value="Sari">سریع خشک</option>
        </select>

        <!-- تعداد قمیر -->
        <label for="brick_count">تعداد قمیر:</label>
        <input type="number" name="brick_count" id="brick_count" required>

        <!-- پیام رسان ها -->
        <label for="messaging_platforms">پیام رسان ها:</label>
        <div class="messaging-platform">
            <label for="eitaa">
                <input type="checkbox" id="eitaa" name="messaging_platforms[]" value="Eitaa"> ایتا
            </label>
            <input type="text" id="eitaa_details" name="eitaa_details" placeholder="شماره/آیدی">

            <label for="telegram">
                <input type="checkbox" id="telegram" name="messaging_platforms[]" value="Telegram"> تلگرام
            </label>
            <input type="text" id="telegram_details" name="telegram_details" placeholder="شماره/آیدی">

            <label for="rubika">
                <input type="checkbox" id="rubika" name="messaging_platforms[]" value="Rubika"> روبیکا
            </label>
            <input type="text" id="rubika_details" name="rubika_details" placeholder="شماره/آیدی">

            <label for="whatsapp">
                <input type="checkbox" id="whatsapp" name="messaging_platforms[]" value="WhatsApp"> واتس اپ
            </label>
            <input type="text" id="whatsapp_details" name="whatsapp_details" placeholder="شماره/آیدی">

            <label for="instagram">
                <input type="checkbox" id="instagram" name="messaging_platforms[]" value="Instagram"> اینستگرام
            </label>
            <input type="text" id="instagram_details" name="instagram_details" placeholder="آیدی">
        </div>

        <button type="submit" class="theme-btn btn-style-two">ثبت</button>
    </form>
</section>

<script>
    // Dynamic product selection
    document.getElementById('products').addEventListener('change', function() {
        const selectedProducts = Array.from(this.selectedOptions).map(option => option.value);
        const selectedProductsContainer = document.getElementById('selectedProducts');
        selectedProductsContainer.innerHTML = ''; // Clear previous boxes

        selectedProducts.forEach(product => {
            const productBox = document.createElement('div');
            productBox.classList.add('product-box');
            const productSpan = document.createElement('span');
            productSpan.textContent = product;

            const removeButton = document.createElement('button');
            removeButton.textContent = 'حذف';
            removeButton.onclick = function() {
                const index = selectedProducts.indexOf(product);
                if (index > -1) {
                    selectedProducts.splice(index, 1);
                    productBox.remove();
                    updateSelectOptions();
                }
            };

            productBox.appendChild(productSpan);
            productBox.appendChild(removeButton);
            selectedProductsContainer.appendChild(productBox);
        });
    });

    function updateSelectOptions() {
        const select = document.getElementById('products');
        Array.from(select.options).forEach(option => {
            option.selected = selectedProducts.includes(option.value);
        });
    }

    // Show/hide text inputs based on checkbox selection
    document.querySelectorAll('.messaging-platform input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const detailsInput = document.getElementById(this.id + '_details');
            detailsInput.style.display = this.checked ? 'block' : 'none';
        });
    });
</script>
</body>
</html>
@endsection

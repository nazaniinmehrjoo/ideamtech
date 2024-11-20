@extends('layouts.app', ['title' => 'خشک کن'])

@section('content')

<style>
    .slider {
        position: relative;
        width: 100%;
        height: 75vh;
        overflow: hidden;
        padding: 5px 100px 150px;

    }

    .slider img {
        position: absolute;
        width: 3324px;
        height: 1457px;
        top: -20%;
        left: 0;
        object-fit: cover;
        transition: transform 5s ease-in-out;
        max-width: 3679px;
        padding-bottom: 118px;
    }

    .turnKeyContainer .slider img {
        border-radius: 30px;
    }

    .slider::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        z-index: 1;
        pointer-events: none;
    }

    .image-grid-clean {
        padding: 50px 0;
    }

    .image-grid-clean .container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-auto-rows: auto;
        gap: 20px;
    }

    .image-grid-clean .grid-item {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .image-grid-clean .grid-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .image-grid-clean .grid-item.large {
        grid-column: span 3;
        height: 400px;
    }

    .image-grid-clean .grid-item.small {
        height: 200px;
    }

    .image-grid-clean .grid-item:hover {
        transform: scale(1.03);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .image-grid-clean .grid-item:hover img {
        transform: scale(1.1);
    }

    .turnKeyText {
        padding: 5%;
        background: #292c30;
    }
</style>
<!-- Page Title -->
<section class="page-title" id="to-top-div">
    <div class="auto-container">
        <h1><span>خط کامل آجر</span></h1>
        <div class="bread-crumb">
            <ul class="clearfix">
                <li><a href="/">خانه</a></li>
                <li class="active">خط کامل آجر</li>
            </ul>
        </div>
    </div>
</section>
<div class="turnKeyContainer">
    <div class="def-title-box">
        <div class="patt"><span></span></div>
        <div class="mt-5">
            <div class="">
                <div class="slider">
                    <img src="/assets/images/main-slider/turnkeysolution.png" alt="Turnkey Solution">
                </div>
            </div>
        </div>
    </div>
    <div class="text-center turnKeyText">
        <div class="def-title-box">
            <div class="patt"><span></span></div>
            <div class="subtitle">فرایند خط تولید آجر</div>
            <p>خط تولید آجر در این کارخانه با استفاده از ماشین‌آلات پیشرفته و سیستم‌های خودکار به تولید انواع آجر با
                کیفیت بالا پرداخته می‌شود. مراحل تولید شامل انتخاب و آماده‌سازی مواد اولیه، فرایند شکل‌دهی، خشک‌کردن
                آجرها و در نهایت پخت آنها در کوره‌های صنعتی است. هر مرحله به دقت کنترل می‌شود تا محصول نهایی
                استانداردهای لازم را داشته باشد. این فرآیند به‌طور مداوم بهبود می‌یابد تا علاوه بر افزایش کیفیت،
                مصرف انرژی و زمان تولید به حداقل برسد. در نهایت، آجرهای تولید شده برای استفاده در پروژه‌های
                ساختمانی، به‌ویژه در نما و دیوارها، آماده می‌شوند.</p>
        </div>
    </div>
</div>
</div>
<section class="image-grid-clean">
    <div class="container">
        <div class="grid-item large">
            <img src="/assets/images/main-slider/khoskkon-araghi.jpg" alt="turnkeysolution">
        </div>
        <div class="grid-item small">
            <img src="/assets/images/main-slider/Home-2.jpg" alt="turnkeysolution">
        </div>
        <div class="grid-item small">
            <img src="/assets/images/main-slider/turnkeysolution.jpg" alt="turnkeysolution">
        </div>
        <div class="grid-item small">
            <img src="/assets/images/main-slider/turnkeysolution.jpg" alt="turnkeysolution">
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const image = document.querySelector('.slider img');

        image.addEventListener('mouseenter', () => {
            image.style.transform = 'translateX(-40%)';
        });

        image.addEventListener('mouseleave', () => {
            image.style.transform = 'translateX(0)';
        });
    });


</script>
@endsection
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
        padding: 60px 0;
    }

    .image-grid-clean .container {
        /* display: grid; */
        /* grid-template-columns: repeat(3, 1fr);
        grid-auto-rows: auto; */

        /* width: 40%; */
        /* display: flex; */
    }

    .image-grid-clean .grid-item {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        direction: rtl;
    }

    .image-grid-clean .grid-item img {
        object-fit: cover;
        transition: transform 0.5s ease;
        border-radius: 15px;
        margin-top: 5%;
        height: 100%;
        width: 100%;
    }

    .image-grid-clean .grid-item .image img {
        height: 220px;
        width: 100%;
    }

    .image-grid-clean .grid-item .image-center img {
        height: 220px;
        width: 100%;
    }

    /* 
    .image-grid-clean .grid-item.large {
        grid-column: span 3;
        height: 400px;
    } */

    .image-grid-clean .grid-item.small {
        height: 200px;
    }

    .image-grid-clean .grid-item:hover {
        transform: scale(1.03);
    }

    .image-grid-clean .grid-item:hover img {
        transform: scale(1.1);
    }

    .turnKeyText {
        padding: 5%;
        background: #292c30;
        border-radius: 15px;
    }

    .turnKeyTextContent {
        padding: 5% 10% 0%;

    }

    .image-grid-clean {
        position: relative;
        top: 0;
        left: 0;
    }

    .turnKeyGridContainer h3 {
        position: relative;
        text-align: center;
        font-size: 2.5em;
        padding: 5%;
        color: #f08d58;
    }

    .turnKeyGridContainer {
        text-align: center;

    }

    .turnKeyGridContainer h3::after {
        content: "";
        position: absolute;
        bottom: 38%;
        left: 57%;
        transform: translateX(-50%);
        width: 60px;
        height: 2px;
        background-color: #a87b5b;
        border-radius: 1px;

    }

    .grid-item-center {
        margin-top: 7%;
    }

    .grid-item .image::before {
        content: "";
        position: absolute;
        left: -41px;
        top: -26px;
        right: 49px;
        bottom: 260px;
        background: #f08d586b;
        border-radius: 0 0 20px 20px;
        z-index: -1;
        padding-bottom: 20%;
    }

    .grid-item .image-center::before {
        content: "";
        position: absolute;
        left: -41px;
        top: -26px;
        right: 64px;
        bottom: 200px;
        background: #f08d586b;
        border-radius: 0 0 20px 20px;
        z-index: -1;
        padding-bottom: 20%;

    }

    .grid-item-title {
        font-size: 18px;
        color: #f08d58;
        top: 3%;
        text-align: right;
        direction: rtl;
    }

    .grid-item hr {
        background: #a87b5b;
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
</div>
</div>

<div class="def-title-box turnKeyTextContent col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <div class="text-center turnKeyText">
        <div class="subtitle">فرایند خط تولید آجر</div>
        <p>خط تولید آجر در این کارخانه با استفاده از ماشین‌آلات پیشرفته و سیستم‌های خودکار به تولید انواع آجر با
            کیفیت بالا پرداخته می‌شود. مراحل تولید شامل انتخاب و آماده‌سازی مواد اولیه، فرایند شکل‌دهی، خشک‌کردن
            آجرها و در نهایت پخت آنها در کوره‌های صنعتی است. هر مرحله به دقت کنترل می‌شود تا محصول نهایی
            استانداردهای لازم را داشته باشد. این فرآیند به‌طور مداوم بهبود می‌یابد تا علاوه بر افزایش کیفیت،
            مصرف انرژی و زمان تولید به حداقل برسد. در نهایت، آجرهای تولید شده برای استفاده در پروژه‌های
            ساختمانی، به‌ویژه در نما و دیوارها، آماده می‌شوند.
        </p>
    </div>
</div>

<section class="image-grid-clean">
    <div class="container turnKeyGridContainer">
        <h3>خط کامل آجر</h3>
        <div class="row">
            <div class="grid-item large col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="image">
                    <img src="/assets/images/main-slider/khoskkon-araghi.jpg" alt="turnkeysolution">
                </div>
                <p class="grid-item-title">آماده‌سازی مواد اولیه</p>
                <hr>
                <p class="text-right">مواد اولیه با دقت انتخاب و آماده می‌شوند تا کیفیت نهایی آجر تضمین شود.
                </p>
            </div>
            <div class="grid-item grid-item-center large col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="image-center">
                    <img src="/assets/images/main-slider/koreh-pokhttoneli.jpg" alt="turnkeysolution">
                </div>
                <p class="grid-item-title">خشک‌کردن آجرها</p>
                <hr>
                <p class="text-right"> آجرها برای کاهش ترک‌خوردگی و افزایش دوام با دقت خشک می‌شوند.
                </p>
            </div>
            <div class="grid-item large col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="image">
                    <img src="/assets/images/main-slider/14010324_robat-2.jpg" alt="turnkeysolution">
                </div>
                <p class="grid-item-title"> پخت در کوره صنعتی</p>
                <hr>
                <p class="text-right">آجرها در کوره‌های مدرن پخته می‌شوند تا استحکام و رنگ عالی داشته باشند.
                </p>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="faq">
            <h2 class="faq__title">سوالات متداول</h2>
            <details>
                <summary> چگونه مواد اولیه برای تولید آجر انتخاب می‌شود؟</summary>
                <p> مواد اولیه مانند خاک رس و ماسه با دقت از منابع معتبر انتخاب و آزمایش می‌شوند تا کیفیت بالای آجرها
                    تضمین شود.</p>
            </details>
            <details>
                <summary> آجرها چگونه خشک می‌شوند؟</summary>
                <p> آجرها با استفاده از خشک‌کن‌های پیشرفته صنعتی یا روش‌های طبیعی خشک می‌شوند تا دوام آنها افزایش یابد.
                </p>
            </details>
            <details>
                <summary> آیا خط تولید قابلیت شخصی‌سازی دارد؟</summary>
                <p> بله، خط تولید می‌تواند بر اساس نیازهای پروژه شما و نوع محصول نهایی شخصی‌سازی شود.</p>
            </details>
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
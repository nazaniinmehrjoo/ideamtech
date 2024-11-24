@extends('layouts.app', ['title' => 'خط کامل آجر'])

@section('content')

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
<section>
    <div class="turnKeyContainer">
        <div class="patt"><span></span></div>
        <div class="mt-5">
            <div class="">
                <div class="slider">
                    <img src="/assets/images/main-slider/turnkeysolution.png" alt="Turnkey Solution">
                </div>
            </div>

        </div>
    </div>
</section>

<section class="intro_section" style="direction:rtl;">
    <div class="separator"></div>

    <div class="outer-container">
        <div class="content-wrapper">
            <div class="panel-content">
                <h2 class="toAnim toDown anim">خط کامل آجر:</h2>
                <div class="content">
                    <p>خط تولید آجر در این کارخانه با استفاده از ماشین‌آلات پیشرفته و سیستم‌های خودکار به تولید انواع
                        آجر با
                        کیفیت بالا پرداخته می‌شود. مراحل تولید شامل انتخاب و آماده‌سازی مواد اولیه، فرایند شکل‌دهی،
                        خشک‌کردن
                        آجرها و در نهایت پخت آنها در کوره‌های صنعتی است. هر مرحله به دقت کنترل می‌شود تا محصول نهایی
                        استانداردهای لازم را داشته باشد. این فرآیند به‌طور مداوم بهبود می‌یابد تا علاوه بر افزایش کیفیت،
                        مصرف انرژی و زمان تولید به حداقل برسد. در نهایت، آجرهای تولید شده برای استفاده در پروژه‌های
                        ساختمانی، به‌ویژه در نما و دیوارها، آماده می‌شوند.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="additional-box">
    </div>
</section>




<section class="image-grid-clean">
    <div class="turnKeyGridContainer">
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
    <div class="row">
        <div class="faq">
            <h2 class="faq__title">سوالات متداول</h2>
            <details>
                <summary> چگونه مواد اولیه برای تولید آجر انتخاب می‌شود؟</summary>
                <p> مواد اولیه مانند خاک رس و ماسه با دقت از منابع معتبر انتخاب و آزمایش می‌شوند تا کیفیت بالای
                    آجرها
                    تضمین شود.</p>
            </details>
            <details>
                <summary> آجرها چگونه خشک می‌شوند؟</summary>
                <p> آجرها با استفاده از خشک‌کن‌های پیشرفته صنعتی یا روش‌های طبیعی خشک می‌شوند تا دوام آنها افزایش
                    یابد.
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
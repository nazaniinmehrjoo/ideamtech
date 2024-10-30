@extends('layouts.app', ['title' => 'درباره ما'])
@section('content')
<br>
<br>
<!--Plans Section-->
<div class="popup-overlay" id="popupOverlay" onclick="hidePopup()">
    <img src="" id="popupImage" alt="">
</div>
<section class="plans-section">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Image-->
            <div class="image-col col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="image">
                        <div class="bg-pattern"></div>
                        <img src="/assets/images/resource/bornagostar.jpg" alt="">
                    </div>
                </div>
            </div>

            <!--Content-->
            <div class="text-col col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <h4>درباره‌ی برناگستر</h4>
                    <div class="text">

                        <p>
                            شرکت نوآوران برنا گستر پارسی از سال 1385، با بهره‌گیری از متخصصین توانمند و سرمایه‌گذاری در
                            تحقیق و توسعه، توانسته است تجهیزات خط تولید آجر را بومی‌سازی و بهینه‌سازی کند.
                            این شرکت با ارائه خدمات متنوع در مشاوره، طراحی، ساخت و اجرا در زمینه احداث کارخانه‌های تولید
                            آجر و محصولات مشابه، از مراحل طرح توجیهی تا تعمیر و نگهداری، به نیازهای مختلف مشتریان پاسخ
                            می‌دهد. توجه ویژه به بهینه‌سازی مصرف انرژی و توسعه طرح‌های خشک کن آجر برای کاهش مصرف گاز و
                            برق، از مزیت‌های رقابتی سازمان است
                        </p>
                        <p>
                            از جمله عوامل دیگری که موجب توانمندی این شرکت شده، ارائه خدمات متنوع در بخشهای مختلفی چون
                            مشاوره ، طراحی ، ساخت واجراء در زمینه احداث کارخانه تولید آجر و محصولات مشابه مانند خطوط
                            تولید پشم شیشه، بلوک های سیمانی، کاشی و سرامیک از مرحله برآورد اقتصادی و فنی (طرح توجیهی)،
                            مکانیابی ، احداث خط تولید ، اصلاح و بهینه سازی خطوط موجود و تعمیر و نگهداری از آنها می باشد.
                            نوآوران برنا گستر پارسی متعهدانه از طراحی تا اجرا همراه صنعتگران محترم خواهد بود.
                        </p>
                        <ul>
                            <li><i class="fa-light fa-trophy-star"></i>پیشرودر طراحی ساخت ماشین آلات آجر</li>
                            <li><i class="fa-light fa-trophy-star"></i>پیشرو در تکنولوژی روز دنیا</li>
                            <li><i class="fa-light fa-trophy-star"></i>مشاوره در ساخت کارخانه‌جات آجر</li>
                            <li><i class="fa-light fa-trophy-star"></i>تعهد در خدمات پس از فروش</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!--Team Section-->
<section class="banner-six">

    <div class="banner-container">
        <div class="auto-container">
            <div class="def-title-box">
                <div class="patt"><span></span></div>
                <div class="subtitle">گواهینامه‌ها و ثبت اختراعات</div>
                <h3>گواهی‌نامه‌های برتر</h3>
            </div>
            <div class="banner-slider-four owl-theme owl-carousel">
                <!--Slide Item-->
                <div class="slide-item">
                    <div class="content-box">
                        <div class="content">
                            <div class="slide-count"><span>01</span></div>
                            <div class="image-box sertificate-box">
                                <div class="image-layer" style="background-image: url(/assets/images/resource/a1.jpg);">
                                </div>
                                <div class="certificateZoomIn">
                                    <i class="fa-sharp fa-regular fa-arrows-maximize"></i>
                                </div>
                                <div class="inner">
                                    <h3>طراحی و ساخت پره فن</h3>
                                    <div class="cat"><span>۰۲۴۵۵۴ الف/۸۹</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Slide Item-->
                <div class="slide-item alt">
                    <div class="content-box">
                        <div class="content">
                            <div class="slide-count"><span>02</span></div>
                            <div class="image-box sertificate-box">
                                <div class="image-layer" style="background-image: url(/assets/images/resource/a2.jpg);">
                                </div>
                                <div class="certificateZoomIn">
                                    <i class="fa-sharp fa-regular fa-arrows-maximize"></i>
                                </div>
                                <div class="inner">
                                    <h3>دستگاه مکانیزه</h3>
                                    <div class="cat"><span>۰۲۹۲۳۵ الف/۸۹</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Slide Item-->
                <div class="slide-item">
                    <div class="content-box">
                        <div class="content">
                            <div class="slide-count"><span>03</span></div>
                            <div class="image-box sertificate-box">
                                <div class="image-layer" style="background-image: url(/assets/images/resource/a3.jpg);">
                                </div>
                                <div class="certificateZoomIn">
                                    <i class="fa-sharp fa-regular fa-arrows-maximize"></i>
                                </div>
                                <div class="inner">
                                    <h3>ربات بارگیری خشت</h3>
                                    <div class="cat"><span>۰۲۴۵۵۴ الف/۸۹</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Slide Item-->
                <div class="slide-item alt">
                    <div class="content-box">
                        <div class="content">
                            <div class="slide-count"><span>04</span></div>
                            <div class="image-box sertificate-box">
                                <div class="image-layer" style="background-image: url(/assets/images/resource/a1.jpg);">
                                </div>
                                <div class="certificateZoomIn">
                                    <i class="fa-sharp fa-regular fa-arrows-maximize"></i>
                                </div>
                                <div class="inner">
                                    <h3>City View</h3>
                                    <div class="cat"><span>wallpapers</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Slide Item-->
                <!-- <div class="slide-item">
                                <div class="content-box">
                                    <div class="content">
                                        <div class="slide-count"><span>05</span></div>
                                        <div class="image-box">
                                            <div class="image-layer" style="background-image: url(images/main-slider/image-8.jpg);"></div>
                                            <div class="inner">
                                                <h3><a href="#">City View</a></h3>
                                                <div class="cat"><span>wallpapers</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                <!--Slide Item-->
                <!-- <div class="slide-item alt">
                                <div class="content-box">
                                    <div class="content">
                                        <div class="slide-count"><span>06</span></div>
                                        <div class="image-box">
                                            <div class="image-layer" style="background-image: url(images/main-slider/image-9.jpg);"></div>
                                            <div class="inner">
                                                <h3><a href="#">City View</a></h3>
                                                <div class="cat"><span>wallpapers</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                <!--Slide Item-->
                <!-- <div class="slide-item">
                                <div class="content-box">
                                    <div class="content">
                                        <div class="slide-count"><span>07</span></div>
                                        <div class="image-box">
                                            <div class="image-layer" style="background-image: url(images/main-slider/image-10.jpg);"></div>
                                            <div class="inner">
                                                <h3><a href="#">City View</a></h3>
                                                <div class="cat"><span>wallpapers</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                <!--Slide Item-->
                <!-- <div class="slide-item alt">
                                <div class="content-box">
                                    <div class="content">
                                        <div class="slide-count"><span>08</span></div>
                                        <div class="image-box">
                                            <div class="image-layer" style="background-image: url(images/main-slider/image-11.jpg);"></div>
                                            <div class="inner">
                                                <h3><a href="#">City View</a></h3>
                                                <div class="cat"><span>wallpapers</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

            </div>
        </div>
    </div>
</section>
<!-- <section class="team-section">
                <div class="auto-container">
                    <div class="def-title-box">
                        <div class="patt"><span></span></div>
                        <div class="subtitle">گواهینامه‌ها و ثبت اختراعات</div>
                        <h3>گواهی‌نامه‌های برتر</h3>
                    </div>

                    <div class="team">
                        <div class="row clearfix">
                            <div class="team-block col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box"><a href="#"><img src="/assets/images/resource/a1.jpg" alt=""></a></div>
                                    <div class="cat"><span>۰۲۴۵۵۴ الف/۸۹</span></div>
                                    <div class="social">
                                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                                        <a href="#"><i class="fab fa-twitter-square"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                    <div class="name"><a href="#">طراحی و ساخت پره فن</a></div>
                                </div>
                            </div>

                            <div class="team-block col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box"><a href="#"><img src="/assets/images/resource/a2.jpg" alt=""></a></div>
                                    <div class="cat"><span>۰۲۹۲۳۵ الف/۸۹</span></div>
                                    <div class="social">
                                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                                        <a href="#"><i class="fab fa-twitter-square"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                    <div class="name"><a href="#">دستگاه مکانیزه</a></div>
                                </div>
                            </div>

                            <div class="team-block col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box"><a href="#"><img src="/assets/images/resource/a3.jpg" alt=""></a></div>
                                    <div class="cat"><span>۰۲۴۵۵۴ الف/۸۹</span></div>
                                    <div class="social">
                                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                                        <a href="#"><i class="fab fa-twitter-square"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                    <div class="name"><a href="#">ربات بارگیری خشت</a></div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </section> -->

<!--Services Section-->
<section class="services-section">
    <div class="auto-container">
        <div class="def-title-box">
            <div class="patt"><span></span></div>
            <!-- <div class="subtitle">سفر مشتریان و پروژه‌ها</div> -->
            <h3> داستان‌ها و دستاوردهای ما</h3>
        </div>
        <div class="services">
            <div class="row clearfix">
                <!--Block-->
                <div class="service-block customer-service col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-box">
                        <div class="inner">
                            <div class="icon-box customerIconBox"><span class="fa-regular fa-users"></span></div>

                            <h5>رضایت مشتری</h5>
                            <div class="customerInner">
                                <div class="image-content">
                                    <img src="/assets/images/main-slider/modernbrik.png" alt="Custom Image">
                                </div>
                                <div>
                                    <p class="text"> رضایت مشتریان، اولویت ماست. تیم برناگستر با خدمات حرفه‌ای و
                                        پشتیبانی مستمر، تجربه‌ای مطمئن و رضایت‌بخش را برای شما فراهم می‌کند.</p>
                                    <div class="link-box"><a href="/مشتریان-ما"><span
                                                class="far fa-angle-right"></span></a></div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!--Services Section-->
<section class="services-two">
    <div class="auto-container">
        <div class="def-title-box">
            <div class="patt"><span></span></div>
            <div class="subtitle">از مأموریت و ارزش‌ها تا کاتالوگ و تأییدیه‌های فنی</div>
            <h3>دستاوردها و ارزش‌های برناگستر</h3>
        </div>

        <div class="row parent-row clearfix">
            <div class="tabs-col  col-xl-6 col-lg-12 col-md-12 col-sm-12">
                <div class="tabs-box def-tabs-box">
                    <ul class="tab-buttons clearfix">
                        <li class="tab-btn active-btn" data-tab="#tab-1"><span>کاتالوگ</span></li>
                        <li class="tab-btn" data-tab="#tab-2"><span>تاییدیه فنی</span></li>
                        <li class="tab-btn" data-tab="#tab-3"><span>ارزش‌ها و ماموریت</span></li>
                    </ul>
                    <div class="tabs-content">
                        <!--Tab-->
                        <div class="tab active-tab" id="tab-1">
                            <div class="row clearfix">
                                <div class="image-col col-lg-5 col-md-5 col-sm-6">
                                    <div class="image mainAboutBorna"><img src="/assets/images/resource/catalog.png"
                                            alt=""></div>
                                </div>
                                <div class="text-col catalogContent col-lg-7 col-md-7 col-sm-6">
                                    <div class="text purposeContent">
                                        <p>برای آشنایی بیشتر با محصولات و خدمات شرکت ما، کاتالوگ جامع را دانلود کنید. در
                                            این کاتالوگ می‌توانید جزئیات کامل درباره تولیدات ما، مشخصات فنی محصولات، و
                                            راهکارهای نوآورانه‌ای که ارائه می‌دهیم را مشاهده کنید.</p>
                                        <!-- <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p> -->
                                    </div>
                                    <p class="catalogDesc">دانلود کاتالوگ</p>
                                    <button class="download-btn"
                                        onclick="startSpin(this, '/assets/catalog/catalog.pdf')">
                                        <i class="fa-light fa-download download" id="download"></i>
                                        <div class="spinner"></div>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!--Tab-->
                        <div class="tab" id="tab-2">
                            <div class="row clearfix mainTabContainer">
                                <div class="image-col col-lg-5 col-md-5 col-sm-6">
                                    <div class="image mainAboutBorna"><img src="/assets/images/resource/taeede.jpg"
                                            alt=""></div>
                                </div>
                                <div class="text-col col-lg-7 col-md-7 col-sm-6">
                                    <div class="text purposeContent">
                                        <p>اخذ تأییدیه فنی و گواهی حسن انجام کار پس از تحویل پروژه به معنای اطمینان از
                                            رعایت کامل استانداردهای کیفی و فنی در تمامی مراحل اجرایی پروژه است. این
                                            تأییدیه، بیانگر این است که پروژه مطابق با مشخصات فنی و نیازهای تعیین شده
                                            توسط کارفرما اجرا شده و تمامی مراحل طراحی، ساخت، نصب و بهره‌برداری به‌صورت
                                            صحیح و بدون نقص انجام شده‌اند.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Tab-->
                        <div class="tab" id="tab-3">
                            <div class="row clearfix mainTabContainer">
                                <div class="image-col col-lg-5 col-md-5 col-sm-6">
                                    <div class="image mainAboutBorna"><img src="/assets/images/main-slider/pokht.jpg"
                                            alt=""></div>
                                </div>
                                <div class="text-col col-lg-7 col-md-7 col-sm-6">
                                    <div class="text purposeContent">
                                        <p>
                                            <span class="purposeText">اهداف شرکت:</span>
                                            قصـد آن داریـم کـه صنعـت آجـر را در کشـور احیا کنیـم و محصـولات متمایـز خلق
                                            کنیـم.
                                        </p>
                                        <p>
                                            <span class="purposeText">باور داریم که می‌باید:</span>
                                            راستی، درستی و احترام، منش جاری سازمان، مدیران و کارکنان باشد.
                                            سود خود را در افزایش شور و شوق کسب و کار در جوامع هم‌گراکننده عمومأ ایفا
                                            کنیم.
                                            نوآوری در تار و پود محصولات و خدمات ما باشد، چراکه نوآوری از تاریکی‌ها ره
                                            امیدواری است.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="accordions-col col-xl-6 col-lg-12 col-md-12 col-sm-12">
                <div class="accordion-box clearfix">
                    <!--Block-->
                    <div class="accordion block">
                        <div class="acc-btn">کسب دانش فنی <i class="fa-regular fa-trophy"></i></div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text styleList">
                                    <ul class="styled-list">
                                        <li>
                                            کسب دانش فنی انوع خشک کن
                                        </li>
                                        <li>
                                            کسب دانش فنی ساخت انواع رباتهای صنعتی
                                        </li>
                                        <li>
                                            کسب دانش فنی و ساخت فن آکسیال با بالا ترین بازدهی جهت بکارگیری در تونل خشک
                                            کن
                                        </li>
                                        <li>
                                            کسب دانش فنی مدلسازی کارخانجات تولید آجر پیش از احداث
                                        </li>
                                        <li>
                                            کسب توان فنی در طراحی، مشاوره و بهینه سازی احداث خطوط تولید آجر سفال
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Block-->
                    <div class="accordion block active-block">
                        <div class="acc-btn active"> توان اجرایی <i class="fa-regular fa-home"></i></div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text">
                                    <ul class="styled-list">
                                        <li>
                                            ساخت انواع خشک کن با آخرین تکنولوژی روز و کاهش هزینه ها نسبت به خشک کن های
                                            اتاقکی
                                        </li>
                                        <li>
                                            انجام 10 ها پروژه ساخت و راه اندازی خط کامل تولید آجر در ایران و کشور های
                                            آذربایجان و عراق
                                        </li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Block-->
                    <div class="accordion block">
                        <div class="acc-btn">پشتیبانی و تامین قطعات <i class="fa-regular fa-user"></i></div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text">
                                    <ul class="styled-list">
                                        <li>
                                            انعقاد قرارداد جهت اصلاح، تعمیر و نگهداری خطوط تولید کارخانجات تولید آجر
                                        </li>
                                        <li>
                                            توان خدمات فنی و تامین کلیه قطعات یدکی و مورد نیاز خطوط تولید آجر
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@extends('layouts.app')
@section('content')
<title>
    @isset($title)
        {{ $title }} |
    @endisset
    {{ config('app.name', 'خانه') }}
</title>

<div class="body-bg-layer" style="background-color: #15181b;"></div>
 <!-- Banner Two -->
            <section class="banner-two" id="to-top-div">
                <div class="auto-container">
                    <div class="banner-slider owl-theme owl-carousel">
                        <!--Slide Item-->
                        <div class="slide-item">
                        <div class="image-layer" style="background-image: url(/assets/images/main-slider/khoshkon.jpg);"></div>
                        <div class="slide-count"><span>01</span></div>
                            <div class="content-box">
                                <div class="content">
                                    <div class="inner">
                                        <div class="cat"><a href="خشک-کن/محصولات">خشک کن</a></div>
                                        <h4><span>تولید سریع‌تر، با مصرف انرژی بهینه</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Slide Item-->
                        <div class="slide-item">
                            <div class="image-layer" style="background-image: url(/assets/images/main-slider/14010324_robat-2.jpg);"></div>
                            <div class="slide-count"><span>02</span></div>
                            <div class="content-box">
                                <div class="content">
                                    <div class="inner">
                                        <div class="cat"><a>ربات</a></div>
                                        <span class="sliderSesc">خط تولید تمام مکانیزه</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Slide Item-->
                        <!--Slide Item-->
                        <div class="slide-item">
                            <div class="image-layer" style="background-image: url(/assets/images/main-slider/khoskkon-araghi.jpg);"></div>
                            <div class="slide-count"><span>03</span></div>
                            <div class="content-box">
                                <div class="content">
                                    <div class="inner">
                                        <div class="cat"><a>خشک کن آجر عراقی</a></div>
                                        <span class="sliderSesc">اولین خشک کن سریع آجر عراقی درجهان</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Slide Item-->
                        <div class="slide-item">
                            <div class="image-layer" style="background-image: url(/assets/images/main-slider/koreh-pokhttoneli.jpg);"></div>
                            <div class="slide-count"><span>04</span></div>
                            <div class="content-box">
                                <div class="content">
                                    <div class="inner">
                                        <div class="cat"><a href="/کوره_پخت/محصولات">کوره پخت تونلی</a></div>
                                        <h3><span>طراحی و ساخت تونل پخت</span></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item">
                            <div class="image-layer" style="background-image: url(/assets/images/main-slider/BORNA1-2-2048x821.jpg);"></div>
                            <div class="slide-count"><span>05</span></div>
                            <div class="content-box">
                                <div class="content">
                                    <div class="inner">
                                        <div class="cat"><a href="/درباره-ما">درباره برناگستر</a></div>
                                       <span class="sliderSesc">ایده طراحی ساخت</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Banner Section -->
            <!--Services Section-->
            <section class="services-section" style="background-image:url(/assets/images/background/plans-lines.png) ;">
                <div class="auto-container">
                    <div class="def-title-box">
                        <div class="patt"><span></span></div>
                        <!-- <div class="subtitle">سفر مشتریان و پروژه‌ها</div> -->
                        <h3> داستان‌ها و دستاوردهای ما</h3>
                    </div>

                    <div class="services">
                        <div class="row clearfix">
                            <!--Block-->
                            <div class="service-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="inner">
                                    <div class="icon-box"><span class="fa-regular fa-users"></span></div>
                                        <h5>رضایت مشتری</h5>
                                        <div class="text">
                                            <p> رضایت مشتریان، اولویت ماست. تیم برناگستر با خدمات حرفه‌ای و پشتیبانی مستمر، تجربه‌ای مطمئن و رضایت‌بخش را برای شما فراهم می‌کند. </p>

                                        </div>
                                        <div class="link-box"><a href="/مشتریان-ما"><span class="far fa-angle-right"></span></a></div>
                                    </div>
                                </div>
                            </div>
                            <!--Block-->
                            <div class="service-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="inner">
                                    <div class="icon-box"><span class="fa-light fa-block-brick-fire"></span></div>
                                        <h5>اخبار و رویدادها</h5>
                                        <div class="text">
                                            <p>
                                            آخرین اخبار و رویدادهای صنعت آجر را از طریق برناگستر دنبال کنید.و از تازه‌ترین پروژه‌ها، تحولات و دستاوردهای تیم ما در این حوزه باخبر شوید.
                                            </p>
                                        </div>
                                        <div class="link-box"><a href="/مقالات"><span class="far fa-angle-right"></span></a></div>
                                    </div>
                                </div>
                            </div>
                            <!--Block-->
                            <div class="service-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="inner">
                                        <div class="icon-box"><span class="far fa-chart-column"></span></div><h5>متمایز از دیگران</h5>
                                        <div class="text">
                                            <p>
                                            با ما، پروژه‌های خود را متمایز انجام دهید. تیم نصب حرفه‌ای ما اجرای دقیق و باکیفیت را تضمین می‌کند.
                                            </p>
                                        </div>

                                        <div class="link-box"><a href="/تامین قطعات/خدمات"><span class="far fa-angle-right"></span></a></div>
                                    </div>
                                </div>
                            </div>
                              <!--Block-->
                              <div class="service-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="inner">
                                    <div class="icon-box"><span class="fa-sharp fa-regular fa-trowel-bricks"></span></div>
                                        <h5>شبیه ساز</h5>
                                        <div class="text">این دستگاه ابزاری است برای پیشبینی مدت زمان  خشک شدن انواع آجر و سفال با توجه به دما، رطوبت و سرعت هوا</div>
                                        <div class="link-box"><a href="/شبیه-ساز"><span class="far fa-angle-right"></span></a></div>
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
                        <div class="subtitle">مسیر برناگستر</div>
                        <h3>شناخت،ارزش‌ها و دستاوردها</h3>
                    </div>

                    <div class="row parent-row clearfix">
                        <div class="tabs-col col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="tabs-box def-tabs-box">
                                <ul class="tab-buttons clearfix">
                                    <li class="tab-btn active-btn" data-tab="#tab-1"><span>درباره‌ی برناگستر</span></li>
                                    <li class="tab-btn" data-tab="#tab-2"><span>کاتالوگ</span></li>
                                    <li class="tab-btn" data-tab="#tab-3"><span>ارزش‌ها و ماموریت</span></li>
                                </ul>
                                <div class="tabs-content">
                                    <!--Tab-->
                                    <div class="tab active-tab" id="tab-1">
                                        <div class="row clearfix mainTabContainer">
                                            <div class="image-col col-lg-5 col-md-5 col-sm-6">
                                                <div class="image mainAboutUs"><img src="/assets/images/resource/bornagostar.jpg" alt="bornagostar"></div>
                                            </div>
                                            <div class="text-col aboutBornaText col-lg-7 col-md-7 col-sm-6">
                                                <div class="text purposeContent" style="display:flex">
                                                <p>شرکت نوآوران برنا گستر پارسی از سال 1385  با بهره گیری از متخصصین توانمند و استفاده از دانش روز نسبت به بومی سازی دانش فنی و صرف زمان و هزینه در بخش تحقیق و توسعه نسبت به بهینه سازی و ساخت کلیه تجهیزات خط تولید آجر، اقدام نموده است.
                                                    این امر باعث توانمندی شرکت برنا گستر جهت ارائه خدمات متنوع در بخشهای مختلف از جمله ارائه مشاوره در زمینه احداث کارخانه تولید آجر و محصولات مشابه مانند خطوط تولید پشم شیشه، بلوک های سیمانی، کاشی و سرامیک از مرحله برآورد اقتصادی و فنی (طرح توجیهی)، مکانیابی ، طراحی و مشاوره احداث خط تولید ، اصلاح و بهینه سازی خطوط موجود و تعمیر و نگهداری از آنها شده است.
                                                    در این زمینه در بخش خشک کن روتاری و همچنین ربات حمل و بارگیری خشت و دستگاه های دیگر مرتبط با صنعت آجر، این شرکت دارای محصولات منحصر بفرد و گواهی ثبت اختراع می­ باشد.
                                                </p>
                                                        
                                                </div>
                                                <div class="joinUsBtnContainer">
                                                    <button class="joinUsbtnContent">
                                                      <svg width="200px" height="60px" viewBox="0 0 200 60"> <!-- تنظیم viewBox -->
                                                        <polyline points="199,1 199,59 1,59 1,1 199,1" class="bg-line" /> <!-- تنظیم points -->
                                                        <polyline points="199,1 199,59 1,59 1,1 199,1" class="hl-line" /> <!-- تنظیم points -->
                                                      </svg>
                                                      <span>پیوستن به خانواده‌ی برناگستر</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Tab-->
                                    <div class="tab" id="tab-2">
                                        <div class="row clearfix mainTabContainer">
                                            <div class="image-col col-lg-5 col-md-5 col-sm-6">
                                                <div class="image mainAboutUs"><img src="/assets/images/resource/catalog.png" alt=""></div>
                                            </div>
                                            <div class="text-col catalogContent col-lg-7 col-md-7 col-sm-6">
                                                <div class="text purposeContent">
                                                    <p>برای آشنایی بیشتر با محصولات و خدمات متنوع شرکت برناگستر، کاتالوگ جامع ما را دانلود کنید. در این کاتالوگ، اطلاعات کامل درباره تولیدات ما، از جمله مشخصات فنی محصولات، ویژگی‌های منحصر به فرد، و راهکارهای نوآورانه‌ای که در صنعت آجر ارائه می‌دهیم، به طور دقیق و شفاف آمده است. با مطالعه آن، می‌توانید بهترین گزینه‌ها را برای نیازهای پروژه‌های خود انتخاب کنید.</p>
                                                    <!-- <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p> -->
                                                </div>
                                                <p class="catalogDesc">دانلود کاتالوگ</p>
                                                <button class="download-btn" onclick="startSpin(this, '/assets/catalog/catalog.pdf')">
                                                    <i class="fa-light fa-download download" id="download"></i>
                                                    <div class="spinner"></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Tab-->
                                    <div class="tab" id="tab-3">
                                        <div class="row clearfix mainTabContainer">
                                            <div class="image-col col-lg-5 col-md-5 col-sm-6">
                                                <div class="image mainAboutUs"><img src="/assets/images/main-slider/indexconsultation.png" alt=""></div>
                                            </div>
                                            <div class="text-col col-lg-7 col-md-7 col-sm-6">
                                                <div class="text purposeContent">
                                                    <p>
                                                        <span class="purposeText">اهداف شرکت:</span>
                                                        قصـد آن داریـم کـه صنعـت آجـر را در کشـور احیا کنیـم و محصـولات متمایـز خلق کنیـم.</p>
                                                    <p>
                                                    <span class="purposeText">باور داریم که می‌باید:</span>
                                                        راستی، درستی و احترام، منش جاری سازمان، مدیران و کارکنان باشد.
                                                        سود خود را در افزایش شور و شوق کسب و کار در جوامع هم‌گراکننده عمومأ ایفا کنیم.
                                                        نوآوری در تار و پود محصولات و خدمات ما باشد، چراکه نوآوری از تاریکی‌ها ره امیدواری است.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- <div class="proffionalService accordions-col col-xl-6 col-lg-12 col-md-12 col-sm-12">
                            <div class="accordion-box clearfix">
                                <div class="accordion block">
                                    <div class="acc-btn">For the trust, you have on us <i class="fa-regular fa-trophy"></i></div>
                                    <div class="acc-content">
                                        <div class="content">
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion block active-block">
                                    <div class="acc-btn active">شبیه‌ساز پیشرفته برای بهینه‌سازی خطوط تولید<i class="fa-regular fa-rocket-launch"></i></div>
                                    <div class="acc-content">
                                        <div class="content simulatorContent">
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</div>
                                            <div class="image-content">
                                                <img src="/assets/images/resource/Simulator.jpg" alt="شبیه‌ساز خط تولید" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion block">
                                    <div class="acc-btn">Designs too original to be copied <i class="fa-regular fa-user"></i></div>
                                    <div class="acc-content">
                                        <div class="content">
                                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> -->
                    </div>
                </div>
            </section>

@endsection
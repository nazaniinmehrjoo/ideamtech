@extends('layouts.app', ['title' => 'متمایز از دیگران'])
@section('content')
<style>
    /* Main Image with "About" Title */
    .main_image {
        width: 100%;
        height: 100vh;
        background-image: url("{{ asset('/assets/images/main-slider/Adl-2.jpg') }}");
        background-size: cover;
        background-position: center;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .main_image img {
        height: 100%;
    }

    .main_image h1 {
        font-size: 100px;
        color: rgba(255, 255, 255, 0.9);
        position: absolute;
        top: 20%;
        left: 10%;
    }
</style>

<section class="intro_section">
    <div class="main_image lazyloaded">
        <div class="scroll-icon">
            <div class="icon-container">
                <div class="mouse-icon">
                    <div class="wheel"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="separator"></div>

    <div class="outer-container">
        <div class="content-wrapper">
            <div class="panel-content">
                <h2 class="toAnim toDown anim">باما پروژه‌هارا متمایز انجام دهید :</h2>
                <div class="content">
                    <p>از مرحله طراحی تا راه اندازی و حتی پس از آن، همراه شما هستیم با رویکردی دقیق و مفاوت تلاش
                        میکنیم تا در هر مرحله تجربه‌ای متمایز و پشتیبانی متعهدانه ارائه دهیم.</p>
                </div>
            </div>
        </div>

        <div class="button-group-outside">
            <button class="custom-button">مشاهده ویدیو</button>
            <button class="custom-button">دانلود بروشور</button>
        </div>
    </div>

    <div class="additional-box">
    </div>

</section>
<section class="flow_section">
    <div class="container">
        <div class="flow-explain">
            <h2 title="We assist you for the entire life of the project and over.">We assist you for the entire life
                of the project and over.</h2>
            <div class="content">
                <p>We cover each step of the project execution from the feasibility study and basic design to the
                    assembly, installation, start up and for any need after commissioning, while the plant is in
                    operation. We still proudly offer a TAILOR MADE solution for our Customers. Optimizing
                    investment returns means well-designed installation and innovative mechanical solutions. Our
                    products rate best in the market in terms of energy consumption, operational costs, and
                    pollution
                    control, as a result of our commitment to environmental protection.</p>
            </div>
        </div>
        <div class="graphics">
            <div class="flow-step">قبل اجرا</div>
            <div class="flow-step">حین اجرا</div>
            <div class="flow-step">بعد از تحویل</div>
        </div>
        <!-- Flow Lists -->

        <div class="flow-lists">
            <div class="flow-list list-1 toAnim toDown anim">
                <div class="flow-step-header">
                    <div class=" flow-step ">قبل اجرا</div>
                </div>

                <h4 title="Think" class="box-header">طراحی هوشمند لیوت کارخانه</h4>
                <div class="content">
                    <ol>
                        <li>در نظر گرفتن توسعه برنامه کارخانه در سال‌های آینده برای طراحی لیوت</li>
                        <div class="divider"></div>

                        <li>در نظر گرفتن محل چینش گاز و برق برای کاهش هزینه در اجرا</li>
                        <div class="divider"></div>

                        <li>در نظر گرفتن دسترسی ها و جاده ها به منظور تصحیل در عبور و مرور ماشین آلات</li>
                        <div class="divider"></div>

                        <li>در نظر گرفتن نقشه توپوگرافی و جهت باد برای کاهش هزینه های انرژی و ساخت </li>
                        <div class="divider"></div>

                        <li>در نظر گرفتن تعمیرات و نگهداری آـسان و دردسترس</li>
                        <div class="divider"></div>

                    </ol>
                </div>
            </div>

            <div class="flow-list list-2 toAnim toDown anim">
                <div class="flow-step-header">
                    <div class="flow-step">حین اجرا</div>
                </div>
                <h4 title="Design" class="box-header">!چکونگی انجام پروژه</h4>
                <div class="content">
                    <ol>
                        <li>طراحی مطابق استاندارد های جهانی</li>
                        <div class="divider"></div>

                        <li>کیفیت ساخت بالای قطعات(داشتنن واحد کنترل کیفیت در تمام مراحل)</li>
                        <div class="divider"></div>

                        <li>انتخاب کارشناسی شده متریال مورد استفاده براساس محل کاربرد</li>
                        <div class="divider"></div>

                        <li>دقت بالا در فرآیند های ماشین کاری که عمرقطعات و تجهیزات را طولانی میکند</li>
                        <div class="divider"></div>

                        <li>داشتن تیم قوی مدیریت پروژه براساس PMBOK</li>
                        <div class="divider"></div>

                        <li>خدمات نصب و راه اندازی ما با دقت و سرعت بالا انجام میشود تا بهره برداری سریع و بی نقص را
                            تضمین کنیم</li>
                        <div class="divider"></div>
                    </ol>
                </div>
            </div>

            <div class="flow-list list-3 toAnim toDown anim">
                <div class="flow-step-header">
                    <div class="flow-step">بعد از تحویل</div>
                </div>
                <h4 title="Build" class="box-header">تا رسیدن به تولید پایدار درکنارتان هستیم</h4>
                <div class="content">
                    <ol>
                        <li>مراقبت از کیفیت و کمیت تولید شما</li>
                        <div class="divider"></div>

                        <li>مشاوره و رفع ایراد در تمامی مراحل خط تولید</li>
                        <div class="divider"></div>

                        <li>بازدید های دوره از از خط تولید</li>
                        <div class="divider"></div>

                        <li>مشتریان ما تنها خریدار محصولات و خدمات ما نیستند بلکه عضوی از خانواده برنا گستر میشوند
                        </li>
                        <div class="divider"></div>
                    </ol>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
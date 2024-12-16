@extends('layouts.app', ['title' => __('distinct.title')])

@section('content')
<style>
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

    .outer-container {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        background-color: #e5703e;
        color: white;
        width: 67%;
        direction: rtl;
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
                <h2 class="toAnim toDown anim">{{ __('distinct.project_distinction') }}</h2>
                <div class="content">
                    <p>{{ __('distinct.intro_text') }}</p>
                </div>
            </div>
        </div>

        <div class="button-group-outside">
            <button class="custom-button">{{ __('distinct.view_video') }}</button>
            <button class="custom-button">{{ __('distinct.download_brochure') }}</button>
        </div>
    </div>

    <div class="additional-box">
    </div>

</section>

<section class="flow_section">
    <div class="container">
        <div class="flow-explain">
            <h2 title="{{ __('distinct.life_project_assistance') }}">{{ __('distinct.life_project_assistance') }}</h2>
            <div class="content">
                <p>{{ __('distinct.project_assistance_text') }}</p>
            </div>
        </div>
        <div class="graphics">
            <div class="flow-step">{{ __('distinct.before_execution') }}</div>
            <div class="flow-step">{{ __('distinct.during_execution') }}</div>
            <div class="flow-step">{{ __('distinct.after_delivery') }}</div>
        </div>

        <div class="flow-lists">
            <div class="flow-list list-1 toAnim toDown anim">
                <div class="flow-step-header">
                    <div class="flow-step">{{ __('distinct.before_execution') }}</div>
                </div>

                <h4 title="Think" class="box-header">{{ __('distinct.design_introduction') }}</h4>
                <div class="content">
                    <ol>
                        <li>در نظر گرفتن توسعه برنامه کارخانه در سال‌های آینده برای طراحی لیوت</li>
                        <div class="divider"></div>
                        <li>در نظر گرفتن محل چینش گاز و برق برای کاهش هزینه در اجرا</li>
                        <div class="divider"></div>
                        <li>در نظر گرفتن دسترسی ها و جاده ها به منظور تسهیل در عبور و مرور ماشین آلات</li>
                        <div class="divider"></div>
                        <li>در نظر گرفتن نقشه توپوگرافی و جهت باد برای کاهش هزینه‌های انرژی و ساخت</li>
                        <div class="divider"></div>
                        <li>در نظر گرفتن تعمیرات و نگهداری آسان و دردسترس</li>
                        <div class="divider"></div>
                    </ol>
                </div>
            </div>

            <div class="flow-list list-2 toAnim toDown anim">
                <div class="flow-step-header">
                    <div class="flow-step">{{ __('distinct.during_execution') }}</div>
                </div>
                <h4 title="Design" class="box-header">{{ __('distinct.execution_method') }}</h4>
                <div class="content">
                    <ol>
                        <li>طراحی مطابق استاندارد های جهانی</li>
                        <div class="divider"></div>
                        <li>کیفیت ساخت بالای قطعات</li>
                        <div class="divider"></div>
                        <li>انتخاب متریال کارشناسی شده براساس محل کاربرد</li>
                        <div class="divider"></div>
                        <li>دقت بالا در فرآیندهای ماشین‌کاری</li>
                        <div class="divider"></div>
                        <li>داشتن تیم قوی مدیریت پروژه براساس PMBOK</li>
                        <div class="divider"></div>
                        <li>خدمات نصب و راه‌اندازی با دقت و سرعت بالا</li>
                        <div class="divider"></div>
                    </ol>
                </div>
            </div>

            <div class="flow-list list-3 toAnim toDown anim">
                <div class="flow-step-header">
                    <div class="flow-step">{{ __('distinct.after_delivery') }}</div>
                </div>
                <h4 title="Build" class="box-header">{{ __('distinct.sustainable_production') }}</h4>
                <div class="content">
                    <ol>
                        <li>مراقبت از کیفیت و کمیت تولید شما</li>
                        <div class="divider"></div>
                        <li>مشاوره و رفع ایراد در تمامی مراحل خط تولید</li>
                        <div class="divider"></div>
                        <li>بازدیدهای دوره‌ای از خط تولید</li>
                        <div class="divider"></div>
                        <li>مشتریان ما تنها خریدار محصولات ما نیستند بلکه عضو خانواده برنا گستر می‌شوند</li>
                        <div class="divider"></div>
                    </ol>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection

@extends('layouts.app', ['title' => 'درباره ما'])
@section('content')

<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bedeschi Panel</title>
    <style>
        /* Main Section */
        .intro_section {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        /* Main Image with "About" Title */
        .main_image {
            width: 100%;
            height: 100vh;
            background-image: url("{{ asset('/assets/images/main-slider/Adl-2.JPG') }}");
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main_image h1 {
            font-size: 100px;
            color: rgba(255, 255, 255, 0.9);
            position: absolute;
            top: 20%;
            left: 10%;
        }

        /* Scroll Icon positioned at the bottom within the image */
        .scroll-icon {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 67%;
            height: 22vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: white;
            font-size: 12px;
            background-color: #f059288f;
            text-align: center;
        }

        .icon-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-left: 120px;
            padding-right: 120px;
        }

        .mouse-explain {
            text-align: center;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .mouse-icon {
            width: 24px;
            height: 40px;
            border: 2px solid white;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wheel {
            width: 4px;
            height: 8px;
            background-color: white;
            border-radius: 4px;
            animation: scroll 1.5s infinite;
        }

        @keyframes scroll {
            0% {
                transform: translateY(-6px);
            }

            50% {
                transform: translateY(6px);
            }

            100% {
                transform: translateY(-6px);
            }
        }

        /* Separator Bar */
        .separator {
            width: 67%;
            height: 20px;
            background-color: #f0592854;
        }

        /* Content Panel Positioned to the Left */
        .panel-content {
            background-color: #f05928;
            color: white;
            padding: 40px;
            width: 67%;
            text-align: left;
            border-radius: 0;
            text-align: right;
            direction: rtl;
        }

        .panel-content h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .panel-content p {
            font-size: 16px;
            line-height: 1.6;
        }

        .panel-content p strong {
            font-weight: bold;
        }

        /* New Box directly below the Panel Content */
        .additional-box {
            width: 37%;
            height: 102px;
            background-color: rgba(200, 200, 200, 0.2);
            color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .flow_section {
            color: #fff;
            padding: 60px 0;
            text-align: center;
        }

        .flow-explain h2 {
            font-size: 2.5rem;
            color: #fff;
            margin-bottom: 20px;
        }

        .flow-explain .content p {
            font-size: 1rem;
            color: #ddd;
            line-height: 1.8;
            max-width: 800px;
            margin: 20px auto;
        }

        /* Circular Process Flow Styling */
        .graphics {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin: 40px 0;
            position: relative;
        }

        /* Wave effect between circles */
        .graphics::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 10%;
            width: 80%;
            height: 10px;
            background: linear-gradient(to right, rgba(227, 6, 19, 0.5), rgba(227, 6, 19, 1), rgba(227, 6, 19, 0.5));
            border-radius: 50%;
            animation: wave 2s infinite;
        }

        /* Keyframes for wave motion */
        @keyframes wave {
            0% {
                transform: translateX(-20px) scaleY(1);
            }

            50% {
                transform: translateX(20px) scaleY(1.2);
            }

            100% {
                transform: translateX(-20px) scaleY(1);
            }
        }

        .flow-step {
            width: 100px;
            height: 100px;
            border: 4px solid #f05928;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1rem;
            background-color: #333;
            z-index: 1;
            /* Ensures circles are above the wave */
        }

        /* Flow Lists Styling */
        .flow-lists {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 40px;
        }

        .flow-list {
            flex: 1 1 220px;
            padding: 20px;
            background-color: #444;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
            color: #fff;
        }

        .flow-list:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }

        .flow-list h4 {
            font-size: 1.2rem;
            color: #f05928;
            margin-bottom: 10px;
            text-align: center;
        }

        .flow-list .content p {
            font-size: 0.9rem;
            color: #ddd;
            line-height: 1.6;
            text-align: center;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .flow-lists {
                flex-direction: column;
                align-items: center;
            }

            .flow-list {
                max-width: 90%;
            }
        }

        /* Outer flex container */
        .outer-container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: 20px;
            background-color: #f05928;
            color: white;
        }

        .content-wrapper {
            max-width: 70%;
        }

        .panel-content h2 {
            font-size: 24px;
            font-weight: bold;
        }

        .panel-content p {
            font-size: 16px;
            line-height: 1.6;
        }

        .button-group-outside {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 200px;
            margin-left: 20px;
            
        }

        /* Button styles */
        .custom-button {
            padding: 10px 20px;
            background-color: #ffffff;
            color: #f05928;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
        }

        .custom-button:hover {
            background-color: #e0471b;
            color: #ffffff;
        }
    </style>
</head>

<body>

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
                    <h4 title="Think">طراحی هوشمند لیوت کارخانه</h4>
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
                    <h4 title="Design">چکونگی انجام پروژه !</h4>
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
                    <h4 title="Build">تا رسیدن به تولید پایدار درکنارتات هستیم</h4>
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
</body>

</html>
@endsection
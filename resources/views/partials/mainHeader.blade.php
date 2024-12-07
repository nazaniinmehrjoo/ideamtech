<!-- Main Header Bar-->
<!--Alt Logo Box-->
<div class="alt-logo-box">
    <a href="/"><img src="/assets/images/logotest2.png" alt="{{ __('header.alt_logo') }}"></a>
</div>


<div class="lightAndDarkModeBtn">
    <input class="checkbox" type="checkbox" id="toggle" />
    <label class="toggle" for="toggle">
        <ion-icon class="icon icon--light" name="sunny-outline"></ion-icon>
        <ion-icon class="icon icon--dark" name="moon-outline"></ion-icon>
        <span class="ball"></span>
    </label>
</div>
<header class="main-header-bar">
    <div class="line-one"></div>
    <div class="line-two"></div>

    <!--Header-Upper-->
    <div class="header-bar-inner">
        <div class="outer-box clearfix">

            <!--Nav Toggler-->
            <div class="nav-toggler">
                <button class="toggler-btn">
                    <span class="bar bar-one"></span>
                    <span class="bar bar-two"></span>
                    <span class="bar bar-three"></span>
                </button>
            </div>

            <!--Social Links-->
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="https://instagram.com/borna_gostar_parsi"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fab fa-whatsapp"></span></a></li>
                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                </ul>
            </div>
            <!--Copyright Text-->
            <div class="copyright">&copy; {{ __('header.copyright') }}</div>
        </div>

        <!--Main Nav Outer-->
        <div class="main-nav-outer">
            <div class="nav-closer"><img src="/assets/images/icons/close-icon.png" alt=""></div>
            <div class="outer-nav-box">
                <div class="bottom-bg"></div>
                <div class="top-bg"></div>
                <div class="main-nav-box" data-scrollbar="">
                    <!--Logo Box-->
                    <div class="main-logo-box">
                        <a href="/"><img src="/assets/images/logotest2.png" alt="{{ __('header.alt_logo') }}"></a>
                    </div>
                    <!-- Main Nav -->
                    <div class="main-nav">
                        <ul class="navigation">
                            <!-- Language Switcher -->
                            <div class="header__language">
                                <a href="{{ url('lang/en') }}">
                                    <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/flags/4x3/gb.svg" alt="{{ __('header.language_english') }}" style="width:24px; height:24px;">
                                </a>
                                <a href="{{ url('lang/fa') }}">
                                    <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/flags/4x3/ir.svg" alt="{{ __('header.language_persian') }}" style="width:24px; height:24px;">
                                </a>
                            </div>

                            <!-- Divider -->
                            <div class="divider"></div>

                            <!-- Main Navigation Links -->
                            <li class="dropdown"><a href="#">{{ __('header.machines') }}</a>
                                <ul>
                                    <li><a href="/ماشین_آلات_فرآوری_و_شکل_دهی/محصولات">{{ __('header.machines_processing') }}</a></li>
                                    <li><a href="/ماشین_آلات_و_تجهیزات/محصولات">{{ __('header.machines_equipment') }}</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">{{ __('header.projects') }}</a>
                                <ul>
                                    <li><a href="/خشک-کن/محصولات">{{ __('header.projects_dryer') }}</a></li>
                                    <li><a href="/کوره_پخت/محصولات">{{ __('header.projects_kiln') }}</a></li>
                                    <li><a href="/خط-کامل-آجر/محصولات">{{ __('header.projects_full_line') }}</a></li>
                                    <li><a href="/مشتریان-ما">لیست پروژه ها</a></li>

                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">{{ __('header.services') }}</a>
                                <ul>
                                    <li><a href="/مشاوره/خدمات">{{ __('header.services_consulting') }}</a></li>
                                    <li><a href="/تامین_قطعات/خدمات">{{ __('header.services_parts') }}</a></li>
                                    <li><a href="/تعمیرات/خدمات">{{ __('header.services_maintenance') }}</a></li>
                                    <li><a href="/خدمات_مهندسی/خدمات">{{ __('header.services_engineering') }}</a></li>
                                    <li><a href="/نصب_و_راه_اندازی/خدمات">{{ __('header.services_installation') }}</a></li>
                                    <li><a href="/خدمات_پس_از_فروش/خدمات">{{ __('header.services_after_sales') }}</a></li>
                                </ul>
                            </li>
                            <li class=""><a href="/درباره-ما">{{ __('header.about_us') }}</a></li>
                            <li class=""><a href="/contact">{{ __('header.contact_us') }}</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>

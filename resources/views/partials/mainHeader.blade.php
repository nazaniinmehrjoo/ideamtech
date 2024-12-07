<!-- Main Header Bar-->
<!--Alt Logo Box-->
<div class="alt-logo-box">
    <a href="/"><img src="/assets/images/logotest2.png" alt="لوگوی برنا گستر پارسی"></a>
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
                    <li><a
                            href="https://instagram.com/borna_gostar_parsi?utm_source=qr&amp;igshid=MzNlNGNkZWQ4Mg%3D%3D"><span
                                class="fab fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fab fa-whatsapp"></span></a></li>
                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                </ul>
            </div>
            <!--Copyright Text-->
            <div class="copyright">&copy;BornaGostar-Parsi</div>


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
                        <a href="/"><img src="/assets/images/logotest2.png" alt="لوگوی برنا گستر پارسی"></a>
                    </div>
                    <!-- Main Nav -->


                    <div class="main-nav">
                        <ul class="navigation">
                            <!-- Authentication Links -->
                            <!-- <div class="authentication-header">
                    @guest
                        <a href="{{ route('login') }}" class="auth-button login-button"><i class="fas fa-sign-in-alt"></i> ورود</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="auth-button register-button"><i class="fas fa-user-plus"></i> ثبت نام</a>
                        @endif
                    @else
                        <a href="#" class="auth-button"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
                        <a href="{{ route('logout') }}" class="auth-button logout-button"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           <i class="fas fa-sign-out-alt"></i> خروج
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </div> -->
                            <div class="header__language">
                                <a href="{{ url('lang/en') }}">
                                    <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/flags/4x3/gb.svg"
                                        alt="{{ __('header.language_english') }}" style="width:24px; height:24px;">
                                </a>
                                <a href="{{ url('lang/fa') }}">
                                    <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/flags/4x3/ir.svg"
                                        alt="{{ __('header.language_persian') }}" style="width:24px; height:24px;">
                                </a>
                            </div>

                            <!-- Divider -->
                            <div class="divider"></div>

                            <!-- Main Navigation Links -->
                            <!-- <li><a href="/">خانه</a></li> -->
                            <li class="dropdown"><a href="#">ماشین آلات</a>
                                <ul>
                                    <li><a href="/ماشین_آلات_فرآوری_و_شکل_دهی/محصولات">ماشین آلات فرآوری و شکل دهی</a>
                                    </li>
                                    <li><a href="/ماشین_آلات_و_تجهیزات/محصولات">ماشین آلات و تجهیزات</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">پروژه ها</a>
                                <ul>
                                    <li><a href="/خشک-کن/محصولات">پروژه‌ی خشک‌کن</a></li>
                                    <li><a href="/کوره_پخت/محصولات">پروژه‌ی کوره پخت</a></li>
                                    <li><a href="/خط-کامل-آجر/محصولات">پروژه‌ی خط کامل آجر</a></li>

                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">خدمات</a>
                                <ul>
                                    <li><a href="/مشاوره/خدمات">مشاوره</a></li>
                                    <li><a href="/تامین_قطعات/خدمات">تامین قطعات</a></li>
                                    <li><a href="/تامین_قطعات/خدمات">تعمیرات و نگهداری</a></li>
                                    <li><a href="/خدمات_مهندسی/خدمات">خدمات مهندسی</a></li>
                                    <li><a href="/نصب_و_راه_اندازی/خدمات">نصب و راه اندازی</a></li>
                                    <li><a href="/خدمات_پس_از_فروش/خدمات">خدمات پس از فروش</a></li>
                                </ul>
                            </li>
                            <!-- <li class="dropdown"><a href="#">فن آوری و نوآوری</a>
                    <ul>
                        <li><a href="#">فن آوری رباتیک و ستینگ</a></li>
                        <li><a href="#">فن آوری شبیه سازی و آزمایشگاهی</a></li>
                        <li><a href="#">فن آوری ساخت و اجرا</a></li>
                        <li><a href="#">تجهیزات نوآورانه</a></li>
                    </ul>
                </li> -->
                            <li class=""><a href="/درباره-ما">درباره‌ی برناگستر</a>
                                <!-- <ul>
                        <li><a href="/درباره-ما">درباره ما</a></li>
                        <li><a href="#">امکانات سخت افزاری و نرم افزاری</a></li>
                        <li><a href="#">چگونه یک پروژه را انجام میدهیم</a></li>
                        <li><a href="#">رفرنس لیست</a></li>
                        <li><a href="#">بیانه ی ارزش ها و ماموریت</a></li>
                        <li><a href="#">کاتالوگ و مقالات</a></li>
                    </ul> -->
                            </li>
                            <li class=""><a href="/contact">ارتباط با ما</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
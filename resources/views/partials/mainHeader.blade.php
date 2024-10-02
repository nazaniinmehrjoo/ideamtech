<!-- Main Header Bar-->
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
                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fab fa-twitter-square"></span></a></li>
                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                </ul>
            </div>

            <!--Alt Logo Box-->
            <div class="alt-logo-box">
                <a href="/"><img src="/assets/images/logotest2.png" alt=""></a>
            </div>
        </div>

        <!--Main Nav Outer-->
        <div class="main-nav-outer">
            <div class="nav-closer"><img src="/assets/images/icons/close-icon.png" alt=""></div>
            <div class="outer-nav-box">
                <div class="main-nav-box" data-scrollbar="">
                    <!--Logo Box-->
                    <div class="main-logo-box">
                        <a href="/"><img src="/assets/images/logotest2.png" alt=""></a>
                    </div>

                    <!-- Main Nav -->
                    <div class="main-nav">
                        <ul class="navigation">
                            <!-- Authentication Links as Dropdown -->
                             <div class="autentecationBox">
                                <li>
                                    @guest
                                        <a href="#">حساب کاربری</a>
                                        <ul>
                                            <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> ورود</a></li>
                                            @if (Route::has('register'))
                                                <li><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> ثبت نام</a></li>
                                            @endif
                                        </ul>
                                    @else
                                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                        <ul >
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt"></i> خروج
                                                </a>
                                            </li>
                                        </ul>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @endguest
                                </li>
                            </div>

                            <!-- Main Navigation Links -->
                            <li><a href="/">خانه</a></li>
                            <li class="dropdown"><a href="#">خدمات</a>
                                <ul>
                                    <li><a href="/مشاوره/خدمات">مشاوره</a></li>
                                    <li><a href="/تامین_قطعات/خدمات">تامین قطعات و تعمیرات</a></li>
                                    <li><a href="/خدمات_مهندسی/خدمات">خدمات مهندسی</a></li>
                                    <li><a href="/نصب_و_راه_اندازی/خدمات">نصب و راه اندازی</a></li>
                                    <li><a href="/خدمات_پس_از_فروش/خدمات">خدمات پس از فروش</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">محصولات</a>
                                <ul>
                                    <li><a href="/ماشین_آلات_فرآوری_و_شکل_دهی/محصولات">ماشین آلات فرآوری و شکل دهی</a></li>
                                    <li><a href="/خشک-کن/محصولات">خشک کن</a></li>
                                    <li><a href="/ماشین_آلات_و_تجهیزات/محصولات">ماشین آلات و تجهیزات</a></li>
                                    <li><a href="/کوره_پخت/محصولات">کوره پخت</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">فن آوری و نوآوری</a>
                                <ul>
                                    <li><a href="#">فن آوری رباتیک و ستینگ</a></li>
                                    <li><a href="#">فن آوری شبیه سازی و آزمایشگاهی</a></li>
                                    <li><a href="#">فن آوری ساخت و اجرا</a></li>
                                    <li><a href="#">تجهیزات نوآورانه</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">برناگستر</a>
                                <ul>
                                    <li><a href="/درباره-ما">درباره ما</a></li>
                                    <li><a href="#">امکانات سخت افزاری و نرم افزاری</a></li>
                                    <li><a href="#">چگونه یک پروژه را انجام میدهیم</a></li>
                                    <li><a href="#">رفرنس لیست</a></li>
                                    <li><a href="#">بیانه ی ارزش ها و ماموریت</a></li>
                                    <li><a href="#">کاتالوگ و مقالات</a></li>
                                </ul>
                            </li>
                            <li><a href="/contact">ارتباط با ما</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

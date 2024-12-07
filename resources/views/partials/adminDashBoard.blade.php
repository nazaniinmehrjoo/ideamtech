<!-- Main Header Bar-->
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
                <div class="bottom-bg"></div>
                <div class="top-bg"></div>
                <div class="main-nav-box" data-scrollbar="">
                    
                    <!--Logo Box-->
                    <div class="main-logo-box">
                        <a href="/"><img src="/assets/images/logotest2.png" alt=""></a>
                    </div>

                    <!-- Main Nav -->
                    <div class="main-nav">
                        <ul class="navigation">

                            <!-- Divider -->
                            <div class="divider"></div>

                            <!-- Settings Dropdown with Icon -->
                            <li class="dropdown">
                                <a href="#"><i class="fas fa-cog"></i> تنظیمات</a>
                                <ul>
                                    <li class="dropdown">
                                        <a href="#">محصولات</a>
                                        <ul>
                                            <li><a href="{{ route('products.index') }}">لیست محصولات</a></li>
                                            <li><a href="{{ route('products.create') }}">ایجاد محصول جدید</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#">دسته بندی محصولات</a>
                                        <ul>
                                            <li><a href="{{ route('categories.index') }}">لیست دسته‌بندی‌ها</a></li>
                                            <li><a href="{{ route('categories.create') }}">ایجاد دسته‌بندی جدید</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>

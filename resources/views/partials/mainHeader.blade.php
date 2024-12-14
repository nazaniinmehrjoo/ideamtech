<!-- Main Header Bar-->
<!--Alt Logo Box-->
<div class="alt-logo-box">
    <a href="/"><img src="/assets/images/bornagostar.png" alt="{{ __('header.alt_logo') }}"></a>
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
            <div class="nav-closer">
                <img src="/assets/images/icons/close-icon.png" alt="">
            </div>
            <div class="outer-nav-box">
                <div class="bottom-bg"></div>
                <div class="top-bg"></div>
                <div class="main-nav-box" data-scrollbar="">
                    <!--Logo Box-->
                    <div class="main-logo-box">
                        <a href="{{ route('home', ['locale' => app()->getLocale()]) }}">
                            <img src="/assets/images/logotest2.png" alt="{{ __('header.alt_logo') }}">
                        </a>
                    </div>
                    <!-- Main Nav -->
                    <div class="main-nav">
                        <ul class="navigation">
        
                            <div class="divider"></div>

                            <!-- Main Navigation Links -->
                            <li class="dropdown"><a href="#">{{ __('header.machines') }}</a>
                                <ul>
                                    <li><a href="{{ route('products.mashinAlatShekldehi', ['locale' => app()->getLocale()]) }}">{{ __('header.machines_processing') }}</a></li>
                                    <li><a href="{{ route('products.mashinalatvatajhizat', ['locale' => app()->getLocale()]) }}">{{ __('header.machines_equipment') }}</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">{{ __('header.projects') }}</a>
                                <ul>
                                    <li><a href="{{ route('products.khoskkon', ['locale' => app()->getLocale()]) }}">{{ __('header.projects_dryer') }}</a></li>
                                    <li><a href="{{ route('products.korepokht', ['locale' => app()->getLocale()]) }}">{{ __('header.projects_kiln') }}</a></li>
                                    <li><a href="{{ route('products.turnkeysolution', ['locale' => app()->getLocale()]) }}">{{ __('header.projects_full_line') }}</a></li>
                                    <li><a href="{{ route('projects.projects', ['locale' => app()->getLocale()]) }}">{{ __('header.project-list') }}</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">{{ __('header.services') }}</a>
                                <ul>
                                    <li><a href="{{ route('services.consulting', ['locale' => app()->getLocale()]) }}">{{ __('header.services_consulting') }}</a></li>
                                    <li><a href="{{ route('services.partsRepairs', ['locale' => app()->getLocale()]) }}">{{ __('header.services_parts') }}</a></li>
                                    <li><a href="{{ route('services.engineering', ['locale' => app()->getLocale()]) }}">{{ __('header.services_engineering') }}</a></li>
                                    <li><a href="{{ route('services.installation', ['locale' => app()->getLocale()]) }}">{{ __('header.services_installation') }}</a></li>
                                    <li><a href="{{ route('services.khadamat-pasazforosh', ['locale' => app()->getLocale()]) }}">{{ __('header.services_after_sales') }}</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('about', ['locale' => app()->getLocale()]) }}">{{ __('header.about_us') }}</a></li>
                            <li><a href="{{ route('contact', ['locale' => app()->getLocale()]) }}">{{ __('header.contact_us') }}</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

</header>

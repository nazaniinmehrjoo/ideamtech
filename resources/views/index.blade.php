@extends('layouts.app')
@section('content')
<title>
    @isset($title)
        {{ $title }} |
    @endisset
    {{ config('app.name', 'خانه') }}
</title>

<div class="body-bg-layer"></div>
<!-- Banner Two -->
<div class="body-bg-layer"></div>
<!-- Banner Two -->
<section class="banner-two" id="to-top-div">
    <div class="auto-container">
        <div class="banner-slider owl-theme owl-carousel col-md-12 col-md-offset-2">
            <!--Slide Item-->
            <div class="slide-item">
                <div class="image-layer"></div>
                <img class="image-layer" src="/assets/images/main-slider/khoshkon.jpg"
                    alt="{{ __('index.slider.slide_1.cat') }}">
                <div class="slide-count"><span>01</span></div>
                <div class="content-box">
                    <div class="content">
                        <div class="inner">
                            <div class="cat">
                                <a
                                    href="{{ route('products.khoskkon', ['locale' => app()->getLocale()]) }}">{{ __('index.slider.slide_1.cat') }}</a>
                            </div>
                            <h4><span>{{ __('index.slider.slide_1.title') }}</span></h4>
                        </div>
                    </div>
                </div>
            </div>

            <!--Slide Item-->
            <div class="slide-item">
                <div class="image-layer"></div>
                <img class="image-layer" src="/assets/images/main-slider/14010324_robat-2.jpg"
                    alt="{{ __('index.slider.slide_2.cat') }}">
                <div class="slide-count"><span>02</span></div>
                <div class="content-box">
                    <div class="content">
                        <div class="inner">
                            <div class="cat">
                                <a>{{ __('index.slider.slide_2.cat') }}</a>
                            </div>
                            <span class="sliderSesc">{{ __('index.slider.slide_2.desc') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!--Slide Item-->
            <div class="slide-item">
                <div class="image-layer"></div>
                <img class="image-layer" src="/assets/images/main-slider/khoskkon-araghi.jpg"
                    alt="{{ __('index.slider.slide_3.cat') }}">
                <div class="slide-count"><span>03</span></div>
                <div class="content-box">
                    <div class="content">
                        <div class="inner">
                            <div class="cat">
                                <a>{{ __('index.slider.slide_3.cat') }}</a>
                            </div>
                            <span class="sliderSesc">{{ __('index.slider.slide_3.desc') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!--Slide Item-->
            <div class="slide-item">
                <div class="image-layer"></div>
                <img class="image-layer" src="/assets/images/main-slider/koreh-pokhttoneli.jpg"
                    alt="{{ __('index.slider.slide_4.cat') }}">
                <div class="slide-count"><span>04</span></div>
                <div class="content-box">
                    <div class="content">
                        <div class="inner">
                            <div class="cat">
                                <a
                                    href="{{ route('products.korepokht', ['locale' => app()->getLocale()]) }}">{{ __('index.slider.slide_4.cat') }}</a>
                            </div>
                            <h3><span>{{ __('index.slider.slide_4.title') }}</span></h3>
                        </div>
                    </div>
                </div>
            </div>

            <!--Slide Item-->
            <div class="slide-item">
                <div class="image-layer">
                    <img class="image-layer" id="imageLayerFive" src="/assets/images/main-slider/BORNA1-2-2048x821.jpg"
                        alt="{{ __('index.slider.slide_5.cat') }}">
                </div>
                <div class="slide-count"><span>05</span></div>
                <div class="content-box">
                    <div class="content">
                        <div class="inner">
                            <div class="cat">
                                <a
                                    href="{{ route('about', ['locale' => app()->getLocale()]) }}">{{ __('index.slider.slide_5.cat') }}</a>
                            </div>
                            <span class="sliderSesc">{{ __('index.slider.slide_5.desc') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--End Banner Section -->
<!--Services Section-->
<section class="services-section" style="background-image:url(/assets/images/background/plans-lines.png);">
    <div class="auto-container">
        <div class="def-title-box">
            <div class="patt"><span></span></div>
            <h3>{{ __('index.services.title') }}</h3>
        </div>

        <div class="services">
            <div class="row clearfix">
                <!--Block-->
                <div class="service-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="inner">
                            <div class="icon-box"><span class="fa-regular fa-users"></span></div>
                            <h5>{{ __('index.services.customer_satisfaction.title') }}</h5>
                            <div class="text">
                                <p>{{ __('index.services.customer_satisfaction.description') }}</p>
                            </div>
                            <div class="link-box">
                                <a href="{{ route('projects.projects', ['locale' => app()->getLocale()]) }}"><span
                                        class="far fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Block-->
                <div class="service-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="inner">
                            <div class="icon-box"><span class="fa-light fa-block-brick-fire"></span></div>
                            <h5>{{ __('index.services.news_and_events.title') }}</h5>
                            <div class="text">
                                <p>{{ __('index.services.news_and_events.description') }}</p>
                            </div>
                            <div class="link-box">
                                <a href="{{ route('blog.blogs', ['locale' => app()->getLocale()]) }}"><span
                                        class="far fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Block-->
                <div class="service-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="inner">
                            <div class="icon-box"><span class="far fa-chart-column"></span></div>
                            <h5>{{ __('index.services.distinct.title') }}</h5>
                            <div class="text">
                                <p>{{ __('index.services.distinct.description') }}</p>
                            </div>
                            <div class="link-box">
                                <a href="{{ route('distinct', ['locale' => app()->getLocale()]) }}"><span
                                        class="far fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Block-->
                <div class="service-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="inner">
                            <div class="icon-box"><span class="fa-sharp fa-regular fa-trowel-bricks"></span></div>
                            <h5>{{ __('index.services.simulator.title') }}</h5>
                            <div class="text">
                                <p>{{ __('index.services.simulator.description') }}</p>
                            </div>
                            <div class="link-box">
                                <a href="{{ route('simulator', ['locale' => app()->getLocale()]) }}"><span
                                        class="far fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Services Section-->
<section class="services-two" dir="{{ app()->getLocale() === 'fa' ? 'rtl' : 'ltr' }}">
    <div class="auto-container">
        <div class="def-title-box">
            <div class="patt"><span></span></div>
            <div class="subtitle">{{ __('index.services_two.subtitle') }}</div>
            <h3>{{ __('index.services_two.title') }}</h3>
        </div>

        <div class="row parent-row clearfix">
            <div class="tabs-col col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="tabs-box def-tabs-box">
                    <ul class="tab-buttons clearfix">
                        <li class="tab-btn active-btn" data-tab="#tab-1">
                            <span>{{ __('index.services_two.tabs.about.title') }}</span>
                        </li>
                        <li class="tab-btn" data-tab="#tab-2">
                            <span>{{ __('index.services_two.tabs.catalog.title') }}</span>
                        </li>
                        <li class="tab-btn" data-tab="#tab-3">
                            <span>{{ __('index.services_two.tabs.values.title') }}</span>
                        </li>
                    </ul>
                    <div class="tabs-content">
                        <!-- Tab 1 -->
                        <div class="tab active-tab" id="tab-1">
                            <div class="row clearfix mainTabContainer">
                                <div class="image-col col-lg-5 col-md-5 col-sm-6">
                                    <div class="image mainAboutUs">
                                        <img src="/assets/images/resource/bornagostar.jpg"
                                            alt="{{ __('index.services_two.tabs.about.title') }}">
                                    </div>
                                </div>
                                <div class="text-col aboutBornaText col-lg-7 col-md-7 col-sm-6">
                                    <div class="text purposeContent">
                                        <p>{{ __('index.services_two.tabs.about.content') }}</p>
                                    </div>
                                    <div class="joinUsBtnContainer">
                                        <button class="joinUsbtnContent"
                                            onclick="window.location.href='{{ url(__('index.services_two.tabs.about.button_link')) }}'">
                                            <svg width="200px" height="60px" viewBox="0 0 200 60">
                                                <polyline points="199,1 199,59 1,59 1,1 199,1" class="bg-line" />
                                                <polyline points="199,1 199,59 1,59 1,1 199,1" class="hl-line" />
                                            </svg>
                                            <span>{{ __('index.services_two.tabs.about.button_text') }}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tab 2 -->
                        <div class="tab" id="tab-2">
                            <div class="row clearfix mainTabContainer">
                                <div class="image-col col-lg-5 col-md-5 col-sm-6">
                                    <div class="image mainAboutUs">
                                        <img src="/assets/images/resource/catalog.png" alt="">
                                    </div>
                                </div>
                                <div class="text-col catalogContent col-lg-7 col-md-7 col-sm-6">
                                    <div class="text purposeContent">
                                        <p>{{ __('index.services_two.tabs.catalog.content') }}</p>
                                    </div>
                                    <p class="catalogDesc">{{ __('index.services_two.tabs.catalog.download_text') }}</p>
                                    <button class="download-btn"
                                        onclick="startSpin(this, '{{ url(__('index.services_two.tabs.catalog.download_link')) }}')">
                                        <i class="fa-light fa-download download" id="download"></i>
                                        <div class="spinner"></div>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Tab 3 -->
                        <div class="tab" id="tab-3">
                            <div class="row clearfix mainTabContainer">
                                <div class="image-col col-lg-5 col-md-5 col-sm-6">
                                    <div class="image mainAboutUs">
                                        <img src="/assets/images/main-slider/indexconsultation.png" alt="">
                                    </div>
                                </div>
                                <div class="text-col col-lg-7 col-md-7 col-sm-6">
                                    <div class="text purposeContent">
                                        <p>
                                            <span
                                                class="purposeText">{{ __('index.services_two.tabs.values.content.goals') }}</span>
                                        </p>
                                        <p>
                                            <span
                                                class="purposeText">{{ __('index.services_two.tabs.values.content.beliefs') }}</span>
                                        </p>
                                    </div>
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
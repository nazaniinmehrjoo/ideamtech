@extends('layouts.app2', ['title' => __('simulator.title')])

@section('content')

<!-- Banner Section -->
<section class="banner-seven">
    <div class="banner-container">
        <div class="banner-slider-outer">
            <div class="slider-box">
                <div class="banner-slider-five">
                    <!--Slide Item-->
                    <div class="slide-item">
                        <img src="/assets/images/main-slider/similator1.jpg" class="image-layer" alt="{{ __('simulator.slide_1_title') }}">
                        <div class="auto-container">
                            <div class="content-box">
                                <div class="content">
                                    <div class="clearfix">
                                        <div class="inner">
                                            <h3><span>{{ __('simulator.slide_1_title') }}</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Slide Item-->
                    <div class="slide-item">
                        <img src="/assets/images/main-slider/similator2.jpg" class="image-layer" alt="{{ __('simulator.slide_2_title') }}">
                        <div class="auto-container">
                            <div class="content-box">
                                <div class="content">
                                    <div class="clearfix">
                                        <div class="inner">
                                            <h3><span>{{ __('simulator.slide_2_title') }}</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Slide Item-->
                    <div class="slide-item">
                        <img src="/assets/images/main-slider/similatorslider2.jpg" class="image-layer" alt="{{ __('simulator.slide_3_title') }}">
                        <div class="auto-container">
                            <div class="content-box">
                                <div class="content">
                                    <div class="clearfix">
                                        <div class="inner">
                                            <h3><span>{{ __('simulator.slide_3_title') }}</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pager-content" data-scrollbar="">

                    <div class="pager-outer">
                        <div class="pager-box">
                            <div class="pager-two">
                                <a href="" class="pager-item active" data-slide-index="0" style="direction:rtl;text-align: center;">
                                    <div class="inner">
                                        <div class="text">
                                            <strong>{{ __('simulator.pager_1_text') }}</strong>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="pager-item" data-slide-index="1" style="direction:rtl;text-align: center;">
                                    <div class="inner">
                                        <div class="text">
                                            <strong>{{ __('simulator.pager_2_text') }}</strong>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="pager-item" data-slide-index="2" style="direction:rtl;text-align: center;">
                                    <div class="inner">
                                        <div class="text">
                                            <strong>{{ __('simulator.pager_3_text') }}</strong>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Banner Section -->

@endsection

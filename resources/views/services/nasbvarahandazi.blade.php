@extends('layouts.app2', ['title' => 'نصب و راه اندازی'])

@section('content')   
<section class="banner-ten">
    <div class="banner-container" direction:rtl>
        <div class="banner-slider-outer">
            <div class="slider-box">
                <div class="banner-slider-eight">
                    <!--Slide Item-->
                    <div class="slide-item">
                        <div class="image-layer"></div>
                        <img class="image-layer" src="/assets/images/main-slider/IMG_5018.jpg" alt="">
                        <div class="auto-container">
                            <div class="content-box">
                                <div class="content">
                                    <div class="clearfix">
                                        <!-- <div class="inner">
                                                        <h4></h4>
                                                        
                                                    </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-content">
                            <div class="auto-container">
                                <div class="bottom-inner">
                                    <div class="count"><span>01</span></div>
                                    <div class="text">
                                        <h3 style="color:#f05928">
                                            <span>{{ __('nasborahandazi.survey_and_layout_design') }}</span>
                                        </h3>
                                        <p>
                                            {{ __('nasborahandazi.survey_description') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-count"><span>01</span></div>
                    </div>
                    <!--Slide Item-->
                    <div class="slide-item">
                        <div class="image-layer"></div>
                        <img class="image-layer" src="/assets/images/main-slider/Architecture.jpg" alt="">

                        <div class="auto-container">
                            <div class="content-box">
                                <div class="content">
                                    <div class="clearfix">
                                        <div class="inner">
                                            <!-- <h4>Smart Technology</h4>
                                                        <h1><span>Branding & <br>Website Design</span></h1> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-content">
                            <div class="auto-container">
                                <div class="bottom-inner">
                                    <div class="count"><span>02</span></div>
                                    <div class="text">
                                        <h3 style="color:#f05928">
                                            <span>{{ __('nasborahandazi.construction_operations') }}</span>
                                        </h3>
                                        <p>
                                            {{ __('nasborahandazi.construction_description') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-count"><span>02</span></div>
                    </div>
                    <!--Slide Item-->
                    <div class="slide-item">
                        <div class="image-layer"></div>
                        <img class="image-layer" src="/assets/images/main-slider/nasb.jpg" alt="">

                        <div class="auto-container">
                            <div class="content-box">
                                <div class="content">
                                    <div class="clearfix">
                                        <div class="inner">
                                            <!-- <h4>Smart Technology</h4>
                                                        <h1><span>Branding & <br>Website Design</span></h1> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-content">
                            <div class="auto-container">
                                <div class="bottom-inner">
                                    <div class="count"><span>03</span></div>
                                    <div class="text">
                                        <h3 style="color:#f05928">
                                            <span>{{ __('nasborahandazi.installation_machines') }}</span>
                                        </h3>
                                        <p>
                                            {{ __('nasborahandazi.installation_description') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-count"><span>03</span></div>
                    </div>
                    <!--Slide Item-->
                    <div class="slide-item">
                        <div class="image-layer"></div>
                        <img class="image-layer" src="/assets/images/main-slider/navar-takhlieh.jpg" alt="">

                        <div class="auto-container">
                            <div class="content-box">
                                <div class="content">
                                    <div class="clearfix">
                                        <div class="inner">
                                            <!-- <h4>Smart Technology</h4>
                                                        <h1><span>Branding & <br>Website Design</span></h1> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-content">
                            <div class="auto-container">
                                <div class="bottom-inner">
                                    <div class="count"><span>04</span></div>
                                    <div class="text">
                                        <h3 style="color:#f05928">
                                            <span>{{ __('nasborahandazi.production_line_startup') }}</span></h3>
                                        <p>
                                            {{ __('nasborahandazi.production_line_startup_description') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-count"><span>04</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
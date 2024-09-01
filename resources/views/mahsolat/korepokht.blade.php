@extends('layouts.app', ['title' => 'کوره پخت'])
@section('content')
        
            <!-- <div class="body-bg-layer" style="background-image: url(/assets/images/background/body-bg-1.jpg);"></div> -->
            <!-- Page Title -->
            <section class="page-title" id="to-top-div">
                <div class="auto-container">
                    <h1><span>کوره پخت</span></h1>
                    <div class="bread-crumb">
                        <ul class="clearfix">
                            <li><a href="/">خانه</a></li>
                            <li class="">کوره پخت</li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="portfolio-section">
                <div class="auto-container">

                    <div class="mixitup-gallery">

                        <!--Filter-->
                        <div class="gallery-filters centered clearfix">
                            <ul class="filter-tabs filter-btns clearfix">
                                    
                                <li class="filter" data-role="button" data-filter=".website">دسته چهارم</li>
                                <li class="filter" data-role="button" data-filter=".mockup">دسته سوم</li>
                                <li class="filter" data-role="button" data-filter=".branding">دسته دوم</li>
                                <li class="filter" data-role="button" data-filter=".motion">دسته اول</li>
                                <li class="active filter" data-role="button" data-filter="all">نمایش همه</li>
                                
                                
                            </ul>
                        </div>
                        <div class="filter-list row clearfix">
                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all website application motion col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-24.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link"><a href="portfolio-single.html" class="theme-btn"><i class="fa-solid fa-bars-staggered"></i></a></div>
                                        <div class="inner">
                                            <div class="cat"><span>interior</span></div>
                                            <h5><a href="portfolio-single.html">Influenced by Power</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all mockup application col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-25.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link"><a href="portfolio-single.html" class="theme-btn"><i class="fa-solid fa-bars-staggered"></i></a></div>
                                        <div class="inner">
                                            <div class="cat"><span>cultural</span></div>
                                            <h5><a href="portfolio-single.html">Influenced by Power</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all mockup website motion col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-26.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link"><a href="portfolio-single.html" class="theme-btn"><i class="fa-solid fa-bars-staggered"></i></a></div>
                                        <div class="inner">
                                            <div class="cat"><span>interior</span></div>
                                            <h5><a href="portfolio-single.html">Thoughtfully making Space</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all mockup application col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-27.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link"><a href="portfolio-single.html" class="theme-btn"><i class="fa-solid fa-bars-staggered"></i></a></div>
                                        <div class="inner">
                                            <div class="cat"><span>flats</span></div>
                                            <h5><a href="portfolio-single.html">Unique Solution</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all mockup application motion col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-28.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link"><a href="portfolio-single.html" class="theme-btn"><i class="fa-solid fa-bars-staggered"></i></a></div>
                                        <div class="inner">
                                            <div class="cat"><span>wood</span></div>
                                            <h5><a href="portfolio-single.html">Magnificent Assembled</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all branding website motion col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-29.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link"><a href="portfolio-single.html" class="theme-btn"><i class="fa-solid fa-bars-staggered"></i></a></div>
                                        <div class="inner">
                                            <div class="cat"><span>exterior</span></div>
                                            <h5><a href="portfolio-single.html">Innovation in Craft</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all branding mockup website col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-30.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link"><a href="portfolio-single.html" class="theme-btn"><i class="fa-solid fa-bars-staggered"></i></a></div>
                                        <div class="inner">
                                            <div class="cat"><span>wood</span></div>
                                            <h5><a href="portfolio-single.html">Well-simplified design</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all branding mockup motion col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-31.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link"><a href="portfolio-single.html" class="theme-btn"><i class="fa-solid fa-bars-staggered"></i></a></div>
                                        <div class="inner">
                                            <div class="cat"><span>metal</span></div>
                                            <h5><a href="portfolio-single.html">Design your dreams with us</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all branding application motion col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-32.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link"><a href="portfolio-single.html" class="theme-btn"><i class="fa-solid fa-bars-staggered"></i></a></div>
                                        <div class="inner">
                                            <div class="cat"><span>exterior</span></div>
                                            <h5><a href="portfolio-single.html">Level of evolution</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all mockup website application col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-33.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link"><a href="portfolio-single.html" class="theme-btn"><i class="fa-solid fa-bars-staggered"></i></a></div>
                                        <div class="inner">
                                            <div class="cat"><span>aluminium</span></div>
                                            <h5><a href="portfolio-single.html">You bet it looks so good </a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all website application motion col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-34.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link"><a href="portfolio-single.html" class="theme-btn"><i class="fa-solid fa-bars-staggered"></i></a></div>
                                        <div class="inner">
                                            <div class="cat"><span>high buildings</span></div>
                                            <h5><a href="portfolio-single.html">The Joy of Living</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all branding mockup col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-27.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link"><a href="portfolio-single.html" class="theme-btn"><i class="fa-solid fa-bars-staggered"></i></a></div>
                                        <div class="inner">
                                            <div class="cat"><span>interior</span></div>
                                            <h5><a href="portfolio-single.html">The Joy of Living</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
    
<!--End Site Container--> 


@endsection
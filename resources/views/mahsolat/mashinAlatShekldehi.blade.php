@extends('layouts.app', ['title' => 'ماشن آلات شکل دهی و فرآوری'])
@section('content')
        
            <!-- <div class="body-bg-layer" style="background-image: url(/assets/images/background/body-bg-1.jpg);"></div> -->
            <!-- Page Title -->
            <section class="page-title" id="to-top-div">
                <div class="auto-container">
                    <h1><span>ماشین آلات شکل دهی و فرآوری</span></h1>
                    <div class="bread-crumb">
                        <ul class="clearfix">
                            <li><a href="/">خانه</a></li>
                            <li class="">ماشین آلات شکل دهی و فرآوری</li>
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
                                    
                                <li class="filter" data-role="button" data-filter=".motion">خشک کن سریع روتاری</li>
                                <li class="filter" data-role="button" data-filter=".application">خشک کن اتاقکی</li>
                                <li class="filter" data-role="button" data-filter=".website">خشک کن اتاقکی</li>
                                <li class="filter" data-role="button" data-filter=".mockup">خشک کن نیمه سریع</li>
                                <li class="filter" data-role="button" data-filter=".branding">خشک کن فوق سریع</li>
                                <li class="filter" data-role="button" data-filter=".motion">قالب</li>
                                <li class="active filter" data-role="button" data-filter="all">نمایش همه</li>
                                
                                
                            </ul>
                        </div>
                        <div class="filter-list row clearfix">
                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all website application motion col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-24.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link" onclick="openMoreBtn(this)"><i class="fa-solid fa-bars-staggered theme-btn"></i></div>
                                        <div class="inner">
                                            <div class="cat"><span>interior</span></div>
                                            <h5 id="prodoctName"><a href="portfolio-single.html">Influenced by Power</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all mockup application col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-25.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link" onclick="openMoreBtn(this)"><i class="fa-solid fa-bars-staggered"></i></div>
                                        <div class="inner">
                                            <div class="cat"><span>cultural</span></div>
                                            <h5 id="prodoctName"><a href="portfolio-single.html">Influenced by Power</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all mockup website motion col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-26.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link" onclick="openMoreBtn(this)"><i class="fa-solid fa-bars-staggered"></i></div>
                                        <div class="inner">
                                            <div class="cat"><span>interior</span></div>
                                            <h5 id="prodoctName"><a href="portfolio-single.html">Thoughtfully making Space</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all mockup application col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-27.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link" onclick="openMoreBtn(this)"><i class="fa-solid fa-bars-staggered"></i></div>
                                        <div class="inner">
                                            <div class="cat"><span>flats</span></div>
                                            <h5 id="prodoctName"><a href="portfolio-single.html">Unique Solution</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all mockup application motion col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-28.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link" onclick="openMoreBtn(this)"><i class="fa-solid fa-bars-staggered"></i></div>
                                        <div class="inner">
                                            <div class="cat"><span>wood</span></div>
                                            <h5 id="prodoctName"><a href="portfolio-single.html">Magnificent Assembled</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all branding website motion col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-29.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link" onclick="openMoreBtn(this)"><i class="fa-solid fa-bars-staggered"></i></div>
                                        <div class="inner">
                                            <div class="cat"><span>exterior</span></div>
                                            <h5 id="prodoctName"><a href="portfolio-single.html">Innovation in Craft</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all branding mockup website col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-30.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link" onclick="openMoreBtn(this)"><i class="fa-solid fa-bars-staggered"></i></div>
                                        <div class="inner">
                                            <div class="cat"><span>wood</span></div>
                                            <h5 id="prodoctName"><a href="portfolio-single.html">Well-simplified design</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all branding mockup motion col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-31.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link" onclick="openMoreBtn(this)"><i class="fa-solid fa-bars-staggered"></i></div>
                                        <div class="inner">
                                            <div class="cat"><span>metal</span></div>
                                            <h5 id="prodoctName"><a href="portfolio-single.html">Design your dreams with us</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all branding application motion col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-32.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link" onclick="openMoreBtn(this)"><i class="fa-solid fa-bars-staggered"></i></div>
                                        <div class="inner">
                                            <div class="cat"><span>exterior</span></div>
                                            <h5 id="prodoctName"><a href="portfolio-single.html">Level of evolution</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all mockup website application col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-33.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link" onclick="openMoreBtn(this)"><i class="fa-solid fa-bars-staggered"></i></div>
                                        <div class="inner">
                                            <div class="cat"><span>aluminium</span></div>
                                            <h5 id="prodoctName"><a href="portfolio-single.html">You bet it looks so good </a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all website application motion col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-34.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link" onclick="openMoreBtn(this)"><i class="fa-solid fa-bars-staggered"></i></div>
                                        <div class="inner">
                                            <div class="cat"><span>high buildings</span></div>
                                            <h5 id="prodoctName"><a href="portfolio-single.html">The Joy of Living</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Portfolio Block-->
                            <div class="portfolio-block mix all branding mockup col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image"><img src="/assets/images/resource/image-27.jpg" alt=""></div>
                                    <div class="overlay">
                                        <div class="more-link" onclick="openMoreBtn(this)"><i class="fa-solid fa-bars-staggered"></i></div>
                                        <div class="inner">
                                            <div class="cat"><span>interior</span></div>
                                            <h5 id="prodoctName"><a href="portfolio-single.html">The Joy of Living</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <!-- The Modal -->
            <div id="moreProductDtl" class="modal">
              <div class="modal-content">
                    <span class="closeModal"><img src="/assets/images/icons/close-icon.png" alt=""></span>
                    <button class="download-btn" onclick="startSpin(this)">
                    <i class="fa-light fa-download download" id="download"></i>
                    <div class="spinner"></div>
                    </button>
                    <h3 id="productNameModal"></h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non minima ea quos repudiandae molestias dicta a quod doloribus adipisci ut dolorum, voluptatibus quasi minus, aliquid labore. Veniam labore illum consequatur fuga quisquam sint dicta repellendus iusto. Velit ut optio illum.</p>

                </div>
            </div>  
            </section>
    
<!--End Site Container--> 


@endsection
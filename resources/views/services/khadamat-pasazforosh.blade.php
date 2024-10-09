@extends('layouts.app', ['title' => 'خدمات پس از فروش'])

@section('content')
    <!-- Page Title -->
    <section class="page-title" id="to-top-div">
        <div class="auto-container">
            <h1><span>خدمات پس از فروش</span></h1>
            <div class="bread-crumb">
                <ul class="clearfix">
                    <li><a href="/">خانه</a></li>
                    <li class="current">خدمات پس از فروش</li>
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
                        <li class="active filter" data-role="button" data-filter="all">نمایش همه</li>
                        @foreach($services->unique('category') as $service)
                            <li class="filter" data-role="button" data-filter=".{{ $service->category }}">{{ $service->category }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="filter-list row clearfix">
                    @foreach($services as $service)
                        <!--Portfolio Block-->
                        <div class="portfolio-block mix all {{ $service->category }} col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image">
                                    <img src="{{ $service->banner_images ? asset('storage/' . json_decode($service->banner_images)[0]) : '/path/to/default/image.jpg' }}" alt="{{ $service->title }}">
                                </div>
                                <div class="overlay">
                                    <div class="more-link" onclick="openMoreBtn(this)">
                                    <i class="fa-solid fa-bars-staggered"></i>
                                    </div>
                                    <div class="inner">
                                        <div class="cat"><span>{{ $service->category }}</span></div>
                                        <h5 id="prodoctName"><a href="portfolio-single.html">{{ $service->title }}</a></h5>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="moreProductDtl" class="modal">
        <div class="modal-content">
            <span class="closeModal"><img src="/assets/images/icons/close-icon.png" alt=""></span>
            <button class="download-btn" onclick="startSpin(this)">
                <i class="fa-light fa-download download" id="download"></i>
                <div class="spinner"></div>
            </button>
            <h3 id="productNameModal"></h3>
            <p>{{ $service->content}}</p>
        </div>
    </div>
    </section>
    <!-- End Site Container --> 
@endsection

@extends('layouts.app', ['title' => 'نصب و راه اندازی'])

@section('content')   
<style>
    .news-block .image-box img{
        width: 376px; /* Set the width */
    height: 266px; /* Set the height */
    object-fit: cover; /* Maintain aspect ratio and cover the area */
    }
</style>
    <!-- Page Title -->
    <section class="page-title" id="to-top-div">
        <div class="auto-container">
            <h1><span>نصب و راه اندازی</span></h1>
            <div class="bread-crumb">
                <ul class="clearfix">
                    <li><a href="/">خانه</a></li>
                    <li class="current">نصب و راه اندازی</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Banner Section -->

    <!-- News Section -->
    <section class="news-section">
        <div class="auto-container">

            <div class="news">
                <div class="row clearfix">
                    @foreach($services as $service)
                    <!-- Block -->
                    <div class="news-block col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <a href="#"><img src="{{ asset('storage/' . json_decode($service->banner_images)[0]) }}" alt="{{ $service->title }}"></a>
                            </div>
                            <div class="lower">
                                <h4><a href="#">{{ $service->title }}</a></h4>
                                <div class="info"></div>
                                <div class="link-box">
                                    <a href="#" class="theme-btn">ادامه مطلب <i class="far fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="styled-pagination">
                <ul class="clearfix">
                    <li class="active"><a href="#">01</a></li>
                    <li><a href="#">02</a></li>
                    <li><a href="#">03</a></li>
                </ul>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app', ['title' => 'تامین قطعات و تعمیرات'])

@section('content')

<div class="main-content-container main-responsive-container">

    <!-- Banner Section -->
    <section class="banner-three">
        <div class="banner-container">
            <div class="banner-slider-two owl-theme owl-carousel">
                @foreach($services as $key => $service)
                <!-- Slide Item -->
                <div class="slide-item">
                    <div class="image-layer" style="background-image: url({{ asset('storage/' . json_decode($service->banner_images)[0]) }});"></div>

                    <div class="slide-count"><span>{{ $key + 1 }}</span></div>
                    <div class="content-box">
                        <div class="content">
                            <div class="inner">
                                <h3><a href="#">{{ $service->title }}</a></h3>
                                <div class="cat"><span>{{ $service->category ?? 'بدون دسته‌بندی' }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--End Banner Section -->

</div>
@endsection

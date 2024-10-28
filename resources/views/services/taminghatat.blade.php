@extends('layouts.app2', ['title' => 'تامین قطعات و تعمیرات'])

@section('content')

<div class="main-content-container main-responsive-container">

    <!-- Portfolio Section -->
    <section class="portfolio-one">
        <div class="outer-container">
            <div class="row clearfix">
                @foreach($services as $key => $service)
                <!--Portfolio Item-->
                <div class="portfolio-item-one col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-container">
                            <img src="{{ asset('storage/' . json_decode($service->banner_images)[0]) }}" alt="{{ $service->title }}" class="service-image">
                        </div>
                        <div class="overlay">
                            <div class="inner">
                                <h5><a href="#">{{ $service->title }}</a></h5>
                                <div class="cat"><span>{{ $service->category ?? 'بدون دسته‌بندی' }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
<style>
    .image-container {
    max-width: 354px;
    max-height: 296px;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
}

.service-image {
    width: 354px;
    height: 296px;
    object-fit: cover; 
}
</style>

@endsection

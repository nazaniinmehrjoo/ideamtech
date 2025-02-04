@extends('layouts.app', ['title' => __('مشاوره')])

@section('content')
<div class="scroll-container">
    <div class="main-content-container main-responsive-container">
        <!-- Banner Section -->
        <section class="banner-nine">
            <div class="banner-container">
                <div class="slider-box">
                    <div class="banner-slider-seven">
                        @foreach($services as $key => $service)
                        <!-- Slide Item -->
                        <div class="slide-item">
                            <div class="auto-container">
                                <div class="content-box">
                                    <div class="content">
                                        <div class="clearfix">
                                            <div class="inner">
                                                <div class="image-box">
                                                    <div class="image">
                                                        <img src="{{ asset('storage/' . json_decode($service->banner_images)[0]) }}" 
                                                             alt="{{ json_decode($service->title, true)[app()->getLocale()] }}">
                                                    </div>
                                                </div>
                                                <div class="slide-count">
                                                    <span class="current">{{ $key + 1 }}</span>
                                                    <span class="line"></span>
                                                    <span class="total">{{ count($services) }}</span>
                                                </div>
                                                <div class="text-content">
                                                    <div class="inner-box">
                                                        <div class="text">
                                                            <div class="ttl">
                                                                <strong>{{ json_decode($service->title, true)[app()->getLocale()] }}</strong>
                                                            </div>
                                                            <p>
                                                                {{ json_decode($service->content, true)[app()->getLocale()] }}
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
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Section -->
    </div>
</div>
@endsection

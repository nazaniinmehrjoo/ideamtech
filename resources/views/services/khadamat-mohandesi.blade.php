@extends('layouts.app', ['title' => 'خدمات مهندسی'])

@section('content')
<div class="main-content-container main-content-mohandesi" id="mainContent">
    <!-- Banner Section -->
    <section class="banner-four">
        <div class="banner-container">
            <div class="banner-slider-outer">
                <div class="auto-container">
                    <div class="banner-content">
                        <div class="slider-box">
                            <div class="banner-slider-three">
                                @foreach($services as $index => $service)
                                    <div class="slide-item">
                                        <div class="image-box">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="{{ $service->banner_images ? asset('storage/' . json_decode($service->banner_images)[0]) : '/path/to/default/image.jpg' }}" alt="{{ $service->title }}">
                                                </a>
                                            </div>
                                            <div class="slide-count"><span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span></div>
                                            <div class="cat"><span>{{ $service->title }}</span></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="pager-outer scrollbar">
                            <div class="pager-box">
                                <div class="pager-one">
                                    <div class="accordionslider-box">
                                        @foreach($services as $index => $service)
                                            <div class="accordionBoxSlider block">
                                                <div class="accslide-btn">
                                                    <a href="#" class="pager-item slide" data-slide-index="{{ $index }}">
                                                        <div class="inner">
                                                            <span class="icon"><i class="fa-light fa-plus"></i></span>
                                                            <span class="text">{{ $service->title }}</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="accbox-content" style="display: none;">
                                                    <div class="content">
                                                        <div class="text">{{ $service->content }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>                                            
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Banner Section -->
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        $('.accslide-btn a').on('click', function(e) {
            e.preventDefault();
            var $content = $(this).closest('.accordionBoxSlider').find('.accbox-content');
            var $icon = $(this).find('.icon i');

            // Toggle the content visibility
            $content.slideToggle();

            // Change the icon based on visibility
            if ($content.is(':visible')) {
                $icon.removeClass('fa-plus').addClass('fa-minus');
            } else {
                $icon.removeClass('fa-minus').addClass('fa-plus');
            }
        });
    });
</script>
@endsection

@endsection

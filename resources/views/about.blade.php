@extends('layouts.app', ['title' => 'درباره ما'])
@section('content')
<br>
<br>
<!--Plans Section-->
<div class="popup-overlay" id="popupOverlay" onclick="hidePopup()">
    <img src="" id="popupImage" alt="">
</div>
<section class="plans-section">
    <div class="auto-container">
        <div class="row clearfix">
            <!-- Image -->
            <div class="image-col col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="image">
                        <div class="bg-pattern"></div>
                        <img src="/assets/images/resource/bornagostar.jpg" alt="{{ __('about.alt_text') }}">
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="text-col col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <h4>{{ __('about.title') }}</h4>
                    <div class="text">
                        <p>{{ __('about.paragraph_1') }}</p>
                        <p>{{ __('about.paragraph_2') }}</p>
                        <ul>
                            <li><i class="fa-light fa-medal"></i>{{ __('about.list_item_1') }}</li>
                            <li><i class="fa-light fa-medal"></i>{{ __('about.list_item_2') }}</li>
                            <li><i class="fa-light fa-medal"></i>{{ __('about.list_item_3') }}</li>
                            <li><i class="fa-light fa-medal"></i>{{ __('about.list_item_4') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="banner-six">
    <div class="banner-container">
        <div class="auto-container">
            <div class="def-title-box">
                <div class="patt"><span></span></div>
                <div class="subtitle">{{ __('about.certificates.subtitle') }}</div>
                <h3>{{ __('about.certificates.title') }}</h3>
            </div>
            <div class="banner-slider-four owl-theme owl-carousel">
                <!-- Dynamic Slide Items -->
                @foreach(__('about.certificates.items') as $key => $certificate)
                    <div class="slide-item {{ $key % 2 == 1 ? 'alt' : '' }}">
                        <div class="content-box">
                            <div class="content">
                                <div class="slide-count"><span>{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}</span></div>
                                <div class="image-box sertificate-box">
                                    <div class="image-layer"
                                        style="background-image: url(/assets/images/resource/a{{ $key + 1 }}.jpg);"></div>
                                    <div class="certificateZoomIn">
                                        <i class="fa-sharp fa-regular fa-arrows-maximize"></i>
                                    </div>
                                    <div class="inner">
                                        <h3>{{ $certificate['title'] }}</h3>
                                        <div class="cat"><span>{{ $certificate['code'] }}</span></div>
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



<section class="services-section">
    <div class="auto-container">
        <div class="def-title-box">
            <div class="patt"><span></span></div>
            <h3>{{ __('about.services_section.title') }}</h3>
        </div>
        <div class="services">
            <div class="row clearfix">
                <!--Block-->
                <div class="service-block customer-service col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-box">
                        <div class="inner">
                            <div class="icon-box customerIconBox"><span class="fa-regular fa-users"></span></div>
                            <h5>{{ __('about.services_section.customer_satisfaction.title') }}</h5>
                            <div class="customerInner">
                                <div class="image-content">
                                    <img src="/assets/images/main-slider/modernbrik.png"
                                        alt="{{ __('services_section.customer_satisfaction.alt_text') }}">
                                </div>
                                <div>
                                    <p class="text">{{ __('about.services_section.customer_satisfaction.description') }}
                                    </p>
                                    <div class="link-box">
                                        <a href="{{ __('about.services_section.customer_satisfaction.link_url') }}">
                                            <span class="far fa-angle-right"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--Services Section-->
<section class="services-two">
    <div class="auto-container">
        <div class="def-title-box">
            <div class="patt"><span></span></div>
            <div class="subtitle">{{ __('about.services_section_two.subtitle') }}</div>
            <h3>{{ __('about.services_section_two.title') }}</h3>
        </div>

        <div class="row parent-row clearfix">
            <!-- Tabs Section -->
            <div class="tabs-col col-xl-6 col-lg-12 col-md-12 col-sm-12">
                <div class="tabs-box def-tabs-box">
                    @if(!empty(__('about.services_section_two.tabs')))
                        <ul class="tab-buttons clearfix">
                            @foreach(__('about.services_section_two.tabs') as $key => $tab)
                                <li class="tab-btn {{ $loop->first ? 'active-btn' : '' }}" data-tab="#tab-{{ $key }}">
                                    <span>{{ $tab['title'] ?? '' }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tabs-content">
                            @foreach(__('about.services_section_two.tabs') as $key => $tab)
                                <div class="tab {{ $loop->first ? 'active-tab' : '' }}" id="tab-{{ $key }}">
                                    <div class="row clearfix mainTabContainer">
                                        <div class="image-col col-lg-5 col-md-5 col-sm-6">
                                            <div class="image mainAboutBorna">
                                                <img src="{{ $tab['image'] ?? '' }}" alt="{{ $tab['title'] ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="text-col col-lg-7 col-md-7 col-sm-6">
                                            <div class="text purposeContent">
                                                <p>{{ $tab['description'] ?? '' }}</p>
                                            </div>
                                            @if($tab['button'] ?? false)
                                                <p class="catalogDesc">{{ $tab['button_text'] ?? '' }}</p>
                                                <button class="download-btn"
                                                    onclick="startSpin(this, '{{ $tab['button_link'] ?? '' }}')">
                                                    <i class="fa-light fa-download download"></i>
                                                    <div class="spinner"></div>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>{{ __('No tabs available.') }}</p>
                    @endif
                </div>
            </div>

            <!-- Accordions Section -->
            <div class="accordions-col col-xl-6 col-lg-12 col-md-12 col-sm-12">
                <div class="accordion-box clearfix">
                    @if(!empty(__('about.services_section_two.accordions')))
                        @foreach(__('about.services_section_two.accordions') as $accordion)
                            <div class="accordion block {{ $loop->first ? 'active-block' : '' }}">
                                <div class="acc-btn {{ $loop->first ? 'active' : '' }}">
                                    {{ $accordion['title'] ?? '' }} <i class="{{ $accordion['icon'] ?? '' }}"></i>
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text styleList">
                                            <ul class="styled-list">
                                                @foreach($accordion['items'] ?? [] as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>{{ __('No accordion content available.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
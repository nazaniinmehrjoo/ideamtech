@extends('layouts.app', ['title' => __('turnkeysolution.page_title')])

@section('content')
@section('meta_tags')
    <meta name="description" content="
        {{ app()->getLocale() == 'fa' ? 
        'ارائه خدمات کلید در دست برای پروژه‌های آجرسازی از طراحی تا اجرا. شامل مشاوره، تأمین تجهیزات و پیاده‌سازی کامل خط تولید.' 
        : 
        'Turnkey solutions for brick manufacturing projects from design to execution. Including consulting, equipment supply, and full implementation.' }}">
@endsection

<!-- Page Title -->
<section class="page-title" id="to-top-div">
    <div class="auto-container">
        <h1><span>{{ __('turnkeysolution.page_title') }}</span></h1>
        <div class="bread-crumb">
            <ul class="clearfix">
                <li><a href="/">{{ __('turnkeysolution.home') }}</a></li>
                <li class="active">{{ __('turnkeysolution.page_title') }}</li>
            </ul>
        </div>
    </div>
</section>

<section>
    <div class="turnKeyContainer">
        <div class="patt"><span></span></div>
        <div class="mt-5">
            <div class="">
                <div class="slider">
                    <img src="/assets/images/main-slider/turnkeysolution.png"
                        alt="{{ __('turnkeysolution.page_title') }}">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="intro_section" style="direction:rtl;">
    <div class="separator"></div>

    <div class="outer-container">
        <div class="content-wrapper">
            <div class="panel-content">
                <h2 class="toAnim toDown anim">{{ __('turnkeysolution.section_title') }}</h2>
                <div class="content">
                    <p>{{ __('turnkeysolution.intro_text') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="additional-box"></div>
</section>

<section class="image-grid-clean">
    <div class="turnKeyGridContainer">
        <h3>{{ __('turnkeysolution.page_title') }}</h3>
        <div class="row">
            <div class="grid-item large col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="image">
                    <img src="/assets/images/main-slider/koreh-pokhttoneli.jpg"
                        alt="{{ __('turnkeysolution.drying') }}">
                </div>
                <p class="grid-item-title">{{ __('turnkeysolution.baking') }}</p>
                <hr>
                <p class="text-right">{{ __('turnkeysolution.baking_desc') }}</p>
            </div>
            <div class="grid-item grid-item-center large col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="image-center">
                    <img src="/assets/images/main-slider/khoskkon22.jpg"
                        alt="{{ __('turnkeysolution.drying') }}">
                </div>
                <p class="grid-item-title">{{ __('turnkeysolution.drying') }}</p>
                <hr>
                <p class="text-right">{{ __('turnkeysolution.drying_desc') }}</p>
            </div>

            <div class="grid-item large col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="image">
                    <img src="/assets/images/main-slider/Amadesazi.JPG"
                        alt="{{ __('turnkeysolution.material_preparation') }}">
                </div>
                <p class="grid-item-title">{{ __('turnkeysolution.material_preparation') }}</p>
                <hr>
                <p class="text-right">{{ __('turnkeysolution.material_preparation_desc') }}</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="row">
        <div class="faq">
            <h2 class="faq__title">{{ __('turnkeysolution.faq_title') }}</h2>
            <details>
                <summary>{{ __('turnkeysolution.faq1_question') }}</summary>
                <div class="faqText">
                    <p>{{ __('turnkeysolution.faq1_answer') }}</p>
                </div>
            </details>
            <details>
                <summary>{{ __('turnkeysolution.faq2_question') }}</summary>
                <div class="faqText">
                    <p>{{ __('turnkeysolution.faq2_answer') }}</p>
                </div>
            </details>
            <details>
                <summary>{{ __('turnkeysolution.faq3_question') }}</summary>
                <div class="faqText">
                    <p>{{ __('turnkeysolution.faq3_answer') }}</p>
                </div>
            </details>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const image = document.querySelector('.slider img');

        image.addEventListener('mouseenter', () => {
            image.style.transform = 'translateX(-40%)';
        });

        image.addEventListener('mouseleave', () => {
            image.style.transform = 'translateX(0)';
        });
    });
</script>

@endsection
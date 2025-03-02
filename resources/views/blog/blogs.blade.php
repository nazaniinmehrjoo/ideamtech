@extends('layouts.app')

@section('content')
    <div class="scroll-container">
        <div class="main-content-container main-responsive-container" id="scroll-container">
            <div class="body-bg-layer"></div>

            <!-- Page Title -->
            <section class="page-title" id="to-top-div">
                <div class="auto-container">
                    <h1><span>@lang('blog.news_and_events')</span></h1>
                    <div class="bread-crumb">
                        <ul class="clearfix">
                            <li>
                                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}">@lang('blog.home')</a>
                            </li>
                            <li class="current">@lang('blog.news_and_events')</li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- End Banner Section -->

            <section class="news-section">
                <div class="auto-container custom-container">
                    <div class="mixitup-gallery">

                        <!-- Category Filter (Styled like Portfolio Section) -->
                        <div class="gallery-filters centered clearfix">
                            <ul class="filter-tabs filter-btns clearfix">
                                <li class="filter" data-filter="all">{{ __('blog.show_all') }}</li>
                                @foreach($categories as $category)
                                    <li class="filter" data-filter=".category-{{ $category }}">
                                        {{ $category }}
                                    </li>
                                @endforeach
                            </ul>
                        </div> 


                        <!-- Blog Posts List -->
                        <div id="category-list" class="filter-list row clearfix">
                            @foreach($posts as $post)
                                <div class="portfolio-block mix category-{{ $post->category }} col-xl-4 col-lg-4 col-md-6 col-sm-12"
                                    data-category="{{ $post->category }}">
                                    <div class="inner-box">
                                        <!-- Post Image -->
                                        <div class="image">
                                            <a
                                                href="{{ route('blog.show', ['locale' => app()->getLocale(), 'post' => $post->id]) }}">
                                                <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('images/default-image.jpg') }}"
                                                    alt="{{ $post->title }}">
                                            </a>
                                        </div>

                                        <!-- Post Details -->
                                        <div class="overlay">
                                            <div class="inner">
                                                <div class="cat">
                                                    <span>{{ $post->category }}</span>
                                                </div>
                                                <h5>
                                                    <a
                                                        href="{{ route('blog.show', ['locale' => app()->getLocale(), 'post' => $post->id]) }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </h5>
                                                <p>{{ Str::limit($post->content, 150) }}</p>
                                                <div class="blog-link-box">
                                                    <a
                                                        href="{{ route('blog.show', ['locale' => app()->getLocale(), 'post' => $post->id]) }}">
                                                        {{ __('blog.read_more') }} <i class="far fa-long-arrow-alt-right"></i>
                                                    </a>

                                                </div>
                                                <div class="time">
                                                    <i class="far fa-clock"></i>
                                                    {{ \Carbon\Carbon::parse($post->getRawOriginal('created_at'))->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $posts->links('vendor.pagination.default') }}
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var containerEl = document.querySelector('.filter-list');
            if (containerEl) {
                var mixer = mixitup(containerEl, {
                    selectors: {
                        target: '.portfolio-block'
                    },
                    animation: {
                        duration: 300
                    }
                });
            }
        });
    </script>
@endsection
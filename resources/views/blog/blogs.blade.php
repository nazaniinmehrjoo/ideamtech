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

        <!-- News Section -->
        <section class="news-section">
            <div class="auto-container custom-container">
                <div class="news">
                    <div class="row clearfix">
                        @foreach($posts as $post)
                            <div class="news-block col-12">
                                <div class="inner-box d-flex custom-bg-color">
                                    <!-- Image on the left side with category and date under it -->
                                    <div class="custom-image-container">
                                        <a
                                            href="{{ route('blog.show', ['locale' => app()->getLocale(), 'post' => $post->id]) }}">
                                            <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('images/default-image.jpg') }}"
                                                alt="{{ $post->title }}">
                                        </a>
                                        <div class="image-info">
                                            <div class="cat">
                                                <i class="far fa-folder"></i> {{ $post->category }}
                                            </div>
                                            <div class="time">
                                                <i class="far fa-clock"></i>
                                                {{ \Carbon\Carbon::parse($post->getRawOriginal('created_at'))->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Description on the right side -->
                                    <div class="content-container">
                                        <h4>
                                            <a
                                                href="{{ route('blog.show', ['locale' => app()->getLocale(), 'post' => $post->id]) }}">
                                                {{ $post->title }}
                                            </a>
                                        </h4>
                                        <p>{{ Str::limit($post->content, 150) }}</p>
                                        <div class="link-box">
                                            <a href="{{ route('blog.show', ['locale' => app()->getLocale(), 'post' => $post->id]) }}"
                                                class="theme-btn">
                                                @lang('blog.read_more') <i class="far fa-long-arrow-alt-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Pagination -->
                <div class="styled-pagination">
                    {{ $posts->withQueryString()->links() }}
                </div>
            </div>
        </section>
    </div>
</div>

<style>
    /* Limit container width and center */
    .custom-container {
        max-width: 64%;
        /* Adjust width as needed */
        margin: 0 auto;
    }

    /* Other styling */
    .inner-box {
        display: flex;
        flex-direction: row;
        gap: 15px;
        border: 1px solid #333333;
        padding: 10px;
        align-items: stretch;
        background-color: #282828;
        color: #f0f0f0;
        border-radius: 10px;
    }

    /* Image container adjustments */
    .custom-image-container {
        width: 36%;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .custom-image-container img {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: 10px
    }

    /* Category and date styling under the image */
    .image-info {
        padding: 10px 0;
        display: flex;
        justify-content: space-between;
        font-size: 14px;
        color: #b0b0b0;
        border-radius: 18px;
    }

    /* Content container adjustments */
    .content-container {
        width: 50%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-left: 15px;
    }

    .content-container p {
        margin-top: 10px;
        font-size: 16px;
        color: #dddddd;
        direction: rtl;
    }

    .link-box a.theme-btn {
        background-color: #444444;
        color: #ffffff;
        padding: 8px 15px;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
        margin-top: 10px;
    }

    .link-box a.theme-btn:hover {
        background-color: #555555;
    }
</style>
@endsection
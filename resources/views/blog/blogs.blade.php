@extends('layouts.app')

@section('content')
<div class="scroll-container">
    <div class="main-content-container" id="scroll-container">
        <div class="body-bg-layer"></div>

        <!-- Page Title -->
        <section class="page-title" id="to-top-div">
            <div class="auto-container">
                <h1><span>مقالات</span></h1>
                <div class="bread-crumb">
                    <ul class="clearfix">
                        <li><a href="{{ route('home') }}">خانه</a></li>
                        <li class="current">بلاگ</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Banner Section-->

        <!--News Section-->
        <section class="news-section">
            <div class="auto-container">
                <div class="news">
                    <div class="row clearfix">
                        @foreach($posts as $post)
                            <div class="news-block col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <a href="{{ route('blog.show', $post->id) }}">
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                                        </a>
                                    </div>
                                    <div class="lower">
                                        <h4>
                                            <a href="{{ route('blog.show', $post->id) }}">
                                                {{ $post->title }}
                                            </a>
                                        </h4>
                                        <div class="info">
                                            <div class="cat i-block">
                                                <i class="far fa-folder"></i> {{ $post->category }}
                                            </div>
                                            <div class="time i-block">
                                                <i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                            </div>
                                        </div>
                                        <div class="link-box">
                                            <a href="{{ route('blog.show', $post->id) }}" class="theme-btn">
                                                ادامه مطلب <i class="far fa-long-arrow-alt-right"></i>
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
                    {{ $posts->links() }}
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<section class="page-title" id="to-top-div">
    <div class="auto-container">
        <h1><span>{{ $post->title }}</span></h1>
        <div class="bread-crumb">
            <ul class="clearfix">
                <li><a href="{{ route('home') }}">خانه</a></li>
                <li class="current">بلاگ</li>
            </ul>
        </div>
    </div>
</section>
<!--End Banner Section -->

<!--Sidebar Page-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Content Side-->
            <div class="content-side col-lg-8 col-md-12 col-sm-12">
                <div class="content-inner">
                    <div class="blog-details">
                    <div class="image-box">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                    </div>
                        <div class="lower">
                            <h3>{{ $post->title }}</h3>
                            <div class="info">
                                <div class="cat i-block"><i class="far fa-folder"></i> {{ $post->category }}</div>
                                <div class="time i-block">
                                    <i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                </div>
                            </div>
                            <div class="text-content text">
                                <!-- Displaying post content -->
                                {!! nl2br(e($post->content)) !!}
                            </div>

                            <!-- Tags -->
                            @if($post->tags)
                                <div class="post-tags">
                                    <span class="ttl">Tags:</span> 
                                    @foreach(explode(',', $post->tags) as $tag)
                                        <a href="#">{{ trim($tag) }}</a>{{ !$loop->last ? ',' : '' }} &ensp;
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <div class="sidebar">
                    <div class="sidebar-widget recent-post">
                        <div class="sidebar-title"><h5><span>latest posts</span></h5></div>
                        <div class="posts">
                            @foreach($latestPosts as $latestPost)
                                <div class="post">
                                    <div class="inner">
                                        <div class="image">
                                            <a href="{{ route('blog.show', $latestPost->id) }}">
                                                <img src="{{ asset('storage/' . $latestPost->image) }}" alt="{{ $latestPost->title }}">
                                            </a>
                                        </div>
                                        <div class="date">
                                            <span>{{ \Carbon\Carbon::parse($latestPost->created_at)->format('d.m.Y') }}</span>
                                        </div>
                                        <div class="text">
                                            <a href="{{ route('blog.show', $latestPost->id) }}">{{ $latestPost->title }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-widget cat-widget">
                        <div class="sidebar-title"><h5><span>categories</span></h5></div>
                        <div class="categories">
                            <ul>
                                @foreach($categories as $category)
                                    <li><a href="#">{{ $category->category }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

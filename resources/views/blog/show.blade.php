@extends('layouts.app')

@section('content')
<!-- Page Title -->
<section class="page-title" id="to-top-div">
    <div class="auto-container">
        <h1><span>{{ $post->title }}</span></h1>
        <div class="bread-crumb">
            <ul class="clearfix">
                <li><a href="{{ route('home') }}">@lang('blog.home')</a></li>
                <li class="current">@lang('blog.blog')</li>
            </ul>
        </div>
    </div>
</section>

<!-- Sidebar Page -->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            <!-- Content Side -->
            <div class="content-side col-lg-8 col-md-8 col-sm-12">
                <div class="content-inner">
                    <div class="blog-details">
                        <!-- Main Image -->
                        <div class="image-box mb-4">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid rounded">
                        </div>

                        <!-- Additional Images Grid -->
                        <div class="image-grid">
                            <div class="row row-cols-2 row-cols-md-3 g-3">
                                @foreach($post->images as $image)
                                    <div class="col">
                                        <div class="img-container">
                                            <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid rounded shadow-sm" alt="Image">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Post Content -->
                        <div class="lower mt-4">
                            <h3>{{ $post->title }}</h3>
                            <div class="info mb-2">
                                <div class="cat i-block"><i class="far fa-folder"></i> {{ $post->category }}</div>
                                <div class="time i-block">
                                    <i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($post->getRawOriginal('created_at'))->diffForHumans() }}
                                </div>
                            </div>
                            <div class="text-content text">
                                {!! nl2br(e($post->content)) !!}
                            </div>

                            <!-- Tags -->
                            @if(!empty($post->tags))
                                <div class="post-tags mt-3">
                                    <span class="ttl">@lang('blog.tags'):</span>
                                    @foreach(explode(',', $post->tags) as $tag)
                                        <a href="#" class="badge bg-secondary text-white">{{ trim($tag) }}</a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="sidebar-side col-lg-4 col-md-4 col-sm-12">
                <div class="sidebar">
                    <!-- Latest Posts -->
                    <div class="sidebar-widget recent-post">
                        <div class="sidebar-title"><h5>@lang('blog.latest_posts')</h5></div>
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
                                            <span>{{ \Carbon\Carbon::parse($latestPost->getRawOriginal('created_at'))->format('d.m.Y') }}</span>
                                        </div>
                                        <div class="text">
                                            <a href="{{ route('blog.show', $latestPost->id) }}">{{ Str::limit($latestPost->title, 50) }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="sidebar-widget cat-widget">
                        <div class="sidebar-title"><h5>@lang('blog.categories')</h5></div>
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

<style>
    .img-container {
        overflow: hidden;
        border-radius: 8px;
    }

    .img-container img {
        transition: transform 0.3s ease;
    }

    .img-container img:hover {
        transform: scale(1.05);
    }
</style>
@endsection

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
                                <li class="filter {{ request('category') ? '' : 'active' }}" 
                                    onclick="filterPosts('')">
                                    {{ __('blog.show_all') }}
                                </li>
                                @foreach($categories as $category)
                                    <li class="filter {{ request('category') == $category ? 'active' : '' }}" 
                                        onclick="filterPosts('{{ $category }}')">
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
                                            <a href="{{ route('blog.show', ['locale' => app()->getLocale(), 'post' => $post->id]) }}">
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
                                                    <a href="{{ route('blog.show', ['locale' => app()->getLocale(), 'post' => $post->id]) }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </h5>
                                                <p>{{ Str::limit($post->content, 150) }}</p>
                                                <div class="link-box">
                                                    <a href="{{ route('blog.show', ['locale' => app()->getLocale(), 'post' => $post->id]) }}"
                                                       class="theme-btn">
                                                        {{ __('blog.read_more') }} <i class="far fa-long-arrow-alt-right"></i>
                                                    </a>
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

    <!-- JavaScript for Filtering (Fixed - No Looping Issue) -->
    <script>
        function filterPosts(category) {
            let currentUrl = new URL(window.location.href);
            let currentCategory = currentUrl.searchParams.get("category");

            // Prevent unnecessary reload if the selected category is already active
            if (currentCategory === category || (!currentCategory && category === '')) {
                return;
            }

            // Update the URL with the selected category
            if (category) {
                currentUrl.searchParams.set('category', category);
            } else {
                currentUrl.searchParams.delete('category');
            }
            
            // Reload page with new category
            window.location.href = currentUrl.toString();
        }

        // Highlight the active category button on page load
        document.addEventListener("DOMContentLoaded", function () {
            let currentCategory = new URL(window.location.href).searchParams.get("category");
            let filters = document.querySelectorAll('.filter');

            filters.forEach(filter => {
                let filterValue = filter.getAttribute("onclick").match(/'([^']+)'/)[1];
                if (filterValue === currentCategory || (!currentCategory && filterValue === '')) {
                    filter.classList.add('active');
                } else {
                    filter.classList.remove('active');
                }
            });
        });
    </script>
@endsection

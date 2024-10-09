@extends('layouts.app', ['title' => 'خشک کن'])

@section('content')

<!-- Page Title -->
<section class="page-title" id="to-top-div">
    <div class="auto-container">
        <h1><span>خشک کن</span></h1>
        <div class="bread-crumb">
            <ul class="clearfix">
                <li><a href="/">خانه</a></li>
                <li class="active">خشک کن</li>
            </ul>
        </div>
    </div>
</section>

<section class="portfolio-section">
    <div class="auto-container">

        <div class="mixitup-gallery">
            <!-- Filter Section -->
            <div class="gallery-filters centered clearfix">
                <ul class="filter-tabs filter-btns clearfix">
                    <li class="filter" data-filter="all">نمایش همه</li>
                    @foreach($categories as $category)
                    <li class="filter" data-filter=".category-{{ $category->id }}">
                        {{ $category->name }}
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Product List -->
            <div class="filter-list row clearfix" id="product-list">
                @forelse($products as $product)
                <div class="portfolio-block mix category-{{ $product->category_id }} col-xl-4 col-lg-4 col-md-6 col-sm-12" data-category="{{ $product->category_id }}">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        </div>
                        <div class="overlay">
                            <div class="more-link" onclick="openMoreBtn(this)">
                                <i class="fa-solid fa-bars-staggered"></i>
                            </div>
                            <div class="inner">
                                <div class="cat"><span>{{ $product->category->name }}</span></div>
                                <h5 id="prodoctName"><a href="#">{{ $product->name }}</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p>No products found.</p>
                @endforelse
            </div>
        </div>
        <div id="moreProductDtl" class="modal">
        <div class="modal-content">
            <span class="closeModal"><img src="/assets/images/icons/close-icon.png" alt=""></span>
            <button class="download-btn" onclick="startSpin(this)">
                <i class="fa-light fa-download download" id="download"></i>
                <div class="spinner"></div>
            </button>
            <h3 id="productNameModal"></h3>
            <p>{{ $product->description}}</p>
        </div>
    </div>
</section>




@endsection

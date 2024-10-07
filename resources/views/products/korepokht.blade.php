@extends('layouts.app', ['title' => 'کوره پخت'])

@section('content')
<!-- Page Title -->
<section class="page-title" id="to-top-div">
    <div class="auto-container">
        <h1><span>کوره پخت</span></h1>
        <div class="bread-crumb">
            <ul class="clearfix">
                <li><a href="/">خانه</a></li>
                <li class="active">کوره پخت</li>
            </ul>
        </div>
    </div>
</section>

<section class="portfolio-section">
    <div class="auto-container">
        <div class="mixitup-gallery">

            <!-- Dynamic Filter Categories -->
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

            <!-- Dynamic Product List -->
            <div class="filter-list row clearfix">
                @foreach ($products as $product)
                <div class="portfolio-block mix category-{{ $product->category_id }} col-xl-4 col-lg-4 col-md-6 col-sm-12" data-category="{{ $product->category_id }}">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                        </div>
                        <div class="overlay">
                            <div class="more-link" onclick="openProductModal('{{ $product->name }}', '{{ $product->description }}')">
                                <i class="fa-solid fa-bars-staggered theme-btn"></i>
                            </div>
                            <div class="inner">
                                <div class="cat"><span>{{ $product->category->name }}</span></div>
                                <h5 id="prodoctName"><a href="#" class="text-light">{{ $product->name }}</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- The Modal -->
<div id="moreProductDtl" class="modal">
    <div class="modal-content">
        <span class="closeModal" onclick="closeModal()"><img src="/assets/images/icons/close-icon.png" alt=""></span>
        <button class="download-btn" onclick="startSpin(this)">
            <i class="fa-light fa-download download" id="download"></i>
            <div class="spinner"></div>
        </button>
        <h3 id="productNameModal"></h3>
        <p id="productDescriptionModal"></p>
    </div>
</div>

<script>
    function openProductModal(productName, productDescription) {
        document.getElementById('productNameModal').textContent = productName;
        document.getElementById('productDescriptionModal').textContent = productDescription;
        document.getElementById('moreProductDtl').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('moreProductDtl').style.display = 'none';
    }
</script>

@endsection

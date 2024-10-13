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
                            <div class="more-link" onclick="trackAndOpenModal({{ $product->id }}, '{{ $product->name }}', '{{ $product->description }}')">
                                <i class="fa-solid fa-bars-staggered"></i>
                            </div>
                            <div class="inner">
                                <div class="cat"><span>{{ $product->category->name }}</span></div>
                                <h5 id="productName"><a href="#">{{ $product->name }}</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p>محصولی یافت نشد.</p>
                @endforelse
            </div>
        </div>

        <!-- Product Modal -->
        <div id="moreProductDtl" class="modal" style="display: none;">
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

    </div>
</section>

<!-- Script for handling modal and tracking clicks -->
<script>
    function trackAndOpenModal(productId, productName, productDescription) {
        // Track the click
        fetch(`/products/${productId}/click`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure CSRF token is included
            },
            body: JSON.stringify({})
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Ensure response is JSON
        })
        .then(data => {
            console.log(data.message); // Success message
            // Open the modal with the product information
            document.getElementById('productNameModal').textContent = productName;
            document.getElementById('productDescriptionModal').textContent = productDescription;
            document.getElementById('moreProductDtl').style.display = 'block';
        })
        .catch(error => {
            console.error('Error tracking click:', error);
        });
    }

    function closeModal() {
        document.getElementById('moreProductDtl').style.display = 'none';
    }
</script>

@endsection

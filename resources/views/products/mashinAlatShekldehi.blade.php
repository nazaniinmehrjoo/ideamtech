@extends('layouts.app', ['title' => 'ماشین آلات شکل دهی و فرآوری'])

@section('content')

<!-- Page Title -->
<section class="page-title text-center" id="to-top-div">
    <div class="auto-container">
        <h1 class="text-light"><span>ماشین آلات شکل دهی و فرآوری</span></h1>
        <div class="bread-crumb">
            <ul>
                <li><a href="/" class="text-light">خانه</a></li>
                <li class="active">ماشین آلات شکل دهی و فرآوری</li>
            </ul>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
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
            <div class="filter-list notRegister row clearfix">
                @forelse ($products as $product)
                    <div class="portfolio-block mix category-{{ $product->category_id }} col-xl-4 col-lg-4 col-md-6 col-sm-12"
                        data-category="{{ $product->category_id }}">
                        <div class="card bg-dark text-white">
                            <div class="card-body inner-box p-0">
                                <div class="image">
                                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid"
                                        alt="{{ $product->name }}">
                                </div>
                                <div class="overlay">
                                    <div class="more-link"
                                        onclick="trackAndOpenModal({{ $product->id }}, '{{ $product->name }}', '{{ $product->description }}')">
                                        <i class="fa-solid fa-bars-staggered theme-btn"></i>
                                    </div>
                                    <div class="inner">
                                        <div class="cat"><span>{{ $product->category->name }}</span></div>
                                        <h5 id="productName"><a href="#" class="text-light">{{ $product->name }}</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-light">هیچ محصولی ثبت نشده است</p>
                @endforelse
            </div>
        </div>
</section>

<!-- Modal to show product details -->
<div id="moreProductDtl" class="modal" style="display: none;">
    <div class="modal-content bg-dark text-white">
        <span class="closeModal" onclick="closeModal()"><img src="/assets/images/icons/close-icon.png" alt=""></span>
        <button class="download-btn" onclick="startSpin(this)">
            <i class="fa-light fa-download download" id="download"></i>
            <div class="spinner"></div>
        </button>
        <h3 id="productNameModal" class="text-light"></h3>
        <p id="productDescriptionModal" class="text-light"></p>
    </div>
</div>


<!-- Script for handling modal and tracking clicks -->
<script>
    // Function to track click and open the modal
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

    // Function to close the modal
    function closeModal() {
        document.getElementById('moreProductDtl').style.display = 'none';
    }

    function startSpin(button) {
        // Add your spinning logic here if needed
    }
</script>

@endsection
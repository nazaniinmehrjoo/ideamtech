@extends('layouts.app', ['title' => 'ماشین‌آلات شکل‌دهی و فرآوری خاک | ماشین آلات  شکل دهی خاک'])

@section('content')
@section('meta_tags')
<meta name="description"
    content="
        {{ app()->getLocale() == 'fa' ?
    'برناگستر پارسی ارائه‌دهنده‌ی تخصصی ماشین‌آلات شکل‌دهی و فرآوری خاک  با کیفیت بالا و تکنولوژی پیشرفته.'
    :
    'Borna Gostar Parsi provides high-quality brick forming and processing machinery with advanced technology.' }}">
@endsection

<!-- Page Title -->
<section class="page-title text-center" id="to-top-div">
    <div class="auto-container">
        <h2 class="text-light"><span>{{ __('mashinAlatSheklDehi.title') }}</span></h2>
        <div class="bread-crumb">
            <ul>
                <li><a href="/" class="text-light">{{ __('mashinAlatSheklDehi.home') }}</a></li>
                <li class="active">{{ __('mashinAlatSheklDehi.title') }}</li>
            </ul>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="portfolio-section">
    <div class="auto-container">
        <div class="mixitup-gallery">

            <div class="gallery-filters centered clearfix">
                <ul class="filter-tabs filter-btns clearfix">
                    <li class="filter" data-filter="all">{{ __('mashinAlatSheklDehi.show_all') }}</li>
                    @foreach($categories as $category)
                        <li class="filter" data-filter=".category-{{ $category->id }}">
                            {{ $category->name[app()->getLocale()] ?? $category->name['en'] }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="filter-list row clearfix">
                @forelse ($products as $product)
                            <div class="portfolio-block mix category-{{ $product->category_id }} col-xl-4 col-lg-4 col-md-6 col-sm-12"
                                data-category="{{ $product->category_id }}">
                                <div class="card bg-dark text-white">
                                    <div class="card-body inner-box p-0">
                                        <div class="image">
                                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ app()->getLocale() == 'fa'
                    ? 'ماشین‌آلات شکل‌دهی آجر  ' . ($product->name['fa'] ?? $product->name['en'])
                    : 'Brick Forming Machine  ' . ($product->name['en'] ?? $product->name['fa']) }}">

                                        </div>
                                        <div class="overlay">
                                            <div class="more-link"
                                                onclick="trackAndOpenModal({{ $product->id }}, '{{ $product->name[app()->getLocale()] ?? $product->name['en'] }}', '{{ $product->description[app()->getLocale()] ?? $product->description['en'] }}')">
                                                <i class="fa-solid fa-bars-staggered theme-btn"></i>
                                            </div>
                                            <div class="inner">
                                                <div class="cat">
                                                    <span>{{ $product->category->name[app()->getLocale()] ?? $product->category->name['en'] }}</span>
                                                </div>
                                                <h5 id="productName"><a href="#"
                                                        class="text-light">{{ $product->name[app()->getLocale()] ?? $product->name['en'] }}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                @empty
                    <div class="notRegister">
                        <p class="text-light text-center">{{ __('mashinAlatSheklDehi.no_products') }}</p>
                    </div>
                @endforelse
            </div>
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
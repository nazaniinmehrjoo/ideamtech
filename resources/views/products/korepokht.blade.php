@extends('layouts.app', ['title' => __('khoorpokht.title')])

@section('content')
<!-- Page Title -->
<section class="page-title" id="to-top-div">
    <div class="auto-container">
        <h1><span>{{ __('khoorpokht.title') }}</span></h1>
        <div class="bread-crumb">
            <ul class="clearfix">
                <li><a href="/">{{ __('khoorpokht.home') }}</a></li>
                <li class="active">{{ __('khoorpokht.title') }}</li>
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
                    <li class="filter" data-filter="all">{{ __('khoorpokht.show_all') }}</li>
                    @foreach($categories as $category)
                    <li class="filter" data-filter=".category-{{ $category->id }}">
                        {{ $category->name[app()->getLocale()] ?? $category->name['en'] }}
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
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name[app()->getLocale()] ?? $product->name['en'] }}">
                        </div>
                        <div class="overlay">
                            <div class="more-link" onclick="trackAndOpenModal({{ $product->id }}, '{{ $product->name[app()->getLocale()] ?? $product->name['en'] }}', '{{ $product->description[app()->getLocale()] ?? $product->description['en'] }}')">
                                <i class="fa-solid fa-bars-staggered theme-btn"></i>
                            </div>
                            <div class="inner">
                                <div class="cat"><span>{{ $product->category->name[app()->getLocale()] ?? $product->category->name['en'] }}</span></div>
                                <h5 id="prodoctName"><a href="#" class="text-light">{{ $product->name[app()->getLocale()] ?? $product->name['en'] }}</a></h5>
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

<script>
    // Function to track click and open the modal
    function trackAndOpenModal(productId, productName, productDescription) {
        // Track the click
        fetch(`/products/${productId}/click`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' 
            },
            body: JSON.stringify({})
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); 
        })
        .then(data => {
            console.log(data.message); 

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
</script>
@endsection

@extends('layouts.app', ['title' => 'ماشین آلات شکل دهی و فرآوری'])

@section('content')
<div class="container-fluid bg-dark text-white py-5">
    <!-- Page Title -->
    <section class="page-title text-center" id="to-top-div">
        <div class="auto-container">
            <h1 class="text-light"><span>ماشین آلات شکل دهی و فرآوری</span></h1>
            <div class="bread-crumb">
                <ul class="breadcrumb bg-dark text-light justify-content-center">
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
                        <!-- "Show All" Option -->
                        <li class="filter" data-role="button">
                            <a href="{{ route('products.mashinAlatShekldehi', ['category' => 'all']) }}" class="{{ $selectedCategory == 'all' ? 'active' : '' }}">نمایش همه</a>
                        </li>

                        <!-- Loop through categories from the database -->
                        @foreach($categories as $category)
                            <li class="filter" data-role="button">
                                <a href="{{ route('products.mashinAlatShekldehi', ['category' => $category->id]) }}" class="{{ $selectedCategory == $category->id ? 'active' : '' }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Dynamic Product List -->
                <div class="filter-list row clearfix">
                    @forelse ($products as $product)
                    <div class="portfolio-block mix all {{ Str::slug($product->category->name) }} col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="card bg-dark text-white">
                            <div class="card-body p-0">
                                <div class="image">
                                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                                </div>
                                <div class="overlay">
                                    <div class="more-link" onclick="openProductModal('{{ $product->name }}', '{{ $product->description }}')">
                                        <i class="fa-solid fa-bars-staggered theme-btn"></i>
                                    </div>
                                    <div class="inner">
                                        <div class="cat"><span>{{ $product->category->name }}</span></div>
                                        <h5 id="productName"><a href="#" class="text-light">{{ $product->name }}</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-light">هیچ محصولی ثبت نشده است.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- Modal to show product details -->
    <div id="moreProductDtl" class="modal">
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

</div>

<!--End Site Container-->


<script>
    function openProductModal(productName, productDescription) {
        document.getElementById('productNameModal').textContent = productName;
        document.getElementById('productDescriptionModal').textContent = productDescription;
        document.getElementById('moreProductDtl').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('moreProductDtl').style.display = 'none';
    }

    function startSpin(button) {
        
    }
</script>
@endsection

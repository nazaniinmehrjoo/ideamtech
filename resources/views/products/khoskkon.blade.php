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

<section class="portfolio-section" style="direction:rtl">
    <div class="auto-container">
        <div class="mixitup-gallery">
            <!-- Filter Section -->
            <div class="gallery-filters centered clearfix">
                <ul class="filter-tabs filter-btns clearfix">
                    <li class="filter" data-filter="all" onclick="showProductList()">نمایش همه</li>
                    @foreach($categories as $category)
                        <li class="filter" data-filter=".category-{{ $category->id }}" onclick="showProductList()">
                            {{ $category->name }}
                        </li>
                    @endforeach
                    <li class="filter" onclick="showComparisonChart()">مقایسه خشک کن ها</li>
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

            <!-- Comparison Chart Container -->
            <div id="comparisonChartContainer" style="display: none; width: 80%; max-width: 700px; margin: 30px auto;">
                <div class="chart-box" style="background: #444; border-radius: 8px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <h4 style="text-align: center; color: #ffffff; margin-bottom: 15px;">نمودار مقایسه‌ای خشک کن‌ها</h4>
                    <div style="width: 100%; margin: auto;">
                        <canvas id="radarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Chart Script -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
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
    document.addEventListener("DOMContentLoaded", function() {
        const labels = {!! json_encode($criteriaLabels) !!};
        const datasets = {!! json_encode($productDatasets) !!};

        console.log("Labels:", labels);
        console.log("Datasets:", datasets);

        if (labels.length && datasets.length) {
            const ctx = document.getElementById('radarChart').getContext('2d');

            new Chart(ctx, {
                type: 'radar',
                data: { 
                    labels: labels, 
                    datasets: datasets
                },
                options: {
                    scales: {
                        r: {
                            beginAtZero: true,
                            ticks: {
                                color: '#ffffff',
                                backdropColor: 'transparent',
                                stepSize: 5000,
                                max: 20000,
                                maxTicksLimit: 5
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.2)'
                            },
                            angleLines: {
                                color: 'rgba(255, 255, 255, 0.5)'
                            },
                            pointLabels: {
                                color: '#ffffff',
                                font: { size: 10 }
                            },
                            pointRadius: 4
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'right',
                            labels: {
                                color: '#ffffff',
                                font: { size: 14 }
                            }
                        }
                    }
                }
            });
        } else {
            console.error("Chart data is missing or empty.");
        }
    });

    // Function to show the comparison chart and hide the product list
    function showComparisonChart() {
        document.getElementById('product-list').style.display = 'none';
        document.getElementById('comparisonChartContainer').style.display = 'block';
    }

    // Function to show the product list and hide the comparison chart
    function showProductList() {
        document.getElementById('comparisonChartContainer').style.display = 'none';
        document.getElementById('product-list').style.display = 'flex';
    }
</script>
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
</script>

@endsection

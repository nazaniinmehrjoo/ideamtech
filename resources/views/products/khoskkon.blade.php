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

<section class="portfolio-section" style="direction:rtl;">
    <div class="auto-container">
        <div class="mixitup-gallery">
            <!-- Filter Section -->
            <div class="gallery-filters centered clearfix">
                <ul class="filter-tabs filter-btns clearfix" style="color: #ffffff;">
                    <li class="filter" data-filter="all" onclick="showProductList('all')" style="color: #ffffff;">نمایش
                        همه</li>
                    @foreach($categories as $category)
                        <li class="filter" data-filter=".category-{{ $category->id }}"
                            onclick="showProductList({{ $category->id }})" style="color: #ffffff;">
                            {{ $category->name }}
                        </li>
                    @endforeach
                    <li class="filter" onclick="showComparisonChart()" style="color: #ffffff;">مقایسه خشک کن ها</li>
                </ul>
            </div>

            <!-- Description Box -->
            <div id="categoryDescriptionBox" style="display: none; background: #444; padding: 10px; margin: 20px 0; color: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
                <p id="descriptionContent"></p>
            </div>

            <!-- Product List -->
            <div class="filter-list row clearfix" id="product-list">
                @forelse($products as $product)
                    <div class="portfolio-block mix category-{{ $product->category_id }} col-xl-4 col-lg-4 col-md-6 col-sm-12"
                        data-category="{{ $product->category_id }}">
                        <div class="inner-box"
                            style="background-color: #2b2b2b; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);">
                            <div class="image">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    style="border-radius: 8px 8px 0 0;">
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
                @empty
                    <p style="color: #ffffff;">محصولی یافت نشد.</p>
                @endforelse
            </div>

            <!-- Comparison Chart Container -->
            <div id="comparisonChartContainer" class="khoshkkonChartContainer" style="display: none; width: 80%; max-width: 700px; margin: 30px auto;">
                <div class="chart-box"
                    style="background: #444; border-radius: 8px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
                    <h4 class="khoshkkonChart" style="text-align: center; color: #ffffff; margin-bottom: 15px;">نمودار مقایسه‌ای خشک کن‌ها</h4>
                    <div style="width: 100%; margin: auto;">
                        <canvas id="radarChart"></canvas>
                    </div>
                </div>
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

<script>
    // Category descriptions mapped by category ID
    const categoryDescriptions = {!! json_encode($categories->pluck('description', 'id')) !!};

    // Function to update static text and show product list based on selected category
    function showProductList(categoryId) {
        document.getElementById('comparisonChartContainer').style.display = 'none';
        document.getElementById('product-list').style.display = 'flex';

        const descriptionBox = document.getElementById('categoryDescriptionBox');
        const descriptionContent = document.getElementById('descriptionContent');

        if (categoryDescriptions[categoryId]) {
            descriptionContent.textContent = categoryDescriptions[categoryId];
            descriptionBox.style.display = 'block';
        } else {
            descriptionBox.style.display = 'none';
        }
    }

    // Function to show the comparison chart and hide the product list
    function showComparisonChart() {
        document.getElementById('product-list').style.display = 'none';
        document.getElementById('comparisonChartContainer').style.display = 'block';
        document.getElementById('categoryDescriptionBox').style.display = 'none';
    }

    document.addEventListener("DOMContentLoaded", function () {
        showProductList('all'); 
    });
</script>
<script>
    // Chart setup
    document.addEventListener("DOMContentLoaded", function () {
        const labels = {!! json_encode($criteriaLabels) !!};
        const datasets = {!! json_encode($categoryDatasets) !!};

    console.log("Labels:", labels);
    console.log("Datasets:", datasets);

    if (labels.length && datasets.length) {
        const ctx = document.getElementById('radarChart').getContext('2d');

        const chartOptions = {
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
        };

        function updateLegendPosition() {
            if (window.innerWidth <= 767) { 
                chartOptions.options.plugins.legend.position = 'top';
            } else {
                chartOptions.options.plugins.legend.position = 'right';
            }
        }

        updateLegendPosition();
        window.addEventListener('resize', updateLegendPosition);

        new Chart(ctx, chartOptions);
    } else {
        console.error("Chart data is missing or empty.");
    }
});


    // Function to show the comparison chart and hide the product list
    function showComparisonChart() {
        document.getElementById('product-list').style.display = 'none';
        document.getElementById('comparisonChartContainer').style.display = 'block';
        document.getElementById('staticTextBox').style.display = 'none';
    }
</script>

<script>
    // Function to track click and open the modal
    function trackAndOpenModal(productId, productName, productDescription) {
        fetch(`/products/${productId}/click`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' 
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message);
            document.getElementById('productNameModal').textContent = productName;
            document.getElementById('productDescriptionModal').textContent = productDescription;
            document.getElementById('moreProductDtl').style.display = 'block';
        })
        .catch(error => console.error('Error tracking click:', error));
    }

    function closeModal() {
        document.getElementById('moreProductDtl').style.display = 'none';
    }

    function startSpin(button) {
        // Add your spinning logic here if needed
    }
</script>
</script>
@endsection

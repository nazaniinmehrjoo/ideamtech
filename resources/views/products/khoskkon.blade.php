@extends('layouts.app', ['title' => __('خشک کن')])

@section('content')

<!-- Page Title -->
<section class="page-title" id="to-top-div">
    <div class="auto-container">
        <h1><span>{{ __('khoskkon.dryer') }}</span></h1>
        <div class="bread-crumb">
            <ul class="clearfix">
                <li><a href="/">{{ __('khoskkon.home') }}</a></li>
                <li class="active">{{ __('khoskkon.dryer') }}</li>
            </ul>
        </div>
    </div>
</section>

<section class="portfolio-section" style="direction: rtl;">
    <div class="auto-container">
        <div class="mixitup-gallery">
            <!-- Filter Section -->
            <button class="compare-button" onclick="showComparisonChart()" style="color: #ffffff;">
            {{ __('khoskkon.compare_dryers') }}
            </button>

            <div class="gallery-filters centered clearfix">
                <ul class="filter-tabs filter-btns clearfix" style="color: #ffffff;">
                    <li class="filter" data-filter="all" onclick="showCategoryList('all')" style="color: #ffffff;">
                    {{ __('khoskkon.show_all') }}
                    </li>
                    @foreach($categories as $category)
                        <li class="filter" data-filter=".category-{{ $category->id }}"
                            onclick="showCategoryList({{ $category->id }})" style="color: #ffffff;">
                            {{ $category->name[app()->getLocale()] ?? $category->name['en'] }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Description Box -->
            <div id="categoryDescriptionBox" class="categoryDescriptionBox" style="margin-bottom: 20px; display: none;">
                <p id="descriptionContent" class="text-light"></p>
            </div>

            <!-- Product List -->
            <div id="category-list" class="filter-list row clearfix">
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
                                    <div class="cat">
                                        <span>{{ $product->category->name[app()->getLocale()] ?? $product->category->name['en'] }}</span>
                                    </div>
                                    <h5 id="productName">
                                        <a href="#" class="text-light">{{ $product->name[app()->getLocale()] ?? $product->name['en'] }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Comparison Chart Container -->
            <div id="comparisonChartContainer" class="chart-container" style="display: none; width: 80%; max-width: 700px; margin: 30px auto;">
                <div class="chart-box">
                <h4 class="chart-title">{{ __('khoskkon.compare_chart_title') }}</h4>
                <div style="width: 100%; margin: auto;">
                        <canvas id="radarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Category descriptions mapped by category ID
    const categoryDescriptions = {!! json_encode($categories->pluck('description', 'id')->toArray(), JSON_UNESCAPED_UNICODE) !!};

    // Function to update static text and show category list based on selected category
    function showCategoryList(categoryId) {
        const descriptionBox = document.getElementById('categoryDescriptionBox');
        const descriptionContent = document.getElementById('descriptionContent');
        const categoryList = document.getElementById('category-list');
        const comparisonChartContainer = document.getElementById('comparisonChartContainer');

        // Hide chart and show product list
        comparisonChartContainer.style.display = 'none';
        categoryList.style.display = 'flex';

        // Update description
        if (categoryId === 'all') {
            descriptionBox.style.display = 'none';
        } else if (categoryDescriptions[categoryId]) {
            descriptionContent.textContent = categoryDescriptions[categoryId];
            descriptionBox.style.display = 'block';
        } else {
            descriptionContent.textContent = '{{ __('هیچ توضیحی برای این دسته‌بندی وجود ندارد.') }}';
            descriptionBox.style.display = 'block';
        }
    }

    // Function to show the comparison chart and hide the category list
    function showComparisonChart() {
        document.getElementById('category-list').style.display = 'none';
        document.getElementById('comparisonChartContainer').style.display = 'block';
        document.getElementById('categoryDescriptionBox').style.display = 'none';
    }

    // Initialize with all categories
    document.addEventListener("DOMContentLoaded", function () {
        showCategoryList('all');
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const labels = {!! json_encode($criteriaLabels, JSON_UNESCAPED_UNICODE) !!};
        const datasets = {!! json_encode($categoryDatasets, JSON_UNESCAPED_UNICODE) !!};

        if (labels.length && datasets.length) {
            const ctx = document.getElementById('radarChart').getContext('2d');

            const chartOptions = {
                type: 'radar',
                data: {
                    labels: labels,
                    datasets: datasets,
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
                                maxTicksLimit: 5,
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.2)',
                            },
                            angleLines: {
                                color: 'rgba(255, 255, 255, 0.5)',
                            },
                            pointLabels: {
                                color: '#ffffff',
                                font: { size: 10 },
                            },
                            pointRadius: 4,
                        },
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'right',
                            labels: {
                                color: '#ffffff',
                                font: { size: 14 },
                            },
                        },
                    },
                },
            };

            new Chart(ctx, chartOptions);
        } else {
            console.error("Chart data is missing or empty.");
        }
    });
</script>

@endsection

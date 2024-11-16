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

            <!-- Static Text Box -->
            <div class="static-text-box" id="staticTextBox"
                style="padding: 20px; margin: 20px 0; background: #333; border-radius: 8px; text-align: center; display: none; color: #ffffff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
                <p id="staticTextContent" style="margin: 0; font-size: 16px;"></p>
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
            <div id="comparisonChartContainer" style="display: none; width: 80%; max-width: 700px; margin: 30px auto;">
                <div class="chart-box"
                    style="background: #444; border-radius: 8px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
                    <h4 style="text-align: center; color: #ffffff; margin-bottom: 15px;">نمودار مقایسه‌ای خشک کن‌ها</h4>
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
    // Static text data for each category
    const categoryTexts = {
        1: " لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیازلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز",
        2: "لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز",
        3: "لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز",
        4: "لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز",
        // Add or modify texts for each category ID here as needed
    };

    // Function to update static text and show product list based on selected category
    function showProductList(categoryId) {
        document.getElementById('comparisonChartContainer').style.display = 'none';
        document.getElementById('product-list').style.display = 'flex';

        // Get references to static text elements
        const staticTextBox = document.getElementById('staticTextBox');
        const staticTextContent = document.getElementById('staticTextContent');

        // Check if a specific category was selected, and update or hide the static text box accordingly
        if (categoryId in categoryTexts) {
            staticTextContent.textContent = categoryTexts[categoryId];
            staticTextBox.style.display = 'block'; // Show the static text box for specific categories
        } else {
            staticTextBox.style.display = 'none'; // Hide the static text box when "نمایش همه" is selected
        }
    }

    // Chart setup
    document.addEventListener("DOMContentLoaded", function () {
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

        // Hide the static text box when showing the comparison chart
        document.getElementById('staticTextBox').style.display = 'none';
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

    function startSpin(button) {
        // Add your spinning logic here if needed
    }
</script>
@endsection
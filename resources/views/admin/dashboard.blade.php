@extends('layouts.app2')
@section('content')
<div class="container main-content">
  <!-- Dashboard Header -->
  <div class="dashboard-header">
    <h2 class="text-light">داشبورد مدیریت</h2>
    <p class="lead text-secondary">
      به پنل مدیریت خوش آمدید. اینجا می‌توانید محصولات، دسته‌بندی‌ها، سرویس، پروژه‌ها و بلاگ‌ها را مدیریت کنید.
    </p>
  </div>

  <!-- Dashboard Grid -->
  <div class="dashboard-grid">
    
    <!-- Products Management Card -->
    <div class="dashboard-card shadow-lg">
      <div class="card-icon">
        <i class="fas fa-box"></i>
      </div>
      <h3>مدیریت محصولات</h3>
      <p>افزودن، ویرایش و حذف محصولات  شما.</p>
      <div class="action-btns">
        <!-- Icons for CRUD actions -->
        <a href="{{ route('products.create') }}" class="btn btn-outline-light"><i class="fas fa-plus"></i></a>
        <a href="{{ route('products.index') }}" class="btn btn-outline-light"><i class="fas fa-eye"></i></a>
        @if(isset($mostClickedProducts) && $mostClickedProducts->isNotEmpty())
          @foreach ($mostClickedProducts as $product)
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-light"><i class="fas fa-edit"></i></a>
          @endforeach
        @else
          <p>هیچ محصولی برای نمایش وجود ندارد.</p>
        @endif
      </div>
    </div>

    <!-- Categories Management Card -->
    <div class="dashboard-card shadow-lg">
      <div class="card-icon">
        <i class="fas fa-tags"></i>
      </div>
      <h3>مدیریت دسته‌بندی‌ها</h3>
      <p>افزودن، ویرایش و حذف دسته‌بندی محصولات و مقالات.</p>
      <div class="action-btns">
        <a href="{{ route('categories.create') }}" class="btn btn-outline-light"><i class="fas fa-plus"></i></a>
        <a href="{{ route('categories.index') }}" class="btn btn-outline-light"><i class="fas fa-eye"></i></a>
        @if(isset($categories) && $categories->isNotEmpty())
          @foreach ($categories as $category)
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-light"><i class="fas fa-edit"></i></a>
          @endforeach
        @else
          <!-- <p>هیچ دسته‌بندی‌ای برای نمایش وجود ندارد.</p> -->
        @endif
      </div>
    </div>

    <!-- Services Management Card -->
    <div class="dashboard-card shadow-lg">
      <div class="card-icon">
        <i class="fas fa-concierge-bell"></i>
      </div>
      <h3>مدیریت سرویس</h3>
      <p>افزودن، ویرایش و حذف سرویس ارائه‌شده به مشتریان.</p>
      <div class="action-btns">
        <a href="{{ route('services.create') }}" class="btn btn-outline-light"><i class="fas fa-plus"></i></a>
        <a href="{{ route('services.index') }}" class="btn btn-outline-light"><i class="fas fa-eye"></i></a>
        @if(isset($services) && $services->isNotEmpty())
          @foreach ($services as $service)
            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-outline-light"><i class="fas fa-edit"></i></a>
          @endforeach
        @else
          <!-- <p>هیچ سرویسی برای نمایش وجود ندارد.</p> -->
        @endif
      </div>
    </div>

    <!-- Projects Management Card -->
    <div class="dashboard-card shadow-lg">
      <div class="card-icon">
        <i class="fas fa-project-diagram"></i>
      </div>
      <h3>مدیریت پروژه‌ها</h3>
      <p>مدیریت پروژه‌های در حال انجام و انجام شده.</p>
      <div class="action-btns">
        <a href="{{ route('projects.create') }}" class="btn btn-outline-light"><i class="fas fa-plus"></i></a>
        <a href="{{ route('projects.index') }}" class="btn btn-outline-light"><i class="fas fa-eye"></i></a>
        @if(isset($projects) && $projects->isNotEmpty())
          @foreach ($projects as $project)
            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-light"><i class="fas fa-edit"></i></a>
          @endforeach
        @else
          <!-- <p>هیچ پروژه‌ای برای نمایش وجود ندارد.</p> -->
        @endif
      </div>
    </div>

    <!-- Blog Posts Management Card -->
    <div class="dashboard-card shadow-lg">
      <div class="card-icon">
        <i class="fas fa-blog"></i>
      </div>
      <h3>مدیریت مقالات</h3>
      <p>مدیریت و انتشار مقالات جدید در وبلاگ.</p>
      <div class="action-btns">
        <a href="{{ route('blog.create') }}" class="btn btn-outline-light"><i class="fas fa-plus"></i></a>
        <a href="{{ route('blog.index') }}" class="btn btn-outline-light"><i class="fas fa-eye"></i></a>
        @if(isset($posts) && $posts->isNotEmpty())
          @foreach ($posts as $post)
            <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-outline-light"><i class="fas fa-edit"></i></a>
          @endforeach
        @else
          <p>هیچ مقاله‌ای برای نمایش وجود ندارد.</p>
        @endif
      </div>
    </div>

    <!-- Most Clicked Products Chart Card -->
    <div class="dashboard-card shadow-lg">
      <div class="card-icon">
        <i class="fas fa-chart-bar"></i>
      </div>
      <h3>نمودار محصولات با بیشترین کلیک</h3>
      <p>نمایش محصولاتی که بیشترین کلیک را در طول ماه‌های مختلف داشته‌اند.</p>

      <div class="chart-container mt-4">
        <h5>بیشترین کلیک‌ها</h5>
        <canvas id="mostClickedProductsChart"></canvas>
      </div>

      <!-- Include Chart.js -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      <script>
        var mostClickedProducts = @json($mostClickedProducts);

        var productNames = mostClickedProducts.map(product => product.name); // Extract product names
        var productClicks = mostClickedProducts.map(product => product.clicks); // Extract click counts

        var ctx1 = document.getElementById('mostClickedProductsChart').getContext('2d');
        var mostClickedProductsChart = new Chart(ctx1, {
          type: 'bar',
          data: {
            labels: productNames, // Show product names
            datasets: [{
              label: 'تعداد کلیک',
              data: productClicks, // Show product click counts
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true,
                title: {
                  display: true,
                  text: 'تعداد کلیک'
                }
              },
              x: {
                title: {
                  display: true,
                  text: 'نام محصولات'
                }
              }
            }
          }
        });
      </script>
    </div>

    <!-- User Visits and Time Spent Chart Card -->
    <div class="dashboard-card shadow-lg">
        <div class="card-icon">
            <i class="fas fa-globe"></i>
        </div>
        <h3>بازدیدها و زمان سپری‌شده به تفکیک کشور</h3>
        <p>مشاهده تعداد بازدید و زمان سپری‌شده کاربران به تفکیک کشور.</p>

        @if(isset($visitsData) && $visitsData->isNotEmpty())
            <div class="chart-container mt-4">
                <h5>بازدیدها به تفکیک کشور</h5>
                <canvas id="countryVisitsChart"></canvas>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                var visitsData = @json($visitsData);  // Get visits data from the controller

                var countries = visitsData.map(data => data.country);  // Extract country names
                var visitCounts = visitsData.map(data => data.visit_count);  // Extract visit counts
                var totalTimeSpent = visitsData.map(data => data.total_time);  // Extract total time spent

                var ctx2 = document.getElementById('countryVisitsChart').getContext('2d');
                var countryVisitsChart = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: countries,
                        datasets: [{
                            label: 'تعداد بازدید',
                            data: visitCounts,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }, {
                            label: 'زمان سپری‌شده (ثانیه)',
                            data: totalTimeSpent,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'تعداد بازدید / زمان سپری‌شده'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'کشورها'
                                }
                            }
                        }
                    }
                });
            </script>
        @else
            <p>در حال حاضر اطلاعاتی برای نمایش وجود ندارد.</p>
        @endif
    </div>

<script>
    let pageLoadTime = performance.now();  

    window.addEventListener('beforeunload', function() {
        let pageCloseTime = performance.now();
        let timeSpent = (pageCloseTime - pageLoadTime) / 1000;  // Time spent in seconds

        // Send this data to the server using fetch
        fetch('/track-time-spent', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ timeSpent: timeSpent }) 
        });
    });
</script>

  </div>
</div>
@endsection

@extends('layouts.app2')
@section('content')
<div class="container main-content">
  <!-- Dashboard Header -->
  <div class="dashboard-header text-center">
    <h2 class="text-light mb-3">داشبورد مدیریت</h2>

    <p>دانلود راهنمای داشبورد مدیریت</p>
    <button class="download-btn" onclick="startSpin(this, '/assets/documents/adminDashboard.pdf')">
      <i class="fa-light fa-download download" id="download"></i>
      <div class="spinner"></div>
    </button>
  </div>

  <!-- Dashboard Grid -->
  <div class="dashboard-grid">

    <!-- Minimal Card Template -->
    @php
    $sections = [
      ['icon' => 'fa-tags', 'title' => 'دسته‌بندی‌ها', 'route_create' => 'categories.create', 'route_index' => 'categories.index'],
      ['icon' => 'fa-box', 'title' => 'محصولات', 'route_create' => 'products.create', 'route_index' => 'products.index'],
      ['icon' => 'fa-concierge-bell', 'title' => 'خدمات', 'route_create' => 'services.create', 'route_index' => 'services.index'],
      ['icon' => 'fa-project-diagram', 'title' => 'پروژه‌ها', 'route_create' => 'projects.create', 'route_index' => 'projects.index'],
      ['icon' => 'fa-blog', 'title' => 'مقالات', 'route_create' => 'blog.create', 'route_index' => 'blog.index'],
      ['icon' => 'fa-user-tie', 'title' => 'فرم‌های استخدام', 'route_index' => 'employment-forms.index'],
      ['icon' => 'fa-handshake', 'title' => 'فرم‌های همکاری', 'route_index' => 'cooperations.index'],
    ];
  @endphp



    @foreach ($sections as $section)


    <div class="adminDashboardBoxes service-block col-xl-12 col-lg-12 col-md-12 col-sm-12">
      <div class="inner-box">
      <div class="inner">
        <div class="icon-box"> <span class="fas {{ $section['icon'] }}"></span></div>
        <h5>{{ $section['title'] }}</h5>
        <div class="text">

        </div>
        <div class="action-btns d-flex justify-content-center gap-2">
        @isset($section['route_create'])
      <a href="{{ route($section['route_create']) }}" class="btn dashboardBtn btn-sm" title="ایجاد جدید">
        <i class="fas fa-plus"></i>
      </a>
    @endisset
        <a href="{{ route($section['route_index']) }}" class="btn dashboardBtn btn-sm" title="مشاهده">
          <i class="fas fa-eye"></i>
        </a>
        </div>
      </div>
      </div>
    </div>
  @endforeach

    <!-- Minimal Card for Charts -->
    <div class="adminDashboardBoxes service-block">
      <div class="inner-box">
        <div class="inner">
          <div class="icon-box"> <span class="fas fa-chart-bar"></span></div>
          <h5>نمودار محصولات</h5>

        </div>
        <div class="chart-container">
          <canvas id="mostClickedProductsChart"></canvas>
        </div>
      </div>
    </div>

    <div class="adminDashboardBoxes service-block">
      <div class="inner-box">
        <div class="inner">
          <div class="icon-box"><span class="fas fa-globe"></span></div>
          <h5>بازدید و زمان سپری‌شده</h5>

        </div>
        <div class="chart-container">
          <canvas id="countryVisitsChart"></canvas>
        </div>
      </div>
    </div>

    <!-- JavaScript for Charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      // Most Clicked Products Chart
      var mostClickedProducts = @json($mostClickedProducts);
      var productNames = mostClickedProducts.map(product => product.name);
      var productClicks = mostClickedProducts.map(product => product.clicks);
      new Chart(document.getElementById('mostClickedProductsChart').getContext('2d'), {
        type: 'bar',
        data: {
          labels: productNames,
          datasets: [{ label: 'کلیک‌ها', data: productClicks, backgroundColor: 'rgba(75, 192, 192, 0.5)' }]
        },
        options: { plugins: { legend: { display: false } } }
      });

      // Visits by Country Chart
      var visitsData = @json($visitsData);
      var countries = visitsData.map(data => data.country);
      var visitCounts = visitsData.map(data => data.visit_count);
      new Chart(document.getElementById('countryVisitsChart').getContext('2d'), {
        type: 'bar',
        data: {
          labels: countries,
          datasets: [{ label: 'بازدیدها', data: visitCounts, backgroundColor: 'rgba(54, 162, 235, 0.5)' }]
        },
        options: { plugins: { legend: { display: false } } }
      });
    </script>

  </div>
</div>
@endsection
@extends('layouts.app2')
@section('content')
<div class="container main-content">
  <!-- Dashboard Header -->
  <div class="dashboard-header text-center">
    <h2 class="text-light mb-3">{{ __('dashboard.title') }}</h2>
    <p>{{ __('dashboard.download_guide') }}</p>
    <button class="download-btn" onclick="startSpin(this, '/assets/documents/adminDashboard.pdf')">
      <i class="fa-light fa-download download" id="download"></i>
      <div class="spinner"></div>
    </button>
  </div>

  <!-- Dashboard Grid -->
  <div class="dashboard-grid">

    @php
    $sections = [
      [
      'icon' => 'fa-tags',
      'title' => __('dashboard.sections.categories'),
      'route_create' => 'categories.create', // Route name only
      'route_index' => 'categories.index',  // Route name only
      ],
      [
      'icon' => 'fa-box',
      'title' => __('dashboard.sections.products'),
      'route_create' => 'products.create',
      'route_index' => 'products.index',
      ],
      [
      'icon' => 'fa-concierge-bell',
      'title' => __('dashboard.sections.services'),
      'route_create' => 'services.create',
      'route_index' => 'services.index',
      ],
      [
      'icon' => 'fa-project-diagram',
      'title' => __('dashboard.sections.projects'),
      'route_create' => 'projects.create',
      'route_index' => 'projects.index',
      ],
      [
      'icon' => 'fa-blog',
      'title' => __('dashboard.sections.articles'),
      'route_create' => 'blog.create',
      'route_index' => 'blog.index',
      ],
      [
      'icon' => 'fa-user-tie',
      'title' => __('dashboard.sections.employment_forms'),
      'route_index' => 'employment-forms.index',
      ],
      [
      'icon' => 'fa-handshake',
      'title' => __('dashboard.sections.cooperation_forms'),
      'route_index' => 'cooperations.index',
      ],
    ];
  @endphp

    @foreach ($sections as $section)
    <div class="adminDashboardBoxes service-block col-xl-12 col-lg-12 col-md-12 col-sm-12">
      <div class="inner-box">
      <div class="inner">
        <div class="icon-box"><span class="fas {{ $section['icon'] }}"></span></div>
        <h5>{{ $section['title'] }}</h5>
        <div class="text">
            <p></p>
        </div>
        <div class="action-btns d-flex justify-content-center gap-2">
        @isset($section['route_create'])
      <a href="{{ route($section['route_create'], ['locale' => app()->getLocale()]) }}"
        class="btn dashboardBtn btn-sm" title="{{ __('dashboard.create_new') }}">
        <i class="fas fa-plus"></i>
      </a>
    @endisset
        <a href="{{ route($section['route_index'], ['locale' => app()->getLocale()]) }}"
          class="btn dashboardBtn btn-sm" title="{{ __('dashboard.view') }}">
          <i class="fas fa-eye"></i>
        </a>
        </div>
      </div>
      </div>
    </div>
  @endforeach

    <!-- Charts -->
    <div class="adminDashboardBoxes service-block">
      <div class="inner-box">
        <div class="inner">
          <div class="icon-box"><span class="fas fa-chart-bar"></span></div>
          <h5>{{ __('dashboard.most_clicked_products') }}</h5>
          <div class="text">
            <p></p>
          </div>
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
          <h5>{{ __('dashboard.country_visits') }}</h5>
          <div class="text">
            <p></p>
          </div>
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
          datasets: [{ label: '{{ __("dashboard.clicks") }}', data: productClicks, backgroundColor: 'rgba(75, 192, 192, 0.5)' }]
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
          datasets: [{ label: '{{ __("dashboard.visits") }}', data: visitCounts, backgroundColor: 'rgba(54, 162, 235, 0.5)' }]
        },
        options: { plugins: { legend: { display: false } } }
      });
    </script>

  </div>
</div>
@endsection
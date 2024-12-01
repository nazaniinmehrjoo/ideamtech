@extends('layouts.app')

@section('content')
<div class="container" style="padding: 3%;">
    <div class="row justify-content-center">
        <div class="col-md-10" style="direction: rtl;">
            <!-- Main Box Container -->
            <div class="card bg-dark text-white p-4">
                <h3 class="text-center text-white mb-4">دسته بندی‌ها</h3>

                <!-- Success and Error Messages -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Button to create a new category -->
                <div class="text-center mb-4">
                    <a href="{{ route('categories.create') }}" class="theme-btn btn-style-two">ایجاد دسته بندی جدید</a>
                </div>

                <!-- Tabs for Switching Between Categories -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{ $filter === 'khoskkon' ? 'active' : '' }}"
                            href="{{ route('categories.index', ['filter' => 'khoskkon']) }}">خشک کن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $filter === 'korepokht' ? 'active' : '' }}"
                            href="{{ route('categories.index', ['filter' => 'korepokht']) }}">کوره پخت</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $filter === 'mashinAlatShekldehi' ? 'active' : '' }}"
                            href="{{ route('categories.index', ['filter' => 'mashinAlatShekldehi']) }}">ماشین آلات شکل
                            دهی</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $filter === 'mashinalatvatajhizat' ? 'active' : '' }}"
                            href="{{ route('categories.index', ['filter' => 'mashinalatvatajhizat']) }}">ماشین آلات و
                            تجهیزات</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content mt-4">
                    @if ($filter === 'khoskkon')
                        <!-- Khoskkon Chart Section -->
                        <div class="mb-4">
                            <h4 class="text-center text-white">نمودار مقایسه‌ای خشک کن‌ها</h4>
                            <div style="width: 100%; max-width: 700px; margin: 0 auto;">
                                <canvas id="khoskkonChart"></canvas>
                            </div>
                        </div>
                    @endif

                    <!-- Category Section -->
                    <div class="row mb-4">
                        @if($categories->count() > 0)
                            @foreach($categories as $category)
                                <div class="col-md-4 mb-4">
                                    <div class="card bg-dark text-white h-100">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title text-end" style="direction: rtl;">
                                                {{ $category->getTranslatedName() }}
                                            </h5>
                                            <div class="mt-auto text-end">
                                                <a href="{{ route('categories.edit', $category->id) }}"
                                                    class="btn btn-warning btn-sm">ویرایش</a>
                                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                                    class="d-inline-block"
                                                    onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید این دسته بندی را حذف کنید؟');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-center">هیچ دسته‌بندی‌ای برای {{ $filter }} موجود نیست.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($filter === 'khoskkon')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Ensure data is being passed correctly
            const labels = {!! json_encode($criteriaLabels) !!};
            const datasets = {!! json_encode($categoryDatasets) !!};

            console.log("Labels:", labels); // Debugging labels
            console.log("Datasets:", datasets); // Debugging datasets

            if (!labels.length || !datasets.length) {
                console.error("No data available for the chart.");
                return;
            }

            const ctx = document.getElementById('khoskkonChart').getContext('2d');
            new Chart(ctx, {
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
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.2)',
                            },
                            angleLines: {
                                color: 'rgba(255, 255, 255, 0.5)',
                            },
                            pointLabels: {
                                color: '#ffffff',
                            },
                        },
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'right',
                            labels: {
                                color: '#ffffff',
                            },
                        },
                    },
                },
            });
        });
    </script>
@endif

@endsection
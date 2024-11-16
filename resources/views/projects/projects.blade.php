@extends('layouts.app2')

@section('content')

<div class="customerContent container">
    <!-- Introduction Section -->
    <div class="intro-section text-center">
        <h2>مشتریان ما</h2>
        <p>ما با افتخار پروژه‌های متعدد در زمینه‌های مختلف برای مشتریانمان انجام داده‌ایم. از خدمات مهندسی گرفته تا نصب
            و راه‌اندازی، در این صفحه می‌توانید پروژه‌های انجام‌شده و در حال انجام ما را مشاهده کنید.</p>
    </div>

    <!-- Map Section -->
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    نقشه پروژه‌ها
                </div>
                <div class="card-body">
                    <div id="map" style="height: 400px; border-radius: 18px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Project Stats Section -->
    <div class="row mt-5">
        <!-- Box for پروژه‌های انجام‌شده -->
        <div class="col-md-4">
            <div class="card stat-box border-success">
                <div class="card-header bg-success text-black">
                    <i class="fas fa-check-circle"></i> پروژه‌های انجام‌شده
                </div>
                <div class="card-body">
                    <div class="counter" id="completedProjectsCounter">{{ $completedProjects }}</div>
                    <p class="card-text">پروژه‌های تکمیل‌شده</p>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar"
                            style="width: {{ ($completedProjects / max($totalProjects, 1)) * 100 }}%"
                            aria-valuenow="{{ ($completedProjects / max($totalProjects, 1)) * 100 }}" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Box for پروژه‌های در حال انجام -->
        <div class="col-md-4">
            <div class="card stat-box border-warning">
                <div class="card-header bg-warning text-white">
                    <i class="fas fa-tasks"></i> پروژه‌های در حال انجام
                </div>
                <div class="card-body">
                    <div class="counter" id="ongoingProjectsCounter">{{ $ongoingProjects }}</div>
                    <p class="card-text">پروژه‌های فعال</p>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar"
                            style="width: {{ ($ongoingProjects / max($totalProjects, 1)) * 100 }}%"
                            aria-valuenow="{{ ($ongoingProjects / max($totalProjects, 1)) * 100 }}" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Box for تعداد کل پروژه‌ها -->
        <div class="col-md-4">
            <div class="card stat-box border-primary">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-project-diagram"></i> تعداد کل پروژه‌ها
                </div>
                <div class="card-body">
                    <div class="counter" id="totalProjectsCounter">{{ $totalProjects }}</div>
                    <p class="card-text">مجموع پروژه‌ها</p>
                    <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Project Progress Chart and List Section -->
    <!-- Project Progress Chart and List Section -->
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    نمودار پیشرفت پروژه‌ها
                </div>
                <div class="card-body">
                    <canvas id="projectProgressChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    لیست پروژه‌ها
                </div>
                <div class="card-body" style="max-height: 300px; overflow-y: auto;">
                    <input type="text" id="projectSearch" class="form-control mb-3" placeholder="جستجو پروژه‌ها..."
                        onkeyup="searchProjects()">
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>نام پروژه</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
                                <th>وضعیت</th>
                            </tr>
                        </thead>
                        <tbody id="projectTable">
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->start_date }}</td>
                                    <td>{{ $project->end_date ?? 'N/A' }}</td>
                                    <td>{{ $project->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <h3 class="text-white" style="text-align: center;padding: 10px;">نظر مشتریان ما</h3>

            <div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="testimonial text-center">
                            <div class="image-content">
                                <img src="/assets/images/main-slider/modernbrik.png" alt="Custom Image">
                            </div>
                            <p class="testimonial-text">“خدمات شرکت شما بی‌نظیر بود. نصب و راه‌اندازی به موقع و بدونمشکل
                                انجام شد.”</p>

                            <p class="customer-name"><strong>- شرکت الف</strong></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial text-center">
                            <div class="image-content">
                                <img src="/assets/images/main-slider/modernbrik.png" alt="Custom Image">
                            </div>
                            <p class="testimonial-text">“خدمات شرکت شما بی‌نظیر بود. نصب و راه‌اندازی به موقع و بدونمشکل
                                انجام شد.”</p>
                            <p class="customer-name"><strong>- شرکت ب</strong></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial text-center">
                            <div class="image-content">
                                <img src="/assets/images/main-slider/modernbrik.png" alt="Custom Image">
                            </div>
                            <p class="testimonial-text">“خدمات شرکت شما بی‌نظیر بود. نصب و راه‌اندازی به موقع و بدونمشکل
                                انجام شد.”</p>
                            <p class="customer-name"><strong>- شرکت ج</strong></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial text-center">
                            <div class="image-content">
                                <img src="/assets/images/main-slider/modernbrik.png" alt="Custom Image">
                            </div>
                            <p class="testimonial-text">“خدمات شرکت شما بی‌نظیر بود. نصب و راه‌اندازی به موقع و بدونمشکل
                                انجام شد.”</p>
                            <p class="customer-name"><strong>- شرکت د</strong></p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">قبلی</span>
                </a>
                <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">بعدی</span>
                </a>
            </div>
        </div>
        <div style="padding: 6%"></div>
        <!-- Leaflet CSS and JS for map -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

        <!-- Chart.js for charts -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Initialize the Leaflet map with a softer dark-themed tile layer
                var map = L.map('map').setView([35.6892, 51.3890], 6);
                L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png?api_key=90a4bb17-ce3a-4236-affc-8efc17758dac', {
                    maxZoom: 90,
                    attribution: '© OpenStreetMap contributors, © Stadia Maps'
                }).addTo(map);

                // Define the initial bounds to reset to on zoom out
                var initialBounds = map.getBounds();

                // Get the projects data from Laravel's Blade
                var projects = @json($projects);

                // Add markers dynamically
                projects.forEach(function (project) {
                    if (project.lat && project.lng) {
                        var marker = L.marker([project.lat, project.lng], {
                            icon: L.icon({
                                iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png',
                                iconSize: [25, 41],
                                iconAnchor: [12, 41],
                                popupAnchor: [1, -34]
                            })
                        }).addTo(map);

                        // Customize popup for softer dark mode
                        marker.bindPopup(`
                <div style="color: #ddd; background-color: #444; padding: 10px; border-radius: 5px;">
                    <strong>${project.name}</strong><br>
                    وضعیت: ${project.status}<br>
                    مشتری: ${project.client}<br>
                    ظرفیت: ${project.capacity}<br>
                    نوع پروژه: ${project.type}<br>
                    تاریخ شروع: ${project.start_date}<br>
                    تاریخ پایان: ${project.end_date || 'N/A'}
                </div>
            `);

                        // Add click event to zoom in slowly on the marker
                        marker.on('click', function () {
                            map.flyTo([project.lat, project.lng], 12, {
                                animate: true,
                                duration: 2 // Slow zoom-in duration in seconds
                            });
                            marker.openPopup();
                        });
                    }
                });

                // Add click event to map to zoom out when clicking outside markers
                map.on('click', function (e) {
                    if (!e.originalEvent.target.classList.contains('leaflet-marker-icon')) {
                        map.flyToBounds(initialBounds, {
                            animate: true,
                            duration: 2 // Slow zoom-out duration in seconds
                        });
                    }
                });

                // Dynamic chart generation
                var completedData = [];
                var ongoingData = [];
                var labels = [];

                projects.forEach(function (project) {
                    labels.push(project.name);

                    if (project.status === 'تکمیل شده') {
                        completedData.push(1);
                        ongoingData.push(0);
                    } else if (project.status === 'در حال انجام') {
                        ongoingData.push(1);
                        completedData.push(0);
                    }
                });

                // Chart.js configuration
                const data = {
                    labels: labels,
                    datasets: [
                        {
                            label: 'پروژه‌های تکمیل‌شده',
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgb(54, 162, 235)',
                            data: completedData,
                        },
                        {
                            label: 'پروژه‌های درحال انجام',
                            backgroundColor: 'rgba(255, 206, 86, 0.5)',
                            borderColor: 'rgb(255, 206, 86)',
                            data: ongoingData,
                        }
                    ]
                };

                const config = {
                    type: 'bar',
                    data: data,
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                };

                // Render the chart
                const projectProgressChart = new Chart(document.getElementById('projectProgressChart'), config);
            });

            // Function to search projects
            function searchProjects() {
                var input = document.getElementById("projectSearch").value.toLowerCase();
                var tableRows = document.getElementById("projectTable").getElementsByTagName("tr");

                for (var i = 0; i < tableRows.length; i++) {
                    var row = tableRows[i];
                    var projectName = row.getElementsByTagName("td")[0].innerText.toLowerCase();
                    row.style.display = projectName.includes(input) ? "" : "none";
                }
            }
        </script>

        <style>
            .stat-box {
                text-align: center;
                padding: 20px;
                margin-bottom: 20px;
                background-color: #282828;
            }

            .card {
                background-color: #282828;
                border: 1px solid rgba(0, 0, 0, .125);
                border-radius: .25rem;
            }

            .card-header {
                background-color: #343a40;
                border-bottom: 1px solid rgba(0, 0, 0, .125);
            }
        </style>
        @endsection
@extends('layouts.app2')

@section('content')

<div class="customerContent">
    <!-- Introduction Section -->
    <div class="intro-section text-center">
        <h2>{{ __('projects.aftersales.title') }}</h2>
        <p class="text-center">{{ __('projects.aftersales.description1') }}</p>
        <p class="text-center">{{ __('projects.aftersales.description2') }}</p>
    </div>

    <!-- Map Section -->
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('projects.customerMap.title') }}
                </div>
                <div class="card-body mapContainer">
                    <div id="map" style="height: 500px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Project Stats Section -->
    <div class="row mt-5">
        <!-- Box for پروژه‌های انجام‌شده -->
        <div class="col-md-4">
            <div class="card stat-box border-success">
                <div class="card-header bg-success text-black text-center">
                    <i class="fas fa-check-circle"></i>{{ __('projects.customerContent.finishedProjects.title') }}
                </div>
                <div class="card-body">
                    <div class="counter" id="completedProjectsCounter">{{ $completedProjects }}</div>
                    <p class="card-text">{{ __('projects.customerContent.finishedProjects.description') }} </p>
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
                <div class="card-header bg-warning text-white text-center">
                    <i class="fas fa-tasks"></i> {{ __('projects.customerContent.todoProjects.title') }}
                </div>
                <div class="card-body">
                    <div class="counter" id="ongoingProjectsCounter">{{ $ongoingProjects }}</div>
                    <p class="card-text">{{ __('projects.customerContent.todoProjects.title') }} </p>
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
                <div class="card-header bg-primary text-white text-center">
                    <i class="fas fa-project-diagram"></i> {{ __('projects.customerContent.allProject.title') }}
                </div>
                <div class="card-body">
                    <div class="counter" id="totalProjectsCounter">{{ $totalProjects }}</div>
                    <p class="card-text">{{ __('projects.customerContent.allProject.title') }} </p>
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
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    {{ __('projects.customerChart.title') }}
                </div>
                <div class="card-body">
                    <canvas id="projectProgressChart"></canvas>
                </div>
            </div>
        </div>
        <div class="customerList col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    {{ __('projects.customerList.title') }}
                </div>
                <div class="card-body" style="max-height:419px ; overflow-y: auto;">
                    <input type="text" id="projectSearch" class="form-control mb-3"
                        placeholder="  {{ __('projects.searchPlaceholder') }} ..." onkeyup="searchProjects()">
                    <table class="cutomerListTable table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('projects.table.projectName') }}</th>
                                <th>{{ __('projects.table.startDate') }}</th>
                                <th>{{ __('projects.table.endDate') }}</th>
                                <th>{{ __('projects.table.status') }}</th>
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
    <br>
    <!-- Our customers' feedback -->
    <!-- <div class="row mt-5">
    <!-- Our customer feadback -->
<!-- 
    <div class="row mt-5">
        <div class="col-md-12">
            <h3 class="customerReviews" style="text-align: center;padding: 10px;">{{ __('projects.customers.Feedback') }} </h3>

            <div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="testimonial text-center">
                            <div class="image-content">
                                <img src="/assets/images/main-slider/modernbrik.png" alt="Custom Image">
                            </div>
                            <p class="testimonial-text">“{{ __('projects.customers.customerAFeadback') }}”</p>

                            <p class="customer-name"><strong>- {{ __('projects.customers.customerAtitle') }}</strong></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial text-center">
                            <div class="image-content">
                                <img src="/assets/images/main-slider/modernbrik.png" alt="Custom Image">
                            </div>
                            <p class="testimonial-text">“{{ __('projects.customers.customerBFeadback') }}”</p>
                            <p class="customer-name"><strong>- {{ __('projects.customers.customerBtitle') }}</strong></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial text-center">
                            <div class="image-content">
                                <img src="/assets/images/main-slider/modernbrik.png" alt="Custom Image">
                            </div>
                            <p class="testimonial-text">“{{ __('projects.customers.customerCFeadback') }}”</p>
                            <p class="customer-name"><strong>- {{ __('projects.customers.customerCtitle') }}</strong></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial text-center">
                            <div class="image-content">
                                <img src="/assets/images/main-slider/modernbrik.png" alt="Custom Image">
                            </div>
                            <p class="testimonial-text">“{{ __('projects.customers.customerDFeadback') }}”</p>
                            <p class="customer-name"><strong>- {{ __('projects.customers.customerDtitle') }}</strong></p>
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
    </div> -->
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize the Leaflet map
        var map = L.map('map').setView([35.6892, 51.3890], 5);

        // Define the dark mode and light mode tile layers
        var darkTileLayer = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png?api_key=90a4bb17-ce3a-4236-affc-8efc17758dac', {
            maxZoom: 90,
            attribution: '© OpenStreetMap contributors, © Stadia Maps'
        });

        var lightTileLayer = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png?api_key=90a4bb17-ce3a-4236-affc-8efc17758dac', {
            maxZoom: 90,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/">CARTO</a>'
        });

        // Add the appropriate tile layer based on the current mode
        if (document.body.classList.contains('light-mode')) {
            lightTileLayer.addTo(map);
        } else {
            darkTileLayer.addTo(map);
        }

        // Watch for changes in the mode
        const observer = new MutationObserver(function () {
            if (document.body.classList.contains('light-mode')) {
                map.removeLayer(darkTileLayer);
                lightTileLayer.addTo(map);
            } else {
                map.removeLayer(lightTileLayer);
                darkTileLayer.addTo(map);
            }
        });

        observer.observe(document.body, { attributes: true, attributeFilter: ['class'] });

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

        var ongoingData = [];
        var labels = [];

        projects.forEach(function (project) {
            if (project.status === 'در حال انجام') {
                labels.push(project.name);
                ongoingData.push(1); 
            }
        });

        // Chart.js configuration
        const data = {
            labels: labels,
            datasets: [
                {
                    label: '{{ __('projects.chartsdtl.ongoingProjects') }}',
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgb(54, 162, 235)',
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
        border-radius: 18px;
    }

    .card-header {
        background-color: #343a40;
        border-bottom: 1px solid rgba(0, 0, 0, .125);
        border-radius: 18px 18px 0px 0px !important;
    }

    .mapContainer {
        padding: 0px !important;
    }
</style>
@endsection
@extends('layouts.app')

@section('content')
    <!-- Meta Information -->    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <style>
        /* CSS for dark theme and map styling */

        .content-wrapper {
            padding: 2rem;
            background-color: #1e1e1e; 
            color: #e0e0e0; 
            border-radius: 10px;
            margin-bottom: 2rem;
            text-align: right;
        }

        #map {
            height: 600px;
            width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .blinking-circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid white;
            position: absolute;
            animation: blink 1.5s infinite;
        }

        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0.3; }
            100% { opacity: 1; }
        }

        /* Brand color for Quick Dryer projects */
        .brand-color {
            background-color: #f05928; /* Brand color */
            border: 2px solid #fff; /* White border */
        }

        /* Blue for Brick Production Line projects */
        .blue {
            background-color: #007bff; /* Blue */
            border: 2px solid #fff; /* White border */
        }

        /* Purple for Upgrade and Maintenance projects */
        .purple {
            background-color: #6f42c1; /* Purple */
            border: 2px solid #fff; /* White border */
        }

        /* Compact Tooltip styling for dark theme */
        .leaflet-tooltip {
            background-color: #333;
            color: #fff;
            font-size: 12px; /* Smaller font size */
            border-radius: 8px;
            padding: 5px; /* Less padding */
            border: 1px solid #555;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.7);
            text-align: right;
            direction: rtl;
            line-height: 1.4; /* Slightly tighter line height */
        }

        .leaflet-tooltip b {
            color: #4fd1ff; /* Light blue for emphasis */
        }

        .leaflet-tooltip span {
            display: inline-block; /* Keep elements inline */
            margin: 0; /* Reduce spacing between fields */
        }
    </style>
    <div class="scroll-container">
        <div class="main-content-container">

            <!-- Banner Section -->
            <section class="banner-seven">
                <div class="banner-container">
                    <div class="banner-slider-outer">
                        <div class="slider-box">
                            <div class="banner-slider-five">
                                <!--Slide Item-->
                                <div class="slide-item">
                                    <div class="image-layer" style="background-image: url(/assets/images/main-slider/image-12.jpg);"></div>
                                    <div class="auto-container">
                                        <div class="content-box">
                                            <div class="content">
                                                <div class="clearfix">
                                                    <div class="inner">
                                                        <h1><span>Creative Design</span></h1>
                                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                                                        <div class="links-box clearfix">
                                                            <div class="link"><a href="about.html" class="theme-btn btn-style-one"><span>learn more<i class="icon fa fa-arrow-right"></i></span></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Slide Item-->
                                <div class="slide-item">
                                    <div class="image-layer" style="background-image: url(/assets/images/main-slider/image-12.jpg);"></div>
                                    <div class="auto-container">
                                        <div class="content-box">
                                            <div class="content">
                                                <div class="clearfix">
                                                    <div class="inner">
                                                        <h1><span>Creative Design</span></h1>
                                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                                                        <div class="links-box clearfix">
                                                            <div class="link"><a href="about.html" class="theme-btn btn-style-one"><span>learn more<i class="icon fa fa-arrow-right"></i></span></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Slide Item-->
                                <div class="slide-item">
                                    <div class="image-layer" style="background-image: url(/assets/images/main-slider/image-12.jpg);"></div>
                                    <div class="auto-container">
                                        <div class="content-box">
                                            <div class="content">
                                                <div class="clearfix">
                                                    <div class="inner">
                                                        <h1><span>Creative Design</span></h1>
                                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                                                        <div class="links-box clearfix">
                                                            <div class="link"><a href="about.html" class="theme-btn btn-style-one"><span>learn more<i class="icon fa fa-arrow-right"></i></span></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pager-content" data-scrollbar="">
                                <div class="pager-outer">
                                    <div class="pager-box">
                                        <div class="pager-two">
                                            <a href="" class="pager-item active" data-slide-index="0"><div class="inner"><div class="text"><strong>Good design</strong> never ages Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</div></div></a>
                                            <a href="" class="pager-item" data-slide-index="1"><div class="inner"><div class="text"><strong>Good design</strong> never ages Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</div></div></a>
                                            <a href="" class="pager-item" data-slide-index="2"><div class="inner"><div class="text"><strong>Good design</strong> never ages Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</div></div></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Banner Section -->

        </div>
    </div>
    <div class="container content-wrapper">
        <div class="row">
            <!-- Left column with project info -->
            <div class="col-md-4">
                <h3 class="text-white">پروژه‌های تکمیل شده در ایران و عراق</h3>
                <!-- <p class="text-light">در نقشه زیر، مکان‌های پروژه‌های تکمیل شده و در حال انجام در ایران و عراق نشان داده شده است.</p>
                <p class="text-light">هر نشانگر در نقشه به‌عنوان یک دایره چشمک‌زن نمایش داده می‌شود. برای مشاهده جزئیات بیشتر، روی نشانگرها شناور شوید.</p> -->
            </div>

            <!-- Right column with the map -->
            <div class="col-md-8">
                <div id="map"></div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
</div>


    <script>
        // Initialize the map and set its view to the center of Iran and Iraq region
        var map = L.map('map').setView([34.6399, 50.8759], 6); // Centered between Iran and Iraq

        // Set up the OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // List of completed projects and their locations
        var projects = [
            { name: "پروژه قم", capacity: "5000 تن در روز", client: "شرکت A", date: "1400/05/12", status: "تکمیل شده", type: "خشک کن سریع", lat: 34.6399, lng: 50.8759 }, // قم
            { name: "پروژه سلیمانیه عراق", capacity: "3000 تن در روز", client: "شرکت B", date: "1401/02/20", status: "در حال انجام", type: "راه اندازی و تجهیزات خط تولید آجر", lat: 35.5616, lng: 45.4329 }, // سلیمانیه عراق
            { name: "پروژه قزوین", capacity: "4000 تن در روز", client: "شرکت C", date: "1402/01/15", status: "تکمیل شده", type: "اصلاح ارتقا خط تولید و تعمیر و نگه داری", lat: 36.2688, lng: 50.0041 }, // قزوین
            { name: "پروژه آذربایجان غربی", capacity: "4500 تن در روز", client: "شرکت D", date: "1399/08/25", status: "تکمیل شده", type: "خشک کن سریع", lat: 37.5483, lng: 45.0713 }, // آذربایجان غربی
            { name: "پروژه زنجان", capacity: "6000 تن در روز", client: "شرکت E", date: "1400/03/10", status: "در حال انجام", type: "اصلاح ارتقا خط تولید و تعمیر و نگه داری", lat: 36.6744, lng: 48.4845 }, // زنجان
            { name: "پروژه شال قزوین", capacity: "3500 تن در روز", client: "شرکت F", date: "1399/07/15", status: "تکمیل شده", type: "راه اندازی و تجهیزات خط تولید آجر", lat: 36.3688, lng: 49.8886 }, // شال قزوین
            { name: "پروژه باکو - آذربایجان", capacity: "8000 تن در روز", client: "شرکت G", date: "1401/01/30", status: "در حال انجام", type: "خشک کن سریع", lat: 40.4093, lng: 49.8671 }, // باکو آذربایجان
            { name: "پروژه تهران", capacity: "10000 تن در روز", client: "شرکت H", date: "1398/12/20", status: "تکمیل شده", type: "راه اندازی و تجهیزات خط تولید آجر", lat: 35.6892, lng: 51.3890 }, // تهران
            { name: "پروژه نهروان عراق", capacity: "7000 تن در روز", client: "شرکت I", date: "1400/09/15", status: "در حال انجام", type: "اصلاح ارتقا خط تولید و تعمیر و نگه داری", lat: 33.2785, lng: 44.6119 }, // نهروان عراق
        ];

        // Function to create a blinking circle as a custom marker
        function createBlinkingCircle(lat, lng, project) {
            // Determine the marker color based on the project type
            let typeClass;
            if (project.type === "خشک کن سریع") {
                typeClass = 'brand-color';  // Brand color for Quick Dryer projects
            } else if (project.type === "راه اندازی و تجهیزات خط تولید آجر") {
                typeClass = 'blue';  // Blue for Brick Production Line projects
            } else if (project.type === "اصلاح ارتقا خط تولید و تعمیر و نگه داری") {
                typeClass = 'purple';  // Purple for Upgrade and Maintenance projects
            }

            // Create a divIcon with the appropriate color
            var blinkingIcon = L.divIcon({
                className: 'blinking-circle ' + typeClass,
                iconSize: [20, 20],
                iconAnchor: [10, 10],
            });

            // Create the marker with the blinking circle
            var marker = L.marker([lat, lng], { icon: blinkingIcon }).addTo(map);

            // Build the tooltip content with all project details
            var tooltipContent = `
                <span><b>عنوان:</b> ${project.name}</span><br>
                <span><b>ظرفیت:</b> ${project.capacity}</span><br>
                <span><b>کارفرما:</b> ${project.client}</span><br>
                <span><b>تاریخ:</b> ${project.date}</span><br>
                <span><b>وضعیت:</b> ${project.status}</span><br>
                <span><b>نوع:</b> ${project.type}</span>
            `;

            // Bind the tooltip with project details
            marker.bindTooltip(tooltipContent).openTooltip();
        }

        // Loop through the projects array and add blinking markers to the map
        projects.forEach(function(project) {
            createBlinkingCircle(project.lat, project.lng, project);
        });
    </script>

    <!-- Bootstrap JS and dependencies (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

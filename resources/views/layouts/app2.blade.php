<!DOCTYPE html>
<html lang="fa">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @isset($title)
            {{ $title }} |
        @endisset
        {{ config('app.name', '') }}
    </title>
    <meta charset="utf-8">

    <!-- Stylesheets -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-dark-5@1.1.3/dist/css/bootstrap-dark.min.css" rel="stylesheet"> -->



    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/assets/css/fontiran.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="/assets/css/responsive.css" rel="stylesheet">

    <!-- Laravel Auth and App CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="body-bg-layer"></div>
    <div class="toggle-switch day" id="toggleSwitch">
        <div class="switch"></div>
        <div class="sun">☀️</div>
        <div class="cloud">☁️</div>
        <div class="moon">🌙</div>
        <div class="stars">✨</div>
    </div>

    <div class="site-container">
        <div class="cursor"></div>
        <!-- Preloader -->
        <div class="preloader"></div>
        <div class="menu-backdrop"></div>

        <!-- Main Header -->
        @include('partials.mainHeader')

        <div class="scroll-container">
            <div class="main-content-container" id="scroll-container">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.fancybox.js"></script>
    <script src="/assets/js/mixitup.js"></script>
    <script src="/assets/js/smooth-scrollbar.js"></script>
    <script src="/assets/js/owl.js"></script>
    <script src="/assets/js/cursor-script.js"></script>
    <script src="/assets/js/wow.js"></script>
    <script src="/assets/js/bxslider.js"></script>
    <script src="/assets/js/custom-script.js"></script>
    <script src="/assets/js/modal.js"></script>
    <script src="/assets/js/chart.js"></script>
    <script src="/assets/js/leaflet.js"></script>

    <script>
        const toggleSwitch = document.getElementById('toggleSwitch');
        const body = document.body;

        // Check if there's a saved theme in localStorage and apply it
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'light') {
            body.classList.add('light-mode');
            toggleSwitch.classList.remove('night');
            toggleSwitch.classList.add('day');
        } else {
            body.classList.remove('light-mode'); // Ensure dark mode by default
            toggleSwitch.classList.remove('day');
            toggleSwitch.classList.add('night');
        }

        // Toggle between light and dark mode on click
        toggleSwitch.addEventListener('click', function () {
            if (body.classList.contains('light-mode')) {
                // Switch to dark mode
                body.classList.remove('light-mode');
                body.style.backgroundColor = '#1a1a23'; // Update background to dark
                toggleSwitch.classList.remove('day');
                toggleSwitch.classList.add('night');
                localStorage.setItem('theme', 'dark'); // Save preference
            } else {
                // Switch to light mode
                body.classList.add('light-mode');
                body.style.backgroundColor = '#ffffff'; // Update background to light
                toggleSwitch.classList.remove('night');
                toggleSwitch.classList.add('day');
                localStorage.setItem('theme', 'light'); // Save preference
            }
        });
    </script>

    <!-- Laravel Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Click Tracking Function -->
    <script>
        function trackClick(productId) {
            fetch(`/products/${productId}/click`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({})
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data.message);
                })
                .catch(error => {
                    console.error('Error tracking click:', error);
                });
        }
    </script>
    <script>
        let pageLoadTime = performance.now();

        // When the user leaves the page or closes the tab
        window.addEventListener('beforeunload', function () {
            let pageCloseTime = performance.now();
            let timeSpent = (pageCloseTime - pageLoadTime) / 1000; // Time in seconds

            // Send the time spent to the server using the Fetch API
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

</body>

</html>
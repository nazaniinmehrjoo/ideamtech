<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @isset($title)
            {{ $title }} |
        @endisset
        {{ config('app.name', 'Laravel') }}
    </title>
    <meta charset="utf-8">

    <!-- Stylesheets -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-dark-5@1.1.3/dist/css/bootstrap-dark.min.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
    <div class="body-bg-layer" style="background-color: #1a1a23;"></div>
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
                @include('partials.mainFooter')
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
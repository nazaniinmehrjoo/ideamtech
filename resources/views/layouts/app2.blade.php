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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description"
        content="شرکت برنا گستر پارسی | تجهیزات پیشرفته تولید آجر، خشک‌کن سریع، ربات‌های صنعتی، و ماشین‌آلات پردازش.">
    <meta name="keywords" content="برنا گستر, تولید آجر, خشک‌کن آجر, ماشین‌آلات صنعتی, تونل پخت آجر">
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Social Sharing -->
    <meta property="og:title" content="برنا گستر پارسی - تولید آجر و ماشین‌آلات صنعتی">
    <meta property="og:description" content="شرکت برنا گستر پارسی سازنده ماشین‌آلات صنعتی و تجهیزات پیشرفته تولید آجر.">
    <meta property="og:image" content="{{ asset('/assets/images/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon.png">

    <!-- Stylesheets -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/responsive.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="/assets/css/fontiran.css">
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "برنا گستر پارسی",
        "url": "https://ideamtech.ir",
        "logo": "https://ideamtech.ir/assets/images/logo.png",
    }
    </script>

</head>

<body>
    <div class="body-bg-layer"></div>


    <!-- add ionicons - icon-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    <div class="site-container">
        <div class="cursor"></div>
        <!-- Preloader -->
        <div class="preloader"></div>
        <div class="menu-backdrop"></div>

        <!-- Main Header -->
        @include('partials.mainHeader')

        <div class="scroll-container">
            <div class="main-content-container" id="scroll-container">
                @section('h1')
                <h1 class="sr-only">شرکت برنا گستر پارسی - سازنده ماشین آلات تولید آجر</h1>
                @show
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
    <!-- Social Share Script -->
    <script>
        function shareOnSocial(platform, url) {
            const encodedUrl = encodeURIComponent(url || window.location.href);
            let shareUrl = '';
            if (platform === 'twitter') {
                shareUrl = `https://twitter.com/share?url=${encodedUrl}`;
            } else if (platform === 'facebook') {
                shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodedUrl}`;
            }
            window.open(shareUrl, '_blank');
        }
    </script>


</body>

</html>
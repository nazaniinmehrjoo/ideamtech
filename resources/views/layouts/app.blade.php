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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

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


    <div class="dropdown">
        <div class="btn toggle-icon" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-regular fa-moon-stars"></i>
        </div>
        <ul class="dropdown-menu dropdownMenuButtonItems" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#" data-theme="light"><i class="fa-regular fa-brightness"></i> Light</a>
            </li>
            <li><a class="dropdown-item" href="#" data-theme="dark"><i class="fa-regular fa-moon-stars"></i> Dark</a>
            </li>
            <li><a class="dropdown-item" href="#" data-theme="system"><i class="fa-regular fa-display"></i> System</a>
            </li>
        </ul>
    </div>
    <div class="dropdown">
        <div class="btn toggle-icon dropdown-toggle" id="languageDropdown" data-bs-toggle="dropdown"
            aria-expanded="false">
            <ion-icon name="earth-outline"></ion-icon>
            <span id="currentLanguage"><img
                    src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/flags/4x3/ir.svg"
                    alt="{{ __('header.language_persian') }}" style="width:24px; height:24px;"></span>
        </div>

        <ul class="dropdown-menu dropdownLanguageMenuItems" aria-labelledby="languageDropdown">
            <li><a class="dropdown-item" href="#" data-lang="en"><img
                        src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/flags/4x3/gb.svg"
                        alt="{{ __('header.language_english') }}" style="width:24px; height:24px;"> English</a></li>
            <li><a class="dropdown-item" href="#" data-lang="fa"><img
                        src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/flags/4x3/ir.svg"
                        alt="{{ __('header.language_persian') }}" style="width:24px; height:24px;">
                    فارسی</a></li>
        </ul>
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
                @section('h1')
                <h1 class="sr-only">شرکت برنا گستر پارسی - سازنده ماشین آلات تولید آجر</h1>
                @show
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
    <script src="/assets/js/chart.js"></script>
    <script src="/assets/js/leaflet.js"></script>


    <!-- Laravel Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>

        function changeTheme(theme) {

            localStorage.setItem('selectedTheme', theme);


            applyTheme(theme);
        }


        function applyTheme(theme) {

            document.body.classList.remove('light-mode', 'dark-mode');


            const themeButtonIcon = document.querySelector('#dropdownMenuButton i');

            if (theme === 'light') {
                document.body.classList.add('light-mode');
                themeButtonIcon.setAttribute('class', 'fa-regular fa-brightness');
            } else if (theme === 'dark') {
                document.body.classList.add('dark-mode');
                themeButtonIcon.setAttribute('class', 'fa-regular fa-moon-stars');
            } else if (theme === 'system') {
                const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)').matches;
                if (prefersDarkScheme) {
                    document.body.classList.add('dark-mode');
                    themeButtonIcon.setAttribute('class', 'fa-regular fa-moon-stars');
                } else {
                    document.body.classList.add('light-mode');
                    themeButtonIcon.setAttribute('class', 'fa-regular fa-brightness');
                }
            }
        }

        function changeLanguage(lang) {
            localStorage.setItem('selectedLanguage', lang);

            const currentUrl = new URL(window.location.href);
            currentUrl.pathname = `/lang/${lang}`;
            window.location.href = currentUrl.toString();
        }

        function loadSettings() {
            const selectedLang = localStorage.getItem('selectedLanguage') || 'fa';
            const currentLanguage = document.querySelector('#currentLanguage');
            const buttonIcon = document.querySelector('#languageDropdown ion-icon');

            currentLanguage.textContent = selectedLang.toUpperCase();
            buttonIcon.setAttribute('name', selectedLang === 'en' ? 'earth-outline' : 'flag-outline');

            const selectedTheme = localStorage.getItem('selectedTheme') || 'system';
            applyTheme(selectedTheme);
        }

        document.addEventListener('DOMContentLoaded', () => {
            loadSettings();

            document.querySelectorAll('.dropdown-item[data-theme]').forEach(item => {
                item.addEventListener('click', (event) => {
                    event.preventDefault();
                    const theme = item.getAttribute('data-theme');
                    changeTheme(theme);
                });
            });

            document.querySelectorAll('.dropdownLanguageMenuItems .dropdown-item').forEach(item => {
                item.addEventListener('click', (event) => {
                    event.preventDefault();
                    const lang = item.getAttribute('data-lang');
                    changeLanguage(lang);
                });
            });
        });

    </script>
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
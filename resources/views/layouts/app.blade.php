<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <style>
.theme-switcher {
    position: absolute;
    top: 45px;
    right: 20px;
    display: flex;
    gap: 12px;
    z-index: 1000;
    float: right;
}

.theme-btn {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 22px;
    color: inherit;
    transition: transform 0.2s ease, color 0.2s ease;
}
.theme-btn i {
    font-size: 18px;
}
.theme-btn:hover {
    transform: scale(1.2);
}

.theme-btn.active {
    color: #007bff; 
    
}

body.light-mode {
    background-color: #ffffff;
    color: #000000;
}

body.dark-mode {
    background-color: #121212;
    color: #ffffff;
}

    </style>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @isset($title)
            {{ $title }} |
        @endisset
        {{ config('app.name', 'برنا گستر پارسی') }}
    </title>
    <meta charset="utf-8">
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
    <link rel="icon" type="image/png" href="/assets/images/favicon.png" alt="لوگوبرناگسترپارسی-logobornagostarparsi">

    <!-- Stylesheets -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/responsive.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
    <link rel="stylesheet" href="/assets/css/fontiran.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="body-bg-layer"></div>

    <!-- Language and Theme Switchers -->
    <div class="menuDropdown">
        <!-- Theme Switcher -->
        <div class="theme-switcher">
            <button class="theme-btn" data-theme="light" title="Light Mode">
                <i class="fa-thin fa-sun-bright"></i>
            </button>
            <button class="theme-btn" data-theme="dark" title="Dark Mode">
                <i class="fa-light fa-moon-stars"></i>
            </button>
            <button class="theme-btn" data-theme="system" title="System Default">
                <i class="fa-regular fa-display"></i>
            </button>
        </div>

        <!-- Language Switcher -->
        <div class="dropdown">
            <div class="btn toggle-icon dropdown-toggle" id="languageDropdown" data-bs-toggle="dropdown"
                aria-expanded="false">
                <ion-icon name="earth-outline"></ion-icon>
                <span id="currentLanguage">
                    <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/flags/4x3/{{ app()->getLocale() == 'en' ? 'gb' : 'ir' }}.svg"
                        alt="{{ app()->getLocale() == 'en' ? __('header.language_english') : __('header.language_persian') }}"
                        style="width:24px; height:24px;">
                </span>
            </div>
            <ul class="dropdown-menu dropdownLanguageMenuItems" aria-labelledby="languageDropdown">
                <li>
                    <a class="dropdown-item" href="#" data-lang="en">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/flags/4x3/gb.svg"
                            alt="{{ __('header.language_english') }}" style="width:24px; height:24px;"> English
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#" data-lang="fa">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/flags/4x3/ir.svg"
                            alt="{{ __('header.language_persian') }}" style="width:24px; height:24px;"> فارسی
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Site Container -->
    <div class="site-container">
        <div class="cursor"></div>
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
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Theme and Language Scripts -->
    <script>

    function changeTheme(theme) {
        localStorage.setItem('selectedTheme', theme);
        applyTheme(theme);
    }

    function applyTheme(theme) {
        document.body.classList.remove('light-mode', 'dark-mode');

        if (theme === 'light') {
            document.body.classList.add('light-mode');
        } else if (theme === 'dark') {
            document.body.classList.add('dark-mode');
        } else {
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (prefersDark) {
                document.body.classList.add('dark-mode');
            } else {
                document.body.classList.add('light-mode');
            }
        }

        document.querySelectorAll('.theme-btn').forEach(btn => {
            const btnTheme = btn.getAttribute('data-theme');
            if (btnTheme === theme) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const savedTheme = localStorage.getItem('selectedTheme') || 'system';
        applyTheme(savedTheme);

        document.querySelectorAll('.theme-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const selectedTheme = btn.getAttribute('data-theme');
                changeTheme(selectedTheme);
            });
        });
    });


        // Language Change Functions
        function changeLanguage(lang) {
            // Update URL to include the selected language
            const currentUrl = new URL(window.location.href);
            const pathParts = currentUrl.pathname.split('/');

            // Replace the first path segment with the new language or add it if missing
            if (pathParts[1] === 'en' || pathParts[1] === 'fa') {
                pathParts[1] = lang;
            } else {
                pathParts.unshift(lang);
            }

            // Redirect to the updated URL
            const newUrl = pathParts.join('/');
            window.location.href = `${currentUrl.origin}${newUrl}`;
        }

        function applyLanguageSettings() {
            // Load selected language from localStorage
            const selectedLang = localStorage.getItem('selectedLanguage') || '{{ app()->getLocale() }}';

            // Update the language dropdown to reflect the current language
            const currentLanguage = document.querySelector('#currentLanguage');
            currentLanguage.innerHTML = `
            <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/flags/4x3/${selectedLang === 'en' ? 'gb' : 'ir'}.svg"
                 alt="${selectedLang === 'en' ? 'English' : 'فارسی'}" style="width:24px; height:24px;">
        `;
        }

        function loadSettings() {
            // Apply theme settings
            const selectedTheme = localStorage.getItem('selectedTheme') || 'system';
            applyTheme(selectedTheme);

            // Apply language settings
            applyLanguageSettings();
        }

        document.addEventListener('DOMContentLoaded', () => {
            loadSettings(); // Load theme and language settings on page load

            // Theme dropdown event listeners
            document.querySelectorAll('.dropdownMenuButtonItems .dropdown-item').forEach(item => {
                item.addEventListener('click', event => {
                    event.preventDefault();
                    const theme = item.getAttribute('data-theme');
                    changeTheme(theme);
                });
            });

            // Language dropdown event listeners
            document.querySelectorAll('.dropdownLanguageMenuItems .dropdown-item').forEach(item => {
                item.addEventListener('click', event => {
                    event.preventDefault();
                    const lang = item.getAttribute('data-lang');
                    localStorage.setItem('selectedLanguage', lang); // Save selected language to localStorage
                    changeLanguage(lang);
                });
            });
        });
    </script>


</body>

</html>
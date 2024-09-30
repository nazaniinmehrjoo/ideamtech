<!DOCTYPE html>
<html lang="en">
<head>
<title>
        @isset($title)
            {{ $title }} | 
        @endisset
        {{ config('') }}
    </title>
<meta charset="utf-8">
<!-- Stylesheets -->
<link href="/assets/css/bootstrap.css" rel="stylesheet">
<link href="/assets/css/style.css" rel="stylesheet">
<link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">
<link rel="icon" href="/assets/images/favicon.png" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="/assets/css/fontiran.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="/assets/css/responsive.css" rel="stylesheet">

</head>

<body>
<div class="body-bg-layer" style="background-color: #1a1a23;"></div>
  <div class="site-container">
        <div class="cursor"></div>
        <!-- Preloader -->
        <div class="preloader"></div>

        <div class="menu-backdrop"></div>
            @include('partials.mainHeader')
    

        <div class="scroll-container">
            <div class="main-content-container" id="scroll-container">
                @yield('content')
                @include('partials.mainFooter')
            </div>
        </div>

    </div>
    <!--End Site Container--> 

    
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
</body>
</html>
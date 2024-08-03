<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="max-width-d">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>{{ config('app.name') . (isset($pageName) ? (' | ' . ($pageName ?? '')) : '') }}</title>
    <meta name="description" content="{{ config('app.meta.description') }}"/>
    <meta name="keywords" content="{{ implode(' ', config('app.meta.keywords')) }}"/>
    <meta name="author" content="{{ config('app.meta.author') }}"/>
    <!--  FavIcon  -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.rtl.min.css') }}">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}">
    <!-- Malihu Jquery Custom ScrollBar Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">
    <!-- Animate Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <!-- Swiper Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <!-- Magnific Popup Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!--  Custom Style Css  -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!--  Custom Rtl Css  -->
    <link rel="stylesheet" href="{{ asset('assets/css/rtl.css') }}">
    <!--  Color Css  -->
    <link rel="stylesheet" href="{{ asset('assets/colors/yellow.css') }}">
</head>
<body class="max-width-d">

<!-- Preloader -->
<div id="line-loader">
    <div class="middle-line"></div>
</div>

<!--   Menu Overlay Mobile -->
<div class="menu-overlay d-none"></div>

<!--   Right Side Start  -->
<div class="right-side d-none d-lg-block">
    <div id="date"></div>
    <div class="social-box">
        <div class="follow-label">
            <span>دنبال کردن من</span>
        </div>
        <div class="social d-none d-lg-block">
            <a href="javascript:void(0);">
                <i class="bi bi-whatsapp"></i>
            </a>
            <a href="javascript:void(0);">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="javascript:void(0);">
                <i class="bi bi-dribbble"></i>
            </a>
        </div>
    </div>
    <div class="next-prev-page">
        <button type="button" class="prev-page bg-base-color hstack">
            <i class="bi bi-chevron-compact-up mx-auto"></i>
        </button>
        <button type="button" class="next-page bg-base-color mt-3 hstack">
            <i class="bi bi-chevron-compact-down mx-auto"></i>
        </button>
    </div>
</div>
<!--  Right Side End  -->

<!--  Left Side Start  -->
<div class="left-side  nav-close">
    <div class="menu-content-align">
        <div class="left-side-image">
            <img src="{{ asset('assets/img/photogerapher/profile-img.jpg') }}" alt="/">
        </div>
        <h1 class="mt-1">مریم تارخ</h1>
        <a class="download-cv primary-button d-none d-lg-inline-block" href="javascript:void(0);">دانلود رزومه</a>
        <div class="container d-lg-none d-inline-block">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="text-muted mb-0">عکاس</p>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-align">
        <ul class="list-group menu text-center " id="menu">
            <li class="list-group-item">
                <a href="#hero">
                    <i class="bi bi-house"></i>
                    <span>خانه</span>
                </a>
            </li>
            <li class="list-group-item">
                <a href="#about" class="custom-btn">
                    <i class="bi bi-person"></i>
                    <span>درباره من</span>
                </a>
            </li>
            <li class="list-group-item">
                <a href="#resume">
                    <i class="bi bi-clipboard-check"></i>
                    <span>رزومه</span>
                </a>
            </li>
            <li class="list-group-item">
                <a href="#portfolio">
                    <i class="bi bi-collection"></i>
                    <span>نمونه کار</span>
                </a>
            </li>
            <li class="list-group-item">
                <a href="#blog">
                    <i class="bi bi-book"></i>
                    <span>بلاگ</span>
                </a>
            </li>
            <li class="list-group-item">
                <a href="#contact">
                    <i class="bi bi-geo-alt"></i>
                    <span>تماس با من</span>
                </a>
            </li>
        </ul>
        <div class="menu-footer">
            <a class="download-cv primary-button mt-3 mb-4 d-lg-none" href="javascript:void(0);">دانلودرزومه</a>
            <div class="social d-lg-none d-block">
                <a href="javascript:void(0);" class="d-inline-block">
                    <i class="bi bi-whatsapp"></i>
                </a>
                <a href="javascript:void(0);" class="d-inline-block mx-4">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="javascript:void(0);" class="d-inline-block">
                    <i class="bi bi-dribbble"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!--  Left Side End  -->

<!--  Main Start  -->
<main id="main" class="main-2">

    @yield('main')

</main>
<!--  Main End  -->

<!--  Mobile Next and Prev Button Start -->
<div class="next-prev-page d-block d-lg-none">
    <button type="button" class="prev-page bg-base-color hstack">
        <i class="bi bi-chevron-compact-left mx-auto"></i>
    </button>
    <button type="button" class="next-page bg-base-color mt-1 mt-lg-3 hstack">
        <i class="bi bi-chevron-compact-right mx-auto"></i>
    </button>
</div>
<!--  Mobile Next and Prev Button End -->

<!--  Navbar Button Mobile Start -->
<div class="menu-toggle">
    <span></span>
    <span></span>
    <span></span>
</div>
<!--  Navbar Button Mobile End -->

<!-- Mouse Magic Cursor Start -->
<div class="m-magic-cursor mmc-outer"></div>
<div class="m-magic-cursor mmc-inner"></div>
<!-- Mouse Magic Cursor End -->

<!--  JavaScripts  -->
<!--  Jquery 3.4.1  -->
<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<!--  Bootstrap Js  -->
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<!--  Malihu ScrollBar Js  -->
<script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!--  CountTo Js  -->
<script src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
<!--  Swiper Js  -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!--  Isotope Js  -->
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<!--  Magnific Popup Js  -->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
{{--<!-- Map Js -->--}}
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRemITiP7JRWpZwLhVt-T2x5MeUFE2KWs"></script>--}}
<!--  Arshia Js  -->
<script src="{{ asset('assets/js/arshia.rtl.js') }}"></script>
</body>
</html>

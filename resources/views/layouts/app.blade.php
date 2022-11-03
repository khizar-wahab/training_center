<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>الملتقى المهني العاشر بجامعة الملك عبدالعزيز</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="/assets/css/animate.css">
    <!-- magnific -->
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <!-- carousel -->
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <!-- isotop -->
    <link rel="stylesheet" href="/assets/css/isotop.css">
    <!-- ico fonts -->
    <link rel="stylesheet" href="/assets/css/xsIcon.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="/assets/css/style-v3.css">
    <!-- Responsive styles-->
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link href="~/css/site.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="/assets/images/favicon.ico">

    <script src="/assets/js/jquery.js"></script>

    <script src="/assets/js/popper.min.js"></script>
    <!-- Bootstrap jQuery -->
    <script src="/assets/js/bootstrap.min.js"></script>

    <style>
        @media (max-width: 767px) {
            .ts-footer {
                padding: 50px 0 50px;
            }
        }
    </style>
</head>
<body>
    <div class="body-inner">
            @include('partials.header')

            @yield('content')

            @include('partials.footer')
    </div>
    <!-- Body inner end -->

    <!-- Counter -->
    <script src="/assets/js/jquery.appear.min.js"></script>
    <!-- Countdown -->
    <script src="/assets/js/jquery.jCounter.js"></script>
    <!-- magnific-popup -->
    <script src="/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- carousel -->
    <script src="/assets/js/owl.carousel.min.js"></script>
    <!-- Waypoints -->
    <script src="/assets/js/wow.min.js"></script>
    <!-- isotop -->
    <script src="/assets/js/isotope.pkgd.min.js"></script>

    <!-- Template custom -->
    <script src="/assets/js/main.js"></script>

    <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script src="~/js/site.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
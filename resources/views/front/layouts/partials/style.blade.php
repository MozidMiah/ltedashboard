<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Wolmart eCommmerce Marketplace HTML Template</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Wolmart eCommmerce Marketplace HTML Template">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('front/assets/images/icons/favicon.png') }}">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: {
                families: ['Poppins:400,500,600,700']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = "{{ asset('front/assets/js/webfont.js') }}";
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>


    <link rel="preload"
        href="{{ asset('front/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2') }}"as="font"
        type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ asset('front/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2') }}"as="font"
        type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="{{ asset('front/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2') }}"as="font"
        type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ asset('front/assets/fonts/wolmart87d5.ttf?png09e') }}" as="font"
        type="font/ttf"crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/vendor/fontawesome-free/css/all.min.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/vendor/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/vendor/animate/animate.min.css') }}">
    <link rel="stylesheet"
        type="text/css"href="{{ asset('front/assets/vendor/magnific-popup/magnific-popup.min.css') }}">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/demo1.min.css') }}">

    <link rel="stylesheet" href="{{ asset('front/assets/css/style.min.css') }}">

</head>

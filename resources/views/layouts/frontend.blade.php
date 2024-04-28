<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/images/logo/travelingceylonfavicon.svg') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/bootstrap/css/bootstrap.min.css') }}" media="all">
    <!-- jquery-ui css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendors/jquery-ui/jquery-ui.min.css') }}">
    <!-- fancybox box css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/assets/vendors/fancybox/dist/jquery.fancybox.min.css') }}">
    <!-- Fonts Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendors/fontawesome/css/all.min.css') }}">
    <!-- Elmentkit Icon CSS -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/assets/vendors/elementskit-icon-pack/assets/css/ekiticons.css') }}">
    <!-- slick slider css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendors/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendors/slick/slick-theme.css') }}">
    <!-- google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap"
        rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/custamize.css') }}">
    {{-- swiperjs  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    {{-- Sweet aleart  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.min.css">


    {{-- Anim Trap  --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugin/animtrap/css/animtrap.min.css') }}">

    <title>Traveling Ceylon | Journey into Ceylon's Timeless Beauty</title>
    @vite(['resources/js/app.js'])
</head>

<body class="home">
    <div id="siteLoader" class="site-loader">
        <div class="preloader-content">
            <img src="{{ asset('frontend/assets/images/loader1.gif') }}" alt="">
        </div>
    </div>

    <main>
        @yield('content')
    </main>


    <!-- JavaScript -->
    <script src="{{ asset('frontend/assets/vendors/jquery/jquery.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/waypoint/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/countdown-date-loop-counter/loopcounter.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/counterup/jquery.counterup.min.js') }}"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('frontend/assets/vendors/masonry/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/slick/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/fancybox/dist/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/slick-nav/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugin/animtrap/js/anim-effect.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugin/animtrap/js/anim-scroll.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.min.js"></script>
    <!-- TrustBox script -->
    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
    <!-- End TrustBox script -->

    {{-- <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <div class="elfsight-app-43f178d5-5a96-4661-b2b6-3c3df005d25d" data-elfsight-app-lazy></div> --}}

    {{-- <script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
        <script>
          var wa_btnSetting = {"btnColor":"#16BE45","ctaText":"WhatsApp Us","cornerRadius":40,"marginBottom":0,"marginLeft":"50","marginRight":60,"btnPosition":"right","whatsAppNumber":"94715421423","welcomeMessage":"Hello","zIndex":999999,"btnColorScheme":"light"};
          window.onload = () => {
            _waEmbed(wa_btnSetting);
          };
        </script> --}}


    <script>
        var url = 'https://edna.io/wp-content/plugins/whatsapp-widget-generator/js/generator.js?27227';
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url;
        var options = {
            "host": "https://edna.io",
            "enabled": true,
            "chatButtonSetting": {
                "backgroundColor": "#4fce5d",
                "ctaText": "",
                "icon": "whatsapp",
                "position": "right",
            },
            "brandSetting": {
                "backgroundColor": "#085b53",
                "brandImg": "https://scontent-lhr8-2.xx.fbcdn.net/v/t39.30808-6/431273104_6715401488559855_3884483656857971277_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=5f2048&_nc_ohc=59BesqiTlVYQ7kNvgGGNVSw&_nc_ht=scontent-lhr8-2.xx&oh=00_AfDzTw_LT42N4Hf4rnfCCsOi_CjIm8-7ahyzaqtfvwQIRw&oe=6634A393",
                "brandName": "Kavindu",
                "brandSubTitle": "Typically replies in minutes",
                "ctaText": "Start Chat",
                "phoneNumber": "447916177140",
                "welcomeText": "\nHi there 👋\n\nHow can I help you?"
            }
        };
        s.onload = function() {
            CreateWhatsappChatWidget(options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    </script>


    @stack('scripts')

    <script>
        ANIMSCROLL.init({
            easing: 'ease-in-out-sine'
        });
    </script>

</body>

</html>

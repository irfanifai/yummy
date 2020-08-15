<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Yummy - @yield("title")</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('yummy/img/core-img/favicon.ico') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <!-- Core Stylesheet -->
    <link href="{{ asset('yummy/style.css') }}" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{ asset('yummy/css/responsive/responsive.css') }}" rel="stylesheet">

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="yummy-load"></div>
    </div>

    <!-- Background Pattern Swither -->
    <div id="pattern-switcher">
        Bg Pattern
    </div>
    <div id="patter-close">
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>

    <!-- ****** Top Header Area Start ****** -->
    <div class="top_header_area">
        @include('frontend.include._topheader')
    </div>
    <!-- ****** Top Header Area End ****** -->

     <!-- ****** Header Area Start ****** -->
    <header class="header_area">
        @include('frontend.include._header')
    </header>
    <!-- ****** Header Area End ****** -->

    <!--blog-->
        @yield("content")
    <!--/blog-->

    <!-- ****** Instagram Area Start ****** -->
    {{-- <div class="instargram_area owl-carousel section_padding_100_0 clearfix" id="portfolio">
        @include('frontend.include._instagramarea')
    </div> --}}
    <!-- ****** Our Creative Portfolio Area End ****** -->

    <!-- ****** Footer Social Icon Area Start ****** -->
    <div class="social_icon_area clearfix">
        @include('frontend.include._socialicon')
    </div>
    <!-- ****** Footer Social Icon Area End ****** -->

    <!-- ****** Footer Menu Area Start ****** -->
    <footer class="footer_area">
        @include('frontend.include._footer')
    </footer>
    <!-- ****** Footer Menu Area End ****** -->

    <!-- Jquery-2.2.4 js -->
    <script src="{{ asset('yummy/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('yummy/js/bootstrap/popper.min.js') }}"></script>
    <!-- Bootstrap-4 js -->
    <script src="{{ asset('yummy/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- All Plugins JS -->
    <script src="{{ asset('yummy/js/others/plugins.js') }}"></script>
    <!-- Active JS -->
    <script src="{{ asset('yummy/js/active.js') }}"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d82beb954fe42bd"></script>
    <script id="dsq-count-scr" src="//yummy-5.disqus.com/count.js" async></script>

</body>
</html>

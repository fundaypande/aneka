<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hello World</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS {!! asset('css/sweetalert2.css') !!} -->
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{!! asset('css/pande.css') !!}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{!! asset('css/swiper.min.css') !!}">

    <!-- Styles -->
    <link rel="stylesheet" href="{!! asset('style.css') !!}" >
    <script src="{!! asset('js/custom.js') !!}"></script>
</head>
<body>
    <header class="site-header">
        <div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                        <div class="site-branding d-flex align-items-center">
                           <a class="d-block" href="index.html" rel="home"><img class="d-block" src="{!! asset('images/logo.png') !!}" alt="logo"></a>
                        </div><!-- .site-branding -->

                        <nav class="site-navigation d-flex justify-content-end align-items-center">
                            <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-items-center">
                                <li class="current-menu-item"><a href="/">Beranda</a></li>
                                <li><a href="/produk">Produksi</a></li>
                                <li><a href="about.html">Tentang Kami</a></li>

                                @if (Route::has('login'))
                                        @auth
                                            <li><a href="{{ url('/home') }}">Beranda</a></li>
                                        @else
                                            <li><a href="{{ route('login') }}">Login</a></li>

                                            @if (Route::has('register'))
                                                <li><a href="{{ route('register') }}">Register</a></li>
                                            @endif
                                        @endauth
                                    </div>
                                @endif

                            </ul>
                        </nav><!-- .site-navigation -->

                        <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- .hamburger-menu -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .nav-bar -->
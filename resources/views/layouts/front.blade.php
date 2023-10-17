<!DOCTYPE html>
<html lang="en">

<head>
    <title>Coffee - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/front/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/front/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/front/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/front/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">Coffee<small>Blend</small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ route('carts.index') }}" class="nav-link">Cart</a></li>

                    @if (!Auth::user())
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                    @endif

                    @if (Auth::user())
                        @php
                            $cart = request()
                                ->session()
                                ->get('cart');
                            $cartCount = is_array($cart) ? count($cart) : 0;
                        @endphp
                        <li class="nav-item cart"><a href="{{ route('carts.index') }}" class="nav-link"><span
                                    class="icon icon-shopping_cart"></span><span
                                    class="bag d-flex justify-content-center align-items-center"><small>
                                        {{ $cartCount }}
                                    </small></span></a>
                        </li>
                        <li class="nav-item"><a href="{{ route('orderList') }}" class="nav-link">My Orders</a></li>
                    @endif

                    @if (Auth::user())
                        <li class="nav-item">

                            <div class="dropdown nav-link">
                                <a class=" nav-link dropdown-toggle p-0" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{-- 
                                    {{ $position = strpos(Auth::user()->namem, ' ') }}

                                    {{ $substring = substr(Auth::user()->name, 0, $position) }}

                                    {{ $substring }} --}}

                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu ">
                                    <li class="nav-item dropdown-item">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="nav-link" type="submit"
                                                style="border: none ; outline:none ; background:transparent ; cursor:pointer">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>



                        </li>
                    @endif




                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    @yield('content')











    <footer class="ftco-footer ftco-section img">
        <div class="overlay"></div>
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">About Us</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Services</h2>
                        <ul class="list-unstyled">

                            <li><a href="#" class="py-2 d-block">Deliver</a></li>
                            <li><a href="#" class="py-2 d-block">Good Quality</a></li>
                            <li><a href="#" class="py-2 d-block">Mixed</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St.
                                        Mountain View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2
                                            392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/aos.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('assets/front/js/google-map.js') }}"></script>
    <script src="{{ asset('assets/front/js/main.js') }}"></script>

</body>

</html>

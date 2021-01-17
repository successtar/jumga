<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="/img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/all.min.css" rel="stylesheet">
        <link href="/lib/slick/slick.css" rel="stylesheet">
        <link href="/lib/slick/slick-theme.css" rel="stylesheet">
        <link href="/css/toastr.css" rel="stylesheet"/>

        <!-- Template Stylesheet -->
        <link href="/css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="/">
                                <img src="/img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                        @if (@$shop)
                            <div class="user d-inline-block">
                                <a href="/shop/{{$shop->slug}}/cart" class="btn cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span id="cart-count"></span>
                                </a>
                            </div>
                        @endif


                        <!-- Authentication Links -->
                        @guest
                            <div class="nav-item dropdown d-inline-block px-3">
                                <a href="#" class="nav-link h5 dropdown-toggle" data-toggle="dropdown">User Account</a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('login') }}" class="dropdown-item">{{ __('Login') }}</a>
                                    <a href="{{ route('register') }}" class="dropdown-item">{{ __('Register') }}</a>
                                </div>
                            </div>
                        @else
                            <div class="nav-item dropdown d-inline-block px-3">
                                <a href="#" class="nav-link h5 dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->first_name }}</a>
                                <div class="dropdown-menu">

                                    @if (Auth::user()->role == "admin")
                                        <a href="{{ route('admin.dashboard') }}" class="dropdown-item">{{ __('Dashboard') }}</a>
                                    @elseif (Auth::user()->role == "merchant")
                                        <a href="{{ route('merchant.dashboard') }}" class="dropdown-item">{{ __('Dashboard') }}</a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->

        <main class="pb-4">
            @yield('content')
        </main>

        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>123 Jumga, Lagos, Nigeria</p>
                                <p><i class="fa fa-envelope"></i>hello@jumga.com</p>
                                <p><i class="fa fa-phone"></i>+2347061855688</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Follow Us</h2>
                            <div class="contact-info">
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Company Info</h2>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Purchase Info</h2>
                            <ul>
                                <li><a href="#">Pyament Policy</a></li>
                                <li><a href="#">Shipping Policy</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row payment align-items-center">
                    <div class="col-md-6">
                        <div class="payment-method">
                            <h2>We Accept:</h2>
                            <img src="/img/payment-method.png" alt="Payment Method" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-security">
                            <h2>Secured By:</h2>
                            <img src="/img/godaddy.svg" alt="Payment Security" />
                            <img src="/img/norton.svg" alt="Payment Security" />
                            <img src="/img/ssl.svg" alt="Payment Security" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="/">Jumga Shop</a>. All Rights Reserved</p>
                    </div>

                    <div class="col-md-6 template-by">
                        <p>Developed By <a target="_blank" href="https://successtar.github.io">Successtar</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->

        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="/lib/jquery-3.4.1.min.js"></script>
        <script src="/lib/bootstrap.bundle.min.js"></script>
        <script src="/lib/easing/easing.min.js"></script>
        <script src="/lib/slick/slick.min.js"></script>
        <script src="/lib/toastr.js"></script>

        <!-- Template Javascript -->
        <script src="/js/main.js"></script>
    </body>
</html>

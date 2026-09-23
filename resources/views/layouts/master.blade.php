<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - AgriCulture Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Marcellus:wght@400&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: AgriCulture
  * Template URL: https://bootstrapmade.com/agriculture-bootstrap-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        .dropdown.dropdown-hover .dropdown-menu {
            display: block;
            margin-top: 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.2s ease-in-out;
        }

        .dropdown.dropdown-hover:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center position-relative">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('assets/img/logo.png') }}" alt="AgriCulture">
                <!-- <h1 class="sitename">AgriCulture</h1>  -->
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home.page') }}"
                            class="{{ request()->routeIs('home.page') ? 'active' : '' }}">{{ __('home') }}</a></li>
                    <li><a href="{{ route('about.page') }}"
                            class="{{ request()->routeIs('about.page') ? 'active' : '' }}">{{ __('about') }}</a></li>
                    <li><a href="services.html" class="{{ request()->routeIs('service.page') ? 'active' : '' }}">{{ __('service') }}</a></li>
                    <li><a href="testimonials.html"
                            class="{{ request()->routeIs('testimonials.page') ? 'active' : '' }}">{{ __('testimonials') }}</a></li>
                    <li><a href="{{ route('blog.page') }}"
                            class="{{ request()->routeIs('blog.page') ? 'active' : '' }}">{{ __('blog') }}</a></li>
                    <li><a href="{{ route('contact.page') }}">{{ __('contact') }}</a></li>
                    <li class="dropdown"><a href="#"><span>{{ strtoupper(App::getLocale()) }}</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ route('lang.switch', 'uz') }}">O'zbekcha (UZ)</a></li>
                            <li><a href="{{ route('lang.switch', 'ru') }}">Русский (RU)</a></li>
                            <li><a href="{{ route('lang.switch', 'en') }}">English (EN)</a></li>
                        </ul>
                    </li>
                    @guest
                        <div class="btn-group">
                            <li><a href="{{ route('login') }}">{{ __('login') }}</a></li>
                            <li><a href="{{ route('register') }}">{{ __('register') }}</a></li>
                        </div>
                    @endguest

                    @auth
                        <div class="dropdown dropdown-hover">
                            <a class="dropdown-toggle" role="button" aria-expanded="false"
                                href="#">{{ auth()->user()->name }}</a>

                            <div class="dropdown-menu">
                                @if (auth()->user()->isAdmin())
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                @endif
                                <li><a href="{{ route('profile.edit') }}" class="dropdown-item">Profile</a></li>
                                <form action="{{ route('logout') }}" id="formId" method="POST">
                                    @csrf
                                </form>
                                <li><a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('formId').submit()">Logout</a>
                                </li>
                            </div>
                        </div>
                    @endauth
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">
        @yield('content')

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section light-background">

            <div class="content">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h3>{{ __('newsletter') }}</h3>
                            <p class="opacity-50">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Nesciunt, reprehenderit!
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <form action="forms/newsletter.php" class="form-subscribe php-email-form">
                                <div class="form-group d-flex align-items-stretch">
                                    <input type="email" name="email" class="form-control h-100"
                                        placeholder="Enter your e-mail">
                                    <input type="submit" class="btn btn-secondary px-4" value="Subcribe">
                                </div>
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">
                                    Your subscription request has been sent. Thank you!
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Call To Action Section -->

    </main>

    <footer id="footer" class="footer dark-background">

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6 footer-about">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <span class="sitename">AgriCulture</span>
                        </a>
                        <div class="footer-contact pt-3">
                            <p>A108 Adam Street</p>
                            <p>New York, NY 535022</p>
                            <p class="mt-3"><strong>{{ __('phone') }}:</strong> <span>+1 5589 55488 55</span></p>
                            <p><strong>{{ __('email') }}:</strong> <span>info@example.com</span></p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>{{ __('useful_links') }}</h4>
                        <ul>
                            <li><a href="#">{{ __('home') }}</a></li>
                            <li><a href="#">{{ __('about') }}</a></li>
                            <li><a href="#">{{ __('service') }}</a></li>
                            <li><a href="#">{{ __('terms') }}</a></li>
                            <li><a href="#">{{ __('privacy') }}</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>{{ __('service') }}</h4>
                        <ul>
                            <li><a href="#">{{ __('web_design') }}</a></li>
                            <li><a href="#">{{ __('web_development') }}</a></li>
                            <li><a href="#">{{ __('product_management') }}</a></li>
                            <li><a href="#">{{ __('marketing') }}</a></li>
                            <li><a href="#">{{ __('graphic_design') }}</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Hic solutasetp</h4>
                        <ul>
                            <li><a href="#">Molestiae accusamus iure</a></li>
                            <li><a href="#">Excepturi dignissimos</a></li>
                            <li><a href="#">Suscipit distinctio</a></li>
                            <li><a href="#">Dilecta</a></li>
                            <li><a href="#">Sit quas consectetur</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Nobis illum</h4>
                        <ul>
                            <li><a href="#">Ipsam</a></li>
                            <li><a href="#">Laudantium dolorum</a></li>
                            <li><a href="#">Dinera</a></li>
                            <li><a href="#">Trodelas</a></li>
                            <li><a href="#">Flexo</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="copyright text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div>
                        © Copyright <strong><span>MyWebsite</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a
                            href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                    <a target="_blank" href="https://twitter.com/intent/url?url={{ urlencode(url()->current()) }}"><i
                            class="bi bi-twitter-x"></i></a>
                    <a target="_blank" href="https://facebook.com/share/url?url={{ urlencode(url()->current()) }}"><i
                            class="bi bi-facebook"></i></a>
                    <a target="_blank" href="https://t.me/share/url?url={{ urlencode(url()->current()) }}"><i
                            class="bi bi-telegram"></i></a>
                    <a target="_blank" href="https://linkedin.com/share/url?url={{ urlencode(url()->current()) }}"><i
                            class="bi bi-linkedin"></i></a>
                </div>

            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
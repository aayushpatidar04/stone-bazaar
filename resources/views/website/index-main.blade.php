<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <!-- favicons Icons -->
    <link rel="apple-touch-icon" href="{{ asset('assets/images/favicon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" />
    <meta name="description" content="Stone Bazaar | Verified Stones, Trusted Connections - The Digital Marketplace for Marble & Granite." />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VFZR4RVH2D"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-VFZR4RVH2D');
    </script>
    
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600;9..40,700;9..40,900;9..40,1000&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('website-assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website-assets/vendors/bootstrap-select/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website-assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website-assets/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website-assets/vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('website-assets/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('website-assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('website-assets/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website-assets/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('website-assets/vendors/tiny-slider/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('website-assets/vendors/floens-icons/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('website-assets/vendors/swiper/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website-assets/vendors/owl-carousel/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website-assets/vendors/owl-carousel/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website-assets/vendors/slick/slick.css') }}" />

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('website-assets/css/floens.css') }}" />
    @yield('css-content')
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    
    <div class="preloader">
        <div class="preloader__content">
            <div class="preloader__image" style="background-image: url(/assets/images/favicon.png);"></div>
            <h2 class="preloader__text">Stone Bazaar</h2>
            <p class="preloader__text2">future of stone trade</p>
        </div>
    </div>

    <!-- /.preloader -->
    <div class="page-wrapper">
        <div class="topbar-one">
            <div class="container-fluid">
                <div class="topbar-one__inner">
                    <ul class="list-unstyled topbar-one__info">
                        <li class="topbar-one__info__item">
                            <span class="icon-paper-plane"></span>
                            <a href="mailto:stonebazaar01@gmail.com">stonebazaar01@gmail.com</a>
                        </li>
                        <li class="topbar-one__info__item">
                            <span class="icon-phone-call"></span>
                            <a href="tel:+919352703082">+91 9352703082</a>
                        </li>
                        <li class="topbar-one__info__item">
                            <span class="icon-location"></span>
                            <address>Stone Bazaar, Kishangarh, Rajasthan (Marble Hub of India)</address>
                        </li>
                    </ul><!-- /.list-unstyled topbar-one__info -->
                    <div class="topbar-one__right">
                        <div class="topbar-one__social">
                            <a href="https://facebook.com/">
                                <i class="icon-facebook" aria-hidden="true"></i>
                                <span class="sr-only">Facebook</span>
                            </a>
                            <a href="https://twitter.com/">
                                <i class="icon-twitter" aria-hidden="true"></i>
                                <span class="sr-only">Twitter</span>
                            </a>
                            <a href="https://instagram.com/">
                                <i class="icon-instagram" aria-hidden="true"></i>
                                <span class="sr-only">Instagram</span>
                            </a>
                            <a href="https://youtube.com/">
                                <i class="icon-youtube" aria-hidden="true"></i>
                                <span class="sr-only">Youtube</span>
                            </a>
                        </div><!-- /.topbar-one__social -->
                    </div><!-- /.topbar-one__right -->
                </div><!-- /.topbar-one__inner -->
            </div><!-- /.container-fluid -->
        </div><!-- /.topbar-one -->

        <header class="main-header main-header--two sticky-header sticky-header--normal">
            <div class="container-fluid">
                <div class="main-header__inner">
                    <div class="main-header__left">
                        <div class="main-header__logo">
                            <a href="{{ Route('index') }}">
                                <img src="{{ asset('website-assets/images/logo-yellow.png') }}" alt="Stone Bazaar"
                                    width="125">
                            </a>
                        </div><!-- /.main-header__logo -->
                        <nav class="main-header__nav main-menu">
                            <ul class="main-menu__list">

                                <li class="megamenu">
                                    <a href="{{ Route('index') }}">Home</a>
                                </li>



                                <li>
                                    <a href="about.html">About</a>
                                </li>

                                <li>
                                    <a href="{{ Route('sellers') }}">Vendors</a>
                                </li>

                                <li>
                                    <a href="{{ Route('contact') }}">Contact</a>
                                </li>
                                <li>
                                    <a href="{{ Route('plans') }}">Pricing</a>
                                </li>
                            </ul>
                        </nav><!-- /.main-header__nav -->
                    </div><!-- /.main-header__left -->
                    <div class="main-header__right">
                        <div class="mobile-nav__btn mobile-nav__toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- /.mobile-nav__toggler -->

                        @guest()
                            <div class="main-menu">
                                <ul class="main-menu__list">
                                    <li>
                                        <a href="javascript:void(0)" class="floens-btn main-header__btn">
                                            <span class="text-white" style="font-size: 15px;"><b>SIGN UP</b></span>
                                            <i class="icon-down-arrow text-white"></i>
                                        </a>
                                        <ul>
                                            <li><a href="{{ Route('register', ['role' => 'Seller']) }}">Sign Up as
                                                    Seller/Merchant</a></li>
                                            <li><a href="{{ Route('register', ['role' => 'Architect']) }}">Sign Up as
                                                    Architect/Interior Designer</a></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>

                            <a href="{{ Route('login') }}" class="floens-btn main-header__btn">
                                <span>Sign In</span>
                                <i class="icon-right-arrow"></i>
                            </a>
                        @else
                            <a href="{{ Route('home') }}" class="floens-btn main-header__btn">
                                <span>Dashboard</span>
                                <i class="icon-right-arrow"></i>
                            </a>
                        @endguest
                        <!-- /.thm-btn main-header__btn -->

                        <button class="main-header__sidebar-btn sidebar-btn__toggler">
                            <span class="main-header__sidebar-btn__box"></span><!-- /.main-header__sidebar-btn__box -->
                            <span class="main-header__sidebar-btn__box"></span><!-- /.main-header__sidebar-btn__box -->
                            <span class="main-header__sidebar-btn__box"></span><!-- /.main-header__sidebar-btn__box -->
                        </button><!-- /.main-header__sidebar-btn -->
                    </div><!-- /.main-header__right -->
                </div><!-- /.main-header__inner -->
            </div><!-- /.container-fluid -->
        </header><!-- /.main-header -->

        @php
            $alerts = [];

            if (session('success')) {
                $alerts[] = ['type' => 'success', 'message' => session('success')];
            }

            if (session('error')) {
                $alerts[] = ['type' => 'error', 'message' => session('error')];
            }

            if ($errors->any()) {
                $alerts[] = [
                    'type' => 'error',
                    'message' => '<ol>' . collect($errors->all())->map(fn($e) => "<li>$e</li>")->implode('') . '</ol>',
                    'isHtml' => true,
                ];
            }
        @endphp

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const alertTypes = {
                    success: 'alert-solid-success border border-success',
                    error: 'alert-solid-danger border border-danger'
                };

                const container = document.getElementById('alert-container');

                @foreach ($alerts as $alert)
                    (function() {
                        const alertHtml = `
                    <div class="card border-0 mb-2 fade-in">
                        <div class="alert ${alertTypes["{{ $alert['type'] }}"]} mb-0 p-3">
                            <div class="d-flex align-items-start">
                                <div class="text-fixed-white w-100">
                                    <div class="d-flex justify-content-between">
                                        <span>{!! $alert['isHtml'] ?? false ? $alert['message'] : e($alert['message']) !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;

                        const tempDiv = document.createElement('div');
                        tempDiv.innerHTML = alertHtml;
                        const alertElement = tempDiv.firstElementChild;
                        container.appendChild(alertElement);

                        setTimeout(() => {
                            alertElement.classList.add('fade-out');
                            setTimeout(() => alertElement.remove(), 500);
                        }, 5000);
                    })();
                @endforeach
            });
        </script>

        @yield('content')

        <footer class="main-footer">
            <div class="main-footer__bg"
                style="background-image: url(/website-assets/images/shapes/footer-bg-1-1.png);"></div>
            <!-- /.main-footer__bg -->
            <div class="main-footer__top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <div class="footer-widget footer-widget--about">
                                <a href="{{ Route('index') }}" class="footer-widget__logo">
                                    <img src="{{ asset('website-assets/images/logo-white.png') }}" width="150"
                                        alt="Stone Bazaar">
                                </a>
                                <p class="footer-widget__about-text">India’s Dedicated B2B Marketplace for Marble & Granite Vendors.</p><!-- /.footer-widget__about-text -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-xl-4 col-lg-6 -->
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1500ms"
                            data-wow-delay="200ms">
                            <div class="footer-widget footer-widget--links footer-widget--links-one">
                                <div class="footer-widget__top">
                                    <div class="footer-widget__title-box"></div><!-- /.footer-widget__title-box -->
                                    <h2 class="footer-widget__title">Explore</h2><!-- /.footer-widget__title -->
                                </div><!-- /.footer-widget__top -->
                                <ul class="list-unstyled footer-widget__links">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="services.html">Our Services</a></li>
                                    <li><a href="team.html">Meet the Team</a></li>
                                    <li><a href="{{ Route('plans') }}">Subscription Plans</a></li>
                                    <li><a href="{{ Route('contact') }}">Contact</a></li>
                                </ul><!-- /.list-unstyled footer-widget__links -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-xl-2 col-lg-3 col-md-3 col-sm-6 -->
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms"
                            data-wow-delay="400ms">
                            <div class="footer-widget footer-widget--links footer-widget--links-two">
                                <div class="footer-widget__top">
                                    <div class="footer-widget__title-box"></div><!-- /.footer-widget__title-box -->
                                    <h2 class="footer-widget__title">Quick Links</h2><!-- /.footer-widget__title -->
                                </div><!-- /.footer-widget__top -->
                                <ul class="list-unstyled footer-widget__links">
                                    <li><a href="{{ Route('sellers') }}">Vendors</a></li>
                                    <li><a href="{{ Route('architects') }}">Architects/Designers</a></li>
                                    <li><a href="{{ Route('register', ['role' => 'Seller']) }}">Become a Vendor</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                </ul><!-- /.list-unstyled footer-widget__links -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-xl-3 col-lg-3 col-md-4 col-sm-6 -->
                        <div class="col-xl-3 col-lg-6 col-md-5 wow fadeInUp" data-wow-duration="1500ms"
                            data-wow-delay="600ms">
                            <div class="footer-widget footer-widget--contact">
                                <div class="footer-widget__top">
                                    <div class="footer-widget__title-box"></div><!-- /.footer-widget__title-box -->
                                    <h2 class="footer-widget__title">Get inTouch</h2><!-- /.footer-widget__title -->
                                </div><!-- /.footer-widget__top -->
                                <ul class="list-unstyled footer-widget__info">
                                    <li><a href="https://www.google.com/maps">Stone Bazaar, Kishangarh, Rajasthan (Marble Hub of India)</a></li>
                                    <li><span class="icon-paper-plane"></span> <a
                                            href="mailto:stonebazaar01@gmail.com">stonebazaar01@gmail.com</a></li>
                                    <li><span class="icon-phone-call"></span> <a href="tel:+919352703082"> +91 9352703082</a></li>
                                </ul><!-- /.list-unstyled -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-xl-3 col-lg-6 col-md-5 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.main-footer__top -->
            <div class="main-footer__bottom">
                <div class="container">
                    <div class="main-footer__bottom__inner">
                        <div class="row gutter-y-30 align-items-center">
                            <div class="col-md-5 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="000ms">
                                <div class="main-footer__social floens-social">
                                    <a href="https://facebook.com/">
                                        <i class="icon-facebook" aria-hidden="true"></i>
                                        <span class="sr-only">Facebook</span>
                                    </a>
                                    <a href="https://twitter.com/">
                                        <i class="icon-twitter" aria-hidden="true"></i>
                                        <span class="sr-only">Twitter</span>
                                    </a>
                                    <a href="https://instagram.com/">
                                        <i class="icon-instagram" aria-hidden="true"></i>
                                        <span class="sr-only">Instagram</span>
                                    </a>
                                    <a href="https://youtube.com/">
                                        <i class="icon-youtube" aria-hidden="true"></i>
                                        <span class="sr-only">Youtube</span>
                                    </a>
                                </div><!-- /.main-footer__social -->
                            </div><!-- /.col-md-5 -->
                            <div class="col-md-7 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                                <div class="main-footer__bottom__copyright">
                                    <p class="main-footer__copyright">
                                        &copy; Copyright <span class="dynamic-year"></span>, Stone Bazaar. Made with by
                                        ❤️ <a href="https://intouchsoftware.co.in" target="_blank">InTouch Software
                                            Solutions</a>
                                    </p>
                                </div><!-- /.main-footer__bottom__copyright -->
                            </div><!-- /.col-md-7 -->
                        </div><!-- /.row -->
                    </div><!-- /.main-footer__inner -->
                </div><!-- /.container -->
            </div><!-- /.main-footer__bottom -->
        </footer><!-- /.main-footer -->

    </div><!-- /.page-wrapper -->

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="{{ Route('index') }}" aria-label="logo image"><img
                        src="{{ asset('website-assets/images/logo-yellow.png') }}" width="155"
                        alt="Stone Bazaar" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:stonebazaar01@gmail.com">stonebazaar01@gmail.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+919352703082">+91 9352703082</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__social">
                <a href="https://facebook.com/">
                    <i class="icon-facebook" aria-hidden="true"></i>
                    <span class="sr-only">Facebook</span>
                </a>
                <a href="https://twitter.com/">
                    <i class="icon-twitter" aria-hidden="true"></i>
                    <span class="sr-only">Twitter</span>
                </a>
                <a href="https://instagram.com/">
                    <i class="icon-instagram" aria-hidden="true"></i>
                    <span class="sr-only">Instagram</span>
                </a>
                <a href="https://youtube.com/">
                    <i class="icon-youtube" aria-hidden="true"></i>
                    <span class="sr-only">Youtube</span>
                </a>
            </div><!-- /.mobile-nav__social -->
            <div class="text-center px-3 mt-3">
                @guest()
                    <a href="{{ Route('login') }}" class="btn btn-secondary mb-2">
                        <span>Sign In</span>
                    </a>
                    <a href="#" class="btn btn-secondary mb-2">
                        Sign Up as Seller/Merchant
                    </a>
                    <a href="#" class="btn btn-secondary mb-2">
                        Sign Up as Architect/Interior Designer
                    </a>
                @else
                    <a href="{{ Route('home') }}" class="btn btn-secondary mb-2">
                        <span>Dashboard</span>
                    </a>
                @endguest
            </div>
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <aside class="sidebar-one">
        <div class="sidebar-one__overlay sidebar-btn__toggler"></div><!-- /.siderbar-ovarlay -->
        <div class="sidebar-one__content">
            <span class="sidebar-one__close sidebar-btn__toggler"><i class="fa fa-times"></i></span>
            <div class="sidebar-one__logo sidebar-one__item">
                <a href="{{ Route('index') }}" aria-label="logo image"><img
                        src="{{ asset('website-assets/images/logo-yellow.png') }}" width="123"
                        alt="Stone Bazaar" /></a>
            </div><!-- /.sidebar-one__logo -->
            <div class="sidebar-one__about sidebar-one__item">
                <p class="sidebar-one__about__text">Stone Bazaar is a verified B2B marketplace connecting marble
                    sellers, architects, and buyers with trusted inquiries, catalogs, and business management tools.</p>
            </div><!-- /.sidebar-one__about -->
            <div class="sidebar-one__info sidebar-one__item">
                <h4 class="sidebar-one__title">Information</h4>
                <ul class="sidebar-one__info__list">
                    <li><span class="icon-location-2"></span>
                        <address>Stone Bazaar, Kishangarh, Rajasthan (Marble Hub of India)</address>
                    </li>
                    <li><span class="icon-paper-plane"></span> <a
                            href="mailto:stonebazaar01@gmail.com">stonebazaar01@gmail.com</a></li>
                    <li><span class="icon-phone-call"></span> <a href="tel:+919352703082">+91 9352703082</a></li>
                </ul><!-- /.sidebar-one__info__list -->
            </div><!-- /.sidebar-one__info -->
            <div class="sidebar-one__social floens-social sidebar-one__item">
                <a href="https://facebook.com/">
                    <i class="icon-facebook" aria-hidden="true"></i>
                    <span class="sr-only">Facebook</span>
                </a>
                <a href="https://twitter.com/">
                    <i class="icon-twitter" aria-hidden="true"></i>
                    <span class="sr-only">Twitter</span>
                </a>
                <a href="https://instagram.com/">
                    <i class="icon-instagram" aria-hidden="true"></i>
                    <span class="sr-only">Instagram</span>
                </a>
                <a href="https://youtube.com/">
                    <i class="icon-youtube" aria-hidden="true"></i>
                    <span class="sr-only">Youtube</span>
                </a>
            </div><!-- /sidebar-one__social -->
            <div class="sidebar-one__newsletter sidebar-one__item">
                <label class="sidebar-one__title" for="sidebar-email">Newsletter Subscribe</label>
                <form action="#" class="sidebar-one__newsletter__inner mc-form" data-url="MAILCHIMP_FORM_URL">
                    <input type="email" name="sidebar-email" id="sidebar-email"
                        class="sidebar-one__newsletter__input" placeholder="Email Address">
                    <button type="submit" class="sidebar-one__newsletter__btn"><span class="icon-email"
                            aria-hidden="true"></span></button>
                </form>
                <div class="mc-form__response"></div><!-- /.mc-form__response -->
            </div><!-- /.sidebar-one__form -->
        </div><!-- /.sidebar__content -->
    </aside><!-- /.sidebar-one -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__text">back top</span>
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
    </a>

    <div id="alert-container" class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050;"></div>

    <script src="{{ asset('website-assets/vendors/jquery/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/tiny-slider/tiny-slider.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/swiper/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/wow/wow.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/imagesloaded/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/countdown/countdown.min.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/jquery-circleType/jquery.circleType.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/jquery-lettering/jquery.lettering.min.js') }}"></script>
    <script src="{{ asset('website-assets/vendors/slick/slick.min.js') }}"></script>
    <!-- template js -->
    <script src="{{ asset('website-assets/js/floens.js') }}"></script>
    <script>
        function showAlert(type, message) {
            const alertTypes = {
                success: 'alert-solid-success border border-success bg-success',
                error: 'alert-solid-danger border border-danger bg-danger'
            };

            const alertHtml = `
                <div class="card border-0 mb-2 fade-in">
                    <div class="alert text-white ${alertTypes[type]} mb-0 p-3">
                        <div class="d-flex align-items-start">
                            <div class="text-fixed-white w-100">
                                <div class="d-flex justify-content-between">
                                    <span>${message}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;

            const container = document.getElementById('alert-container');
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = alertHtml;

            const alertElement = tempDiv.firstElementChild;
            container.appendChild(alertElement);

            // Auto remove after 5 seconds
            setTimeout(() => {
                alertElement.classList.add('fade-out');
                setTimeout(() => alertElement.remove(), 500);
            }, 5000);
        }
    </script>
    @yield('js-content')
</body>


</html>

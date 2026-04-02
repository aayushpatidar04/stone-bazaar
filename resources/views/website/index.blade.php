@extends('website.index-main')
@section('title', 'Stone Bazaar | Connecting Sellers, Designers, and Buyers with Integrity.')
@section('css-content')
    <style>
        .fixed-img {
            width: 100%;
            /* full width of container */
            height: 280px;
            /* fixed height */
            object-fit: cover;
            /* crop to fit nicely */
        }

        .fixed-img2 {
            width: auto;
            /* full width of container */
            height: 280px;
            /* fixed height */
        }

        @media (max-width: 768px) {
            #vendors {
                display: none;
                /* hide sellers carousel on mobile */
            }

            .main-slider-two {
                display: none;
                /* hide slider only on mobile */
            }
        }

        .hero-banner-mobile {
            display: none;
            padding: 0 0 10px 0;
            background: url('/website-assets/images/backgrounds/about-bg-2-1.png') no-repeat center center;
            background-size: cover;
            color: #333;
        }

        .hero-banner-mobile__title {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .hero-banner-mobile__subtitle {
            font-size: 1.5rem;
            color: #636363;
        }

        .hero-banner-mobile__desc {
            line-height: 1;
            color: #000;
            font-size: 0.9rem;
        }

        .hero-banner-mobile__features {
            display: flex;
            flex-direction: row;
            margin: 15px 0;
            font-size: 10px;
            line-height: 1;
        }

        .hero-banner-mobile__actions .btn {
            margin: 5px 0;
            width: 100%;
            font-size: 14px;
        }

        .hero-banner-mobile__stones img {
            width: 70%;
        }

        /* Show only on mobile */
        @media (max-width: 768px) {
            .hero-banner-mobile {
                display: block;
            }
        }

        .stats-mobile {
            display: none;
            padding: 10px 0px;
            background: #f5efe2;
        }

        .stats-mobile__grid {
            display: flex;
            justify-content: space-between;
            border-radius: 8px;
            box-shadow: #000000 0px 4px 12px;
            border: 1px solid#00000032
        }

        .stats-mobile__item {
            margin: 15px 0px;
            padding: 0px 4px;
            text-align: center;
        }

        .stats-mobile__item i {
            font-size: 22px;
            margin-bottom: 8px;
            color: #d4a017;
            /* gold accent */
        }

        .stats-mobile__item h4 {
            font-size: 18px;
            margin: 0;
            font-weight: bold;
            color: #000;
        }

        .stats-mobile__item p {
            font-size: 11px;
            margin: 5px 0 0;
            color: #000;
        }

        /* Show only on mobile */
        @media (max-width: 768px) {
            .stats-mobile {
                display: block;
            }
        }

        .vendors-mobile {
            display: none;
            /* hidden by default */
            padding: 30px 15px;
            background: #f5efe2;
        }

        .vendors-mobile__title {
            font-size: 1.4rem;
            margin-bottom: 15px;
            font-weight: bold;
            font-family: 'Times New Roman', Times, serif;
            color: #000;
        }

        .vendors-mobile__list {
            display: grid;
            grid-template-columns: 2fr 2fr;
            gap: 15px;
            margin-bottom: 25px;
        }

        .vendors-mobile__item {
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }

        .vendors-mobile__item img {
            width: 100%;
            margin-bottom: 8px;
        }

        .vendors-mobile__item p {
            margin: 0px;
            color: #000;
            font-weight: bold;
            line-height: 1;
        }

        .vendors-mobile__vendor {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
            border: 1px solid #00000032;
        }

        .vendors-mobile__vendor h5 {
            margin: 0;
            font-size: 1rem;
            color: #000;
        }

        .vendors-mobile__vendor p {
            font-size: 0.9rem;
            margin: 0;
            color: #000;
            line-height: 1;
        }

        /* Show only on mobile */
        @media (max-width: 768px) {
            .vendors-mobile {
                display: block;
            }
        }
    </style>
@endsection
@section('content')
    <!-- main slider start -->
    <section class="main-slider-two hero-slider">
        <div class="main-slider-two__carousel floens-slick__carousel--with-counter"
            data-slick-options='{
                "slidesToShow": 1,
                "slidesToScroll": 1,
                "autoplay": true,
                "autoplaySpeed": 3000,
                "fade": true,
                "speed": 2000,
                "infinite": true,
                "arrows": true,
                "dots": false,
                "prevArrow": "<button class=\"hero-slider__slick-button hero-slider__slick-button--prev\">Prev <i class=\"icon-right-arrow\"><i></button>",
                "nextArrow": "<button class=\"hero-slider__slick-button hero-slider__slick-button--next\">Next <i class=\"icon-right-arrow\"><i></button>"

            }'>
            <div class="main-slider-two__item">
                <div class="main-slider-two__bg" style="background-image: url(/website-assets/images/backgrounds/bg-1.jpeg);">
                </div>
                <!-- /.main-slider-two__bg -->
                <div class="main-slider-two__wrapper container">
                    <div class="main-slider-two__left">
                        <div class="main-slider-two__content">
                            <p class="main-slider-two__tagline">Welcome to Stone Bazaar</p>
                            <!-- /.main-slider-two__tagline -->
                            <h2 class="main-slider-two__title">Granite and Marble <br> -Versatile beauty for <br> modern
                                living</h2>
                            <!-- /.main-slider-two__title -->
                            <a href="about.html" class="main-slider-two__btn floens-btn">
                                <span>discover more</span>
                                <i class="icon-right-arrow"></i>
                            </a><!-- /.main-slider-two__btn floens-btn -->
                        </div><!-- /.main-slider-two__content -->
                    </div><!-- /.main-slider-two__left -->
                    <div class="main-slider-two__right">
                        <div class="main-slider-two__image">
                            <div class="main-slider-two__image__one">
                                <div class="main-slider-two__image__inner">
                                    <img src="{{ asset('website-assets/images/slider/sl-1-1.jpg') }}" alt="slider">
                                </div><!-- /.main-slider-two__image__inner -->
                                <div class="main-slider-two__tiles">
                                    <div class="main-slider-two__tiles__circle"></div>
                                    <!-- /.main-slider-two__tiles__circle -->
                                    <h5 class="main-slider-two__tiles__title">statuario</h5>
                                    <!-- /.main-slider-two__tiles__title -->
                                </div><!-- /.main-slider-two__tiles -->
                            </div><!-- /.main-slider-two__image__one -->
                            <div class="main-slider-two__image__two">
                                <div class="main-slider-two__image__inner">
                                    <img src="{{ asset('website-assets/images/slider/sl-1-2.jpg') }}" alt="slider">
                                </div><!-- /.main-slider-two__image__inner -->
                                <div class="main-slider-two__shape">
                                    <div class="main-slider-two__shape__circle"></div>
                                    <!-- /.main-slider-two__shape__circle -->
                                    <h5 class="main-slider-two__shape__title">lumix</h5>
                                </div><!-- /.main-slider-two__tilses -->
                            </div><!-- /.main-slider-two__image__two -->
                        </div><!-- /.main-slider-two__image -->
                    </div><!-- /.main-slider-two__right -->
                </div><!-- /.main-slider-two__wrapper .container -->
            </div><!-- /.main-slider-two__item -->
            <div class="main-slider-two__item">
                <div class="main-slider-two__bg"
                    style="background-image: url(/website-assets/images/backgrounds/bg-2.png);">
                </div>
                <!-- /.main-slider-two__bg -->
                <div class="main-slider-two__wrapper container">
                    <div class="main-slider-two__left">
                        <div class="main-slider-two__content">
                            <p class="main-slider-two__tagline">Welcome to Stone Bazaar</p>
                            <!-- /.main-slider-two__tagline -->
                            <h2 class="main-slider-two__title">From flooring to <br> feature walls — <br> redefine luxury
                            </h2>
                            <!-- /.main-slider-two__title -->
                            <a href="about.html" class="main-slider-two__btn floens-btn">
                                <span>discover more</span>
                                <i class="icon-right-arrow"></i>
                            </a><!-- /.main-slider-two__btn floens-btn -->
                        </div><!-- /.main-slider-two__content -->
                    </div><!-- /.main-slider-two__left -->
                    <div class="main-slider-two__right">
                        <div class="main-slider-two__image">
                            <div class="main-slider-two__image__one">
                                <div class="main-slider-two__image__inner">
                                    <img src="{{ asset('website-assets/images/slider/sl-2-1.jpg') }}" alt="slider">
                                </div><!-- /.main-slider-two__image__inner -->
                                <div class="main-slider-two__tiles">
                                    <div class="main-slider-two__tiles__circle"></div>
                                    <!-- /.main-slider-two__tiles__circle -->
                                    <h5 class="main-slider-two__tiles__title">calacatta vagli</h5>
                                    <!-- /.main-slider-two__tiles__title -->
                                </div><!-- /.main-slider-two__tiles -->
                            </div><!-- /.main-slider-two__image__one -->
                            <div class="main-slider-two__image__two">
                                <div class="main-slider-two__image__inner">
                                    <img src="{{ asset('website-assets/images/slider/sl-2-2.jpg') }}" alt="slider">
                                </div><!-- /.main-slider-two__image__inner -->
                                <div class="main-slider-two__shape">
                                    <div class="main-slider-two__shape__circle"></div>
                                    <h5 class="main-slider-two__shape__title">vibranium</h5>
                                    <!-- /.main-slider-two__shape__circle -->
                                </div><!-- /.main-slider-two__tilses -->
                            </div><!-- /.main-slider-two__image__two -->
                        </div><!-- /.main-slider-two__image -->
                    </div><!-- /.main-slider-two__right -->
                </div><!-- /.main-slider-two__wrapper .container -->
            </div><!-- /.main-slider-two__item -->
            <div class="main-slider-two__item">
                <div class="main-slider-two__bg"
                    style="background-image: url(/website-assets/images/backgrounds/bg-3.png);">
                </div>
                <!-- /.main-slider-two__bg -->
                <div class="main-slider-two__wrapper container">
                    <div class="main-slider-two__left">
                        <div class="main-slider-two__content">
                            <p class="main-slider-two__tagline">Welcome to Stone Bazaar</p>
                            <!-- /.main-slider-two__tagline -->
                            <h2 class="main-slider-two__title">Timeless surfaces <br>for kitchens, <br>walls, and more</h2>
                            <!-- /.main-slider-two__title -->
                            <a href="about.html" class="main-slider-two__btn floens-btn">
                                <span>discover more</span>
                                <i class="icon-right-arrow"></i>
                            </a><!-- /.main-slider-two__btn floens-btn -->
                        </div><!-- /.main-slider-two__content -->
                    </div><!-- /.main-slider-two__left -->
                    <div class="main-slider-two__right">
                        <div class="main-slider-two__image">
                            <div class="main-slider-two__image__one">
                                <div class="main-slider-two__image__inner">
                                    <img src="{{ asset('website-assets/images/slider/sl-3-1.jpg') }}" alt="slider">
                                </div><!-- /.main-slider-two__image__inner -->
                                <div class="main-slider-two__tiles">
                                    <div class="main-slider-two__tiles__circle"></div>
                                    <!-- /.main-slider-two__tiles__circle -->
                                    <h5 class="main-slider-two__tiles__title">Acupullo Brown</h5>
                                    <!-- /.main-slider-two__tiles__title -->
                                </div><!-- /.main-slider-two__tiles -->
                            </div><!-- /.main-slider-two__image__one -->
                            <div class="main-slider-two__image__two">
                                <div class="main-slider-two__image__inner">
                                    <img src="{{ asset('website-assets/images/slider/sl-3-2.jpg') }}" alt="slider">
                                </div><!-- /.main-slider-two__image__inner -->
                                <div class="main-slider-two__shape">
                                    <div class="main-slider-two__shape__circle"></div>
                                    <h5 class="main-slider-two__shape__title">white tiger</h5>
                                    <!-- /.main-slider-two__shape__circle -->
                                </div><!-- /.main-slider-two__tilses -->
                            </div><!-- /.main-slider-two__image__two -->
                        </div><!-- /.main-slider-two__image -->
                    </div><!-- /.main-slider-two__right -->
                </div><!-- /.main-slider-two__wrapper .container -->
            </div><!-- /.main-slider-two__item -->
            <div class="main-slider-two__item">
                <div class="main-slider-two__bg"
                    style="background-image: url(/website-assets/images/backgrounds/bg-4.png);">
                </div>
                <!-- /.main-slider-two__bg -->
                <div class="main-slider-two__wrapper container">
                    <div class="main-slider-two__left">
                        <div class="main-slider-two__content">
                            <p class="main-slider-two__tagline">Welcome to Stone Bazaar</p>
                            <!-- /.main-slider-two__tagline -->
                            <h2 class="main-slider-two__title">Crafted for homes, <br> hotels, and heritage <br> projects
                                alike</h2>
                            <!-- /.main-slider-two__title -->
                            <a href="about.html" class="main-slider-two__btn floens-btn">
                                <span>discover more</span>
                                <i class="icon-right-arrow"></i>
                            </a><!-- /.main-slider-two__btn floens-btn -->
                        </div><!-- /.main-slider-two__content -->
                    </div><!-- /.main-slider-two__left -->
                    <div class="main-slider-two__right">
                        <div class="main-slider-two__image">
                            <div class="main-slider-two__image__one">
                                <div class="main-slider-two__image__inner">
                                    <img src="{{ asset('website-assets/images/slider/sl-4-1.jpg') }}" alt="slider">
                                </div><!-- /.main-slider-two__image__inner -->
                                <div class="main-slider-two__tiles">
                                    <div class="main-slider-two__tiles__circle"></div>
                                    <!-- /.main-slider-two__tiles__circle -->
                                    <h5 class="main-slider-two__tiles__title">Golden Emperador</h5>
                                    <!-- /.main-slider-two__tiles__title -->
                                </div><!-- /.main-slider-two__tiles -->
                            </div><!-- /.main-slider-two__image__one -->
                            <div class="main-slider-two__image__two">
                                <div class="main-slider-two__image__inner">
                                    <img src="{{ asset('website-assets/images/slider/sl-4-2.jpg') }}" alt="slider">
                                </div><!-- /.main-slider-two__image__inner -->
                                <div class="main-slider-two__shape">
                                    <div class="main-slider-two__shape__circle"></div>
                                    <h5 class="main-slider-two__shape__title">taj mahal</h5>
                                    <!-- /.main-slider-two__shape__circle -->
                                </div><!-- /.main-slider-two__tilses -->
                            </div><!-- /.main-slider-two__image__two -->
                        </div><!-- /.main-slider-two__image -->
                    </div><!-- /.main-slider-two__right -->
                </div><!-- /.main-slider-two__wrapper .container -->
            </div><!-- /.main-slider-two__item -->
            <div class="main-slider-two__item">
                <div class="main-slider-two__bg"
                    style="background-image: url(/website-assets/images/backgrounds/bg-5.png);">
                </div>
                <!-- /.main-slider-two__bg -->
                <div class="main-slider-two__wrapper container">
                    <div class="main-slider-two__left">
                        <div class="main-slider-two__content">
                            <p class="main-slider-two__tagline">Welcome to Stone Bazaar</p>
                            <!-- /.main-slider-two__tagline -->
                            <h2 class="main-slider-two__title">Transforming spaces <br> with natural artistry <br> in every
                                cut</h2>
                            <!-- /.main-slider-two__title -->
                            <a href="about.html" class="main-slider-two__btn floens-btn">
                                <span>discover more</span>
                                <i class="icon-right-arrow"></i>
                            </a><!-- /.main-slider-two__btn floens-btn -->
                        </div><!-- /.main-slider-two__content -->
                    </div><!-- /.main-slider-two__left -->
                    <div class="main-slider-two__right">
                        <div class="main-slider-two__image">
                            <div class="main-slider-two__image__one">
                                <div class="main-slider-two__image__inner">
                                    <img src="{{ asset('website-assets/images/slider/sl-5-1.jpg') }}" alt="slider">
                                </div><!-- /.main-slider-two__image__inner -->
                                <div class="main-slider-two__tiles">
                                    <div class="main-slider-two__tiles__circle"></div>
                                    <!-- /.main-slider-two__tiles__circle -->
                                    <h5 class="main-slider-two__tiles__title">renoir</h5>
                                    <!-- /.main-slider-two__tiles__title -->
                                </div><!-- /.main-slider-two__tiles -->
                            </div><!-- /.main-slider-two__image__one -->
                            <div class="main-slider-two__image__two">
                                <div class="main-slider-two__image__inner">
                                    <img src="{{ asset('website-assets/images/slider/sl-5-2.jpg') }}" alt="slider">
                                </div><!-- /.main-slider-two__image__inner -->
                                <div class="main-slider-two__shape">
                                    <div class="main-slider-two__shape__circle"></div>
                                    <h5 class="main-slider-two__shape__title">sandalus</h5>
                                    <!-- /.main-slider-two__shape__circle -->
                                </div><!-- /.main-slider-two__tilses -->
                            </div><!-- /.main-slider-two__image__two -->
                        </div><!-- /.main-slider-two__image -->
                    </div><!-- /.main-slider-two__right -->
                </div><!-- /.main-slider-two__wrapper .container -->
            </div><!-- /.main-slider-two__item -->
        </div><!-- /.my-slider -->


    </section><!-- /.main-slider-two -->
    <!-- main slider end -->

    <!-- Mobile Hero Section -->
    <section class="hero-banner-mobile">
        <div style="background-color: #d5c5a9; font-size: 12px; padding: 5px;">Connect you business with Architects,
            Interior Designers, and Builders.</div>
        <div class="container text-center">
            <img src="{{ asset('website-assets/images/logo-dark.png') }}" alt="Stone Bazaar Logo" style="width: 20%;">

            <h2 class="hero-banner-mobile__subtitle" style="font-family: 'Times New Roman', Times, serif;">
                India’s Premier Marketplace for <span style="color: #000;">Marble & Granite</span>
            </h2>
            <p class="hero-banner-mobile__desc">
                Discover premium quality marble, granite, and natural stones from India’s most trusted vendors.
            </p>

            <div class="hero-banner-mobile__features justify-content-between items-center">
                <span><i class="fa fa-shield-alt"></i> 100% Verified Vendors</span>
                <span><i class="fa fa-map-marker-alt"></i> Kishangarh’s Finest Stones</span>
                <span><i class="fa fa-globe"></i> Worldwide Delivery</span>
            </div>

            <div class="hero-banner-mobile__stones">
                <img src="{{ asset('website-assets/images/backgrounds/home.png') }}" alt="Stone Bazaar Stones">
            </div>

            <div class="hero-banner-mobile__actions d-flex gap-3">
                <a href="{{ Route('plans') }}" class="btn btn-warning">Get Best Price</a>
                <a href="https://wa.me/919352703082" target="_blank" class="btn btn-outline-dark">Chat on WhatsApp</a>
            </div>
            <hr style="margin:2px 50px; color: #000000; opacity: 1;">
        </div>
    </section>

    <!-- Mobile Stats Section -->
    <section class="stats-mobile">
        <div class="text-center" style="padding: 5px;">
            <div class="stats-mobile__grid">
                <div class="stats-mobile__item" style="border-right: #00000032 1px solid;">
                    <i class="fa fa-layer-group"></i>
                    <h4>500+</h4>
                    <p>Premium Products</p>
                </div>
                <div class="stats-mobile__item" style="border-right: #00000032 1px solid;">
                    <i class="fa fa-shield-alt"></i>
                    <h4>200+</h4>
                    <p>Verified Vendors</p>
                </div>
                <div class="stats-mobile__item" style="border-right: #00000032 1px solid;">
                    <i class="fa fa-map-marker-alt"></i>
                    <h4>300+</h4>
                    <p>Cities Served</p>
                </div>
                <div class="stats-mobile__item">
                    <i class="fa fa-globe"></i>
                    <h4>20+</h4>
                    <p>Countries Exported</p>
                </div>
            </div>
        </div>
    </section>



    <!-- services start -->
    <section id="vendors" class="services-two section-space-two bg-white-texture">
        <div class="container">
            <div class="services-two__top">
                <div class="row gutter-y-50 align-items-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="sec-title @@extraClassName">

                            <h6 class="sec-title__tagline">sellers</h6><!-- /.sec-title__tagline -->

                            <h3 class="sec-title__title text-dark">We Connects Best Marbles and Granite Dealers with you</h3>
                            <!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->


                    </div><!-- /.col-lg-8 -->
                </div><!-- /.row -->
            </div><!-- /.services-two__top -->
        </div><!-- /.container -->
        <div class="container-fluid">
            <div class="services-two__carousel floens-owl__carousel floens-owl__carousel--basic-nav owl-carousel owl-theme"
                data-owl-options='{
                    "items": 1,
                    "margin": 0,
                    "loop": true,
                    "smartSpeed": 700,
                    "nav": true,
                    "navText": ["<span class=\"icon-slide-left-arrow\"></span>","<span class=\"icon-slide-right-arrow\"></span>"],
                    "dots": false,
                    "autoplay": 600,
                    "responsive":{
                        "0":{
                            "items": 1,
                            "margin": 15
                        },
                        "576":{
                            "items": 1,
                            "margin": 15
                        },
                        "768":{
                            "items": 2,
                            "margin": 30
                        },
                        "992":{
                            "items": 2,
                            "margin": 30
                        },
                        "1200":{
                            "items": 3,
                            "margin": 30
                        },
                        "1400":{
                            "items": 3,
                            "margin": 30
                        },
                        "1600":{
                            "items": 4,
                            "margin": 30
                        }
                    }
                }'>
                @foreach ($sellers as $seller)
                    <div class="item">
                        <div class="service-card-two">
                            <div class="service-card-two__bg"
                                style="background-image: url('{{ $seller->seller->banner ?? asset('website-assets/images/services/service-bg-2-1.png') }}');">
                            </div>
                            <!-- /.service-card-two__bg -->
                            <div class="service-card-two__image">
                                @php
                                    $image =
                                        $seller->seller->warehouse_image ??
                                        ($seller->seller->office_image ??
                                            ($seller->seller->logo ??
                                                asset('website-assets/images/services/service-2-1.jpg')));
                                @endphp

                                <img src="{{ $image }}" alt="{{ $seller->seller->business_name }}"
                                    class="fixed-img">
                            </div>
                            <!-- /.service-card-two__image -->
                            <div class="service-card-two__content">
                                <h3 class="service-card-two__title"><a
                                        href="{{ Route('seller', ['id' => $seller->id]) }}">{{ $seller->seller->business_name ?? $seller->name }}</a>
                                </h3><!-- /.service-card-two__title -->
                                <div class="service-card-two__bottom">
                                    <a href="{{ Route('seller', ['id' => $seller->id]) }}"
                                        class="service-card-two__link floens-btn">
                                        <span>seller details</span>
                                        <i class="icon-right-arrow"></i>
                                    </a>
                                    <span class="service-card-two__icon"><img src="{{ $seller->seller->logo }}"
                                            alt="{{ $seller->seller->business_name ?? $seller->name }}"></span>
                                </div><!-- /.service-card-two__bottom -->
                            </div><!-- /.service-card-two__content -->
                        </div><!-- /.service-card-two -->
                    </div><!-- /.item -->
                @endforeach
            </div><!-- /.services-two__carousel -->
        </div><!-- /.container-fluid -->
        <div class="text-center mt-3">
            <a href="{{ Route('sellers') }}" class="floens-btn">
                <span>Explore all</span>
                <i class="icon-right-arrow"></i>
            </a>
        </div>
    </section><!-- /.services-two section-space-two -->
    <!-- services end -->

    <!-- Mobile Vendors Section -->
    <section class="vendors-mobile">
        <div class="container">
            <!-- Featured Vendors -->
            <div class="vendors-mobile__featured">
                <h3 class="vendors-mobile__title">Featured Verified Vendors</h3>
                @foreach ($sellers as $seller)
                    @php
                        $image =
                            $seller->seller->logo ??
                            ($seller->seller->warehouse_image ??
                                ($seller->seller->office_image ??
                                    asset('website-assets/images/services/service-2-1.jpg')));
                    @endphp

                    <div class="vendors-mobile__vendor">
                        <div class="d-flex gap-3">
                            <img src="{{ $image }}" alt="{{ $seller->seller->business_name }}"
                                style="width: 100px; height: auto;">
                            <div>
                                <h5>{{ $seller->seller->business_name ?? $seller->name }}</h5>
                                <p><i class="fa fa-map-marker-alt"></i> {{ $seller->seller->address }}</p>
                                <a href="{{ Route('seller-products', ['id' => $seller->id]) }}" class="btn btn-sm btn-primary mt-2">View Products</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-center">
                    <a href="{{ Route('sellers') }}">
                        <span>View All Vendors</span>
                        <i class="icon-right-arrow"></i>
                    </a>
                </div>
            </div>
            
            <!-- Explore Stones -->
            <div class="vendors-mobile__stones mt-3">
                <h3 class="vendors-mobile__title">Explore Our Stones</h3>
                <div class="vendors-mobile__list">
                    <div class="vendors-mobile__item">
                        <img src="{{ asset('website-assets/images/backgrounds/marble.jpg') }}" alt="Marble">
                        <div class="py-1 px-2">
                            <p>Marble</p>
                            <p style="font-size: small; font-weight: 100;">Elegant & Timeless</p>
                        </div>
                    </div>
                    <div class="vendors-mobile__item">
                        <img src="{{ asset('website-assets/images/backgrounds/granite.jpg') }}" alt="Granite">
                        <div class="px-2 py-1">
                            <p>Granite</p>
                            <p style="font-size: small; font-weight: 100;">Durable & Strong</p>
                        </div>
                    </div>
                    <div class="vendors-mobile__item">
                        <img src="{{ asset('website-assets/images/backgrounds/greenstone.jpg') }}" alt="Greenstone">
                        <div class="px-2 py-1">
                            <p>Greenstone</p>
                            <p style="font-size: small; font-weight: 100;">Natural Beauty</p>
                        </div>
                    </div>
                    <div class="vendors-mobile__item">
                        <img src="{{ asset('website-assets/images/backgrounds/italian.jpg') }}" alt="Italian Marble">
                        <div class="px-2 py-1">
                            <p>Italian Marble</p>
                            <p style="font-size: small; font-weight: 100;">Elegant & Luxurious</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    
    <!-- about start -->
    <section class="about-two section-space">
        <div class="about-two__bg" style="background-image: url(/website-assets/images/backgrounds/about-bg-2-1.png);">
        </div>
        <!-- /.about-two__bg -->
        <div class="container">
            <div class="row gutter-y-60">
                <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="about-two__image">
                        <div class="about-two__image__inner">
                            <img src="{{ asset('website-assets/images/about/about-2-1.jpg') }}" alt="about"
                                class="about-two__image__one">
                            <div class="about-two__image__inner__inner">
                                <img src="{{ asset('website-assets/images/about/about-2-2.jpg') }}" alt="about"
                                    class="about-two__image__two">
                            </div><!-- /.about-two__image__inner__inner -->
                            <div class="experience about-two__experience">
                                <div class="experience__inner">
                                    <h3 class="experience__year"
                                        style="background-image: url('/website-assets/images/shapes/reliable-shape-1-1.png');">
                                        25
                                    </h3>
                                    <!-- /.experience__year -->
                                    <p class="experience__text">years of <br> experience</p>
                                    <!-- /.experience__text -->
                                </div><!-- /.experience__inner -->
                            </div><!-- /.experience -->
                        </div><!-- /.about-two__image__inner -->
                    </div><!-- /.about-two__image-grid -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="about-two__content">
                        <div class="sec-title sec-title--border">

                            <h6 class="sec-title__tagline">about us</h6><!-- /.sec-title__tagline -->

                            <h3 class="sec-title__title">Your gateway to marble & granite excellence</h3>
                            <!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->


                        <div class="about-two__content__text wow fadeInUp" data-wow-duration="1500ms"
                            data-wow-delay="00ms">
                            <h5 class="about-two__text-title">Connecting people with the timeless beauty of stone</h5>
                            <!-- /.about-two__text-title -->
                            <p class="about-two__text">
                                Stone Bazaar connects end users with trusted dealers, architects, and designers — making it
                                easy to discover, source, and create with the finest stones. We simplify the journey from
                                inspiration to execution, ensuring quality and collaboration at every step.
                            </p>

                        </div><!-- /.about-two__content__text -->
                        <div class="about-two__list wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                            <div class="about-two__list__left">
                                <div class="about-two__list__item">
                                    <span class="icon-tick"></span>
                                    Trusted Dealer Network
                                </div>
                                <div class="about-two__list__item">
                                    <span class="icon-tick"></span>
                                    Verified Quality Stones
                                </div>
                            </div><!-- /.about-two__list__left -->
                            <div class="about-two__list__right">
                                <div class="about-two__list__item">
                                    <span class="icon-tick"></span>
                                    Architect & Designer Collaboration
                                </div>
                                <div class="about-two__list__item">
                                    <span class="icon-tick"></span>
                                    Easy Discovery & Sourcing
                                </div>
                            </div><!-- /.about-two__list__right -->
                        </div><!-- /.about-two__list -->
                        <div class="about-two__button wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                            <a href="about.html" class="floens-btn">
                                <span>more about us</span>
                                <i class="icon-right-arrow"></i>
                            </a><!-- /.floens-btn -->
                        </div><!-- /.about-two__button -->
                    </div><!-- /.about-two__content -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.about-two section-space -->
    <!-- about end -->

    <!-- expertise start -->
    <section class="expertise-one section-space bg-light">
        <div class="container-fluid">
            <div class="row gutter-y-50">
                <div class="col-lg-6">
                    <div class="expertise-one__content">
                        <div class="sec-title sec-title--border">

                            <h6 class="sec-title__tagline">expertise</h6><!-- /.sec-title__tagline -->

                            <h3 class="sec-title__title text-dark">Expert Partners for Architects & Designers</h3>
                            <!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->


                        <p class="expertise-one__text text-dark">Stone Bazaar empowers architects and designers with access to
                            premium marble and granite, curated for projects that demand both beauty and durability. We
                            simplify sourcing, connect you with trusted dealers, and provide inspiration to bring unique
                            design visions to life.</p><!-- /.expertise-one__text -->
                        <div class="expertise-one__progress">
                            <div class="progress-box">
                                <h4 class="progress-box__title text-dark">Material Knowledge</h4><!-- /.progress-box__title -->
                                <div class="progress-box__bar">
                                    <div class="progress-box__bar__inner count-bar" data-percent='90%'>
                                        <div class="progress-box__number count-text">95%</div>
                                    </div>
                                </div><!-- /.progress-box__bar -->
                            </div><!-- /.progress-box -->
                            <div class="progress-box">
                                <h4 class="progress-box__title text-dark">Custom Design Collaboration</h4>
                                <!-- /.progress-box__title -->
                                <div class="progress-box__bar">
                                    <div class="progress-box__bar__inner count-bar" data-percent='70%'>
                                        <div class="progress-box__number count-text">85%</div>
                                    </div>
                                </div><!-- /.progress-box__bar -->
                            </div><!-- /.progress-box -->
                            <div class="progress-box">
                                <h4 class="progress-box__title text-dark">Reliable Sourcing & Delivery</h4>
                                <!-- /.progress-box__title -->
                                <div class="progress-box__bar">
                                    <div class="progress-box__bar__inner count-bar" data-percent='96%'>
                                        <div class="progress-box__number count-text">90%</div>
                                    </div>
                                </div><!-- /.progress-box__bar -->
                            </div><!-- /.progress-box -->
                        </div><!-- /.expertise-one__progress -->
                    </div><!-- /.expertise-one__content -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6 wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="expertise-one__images-grid">
                        <div class="expertise-one__image expertise-one__image--three">
                            <img src="{{ asset('website-assets/images/expertise/expertise-1-4.png') }}" alt="expertise">
                        </div><!-- /.expertise-one__image -->
                    </div><!-- /.expertise-one__images-grid -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.expertise-one section-space -->
    <!-- expertise end -->

    <section class="services-two section-space-two bg-white-texture">
        <div class="container">
            <div class="services-two__top">
                <div class="row gutter-y-50 align-items-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="sec-title @@extraClassName">

                            <h6 class="sec-title__tagline">designers</h6><!-- /.sec-title__tagline -->

                            <h3 class="sec-title__title text-dark">Connect with our Best Architects and Interior Designers
                            </h3>
                            <!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->


                    </div><!-- /.col-lg-8 -->
                </div><!-- /.row -->
            </div><!-- /.services-two__top -->
        </div><!-- /.container -->
        <div class="container-fluid">
            <div class="services-two__carousel floens-owl__carousel floens-owl__carousel--basic-nav owl-carousel owl-theme"
                data-owl-options='{
                    "items": 1,
                    "margin": 0,
                    "loop": true,
                    "smartSpeed": 700,
                    "nav": true,
                    "navText": ["<span class=\"icon-slide-left-arrow\"></span>","<span class=\"icon-slide-right-arrow\"></span>"],
                    "dots": false,
                    "autoplay": 600,
                    "responsive":{
                        "0":{
                            "items": 1,
                            "margin": 15
                        },
                        "576":{
                            "items": 1,
                            "margin": 15
                        },
                        "768":{
                            "items": 2,
                            "margin": 30
                        },
                        "992":{
                            "items": 2,
                            "margin": 30
                        },
                        "1200":{
                            "items": 3,
                            "margin": 30
                        },
                        "1400":{
                            "items": 3,
                            "margin": 30
                        },
                        "1600":{
                            "items": 4,
                            "margin": 30
                        }
                    }
                }'>
                @foreach ($architects as $architect)
                    <div class="item">
                        <div class="service-card-two">
                            <div class="service-card-two__bg"
                                style="background-image: url('{{ $architect->architect->banner ?? asset('website-assets/images/services/service-bg-2-1.png') }}');">
                            </div>
                            <!-- /.service-card-two__bg -->
                            <div class="service-card-two__image">
                                @php
                                    $image =
                                        $architect->architect->logo ??
                                        asset('website-assets/images/services/service-2-1.jpg');
                                @endphp

                                <img src="{{ $image }}" alt="{{ $architect->architect->firm_name }}"
                                    class="fixed-img2">
                            </div>
                            <!-- /.service-card-two__image -->
                            <div class="service-card-two__content">
                                <h3 class="service-card-two__title"><a
                                        href="{{ Route('architect', ['id' => $architect->id]) }}">{{ $architect->architect->firm_name ?? $architect->name }}</a>
                                </h3><!-- /.service-card-two__title -->
                                <div class="service-card-two__bottom">
                                    <a href="{{ Route('architect', ['id' => $architect->id]) }}"
                                        class="service-card-two__link floens-btn">
                                        <span>architect details</span>
                                        <i class="icon-right-arrow"></i>
                                    </a>
                                    <span class="service-card-two__icon"><img src="{{ $architect->architect->logo }}"
                                            alt="{{ $architect->architect->firm_name ?? $architect->name }}"></span>
                                </div><!-- /.service-card-two__bottom -->
                            </div><!-- /.service-card-two__content -->
                        </div><!-- /.service-card-two -->
                    </div><!-- /.item -->
                @endforeach
            </div><!-- /.services-two__carousel -->
        </div><!-- /.container-fluid -->
        <div class="text-center mt-3">
            <a href="{{ Route('architects') }}" class="floens-btn">
                <span>Explore all</span>
                <i class="icon-right-arrow"></i>
            </a>
        </div>
    </section>

    <!-- video start -->
    <section class="video-one">
        <div class="container">
            <div class="video-one__wrapper"
                style="background-image: url(/website-assets/images/backgrounds/video-bg-1.jpg);">
                <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="video-button video-button--large video-popup"
                    style="background-image: url(/website-assets/images/resources/slider-video-bg.png);">
                    <span class="icon-play"></span>
                    <i class="video-button__ripple"></i>
                </a>
            </div><!-- /.video-one__wrapper -->
        </div><!-- /.container -->
    </section><!-- /.video-one -->
    <!-- video end -->

    <!-- projects start -->
    <section class="projects-two projects-two--home section-space-bottom bg-white-texture">
        <div class="projects-two__bg floens-jarallax" data-jarallax data-speed="0.3"
            style="background-image: url(/website-assets/images/backgrounds/projects-bg-2.jpg);"></div>
        <!-- /.projects-two__bg -->
        <div class="container">
            <div class="sec-title sec-title--center">

                <h6 class="sec-title__tagline">complete projects</h6><!-- /.sec-title__tagline -->

                <h3 class="sec-title__title">Our Recent <br> Completed Projects</h3><!-- /.sec-title__title -->
            </div><!-- /.sec-title -->


        </div><!-- /.container -->
        <div class="container-fluid">
            <div class="projects-two__carousel floens-owl__carousel floens-owl__carousel--basic-nav owl-theme owl-carousel"
                data-owl-options='{
        "items": 3,
        "margin": 30,
        "smartSpeed": 700,
        "loop": true,
        "autoWidth": true,
        "autoplay": true,
        "nav": true,
        "dots": false,
        "navText": ["<span class=\"icon-slide-left-arrow\"></span>","<span class=\"icon-slide-right-arrow\"></span>"]
        }'>
                <div class="item">
                    <div class="project-card @@extraClassName">
                        <a href="work-details.html" class="project-card__image">
                            <img src="{{ asset('website-assets/images/works/project-2-3.jpg') }}" alt="Paradise beige">
                        </a><!-- /.project-card__image -->
                        <div class="project-card__content">
                            <h3 class="project-card__tagline">Marble</h3><!-- /.project-card__tagline -->
                            <div class="project-card__links">
                                <div class="project-card__links__inner">
                                    <h3 class="project-card__title"><a href="work-details.html">Paradise Beige</a></h3>
                                    <!-- /.project-card__title -->
                                    <a href="work-details.html" class="project-card__link floens-btn"><span
                                            class="icon-right-arrow"></span></a><!-- /.project-card__link -->
                                </div><!-- /.project-card__links__inner -->
                            </div><!-- /.project-card__links -->
                        </div><!-- /.project-card__content -->
                    </div><!-- /.project-card -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="project-card @@extraClassName">
                        <a href="work-details.html" class="project-card__image">
                            <img src="{{ asset('website-assets/images/works/project-2-4.jpg') }}" alt="Grigio D'istria">
                        </a><!-- /.project-card__image -->
                        <div class="project-card__content">
                            <h3 class="project-card__tagline">Marble</h3><!-- /.project-card__tagline -->
                            <div class="project-card__links">
                                <div class="project-card__links__inner">
                                    <h3 class="project-card__title"><a href="work-details.html">Grigio D'istria</a></h3>
                                    <!-- /.project-card__title -->
                                    <a href="work-details.html" class="project-card__link floens-btn"><span
                                            class="icon-right-arrow"></span></a><!-- /.project-card__link -->
                                </div><!-- /.project-card__links__inner -->
                            </div><!-- /.project-card__links -->
                        </div><!-- /.project-card__content -->
                    </div><!-- /.project-card -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="project-card project-card--large">
                        <a href="work-details.html" class="project-card__image">
                            <img src="{{ asset('website-assets/images/works/project-2-5.jpg') }}" alt="Statuario">
                        </a><!-- /.project-card__image -->
                        <div class="project-card__content">
                            <h3 class="project-card__tagline">Marble</h3><!-- /.project-card__tagline -->
                            <div class="project-card__links">
                                <div class="project-card__links__inner">
                                    <h3 class="project-card__title"><a href="work-details.html">Statuario</a></h3>
                                    <!-- /.project-card__title -->
                                    <a href="work-details.html" class="project-card__link floens-btn"><span
                                            class="icon-right-arrow"></span></a><!-- /.project-card__link -->
                                </div><!-- /.project-card__links__inner -->
                            </div><!-- /.project-card__links -->
                        </div><!-- /.project-card__content -->
                    </div><!-- /.project-card -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="project-card @@extraClassName">
                        <a href="work-details.html" class="project-card__image">
                            <img src="{{ asset('website-assets/images/works/project-2-1.jpg') }}" alt="Lumix">
                        </a><!-- /.project-card__image -->
                        <div class="project-card__content">
                            <h3 class="project-card__tagline">Granite</h3><!-- /.project-card__tagline -->
                            <div class="project-card__links">
                                <div class="project-card__links__inner">
                                    <h3 class="project-card__title"><a href="work-details.html">Lumix</a></h3>
                                    <!-- /.project-card__title -->
                                    <a href="work-details.html" class="project-card__link floens-btn"><span
                                            class="icon-right-arrow"></span></a><!-- /.project-card__link -->
                                </div><!-- /.project-card__links__inner -->
                            </div><!-- /.project-card__links -->
                        </div><!-- /.project-card__content -->
                    </div><!-- /.project-card -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="project-card @@extraClassName">
                        <a href="work-details.html" class="project-card__image">
                            <img src="{{ asset('website-assets/images/works/project-2-2.jpg') }}" alt="Acadian Black">
                        </a><!-- /.project-card__image -->
                        <div class="project-card__content">
                            <h3 class="project-card__tagline">Granite</h3><!-- /.project-card__tagline -->
                            <div class="project-card__links">
                                <div class="project-card__links__inner">
                                    <h3 class="project-card__title"><a href="work-details.html">Acadian Black</a></h3>
                                    <!-- /.project-card__title -->
                                    <a href="work-details.html" class="project-card__link floens-btn"><span
                                            class="icon-right-arrow"></span></a><!-- /.project-card__link -->
                                </div><!-- /.project-card__links__inner -->
                            </div><!-- /.project-card__links -->
                        </div><!-- /.project-card__content -->
                    </div><!-- /.project-card -->
                </div><!-- /.item -->
            </div><!-- /.projects-two__carousel -->
        </div><!-- /.container-fluid -->
    </section><!-- /.projects-two section-space-bottom -->
    <!-- projects end -->

    <!-- faq start -->
    <section class="faq-one section-space bg-white-texture">
        <div class="container">
            <div class="row gutter-y-60">
                <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                    <div class="faq-one__image">
                        <div class="faq-one__image__inner">
                            <img src="{{ asset('website-assets/images/faq/faq-1-1.jpg') }}" alt="faq"
                                class="faq-one__image__one">
                            <img src="{{ asset('website-assets/images/faq/faq-1-2.jpg') }}" alt="faq"
                                class="faq-one__image__two">
                        </div><!-- /.faq-one__image__inner -->
                    </div><!-- /.faq-one__image -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6 wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="200ms">
                    <div class="faq-one__content">
                        <div class="sec-title sec-title--border">

                            <h6 class="sec-title__tagline">Our FAQ</h6><!-- /.sec-title__tagline -->

                            <h3 class="sec-title__title text-dark">Frequently Asked <br> Questions ?</h3><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->


                        <p class="faq-one__text text-dark">Mollis massa turpis, eu sodales sem maximus ut. Nullam condimentum eget
                            arcu nec dapibus. Nullam tincidunt ex ut tempus malesuada.</p><!-- /.faq-one__text -->
                        <div class="faq-accordion floens-accordion" data-grp-name="floens-accordion">
                            <div class="accordion active">
                                <div class="accordion-title">
                                    <h4>
                                        What types of marbles & granites are available from a company?
                                        <span class="accordion-title__icon"></span><!-- /.accordion-title__icon -->
                                    </h4>
                                </div><!-- /.accordian-title -->
                                <div class="accordion-content">
                                    <div class="inner">
                                        <p>Bring to the table win-win survival strategies to ensure proactive domination. At
                                            the
                                            end of the day, going forward, a new normal that has evolved from generation X
                                            is on
                                            the</p>
                                    </div><!-- /.accordian-content -->
                                </div>
                            </div><!-- /.accordian-item -->
                            <div class="accordion">
                                <div class="accordion-title">
                                    <h4>
                                        How do I choose the right marble or granite for my project?
                                        <span class="accordion-title__icon"></span><!-- /.accordion-title__icon -->
                                    </h4>
                                </div><!-- /.accordian-title -->
                                <div class="accordion-content">
                                    <div class="inner">
                                        <p>Bring to the table win-win survival strategies to ensure proactive domination. At
                                            the
                                            end of the day, going forward, a new normal that has evolved from generation X
                                            is on
                                            the</p>
                                    </div><!-- /.accordian-content -->
                                </div>
                            </div><!-- /.accordian-item -->
                            <div class="accordion">
                                <div class="accordion-title">
                                    <h4>
                                        Are there eco-friendly marble or granite options available?
                                        <span class="accordion-title__icon"></span><!-- /.accordion-title__icon -->
                                    </h4>
                                </div><!-- /.accordian-title -->
                                <div class="accordion-content">
                                    <div class="inner">
                                        <p>Bring to the table win-win survival strategies to ensure proactive domination. At
                                            the
                                            end of the day, going forward, a new normal that has evolved from generation X
                                            is on
                                            the</p>
                                    </div><!-- /.accordian-content -->
                                </div>
                            </div><!-- /.accordian-item -->
                        </div>
                    </div><!-- /.faq-one__content -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.faq-one section-space -->
    <!-- faq end -->

    <!-- team start -->
    {{-- <section class="team-one team-one--about section-space-two" id="team">
        <div class="team-one__bg" style="background-image: url('/website-assets/images/backgrounds/team-bg-1-1.png');">
        </div>
        <!-- /.team-one__bg -->
        <div class="container">
            <div class="team-one__top">
                <div class="row gutter-y-50 align-items-center">
                    <div class="col-lg-6">
                        <div class="sec-title @@extraClassName">

                            <h6 class="sec-title__tagline">our team</h6><!-- /.sec-title__tagline -->

                            <h3 class="sec-title__title">Meet our Best Team <br> Members</h3><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->


                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="team-one__top__right">
                            <p class="team-one__top__text">Luctus enim vehicula nec. Ut auctor lobortis sapien et eleifend.
                                Integer ac orci vitae neque porttitor efficitur ac vestibulum orci. Sed tincidunt magna sed
                                leo luctus,</p><!-- /.team-one__top__text -->
                        </div><!-- /.team-one__top__right -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.team-one__top -->
            <div class="team-one__carousel floens-owl__carousel floens-owl__carousel--with-shadow floens-owl__carousel--basic-nav owl-carousel owl-theme"
                data-owl-options='{
			"items": 1,
			"margin": 0,
			"loop": true,
			"smartSpeed": 700,
			"nav": false,
			"navText": ["<span class=\"icon-slide-left-arrow\"></span>","<span class=\"icon-slide-right-arrow\"></span>"],
			"dots": false,
			"autoplay": 600,
			"responsive": {
				"0": {
					"items": 1,
					"nav": true,
                    "dots": false,
					"margin": 10
				},
                "576": {
                    "items": 1,
                    "dots": true,
                    "nav": false,
					"margin": 10
                },
				"768": {
					"items": 2,
                    "nav": false,
                    "dots": true,
					"margin": 30
				},
				"992": {
					"items": 3,
                    "loop": false,
                    "nav": false,
                    "dots": false,
					"margin": 30
				}
			}
		}'>
                <div class="item">
                    <div class="team-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                        <div class="team-card__image">
                            <img src="{{ asset('website-assets/images/team/team-1-1.jpg') }}" alt="Mike Hardson">
                            <div class="team-card__hover">
                                <div class="team-card__social">
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
                                </div><!-- /.team-card__social -->
                                <div class="team-card__identity">
                                    <div class="team-card__identity__inner">
                                        <h3 class="team-card__name"><a href="team-details.html">Mike Hardson</a></h3>
                                        <!-- /.team-card__name -->
                                        <span class="team-card__designation">marketing
                                            manager</span><!-- /.team-card__designation -->
                                    </div><!-- /.team-card__identity__inner -->
                                </div><!-- /.team-card__identity -->
                            </div><!-- /.team-card__hover -->
                        </div><!-- /.team-card__image -->
                    </div><!-- /.team-card -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="team-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='200ms'>
                        <div class="team-card__image">
                            <img src="{{ asset('website-assets/images/team/team-1-2.jpg') }}" alt="Anthony B. Castillo">
                            <div class="team-card__hover">
                                <div class="team-card__social">
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
                                </div><!-- /.team-card__social -->
                                <div class="team-card__identity">
                                    <div class="team-card__identity__inner">
                                        <h3 class="team-card__name"><a href="team-details.html">Anthony B. Castillo</a>
                                        </h3><!-- /.team-card__name -->
                                        <span class="team-card__designation">marketing
                                            manager</span><!-- /.team-card__designation -->
                                    </div><!-- /.team-card__identity__inner -->
                                </div><!-- /.team-card__identity -->
                            </div><!-- /.team-card__hover -->
                        </div><!-- /.team-card__image -->
                    </div><!-- /.team-card -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="team-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='400ms'>
                        <div class="team-card__image">
                            <img src="{{ asset('website-assets/images/team/team-1-3.jpg') }}" alt="david cooper">
                            <div class="team-card__hover">
                                <div class="team-card__social">
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
                                </div><!-- /.team-card__social -->
                                <div class="team-card__identity">
                                    <div class="team-card__identity__inner">
                                        <h3 class="team-card__name"><a href="team-details.html">david cooper</a></h3>
                                        <!-- /.team-card__name -->
                                        <span class="team-card__designation">marketing
                                            manager</span><!-- /.team-card__designation -->
                                    </div><!-- /.team-card__identity__inner -->
                                </div><!-- /.team-card__identity -->
                            </div><!-- /.team-card__hover -->
                        </div><!-- /.team-card__image -->
                    </div><!-- /.team-card -->
                </div><!-- /.item -->
            </div><!-- /.team-one__carousel -->
        </div><!-- /.container -->
    </section><!-- /.team-one section-space-two -->
    <!-- team end -->  --}}

    <!-- testimonials start -->
    <section class="testimonials-two section-space-two bg-white-texture" id="testimonials">
        <div class="container">
            <div class="sec-title sec-title--center">

                <h6 class="sec-title__tagline">testimonial</h6><!-- /.sec-title__tagline -->

                <h3 class="sec-title__title text-dark">What People are Talking <br> About Stone Bazaar</h3>
                <!-- /.sec-title__title -->
            </div><!-- /.sec-title -->


            <div class="testimonials-two__carousel floens-owl__carousel floens-owl__carousel--with-shadow floens-owl__carousel--basic-nav owl-carousel owl-theme"
                data-owl-options='{
                "items": 1,
                "margin": 0,
                "loop": true,
                "smartSpeed": 700,
                "nav": false,
                "navText": ["<span class=\"icon-slide-left-arrow\"></span>","<span class=\"icon-slide-right-arrow\"></span>"],
                "dots": false,
                "autoplay": 600,
                "responsive": {
                    "0": {
                        "items": 1,
                        "nav": true,
                        "dots": false,
                        "margin": 10
                    },
                    "576": {
                        "items": 1,
                        "dots": true,
                        "nav": false,
                        "margin": 10
                    },
                    "768": {
                        "items": 1,
                        "dots": true,
                        "nav": false,
                        "margin": 10
                    },
                    "992": {
                        "items": 2,
                        "loop": false,
                        "nav": false,
                        "dots": false,
                        "margin": 30
                    }
                }
            }'>
                <div class="item">
                    <div class="testimonials-card @@extraClassName">
                        <div class="testimonials-card__bg"
                            style="background-image: url(/website-assets/images/testimonials/testimonials-card-bg.png);">
                        </div>
                        <!-- /.testimonials-card__bg -->
                        <div class="testimonials-card__top">
                            <div class="floens-ratings @@extraClassName">
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                            </div><!-- /.product-ratings -->
                            <a href="https://www.youtube.com/watch?v=h9MbznbxlLc"
                                class="testimonials-card__video video-button video-popup">
                                <span class="icon-play"></span>
                                <i class="video-button__ripple"></i>
                            </a><!-- /.testimonials-card__video -->
                        </div><!-- /.testimonials-card__top -->
                        <div class="testimonials-card__content">
                            <div class="testimonials-card__content__inner">
                                <p class="testimonials-card__text">"I recently worked with <a href="about.html"
                                        class="testimonials-card__text__highlight">Stone Bazaar</a> for my home renovation
                                    project, and I couldn't be happier with the results. From the moment I walked into their
                                    showroom, I was impressed by the extensive selection</p>
                                <!-- /.testimonials-card__text -->
                            </div><!-- /.testimonials-card__content__inner -->
                            <div class="testimonials-card__person">
                                <div class="testimonials-card__person__inner">
                                    <img src="{{ asset('website-assets/images/testimonials/testimonials-1-1.jpg') }}"
                                        alt="Michael G. Ware" class="testimonials-card__person__image">
                                    <div class="testimonials-card__person__info">
                                        <h3 class="testimonials-card__person__name">Michael G. Ware</h3>
                                        <!-- /.testimonials-card__person__name -->
                                        <span class="testimonials-card__person__designation">managing
                                            director</span><!-- /.testimonials-card__person__designation -->
                                    </div><!-- /.testimonials-card__person__info -->
                                </div><!-- /.testimonials-card__person__inner -->
                            </div><!-- /.testimonials-card__person -->
                        </div><!-- /.testimonials-card__content -->
                        <div class="testimonials-card__quotes"
                            style='background-image: url(/website-assets/images/testimonials/testimonials-quote-bg-1-1.jpg);'>
                            <svg class="testimonials-card__quotes__icon" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 52 38" fill="none">
                                <path d="M0 23.7248H10.3849L3.46157 37.5713H13.8465L20.7698 23.7248V2.95508H0V23.7248Z" />
                                <path
                                    d="M27.6929 2.95508V23.7248H38.0778L31.1544 37.5713H41.5393L48.4626 23.7248V2.95508H27.6929Z" />
                                <path
                                    d="M13.34 20.2698H3.45508V0.5H23.2248V20.6517L16.4925 34.1162H7.22567L13.7872 20.9934L14.149 20.2698H13.34Z" />
                                <path
                                    d="M41.0328 20.2698H31.1479V0.5H50.9177V20.6517L44.1854 34.1162H34.9185L41.48 20.9934L41.8419 20.2698H41.0328Z" />
                            </svg>
                        </div><!-- /.testimonials-card__quotes -->
                    </div><!-- /.testimonials-card -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="testimonials-card @@extraClassName">
                        <div class="testimonials-card__bg"
                            style="background-image: url(/website-assets/images/testimonials/testimonials-card-bg.png);">
                        </div>
                        <!-- /.testimonials-card__bg -->
                        <div class="testimonials-card__top">
                            <div class="floens-ratings @@extraClassName">
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                            </div><!-- /.product-ratings -->
                            <a href="https://www.youtube.com/watch?v=h9MbznbxlLc"
                                class="testimonials-card__video video-button video-popup">
                                <span class="icon-play"></span>
                                <i class="video-button__ripple"></i>
                            </a><!-- /.testimonials-card__video -->
                        </div><!-- /.testimonials-card__top -->
                        <div class="testimonials-card__content">
                            <div class="testimonials-card__content__inner">
                                <p class="testimonials-card__text">"I recently worked with <a href="about.html"
                                        class="testimonials-card__text__highlight">Stone Bazaar</a> for my home renovation
                                    project, and I couldn't be happier with the results. From the moment I walked into their
                                    showroom, I was impressed by the extensive selection</p>
                                <!-- /.testimonials-card__text -->
                            </div><!-- /.testimonials-card__content__inner -->
                            <div class="testimonials-card__person">
                                <div class="testimonials-card__person__inner">
                                    <img src="{{ asset('website-assets/images/testimonials/testimonials-1-2.jpg') }}"
                                        alt="Anthony B. Castillo" class="testimonials-card__person__image">
                                    <div class="testimonials-card__person__info">
                                        <h3 class="testimonials-card__person__name">Anthony B. Castillo</h3>
                                        <!-- /.testimonials-card__person__name -->
                                        <span class="testimonials-card__person__designation">managing
                                            director</span><!-- /.testimonials-card__person__designation -->
                                    </div><!-- /.testimonials-card__person__info -->
                                </div><!-- /.testimonials-card__person__inner -->
                            </div><!-- /.testimonials-card__person -->
                        </div><!-- /.testimonials-card__content -->
                        <div class="testimonials-card__quotes"
                            style='background-image: url(/website-assets/images/testimonials/testimonials-quote-bg-1-2.jpg);'>
                            <svg class="testimonials-card__quotes__icon" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 52 38" fill="none">
                                <path d="M0 23.7248H10.3849L3.46157 37.5713H13.8465L20.7698 23.7248V2.95508H0V23.7248Z" />
                                <path
                                    d="M27.6929 2.95508V23.7248H38.0778L31.1544 37.5713H41.5393L48.4626 23.7248V2.95508H27.6929Z" />
                                <path
                                    d="M13.34 20.2698H3.45508V0.5H23.2248V20.6517L16.4925 34.1162H7.22567L13.7872 20.9934L14.149 20.2698H13.34Z" />
                                <path
                                    d="M41.0328 20.2698H31.1479V0.5H50.9177V20.6517L44.1854 34.1162H34.9185L41.48 20.9934L41.8419 20.2698H41.0328Z" />
                            </svg>
                        </div><!-- /.testimonials-card__quotes -->
                    </div><!-- /.testimonials-card -->
                </div><!-- /.item -->
            </div><!-- /.testimonials-two__carousel -->
        </div><!-- /.container -->
    </section><!-- /.testimonials-two section-space-two -->
    <!-- testimonials end -->

    <!-- evaluation schedule start -->
    <section class="evaluation-schedule floens-jarallax" data-jarallax data-speed="0.3"
        style="background-image: url('/website-assets/images/backgrounds/evaluation-schedule-bg-1.jpg');">
        <div class="container-fluid">
            <div class="evaluation-schedule__content">
                <h5 class="evaluation-schedule__tagline">Let us change your home look</h5>
                <!-- /.evaluation-schedule__tagline -->
                <h2 class="evaluation-schedule__title">A Complete Solution for
                    Your Vision</h2><!-- /.evaluation-schedule__title -->
                <a href="about.html" class="evaluation-schedule__btn floens-btn">
                    <span>Schedule a Free Evaluation</span>
                    <i class="icon-right-arrow"></i>
                </a><!-- /.evaluation-schedule__btn floens-btn -->
            </div><!-- /.evaluation-schedule__content -->
        </div><!-- /.container -->
    </section><!-- /.evaluation-schedule -->
    <!-- evaluation schedule end -->

    <!-- gallery instagram end -->
    <section class="gallery-instagram gallery-instagram--two section-space-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms"
                    data-wow-delay="00ms">
                    <div class="gallery-instagram__image">
                        <img src="{{ asset('website-assets/images/gallery/gallery-instagram-1-1.jpg') }}"
                            alt="gallery-instagram">
                        <a href="https://www.instagram.com/" class="gallery-instagram__image__link">
                            <span class="icon-instagram"></span>
                        </a><!-- /.gallery-instagram__image__link -->
                    </div><!-- /.gallery-instagram__image -->
                </div><!-- /.col-xl-2 col-lg-3 col-md-4 col-sm-6 -->
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms"
                    data-wow-delay="200ms">
                    <div class="gallery-instagram__image">
                        <img src="{{ asset('website-assets/images/gallery/gallery-instagram-1-2.jpg') }}"
                            alt="gallery-instagram">
                        <a href="https://www.instagram.com/" class="gallery-instagram__image__link">
                            <span class="icon-instagram"></span>
                        </a><!-- /.gallery-instagram__image__link -->
                    </div><!-- /.gallery-instagram__image -->
                </div><!-- /.col-xl-2 col-lg-3 col-md-4 col-sm-6 -->
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms"
                    data-wow-delay="400ms">
                    <div class="gallery-instagram__image">
                        <img src="{{ asset('website-assets/images/gallery/gallery-instagram-1-3.jpg') }}"
                            alt="gallery-instagram">
                        <a href="https://www.instagram.com/" class="gallery-instagram__image__link">
                            <span class="icon-instagram"></span>
                        </a><!-- /.gallery-instagram__image__link -->
                    </div><!-- /.gallery-instagram__image -->
                </div><!-- /.col-xl-2 col-lg-3 col-md-4 col-sm-6 -->
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms"
                    data-wow-delay="600ms">
                    <div class="gallery-instagram__image">
                        <img src="{{ asset('website-assets/images/gallery/gallery-instagram-1-4.jpg') }}"
                            alt="gallery-instagram">
                        <a href="https://www.instagram.com/" class="gallery-instagram__image__link">
                            <span class="icon-instagram"></span>
                        </a><!-- /.gallery-instagram__image__link -->
                    </div><!-- /.gallery-instagram__image -->
                </div><!-- /.col-xl-2 col-lg-3 col-md-4 col-sm-6 -->
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms"
                    data-wow-delay="800ms">
                    <div class="gallery-instagram__image">
                        <img src="{{ asset('website-assets/images/gallery/gallery-instagram-1-5.jpg') }}"
                            alt="gallery-instagram">
                        <a href="https://www.instagram.com/" class="gallery-instagram__image__link">
                            <span class="icon-instagram"></span>
                        </a><!-- /.gallery-instagram__image__link -->
                    </div><!-- /.gallery-instagram__image -->
                </div><!-- /.col-xl-2 col-lg-3 col-md-4 col-sm-6 -->
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms"
                    data-wow-delay="1000ms">
                    <div class="gallery-instagram__image">
                        <img src="{{ asset('website-assets/images/gallery/gallery-instagram-1-6.jpg') }}"
                            alt="gallery-instagram">
                        <a href="https://www.instagram.com/" class="gallery-instagram__image__link">
                            <span class="icon-instagram"></span>
                        </a><!-- /.gallery-instagram__image__link -->
                    </div><!-- /.gallery-instagram__image -->
                </div><!-- /.col-xl-2 col-lg-3 col-md-4 col-sm-6 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.gallery-instagram section-space-bottom -->
    <!-- gallery instagram end -->

    <!-- blog start -->
    <section class="blog-one blog-one--home-two section-space-two bg-white-texture">
        <div class="container">
            <div class="blog-one__top">
                <div class="row gutter-y-50 align-items-center">
                    <div class="col-lg-8">
                        <div class="sec-title @@extraClassName">

                            <h6 class="sec-title__tagline">news room</h6><!-- /.sec-title__tagline -->

                            <h3 class="sec-title__title text-dark">See Latest News <br> from the Blog Posts</h3>
                            <!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->


                    </div><!-- /.col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="blog-one__top__button">
                            <a href="blog-grid-right.html" class="floens-btn floens-btn--border">
                                <span>view all</span>
                                <i class="icon-right-arrow"></i>
                            </a><!-- /.floens-btn floens-btn--border -->
                        </div><!-- /.blog-one__top__button -->
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.blog-one__top -->
            <div class="row gutter-y-30">
                <div class="col-md-6 col-lg-4">
                    <div class="blog-card blog-card--two wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                        <ul class="list-unstyled blog-card__meta">
                            <li><a href="#"><i class="icon-user"></i> by Admin</a></li>
                            <li><a href="#"><i class="icon-comment"></i> 2 Comments</a></li>
                        </ul><!-- /.list-unstyled blog-card__meta -->
                        <div class="blog-card__content">
                            <h3 class="blog-card__title"><a href="blog-details-right.html">Talk About the Three Major
                                    Types of Flooring Marbles</a></h3><!-- /.blog-card__title -->
                        </div><!-- /.blog-card__content -->
                        <div class="blog-card__image">
                            <img src="{{ asset('website-assets/images/blog/blog-1-2.jpg') }}"
                                alt="Talk About the Three Major Types of Floor Tiles">
                            <a href="blog-details-right.html" class="blog-card__image__link"><span class="sr-only">Talk
                                    About the Three Major Types of Flooring Marbles</span>
                                <!-- /.sr-only --></a>
                        </div><!-- /.blog-card__image -->
                        <div class="blog-card__date">
                            <span class="blog-card__date__day">20</span>
                            <span class="blog-card__date__month">june</span>
                        </div><!-- /.blog-card__date -->
                    </div><!-- /.blog-card -->
                </div><!-- /.col-md-6 col-lg-4 -->
                <div class="col-md-6 col-lg-4">
                    <div class="blog-card blog-card--two wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='200ms'>
                        <ul class="list-unstyled blog-card__meta">
                            <li><a href="#"><i class="icon-user"></i> by Admin</a></li>
                            <li><a href="#"><i class="icon-comment"></i> 2 Comments</a></li>
                        </ul><!-- /.list-unstyled blog-card__meta -->
                        <div class="blog-card__content">
                            <h3 class="blog-card__title"><a href="blog-details-right.html">Talk About the Three Major
                                    Types of Flooring Marbles</a></h3><!-- /.blog-card__title -->
                        </div><!-- /.blog-card__content -->
                        <div class="blog-card__image">
                            <img src="{{ asset('website-assets/images/blog/blog-1-3.jpg') }}"
                                alt="Talk About the Three Major Types of Floor Tiles">
                            <a href="blog-details-right.html" class="blog-card__image__link"><span class="sr-only">Talk
                                    About the Three Major Types of Flooring Marbles</span>
                                <!-- /.sr-only --></a>
                        </div><!-- /.blog-card__image -->
                        <div class="blog-card__date">
                            <span class="blog-card__date__day">22</span>
                            <span class="blog-card__date__month">june</span>
                        </div><!-- /.blog-card__date -->
                    </div><!-- /.blog-card -->
                </div><!-- /.col-md-6 col-lg-4 -->
                <div class="col-md-6 col-lg-4">
                    <div class="blog-card blog-card--two wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='400ms'>
                        <ul class="list-unstyled blog-card__meta">
                            <li><a href="#"><i class="icon-user"></i> by Admin</a></li>
                            <li><a href="#"><i class="icon-comment"></i> 2 Comments</a></li>
                        </ul><!-- /.list-unstyled blog-card__meta -->
                        <div class="blog-card__content">
                            <h3 class="blog-card__title"><a href="blog-details-right.html">Talk About the Three Major
                                    Types of Flooring Marbles</a></h3><!-- /.blog-card__title -->
                        </div><!-- /.blog-card__content -->
                        <div class="blog-card__image">
                            <img src="{{ asset('website-assets/images/blog/blog-1-10.jpg') }}"
                                alt="Talk About the Three Major Types of Floor Tiles">
                            <a href="blog-details-right.html" class="blog-card__image__link"><span class="sr-only">Talk
                                    About the Three Major Types of Flooring Marbles</span>
                                <!-- /.sr-only --></a>
                        </div><!-- /.blog-card__image -->
                        <div class="blog-card__date">
                            <span class="blog-card__date__day">8</span>
                            <span class="blog-card__date__month">june</span>
                        </div><!-- /.blog-card__date -->
                    </div><!-- /.blog-card -->
                </div><!-- /.col-md-6 col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.blog-one section-space-two -->
    <!-- blog end -->
@endsection
@section('js-content')
@endsection

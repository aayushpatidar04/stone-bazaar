@extends('website.index-main')
@section('title', $seller->seller->business_name ?? $seller->name)
@section('css-content')
    <style>
        .fixed-img {
            width: 100%;
            /* full width of container */
            height: 250px;
            /* fixed height */
            object-fit: cover;
            /* crop to fit nicely */
        }

        .fixed-img2 {
            width: auto;
            height: 350px !important;
        }
        
        .error{
            color: red;
        }
    </style>
@endsection
@section('content')
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url({{ $seller->seller->banner }});"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <img src="{{ $seller->seller->logo ?? asset('assets/images/logo.png') }}"
                alt="{{ $seller->seller->business_name ?? $seller->name }}" style="max-width: 200px; height: auto;">
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    @if($seller->seller->description)
    <section class="team-details section-space">
        <div class="container">
            <div class="team-details__inner wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                <div class="team-details__image">
                    <img src="{{ $seller->seller->warehouse_image ? $seller->seller->warehouse_image : $seller->office_image }}"
                        alt="{{ $seller->seller->business_name ?? $seller->name }}"
                        style="height: 100%; object-fit: cover;">
                </div><!-- /.team-details__image -->
                <div class="team-details__content">
                    <div class="team-details__top">
                        <div class="team-details__identity">
                            <h4 class="team-details__name">{{ $seller->seller->business_name ?? $seller->name }}</h4>
                            <!-- /.team-details__name -->
                            <span class="team-details__designation">{{ $seller->name }}</span>
                            <!-- /.team-details__designation -->
                        </div><!-- /.team-details__identity -->

                    </div><!-- /.team-details__top -->
                    <div class="team-details__description">
                        {!! $seller->seller->description !!}
                    </div><!-- /.team-details__description -->
                    <img src="{{ $seller->seller->logo }}" alt="{{ $seller->name }}" style="max-width: 80px; height:auto;">
                    <ul class="team-details__info">
                        <li>
                            <span class="icon-location-2"></span>
                            @php
                                $coords = $seller->seller->geo_location
                                    ? json_decode($seller->seller->geo_location, true)
                                    : null;
                            @endphp

                            @if (!empty($coords) && isset($coords[0], $coords[1]))
                                <a class="text-dark"
                                    href="https://www.google.com/maps?q={{ $coords[0] }},{{ $coords[1] }}"
                                    target="_blank">
                                    {{ $seller->seller->address }}
                                </a>
                            @else
                                <a class="text-muted">{{ $seller->seller->address }}</a>
                            @endif


                        </li>
                    </ul><!-- /.team-details__info -->
                </div><!-- /.team-details__content -->
            </div><!-- /.team-details__inner -->
        </div><!-- /.container -->
    </section><!-- /.team-details section-space -->
    @endif

    @if($seller->seller->about)
    <section class="team-skills-one">
        <div class="container">
            @if ($seller->seller->about)
                <div class="team-skills-one__info">
                    <div class="team-skills-one__content">
                        <h3 class="team-skills-one__title">Objective</h3><!-- /.team-skills-one__title -->
                        <div class="team-skills-one__description wow fadeInUp" data-wow-duration="1500ms"
                            data-wow-delay="00ms">
                            <p class="team-skills-one__text">
                                {!! nl2br(e($seller->seller->about)) !!}
                            </p>

                            <!-- /.team-skills-one__text -->
                        </div><!-- /.team-skills-one__description -->
                    </div><!-- /.team-skills-one__content -->
                </div><!-- /.team-skills-one__info -->
            @endif
        </div><!-- /.container -->
    </section><!-- /.team-skills-one -->
    @endif

    @if($sellerProducts->count() > 0)
    <section class="team-details product-page--carousel" style="padding: 50px 0;">
        <div class="container-fluid">
            <div class="text-center">
                <h3 class="sec-title__title mb-2 text-dark">Varieties we provide</h3>
            </div>
            <div class="product-page__carousel floens-owl__carousel floens-owl__carousel--basic-nav owl-carousel owl-theme"
                data-owl-options='{
                    "items": 1,
                    "margin": 0,
                    "loop": true,
                    "smartSpeed": 700,
                    "nav": true,
                    "navText": ["<span class=\"icon-slide-left-arrow\"></span>","<span class=\"icon-slide-right-arrow\"></span>"],
                    "dots": true,
                    "autoplay": true,
                    "responsive": {
                        "0": {
                            "items": 1,
                            "margin": 10
                        },
                        "768": {
                            "items": 2,
                            "margin": 30
                        },
                        "992": {
                            "items": 3,
                            "margin": 30
                        },
                        "1200": {
                            "items": 4,
                            "margin": 30
                        }
                    }
                }'>
                @foreach ($sellerProducts as $product)
                    @php
                        $displayImage = collect($product->images)->firstWhere('type', 'display');
                    @endphp
                    <div class="item">
                        <a href="{{ Route('product-details', ['id' => $product->id]) }}">
                            <div class="product__item wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                                <div class="product__item__image">
                                    <img src="{{ $displayImage['image'] }}" class="fixed-img2"
                                        alt="$product->name">
                                </div><!-- /.product-image -->
                            </div><!-- /.product-item -->
                            <div class="text-center text-dark mt-2">
                                {{ $product->name }}
                            </div>
                        </a>
                    </div><!-- /.item -->
                @endforeach
                
            </div><!-- /.product-page__carousel -->
            <div class="text-center mt-2">
                <a href="{{ Route('seller-products', ['id' => $seller->id]) }}" class="floens-btn"><span>View All</span><i class="icon-right-arrow"></i></a>
            </div>
        </div><!-- /.container -->
    </section><!-- /.product-page section-space-bottom -->
    @endif

    @if($sellerGallery->count() > 0)
    <section class="gallery-one" style="padding: 50px 0;">
        <div class="container">
            <div class="text-center">
                <h3 class="sec-title__title mb-2 text-dark">Gallery</h3>
                <ul class="list-unstyled post-filter gallery-one__filter__list">
                    <li class="active" data-filter=".filter-item"><span>all</span></li>
                    @foreach ($sellerGallery as $type => $images)
                    <li data-filter=".{{ \Illuminate\Support\Str::slug($type, '-') }}"><span>{{ \Illuminate\Support\Str::slug($type, '-') }}</span></li>
                    @endforeach
                </ul><!-- /.list-unstyledf -->
            </div><!-- /.text-center -->
            <div class="row masonry-layout filter-layout" style="justify-content: center;">
                @foreach ($sellerGallery as $type => $images)
                    @foreach ($images as $gallery)
                        <div
                            class="col-sm-6 col-xl-3 mb-1 filter-item {{ \Illuminate\Support\Str::slug($gallery->type, '-') }}">
                            <div class="gallery-one__card">
                                <img src="{{ $gallery->image }}" class="fixed-img" alt="{{ $gallery->type }}">
                                <div class="gallery-one__card__hover">
                                    <a href="{{ $gallery->image }}" class="img-popup">
                                        <span class="gallery-one__card__icon"></span>
                                    </a>
                                </div><!-- /.gallery-one__card__hover -->
                            </div><!-- /.gallery-one__card -->
                        </div><!-- /.col-sm-6 col-xl-3 -->
                    @endforeach
                @endforeach
            </div><!-- /.row -->
            <div class="text-center mt-2">
                <a href="{{ Route('seller-gallery', ['id' => $seller->id]) }}" class="floens-btn"><span>View All</span><i class="icon-right-arrow"></i></a>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @endif

    @if($seller->sellerAwards->count() > 0)
    <section class="team-details product-page--carousel" style="padding: 50px 0;">
        <div class="container-fluid">
            <div class="text-center">
                <h3 class="sec-title__title mb-2 text-dark">Honors & Achievements</h3>
            </div>
            <div class="product-page__carousel floens-owl__carousel floens-owl__carousel--basic-nav owl-carousel owl-theme"
                data-owl-options='{
                    "items": 1,
                    "margin": 0,
                    "loop": true,
                    "smartSpeed": 700,
                    "nav": true,
                    "navText": ["<span class=\"icon-slide-left-arrow\"></span>","<span class=\"icon-slide-right-arrow\"></span>"],
                    "dots": true,
                    "autoplay": true,
                    "responsive": {
                        "0": {
                            "items": 1,
                            "margin": 10
                        },
                        "768": {
                            "items": 2,
                            "margin": 30
                        },
                        "992": {
                            "items": 3,
                            "margin": 30
                        },
                        "1200": {
                            "items": 4,
                            "margin": 30
                        }
                    }
                }'>
                @foreach ($seller->sellerAwards as $award)
                    <div class="item">
                        <a href="javascript:void(0)">
                            <div class="product__item wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                                <div class="product__item__image">
                                    <img src="{{ $award->image }}" class="fixed-img2"
                                        alt="$award->name">
                                </div><!-- /.product-image -->
                            </div><!-- /.product-item -->
                            <div class="text-center text-dark mt-2">
                                {{ $award->name }}
                            </div>
                        </a>
                    </div><!-- /.item -->
                @endforeach
                
            </div><!-- /.product-page__carousel -->
        </div><!-- /.container -->
    </section><!-- /.product-page section-space-bottom -->
    @endif

    @if($seller->sellerCertificates->count() > 0)
    <section class="gallery-one product-page--carousel" style="padding: 50px 0;">
        <div class="container-fluid">
            <div class="text-center">
                <h3 class="sec-title__title mb-2 text-dark">Professional Endorsements</h3>
            </div>
            <div class="product-page__carousel floens-owl__carousel floens-owl__carousel--basic-nav owl-carousel owl-theme"
                data-owl-options='{
                    "items": 1,
                    "margin": 0,
                    "loop": true,
                    "smartSpeed": 700,
                    "nav": true,
                    "navText": ["<span class=\"icon-slide-left-arrow\"></span>","<span class=\"icon-slide-right-arrow\"></span>"],
                    "dots": true,
                    "autoplay": true,
                    "responsive": {
                        "0": {
                            "items": 1,
                            "margin": 10
                        },
                        "768": {
                            "items": 2,
                            "margin": 30
                        },
                        "992": {
                            "items": 3,
                            "margin": 30
                        },
                        "1200": {
                            "items": 4,
                            "margin": 30
                        }
                    }
                }'>
                @foreach ($seller->sellerCertificates as $certificate)
                    <div class="item">
                        <a href="">
                            <div class="product__item wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                                <div class="product__item__image">
                                    <img src="{{ $certificate->image }}" class="fixed-img2"
                                        alt="$certificate->name">
                                </div><!-- /.certificate-image -->
                            </div><!-- /.product-item -->
                            <div class="text-center mt-2">
                                {{ $certificate->name }}
                            </div>
                        </a>
                    </div><!-- /.item -->
                @endforeach
                
            </div><!-- /.product-page__carousel -->
        </div><!-- /.container -->
    </section><!-- /.product-page section-space-bottom -->
    @endif

    <section class="contact-one contact-one--team section-space">
        <div class="container">
            <div class="row gutter-y-40">
                <div class="col-lg-6">
                    <div class="contact-one__content">
                        <div class="sec-title sec-title--border">

                            <h6 class="sec-title__tagline">contact</h6><!-- /.sec-title__tagline -->

                            <h3 class="sec-title__title text-dark">Reach out & <br> Connect with Us</h3><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->


                        <p class="contact-one__text">Our vision is to provide innovative, independent project solutions
                            that solve problems for homes, industries, and workspaces, as we would like in
                            our own residences, work spaces.</p><!-- /.contact-one__text -->
                        <div class="contact-one__info wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <div class="contact-one__info__bg"
                                style="background-image: url({{ asset('website-assets/images/shapes/contact-info-bg.png') }});">
                            </div>
                            <!-- /.contact-one__info__bg -->
                            <div class="contact-one__info__content">
                                <div class="contact-one__info__item">
                                    <div class="contact-one__info__item__inner">
                                        <div class="contact-one__info__icon">
                                            <span class="icon-phone-call"></span>
                                        </div><!-- /.contact-one__info__icon -->
                                        <p class="contact-one__info__text"><a href="tel:+919352703082"> +91 9352703082</a></p><!-- /.contact-one__info__text -->
                                    </div><!-- /.contact-one__info__item__inner -->
                                </div><!-- /.contact-one__info__item -->
                                <div class="contact-one__info__item">
                                    <div class="contact-one__info__item__inner">
                                        <div class="contact-one__info__icon">
                                            <span class="icon-paper-plane"></span>
                                        </div><!-- /.contact-one__info__icon -->
                                        <p class="contact-one__info__text"><a
                                                href="mailto:stonebazaar01@gmail.com">stonebazaar01@gmail.com</a></p>
                                        <!-- /.contact-one__info__text -->
                                    </div><!-- /.contact-one__info__item__inner -->
                                </div><!-- /.contact-one__info__item -->
                                <div class="contact-one__info__item">
                                    <div class="contact-one__info__item__inner">
                                        <div class="contact-one__info__icon">
                                            <span class="icon-location"></span>
                                        </div><!-- /.contact-one__info__icon -->
                                        <address class="contact-one__info__text"><a href="#">Stone Bazaar, Kishangarh, Rajasthan (Marble Hub of India)</a></address>
                                        <!-- /.contact-one__info__text -->
                                    </div><!-- /.contact-one__info__item__inner -->
                                </div><!-- /.contact-one__info__item -->
                            </div><!-- /.contact-one__info__content -->
                            <img src="{{ asset('website-assets/images/shapes/contact-shape-1-1.png') }}"
                                alt="contact image" class="contact-one__info__image">
                        </div><!-- /.contact-one__info -->
                    </div><!-- /.contact-one__content -->
                </div><!-- /.col-xl-6 -->
                <div class="col-lg-6">
                    <form method="POST" action="{{ Route('save-seller-enquiry') }}" class="contact-one__form contact-form-validated form-one wow fadeInUp"
                        data-wow-duration="1500ms" data-wow-delay="200ms" action="#">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $seller->id }}" required>
                        <div class="contact-one__form__bg"
                            style="background-image: url({{ asset('website-assets/images/shapes/contact-info-form-bg.png') }});">
                        </div>
                        <!-- /.contact-one__form__bg -->
                        <div class="contact-one__form__top">
                            <h2 class="contact-one__form__title">Get In Touch With Us And Enjoy <br>
                                Top-Notch Support</h2><!-- /.contact-one__form__title -->
                        </div><!-- /.contact-one__form__top -->
                        <div class="form-one__group form-one__group--grid">
                            <div class="form-one__control form-one__control--input form-one__control--full">
                                <input type="text" name="name" placeholder="Your name" value="{{ old('name') }}" required>
                            </div><!-- /.form-one__control form-one__control--full -->
                            <div class="form-one__control form-one__control--input form-one__control--full">
                                <input type="text" name="phone" pattern="[6-9][0-9]{9}" value="{{ old('phone') }}" maxlength="10" minlength="10" placeholder="Your contact number" required>
                            </div><!-- /.form-one__control form-one__control--full -->
                            <div class="form-one__control form-one__control--full">
                                <input type="email" name="email" placeholder="your email" value="{{ old('email') }}">
                            </div><!-- /.form-one__control form-one__control--full -->
                            <div class="form-one__control form-one__control--full">
                                <select class="selectpicker" name="type" aria-label="Choose stone type" required>
                                    <option selected disabled value="">Choose stone type</option>
                                    <option @selected(old('type') == "Italian Marble") value="Italian Marble">Italian Marble</option>
                                    <option @selected(old('type') == "Indian Granite") value="Indian Granite">Indian Granite</option>
                                    <option @selected(old('type') == "Onyx Marble") value="Onyx Marble">Onyx Marble</option>
                                    <option @selected(old('type') == "Travertine") value="Travertine">Travertine</option>
                                    <option @selected(old('type') == "Sandstone") value="Sandstone">Sandstone</option>
                                    <option @selected(old('type') == "Quartzite") value="Quartzite">Quartzite</option>
                                    <option @selected(old('type') == "Black Granite") value="Black Galaxy Granite">Black Galaxy Granite</option>
                                    <option @selected(old('type') == "White Marble") value="White Makrana Marble">White Makrana Marble</option>
                                    <option @selected(old('type') == "Green Marble") value="Green Marble">Green Marble</option>
                                    <option @selected(old('type') == "Other") value="Other">Other</option>
                                </select>

                            </div><!-- /.form-one__control form-one__control--full -->
                            <div class="form-one__control form-one__control--mesgae form-one__control--full">
                                <textarea name="message" placeholder="Write message" required>{{ old('message') }}</textarea><!-- /# -->
                            </div><!-- /.form-one__control -->
                            <div class="form-one__control form-one__control--full">
                                <button type="submit" class="floens-btn">
                                    <span>send message</span>
                                    <i class="icon-right-arrow"></i>
                                </button>
                            </div><!-- /.form-one__control -->
                        </div><!-- /.form-one__group -->
                    </form>
                </div><!-- /.col-xl-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.contact-one section-space -->

    

@endsection
@section('js-content')

@endsection

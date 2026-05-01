@extends('website.index-main')
@section('title', 'Sellers | Stone Bazaar')
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

        .stats-mobile__grid {
            display: flex;
            justify-content: space-between;
            border-radius: 8px;
            box-shadow: #000000 0px 4px 12px;
            border: 1px solid#00000032;
            max-width: 450px;
            margin: 0 auto;
            backdrop-filter: blur(3px);
            background-color: blanchedalmond;
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

        .vendors-mobile {
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
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .vendors-mobile__vendor:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
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
    </style>
@endsection
@section('content')

    <section class="page-header">
        <div class="page-header__bg" style="background: url({{ asset('website-assets/images/backgrounds/banner.png') }});">
        </div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title">Our Verified Sellers</h2>
            <p class="hero-banner__desc">
                Explore trusted marble & granite sellers from Kishangarh and beyond.
            </p>
            <img src="{{ asset('website-assets/images/logo-white.png') }}" alt="Stone Bazaar"
                style="width: 100px; height: auto;">

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
        </div><!-- /.container -->

    </section><!-- /.page-header -->

    {{-- <section class="vendors-mobile">
        <div class="container">
            <!-- Featured Sellers -->
            <div class="vendors-mobile__featured">
                <h3 class="vendors-mobile__title">Verified Sellers</h3>
                <div class="row">
                    @foreach ($sellers as $seller)
                        @php
                            $image =
                                $seller->seller->logo ??
                                ($seller->seller->warehouse_image ??
                                    ($seller->seller->office_image ??
                                        asset('website-assets/images/services/service-2-1.jpg')));
                        @endphp

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="vendors-mobile__vendor">
                                <div class="d-flex gap-3">
                                    <img src="{{ $image }}" alt="{{ $seller->seller->business_name }}"
                                        style="width: 100px; height: auto;">
                                    <div>
                                        <h5>
                                            <a href="{{ Route('seller', ['id' => $seller->id]) }}">
                                                {{ $seller->seller->business_name ?? $seller->name }}
                                            </a>
                                        </h5>
                                        <p><i class="fa fa-map-marker-alt"></i> {{ $seller->seller->address }}</p>
                                        <a href="{{ Route('seller-products', ['id' => $seller->id]) }}"
                                            class="btn btn-sm btn-warning mt-2">View Products</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section> --}}


    <section class="team-one--page section-space bg-white-texture">
        <div class="container">
            <div class="row gutter-y-30">
                @foreach ($sellers as $seller)
                    <div class="col-md-6 col-lg-4">
                        <div class="team-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                            <div class="team-card__image">
                                <img src="{{ $seller->seller->warehouse_image ? $seller->seller->warehouse_image : ($seller->seller->office_image ? $seller->seller->office_image : $seller->seller->logo) }}"
                                    class="fixed-img" alt="{{ $seller->seller->business_name }}">
                                <div class="team-card__hover">
                                    <div class="team-card__social">

                                    </div><!-- /.team-card__social -->
                                    <div class="team-card__identity">
                                        <div class="team-card__identity__inner">
                                            <h3 class="team-card__name"><a
                                                    href="{{ Route('seller', ['id' => $seller->id]) }}">{{ $seller->seller->business_name }}</a>
                                            </h3>
                                            <!-- /.team-card__name -->
                                            <span
                                                class="team-card__designation">{{ $seller->name }}</span><!-- /.team-card__designation -->
                                        </div><!-- /.team-card__identity__inner -->
                                    </div><!-- /.team-card__identity -->
                                </div><!-- /.team-card__hover -->
                            </div><!-- /.team-card__image -->
                        </div><!-- /.team-card -->
                    </div><!-- /.col-md-6 col-lg-4 -->
                @endforeach
                <div class="col-12">
                    {{ $sellers->links('vendor.pagination.custom') }}
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.team-one section-space -->


@endsection
@section('js-content')

@endsection

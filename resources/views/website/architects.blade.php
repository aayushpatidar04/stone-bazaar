@extends('website.index-main')
@section('title', 'Architects | Stone Bazaar')
@section('css-content')
    <style>
        .fixed-img {
            width: auto;
            /* full width of container */
            height: 280px;
            /* fixed height */
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
            position: relative;
            overflow: hidden;
        }

        .vendors-mobile__vendor::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: inherit; /* use the same inline background */
            background-size: cover;
            background-position: center;
            filter: blur(2px);          /* apply blur */
            transform: scale(1.05);     /* avoid edges showing */
            z-index: 0;
        }

        .vendors-mobile__vendor > * {
            position: relative;
            z-index: 1; /* keep content above blurred background */
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
        <div class="page-header__bg"
            style="background: url({{ asset('website-assets/images/backgrounds/banner.png') }});"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title">Architects</h2>
            <img src="{{ asset('assets/images/logo-white.png') }}" alt="Stone Bazaar" style="width: 100px; height: auto;">
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    {{-- <section class="vendors-mobile">
        <div class="container">
            <!-- Featured Sellers -->
            <div class="vendors-mobile__featured">
                <h3 class="vendors-mobile__title">Verified Architects</h3>
                <div class="row">
                    @foreach ($architects as $architect)
                        @php
                            $image =
                                $architect->architect->logo ??
                                ($architect->architect->banner ??
                                        asset('website-assets/images/services/service-2-1.jpg'));
                            
                            $banner = $architect->architect->banner ?? asset('website-assets/images/services/service-2-1.jpg');
                        @endphp

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="vendors-mobile__vendor" style="background-image: url('{{ $banner }}');">
                                <div class="d-flex gap-3">
                                    <img src="{{ $image }}" alt="{{ $architect->architect->firm_name }}"
                                        style="width: 100px; height: auto;">
                                    <div>
                                        <h5>
                                            <a href="{{ Route('architect', ['id' => $architect->id]) }}">
                                                {{ $architect->architect->firm_name ?? $architect->name }}
                                            </a>
                                        </h5>
                                        <p class="text-white mt-1"><i class="fa fa-map-marker-alt"></i> {{ $architect->architect->address }}</p>
                                        <a href="{{ Route('architect', ['id' => $architect->id]) }}"
                                            class="btn btn-sm btn-warning mt-2">View →</a>
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
                @foreach ($architects as $architect)
                    <div class="col-md-6 col-lg-4">
                        <div class="team-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                            <div class="team-card__image" style="background-image: url({{ $architect->architect->banner }})">
                                <img src="{{ $architect->architect->logo }}"
                                    class="fixed-img" alt="{{ $architect->architect->firm_name }}">
                                <div class="team-card__hover">
                                    <div class="team-card__social">

                                    </div><!-- /.team-card__social -->
                                    <div class="team-card__identity">
                                        <div class="team-card__identity__inner">
                                            <h3 class="team-card__name"><a
                                                    href="{{ Route('architect', ['id' => $architect->id]) }}">{{ $architect->architect->firm_name }}</a>
                                            </h3>
                                            <!-- /.team-card__name -->
                                            <span
                                                class="team-card__designation">{{ $architect->name }}</span><!-- /.team-card__designation -->
                                        </div><!-- /.team-card__identity__inner -->
                                    </div><!-- /.team-card__identity -->
                                </div><!-- /.team-card__hover -->
                            </div><!-- /.team-card__image -->
                        </div><!-- /.team-card -->
                    </div><!-- /.col-md-6 col-lg-4 -->
                @endforeach
                <div class="col-12">
                    {{ $architects->links('vendor.pagination.custom') }}
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.team-one section-space -->
@endsection
@section('js-content')

@endsection

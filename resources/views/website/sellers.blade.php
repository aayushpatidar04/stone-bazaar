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
    </style>
@endsection
@section('content')
    <section class="page-header">
        <div class="page-header__bg"
            style="background: url({{ asset('website-assets/images/backgrounds/slider-3-2.jpg') }});"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title">Sellers</h2>
            <img src="{{ asset('assets/images/logo-white.png') }}" alt="Stone Bazaar" style="width: 100px; height: auto;">
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <section class="team-one team-one--page section-space">
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

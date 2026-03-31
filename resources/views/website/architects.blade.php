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
    </style>
@endsection
@section('content')
    <section class="page-header">
        <div class="page-header__bg"
            style="background: url({{ asset('website-assets/images/backgrounds/slider-3-2.jpg') }});"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title">Architects</h2>
            <img src="{{ asset('assets/images/logo-white.png') }}" alt="Stone Bazaar" style="width: 100px; height: auto;">
        </div><!-- /.container -->
    </section><!-- /.page-header -->

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

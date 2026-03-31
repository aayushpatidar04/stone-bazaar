@extends('website.index-main')
@section('title', 'Subscription Plans | Stone Bazaar')
@section('css-content')

@endsection
@section('content')
    <section class="page-header">
        <div class="page-header__bg"
            style="background: url({{ asset('website-assets/images/backgrounds/slider-3-2.jpg') }});"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title">Subscription Plans</h2>
            <img src="{{ asset('website-assets/images/logo-white.png') }}" alt="Stone Bazaar"
                style="width: 100px; height: auto;">
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <section class="pricing-page section-space">
        <div class="container">
            <div class="sec-title sec-title--center">

                <h3 class="sec-title__title text-dark">Our Flexible Pricing Plan</h3><!-- /.sec-title__title -->
            </div><!-- /.sec-title -->


            <div class="pricing-page__main-tab-box tabs-box">
                <div class="tab-box-buttons">
                    <ul class="tab-buttons">
                        <li data-tab="#Yearly" class="tab-btn active-btn text-dark">Yearly</li>
                        <li data-tab="#Quarterly" class="tab-btn text-dark">
                            <div class="tab-btn__switch">
                                <div class="tab-btn__switch__box"></div>
                                Quarterly
                            </div>
                        </li>
                    </ul><!-- /.tab-buttons -->
                </div><!-- /.tab-box-buttons -->
                <div class="tabs-content">
                    <div class="tab active-tab fadeInUp animated" data-wow-delay="200ms" id="Yearly"
                        style="display: block;">
                        <div class="row gutter-y-30">
                            @foreach ($plans as $plan)
                                <div class="col-lg-4 col-md-6">
                                    <div class="pricing-card" style="height: 100%;">
                                        <div class="pricing-card__top">
                                            <div class="pricing-card__top__content">
                                                <h3 class="pricing-card__title">{{ $plan->name }} Plan</h3>
                                                <!-- /.pricing-card__title -->
                                                <h4 class="pricing-card__price sec-title__title">₹
                                                    {{ round($plan->price_annual * (1 - $plan->discount_percent / 100), -1) }}
                                                    <span>+ GST</span>
                                                </h4>
                                                <!-- /.pricing-card__price -->
                                                <p class="pricing-card__text">Ideal For - {{ $plan->ideal_for }}</p>
                                                <!-- /.pricing-card__text -->
                                            </div><!-- /.pricing-card__top__content -->
                                            <div class="pricing-card__top__bg"
                                                style="background-image: url({{ asset('website-assets/images/pricing/pricing-t-bg-1-2.jpg') }});">
                                            </div><!-- /.pricing-card__top__bg -->
                                        </div><!-- /.pricing-card__top -->
                                        <div class="pricing-card__content">
                                            <div class="pricing-card__content__bg"
                                                style="background-image: url({{ asset('website-assets/images/pricing/pricing-l-bg-1-2.png') }});">
                                            </div><!-- /.pricing-card__content__bg -->
                                            <ul class="pricing-card__list">
                                                @foreach ($plan->benefits as $benefit)
                                                    <li class="active">
                                                        <span class="icon-check2"></span>
                                                        {{ $benefit['value'] }}
                                                    </li>
                                                @endforeach
                                            </ul><!-- /.pricing-card__list -->
                                            <div class="pricing-card__button">
                                                <a href="{{ Route('contact') }}" class="floens-btn pricing-card__btn">
                                                    <span>buy this plan</span>
                                                    <i class="icon-right-arrow"></i>
                                                </a>
                                            </div><!-- /.pricing-card__button -->
                                        </div><!-- /.pricing-card__content -->
                                    </div><!-- /.pricing-card -->
                                </div><!-- /.col-lg-4 col-md-6 -->
                            @endforeach
                        </div><!-- /.row -->
                    </div><!-- /.yearly-tab -->

                    <div class="tab fadeInUp animated" data-wow-delay="200ms" id="Quarterly" style="display: none;">
                        <div class="row gutter-y-30">
                            @foreach ($plans as $plan)
                            <div class="col-lg-4 col-md-6">
                                    <div class="pricing-card" style="height: 100%;">
                                        <div class="pricing-card__top">
                                            <div class="pricing-card__top__content">
                                                <h3 class="pricing-card__title">{{ $plan->name }} Plan</h3>
                                                <!-- /.pricing-card__title -->
                                                <h4 class="pricing-card__price sec-title__title">₹
                                                    {{ round($plan->price_quarterly) }}
                                                    <span>+ GST</span>
                                                </h4>
                                                <!-- /.pricing-card__price -->
                                                <p class="pricing-card__text">Ideal For - {{ $plan->ideal_for }}</p>
                                                <!-- /.pricing-card__text -->
                                            </div><!-- /.pricing-card__top__content -->
                                            <div class="pricing-card__top__bg"
                                                style="background-image: url({{ asset('website-assets/images/pricing/pricing-t-bg-1-2.jpg') }});">
                                            </div><!-- /.pricing-card__top__bg -->
                                        </div><!-- /.pricing-card__top -->
                                        <div class="pricing-card__content">
                                            <div class="pricing-card__content__bg"
                                                style="background-image: url({{ asset('website-assets/images/pricing/pricing-l-bg-1-2.png') }});">
                                            </div><!-- /.pricing-card__content__bg -->
                                            <ul class="pricing-card__list">
                                                @foreach ($plan->benefits as $benefit)
                                                    <li class="active">
                                                        <span class="icon-check2"></span>
                                                        {{ $benefit['value'] }}
                                                    </li>
                                                @endforeach
                                            </ul><!-- /.pricing-card__list -->
                                            <div class="pricing-card__button">
                                                <a href="{{ Route('contact') }}" class="floens-btn pricing-card__btn">
                                                    <span>buy this plan</span>
                                                    <i class="icon-right-arrow"></i>
                                                </a>
                                            </div><!-- /.pricing-card__button -->
                                        </div><!-- /.pricing-card__content -->
                                    </div><!-- /.pricing-card -->
                                </div><!-- /.col-lg-4 col-md-6 -->
                            @endforeach
                        </div><!-- /.row -->
                    </div><!-- /.Quarterly-tab -->
                </div><!-- /.tab-content -->
            </div><!-- /.pricing-page__main-tab-box -->
        </div><!-- /.container -->
    </section><!-- /.pricing-page section-space -->


@endsection
@section('js-content')
    <script>
        const lists = document.querySelectorAll('.pricing-card__list');
        let maxHeight = 0;

        // Find tallest list
        lists.forEach(list => {
            list.style.height = 'auto'; // reset
            if (list.offsetHeight > maxHeight) {
                maxHeight = list.offsetHeight;
            }
        });

        // Apply max height to all lists
        lists.forEach(list => {
            list.style.height = maxHeight + 'px';
        });
    </script>
@endsection

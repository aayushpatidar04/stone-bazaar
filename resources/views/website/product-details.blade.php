@extends('website.index-main')
@section('title', $product->name . ' | ' . ($seller->seller->business_name ? $seller->seller->business_name :
    $seller->name))
@section('css-content')
    <style>
        table.product-details {
            border-collapse: separate;
            border-spacing: 0 12px;
            /* 12px vertical gap between rows */
        }
    </style>
@endsection
@section('content')
    @php
        $displayImage = collect($product->images)->firstWhere('type', 'display');
    @endphp
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url({{ $displayImage['image'] }}); filter: blur(2px);"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title" style="@if(strtolower($product->color) == 'black') text-shadow: -1px -1px 2px white, 1px -1px 2px white, -1px  1px 2px white, 1px  1px 2px white; @else text-shadow: -1px -1px 2px black, 1px -1px 2px black, -1px  1px 2px black, 1px  1px 2px black; @endif">{{ $product->name }}</h2>
            @if ($seller->seller->logo)
                <div>
                    <img src="{{ $seller->seller->logo }}" alt="{{ $seller->seller->business_name ?? $seller->name }}"
                        style="width: 100px; height: auto;">
                </div>
            @endif
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <section class="product-details section-space">
        <div class="container">
            <!-- /.product-details -->
            <div class="row gutter-y-50">
                <div class="col-lg-6 col-xl-6 wow fadeInLeft" data-wow-delay="200ms">
                    <div class="product-details__img">
                        <div class="swiper product-details__gallery-top">
                            <div class="swiper-wrapper bg-dark">
                                @foreach ($product->images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ $image['image'] }}"
                                            style="height: 500px; width: auto; max-width:100%; margin:auto;"
                                            alt="product details image" class="product-details__gallery-top__img">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper product-details__gallery-thumb">
                            <div class="swiper-wrapper">
                                @foreach ($product->images as $image)
                                    <div class="product-details__gallery-thumb-slide swiper-slide">
                                        <img src="{{ $image['image'] }}" style="height: 80px; width: 100%; margin:auto;"
                                            alt="product details thumb" class="product-details__gallery-thumb__img">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div><!-- /.column -->
                <div class="col-lg-6 col-xl-6 wow fadeInRight" data-wow-delay="300ms">
                    <div class="product-details__content">
                        <div class="product-details__top">
                            <div class="product-details__top__left">
                                <h3 class="product-details__name">{{ $product->name }}</h3><!-- /.product-title -->
                                @if ($product->color)
                                    <h4 class="product-details__price">{{ $product->color }}</h4><!-- /.product-price -->
                                @endif
                            </div><!-- /.product-details__price -->
                        </div>
                        @if ($product->quality)
                            <div class="product-details__excerpt">
                                <p class="product-details__excerpt__text1">
                                    {!! nl2br(e($product->quality)) !!}
                                </p>
                            </div><!-- /.excerp-text -->
                        @endif
                        @if ($product->sizes)
                            <table class="my-3 product-details">
                                <tbody>
                                    <tr>
                                        <td style="width: 120px;"><b>Sizes : </b></td>
                                        <td>{{ implode(' | ', array_column($product->sizes, 'value')) }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Finishes : </b></td>
                                        <td>{{ implode(' | ', array_column($product->finishes, 'value')) }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Usage Areas : </b></td>
                                        <td>{{ implode(' | ', array_column($product->usage_area, 'value')) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr style="opacity: 1;">
                        @endif
                        <div class="product-details__excerpt">
                            <p class="product-details__excerpt__text1">
                                {{ ucfirst($product->subcategory->domain->domain) }} is available in various colors,
                                shades, and textures. We love its rich, smooth look and have discovered unique ways to
                                incorporate {{ strtolower($product->subcategory->domain->domain) }} into our homes.
                                Download a guide to understand the brochure details of the {{ $product->name }}.
                            </p>
                        </div><!-- /.product-details__info -->
                        <div class="product-details__buttons">
                            <a href="{{ Route('download-product-catalogue', ['id' => $product->id]) }}"
                                class="product-details__btn-cart floens-btn">
                                <span>Download Catalogue</span>
                                <i class="icon-download"></i>
                            </a>
                        </div><!-- /.qty-btn -->
                    </div>
                </div>
            </div>
            <!-- /.product-details -->
        </div>
        @if ($product->description)
            <div class="product-details__description-wrapper">
                <div class="container">
                    <!-- /.product-description -->
                    <div class="product-details__description">
                        <h3 class="product-details__description__title">Product Description</h3>
                        <div class="product-details__text__box wow fadeInUp" data-wow-delay="300ms">
                            <div class="product-details__description__text">
                                {!! nl2br(e($product->description)) !!}
                            </div>
                        </div><!-- /.product-details__text__box -->
                    </div>
                    <!-- /.product-description -->
                </div><!-- /.container -->
            </div><!-- /.product-details__description__wrapper -->
        @endif

        <div class="container">
            <!-- /.product-comment-form -->
            <div class="product-details__comments-form comments-form">
                <div class="product-details__comments-form__top">
                    <h3 class="product-details__comments-form__title comments-form__title sec-title__title">Product Enquiry
                    </h3><!-- /.comments-form__title -->
                    <p class="product-details__comments-form__text">Your email address will not be published. Required
                        fields are marked *</p>
                </div><!-- /.product-details__comments-form__top -->
                <form method="POST" action="{{ Route('save-product-enquiry') }}" class="comments-form__form contact-form-validated form-one">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="form-one__group form-one__group--grid">
                        <div class="form-one__control form-one__control--input wow fadeInUp" data-wow-duration="1500ms"
                            data-wow-delay="00mms">
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Your name" required>
                        </div><!-- /.form-one__control -->
                        <div class="form-one__control form-one__control--input wow fadeInUp" data-wow-duration="1500ms"
                            data-wow-delay="100mms">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="your email" required>
                        </div><!-- /.form-one__control -->
                        <div class="form-one__control form-one__control--input wow fadeInUp" data-wow-duration="1500ms"
                            data-wow-delay="00mms">
                            <input type="text" name="phone" minlength="10" maxlength="10" pattern="[6-9][0-9]{9}" value="{{ old('phone') }}" placeholder="Your contact number" required>
                        </div><!-- /.form-one__control -->
                        <div class="form-one__control form-one__control--input wow fadeInUp" data-wow-duration="1500ms"
                            data-wow-delay="00mms">
                            <input type="text" name="state" value="{{ old('state') }}" placeholder="Your state" required>
                        </div><!-- /.form-one__control -->
                        <div class="form-one__control form-one__control--input wow fadeInUp" data-wow-duration="1500ms"
                            data-wow-delay="100mms">
                            <input type="text" name="city" value="{{ old('city') }}" placeholder="your city" required>
                        </div><!-- /.form-one__control -->
                        <div class="form-one__control form-one__control--full wow fadeInUp" data-wow-duration="1500ms"
                            data-wow-delay="200mms">
                            <textarea name="message" required placeholder="write message . .">{{ old('message') }}</textarea>
                        </div><!-- /.form-one__control -->
                        <div class="form-one__control form-one__control--full wow fadeInUp" data-wow-duration="1500ms"
                            data-wow-delay="300mms">
                            <button type="submit" class="floens-btn">
                                <span>Send Message</span>
                                <i class="icon-right-arrow"></i>
                            </button>
                        </div><!-- /.form-one__control -->
                    </div><!-- /.form-one__group -->
                </form><!-- /.comments-form__form -->
                <div class="result"></div><!-- /.result -->
            </div><!-- /.comments-form -->
            <!-- /.product-comment-form -->
        </div><!-- /.container -->
    </section>
    <!-- Products End -->
@endsection
@section('js-content')

@endsection

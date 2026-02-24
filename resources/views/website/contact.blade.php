@extends('website.index-main')
@section('title', 'Contact Us | Stone Bazaar')
@section('content')
    <section class="page-header">
        <div class="page-header__bg"
            style="background: url({{ asset('website-assets/images/backgrounds/slider-3-2.jpg') }});"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title">Contact Us</h2>
            <img src="{{ asset('website-assets/images/logo-white.png') }}" alt="Stone Bazaar" style="width: 100px; height: auto;">
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <section class="contact-one contact-one--team section-space">
        <div class="contact-one__bg" style="background-image: url({{ asset('website-assets/images/backgrounds/contact-bg-1.png') }});"></div>
        <!-- /.contact-one__bg -->
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
                                style="background-image: url({{ asset('website-assets/images/shapes/contact-info-bg.png') }});"></div>
                            <!-- /.contact-one__info__bg -->
                            <div class="contact-one__info__content">
                                <div class="contact-one__info__item">
                                    <div class="contact-one__info__item__inner">
                                        <div class="contact-one__info__icon">
                                            <span class="icon-phone-call"></span>
                                        </div><!-- /.contact-one__info__icon -->
                                        <p class="contact-one__info__text"><a href="tel:+919352703082">+91 9352703082</a></p><!-- /.contact-one__info__text -->
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
                                        <address class="contact-one__info__text"><a
                                                href="javascript:void(0)">Stone Bazaar, Kishangarh, Rajasthan (Marble Hub of India)</a></address>
                                        <!-- /.contact-one__info__text -->
                                    </div><!-- /.contact-one__info__item__inner -->
                                </div><!-- /.contact-one__info__item -->
                            </div><!-- /.contact-one__info__content -->
                            <img src="{{ asset('website-assets/images/shapes/contact-shape-1-1.png') }}" alt="contact image"
                                class="contact-one__info__image">
                        </div><!-- /.contact-one__info -->
                    </div><!-- /.contact-one__content -->
                </div><!-- /.col-xl-6 -->
                <div class="col-lg-6">
                    <form class="contact-one__form contact-form-validated form-one wow fadeInUp" data-wow-duration="1500ms"
                        data-wow-delay="200ms" action="{{ Route('submit-contact-form') }}" method="POST">
                        @csrf
                        <div class="contact-one__form__bg"
                            style="background-image: url({{ asset('website-assets/images/shapes/contact-info-form-bg.png') }});"></div>
                        <!-- /.contact-one__form__bg -->
                        <div class="contact-one__form__top">
                            <h2 class="contact-one__form__title">Get In Touch With Us And Enjoy <br>
                                Top-Notch Support</h2><!-- /.contact-one__form__title -->
                        </div><!-- /.contact-one__form__top -->
                        <div class="form-one__group form-one__group--grid">
                            <div class="form-one__control form-one__control--input form-one__control--full">
                                <input type="text" name="name" placeholder="Your name" required>
                            </div><!-- /.form-one__control form-one__control--full -->
                            <div class="form-one__control form-one__control--input form-one__control--full">
                                <input type="text" name="company_name" placeholder="Your company name">
                            </div><!-- /.form-one__control form-one__control--full -->
                            <div class="form-one__control form-one__control--full">
                                <input type="email" name="email" placeholder="your email" required>
                            </div><!-- /.form-one__control form-one__control--full -->
                            <div class="form-one__control form-one__control--input form-one__control--full">
                                <input type="text" name="phone" pattern="[6-9][0-9]{9}" value="{{ old('phone') }}" maxlength="10" minlength="10" placeholder="Your contact number" required>
                            </div><!-- /.form-one__control form-one__control--full -->
                            <div class="form-one__control form-one__control--full">
                                <select class="selectpicker" name="vendor_category" aria-label="Choose service">
                                    <option selected disabled>Vendor Category</option>
                                    <option value="Italian Importer">Italian Importer</option>
                                    <option value="Factory Outlet">Factory Outlet</option>
                                    <option value="Marble Godown">Marble Godown</option>
                                </select>
                            </div><!-- /.form-one__control form-one__control--full -->
                            <div class="form-one__control form-one__control--mesgae form-one__control--full">
                                <textarea name="message" placeholder="Write message" required></textarea><!-- /# -->
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
        <img src="{{ asset('website-assets/images/contact/contact-1-2.jpg') }}" alt="contact image" class="contact-one__image-two wow fadeInRight"
            data-wow-duration="1500ms" data-wow-delay="00ms">
    </section><!-- /.contact-one section-space -->
@endsection
@section('js-content')
    
@endsection

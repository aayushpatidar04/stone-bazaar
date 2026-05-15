@extends('website.index-main')
@section('title', $architect->architect->firm_name ?? $architect->name)
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

        .error {
            color: red;
        }
    </style>
@endsection
@section('content')
    @if ($architect->architect->description)
        <section class="team-details section-space">
            <div class="container">
                <div class="team-details__inner wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                    <div class="team-details__image">
                        <img src="{{ $architect->architect->about_section_image ? $architect->architect->about_section_image : $architect->architect->logo }}"
                            alt="{{ $architect->architect->firm_name ?? $architect->name }}"
                            style="height: auto; width: 100%; object-fit: cover;">
                    </div><!-- /.team-details__image -->
                    <div class="team-details__content">
                        <div class="team-details__top" style="align-items: center;">
                            <div class="team-details__identity">
                                <h4 class="team-details__name">{{ $architect->architect->firm_name ?? $architect->name }}
                                </h4>
                                <!-- /.team-details__name -->
                                <span class="team-details__designation">{{ $architect->name }}</span>
                                <!-- /.team-details__designation -->
                            </div><!-- /.team-details__identity -->
                            <div>
                                <img src="{{ $architect->architect->logo }}" alt="{{ $architect->name }}"
                                    style="width: 200px; height:200px; border-radius: 50%; object-fit: cover;">
                            </div>

                        </div><!-- /.team-details__top -->
                        <div class="team-details__description">
                            {!! $architect->architect->description !!}
                        </div><!-- /.team-details__description -->
                        <ul class="team-details__info">
                            <li>
                                <span class="icon-location-2"></span>
                                @php
                                    $coords = $architect->architect->geo_location
                                        ? json_decode($architect->architect->geo_location, true)
                                        : null;
                                @endphp

                                @if (!empty($coords) && isset($coords[0], $coords[1]))
                                    <a class="text-dark"
                                        href="https://www.google.com/maps?q={{ $coords[0] }},{{ $coords[1] }}"
                                        target="_blank">
                                        {{ $architect->architect->address }}
                                    </a>
                                @else
                                    <a class="text-muted">{{ $architect->architect->address }}</a>
                                @endif


                            </li>
                        </ul><!-- /.team-details__info -->
                    </div><!-- /.team-details__content -->
                </div><!-- /.team-details__inner -->
            </div><!-- /.container -->
        </section><!-- /.team-details section-space -->
    @endif

    @if ($architect->architect->about)
        <section class="team-skills-one">
            <div class="container">
                @if ($architect->architect->about)
                    <div class="team-skills-one__info">
                        <div class="team-skills-one__content">
                            <h3 class="team-skills-one__title">Objective</h3><!-- /.team-skills-one__title -->
                            <div class="team-skills-one__description wow fadeInUp" data-wow-duration="1500ms"
                                data-wow-delay="00ms">
                                <p class="team-skills-one__text">
                                    {!! nl2br(e($architect->architect->about)) !!}
                                </p>

                                <!-- /.team-skills-one__text -->
                            </div><!-- /.team-skills-one__description -->
                        </div><!-- /.team-skills-one__content -->
                    </div><!-- /.team-skills-one__info -->
                @endif
            </div><!-- /.container -->
        </section><!-- /.team-skills-one -->
    @endif


    @if ($architectGallery->count() > 0)
        <section class="gallery-one" style="padding: 50px 0;">
            <div class="container">
                <div class="text-center">
                    <h3 class="sec-title__title mb-2 text-dark">Gallery</h3>
                    <ul class="list-unstyled post-filter gallery-one__filter__list">
                        <li class="active" data-filter=".filter-item"><span class="text-dark">all</span></li>
                        @foreach ($architectGallery as $type => $images)
                            <li data-filter=".{{ \Illuminate\Support\Str::slug($type, '-') }}"><span
                                    class="text-dark">{{ \Illuminate\Support\Str::slug($type, '-') }}</span></li>
                        @endforeach
                    </ul><!-- /.list-unstyledf -->
                </div><!-- /.text-center -->
                <div class="row masonry-layout filter-layout" style="justify-content: center;">
                    @foreach ($architectGallery as $type => $images)
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
                    <a href="{{ Route('architect-gallery', ['id' => $architect->id]) }}" class="floens-btn"><span>View
                            All</span><i class="icon-right-arrow"></i></a>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    @endif

    @if ($architect->architectAwards->count() > 0)
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
                    @foreach ($architect->architectAwards as $award)
                        <div class="item">
                            <a href="javascript:void(0)">
                                <div class="product__item wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                                    <div class="product__item__image">
                                        <img src="{{ $award->image }}" class="fixed-img2" alt="$award->name">
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

    @if ($architect->architectCertificates->count() > 0)
        <section class="gallery-one product-page--carousel" style="padding: 50px 0;">
            <div class="container-fluid">
                <div class="text-center">
                    <h3 class="sec-title__title mb-2">Professional Endorsements</h3>
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
                    @foreach ($architect->architectCertificates as $certificate)
                        <div class="item">
                            <a href="">
                                <div class="product__item wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                                    <div class="product__item__image">
                                        <img src="{{ $certificate->image }}" class="fixed-img2" alt="$certificate->name">
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

                            <h3 class="sec-title__title text-dark">Reach out & <br> Connect with Us</h3>
                            <!-- /.sec-title__title -->
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
                                        <p class="contact-one__info__text"><a href="tel:+919352703082"> +91 9352703082</a>
                                        </p><!-- /.contact-one__info__text -->
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
                                        <address class="contact-one__info__text"><a href="#">Stone Bazaar,
                                                Kishangarh, Rajasthan (Marble Hub of India)</a></address>
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
                    <form method="POST" action="{{ Route('save-architect-enquiry') }}" enctype="multipart/form-data"
                        class="contact-one__form contact-form-validated form-one">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $architect->id }}">

                        <div class="form-one__group">
                            <div class="form-one__control form-one__control--full">
                                <input type="text" name="name" placeholder="Full Name" required>
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <input type="text" name="phone" pattern="[6-9][0-9]{9}" maxlength="10"
                                    placeholder="Mobile Number" required>
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <input type="email" name="email" placeholder="Email Address">
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <input type="text" name="city" placeholder="City / Location" required>
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <select name="project_type" class="form-select" style="background: transparent; color:white;" required>
                                    <option style="color: black;" disabled selected>Project Type</option>
                                    <option style="color: black;" value="Residential">Residential</option>
                                    <option style="color: black;" value="Commercial">Commercial</option>
                                    <option style="color: black;" value="Hospitality">Hospitality</option>
                                    <option style="color: black;" value="Other">Other</option>
                                </select>
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <select name="property_type" class="form-select" style="background: transparent; color:white;" required>
                                    <option style="color: black;" disabled selected>Property Type</option>
                                    <option style="color: black;" value="Apartment">Apartment</option>
                                    <option style="color: black;" value="Villa">Villa</option>
                                    <option style="color: black;" value="Office">Office</option>
                                    <option style="color: black;" value="Other">Other</option>
                                </select>
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <input type="text" name="project_area"
                                    placeholder="Project Area / Size e.g. 1500 sq.ft">
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <select name="project_status" class="form-select" style="background: transparent; color:white;">
                                    <option style="color: black;" disabled selected>Project Status</option>
                                    <option style="color: black;" value="New">New</option>
                                    <option style="color: black;" value="Renovation">Renovation</option>
                                    <option style="color: black;" value="Ongoing">Ongoing</option>
                                </select>
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <input type="text" name="budget_range" placeholder="Estimated Budget e.g. ₹10,00,000">
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <select name="services_required" class="form-select" style="background: transparent; color:white;">
                                    <option style="color: black;" disabled selected>What are you looking for?</option>
                                    <option style="color: black;" value="Interior Designer">Interior Designer</option>
                                    <option style="color: black;" value="Architect">Architect</option>
                                    <option style="color: black;" value="Builder / Contractor">Builder / Contractor</option>
                                </select>
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <label>Scope of Work</label>
                                <div class="scope-options">
                                    <label><input type="checkbox" name="scope_of_work[]" value="Space Planning"> Space
                                        Planning</label>
                                    <label><input type="checkbox" name="scope_of_work[]" value="3D Design"> 3D Design /
                                        Visualization</label>
                                    <label><input type="checkbox" name="scope_of_work[]" value="Interior Design">
                                        Interior Design</label>
                                    <label><input type="checkbox" name="scope_of_work[]" value="Architectural Design">
                                        Architectural Design</label>
                                    <label><input type="checkbox" name="scope_of_work[]" value="Turnkey Execution">
                                        Turnkey Execution</label>
                                    <label><input type="checkbox" name="scope_of_work[]" value="Renovation"> Renovation /
                                        Remodeling</label>
                                    <label><input type="checkbox" name="scope_of_work[]" value="Civil Work"> Civil
                                        Work</label>
                                    <label><input type="checkbox" name="scope_of_work[]" value="Project Management">
                                        Project Management</label>
                                    <label><input type="checkbox" name="scope_of_work[]" value="Other"> Other</label>
                                </div>
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <select name="design_preference" class="form-select" style="background: transparent; color:white;">
                                    <option style="color: black;" disabled selected>Design Preference (Style)</option>
                                    <option style="color: black;" value="Modern">Modern</option>
                                    <option style="color: black;" value="Contemporary">Contemporary</option>
                                    <option style="color: black;" value="Traditional">Traditional</option>
                                    <option style="color: black;" value="Minimalist">Minimalist</option>
                                </select>
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <textarea name="requirements" placeholder="Project Requirements / Brief"></textarea>
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <select name="preferred_time" class="form-select" style="background: transparent; color:white;">
                                    <option style="color: black;" disabled selected>Preferred Time to Connect</option>
                                    <option style="color: black;" value="Morning">Morning</option>
                                    <option style="color: black;" value="Afternoon">Afternoon</option>
                                    <option style="color: black;" value="Evening">Evening</option>
                                </select>
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <select name="referral_source" class="form-select" style="background: transparent; color:white;">
                                    <option style="color: black;" disabled selected>How did you hear about us?</option>
                                    <option style="color: black;" value="Website">Website</option>
                                    <option style="color: black;" value="Social Media">Social Media</option>
                                    <option style="color: black;" value="Referral">Referral</option>
                                    <option style="color: black;" value="Other">Other</option>
                                </select>
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <input type="file" name="reference_file"
                                    accept="image/png,image/jpeg,application/pdf">
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <textarea name="message" placeholder="Additional Message"></textarea>
                            </div>

                            <div class="form-one__control form-one__control--full">
                                <button type="submit" class="floens-btn">
                                    <span>Submit Enquiry</span>
                                    <i class="icon-right-arrow"></i>
                                </button>
                            </div>
                        </div>
                    </form>


                </div><!-- /.col-xl-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.contact-one section-space -->



@endsection
@section('js-content')

@endsection

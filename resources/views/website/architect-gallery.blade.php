@extends('website.index-main')
@section('title', 'Gallery | '. $architect->architect->firm_name )
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
    </style>
@endsection
@section('content')
    <section class="gallery-one section-space">
        <div class="container-fluid">
            <div class="text-center">
                <ul class="list-unstyled post-filter gallery-one__filter__list">
                    <li class="active" data-filter=".filter-item"><span>all</span></li>
                    @foreach ($architectGallery as $type => $images)
                    <li data-filter=".{{ \Illuminate\Support\Str::slug($type, '-') }}"><span>{{ \Illuminate\Support\Str::slug($type, '-') }}</span></li>
                    @endforeach
                </ul><!-- /.list-unstyledf -->
            </div><!-- /.text-center -->
            <div class="row masonry-layout filter-layout">
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
        </div><!-- /.container-fluid -->
    </section><!-- /.gallery-one section-space" -->
@endsection
@section('js-content')

@endsection

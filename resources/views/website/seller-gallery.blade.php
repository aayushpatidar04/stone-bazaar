@extends('website.index-main')
@section('title', 'Gallery | '. $seller->seller->business_name )
@section('css-content')

@endsection
@section('content')
    <section class="gallery-one section-space">
        <div class="container-fluid">
            <div class="text-center">
                <ul class="list-unstyled post-filter gallery-one__filter__list">
                    <li class="active" data-filter=".filter-item"><span>all</span></li>
                    @foreach ($sellerGallery as $type => $images)
                    <li data-filter=".{{ \Illuminate\Support\Str::slug($type, '-') }}"><span>{{ \Illuminate\Support\Str::slug($type, '-') }}</span></li>
                    @endforeach
                </ul><!-- /.list-unstyledf -->
            </div><!-- /.text-center -->
            <div class="row masonry-layout filter-layout">
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
        </div><!-- /.container-fluid -->
    </section><!-- /.gallery-one section-space" -->
@endsection
@section('js-content')

@endsection

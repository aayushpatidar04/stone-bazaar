@extends('dashboard.index-main')
@section('title', 'Gallery')
@section('css-content')
    <style>
        .fixed-img {
            width: 100%;          /* full width of container */
            height: 250px;        /* fixed height */
            object-fit: cover;    /* crop to fit nicely */
            border-radius: 8px;   /* optional rounded corners */
        }
    </style>

@endsection
@section('page-header')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Gallery</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="me-1" style="float: left;">
                            <a href="{{ Route('architect.dashboard') }}"> <i class="feather icon-home"></i> /</a>
                        </li>
                        <li class="me-1" style="float: left;"><a href="{{ Route('architect.gallery') }}">Gallery /</a>
                        </li>
                        <li class="me-1" style="float: left;"><a href="javascript:void(0)">{{ $architect->name }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div id="gallery-wrapper" class="row">
        @foreach ($images as $image)
            <div class="col-md-4 mb-3" id="image-{{ $image->id }}">
                <div class="grid">
                    <figure class="effect-terry">
                        <img src="{{ $image->image }}" alt="{{ \Illuminate\Support\Str::title($image->type) }}" class="fixed-img"/>
                        <figcaption>
                            <h2>{{ \Illuminate\Support\Str::title($image->type) }}</h2>
                            <p>
                                <a href="javascript:void(0)" class="delete-image" data-id="{{ $image->id }}"><i class="fa-solid fa-fw fa-trash"></i></a>
                            </p>
                        </figcaption>
                    </figure>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Hidden pagination links -->
    <div id="pagination-links" style="display:none;">
        {{ $images->links() }}
    </div>

@endsection
@section('js-content')
    <script>
        $(document).ready(function() {
            let nextPageUrl = $('#pagination-links a[rel="next"]').attr('href');
            let isLoading = false;

            $(window).on('scroll', function() {
                if (!nextPageUrl || isLoading) return;

                if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                    isLoading = true;

                    $.get(nextPageUrl, function(data) {
                        let newDoc = new DOMParser().parseFromString(data, 'text/html');
                        let newImages = newDoc.querySelectorAll('#gallery-wrapper .col-md-4');

                        newImages.forEach(function(img) {
                            $('#gallery-wrapper').append(img);
                        });

                        // Update nextPageUrl
                        let nextLink = newDoc.querySelector('#pagination-links a[rel="next"]');
                        nextPageUrl = nextLink ? nextLink.href : null;

                        isLoading = false;
                    });
                }
            });
        
            $(document).on('click', '.delete-image', function() {
                const id = $(this).data('id');

                swal({
                    title: "Delete Image",
                    text: "Are you Sure?",
                    type: "warning",
                    showCancelButton: true,
                    showLoaderOnConfirm: true
                }, function(remark) {
                    if (remark === false) return false; // cancel pressed 
                    
                    // send Ajax with remark 
                    $.post(`/architect/delete-gallery/${id}`, {
                        _token: "{{ csrf_token() }}"
                    }).done(res => {
                        swal({
                            title: "Success!",
                            text: res.message,
                            type: "success"
                        }, function() {
                            $(`#image-${id}`).remove();
                        });
                    }).fail(() => {
                        swal("Error!", "Something went wrong", "error");
                    });
                });

            });

           
        });
    </script>


@endsection

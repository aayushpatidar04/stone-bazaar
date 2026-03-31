@extends('website.index-main')
@section('title',
    $seller->seller->business_name
    ? $seller->seller->business_name . ' | Products'
    : $seller->name .
    ' |
    Products')
@section('css-content')
    <style>
        .sub-menu {
            display: none;
            margin-left: 30px;
        }

        .list-unstyled li.open>.sub-menu {
            display: block;
            margin-bottom: 5px;
            list-style: circle;
        }

        .fixed-img2 {
            width: 100%;
            height: 350px !important;
            object-fit: cover;
        }
    </style>
@endsection
@section('content')
    <section class="page-header">
        <div class="page-header__bg" style="background-image: url({{ $seller->seller->banner }});"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <img src="{{ $seller->seller->logo ?? asset('assets/images/logo.png') }}"
                alt="{{ $seller->seller->business_name ?? $seller->name }}" style="max-width: 200px; height: auto;">
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <section class="product-page product-page--left section-space-bottom bg-white-texture">
        <div class="container">
            <div class="row gutter-y-60">
                <div class="col-xl-3 col-lg-4">
                    <aside class="product__sidebar">
                        <div class="product__categories product__sidebar__item">
                            <h3 class="product__sidebar__title product__categories__title">Categories</h3>
                            <ul class="list-unstyled" style="list-style: square;">
                                @foreach ($seller->sellerDomains as $domain)
                                    @if ($domain->products->count() > 0)
                                        <li>
                                            <a href="javascript:void(0)"
                                                data-text="{{ $domain->domain }}"><span>{{ $domain->domain }}</span></a>
                                            <ul class="list-unstyled sub-menu">
                                                @foreach ($domain->subCategories as $subcategory)
                                                    @if ($subcategory->products->count() > 0)
                                                        <li><a href="{{ Route('seller-products', ['id' => $seller->id, 'sub_category' => $subcategory->id]) }}"
                                                                data-text="{{ $subcategory->name }}"><span>{{ $subcategory->name }}</span></a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>

                        </div>
                        <div class="product__categories product__sidebar__item">
                            <h3 class="product__sidebar__title">Filter by color</h3>
                            <ul class="list-unstyled" style="list-style: square;">
                                @foreach ($seller->sellerDomains as $domain)
                                    @if ($domain->products->count() > 0)
                                        <li>
                                            <a href="javascript:void(0)"
                                                data-text="{{ $domain->domain }}"><span>{{ $domain->domain }} by colors</span></a>
                                            <ul class="list-unstyled sub-menu">
                                                @foreach ($domain->products->groupBy('color') as $color => $items)
                                                    <li><a href="{{ Route('seller-products', ['id' => $seller->id, 'color' => $color, 'domain' => $domain->id]) }}"
                                                            data-text="{{ ucfirst($color) }} {{ $domain->domain }}"><span>{{ ucfirst($color) }} {{ $domain->domain }}</span></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul> 
                        </div>
                    </aside>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div id="product-list">
                        <div class="product__info-top">
                            <p class="product__showing-text-box text-dark">
                                Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of
                                {{ $products->total() }}
                                Results
                            </p>

                            <div class="product__showing-sort">

                            </div>
                        </div>
                        <div class="row gutter-y-30">
                            @foreach ($products as $product)
                                @php
                                    $displayImage = collect($product->images)->firstWhere('type', 'display');
                                @endphp
                                <div class="col-xl-4 col-lg-6 col-md-6 ">
                                    <a href="{{ Route('product-details', $product->id) }}" class="product__item-link">
                                        <div class="product__item wow fadeInUp" data-wow-duration='1500ms'
                                            data-wow-delay='000ms'>
                                            <div class="product__item__image">
                                                <img src="{{ $displayImage['image'] }}" class="fixed-img2"
                                                    alt="$product->name">
                                            </div><!-- /.product-image -->
                                        </div><!-- /.product-item -->
                                        <div class="text-center mt-2">
                                            {{ $product->name }}
                                        </div>
                                    </a>
                                </div><!-- /.col-md-6 col-lg-4 -->
                            @endforeach
                            <div class="col-12 text-dark">
                                {{ $products->links('vendor.pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js-content')
    <script>
        document.querySelectorAll('.list-unstyled > li > a').forEach(link => {
            link.addEventListener('click', e => {
                // e.preventDefault();
                link.parentElement.classList.toggle('open');
            });
        });

        $(document).ready(function() {
            $(document).on('click', '#product-list .post-pagination a', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        // Replace only the product list container
                        $('#product-list').html($(data).find('#product-list').html());
                    }
                });
            });

        });
    </script>
@endsection

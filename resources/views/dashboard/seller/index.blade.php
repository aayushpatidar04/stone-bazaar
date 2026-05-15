@extends('dashboard.index-main')
@section('title', 'Dashboard |Stone Bazaar')
@section('css-content')

@endsection
@section('page-header')

@endsection
@section('content')
    <!-- Total Products -->
    <div class="col-xl-4 col-md-6">
        <div class="card bg-c-yellow update-card">
            <div class="card-body">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">{{ $data['total_products'] }}</h4>
                        <h6 class="text-white m-b-0">Total Products</h6>
                    </div>
                    <div class="col-4 text-end">
                        <canvas id="seller-chart-1" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('seller.products') }}" class="text-white">View Products</a>
            </div>
        </div>
    </div>

    <!-- Product Enquiries -->
    <div class="col-xl-4 col-md-6">
        <div class="card bg-c-pink update-card">
            <div class="card-body">
                <div class="row align-items-end">
                    <div class="col-10">
                        <h4 class="text-white">{{ $data['product_enquiries_count'] }}</h4>
                        <h6 class="text-white m-b-0">Product Enquiries</h6>
                    </div>
                    <div class="col-2 text-end">
                        <canvas id="seller-chart-2" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <p class="text-white m-b-0"><i
                        class="fa-solid fa-forward text-dark f-14 m-r-10" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Forwarded"></i>{{ $data['forwarded_product_enquiries'] }}</p>
                <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Closed"><i
                        class="fa-solid fa-thumbs-up text-dark f-14 m-r-10"></i>{{ $data['closed_product_enquiries'] }}</p>
                </p>
            </div>
        </div>
    </div>

    <!-- Seller Enquiries -->
    <div class="col-xl-4 col-md-6">
        <div class="card bg-c-lite-green update-card">
            <div class="card-body">
                <div class="row align-items-end">
                    <div class="col-10">
                        <h4 class="text-white">{{ $data['seller_enquiries_count'] }}</h4>
                        <h6 class="text-white m-b-0">Seller Enquiries</h6>
                    </div>
                    <div class="col-2 text-end">
                        <canvas id="seller-chart-3" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <p class="text-white m-b-0"><i
                        class="fa-solid fa-forward text-dark f-14 m-r-10" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Forwarded"></i>{{ $data['forwarded_seller_enquiries'] }}</p>
                <p class="text-white m-b-0"><i
                        class="fa-solid fa-thumbs-up text-dark f-14 m-r-10" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Closed"></i>{{ $data['closed_seller_enquiries'] }}</p>
                </p>
            </div>
        </div>
    </div>
@endsection
@section('js-content')
    <script>
        $(document).ready(function() {
            $('#dashboard').addClass('active');
            $('#dashboard').addClass('pcoded-trigger');
            $('#dashboard-default').addClass('active');
        });
    </script>
@endsection

@extends('dashboard.index-main')

@section('title', 'Stone Bazaar | Admin Dashboard')
@section('css-content')

@endsection

@section('content')
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-yellow update-card">
            <div class="card-body">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">{{ $data['total_sellers'] }}</h4>
                        <h6 class="text-white m-b-0"><a class="text-white"
                                href="{{ Route('admin.sellers') }}">Sellers/Merchants</a></h6>
                    </div>
                    <div class="col-4 text-end">
                        <canvas id="update-chart-1" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Verified Sellers"><i
                        class="fa-solid fa-user-check text-dark f-14 m-r-10"></i>{{ $data['verified_sellers'] }}</p>
                <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pending Sellers"><i
                        class="fa-solid fa-user-pen text-dark f-14 m-r-10"></i>{{ $data['pending_sellers'] }}</pclass=>
                <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Rejected Sellers"><i
                        class="fa-solid fa-user-alt-slash text-dark f-14 m-r-10"></i>{{ $data['rejected_sellers'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-green update-card">
            <div class="card-body">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">{{ $data['total_designers'] }}</h4>
                        <h6 class="text-white m-b-0"><a class="text-white"
                                href="{{ Route('admin.architects') }}">Architects</a></h6>
                    </div>
                    <div class="col-4 text-end">
                        <canvas id="update-chart-2" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Verified Architects"><i
                        class="fa-solid fa-user-check text-dark f-14 m-r-10"></i>{{ $data['verified_designers'] }}</p>
                <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pending Architects"><i
                        class="fa-solid fa-user-pen text-dark f-14 m-r-10"></i>{{ $data['pending_designers'] }}</pclass=>
                <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Rejected Architects"><i
                        class="fa-solid fa-user-alt-slash text-dark f-14 m-r-10"></i>{{ $data['rejected_designers'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-pink update-card">
            <div class="card-body">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">{{ $data['product_enquiries_count'] }}</h4>
                        <h6 class="text-white m-b-0"><a class="text-white"
                                href="{{ Route('enquiries') }}">Product Enquiries</a></h6>
                    </div>
                    <div class="col-4 text-end">
                        <canvas id="update-chart-3" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pending Enquiries"><i
                        class="fa-solid fa-warning text-dark f-14 m-r-10"></i>{{ $data['pending_product_enquiries'] }}</p>
                <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Forwarded Enquiries"><i
                        class="fa-solid fa-forward text-dark f-14 m-r-10"></i>{{ $data['forwarded_product_enquiries'] }}</pclass=>
                <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Closed Enquiries"><i
                        class="fa-solid fa-thumbs-up text-dark f-14 m-r-10"></i>{{ $data['closed_product_enquiries'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-lite-green update-card">
            <div class="card-body">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">{{ $data['seller_enquiries_count'] }}</h4>
                        <h6 class="text-white m-b-0"><a class="text-white"
                                href="{{ Route('enquiries') }}">Seller Enquiries</a></h6>
                    </div>
                    <div class="col-4 text-end">
                        <canvas id="update-chart-4" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pending Enquiries"><i
                        class="fa-solid fa-warning text-dark f-14 m-r-10"></i>{{ $data['pending_seller_enquiries'] }}</p>
                <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Forwarded Enquiries"><i
                        class="fa-solid fa-forward text-dark f-14 m-r-10"></i>{{ $data['forwarded_seller_enquiries'] }}</pclass=>
                <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Closed Enquiries"><i
                        class="fa-solid fa-thumbs-up text-dark f-14 m-r-10"></i>{{ $data['closed_seller_enquiries'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-blue update-card">
            <div class="card-body">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">{{ $data['architect_enquiries_count'] }}</h4>
                        <h6 class="text-white m-b-0"><a class="text-white"
                                href="{{ Route('enquiries') }}">Architect Enquiries</a></h6>
                    </div>
                    <div class="col-4 text-end">
                        <canvas id="update-chart-4" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pending Enquiries"><i
                        class="fa-solid fa-warning text-dark f-14 m-r-10"></i>{{ $data['pending_architect_enquiries'] }}</p>
                <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Forwarded Enquiries"><i
                        class="fa-solid fa-forward text-dark f-14 m-r-10"></i>{{ $data['forwarded_architect_enquiries'] }}</pclass=>
                <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Closed Enquiries"><i
                        class="fa-solid fa-thumbs-up text-dark f-14 m-r-10"></i>{{ $data['closed_architect_enquiries'] }}</p>
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

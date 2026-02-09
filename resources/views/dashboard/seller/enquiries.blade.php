@extends('dashboard.index-main')
@section('title', 'Enquiries | Stone Bazaar')
@section('css-content')

@endsection
@section('page-header')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-4">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Enquiries</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-lg-12">
        <ul class="nav nav-tabs md-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#home3" role="tab">Direct Enquiries</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#profile3" role="tab">Product Enquiries</a>
                <div class="slide"></div>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content card-body">
            <div class="tab-pane active" id="home3" role="tabpanel">
                <div class="table-responsive dt-responsive">
                    <table id="dom-jqry" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Details</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sellerEnquiries as $enquiry)
                                <tr data-seller='@json($enquiry)'>
                                    <td>{{ $enquiry->name }}<br>{{ $enquiry->phone }}<br>{{ $enquiry->email }}</td>
                                    <td>{!! nl2br(e($enquiry->message)) !!}</td>
                                    <td><label
                                            class="label @if ($enquiry->status == 'pending') bg-danger @elseif($enquiry->status == 'forwarded') bg-success @else bg-warning @endif">{{ ucfirst($enquiry->status) }}</label>
                                    </td>
                                    <td>
                                        @if($enquiry->status == 'forwarded')
                                        <a href="javascript:void(0);" class="waves-effect md-trigger text-success close-seller-enquiry"
                                            style="font-size: 24px;" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Close Enquiry" data-id="{{ $enquiry->id }}"><i class="fa-solid fa-thumbs-up"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Details</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="tab-pane" id="profile3" role="tabpanel">
                <div class="table-responsive dt-responsive">
                    <table id="dom-jqry2" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Details</th>
                                <th>Message</th>
                                <th>City, State</th>
                                <th>Status</th>
                                <th>Product</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productEnquiries as $enquiry)
                                <tr data-seller='@json($enquiry)'>
                                    <td>{{ $enquiry->name }}<br>{{ $enquiry->phone }}<br>{{ $enquiry->email }}</td>
                                    <td>{!! nl2br(e($enquiry->message)) !!}</td>
                                    <td>{{ $enquiry->city }}, {{ $enquiry->state }}</td>
                                    <td><label
                                            class="label @if ($enquiry->status == 'pending') bg-danger @elseif($enquiry->status == 'forwarded') bg-success @else bg-warning @endif">{{ ucfirst($enquiry->status) }}</label>
                                    </td>
                                    <td><a
                                            href="{{ Route('product-details', ['id' => $enquiry->product_id]) }}">{{ $enquiry->product->name }}</a><br>{{ $enquiry->product->color }}
                                    </td>
                                    <td>
                                        @if($enquiry->status == 'forwarded')
                                        <a href="javascript:void(0);" class="waves-effect md-trigger text-success close-product-enquiry"
                                            style="font-size: 24px;" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Close Enquiry" data-id="{{ $enquiry->id }}"><i class="fa-solid fa-thumbs-up"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Details</th>
                                <th>Message</th>
                                <th>City, State</th>
                                <th>Status</th>
                                <th>Product</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-content')
    <script>
        $(document).ready(function() {
            $('#enquiries').addClass('active');

            $(document).on('click', '.close-seller-enquiry', function() {
                const id = $(this).data('id');
                swal({
                    title: "Confirm Action",
                    text: `Do you want to close enquiry?`,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function() {
                    $.post(`/seller/close-seller-enquiry/${id}`, {
                        _token: "{{ csrf_token() }}"
                    }).done(res => {
                        swal({
                            title: "Success!",
                            text: res.message,
                            type: "success"
                        }, function() {
                            const $row = $(`a.close-seller-enquiry[data-id="${id}"]`).closest('tr'); 
                            const $badge = $row.find('label'); 
                            $badge.removeClass('bg-danger bg-warning').addClass('bg-success').text('Closed');

                            $row.find('a.close-seller-enquiry').remove();
                        });
                    }).fail(() => {
                        swal("Error!", "Something went wrong", "error");
                    });
                });


            });
        
            $(document).on('click', '.close-product-enquiry', function() {
                const id = $(this).data('id');
                swal({
                    title: "Confirm Action",
                    text: `Do you want to close enquiry?`,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function() {
                    $.post(`/seller/close-product-enquiry/${id}`, {
                        _token: "{{ csrf_token() }}"
                    }).done(res => {
                        swal({
                            title: "Success!",
                            text: res.message,
                            type: "success"
                        }, function() {
                            const $row = $(`a.close-product-enquiry[data-id="${id}"]`).closest('tr'); 
                            const $badge = $row.find('label'); 
                            $badge.removeClass('bg-danger bg-warning').addClass('bg-success').text('Closed');

                            $row.find('a.close-product-enquiry').remove();
                        });
                    }).fail(() => {
                        swal("Error!", "Something went wrong", "error");
                    });
                });


            });
        
            $('#dom-jqry').DataTable({
                searching: true // explicitly enable search
            });

            $('#dom-jqry2').DataTable({
                searching: true
            });
            
        });
    </script>

@endsection

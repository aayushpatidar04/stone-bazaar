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
                <a class="nav-link active" data-bs-toggle="tab" href="#home3" role="tab">Seller Enquiries</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#profile3" role="tab">Product Enquiries</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#profile4" role="tab">Architect Enquiries</a>
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
                                <th>Project Type</th>
                                <th>City</th>
                                <th>Stone Requirement</th>
                                <th>Quantity</th>
                                <th>Budget Range</th>
                                <th>Color</th>
                                <th>Delivery Location</th>
                                <th>Urgency</th>
                                <th>Reference</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Seller</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($sellerEnquiries as $enquiry)
                                <tr data-seller='@json($enquiry)'>
                                    <td>{{ $enquiry->name }}<br>{{ $enquiry->phone }}<br>{{ $enquiry->email }}</td>
                                    <td>{{ $enquiry->project_type }}</td>
                                    <td>{{ $enquiry->city }}</td>
                                    <td>{{ $enquiry->stone_requirement }}</td>
                                    <td>{{ $enquiry->quantity }}</td>
                                    <td>{{ $enquiry->budget_range }}</td>
                                    <td>{{ $enquiry->color_design }}</td>
                                    <td>{{ $enquiry->delivery_location }}</td>
                                    <td>{{ $enquiry->urgency }}</td>
                                    <td>@if($enquiry->reference_image)<a href="{{ asset($enquiry->reference_image) }}" target="_blank">View Image</a>@endif</td>
                                    <td>{!! nl2br(e($enquiry->message)) !!}</td>
                                    <td><label
                                            class="label @if ($enquiry->status == 'pending') bg-danger @elseif($enquiry->status == 'forwarded') bg-success @elseif($enquiry->status == 'failed') bg-secondary @else bg-warning @endif">{{ ucfirst($enquiry->status) }}</label>
                                    </td>
                                    <td><a
                                            href="{{ Route('seller', ['id' => $enquiry->user_id]) }}">{{ $enquiry->user->seller->business_name ?? $enquiry->user->name }}</a><br>{{ $enquiry->user->phone_number }}<br>{{ $enquiry->user->email }}
                                    </td>
                                    <td>
                                        @if($enquiry->status == 'pending')
                                        <a href="javascript:void(0);" class="waves-effect md-trigger text-success forward-seller-enquiry"
                                            style="font-size: 24px;" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Forward to Original Seller" data-id="{{ $enquiry->id }}"><i class="fa-solid fa-forward"></i></a>
                                        @elseif($enquiry->status == 'forwarded' || $enquiry->status == 'failed')
                                        <a href="javascript:void(0);" class="waves-effect md-trigger text-primary forward-to-seller"
                                            style="font-size: 24px;" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Forward to Another Seller" data-id="{{ $enquiry->id }}"><i class="fa-solid fa-share"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Details</th>
                                <th>Project Type</th>
                                <th>City</th>
                                <th>Stone Requirement</th>
                                <th>Quantity</th>
                                <th>Budget Range</th>
                                <th>Color</th>
                                <th>Delivery Location</th>
                                <th>Urgency</th>
                                <th>Reference</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Seller</th>
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
                                <th>Seller</th>
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
                                    <td><a
                                            href="{{ Route('seller', ['id' => $enquiry->product->subcategory->domain->user_id]) }}">{{ $enquiry->product->subcategory->domain->user->seller->business_name ?? $enquiry->product->subcategory->domain->user->name }}</a><br>{{ $enquiry->product->subcategory->domain->user->phone_number }}<br>{{ $enquiry->product->subcategory->domain->user->email }}
                                    </td>
                                    <td>
                                        @if($enquiry->status == 'pending')
                                        <a href="javascript:void(0);" class="waves-effect md-trigger text-success forward-product-enquiry"
                                            style="font-size: 24px;" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Forward Enquiry" data-id="{{ $enquiry->id }}"><i class="fa-solid fa-forward"></i></a>
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
                                <th>Seller</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="tab-pane" id="profile4" role="tabpanel">
                <div class="table-responsive dt-responsive">
                    <table id="dom-jqry3" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Details</th>
                                <th>Project Type</th>
                                <th>City</th>
                                <th>Property Type</th>
                                <th>Project Area</th>
                                <th>Project Status</th>
                                <th>Budget Range</th>
                                <th>Services Required</th>
                                <th>Scope of Work</th>
                                <th>Design Preference</th>
                                <th>Requirements</th>
                                <th>Preferred contacting time</th>
                                <th>Referral Source</th>
                                <th>Reference</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Architect</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($architectEnquiries as $enquiry)
                                <tr data-seller='@json($enquiry)'>
                                    <td>{{ $enquiry->name }}<br>{{ $enquiry->phone }}<br>{{ $enquiry->email }}</td>
                                    <td>{{ $enquiry->project_type }}</td>
                                    <td>{{ $enquiry->city }}</td>
                                    <td>{{ $enquiry->property_type }}</td>
                                    <td>{{ $enquiry->project_area }}</td>
                                    <td>{{ $enquiry->project_status }}</td>
                                    <td>{{ $enquiry->budget_range }}</td>
                                    <td>{{ $enquiry->services_required }}</td>
                                    <td>{{ $enquiry->scope_of_work }}</td>
                                    <td>{{ $enquiry->design_preference }}</td>
                                    <td>{{ $enquiry->requirements }}</td>
                                    <td>{{ $enquiry->preferred_time }}</td>
                                    <td>{{ $enquiry->referral_source }}</td>
                                    <td>@if($enquiry->reference_file)<a href="{{ asset($enquiry->reference_file) }}" target="_blank">View File</a>@endif</td>
                                    <td>{!! nl2br(e($enquiry->message)) !!}</td>
                                    <td><label
                                            class="label @if ($enquiry->status == 'pending') bg-danger @elseif($enquiry->status == 'forwarded') bg-success @else bg-warning @endif">{{ ucfirst($enquiry->status) }}</label>
                                    </td>
                                    <td><a
                                            href="{{ Route('architect', ['id' => $enquiry->user_id]) }}">{{ $enquiry->user->archtect->firm_name ?? $enquiry->user->name }}</a><br>{{ $enquiry->user->phone_number }}<br>{{ $enquiry->user->email }}
                                    </td>
                                    <td>
                                        @if($enquiry->status == 'pending')
                                        <a href="javascript:void(0);" class="waves-effect md-trigger text-success forward-architect-enquiry"
                                            style="font-size: 24px;" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Forward Enquiry" data-id="{{ $enquiry->id }}"><i class="fa-solid fa-forward"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Details</th>
                                <th>Project Type</th>
                                <th>City</th>
                                <th>Property Type</th>
                                <th>Project Area</th>
                                <th>Project Status</th>
                                <th>Budget Range</th>
                                <th>Services Required</th>
                                <th>Scope of Work</th>
                                <th>Design Preference</th>
                                <th>Requirements</th>
                                <th>Preferred contacting time</th>
                                <th>Referral Source</th>
                                <th>Reference</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Architect</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Seller Selection Modal -->
    <div class="modal fade" id="sellerSelectionModal" tabindex="-1" role="dialog" aria-labelledby="sellerSelectionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sellerSelectionModalLabel">Select Seller to Forward Enquiry</h5>
                    
                </div>
                <div class="modal-body">
                    <input type="hidden" id="selectedEnquiryId">
                    <div class="form-group">
                        <label for="sellerSelect">Choose Seller:</label>
                        <select class="form-control" id="sellerSelect" required>
                            <option value="">Select a seller...</option>
                            @foreach(\App\Models\User::role('Seller')->whereHas('seller', function($q) { $q->where('status', 'approved'); })->get() as $seller)
                            <option value="{{ $seller->id }}">{{ $seller->seller->business_name ?? $seller->name }} ({{ $seller->phone_number }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmForward">Forward Enquiry</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-content')
    <script>
        $(document).ready(function() {
            $('#enquiries').addClass('active');

            $(document).on('click', '.forward-seller-enquiry', function() {
                const id = $(this).data('id');
                swal({
                    title: "Confirm Action",
                    text: `Do you want to forward enquiry?`,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function() {
                    $.post(`/admin/forward-seller-enquiry/${id}`, {
                        _token: "{{ csrf_token() }}"
                    }).done(res => {
                        swal({
                            title: "Success!",
                            text: res.message,
                            type: "success"
                        }, function() {
                            const $row = $(`a.forward-seller-enquiry[data-id="${id}"]`).closest('tr'); 
                            const $badge = $row.find('label'); 
                            $badge.removeClass('bg-danger bg-secondary bg-warning').addClass('bg-success').text('Forwarded');
                        });
                    }).fail(() => {
                        swal("Error!", "Something went wrong", "error");
                    });
                });


            });

            $(document).on('click', '.forward-to-seller', function() {
                const id = $(this).data('id');
                $('#selectedEnquiryId').val(id);
                $('#sellerSelectionModal').modal('show');
            });

            $('#confirmForward').on('click', function() {
                const enquiryId = $('#selectedEnquiryId').val();
                const sellerId = $('#sellerSelect').val();

                if (!sellerId) {
                    alert('Please select a seller');
                    return;
                }

                $.post(`/admin/forward-seller-enquiry/${enquiryId}`, {
                    _token: "{{ csrf_token() }}",
                    seller_id: sellerId
                }).done(res => {
                    $('#sellerSelectionModal').modal('hide');
                    $('#sellerSelect').val('');
                    swal({
                        title: "Success!",
                        text: res.message,
                        type: "success"
                    }, function() {
                        const $row = $(`a.forward-to-seller[data-id="${enquiryId}"]`).closest('tr');
                        const $badge = $row.find('label');
                        $badge.removeClass('bg-danger bg-secondary bg-warning').addClass('bg-success').text('Forwarded');
                    });
                }).fail(() => {
                    $('#sellerSelectionModal').modal('hide');
                    swal("Error!", "Something went wrong", "error");
                });
            });
        
            $(document).on('click', '.forward-product-enquiry', function() {
                const id = $(this).data('id');
                swal({
                    title: "Confirm Action",
                    text: `Do you want to forward enquiry?`,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function() {
                    $.post(`/admin/forward-product-enquiry/${id}`, {
                        _token: "{{ csrf_token() }}"
                    }).done(res => {
                        swal({
                            title: "Success!",
                            text: res.message,
                            type: "success"
                        }, function() {
                            const $row = $(`a.forward-product-enquiry[data-id="${id}"]`).closest('tr'); 
                            const $badge = $row.find('label'); 
                            $badge.removeClass('bg-danger bg-warning').addClass('bg-success').text('Forwarded');

                            $row.find('a.forward-product-enquiry').remove();
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

            $('#dom-jqry3').DataTable({
                searching: true
            });

            $(document).on('click', '.forward-architect-enquiry', function() {
                const id = $(this).data('id');
                swal({
                    title: "Confirm Action",
                    text: `Do you want to forward enquiry?`,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function() {
                    $.post(`/admin/forward-architect-enquiry/${id}`, {
                        _token: "{{ csrf_token() }}"
                    }).done(res => {
                        swal({
                            title: "Success!",
                            text: res.message,
                            type: "success"
                        }, function() {
                            const $row = $(`a.forward-architect-enquiry[data-id="${id}"]`).closest('tr'); 
                            const $badge = $row.find('label'); 
                            $badge.removeClass('bg-danger bg-warning').addClass('bg-success').text('Forwarded');

                            $row.find('a.forward-architect-enquiry').remove();
                        });
                    }).fail(() => {
                        swal("Error!", "Something went wrong", "error");
                    });
                });


            });
        

        });
    </script>

@endsection

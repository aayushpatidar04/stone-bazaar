@extends('dashboard.index-main')
@section('title', 'Subscription Plans | Stone Bazaar')
@section('css-content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
@endsection
@section('page-header')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-4">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Subscription Plans</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="me-3" style="float: left;">
                            <a class="btn btn-success text-white toggle-card" data-bs-toggle="modal"
                                data-bs-target="#add-plan">Add Plan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-lg-12">

        <div class="table-responsive dt-responsive">
            <table id="dom-jqry" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Plan</th>
                        <th>Ideal For</th>
                        <th>Price<br>Quarterly / Yearly</th>
                        <th>Discount Percent</th>
                        <th>Benifits</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr data-plan='@json($plan)'>
                            <td>{{ $plan->name }}</td>
                            <td>{{ $plan->ideal_for }}</td>
                            <td>₹ {{ $plan->price_quarterly }} / ₹ {{ $plan->price_annual }}</td>
                            <td>{{ $plan->discount_percent }}%</td>
                            <td>

                                @if(!empty($plan->benefits))
                                    <ul class="list-unstyled mb-0">
                                        @foreach($plan->benefits as $benefit)
                                            <li><i class="fa fa-check text-success me-1"></i> {{ $benefit['value'] }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-muted">No benefits listed</span>
                                @endif
                            </td>

                            <td>
                                <a href="javascript:void(0);" class="waves-effect md-trigger text-danger delete-query"
                                    style="font-size: 24px;" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Delete Query" data-id="{{ $plan->id }}"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th>Plan</th>
                        <th>Ideal For</th>
                        <th>Price<br>Quarterly / Yearly</th>
                        <th>Discount Percent</th>
                        <th>Benifits</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="modal fade" id="add-plan" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Plan</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add-plan-form" action="{{ Route('admin.addPlan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div id="plan-fields">
                            <div class="row plan-row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Plan Name" value="{{ old('name', '') }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Ideal For</label>
                                        <input type="text" class="form-control" name="ideal_for" placeholder="Ideal For" value="{{ old('ideal_for', '') }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Price (Quarterly)</label>
                                        <input type="number" class="form-control" name="price_quarterly" value="{{ old('price_quarterly', 0) }}"
                                            placeholder="Price Quarterly" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Price (Annual)</label>
                                        <input type="number" class="form-control" name="price_annual" value="{{ old('price_annual', 0) }}"
                                            placeholder="Price Annual" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Discount Percent</label>
                                        <input type="number" class="form-control" name="discount_percent" value="{{ old('discount_percent', 0) }}"
                                            placeholder="Discount Percent" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Benefits</label>
                                        <textarea class="form-control" id="add-benefits" name="benefits" placeholder="Benefits" required>{{ old('benefits') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js-content')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script>
        $(document).ready(function() {
            $('#plans').addClass('active');



            $(document).on('click', '.delete-query', function() {
                const id = $(this).data('id');
                swal({
                    title: "Confirm Action",
                    text: `Do you want to delete this query?`,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function() {
                    $.post(`/admin/delete-query/${id}`, {
                        _token: "{{ csrf_token() }}"
                    }).done(res => {
                        swal({
                            title: "Success!",
                            text: res.message,
                            type: "success"
                        }, function() {
                            const $row = $(`a.delete-query[data-id="${id}"]`)
                                .closest('tr');
                            $('#dom-jqry').DataTable().row($row).remove().draw();
                        });
                    }).fail(() => {
                        swal("Error!", "Something went wrong", "error");
                    });
                });


            });

            $('#dom-jqry').DataTable({
                searching: true // explicitly enable search
            });
        });

        // Select the input
        var input = document.querySelector('textarea[id=add-benefits]');

        // Initialize Tagify
        var tagify = new Tagify(input, {
            whitelist: [
                "Homepage Featured Placement",
                "Unlimited Product Upload",
                "Premium Vendor Badge",
                "40+ Verified Buyer Leads (Quaterly)",
                "Social Media Promotion (2 Post/Month)",
                "Google Visibility Support",
                "Top Category Ranking",
                "Direct Call + WhatsApp Leads",
                "Dedicated Relationship Manager",
                "Priority Category Listing",
                "25+ Verified Buyer Leads (Quarterly)",
                "Direct Inquiry + WhatsApp",
                "100 Product Upload Limit",
                "Featured Tag in Category",
                "Social Media Promotion (1 Post/Month)",
                "Basic SEO Boost",
                "10–15 Buyer Leads (Quarterly)",
                "Standard Vendor Listing",
                "WhatsApp Inquiry Option",
                "25 Product Upload Limit",
                "Vendor Profile Page",
                "Basic Support"

            ],
            dropdown: {
                enabled: 0, // show suggestions on focus
                maxItems: 5,
                classname: "tags-look",
                closeOnSelect: false
            }
        });
    </script>

@endsection

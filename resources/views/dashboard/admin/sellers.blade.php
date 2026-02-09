@extends('dashboard.index-main')

@section('title', 'Sellers - Stone Bazaar')

@section('css-content')

@endsection
@section('page-header')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-4">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Sellers / Merchants ({{ $sellers }})</h4>

                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="me-3" style="float: left;">
                            <a class="btn btn-success text-white toggle-card" data-target="verified-sellers">Verified
                                Sellers</a>
                        </li>
                        <li class="me-3" style="float: left;">
                            <a class="btn btn-info text-white toggle-card" data-target="pending-sellers">Pending Sellers</a>
                        </li>
                        <li class="me-3" style="float: left;">
                            <a class="btn btn-danger text-white toggle-card" data-target="rejected-sellers">Rejected
                                Sellers</a>
                        </li>
                    </ul>


                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')


    <div class="card" id="verified-sellers">
        <div class="card-header">
            <h5>Verified Sellers ({{ $verified_sellers->count() }})</h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="feather icon-maximize full-card"></i></li>
                    <li><i class="feather icon-plus minimize-card"></i></li>
                </ul>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <div class="table-responsive dt-responsive">
                <table id="dom-jqry" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($verified_sellers as $seller)
                            <tr data-seller='@json($seller)'>
                                <td>{{ $seller->name }}</td>
                                <td>
                                    <a href="javascript:void(0);" class="waves-effect md-trigger" data-modal="modal-8"><i
                                            class="fa-solid fa-road-circle-check"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="card" id="pending-sellers">
        <div class="card-header">
            <h5>Pending Sellers ({{ $pending_sellers->count() }})</h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="feather icon-maximize full-card"></i></li>
                    <li><i class="feather icon-plus minimize-card"></i></li>
                </ul>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <div class="table-responsive dt-responsive">
                <table id="dom-jqry2" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pending_sellers as $seller)
                            <tr data-seller='@json($seller)'>
                                <td style="cursor: zoom-in;">
                                    {{ $seller->name }}<br>{{ $seller->email }}<br>{{ $seller->phone_number }}</td>
                                <td>
                                    <a href="javascript:void(0);" class="waves-effect md-trigger text-info"
                                        style="font-size: 24px;" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Verification Status" data-id="{{ $seller->id }}"
                                        data-logs='@json($seller->seller->verificationLogs())' data-seller='@json($seller->seller)'
                                        data-modal="verification-status"><i class="fa-solid fa-list-check"></i></a>

                                    {{-- <a href="javascript:void(0);" class="waves-effect md-trigger text-success" style="font-size: 24px;" data-bs-toggle="tooltip"
                                        data-bs-placement="left" title="Verify User" data-logs='@json($seller->seller->verificationLogs())' data-seller='@json($seller->seller)' data-modal="verification-status"><i
                                            class="fa-solid fa-user-check"></i></a> --}}

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="card" id="rejected-sellers">
        <div class="card-header">
            <h5>Rejected Sellers ({{ $rejected_sellers->count() }})</h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="feather icon-maximize full-card"></i></li>
                    <li><i class="feather icon-plus minimize-card"></i></li>
                </ul>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <div class="table-responsive dt-responsive">
                <table id="dom-jqry3" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rejected_sellers as $seller)
                            <tr data-seller='@json($seller)'>
                                <td>{{ $seller->name }}</td>
                                <td>{{ $seller->seller->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    {{-- Modals  --------------------- --}}

    <div class="md-modal md-effect-8" id="seller-details">
        <div class="md-content">
            <h3></h3>
            <div>


            </div>
        </div>
    </div>

    <div class="md-modal md-effect-8" id="verification-status">
        <div class="md-content">
            <h3>Verification Status</h3>
            <div>

            </div>
        </div>
    </div>


@endsection
@section('js-content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.toggle-card');
            buttons.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();

                    // get target card id from data-target
                    const targetId = this.getAttribute('data-target');

                    // hide all card bodies
                    document.querySelectorAll('.card').forEach(card => {
                        const body = card.querySelector('.card-body');
                        if (body) body.style.display = 'none';

                        const icon = card.querySelector(
                            '.card-header .icon-plus, .card-header .icon-minus');
                        if (icon) { // remove plus if present, add minus 
                            icon.classList.remove('icon-minus');
                            icon.classList.add('icon-plus');
                        }
                    });

                    // show only the selected card body
                    const targetCard = document.getElementById(targetId);
                    if (targetCard) {
                        const body = targetCard.querySelector('.card-body');
                        if (body) body.style.display = 'block';

                        const icon = targetCard.querySelector(
                            '.card-header .icon-plus, .card-header .icon-minus');
                        if (icon) { // remove plus if present, add minus 
                            icon.classList.remove('icon-plus');
                            icon.classList.add('icon-minus');
                        }
                    }
                });
            });
        });

        $(document).ready(function() {
            $("#sellers").addClass('active');

            $(document).on('click', '[data-modal="verification-status"]', function() {
                // parse JSON from data attributes
                const seller = $(this).data('seller');
                const logs = $(this).data('logs');


                // build HTML
                // helper to build action buttons based on status

                renderModal(seller, logs);

                // show modal
                $('#verification-status').addClass('md-show');
            });

            // close modal
            $(document).on('click', '.md-close', function() {
                $('#verification-status').removeClass('md-show');
            });


            $(document).on('click', '.verify-action', function() {
                const field = $(this).data('field');
                const action = $(this).data('action');
                const title = $(this).attr("title").toLowerCase();
                const id = $(this).data('id');

                if (action === 'rejected') {
                    swal({
                        title: "Reject " + field.replace('_', ' '),
                        text: "Please enter a rejection remark for audit:",
                        type: "input",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        inputPlaceholder: "Enter remark here",
                        showLoaderOnConfirm: true
                    }, function(remark) {
                        if (remark === false) return false; // cancel pressed 
                        if (!remark) {
                            swal.showInputError("Remark is required!");
                            return false;
                        }
                        // send Ajax with remark 
                        $.post(`/admin/sellers/${id}/verification`, {
                            action: action,
                            field: field,
                            remark: remark,
                            _token: "{{ csrf_token() }}"
                        }).done(res => {
                            swal({
                                title: "Success!",
                                text: res.message,
                                type: "success"
                            }, function() {
                                // update modal DOM with new status/log 
                                renderModal(res.seller, res.logs);
                                const trigger = $(
                                    `[data-modal="verification-status"][data-id="${res.seller.user_id}"]`
                                );

                                trigger.data('seller', res.seller);
                                trigger.attr('data-seller', JSON.stringify(res
                                    .seller));

                                trigger.data('logs', res.logs);
                                trigger.attr('data-logs', JSON.stringify(res.logs));

                                // find the row in pending table 
                                const pendingTable = $('#dom-jqry2').DataTable();
                                const verifiedTable = $('#dom-jqry').DataTable();
                                const rejectedTable = $('#dom-jqry3').DataTable();

                                // find the row in pending table by id
                                const row = pendingTable.rows().nodes().to$()
                                    .filter(function() {
                                        return $(this).attr('data-seller')
                                            ?.includes(`"id":${id}`);
                                    });


                                if (res.seller.status === 'approved' && row
                                    .length) {

                                    // remove from pending
                                    pendingTable.row(row).remove().draw();

                                    // add to verified
                                    verifiedTable.row.add([
                                        `${res.user.name}<br>${res.user.email}<br>${res.user.phone_number}`,
                                        `<a href="javascript:void(0);" class="waves-effect md-trigger text-info"
                                            style="font-size: 24px;" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Verification Status" data-id="${res.user.id}"
                                            data-logs='${res.logs}' data-seller='${res.seller}'
                                            data-modal="verification-status"><i class="fa-solid fa-list-check"></i></a>`
                                    ]).draw();

                                } else if (res.seller.status === 'rejected' && row
                                    .length) {
                                    // remove from pending
                                    pendingTable.row(row).remove().draw();

                                    // add to rejected
                                    rejectedTable.row.add([
                                        `${res.user.name}<br>${res.user.email}<br>${res.user.phone_number}`,
                                        res.seller.status
                                    ]).draw();
                                }
                                // update counts in headers 
                                $('#verified-sellers h5').text(
                                    `Verified Sellers (${$('#dom-jqry tbody tr').length})`
                                );
                                $('#pending-sellers h5').text(
                                    `Pending Sellers (${$('#dom-jqry2 tbody tr').length})`
                                );
                                $('#rejected-sellers h5').text(
                                    `Rejected Sellers (${$('#dom-jqry3 tbody tr').length})`
                                );
                            });
                        }).fail(() => {
                            swal("Error!", "Something went wrong", "error");
                        });
                    });

                } else {
                    swal({
                        title: "Confirm Action",
                        text: `Do you want to ${title} ${field.replace('_',' ')}?`,
                        type: "warning",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }, function() {
                        $.post(`/admin/sellers/${id}/verification`, {
                            action: action,
                            field: field,
                            _token: "{{ csrf_token() }}"
                        }).done(res => {
                            swal({
                                title: "Success!",
                                text: res.message,
                                type: "success"
                            }, function() {

                                renderModal(res.seller, res.logs);

                                const trigger = $(
                                    `[data-modal="verification-status"][data-id="${res.seller.user_id}"]`
                                );

                                trigger.data('seller', res.seller);
                                trigger.attr('data-seller', JSON.stringify(res
                                    .seller));

                                trigger.data('logs', res.logs);
                                trigger.attr('data-logs', JSON.stringify(res.logs));

                                // find the row in pending table 
                                const pendingTable = $('#dom-jqry2').DataTable();
                                const verifiedTable = $('#dom-jqry').DataTable();
                                const rejectedTable = $('#dom-jqry3').DataTable();

                                // find the row in pending table by id
                                const row = pendingTable.rows().nodes().to$()
                                    .filter(function() {
                                        return $(this).attr('data-seller')
                                            ?.includes(`"id":${id}`);
                                    });


                                if (res.seller.status === 'approved' && row
                                    .length) {

                                    // remove from pending
                                    pendingTable.row(row).remove().draw();

                                    // add to verified
                                    verifiedTable.row.add([
                                        `${res.user.name}<br>${res.user.email}<br>${res.user.phone_number}`,
                                        `<a href="javascript:void(0);" class="waves-effect md-trigger text-info"
                                            style="font-size: 24px;" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Verification Status" data-id="${res.user.id}"
                                            data-logs='${JSON.stringify(res.logs)}'
                                            data-seller='${JSON.stringify(res.seller)}'
                                            data-modal="verification-status"><i class="fa-solid fa-list-check"></i></a>`
                                    ]).draw();


                                } else if (res.seller.status === 'rejected' && row
                                    .length) {
                                    // remove from pending
                                    pendingTable.row(row).remove().draw();

                                    // add to rejected
                                    rejectedTable.row.add([
                                        `${res.user.name}<br>${res.user.email}<br>${res.user.phone_number}`,
                                        res.seller.status
                                    ]).draw();
                                }
                                // update counts in headers 
                                $('#verified-sellers h5').text(
                                    `Verified Sellers (${$('#dom-jqry tbody tr').length})`
                                );
                                $('#pending-sellers h5').text(
                                    `Pending Sellers (${$('#dom-jqry2 tbody tr').length})`
                                );
                                $('#rejected-sellers h5').text(
                                    `Rejected Sellers (${$('#dom-jqry3 tbody tr').length})`
                                );

                            });
                        }).fail(() => {
                            swal("Error!", "Something went wrong", "error");
                        });
                    });
                }


            });

            function renderModal(seller, logs) {

                // helper to map status to CSS class
                const statusClass = (val) => {
                    switch (val) {
                        case 'pending':
                            return 'text-warning';
                        case 'approved':
                            return 'text-success';
                        case 'rejected':
                            return 'text-danger';
                        default:
                            return 'text-muted';
                    }
                };

                const actionButtons = (field, status) => {
                    if (status === 'pending') {
                        return `
                            <button class="btn btn-sm btn-success verify-action" title="Approve" data-bs-toggle="tooltip"
                                    data-field="${field}" data-action="approved" data-id="${seller.user_id}">
                                <i class="fa fa-check"></i>
                            </button>
                            <button class="btn btn-sm btn-danger verify-action" title="Reject" data-bs-toggle="tooltip"
                                    data-field="${field}" data-action="rejected" data-id="${seller.user_id}">
                                <i class="fa fa-times"></i>
                            </button>`;
                    }
                    if (status === 'approved') {
                        return `
                            <button class="btn btn-sm btn-danger verify-action" title="Reject" data-bs-toggle="tooltip"
                                    data-field="${field}" data-action="rejected" data-id="${seller.user_id}">
                                <i class="fa fa-times"></i>
                            </button>`;
                    }
                    if (status === 'rejected') {
                        return `
                            <button class="btn btn-sm btn-success verify-action" title="Approve" data-bs-toggle="tooltip"
                                    data-field="${field}" data-action="approved" data-id="${seller.user_id}">
                                <i class="fa fa-check"></i>
                            </button>`;
                    }
                    return '';
                };

                const html = `
                    <div class="latest-update-card" style="max-width:400px; margin: auto;">
                        <div class="card-body">
                            <div class="latest-update-box">

                                <div class="row p-t-20 p-b-30">
                                    <div class="col-auto text-end update-meta">
                                        <p class="m-b-0 d-inline ${statusClass(seller.gst_verification)}">
                                            ${seller.gst_verification.charAt(0).toUpperCase() + seller.gst_verification.slice(1)}
                                        </p>
                                        <i class="feather icon-file-text bg-info update-icon"></i>
                                    </div>
                                    <div class="col">
                                        <h6>GST Verification</h6>
                                        <p class="text-muted m-b-0">${logs.gstLog ? new Date(logs.gstLog.created_at).toLocaleString('en-GB', { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit', hour12: true }) : ''}</p>
                                        <div style="display:flex;">${actionButtons('gst_verification', seller.gst_verification)}</div>
                                    </div>
                                </div>

                                <div class="row p-b-30">
                                    <div class="col-auto text-end update-meta">
                                        <p class="m-b-0 d-inline ${statusClass(seller.location_verification)}">
                                            ${seller.location_verification.charAt(0).toUpperCase() + seller.location_verification.slice(1)}
                                        </p>
                                        <i class="feather icon-map-pin bg-simple-c-pink update-icon"></i>
                                    </div>
                                    <div class="col">
                                        <h6>Location Verification</h6>
                                        <p class="text-muted m-b-0">${logs.locationLog ? new Date(logs.locationLog.created_at).toLocaleString('en-GB', { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit', hour12: true }) : ''}</p>
                                        <div style="display:flex;">${actionButtons('location_verification', seller.location_verification)}</div>
                                    </div>
                                </div>

                                <div class="row p-b-30">
                                    <div class="col-auto text-end update-meta">
                                        <p class="m-b-0 d-inline ${statusClass(seller.status)}">
                                            ${seller.status.charAt(0).toUpperCase() + seller.status.slice(1)}
                                        </p>
                                        <i class="feather icon-check bg-simple-c-yellow update-icon"></i>
                                    </div>
                                    <div class="col">
                                        <h6>Dashboard Access</h6>
                                        <p class="text-muted m-b-0">${logs.statusLog ? new Date(logs.statusLog.created_at).toLocaleString('en-GB', { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit', hour12: true }) : ''}</p>
                                        <div style="display:flex;">${actionButtons('status', seller.status)}</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary waves-effect md-close">Close</button>
                `;


                // inject into modal
                $('#verification-status .md-content div').html(html);
            }

            var table = $('#dom-jqry').DataTable();

            $('#dom-jqry tbody').on('click', 'tr td:first-child', function() {
                var row = $(this).closest('tr');
                var seller = row.data('seller');


                $(table.table().container()).removeClass('form-inline');
                // populate modal content dynamically 
                $('#seller-details .md-content h3').text(seller.name);
                let gstCertificateHtml = '';
                if (seller.seller.gst_certificate) {
                    gstCertificateHtml =
                        `<strong>GST Certificate:</strong> <a href="${seller.seller.gst_certificate}" target="_blank">Click Here</a></p>`;
                } else {
                    gstCertificateHtml = `</p>`
                }
                $('#seller-details .md-content div').html(` 
            <div class="row">
                <div class="col-md-6">
                    <p><b>Email:</b> ${seller.email}<br>
                    <b>Phone:</b> ${seller.phone_number}<br>
                    <b>Business Name:</b> ${seller.seller.business_name}<br>
                    <b>GST Number:</b> ${seller.seller.gst_number}<br>
                    ${gstCertificateHtml}
                </div>
                <div class="col-md-6">
                    <p><b>Address:</b> ${seller.seller.address}<br>
                    <b>City:</b> ${seller.seller.city}<br>
                    <b>State:</b> ${seller.seller.state}<br>
                    <b>PinCode:</b> ${seller.seller.pincode}</p>
                </div>
            </div>
            <button type="button" class="btn btn-primary waves-effect md-close">Close</button>
        `); // open the modal (depends on your modal plugin) 
                $('#seller-details').addClass('md-show');
            });
            $(document).on('click', '.md-close', function() {
                $('#seller-details').removeClass('md-show');
            });

            var table2 = $('#dom-jqry2').DataTable();

            $('#dom-jqry2 tbody').on('click', 'tr td:first-child', function() {
                var row = $(this).closest('tr');
                var seller = row.data('seller');


                $(table2.table().container()).removeClass('form-inline');
                // populate modal content dynamically 
                $('#seller-details .md-content h3').text(seller.name);
                let gstCertificateHtml = '';
                if (seller.seller.gst_certificate) {
                    gstCertificateHtml =
                        `<strong>GST Certificate:</strong> <a href="${seller.seller.gst_certificate}" target="_blank">Click Here</a></p>`;
                } else {
                    gstCertificateHtml = `</p>`
                }
                $('#seller-details .md-content div').html(` 
            <div class="row">
                <div class="col-md-6">
                    <p><b>Email:</b> ${seller.email}<br>
                    <b>Phone:</b> ${seller.phone_number}<br>
                    <b>Business Name:</b> ${seller.seller.business_name}<br>
                    <b>GST Number:</b> ${seller.seller.gst_number}<br>
                    ${gstCertificateHtml}
                </div>
                <div class="col-md-6">
                    <p><b>Address:</b> ${seller.seller.address}<br>
                    <b>City:</b> ${seller.seller.city}<br>
                    <b>State:</b> ${seller.seller.state}<br>
                    <b>PinCode:</b> ${seller.seller.pincode}</p>
                </div>
            </div>
            <button type="button" class="btn btn-primary waves-effect md-close">Close</button>
        `); // open the modal (depends on your modal plugin) 
                $('#seller-details').addClass('md-show');
            });
            $(document).on('click', '.md-close', function() {
                $('#seller-details').removeClass('md-show');
            });

            var table3 = $('#dom-jqry3').DataTable();

            $('#dom-jqry3 tbody').on('click', 'tr td:first-child', function() {
                var row = $(this).closest('tr');
                var seller = row.data('seller');


                $(table3.table().container()).removeClass('form-inline');
                // populate modal content dynamically 
                $('#seller-details .md-content h3').text(seller.name);
                let gstCertificateHtml = '';
                if (seller.seller.gst_certificate) {
                    gstCertificateHtml =
                        `<strong>GST Certificate:</strong> <a href="${seller.seller.gst_certificate}" target="_blank">Click Here</a></p>`;
                } else {
                    gstCertificateHtml = `</p>`
                }
                $('#seller-details .md-content div').html(` 
            <div class="row">
                <div class="col-md-6">
                    <p><b>Email:</b> ${seller.email}<br>
                    <b>Phone:</b> ${seller.phone_number}<br>
                    <b>Business Name:</b> ${seller.seller.business_name}<br>
                    <b>GST Number:</b> ${seller.seller.gst_number}<br>
                    ${gstCertificateHtml}
                </div>
                <div class="col-md-6">
                    <p><b>Address:</b> ${seller.seller.address}<br>
                    <b>City:</b> ${seller.seller.city}<br>
                    <b>State:</b> ${seller.seller.state}<br>
                    <b>PinCode:</b> ${seller.seller.pincode}</p>
                </div>
            </div>
            <button type="button" class="btn btn-primary waves-effect md-close">Close</button>
        `); // open the modal (depends on your modal plugin) 
                $('#seller-details').addClass('md-show');
            });
            $(document).on('click', '.md-close', function() {
                $('#seller-details').removeClass('md-show');
            });
            
        });
    </script>

@endsection

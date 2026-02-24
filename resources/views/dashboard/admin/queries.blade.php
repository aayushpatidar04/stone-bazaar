@extends('dashboard.index-main')
@section('title', 'Support Queries | Stone Bazaar')
@section('css-content')

@endsection
@section('page-header')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-4">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Support Queries</h4>
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
                <a class="nav-link active" data-bs-toggle="tab" href="#home3" role="tab">Pending Queries</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#profile3" role="tab">Closed Queries</a>
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
                                <th>Company</th>
                                <th>Vendor Type</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pending_queries as $query)
                                <tr data-query='@json($query)'>
                                    <td>{{ $query->name }}<br>{{ $query->phone }}<br>{{ $query->email }}</td>
                                    <td>{{ $query->company_name }}</td>
                                    <td>{{ $query->vendor_category }}</td>
                                    <td>{!! nl2br(e($query->message)) !!}</td>
                                    <td>
                                        @if($query->status == 'pending')
                                        <a href="javascript:void(0);" class="waves-effect md-trigger text-success close-query"
                                            style="font-size: 24px;" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Close Query" data-id="{{ $query->id }}"><i class="fa-solid fa-thumbs-up"></i></a>
                                        @endif
                                        <a href="javascript:void(0);" class="waves-effect md-trigger text-danger delete-query"
                                            style="font-size: 24px;" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Delete Query" data-id="{{ $query->id }}"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Details</th>
                                <th>Company</th>
                                <th>Vendor Type</th>
                                <th>Message</th>
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
                                <th>Company</th>
                                <th>Vendor Type</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="closed-queries-body">
                            @foreach ($closed_queries as $query)
                                <tr data-query='@json($query)'>
                                    <td>{{ $query->name }}<br>{{ $query->phone }}<br>{{ $query->email }}</td>
                                    <td>{{ $query->company_name }}</td>
                                    <td>{{ $query->vendor_category }}</td>
                                    <td>{!! nl2br(e($query->message)) !!}</td>
                                    <td>
                                        <a href="javascript:void(0);" class="waves-effect md-trigger text-danger delete-query"
                                            style="font-size: 24px;" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Delete Query" data-id="{{ $query->id }}"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Details</th>
                                <th>Company</th>
                                <th>Vendor Type</th>
                                <th>Message</th>
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
            $('#queries').addClass('active');

            $(document).on('click', '.close-query', function() {
                const id = $(this).data('id');
                swal({
                    title: "Confirm Action",
                    text: `Do you want to close this query?`,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function() {
                    $.post(`/admin/close-query/${id}`, {
                        _token: "{{ csrf_token() }}"
                    }).done(res => {
                        swal({
                            title: "Success!",
                            text: res.message,
                            type: "success"
                        }, function() {
                            const $row = $(`a.close-query[data-id="${id}"]`).closest('tr'); 

                            const rowData = $('#dom-jqry').DataTable().row($row).data();
                            rowData[4] = '';

                            $('#dom-jqry').DataTable().row($row).remove().draw();

                            $('#dom-jqry2').DataTable().row.add(rowData).draw();
                        });
                    }).fail(() => {
                        swal("Error!", "Something went wrong", "error");
                    });
                });


            });
        
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
                            const $row = $(`a.delete-query[data-id="${id}"]`).closest('tr'); 
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

            $('#dom-jqry2').DataTable({
                searching: true
            });
        });
    </script>

@endsection

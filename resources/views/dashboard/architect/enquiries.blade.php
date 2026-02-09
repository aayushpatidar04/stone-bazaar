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
                    @foreach ($architectEnquiries as $enquiry)
                        <tr data-architect='@json($enquiry)'>
                            <td>{{ $enquiry->name }}<br>{{ $enquiry->phone }}<br>{{ $enquiry->email }}</td>
                            <td>{!! nl2br(e($enquiry->message)) !!}</td>
                            <td><label
                                    class="label @if ($enquiry->status == 'pending') bg-danger @elseif($enquiry->status == 'forwarded') bg-success @else bg-warning @endif">{{ ucfirst($enquiry->status) }}</label>
                            </td>
                            <td>
                                @if($enquiry->status == 'forwarded')
                                <a href="javascript:void(0);" class="waves-effect md-trigger text-success close-architect-enquiry"
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
@endsection
@section('js-content')
    <script>
        $(document).ready(function() {
            $('#enquiries').addClass('active');

            $(document).on('click', '.close-architect-enquiry', function() {
                const id = $(this).data('id');
                swal({
                    title: "Confirm Action",
                    text: `Do you want to close enquiry?`,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function() {
                    $.post(`/architect/close-architect-enquiry/${id}`, {
                        _token: "{{ csrf_token() }}"
                    }).done(res => {
                        swal({
                            title: "Success!",
                            text: res.message,
                            type: "success"
                        }, function() {
                            const $row = $(`a.close-architect-enquiry[data-id="${id}"]`).closest('tr'); 
                            const $badge = $row.find('label'); 
                            $badge.removeClass('bg-danger bg-warning').addClass('bg-success').text('Closed');

                            $row.find('a.close-architect-enquiry').remove();
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
    </script>

@endsection

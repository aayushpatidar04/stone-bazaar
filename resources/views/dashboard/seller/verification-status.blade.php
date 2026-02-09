@extends('dashboard.index-main')
@section('title', 'Verification Pending')
@section('css-content')
    <style>
        #particles-js {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 1;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div id="particles-js"></div>
        <div class="text-center">
            <h2>Verification Pending</h2>
            <p>Your account is under verification. You cannot access full features until approval.</p>
        </div>
        <div>
            <div class="latest-update-card" style="max-width:400px; margin: auto;">
                <div class="card-body">
                    <div class="latest-update-box">
                        <div class="row p-t-20 p-b-30">
                            <div class="col-auto text-end update-meta">
                                <p
                                    class="m-b-0 d-inline @if ($seller->gst_verification === 'pending') text-warning 
                                        @elseif($seller->gst_verification === 'approved') text-success 
                                        @elseif($seller->gst_verification === 'rejected') text-danger 
                                        @else text-muted @endif">
                                    {{ ucfirst($seller->gst_verification) }}</p>
                                <i class="feather icon-file-text bg-info update-icon"></i>
                            </div>
                            <div class="col">
                                <h6>GST Verification</h6>
                                <p class="text-muted m-b-0">{{ $gstLog ? $gstLog->created_at->format('d M Y, h:i A') : '' }}
                                </p>
                            </div>
                        </div>
                        <div class="row p-b-30">
                            <div class="col-auto text-end update-meta">
                                <p
                                    class="m-b-0 d-inline @if ($seller->location_verification === 'pending') text-warning 
                                    @elseif($seller->location_verification === 'approved') text-success 
                                    @elseif($seller->location_verification === 'rejected') text-danger 
                                    @else text-muted @endif">
                                    {{ ucfirst($seller->location_verification) }}
                                </p>
                                <i class="feather icon-map-pin bg-simple-c-pink update-icon"></i>
                            </div>
                            <div class="col">
                                <h6>Location Verification</h6>
                                <p class="text-muted m-b-0">
                                    {{ $locationLog ? $locationLog->created_at->format('d M Y, h:i A') : '' }}</p>
                            </div>
                        </div>
                        <div class="row p-b-30">
                            <div class="col-auto text-end update-meta">
                                <p
                                    class="m-b-0 d-inline @if ($seller->status === 'pending') text-warning 
                                    @elseif($seller->status === 'approved') text-success 
                                    @elseif($seller->status === 'rejected') text-danger 
                                    @else text-muted @endif">
                                    {{ ucfirst($seller->status) }}
                                </p>
                                <i class="feather icon-check bg-simple-c-yellow  update-icon"></i>
                            </div>
                            <div class="col">
                                <h6>Dashboard Access</h6>
                                <p class="text-muted m-b-0">
                                    {{ $statusLog ? $statusLog->created_at->format('d M Y, h:i A') : '' }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <p class="text-muted">
                If you have any questions regarding your verification, please connect with our administration team.
                <a href="#" class="text-primary">Contact Us</a>
            </p>
        </div>

    </div>
@endsection
@section('js-content')
    <script src="{{ asset('plugins/particles/particles.js') }}"></script>
    
@endsection

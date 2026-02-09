@extends('dashboard.index-main')
@section('title', 'Profile - ' . $seller->name)
@section('css-content')

@endsection
@section('page-header')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Profile</h4>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="me-1" style="float: left;">
                            <a href="{{ Route('seller.dashboard') }}"> <i class="feather icon-home"></i> /</a>
                        </li>
                        <li class="me-1" style="float: left;"><a href="{{ Route('profile') }}">Profile /</a>
                        </li>
                        <li class="me-1" style="float: left;"><a href="javascript:void(0)">{{ $seller->name }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('content')
    <div class="col-lg-12">
        <div class="cover-profile">
            <div class="profile-bg-img" style="position: relative; display:inline-block; text-align:center;">
                <img class="profile-bg-img img-fluid"
                    src="{{ $seller->seller->banner ? $seller->seller->banner : asset('assets/images/user-profile/bg-img1.jpg') }}"
                    alt="bg-img" style="min-height: 400px; max-height: 500px; width:auto;">

                <!-- Pencil icon overlay -->
                <label for="bannerImageInput"
                    style="position: absolute; top: 10px; right: 10px; cursor: pointer; background: rgba(0,0,0,0.5); border-radius: 50%; padding: 6px;">
                    <i class="fa fa-pencil text-white"></i>
                </label>

                <!-- Hidden file input -->
                <form id="bannerImageForm" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="bannerImageInput" name="banner_image" accept="image/*" style="display:none;">
                </form>
            </div>

            <div class="col-md-12 mb-3">
                <div class="d-flex" style="align-items:end;">
                    <div class="profile-image me-3" style="position: relative; display:inline-block;">
                        <img class="user-img img-radius"
                            src="{{ $seller->seller->logo ? $seller->seller->logo : asset('assets/images/user-profile/follower/f-1.jpg') }}"
                            alt="company-logo" style="width:120px; height:auto;">

                        <!-- Pencil icon overlay -->
                        <label for="logoInput"
                            style="position: absolute; top: 5px; right: 5px; cursor: pointer; background: rgba(0,0,0,0.5); border-radius: 50%; padding: 6px;">
                            <i class="fa fa-pencil text-white"></i>
                        </label>

                        <!-- Hidden file input -->
                        <form id="logoForm" enctype="multipart/form-data">
                            @csrf
                            <input type="file" id="logoInput" name="logo" accept="image/*" style="display:none;">
                        </form>
                    </div>

                    <div class="user-title">
                        <h2 class="text-dark">{{ $seller->name }}</h2>
                        <span class="text-dark">{{ $seller->seller->business_name }}</span>
                    </div>
                </div>
                <div class="pull-right float-end">

                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-12">
        <!-- tab header start -->
        <div class="tab-header card">
            <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#personal" role="tab">Personal Info</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#binfo" role="tab">Award's & Certificate's</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#contacts" role="tab">Gallery</a>
                    <div class="slide"></div>
                </li>
            </ul>
        </div>
        <!-- tab header end -->
        <!-- tab content start -->
        <div class="tab-content">
            <!-- tab panel personal start -->
            <div class="tab-pane active" id="personal" role="tabpanel">
                <!-- personal card start -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">About Me</h5>
                        <button id="edit-btn" type="button"
                            class="btn btn-sm btn-primary waves-effect waves-light f-right">
                            <i class="icofont icofont-edit"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="view-info">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="general-info">
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Full Name</th>
                                                                <td>{{ $seller->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Business Name</th>
                                                                <td>{{ $seller->seller->business_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">GST No.</th>
                                                                <td>{{ $seller->seller->gst_number }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Address</th>
                                                                <td>{{ $seller->seller->address }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Location</th>
                                                                <td>{{ $seller->seller->pincode }} -
                                                                    {{ $seller->seller->city }},
                                                                    {{ $seller->seller->state }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Geo Location</th>
                                                                <td>{{ $seller->seller->geo_location }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- end of table col-lg-6 -->
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Email</th>
                                                                <td>{{ $seller->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Mobile Number</th>
                                                                <td>{{ $seller->phone_number }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Website</th>
                                                                <td><a href="{{ $seller->seller->website }}"
                                                                        target="_blank">{{ $seller->seller->website }}</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Years of Experience</th>
                                                                <td>{{ $seller->seller->years_of_experience }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Objective</th>
                                                                <td>{{ $seller->seller->about }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- end of table col-lg-6 -->
                                        </div>
                                        <!-- end of row -->
                                    </div>
                                    <!-- end of general info -->
                                </div>
                                <!-- end of col-lg-12 -->
                            </div>
                            <!-- end of row -->
                        </div>
                        <!-- end of view-info -->
                        <div class="edit-info">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="general-info">
                                        <form id="about-form" action="{{ Route('seller.updateAbout') }}"
                                            method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="icofont icofont-user"></i></span>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $seller->name }}"
                                                                            placeholder="Full Name" name="name">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="icofont icofont-building"></i></span>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $seller->seller->business_name }}"
                                                                            placeholder="Business Name"
                                                                            name="business_name">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="input-group" style="align-items: center;">
                                                                        <label for="years_of_experience"
                                                                            class="form-label me-3"><b>Years of Experience
                                                                                : </b></label>
                                                                        <input id="dropper-default" class="form-control"
                                                                            type="number"
                                                                            value="{{ $seller->seller->years_of_experience }}"
                                                                            name="years_of_experience" />
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- end of table col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="icofont icofont-mobile-phone"></i></span>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $seller->phone_number }}"
                                                                            name="phone_number"
                                                                            placeholder="Mobile Number">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                class="icofont icofont-earth"></i></span>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $seller->seller->website }}"
                                                                            name="website" placeholder="website">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <textarea class="form-control" id="objective" rows="3" name="about"
                                                                        placeholder="Enter business objective...">{{ $seller->seller->about }}</textarea>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- end of table col-lg-6 -->
                                            </div>
                                            <!-- end of row -->
                                            <div class="text-center">
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light m-r-20">Save</button>
                                                <a href="javascript:void(0)" id="edit-cancel"
                                                    class="btn btn-default waves-effect">Cancel</a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end of edit info -->
                                </div>
                                <!-- end of col-lg-12 -->
                            </div>
                            <!-- end of row -->
                        </div>
                        <!-- end of edit-info -->
                    </div>
                    <!-- end of card-body -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text">Description About
                                    Me</h5>
                                <button id="edit-info-btn" type="button"
                                    class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                    <i class="icofont icofont-edit"></i>
                                </button>
                            </div>
                            <div class="card-body user-desc">
                                <div class="view-desc">
                                    {!! $seller->seller->description !!}
                                </div>
                                <div class="edit-desc">
                                    <form id="description-form" action="{{ Route('seller.updateDescription') }}"
                                        method="POST">
                                        @csrf
                                        <div class="col-md-12">

                                            <textarea id="description" name="description" class="form-control">{{ $seller->seller->description }}</textarea>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light m-r-20 m-t-20">Save</button>
                                            <a href="javascript:void(0)" id="edit-cancel-btn"
                                                class="btn btn-default waves-effect m-t-20">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text">Stone category(s) you work in</h5>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-dismissible alert-warning border-warning">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>Stone Category Selection:</strong> Please select the stone category(s) you work
                                    in.
                                    <form action="{{ Route('seller.update-domain') }}" method="POST">
                                        @csrf
                                        <label>
                                            <input type="checkbox" name="domains[]" value="Marble"
                                                {{ $seller->sellerDomains->contains('domain', 'Marble') ? 'checked' : '' }}>
                                            Marble
                                        </label>
                                        <br>
                                        <label>
                                            <input type="checkbox" name="domains[]" value="Granite"
                                                {{ $seller->sellerDomains->contains('domain', 'Granite') ? 'checked' : '' }}>
                                            Granite
                                        </label>
                                        <br>
                                        <label>
                                            <input type="checkbox" name="domains[]" value="Italian"
                                                {{ $seller->sellerDomains->contains('domain', 'Italian') ? 'checked' : '' }}>
                                            Italian
                                        </label>
                                        <br><br>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- personal card end-->
            </div>
            <!-- tab pane personal end -->
            
            <!-- tab pane info start -->
            <div class="tab-pane" id="binfo" role="tabpanel">
                <!-- info card start -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">Award's</h5>
                        <button id="add-award-btn" type="button" data-bs-toggle="modal" data-bs-target="#add-award"
                            class="btn btn-sm btn-primary waves-effect waves-light f-right">
                            <i class="icofont icofont-plus"></i> Add Award </button>
                    </div>
                    <div class="card-body">
                        <div class="row" id="award-row">
                            @foreach ($seller->sellerAwards as $award)
                                <div class="col-lg-4 col-sm-6 award-item" data-id="{{ $award->id }}">
                                    <div class="thumbnail position-relative">
                                        <div class="thumb">
                                            <a href="{{ $award->image }}" class="glightbox"
                                                data-glightbox="gallery: grid; title: {{ $award->name }}">
                                                <img src="{{ $award->image }}" alt="{{ $award->name }}"
                                                    class="img-fluid img-thumbnail">
                                            </a>
                                        </div>
                                        <!-- Close button overlay -->
                                        <button type="button" class="btn btn-sm btn-danger delete-award"
                                            style="position:absolute; top:5px; right:5px;">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text">Certificate's</h5>
                                <button id="add-certificate-btn" type="button" data-bs-toggle="modal"
                                    data-bs-target="#add-certificate"
                                    class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                    <i class="icofont icofont-plus"></i> Add Certificate </button>
                            </div>
                            <div class="card-body">
                                <div class="row" id="certificate-row">
                                    @foreach ($seller->sellerCertificates as $certificate)
                                        <div class="col-lg-4 col-sm-6 certificate-item" data-id="{{ $certificate->id }}">
                                            <div class="thumbnail position-relative">
                                                <div class="thumb">
                                                    <a href="{{ $certificate->image }}" class="glightbox"
                                                        data-glightbox="gallery: grid; title: {{ $certificate->name }}">
                                                        <img src="{{ $certificate->image }}"
                                                            alt="{{ $certificate->name }}"
                                                            class="img-fluid img-thumbnail">
                                                    </a>
                                                </div>
                                                <!-- Close button overlay -->
                                                <button type="button" class="btn btn-sm btn-danger delete-certificate"
                                                    style="position:absolute; top:5px; right:5px;">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- info card end -->
            </div>
            <!-- tab pane info end -->
            
            <!-- tab pane contact start -->
            <div class="tab-pane" id="contacts" role="tabpanel">
                <div class="row">
                    <div class="col-xl-3">
                        <!-- user contact card left side start -->
                        <div class="card">
                            <div class="card-header contact-user">
                                <img class="img-radius img-40" src="{{ asset('assets/images/avatar-4.jpg') }}"
                                    alt="contact-user">
                                <h5 class="m-l-10">{{ Auth::user()->name }}</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-contacts" id="menu">
                                    <li class="list-group-item active" data-target="office-image"><a
                                            href="javascript:void(0)">Office Image</a></li>
                                    <li class="list-group-item" data-target="warehouse-image"><a
                                            href="javascript:void(0)">Warehouse Image</a></li>
                                    <li class="list-group-item" data-target="gallery"><a
                                            href="javascript:void(0)">Gallery</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Gallery<span class="f-15"> ({{ $seller->sellerGallery->count() }})</span></h4>
                            </div>
                            <div class="card-body">
                                <div class="connection-list">
                                    @foreach($seller->sellerGallery->sortByDesc('created_at')->take(8) as $image)
                                        <a href="{{ $image->image }}"
                                            class="glightbox" data-glightbox="gallery: grid; title: {{ \Illuminate\Support\Str::title($image->type) }}">
                                            <img class="img-fluid img-radius"
                                                src="{{ $image->image }}"
                                                alt="f-1" data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-original-title="Airi Satou">
                                        </a>
                                    @endforeach

                                    
                                    <a href="{{ Route('seller.gallery') }}" class="view-all-link">
                                        <div style="
                                            width:60px; 
                                            height:60px; 
                                            display:flex; 
                                            align-items:center; 
                                            justify-content:center; 
                                            background:#dbb42c; 
                                            border-radius:8px; 
                                            font-weight:bold; 
                                            color:#fff;
                                        ">
                                            View All
                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>
                        <!-- user contact card left side end -->
                    </div>
                    <div class="col-xl-9">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card" id="office-image">
                                    <div class="card-header">
                                        <h5 class="card-header-text">Office Image (*this image will be used in catalogue)
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="profile-bg-img office-image"
                                            style="position: relative; display:inline-block;">
                                            <img class="profile-bg-img img-fluid"
                                                src="{{ $seller->seller->office_image ? $seller->seller->office_image : asset('assets/images/user-profile/bg-img1.jpg') }}"
                                                alt="bg-img">

                                            <!-- Pencil icon overlay -->
                                            <label for="officeImageInput"
                                                style="position: absolute; top: 10px; right: 10px; cursor: pointer; background: rgba(0,0,0,0.5); border-radius: 50%; padding: 6px;">
                                                <i class="fa fa-pencil text-white"></i>
                                            </label>

                                            <!-- Hidden file input -->
                                            <form id="officeImageForm" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" id="officeImageInput" name="image"
                                                    accept="image/*" style="display:none;">
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="card" id="warehouse-image" style="display:none;">
                                    <div class="card-header">
                                        <h5 class="card-header-text">Warehouse Image (*this image will be used in
                                            catalogue)</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="profile-bg-img warehouse-image"
                                            style="position: relative; display:inline-block;">
                                            <img class="profile-bg-img img-fluid"
                                                src="{{ $seller->seller->warehouse_image ? $seller->seller->warehouse_image : asset('assets/images/user-profile/bg-img1.jpg') }}"
                                                alt="bg-img">

                                            <!-- Pencil icon overlay -->
                                            <label for="warehouseImageInput"
                                                style="position: absolute; top: 10px; right: 10px; cursor: pointer; background: rgba(0,0,0,0.5); border-radius: 50%; padding: 6px;">
                                                <i class="fa fa-pencil text-white"></i>
                                            </label>

                                            <!-- Hidden file input -->
                                            <form id="warehouseImageForm" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" id="warehouseImageInput" name="image"
                                                    accept="image/*" style="display:none;">
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="card" id="gallery" style="display:none;">
                                    <div class="card-header">
                                        <h5 class="card-header-text">Gallery</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ Route('seller.uploadGallery') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div id="image-fields">
                                                <div class="row p-t-10 p-b-10 image-row mb-3">
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <label for="image-0" class="image-trigger">
                                                            <img src="{{ asset('assets/images/product-edit/select-image.png') }}"
                                                                class="img-fluid width-100 m-b-20 preview"
                                                                alt="No image selected">
                                                        </label>
                                                        <input type="file" name="images[]" id="image-0"
                                                            class="form-control mt-2 image-input d-none" accept="image/*"
                                                            required>
                                                    </div>
    
                                                    <div class="col-lg-8 col-md-6 col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="row">
                                                                    <div class="col-xs-6 edit-left">
                                                                        <div class="form-group">
                                                                            <label for="image-type" class="form-label">Image
                                                                                Type</label>
                                                                            <select name="type[0]" id="image-type"
                                                                                class="form-control" required>
                                                                                <option value="">-- Select Image Type --</option>
                                                                                <option value="office">Office / Showroom</option>
                                                                                <option value="warehouse">Warehouse / Stockyard</option>
                                                                                <option value="project">Projects / Installations</option>
                                                                                <option value="factory">Factory / Production</option>
                                                                                <option value="events">Events / Exhibitions</option>
                                                                                <option value="raw material">Raw Material /Quarry</option>
                                                                                <option value="other">Other</option>
                                                                            </select>
                                                                        </div>
    
                                                                        <div class="edit-right text-end">
                                                                            <!-- First row has Add button -->
                                                                            <button type="button"
                                                                                class="btn btn-success add-image"
                                                                                style="margin: 0;">
                                                                                Add <i
                                                                                    class="icofont icofont-plus f-16 m-l-5"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-end gap-3 mt-3">
                                                <button type="submit" class="btn btn-success waves-effect" style="margin: 0;">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tab pane contact end -->
        </div>
        <!-- tab content end -->
    </div>

    {{-- -----------------------Modals------------------------ --}}
    <div class="modal fade" id="add-award" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Awards</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="award-form" action="{{ Route('seller.addAwards') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div id="award-fields">
                            <div class="row award-row mb-3">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Award Title</label>
                                        <input type="text" class="form-control" name="name[]"
                                            placeholder="Enter Award Title" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Award Image</label>
                                        <input type="file" accept="image/*" class="form-control" name="image[]"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <!-- only first row has plus -->
                                    <button type="button" class="btn btn-success add-field me-2"><i
                                            class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-certificate" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Certificates</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="certificate-form" action="{{ Route('seller.addCertificates') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div id="certificate-fields">
                            <div class="row certificate-row mb-3">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Certificate Title</label>
                                        <input type="text" class="form-control" name="name[]"
                                            placeholder="Enter Certificate Title" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Certificate Image</label>
                                        <input type="file" accept="image/*" class="form-control" name="image[]"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <!-- only first row has plus -->
                                    <button type="button" class="btn btn-success add-field me-2"><i
                                            class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('js-content')
    <script src="{{ asset('assets/pages/user-profile.js') }}"></script>
    <!-- echart js -->
    <script src="{{ asset('assets/pages/chart/echarts/js/echarts-all.js') }}"></script>
    <!-- Bootstrap date-time-picker js -->
    <script src="{{ asset('assets/pages/advance-elements/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/pages/advance-elements/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Date-range picker js -->
    <script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- Date-dropper js -->
    <script src="{{ asset('plugins/datedropper/js/datedropper.min.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#profile").addClass('active');

            $('#description').summernote({
                height: 400
            });

            $(document).on('click', '.delete-award', function() {
                let awardItem = $(this).closest('.award-item');
                let awardId = awardItem.data('id');

                swal({
                    title: "Are you sure?",
                    text: "This will permanently delete the award image.",
                    icon: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonText: 'Yes, delete it!',
                    showLoaderOnConfirm: true
                }, function() {

                    $.post(`/seller/delete-award`, {
                        id: awardId,
                        _token: "{{ csrf_token() }}"
                    }).done(res => {
                        swal({
                            title: "Success!",
                            text: res.message,
                            type: "success"
                        }, function() {
                            awardItem.fadeOut(300, function() {
                                $(this).remove();
                            });
                        });
                    }).fail(() => {
                        swal("Error!", "Something went wrong", "error");
                    });
                });
            });

            $(document).on('click', '.delete-certificate', function() {
                let certificateItem = $(this).closest('.certificate-item');
                let certificateId = certificateItem.data('id');

                swal({
                    title: "Are you sure?",
                    text: "This will permanently delete the certificate image.",
                    icon: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonText: 'Yes, delete it!',
                    showLoaderOnConfirm: true
                }, function() {

                    $.post(`/seller/delete-certificate`, {
                        id: certificateId,
                        _token: "{{ csrf_token() }}"
                    }).done(res => {
                        swal({
                            title: "Success!",
                            text: res.message,
                            type: "success"
                        }, function() {
                            certificateItem.fadeOut(300, function() {
                                $(this).remove();
                            });
                        });
                    }).fail(() => {
                        swal("Error!", "Something went wrong", "error");
                    });
                });
            });

        });

        document.getElementById('bannerImageInput').addEventListener('change', function() {
            const formData = new FormData(document.getElementById('bannerImageForm'));

            fetch("{{ route('seller.updateBanner') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update image preview
                        document.querySelector('.profile-bg-img img').src = data.new_image_url;
                        alert("Banner image updated successfully!");
                    } else {
                        alert("Failed to update image");
                    }
                })
                .catch(err => console.error(err));
        });

        document.getElementById('logoInput').addEventListener('change', function() {
            const formData = new FormData(document.getElementById('logoForm'));

            fetch("{{ route('seller.updateLogo') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update logo preview
                        document.querySelector('.user-img').src = data.new_logo_url;
                        alert("Logo updated successfully!");
                    } else {
                        alert("Failed to update logo");
                    }
                })
                .catch(err => console.error(err));
        });

        document.getElementById('about-form').addEventListener('submit', function(e) {
            e.preventDefault(); // stop normal form submission 
            const form = e.target;
            const formData = new FormData(form);
            fetch(form.action, {
                    method: form.method,
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        alert("About section updated successfully!");
                        $('.view-info th:contains("Mobile Number")').next('td').text(data.user.phone_number);
                        $('.view-info th:contains("Full Name")').next('td').text(data.user.name);
                        $('.view-info th:contains("Business Name")').next('td').text(data.user.seller
                            .business_name);
                        $('.view-info th:contains("Website")').next('td').html(
                            `<a href="${data.user.seller.website}" target="_blank">${data.user.seller.website}</a>`
                        );
                        $('.view-info th:contains("Years of Experience")').next('td').text(data.user.seller
                            .years_of_experience);
                        $('.view-info th:contains("Objective")').next('td').text(data.user.seller.about);

                        // Example: update other fields 
                        // Repeat for phone, website, about, etc. 

                        // Switch back to view mode 
                        document.querySelector('.edit-info').style.display = 'none';
                        document.querySelector('.view-info').style.display = 'block';
                    } else {
                        alert("Failed to update: " + (data.message || 'Unknown error'));
                    }
                })
                .catch(err => console.error(err));
        });

        document.getElementById('description-form').addEventListener('submit', function(e) {
            e.preventDefault(); // stop normal form submission 
            const form = e.target;
            const formData = new FormData(form);
            fetch(form.action, {
                    method: form.method,
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        alert("Description section updated successfully!");

                        $('.edit-desc textarea').val(data.user.seller.description); // update edit form
                        $('.view-desc').html(data.user.seller.description); // update view section

                        // Switch back to view mode 
                        document.querySelector('.edit-desc').style.display = 'none';
                        document.querySelector('.view-desc').style.display = 'block';
                    } else {
                        alert("Failed to update: " + (data.message || 'Unknown error'));
                    }
                })
                .catch(err => console.error(err));
        });

        function initDynamicFields(containerId, rowClass) {
            const container = document.getElementById(containerId);

            document.addEventListener('click', function(e) {
                // Add new row
                if (e.target.closest(`#${containerId} .add-field`)) {
                    let row = e.target.closest(`.${rowClass}`);
                    let clone = row.cloneNode(true);

                    // clear values
                    clone.querySelectorAll('input').forEach(input => input.value = '');

                    // replace buttons with only remove
                    let btnContainer = clone.querySelector('.col-md-2');
                    btnContainer.innerHTML = `
                        <button type="button" class="btn btn-danger remove-field">
                            <i class="fa fa-trash"></i>
                        </button>
                    `;

                    container.appendChild(clone);
                }

                // Remove row
                if (e.target.closest(`#${containerId} .remove-field`)) {
                    let row = e.target.closest(`.${rowClass}`);
                    row.remove();
                }
            });
        }

        // Initialize for awards
        initDynamicFields('award-fields', 'award-row');

        // Initialize for certificates
        initDynamicFields('certificate-fields', 'certificate-row');

        document.getElementById('award-form').addEventListener('submit', function(e) {
            e.preventDefault(); // stop normal form submission 
            const form = e.target;
            const formData = new FormData(form);
            fetch(form.action, {
                    method: form.method,
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        let row = document.getElementById('award-row'); // your awards row container 
                        data.awards.forEach(award => {
                            let html = ` <div class="col-lg-4 col-sm-6 award-item" data-id="${award.id}"> 
                                    <div class="thumbnail position-relative"> 
                                        <div class="thumb"> 
                                            <a href="${award.image}" class="glightbox" data-glightbox="gallery: grid; title: ${award.name}"> 
                                                <img src="${award.image}" alt="${award.name}" class="img-fluid img-thumbnail"> 
                                            </a> 
                                        </div> 
                                        <button type="button" class="btn btn-sm btn-danger delete-award" style="position:absolute; top:5px; right:5px;"> <i class="fa fa-times"></i> </button> 
                                    </div> 
                                </div> `;
                            row.insertAdjacentHTML('beforeend', html);
                        });

                        // Close modal after success 
                        let modalEl = document.getElementById('add-award');
                        let modal = bootstrap.Modal.getInstance(modalEl);
                        modal.hide();
                    } else {
                        alert("Failed to update: " + (data.message || 'Unknown error'));
                    }
                })
                .catch(err => console.error(err));
        });

        document.getElementById('certificate-form').addEventListener('submit', function(e) {
            e.preventDefault(); // stop normal form submission 
            const form = e.target;
            const formData = new FormData(form);
            fetch(form.action, {
                    method: form.method,
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        let row = document.getElementById('certificate-row'); // your awards row container 
                        data.certificates.forEach(award => {
                            let html = ` <div class="col-lg-4 col-sm-6 award-item" data-id="${award.id}"> 
                                    <div class="thumbnail position-relative"> 
                                        <div class="thumb"> 
                                            <a href="${award.image}" class="glightbox" data-glightbox="gallery: grid; title: ${award.name}"> 
                                                <img src="${award.image}" alt="${award.name}" class="img-fluid img-thumbnail"> 
                                            </a> 
                                        </div> 
                                        <button type="button" class="btn btn-sm btn-danger delete-award" style="position:absolute; top:5px; right:5px;"> <i class="fa fa-times"></i> </button> 
                                    </div> 
                                </div> `;
                            row.insertAdjacentHTML('beforeend', html);
                        });

                        // Close modal after success 
                        let modalEl = document.getElementById('add-certificate');
                        let modal = bootstrap.Modal.getInstance(modalEl);
                        modal.hide();
                    } else {
                        alert("Failed to update: " + (data.message || 'Unknown error'));
                    }
                })
                .catch(err => console.error(err));
        });

        document.addEventListener("DOMContentLoaded", function() {
            const menuItems = document.querySelectorAll("#menu .list-group-item");
            const cards = document.querySelectorAll(".col-sm-12 .card");
            menuItems.forEach(item => {
                item.addEventListener("click", function(e) {
                    e.preventDefault(); // Remove active class from all menu items 
                    menuItems.forEach(i => i.classList.remove("active"));
                    this.classList.add("active"); // Hide all cards 
                    cards.forEach(card => card.style.display = "none"); // Show the selected card 
                    const targetId = this.getAttribute("data-target");
                    document.getElementById(targetId).style.display = "block";
                });
            });
        });

        document.getElementById('officeImageInput').addEventListener('change', function() {
            const formData = new FormData(document.getElementById('officeImageForm'));

            fetch("{{ route('seller.updateOfficeImage') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update image preview
                        document.querySelector('.office-image img').src = data.new_image_url;
                        alert("Office image updated successfully!");
                    } else {
                        alert("Failed to update image");
                    }
                })
                .catch(err => console.error(err));
        });

        document.getElementById('warehouseImageInput').addEventListener('change', function() {
            const formData = new FormData(document.getElementById('warehouseImageForm'));

            fetch("{{ route('seller.updateWarehouseImage') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update image preview
                        document.querySelector('.warehouse-image img').src = data.new_image_url;
                        alert("Warehouse image updated successfully!");
                    } else {
                        alert("Failed to update image");
                    }
                })
                .catch(err => console.error(err));
        });
    
        function updateImageIds() {
            document.querySelectorAll('.image-row').forEach((row, index) => {
                const input = row.querySelector('.image-input');
                const label = row.querySelector('.image-trigger');
                const newId = `image-${index}`;
                input.id = newId;
                label.setAttribute('for', newId);

                const select = row.querySelector('select[name^="type"]');
                if (select) {
                    select.name = `type[${index}]`;
                }

            });
        }

        document.addEventListener('click', function(e) {
            // Add new image row
            if (e.target.closest('.add-image')) {
                let container = document.getElementById('image-fields');
                let row = e.target.closest('.image-row');
                let clone = row.cloneNode(true);

                // clear inputs
                clone.querySelectorAll('input').forEach(input => {
                    if (input.type === 'file') {
                        input.value = '';
                    } else if (input.type === 'text') {
                        input.value = '';
                    } else if (input.type === 'radio') {
                        input.checked = false;
                    }
                });

                // reset preview image
                clone.querySelector('.preview').src = "{{ asset('assets/images/product-edit/select-image.png') }}";

                // replace button with Remove
                let btnContainer = clone.querySelector('.edit-right');
                btnContainer.innerHTML = `
                    <button type="button" class="btn btn-danger remove-image" style="margin: 0;">
                        Remove <i class="icofont icofont-close-circled f-16 m-l-5"></i>
                    </button>
                `;

                container.appendChild(clone);
                updateImageIds();
            }

            // Remove image row
            if (e.target.closest('.remove-image')) {
                let row = e.target.closest('.image-row');
                row.remove();
            }
        });

        // Preview selected image
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('image-input')) {
                let fileInput = e.target;
                let preview = fileInput.closest('.image-row').querySelector('.preview');

                if (fileInput.files && fileInput.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(ev) {
                        preview.src = ev.target.result;
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        });


    </script>
@endsection

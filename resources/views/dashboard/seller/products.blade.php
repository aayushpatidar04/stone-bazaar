@extends('dashboard.index-main')
@section('title', 'Products')
@section('css-content')
    <style>
        .card {
            margin-bottom: 5px;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
@endsection

@section('page-header')
    @if ($domains->isEmpty())
        <div class="alert alert-dismissible alert-warning border-warning">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Stone Category Selection Required:</strong> Please select the stone category(s) you work in.
            <form action="{{ Route('seller.update-domain') }}" method="POST">
                @csrf
                <label>
                    <input type="checkbox" name="domains[]" value="Marble"> Marble
                </label>
                <br>
                <label>
                    <input type="checkbox" name="domains[]" value="Granite"> Granite
                </label>
                <br>
                <label>
                    <input type="checkbox" name="domains[]" value="Italian"> Italian
                </label>
                <br><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @else
        @if($domains->count() > 1)
        <div class="row mb-3">
            @php
                $bgClasses = ['bg-c-yellow', 'bg-c-green', 'bg-c-pink', 'bg-c-lite-green'];
            @endphp
            @foreach ($domains as $index => $domain)
                @php
                    $randomClass = $bgClasses[array_rand($bgClasses)];
                @endphp
                <div class="col-xl-4 col-md-6">
                    <div class="card {{ $randomClass }} update-card">
                        <div class="card-body">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    <h4 class="text-white">{{ $domain->subCategories->count() }}</h4>
                                    <h6 class="text-white m-b-0"><a class="text-white" href="{{ Route('seller.products.domain', ['domain' => $domain->id]) }}">{{ $domain->domain }}
                                            {{ $domain->subCategories->count() > 1 ? 'subcategories' : 'subcategory' }}</a>
                                    </h6>
                                </div>
                                <div class="col-4 text-end">
                                    <canvas id="update-chart-{{ $index + 1 }}" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Products"><i
                                    class="fa-solid fa-cubes text-dark f-14 m-r-10"></i>{{ $domain->products->count() }}
                            </p>
                            <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Enquiries"><i class="fa-solid fa-question text-dark f-14 m-r-10"></i>0</pclass=>
                            <p class="text-white m-b-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Orders">
                                <i class="fa-solid fa-line-chart text-dark f-14 m-r-10"></i>0
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
            <small class="text-info">* Update Stone category you work in from profile page.</small>
        </div>
        @endif
    @endif
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <a href="{{ Route('seller.products') }}"><h4>Products</h4></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="me-1" style="float: left;">
                            <a href="{{ Route('seller.dashboard') }}"> <i class="feather icon-home"></i> /</a>
                        </li>
                        <li class="me-1" style="float: left;"><a href="{{ Route('seller.products') }}">Products /</a>
                        </li>
                        <li class="me-1" style="float: left;"><a href="javascript:void(0)">{{ Auth::user()->seller->business_name }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @foreach ($domains as $domain)
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <a href="{{ Route('seller.products.domain', ['domain' => $domain->id]) }}"><h3>{{ $domain->domain }}</h3></a>
                <a href="javascript:void(0)" class="btn btn-primary" data-domain="{{ $domain->id }}"
                    data-modal="add-subcategory"><i class="fa-solid fa-plus me-2"></i>Add Subcategory</a>
            </div>
            <div class="card-body">
                <div id="{{ $domain->id }}-subcategory">
                    @foreach ($domain->subCategories as $subcategory)
                        <div class="d-flex justify-content-between">
                            <a href="{{ Route('seller.products.subcategory', ['domain' => $subcategory->seller_domain_id, 'subcategory' => $subcategory->id]) }}"><h5>{{ $subcategory->name }}</h5></a>
                            <a href="javascript:void(0)" class="btn btn-primary" data-subcategory="{{ $subcategory->id }}"
                                data-modal="add-product"><i class="fa-solid fa-plus me-2"></i>Add Product</a>
                        </div>
                        <div id="{{ $subcategory->id }}-products">
                            <div class="row mt-3">
                                @foreach ($subcategory->products as $product)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        @php
                                            $displayImage = collect($product->images)->firstWhere('type', 'display');
                                        @endphp
                                        <div class="card">
                                            <div class="card-body"
                                                style="background-image: url('{{ $displayImage['image'] }}'); background-size: cover; background-position: center; height: 350px;">
                                            </div>
                                            <div class="card-footer">
                                                <span><b>{{ $product->name }}</b></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach



    {{-- Modals  --------------------- --}}

    <div class="md-modal md-effect-8" id="add-subcategory" tabindex="-1" role="dialog">
        <div class="md-content">
            <h3>Add Sub Category</h3>
            <div>
                <form id="add-subcategory-form" action="{{ Route('seller.addSubcategory') }}" method="POST" class="p-3">
                    @csrf
                    <input type="hidden" name="domain">
                    <div class="row">
                        <div class="col-2 mb-2">
                            <label for="name">Name</label>
                        </div>
                        <div class="col-10 mb-2">
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-2 mb-2">
                            <label for="description">Description</label>
                        </div>
                        <div class="col-10 mb-2">
                            <textarea name="description" rows="4" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-3">
                        <button type="button" class="btn btn-primary waves-effect md-close"
                            style="margin:0;">Close</button>
                        <button type="submit" class="btn btn-success waves-effect" style="margin:0;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="md-modal md-effect-1" id="add-product" tabindex="-1" role="dialog"
        style="overflow-y: auto; max-height: 90vh;">
        <div class="md-content">
            <h3>Add Product</h3>
            <div>
                <form id="add-product-form" action="{{ Route('seller.addProduct') }}" method="POST" class="p-3"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="subcategory" value="{{ old('subcategory') }}">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="productTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="basic-tab" data-bs-toggle="tab" href="#basic"
                                role="tab">Basic Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="images-tab" data-bs-toggle="tab" href="#images"
                                role="tab">Images</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="specs-tab" data-bs-toggle="tab" href="#specs"
                                role="tab">Specifications</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content mt-3">
                        <!-- Basic Info -->
                        <div class="tab-pane fade show active" id="basic" role="tabpanel">
                            <div class="mb-3">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" rows="4" class="form-control">{{ old(key: 'description') }}</textarea>
                            </div>
                        </div>

                        <!-- Images -->
                        <div class="tab-pane fade" id="images" role="tabpanel">
                            <div class="mb-3">
                                <div id="image-fields">
                                    <div class="row p-t-10 p-b-10 image-row mb-3">
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <label for="image-0" class="image-trigger">
                                                <img src="{{ asset('assets/images/product-edit/select-image.png') }}"
                                                    class="img-fluid width-100 m-b-20 preview" alt="No image selected">
                                            </label>
                                            <input type="file" name="images[]" id="image-0"
                                                class="form-control mt-2 image-input d-none" accept="image/*" required>
                                        </div>

                                        <div class="col-lg-8 col-md-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-xs-6 edit-left">
                                                            <div class="form-radio">
                                                                <div class="radio radiofill">
                                                                    <label class="form-label">
                                                                        <input type="radio" name="type[0]"
                                                                            value="display" required>
                                                                        <i class="helper"></i>Display Image
                                                                    </label>
                                                                </div>
                                                                <div class="radio radiofill">
                                                                    <label class="form-label">
                                                                        <input type="radio" name="type[0]"
                                                                            value="book match" required>
                                                                        <i class="helper"></i>Book Match
                                                                    </label>
                                                                </div>
                                                                <div class="radio radiofill">
                                                                    <label class="form-label">
                                                                        <input type="radio" name="type[0]"
                                                                            value="other" required>
                                                                        <i class="helper"></i>Other
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="edit-right text-end">
                                                                <!-- First row has Add button -->
                                                                <button type="button" class="btn btn-success add-image"
                                                                    style="margin: 0;">
                                                                    Add <i class="icofont icofont-plus f-16 m-l-5"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Specifications -->
                        <div class="tab-pane fade" id="specs" role="tabpanel">
                            <div class="mb-3">
                                <label for="finishes">Finishes</label>
                                <input type="text" name="finishes" value="{{ old('finishes') }}" id="finishes"
                                    class="form-control tagify" placeholder="Enter finishes">
                            </div>

                            <div class="mb-3">
                                <label for="sizes">Sizes</label>
                                <input type="text" name="sizes" id="sizes" value="{{ old('sizes') }}"
                                    class="form-control tagify" placeholder="Enter sizes">
                            </div>

                            <div class="mb-3">
                                <label for="thickness">Thickness</label>
                                <input type="text" name="thickness" id="thickness" value="{{ old('thickness') }}"
                                    class="form-control" placeholder="Enter thickness">
                            </div>

                            <div class="mb-3">
                                <label for="color">Color</label>
                                <input type="text" name="color" id="color" class="form-control"
                                    value="{{ old('color') }}" placeholder="Enter color">
                            </div>

                            <div class="mb-3">
                                <label for="quality">Quality</label>
                                <textarea name="quality" id="quality" rows="4" class="form-control" placeholder="Describe quality">{{ old('quality') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="usage_area">Usage Area</label>
                                <input type="text" name="usage_area" id="usage_area" class="form-control tagify"
                                    value="{{ old('usage_area') }}" placeholder="Enter usage areas">
                            </div>
                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-end gap-3 mt-3">
                        <button type="button" class="btn btn-primary waves-effect md-close"
                            style="margin: 0;">Close</button>
                        <button type="submit" class="btn btn-success waves-effect" style="margin: 0;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js-content')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script>
        const subcategoryRouteBase = "{{ route('seller.products.subcategory', ['domain' => '__DOMAIN__', 'subcategory' => '__SUBCATEGORY__']) }}";

        $(document).ready(function() {
            $('#products').addClass('active');
            
            $(document).on('click', '[data-modal="add-subcategory"]', function() {
                // parse JSON from data attributes
                const domain = $(this).data('domain');

                $('#add-subcategory input[name="domain"]').val(domain);

                // show modal
                $('#add-subcategory').addClass('md-show');
            });

            $(document).on('click', '.md-close', function() {
                $('#add-subcategory').removeClass('md-show');
                $('#add-product').removeClass('md-show');
            });

            $(document).on('click', '[data-modal="add-product"]', function() {
                // parse JSON from data attributes
                const subcategory = $(this).data('subcategory');

                $('#add-product input[name="subcategory"]').val(subcategory);

                // show modal
                $('#add-product').addClass('md-show');
            });

            $(document).on('submit', '#add-subcategory-form', function(e) {
                e.preventDefault();

                let form = $(this);
                let submitBtn = form.find('button[type="submit"]'); // Disable button and show loader text 
                submitBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Saving...');

                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: form.serialize(),
                    success: function(response) {
                        // response should contain the new subcategory data
                        let subcategoryHtml = `
                            <div class="d-flex justify-content-between">
                                <a href="${subcategoryRouteBase.replace('__DOMAIN__', response.subcategory.seller_domain_id).replace('__SUBCATEGORY__', response.subcategory.id)}"><h5>${response.subcategory.name}</h5></a>
                                <a href="javascript:void(0)" class="btn btn-primary" 
                                data-subcategory="${response.subcategory.id}" data-modal="add-product">
                                <i class="fa-solid fa-plus me-2"></i>Add Product
                                </a>
                            </div>
                            <div id="${response.subcategory.id}-products">
                                <div class="row mt-3"></div>
                            </div>
                            <hr>
                        `;
                        $(`#${response.subcategory.seller_domain_id}-subcategory`).append(subcategoryHtml);
                        $('#add-subcategory').removeClass('md-show');
                        submitBtn.prop('disabled', false).html('Submit');
                    },
                    error: function(xhr) {
                        alert('Error adding subcategory');
                        submitBtn.prop('disabled', false).html('Submit');
                    }
                });
            });

            $(document).on('submit', '#add-product-form', function(e) {
                e.preventDefault();

                let form = $(this);
                let submitBtn = form.find('button[type="submit"]'); // Disable button and show loader text 
                submitBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Saving...');

                let formData = new FormData(this); // for file uploads
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // response should contain the new product data
                        let displayImage = response.product.images.find(img => img.type === 'display');
                        let productHtml = `
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body" 
                                        style="background-image: url('${displayImage.image}'); 
                                                background-size: cover; background-position: center; height: 350px;">
                                    </div>
                                    <div class="card-footer">
                                        <span><b>${response.product.name}</b></span>
                                    </div>
                                </div>
                            </div>
                        `;
                        $(`#${response.product.seller_subcategory_id}-products .row`).append(productHtml);
                        $('#add-product').removeClass('md-show');
                        submitBtn.prop('disabled', false).html('Submit');
                    },
                    error: function(xhr) {
                        alert('Error adding product');
                        submitBtn.prop('disabled', false).html('Submit');
                    }
                });
            });



        });

        function updateImageIds() {
            document.querySelectorAll('.image-row').forEach((row, index) => {
                const input = row.querySelector('.image-input');
                const label = row.querySelector('.image-trigger');
                const newId = `image-${index}`;
                input.id = newId;
                label.setAttribute('for', newId);

                row.querySelectorAll('input[type="radio"]').forEach(radio => {
                    radio.name = `type[${index}]`;
                });
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

        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.tagify').forEach(function(input) {
                new Tagify(input, {
                    delimiters: ",", // comma separated values 
                    dropdown: {
                        enabled: 0 // show suggestions only when typing 
                    }
                });
            });
        });
    </script>
@endsection

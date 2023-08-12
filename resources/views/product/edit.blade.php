@extends('layout.layout')

@section('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_template/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_template/app-assets/vendors/css/pickers/daterange/daterangepicker.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/css/themes/semi-dark-layout.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_template/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/assets/css/style.css') }}">
    <!-- END: Custom CSS-->
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h5 class="content-header-title float-left pr-1 mb-0">Product Edit</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a>
                            </li>
                            <li class="breadcrumb-item active">Product Edit
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">

        {{-- Validation Error Message --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Basic Inputs start -->
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <form action="{{ route('product.update', $product->id) }}" method="post"
                                enctype="multipart/form-data"> @csrf @method('put')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <fieldset>
                                                <h5>Product Title</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i
                                                                class="bx bx-file"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Name"
                                                        aria-describedby="basic-Createon1" name="title"
                                                        value="{{ $product->title }}">
                                                </div>
                                            </fieldset>

                                            <fieldset class="mt-2">
                                                <h5>Category</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i
                                                                class="bx bxs-categories"></i></span>
                                                    </div>
                                                    <select name="category_id" id="category_id" class="form-control">
                                                        <option value="">select</option>
                                                        @foreach ($categories as $catalogue)
                                                            <optgroup label="{{ $catalogue['name'] }}"></optgroup>
                                                            @foreach ($catalogue['category'] as $category)
                                                                <option @if (!empty($product['category_id'] == $category['id'])) selected @endif
                                                                    value="{{ $category['id'] }}">
                                                                    &nbsp;&nbsp;&nbsp;--&nbsp;{{ $category['name'] }}
                                                                </option>
                                                                @foreach ($category['subcategories'] as $subcategories)
                                                                    <option
                                                                        @if (!empty($product['category_id'] == $subcategories['id'])) selected @endif
                                                                        value="{{ $subcategories['id'] }}">
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---&nbsp;{{ $subcategories['name'] }}
                                                                    </option>
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </fieldset>
                                            <fieldset class="mt-2">
                                                <h5>Brand</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i
                                                                class="bx bxl-slack"></i></span>
                                                    </div>
                                                    <select name="brand_id" id="" class="form-control">
                                                        <option value="">select</option>
                                                        @foreach ($brands as $brand)
                                                            <option @if ($product->brand_id == $brand['id']) selected @endif
                                                                value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </fieldset>
                                            <fieldset class="mt-2">
                                                <h5>Product Code</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i
                                                                class="bx bx-barcode"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="sku"
                                                        aria-describedby="basic-Createon1" name="product_code"
                                                        value="{{ $product->product_code }}" required>
                                                </div>
                                            </fieldset>
                                            <fieldset class="mt-2">
                                                <h5>Description</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i
                                                                class="bx bx-spreadsheet"></i></span>
                                                    </div>
                                                    <textarea class="form-control" id="basicTextarea" rows="3" placeholder="Textarea" name="description">{{ $product->description }}</textarea>
                                                </div>
                                            </fieldset>
                                            <fieldset class="mt-2">
                                                <h5>Product Type</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i
                                                                class="bx bx-purchase-tag-alt"></i></span>
                                                    </div>
                                                    <select name="type" id="" class="form-control" required>
                                                        <option @if ($product->type == 'Product') selected @endif
                                                            value="Product">Product</option>
                                                        <option @if ($product->type == 'Machine') selected @endif
                                                            value="Machine">Machine</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                            <fieldset class="mt-2">
                                                <h5>Image</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i
                                                                class="bx bx-image"></i></span>
                                                    </div>
                                                    <input type="file" class="form-control"
                                                        aria-describedby="basic-Createon1" name="image" id="image"
                                                        onchange="loadFile(event)">
                                                </div>
                                                @if ($product->image != null)
                                                    <img src="{{ asset('images/product_image/' . $product->image) }}"
                                                        alt="image" width="70px" height="70px" class="mt-2 mx-1">
                                                @endif
                                            </fieldset>
                                            <img id="output" width="150px" class="mt-2 mx-1">
                                            <button type="submit"
                                                class="btn btn-primary mt-2 btn-lg mx-1">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Inputs end -->

    </div>
@endsection

@section('js')
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('admin_template/app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}">
    </script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/pickers/daterange/moment.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/pickers/daterange/daterangepicker.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin_template/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/js/scripts/components.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/js/scripts/footer.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin_template/app-assets/js/scripts/pages/table-extended.js') }}"></script>
    <!-- END: Page JS-->
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection

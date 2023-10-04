@extends('layout.layout')

@section('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/vendors/css/pickers/daterange/daterangepicker.css') }}">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
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
                <h5 class="content-header-title float-left pr-1 mb-0">Invoice Create</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('project_index') }}">Project Invoice</a>
                        </li>
                        <li class="breadcrumb-item active">Project Invoice Create
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
                        <form action="{{ route('invoice.store') }}" method="post" enctype="multipart/form-data"> @csrf
                            <div class="card-body">
                                <div class="row">    
                                    <div class="col-sm-4">
                                        <fieldset class="form-group">
                                            <h5>Project</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bxs-buoy"></i></span>
                                                </div>
                                                <select name="project_id" id="project_id" class="form-control" required>
                                                    <option value="">Select</option>
                                                    @isset($projects)
                                                        @foreach ($projects as $project)
                                                            <option value="{{ $project->id }}">
                                                                {{ $project->name }}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-sm-4">
                                        <fieldset class="form-group">
                                            <h5>Invoice Code</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-barcode"></i></span>
                                                </div>
                                                <input type="text" name="invoice_code" id="invoice_code" class="form-control" placeholder="Start with (pr-)" value="pr-{{ $count + 1 }}" readonly>
                                            </div>
                                        </fieldset>
                                    </div>         
                                    <div class="col-sm-4">
                                        <fieldset class="form-group">
                                            <h5>Issue Date</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-calendar"></i></span>
                                                </div>
                                                <input type="date" name="issue_date" id="issue_date" class="form-control" required>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <input type="text" name="invoice_type" value="Project" hidden>
                                    {{-- <div class="col-sm-4">
                                        <fieldset class="form-group">
                                            <h5>Due Date</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <input type="date" name="due_date" id="due_date" class="form-control">
                                            </div>
                                        </fieldset>
                                    </div>
                                </div> --}}
                                {{-- <div class="row">
                                    <div class="col-sm-4">
                                        <fieldset class="form-group">
                                            <h5>Invoice Type</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <select name="invoice_type" id="invoice_type" class="form-control" required>
                                                    <option value="">select</option>
                                                    <option value="Purchase">Purchase</option>
                                                    <option value="Sell">Sell</option>
                                                    <option value="Project">Project</option>
                                                </select>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <h1>Product</h1>
                                                    <div class="row mt-2">
                                                        <div class="repeater-default">
                                                            <div data-repeater-list="group-product">
                                                                <div data-repeater-item>
                                                                    <div class="row justify-content-between" id='product_details'>
                                                                        <div class="col-md-6 col-sm-10 form-group">
                                                                            <label for="product_id">Product</label>
                                                                            <select name="product_id" id="product_id"
                                                                                class="form-control" required>
                                                                                <option value="">Select</option>
                                                                                @isset($products)
                                                                                    @foreach ($products as $product)
                                                                                        <option value="{{ $product->id }}">
                                                                                            {{ $product->title }}</option>
                                                                                    @endforeach
                                                                                @endisset
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-2 col-sm-12 form-group">
                                                                            <label for="qnt">Quantity</label>
                                                                            <input type="number" class="form-control" id="product_qnt"
                                                                                name="qnt" placeholder="0" required>
                                                                        </div>
                                                                        {{-- <div class="col-md-2 col-sm-12 form-group">
                                                                            <label for="unit_price">Unit Price</label>
                                                                            <input type="text" class="form-control" id="unit_price"
                                                                                name="unit_price" placeholder="0" required>
                                                                        </div>
                                                                        <div class="col-md-2 col-sm-12 form-group">
                                                                            <label for="total_price">Total Price</label>
                                                                            <input type="text" class="form-control" id="total_price"
                                                                                 name="total_price" placeholder="0"
                                                                                readonly>
                                                                        </div> --}}
                                                                        <div
                                                                            class="col-md-2 col-sm-12 form-group d-flex align-items-center pt-2">
                                                                            <button class="btn btn-danger text-nowrap px-1"
                                                                                data-repeater-delete type="button"> <i
                                                                                    class="bx bx-x"></i>
                                                                                Delete
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col p-0">
                                                                    <button class="btn btn-primary" data-repeater-create type="button" id="product"><i
                                                                            class="bx bx-plus"></i>
                                                                        Add
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
                                {{-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <h1>Machine</h1>
                                                    <div class="row mt-2">
                                                        <div class="repeater-default">
                                                            <div data-repeater-list="group-machine">
                                                                <div data-repeater-item>
                                                                    <div class="row justify-content-between">
                                                                        <div class="col-md-2 col-sm-12 form-group">
                                                                            <label for="machine_id">Machine</label>
                                                                            <select name="machine_id" id="machine_id"
                                                                                class="form-control" required>
                                                                                <option value="">Select</option>
                                                                                @isset($machines)
                                                                                    @foreach ($machines as $machine)
                                                                                        <option value="{{ $machine->id }}">
                                                                                            {{ $machine->title }}</option>
                                                                                    @endforeach
                                                                                @endisset
                                                                               
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-2 col-sm-12 form-group">
                                                                            <label for="qnt">Quantity</label>
                                                                            <input type="number" class="form-control" id="machine_qnt"
                                                                                name="qnt" placeholder="0" required>
                                                                        </div>
                                                                        <div class="col-md-2 col-sm-12 form-group">
                                                                            <label for="using_days">Using Days</label>
                                                                            <input type="number" class="form-control" id="using_days"
                                                                                name="using_days" placeholder="0" required>
                                                                        </div>
                                                                        <div class="col-md-2 col-sm-12 form-group">
                                                                            <label for="daily_hours">Daily Usable Hours</label>
                                                                            <input type="number" class="form-control" id="daily_hours"
                                                                                name="daily_hours" placeholder="0" required>
                                                                        </div>
                                                                        <div class="col-md-2 col-sm-12 form-group">
                                                                            <label for="hourly_price">Hourly Cost</label>
                                                                            <input type="text" class="form-control" id="hourly_price"
                                                                                name="hourly_price" placeholder="0" required>
                                                                        </div>
                                                                        <div
                                                                            class="col-md-2 col-sm-12 form-group d-flex align-items-center pt-2">
                                                                            <button class="btn btn-danger text-nowrap px-1"
                                                                                data-repeater-delete type="button"> <i
                                                                                    class="bx bx-x"></i>
                                                                                Delete
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col p-0">
                                                                    <button class="btn btn-primary" data-repeater-create type="button"><i
                                                                            class="bx bx-plus"></i>
                                                                        Add
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <button type="submit" class="btn btn-primary mt-2 btn-lg">Create</button>
                                    
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
    <script src="{{ asset('admin_template/app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/pickers/daterange/moment.min.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin_template/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/js/core/app.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/js/scripts/components.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/js/scripts/footer.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin_template/app-assets/js/scripts/pages/table-extended.js')}}"></script>
    <script src="{{ asset('admin_template/app-assets/js/scripts/forms/form-repeater.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
    <!-- END: Page JS-->
@endsection
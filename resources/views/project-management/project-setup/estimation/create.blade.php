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
                    <h5 class="content-header-title float-left pr-1 mb-0">Estimation Create</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('project-estimation.index') }}">Estimations</a>
                            </li>
                            <li class="breadcrumb-item active">Estimation Create
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
            <form action="{{ route('project-estimation.store') }}" method="post"> @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h1>Project Details</h1>
                                    <div class="row mt-2">
                                        <div class="col-sm-3">
                                            <fieldset class="form-group">
                                                <h5>Project Name</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i
                                                                class="bx bx-spreadsheet"></i></span>
                                                    </div>
                                                    <select class="form-control" name="project_id" id="">
                                                        <option value="">Select</option>
                                                        @isset($projects)
                                                            @foreach ($projects as $project)
                                                                <option value="{{ $project->id }}">{{ $project->name }}
                                                                </option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-3">
                                            <fieldset class="form-group">
                                                <h5>Start Date</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i
                                                                class="bx bx-spreadsheet"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control"
                                                        aria-describedby="basic-Createon1" name="start_date" required>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-3">
                                            <fieldset class="form-group">
                                                <h5>End Date</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i
                                                                class="bx bx-spreadsheet"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control"
                                                        aria-describedby="basic-Createon1" name="end_date" required>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-3">
                                            <fieldset class="form-group">
                                                <h5>Holy days</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i
                                                                class="bx bx-spreadsheet"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control"
                                                        aria-describedby="basic-Createon1" name="holy_days"
                                                        placeholder="0" required>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h1>Product Details</h1>
                                    <div class="row mt-2">
                                        <div class="repeater-default">
                                            <div data-repeater-list="group-product">
                                                <div data-repeater-item>
                                                    <div class="row justify-content-between" id='product_details'>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="product_name">Product</label>
                                                            <select name="product_name" id="product_name"
                                                                class="form-control">
                                                                <option value="">Select</option>
                                                                @isset($products)
                                                                    @foreach ($products as $product)
                                                                        <option value="{{ $product->id }}">
                                                                            {{ $product->title }}</option>
                                                                    @endforeach
                                                                @endisset
                                                                {{-- <option value="Concrete">Concrete</option>
                                                                <option value="Steel">Steel</option>
                                                                <option value="Cement">Cement</option>
                                                                <option value="Brick">Brick</option>
                                                                <option value="Sand">Sand</option> --}}
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="qnt">Quantity</label>
                                                            <input type="number" class="form-control" id="product_qnt"
                                                                name="qnt" placeholder="0">
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="unit_id">Unit</label>
                                                            <select name="unit_id" id="unit_id" class="form-control">
                                                                <option value="">Select</option>
                                                                @isset($units)
                                                                    @foreach ($units as $unit)
                                                                        <option value="{{ $unit->id }}">
                                                                            {{ $unit->unit }}</option>
                                                                    @endforeach
                                                                @endisset
                                                                {{-- <option value="Kg/cu.m">Kg/cu.m</option>
                                                                <option value="G/cu.cm">G/cu.cm</option>
                                                                <option value="lb/cu.ft">lb/cu.ft</option>
                                                                <option value="Piece">Piece</option>
                                                                <option value="Box">Box</option> --}}
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="unit_price">Unit Price</label>
                                                            <input type="text" class="form-control" id="unit_price"
                                                                name="unit_price" placeholder="0">
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="total_price">Total Price</label>
                                                            <input type="text" class="form-control" id="total_price"
                                                                 name="total_price" placeholder="0"
                                                                readonly>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h1>Machine Details</h1>
                                    <div class="row mt-2">
                                        <div class="repeater-default">
                                            <div data-repeater-list="group-machine">
                                                <div data-repeater-item>
                                                    <div class="row justify-content-between">
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="machine_name">Machine</label>
                                                            <select name="machine_name" id="machine_name"
                                                                class="form-control">
                                                                <option value="">Select</option>
                                                                <option value="Boom/Crane Truck ">Boom/Crane Truck
                                                                </option>
                                                                <option value="Manlift/Bucket Truck">Manlift/Bucket Truck
                                                                </option>
                                                                <option value="Grader">Grader</option>
                                                                <option value="Loader">Loader</option>
                                                                <option value="Haul Truck">Haul Truck</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="qnt">Quantity</label>
                                                            <input type="number" class="form-control" id="machine_qnt"
                                                                name="qnt" placeholder="0">
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="using_days">Using Days</label>
                                                            <input type="number" class="form-control" id="using_days"
                                                                name="using_days" placeholder="0">
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="daily_hours">Daily Usable Hours</label>
                                                            <input type="number" class="form-control" id="daily_hours"
                                                                name="daily_hours" placeholder="0">
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="hourly_price">Hourly Cost</label>
                                                            <input type="text" class="form-control" id="hourly_price"
                                                                name="hourly_price" placeholder="0">
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
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h1>Employee Details</h1>
                                    <div class="row mt-2">
                                        <div class="repeater-default">
                                            <div data-repeater-list="group-employee">
                                                <div data-repeater-item>
                                                    <div class="row justify-content-between">
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="employee_designation">Designation</label>
                                                            <select name="employee_designation"
                                                                id="employee_designation" class="form-control">
                                                                <option value="">Select</option>
                                                                <option value="Site Engineer">Site Engineer
                                                                </option>
                                                                <option value="Quality Control Engineer">Quality Control
                                                                    Engineer
                                                                </option>
                                                                <option value="Technical Field Engineer">Technical Field
                                                                    Engineer</option>
                                                                <option value="Construction Planning Engineer">Construction
                                                                    Planning Engineer</option>
                                                                <option value="Construction Engineer">Construction Engineer
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="employee_head_count">Head Count</label>
                                                            <input type="number" class="form-control"
                                                                id="employee_head_count" name="employee_head_count"
                                                                placeholder="0">
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="employee_daily_working_hour">Daily Working
                                                                Hours</label>
                                                            <input type="number" class="form-control"
                                                                id="employee_daily_working_hours"
                                                                name="employee_daily_working_hours" placeholder="0">
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="employee_hourly_salary">Hourly Salary</label>
                                                            <input type="text" class="form-control"
                                                                id="employee_hourly_salary"
                                                                name="employee_hourly_salary" placeholder="0">
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
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h1>Laborer Details</h1>
                                    <div class="row mt-2">
                                        <div class="repeater-default">
                                            <div data-repeater-list="group-laborer">
                                                <div data-repeater-item>
                                                    <div class="row justify-content-between">
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="laborer_designation">Designation</label>
                                                            <select name="laborer_designation" id="laborer_designation"
                                                                class="form-control">
                                                                <option value="">Select</option>
                                                                <option value="Plumber">Plumber
                                                                </option>
                                                                <option value="Electricians">Electricians
                                                                </option>
                                                                <option value="Ironworker">Ironworker</option>
                                                                <option value="Mason">Mason</option>
                                                                <option value="Pipefitter">Pipefitter
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="laborer_head_count">Head Count</label>
                                                            <input type="number" class="form-control"
                                                                id="laborer_head_count" name="laborer_head_count"
                                                                placeholder="0">
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="laborer_working_days">Working Days</label>
                                                            <input type="number" class="form-control"
                                                                id="laborer_working_days" name="laborer_working_days"
                                                                placeholder="0">
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="laborer_daily_salary">Daily Salary</label>
                                                            <input type="text" class="form-control"
                                                                id="laborer_daily_salary" name="laborer_daily_salary"
                                                                placeholder="0">
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
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h1>Other Expense Details</h1>
                                    <div class="row mt-2">
                                        <div class="repeater-default">
                                            <div data-repeater-list="group-other_expense">
                                                <div data-repeater-item>
                                                    <div class="row justify-content-between">
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="expense_head">Expense Head</label>
                                                            <input type="text" class="form-control" id="expense_head"
                                                                name="expense_head" placeholder="expense name">
                                                        </div>
                                                        <div class="col-md-4 col-sm-12 form-group">
                                                            <label for="expense_details">Details</label>
                                                            <textarea name="expense_details" id="expense_details" cols="30" rows="1" class="form-control"></textarea>
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="expense_expected_cost">Expected Cost</label>
                                                            <input type="text" class="form-control"
                                                                id="expense_expected_cost" name="expense_expected_cost"
                                                                placeholder="0">
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
                </div>
                <button type="submit" class="btn btn-primary mt-2 btn-lg mx-1">Create</button>
            </form>
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
    <script src="{{ asset('admin_template/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin_template/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/js/scripts/components.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/js/scripts/footer.js') }}"></script>
    <!-- END: Theme JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin_template/app-assets/js/scripts/forms/form-repeater.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        // $(function() {
        //     $('#product_details').each(function() {
        //         var price = $(this).find('#unit_price').val();
        //         var qty = $(this).find('#qnt').val();
        //         $(this).find('#total_price').val(parseFloat(price) * parseFloat(qty));
        //     });
        // });
        // function productDetails() {
        //     $('.group-a').each(function() {
        //         var price = $(this).find('#unit_price').val();
        //         var qty = $(this).find('#qnt').val();
        //         $(this).find('#total_price').val(parseFloat(price) * parseFloat(qty));
        //     });
        // }

        $(document).ready(function() {
            //alert('in');
            // $("#product").click(function(){
            //      var elements1 = document.querySelectorAll('[name^="group-product"]');
            //     console.log(elements1);
                $("#unit_price, #qnt").keyup(function() {
                    
                    var total = 0;
                    var unit_price = $("#unit_price").val();
                    var qnt = $("#qnt").val();
                    console.log(unit_price);
                    console.log(qnt);
                    total = unit_price * qnt;
                    console.log(total);
                    $("#total_price").val(total);
                })
                })
           
        //})
    </script>
@endsection

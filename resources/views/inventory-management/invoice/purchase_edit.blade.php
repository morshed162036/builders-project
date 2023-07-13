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
                <h5 class="content-header-title float-left pr-1 mb-0">Invoice Edit</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('purchase_index') }}">Purchase Invoice</a>
                        </li>
                        <li class="breadcrumb-item active">Purchase Invoice Edit
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
                        <form action="{{ route('invoice.update',$invoice->id) }}" method="post" enctype="multipart/form-data"> @csrf @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <fieldset class="form-group">
                                            <h5>Supplier</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $invoice->supplier->name }}@if ($invoice->supplier->company)
                                                ({{ $invoice->supplier->company }})
                                            @endif" readonly>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-4">
                                        <fieldset class="form-group">
                                            <h5>Invoice Code</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Start with (pu-)" value="{{ $invoice->invoice_code }}" readonly>
                                            </div>
                                        </fieldset>
                                    </div>         
                                
                                    <div class="col-sm-4">
                                        <fieldset class="form-group">
                                            <h5>Total Amount</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{ $invoice->total_amount }}" readonly>
                                            </div>
                                        </fieldset>
                                    </div>         
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-sm-4">
                                        <fieldset class="form-group">
                                            <h5>Issue Date</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <input type="date" class="form-control" value="{{ $invoice->issue_date }}" readonly>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-4">
                                        <fieldset class="form-group">
                                            <h5>Due Date</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <input type="date" name="due_date" id="due_date" class="form-control"
                                                value="{{ $invoice->due_date }}">
                                            </div>
                                        </fieldset>
                                    </div>
                                    <input type="text" name="invoice_type" value="Purchase" hidden>
                                    <div class="col-sm-4">
                                        <fieldset class="form-group">
                                            <h5>Discount</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <input type="text"  class="form-control" placeholder="0" value="{{ $invoice->discount }}" readonly>
                                            </div>
                                        </fieldset>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <fieldset class="form-group">
                                            <h5>Payment Status</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="0" value="{{ $invoice->payment_status }}" readonly>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-4">
                                        <fieldset class="form-group">
                                            <h5>Paid Amount</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="0" value="{{ $invoice->paid_amount }}" readonly>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <fieldset class="form-group">
                                            <h5>Payment Status</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <select name="payment_status" id="payment_status" class="form-control" required>
                                                    <option value="">select</option>
                                                    <option
                                                    @if ($invoice->payment_status == 'Paid')
                                                        selected
                                                    @endif 
                                                    value="Paid">Paid</option>
                                                    <option 
                                                    @if ($invoice->payment_status == 'Due')
                                                        selected
                                                    @endif 
                                                    value="Due">Due</option>
                                                    <option 
                                                    @if ($invoice->payment_status == 'Partial')
                                                        selected
                                                    @endif 
                                                    value="Partial">Partial</option>
                                                    <option 
                                                    @if ($invoice->payment_status == 'Advance')
                                                        selected
                                                    @endif 
                                                    value="Advance">Advance</option>
                                                </select>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-4">
                                        <fieldset class="form-group">
                                            <h5>Payment Method</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <select name="payment_method_id" id="payment_method_id" class="form-control" required>
                                                    <option value="0">select</option>
                                                    @isset($payment_methods)
                                                        @foreach ($payment_methods as $payment_method )
                                                            <option 
                                                            @if ($invoice->payment_method_id == $payment_method->id)
                                                                selected
                                                            @endif
                                                            value="{{ $payment_method->id }}">{{ $payment_method->bank_name }}({{ $payment_method->account_no }})</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-4">
                                        <fieldset class="form-group">
                                            <h5>Payment Amount</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <input type="text" name="payment_amount" id="payment_amount" class="form-control" placeholder="0" value="{{ $invoice->payment_amount }}" required>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <h1>Product</h1>
                                                    <div class="row mt-2">
                                                        <div class="repeater-default">
                                                            <div data-repeater-list="group-product">
                                                                @foreach ($invoice->details as $product )
                                                                <div data-repeater-item>
                                                                    <div class="row justify-content-between" id='product_details'>
                                                                        
                                                                            @if ($product->product->type == 'Product')
                                                                                <div class="col-md-2 col-sm-12 form-group">
                                                                                    <label for="product_id">Product</label>
                                                                                    <select name="product_id" id="product_id" class="form-control" @readonly(true)>
                                                                                        <option value="{{ $product->product->id }}">{{ $product->product->title }}</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-2 col-sm-12 form-group">
                                                                                    <label for="product_sku">Sku</label>
                                                                                    <input type="text" class="form-control" id="product_sku"
                                                                                        name="sku" placeholder="sku" value="{{ $product->sku }}" readonly>
                                                                                </div>
                                                                                <div class="col-md-2 col-sm-12 form-group">
                                                                                    <label for="qnt">Quantity</label>
                                                                                    <input type="number" class="form-control" id="product_qnt"
                                                                                        name="qnt" placeholder="0" value="{{ $product->quantity }}" readonly>
                                                                                </div>
                                                                                <div class="col-md-2 col-sm-12 form-group">
                                                                                    <label for="unit_id">Unit</label>
                                                                                    <input type="text" class="form-control" value="{{ $product->unit->unit }}" readonly>
                                                                                </div>
                                                                                <div class="col-md-2 col-sm-12 form-group">
                                                                                    <label for="unit_price">Unit Price</label>
                                                                                    <input type="text" class="form-control" id="unit_price"
                                                                                        name="unit_price" placeholder="0" readonly value="{{ $product->unit_price }}">
                                                                                </div>
                                                                                <div class="col-md-2 col-sm-12 form-group">
                                                                                    <label for="total_price">Total Price</label>
                                                                                    <input type="text" class="form-control" id="total_price"
                                                                                        name="total_price" placeholder="0" value="{{ $product->total_price }}"
                                                                                        readonly>
                                                                                </div>
                                                                            @endif
                                                                        
                                                                        
                                                                        <div
                                                                            class="col-md-2 col-sm-12 form-group d-flex align-items-center pt-2">
                                                                            <button class="btn btn-danger text-nowrap px-1"
                                                                                data-repeater-delete type="button" hidden> <i
                                                                                    class="bx bx-x"></i>
                                                                                Delete
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="form-group" hidden>
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
                                                    <h1>Machine</h1>
                                                    <div class="row mt-2">
                                                        <div class="repeater-default">
                                                            <div data-repeater-list="group-machine">
                                                                @foreach ($invoice->details as $product )
                                                                <div data-repeater-item>
                                                                    <div class="row justify-content-between">
                                                                        
                                                                        @if ($product->product->type == 'Machine')
                                                                            <div class="col-md-2 col-sm-12 form-group">
                                                                                <label for="machine_id">Machine</label>
                                                                                <select name="machine_id" id="machine_id" class="form-control" @readonly(true)>
                                                                                    <option value="{{ $product->product->id }}">{{ $product->product->title }}</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-2 col-sm-12 form-group">
                                                                                <label for="product_sku">Sku</label>
                                                                                <input type="text" class="form-control" id="product_sku"
                                                                                    name="sku" placeholder="sku" value="{{ $product->sku }}" readonly>
                                                                            </div>
                                                                            <div class="col-md-2 col-sm-12 form-group">
                                                                                <label for="qnt">Quantity</label>
                                                                                <input type="number" class="form-control" id="product_qnt"
                                                                                    name="qnt" placeholder="0" value="{{ $product->quantity }}" readonly>
                                                                            </div>
                                                                            <div class="col-md-2 col-sm-12 form-group">
                                                                                <label for="unit_id">Unit</label>
                                                                                <input type="text" class="form-control" value="{{ $product->unit->unit }}" readonly>
                                                                            </div>
                                                                            <div class="col-md-2 col-sm-12 form-group">
                                                                                <label for="unit_price">Unit Price</label>
                                                                                <input type="text" class="form-control" id="unit_price"
                                                                                    name="unit_price" placeholder="0" readonly value="{{ $product->unit_price }}">
                                                                            </div>
                                                                            <div class="col-md-2 col-sm-12 form-group">
                                                                                <label for="total_price">Total Price</label>
                                                                                <input type="text" class="form-control" id="total_price"
                                                                                    name="total_price" placeholder="0" value="{{ $product->total_price }}"
                                                                                    readonly>
                                                                            </div>
                                                                        @endif
                                                                   
                                                                        <div
                                                                            class="col-md-2 col-sm-12 form-group d-flex align-items-center pt-2" >
                                                                            <button class="btn btn-danger text-nowrap px-1"
                                                                                data-repeater-delete type="button" hidden> <i
                                                                                    class="bx bx-x"></i>
                                                                                Delete
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="form-group" hidden>
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
                                <button type="submit" class="btn btn-primary mt-2 btn-lg mx-1">Update</button>
                                    
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
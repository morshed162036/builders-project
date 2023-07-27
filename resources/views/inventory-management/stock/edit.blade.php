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
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb p-0 mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}"
                                        ><i class="bx bx-home-alt"></i
                                    ></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('stock.index') }}"
                                        >Stocks</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Update Stock Details
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
                                <form action="@if ($product != null)
                                    {{ Route('stock.update',$product->id) }}
                                    @else
                                    {{ Route('stock.update',$machine->id) }}
                                @endif" method="post"> @csrf  @method('put')
                                    <div class="card-body">
                                        @if($product != '')
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <fieldset>
                                                        <h5>Title</h5>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" aria-describedby="basic-Createon1" value="{{ $product->product->title }}" readonly>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <h5>Stock</h5>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" aria-describedby="basic-Createon1" value="{{ $product->stock }}" readonly>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <h5>Available Stock</h5>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" aria-describedby="basic-Createon1" value="{{ $product->available }}" readonly>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="mt-2">
                                                        <h5>Unit</h5>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-Createon1"><i class="bx bxs-message"></i></span>
                                                            </div>
                                                            <select name="unit_id" id="unit" class="form-control">
                                                                <option 
                                                                @if ($product->unit_id == 0)
                                                                    selected
                                                                @endif value="0">Select</option>
                                                                @foreach ($units as $unit)
                                                                    <option 
                                                                    @if ($product->unit_id == $unit->id)
                                                                        selected
                                                                    @endif
                                                                    value="{{ $unit->id }}">{{ $unit->unit }}</option>
                                                                @endforeach
                                                                
                                                            </select>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="mt-2">
                                                        <h5>Sell Unit Price</h5>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-Createon1"><i class="bx bxs-message"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" aria-describedby="basic-Createon1" value="{{ $product->unit_price }}" name="unit_price">
                                                        </div>
                                                    </fieldset>
                                                    <input type="text" hidden name="type" value="product">
                                                    {{-- <button type="submit" class="btn btn-primary mt-2">Create</button> --}}
                                                </div>
                                            </div>
                                        @endif
                                        @if($machine != '')
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <fieldset>
                                                        <h5>Title</h5>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" aria-describedby="basic-Createon1" value="{{ $machine->product->title }}" readonly>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <h5>Stock</h5>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" aria-describedby="basic-Createon1" value="{{ $machine->stock }}" readonly>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <h5>Available Stock</h5>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" aria-describedby="basic-Createon1" value="{{ $machine->available }}" readonly>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="mt-2">
                                                        <h5>Unit</h5>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-Createon1"><i class="bx bxs-message"></i></span>
                                                            </div>
                                                            <select name="unit_id" id="unit" class="form-control">
                                                                <option 
                                                                @if ($machine->unit_id == 0)
                                                                    selected
                                                                @endif value="0">Select</option>
                                                                @foreach ($units as $unit)
                                                                    <option 
                                                                    @if ($machine->unit_id == $unit->id)
                                                                        selected
                                                                    @endif
                                                                    value="{{ $unit->id }}">{{ $unit->unit }}</option>
                                                                @endforeach
                                                                
                                                            </select>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="mt-2">
                                                        <h5>Daily Hour</h5>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-Createon1"><i class="bx bxs-message"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" aria-describedby="basic-Createon1" value="{{ $machine->daily_hour }}" name="daily_hour">
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="mt-2">
                                                        <h5>Hourly Rent</h5>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-Createon1"><i class="bx bxs-message"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" aria-describedby="basic-Createon1" value="{{ $machine->hourly_rent }}" name="hourly_rent">
                                                        </div>
                                                    </fieldset>
                                                    <input type="text" hidden name="type" value="machine">
                                                    {{-- <button type="submit" class="btn btn-primary mt-2">Create</button> --}}
                                                </div>
                                            </div>
                                        @endif
                                        
                                        
                                        <div class="row">
                                            <button type="submit" class="btn btn-primary mt-2 btn-lg mx-1">Update</button>
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
    <!-- END: Page JS-->
@endsection
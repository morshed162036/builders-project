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
                        <h5
                            class="content-header-title float-left pr-1 mb-0"
                        >
                            Create Role
                        </h5>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb p-0 mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}"
                                        ><i class="bx bx-home-alt"></i
                                    ></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('role.index') }}"
                                        >User Roles</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Create Role
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
                                <form action="{{ route('role.store') }}" method="post"> @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <fieldset>
                                                    <h5>Role Name <span class="text-danger">*</span></h5>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Name" aria-describedby="basic-Createon1" name="role_name">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="mt-2">
                                                    <h5>Role Description <span class="text-danger">*</span></h5>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-Createon1"><i class="bx bxs-message"></i></span>
                                                        </div>
                                                        <textarea class="form-control" id="basicTextarea" rows="3" placeholder="Textarea" name="role_description"></textarea>
                                                    </div>
                                                </fieldset>
                                                {{-- <button type="submit" class="btn btn-primary mt-2">Create</button> --}}
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10 mt-2">
                                                <h5>Permission</h5>
                                                <table class="table table-bordered table-striped userrole-table table-middle text-center">
                                                    <tbody>
                                                            <tr>
                                                                <td>Dashboard</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="dashboard"
                                                                            value="dashboard"

                                                                        />
                                                                        <label class="custom-control-label" for="dashboard"
                                                                            >Dashboard</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brand</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="brand.index"
                                                                            value="brand.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="brand.index"
                                                                            >Brand List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="brand.create"
                                                                            value="brand.create"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="brand.create"
                                                                            >Brand Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="brand.edit"
                                                                            value="brand.edit"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="brand.edit"
                                                                            >Brand Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="brand.delete"
                                                                            value="brand.delete"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="brand.delete"
                                                                            >Brand Delete</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Category</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="category.index"
                                                                            value="category.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="category.index"
                                                                            >Category List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="category.create"
                                                                            value="category.create"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="category.create"
                                                                            >Category Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="category.edit"
                                                                            value="category.edit"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="category.edit"
                                                                            >Category Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="category.delete"
                                                                            value="category.delete"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="category.delete"
                                                                            >Category Delete</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Catalogue</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="catalogue.index"
                                                                            value="catalogue.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="catalogue.index"
                                                                            >Catalogue List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="catalogue.create"
                                                                            value="catalogue.create"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="catalogue.create"
                                                                            >Catalogue Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="catalogue.edit"
                                                                            value="catalogue.edit"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="catalogue.edit"
                                                                            >Catalogue Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="catalogue.delete"
                                                                            value="catalogue.delete"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="catalogue.delete"
                                                                            >Catalogue Delete</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Product</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="product.index"
                                                                            value="product.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="product.index"
                                                                            >Product List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="product.create"
                                                                            value="product.create"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="product.create"
                                                                            >Product Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="product.edit"
                                                                            value="product.edit"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="product.edit"
                                                                            >Product Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="product.delete"
                                                                            value="product.delete"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="product.delete"
                                                                            >Product Delete</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td>Supplier</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="supplier.index"
                                                                            value="supplier.index"
                                                                        />
                                                                        <label class="custom-control-label" for="supplier.index"
                                                                            >Supplier List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="supplier.create"
                                                                            value="supplier.create"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="supplier.create"
                                                                            >Supplier Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="supplier.edit"
                                                                            value="supplier.edit"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="supplier.edit"
                                                                            >Supplier Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="supplier.delete"
                                                                            value="supplier.delete"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="supplier.delete"
                                                                            >Supplier Delete</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="supplier.show"
                                                                            value="supplier.show"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="supplier.show"
                                                                            >Supplier View</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Supplier Other</td>
                                                                
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="advance_supplier.index"
                                                                            value="advance_supplier.index"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="advance_supplier.index"
                                                                            >Advance Supplier</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="payable_supplier.index"
                                                                            value="payable_supplier.index"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="payable_supplier.index"
                                                                            >Payable Supplier</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    
                                                                </td>
                                                                <td>
                                                                    
                                                                </td>
                                                               
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>client</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="client.index"
                                                                            value="client.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="client.index"
                                                                            >Client List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="client.create"
                                                                            value="client.create"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="client.create"
                                                                            >Client Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="client.edit"
                                                                            value="client.edit"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="client.edit"
                                                                            >Client Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="client.delete"
                                                                            value="client.delete"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="client.delete"
                                                                            >Client Delete</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="client.show"
                                                                            value="client.show"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="client.show"
                                                                            >Client View</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Client Other</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="advance_client.index"
                                                                            value="advance_client.index"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="advance_client.index"
                                                                            >Advance Client</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="payable_client.index"
                                                                            value="payable_client.index"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="payable_client.index"
                                                                            >Payable Client</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Stock</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="stock.index"
                                                                            value="stock.index"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="stock.index"
                                                                            >Stock List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="stock.edit"
                                                                            value="stock.edit"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="stock.edit"
                                                                            >Stock Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="stock.show"
                                                                            value="stock.show"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="stock.show"
                                                                            >Stock View</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>All Invoice</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="all_invoice.index"
                                                                            value="all_invoice.index"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="all_invoice.index"
                                                                            >All Invoice List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="all_invoice.show"
                                                                            value="all_invoice.show"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="all_invoice.show"
                                                                            >All Invoice View</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                              
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Purchase Invoice</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="purchase_invoice.index"
                                                                            value="purchase_invoice.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="purchase_invoice.index"
                                                                            >Purchase List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="purchase_invoice.create"
                                                                            value="purchase_invoice.create"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="purchase_invoice.create"
                                                                            >Purchase Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="purchase_invoice.edit"
                                                                            value="purchase_invoice.edit"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="purchase_invoice.edit"
                                                                            >Purchase Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="purchase_invoice.payment_history"
                                                                            value="purchase_invoice.payment_history"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="purchase_invoice.payment_history"
                                                                            >Purchase Payment History</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="purchase_invoice.show"
                                                                            value="purchase_invoice.show"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="purchase_invoice.show"
                                                                            >Purchase View</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sale Invoice</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="sale_invoice.index"
                                                                            value="sale_invoice.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="sale_invoice.index"
                                                                            >Sale List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="sale_invoice.create"
                                                                            value="sale_invoice.create"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="sale_invoice.create"
                                                                            >Sale Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="sale_invoice.edit"
                                                                            value="sale_invoice.edit"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="sale_invoice.edit"
                                                                            >Sale Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="sale_invoice.payment_history"
                                                                            value="sale_invoice.payment_history"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="sale_invoice.payment_history"
                                                                            >Sale Payment History</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="sale_invoice.show"
                                                                            value="sale_invoice.show"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="sale_invoice.show"
                                                                            >Sale View</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Project Invoice</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="project_invoice.index"
                                                                            value="project_invoice.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="project_invoice.index"
                                                                            >Project List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="project_invoice.create"
                                                                            value="project_invoice.create"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="project_invoice.create"
                                                                            >Project Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="project_invoice.edit"
                                                                            value="project_invoice.edit"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="project_invoice.edit"
                                                                            >Project Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="project_invoice.show"
                                                                            value="project_invoice.show"
                                                                        />
                                                                        <label class="custom-control-label" for="project_invoice.show"
                                                                            >Project View</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Product Return From Client</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="product_return_client.index"
                                                                            value="product_return_client.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="product_return_client.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="product_return_client.create"
                                                                            value="product_return_client.create"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="product_return_client.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="product_return_client.show"
                                                                            value="product_return_client.show"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="product_return_client.show"
                                                                            >View</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Product Return To Supplier</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="product_return_supplier.index"
                                                                            value="product_return_supplier.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="product_return_supplier.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="product_return_supplier.create"
                                                                            value="product_return_supplier.create"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="product_return_supplier.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="product_return_supplier.show"
                                                                            value="product_return_supplier.show"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="product_return_supplier.show"
                                                                            >View</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Team</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="team.index"
                                                                            value="team.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="team.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="team.create"
                                                                            value="team.create"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="team.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="team.edit"
                                                                            value="team.edit"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="team.edit"
                                                                            >Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="team.delete"
                                                                            value="team.delete"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="team.delete"
                                                                            >Delete</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Team Member</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="team_member.index"
                                                                            value="team_member.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="team_member.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="team_member.create"
                                                                            value="team_member.create"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="team_member.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="team_member.edit"
                                                                            value="team_member.edit"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="team_member.edit"
                                                                            >Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="team_member.delete"
                                                                            value="team_member.delete"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="team_member.delete"
                                                                            >Delete</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Project</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="project.index"
                                                                            value="project.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="project.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="project.create"
                                                                            value="project.create"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="project.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="project.edit"
                                                                            value="project.edit"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="project.edit"
                                                                            >Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="project.show"
                                                                            value="project.show"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="project.show"
                                                                            >View</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Estimate Project</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="estimate_project.index"
                                                                            value="estimate_project.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="estimate_project.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="estimate_project.create"
                                                                            value="estimate_project.create"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="estimate_project.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="estimate_project.delete"
                                                                            value="estimate_project.delete"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="estimate_project.delete"
                                                                            >Delete</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="estimate_project.show"
                                                                            value="estimate_project.show"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="estimate_project.show"
                                                                            >View</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Start Project</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="start_project.create"
                                                                            value="start_project.create"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="start_project.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    
                                                                </td>
                                                                <td>
                                                                    
                                                                </td>
                                                                <td>
                                                                    
                                                                </td>
                                                                <td>
                                                                    
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Machine Setup Project</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="machine_project.index"
                                                                            value="machine_project.index"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="machine_project.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="machine_project.create"
                                                                            value="machine_project.create"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="machine_project.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="machine_project.edit"
                                                                            value="machine_project.edit"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="machine_project.edit"
                                                                            >Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Expense for Project</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="expense_project.index"
                                                                            value="expense_project.index"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="expense_project.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="expense_project.create"
                                                                            value="expense_project.create"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="expense_project.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="expense_project.edit"
                                                                            value="expense_project.edit"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="expense_project.edit"
                                                                            >Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Project Payment</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="payment_project.index"
                                                                            value="payment_project.index"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="payment_project.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="payment_project.create"
                                                                            value="payment_project.create"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="payment_project.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Accounts Group</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="accounts_group.index"
                                                                            value="accounts_group.index"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="accounts_group.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="accounts_group.create"
                                                                            value="accounts_group.create"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="accounts_group.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="accounts_group.edit"
                                                                            value="accounts_group.edit"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="accounts_group.edit"
                                                                            >Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="accounts_group.delete"
                                                                            value="accounts_group.delete"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="accounts_group.delete"
                                                                            >Delete</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Chart of Account</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="chart_of_account.index"
                                                                            value="chart_of_account.index"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="chart_of_account.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="chart_of_account.create"
                                                                            value="chart_of_account.create"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="chart_of_account.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="chart_of_account.edit"
                                                                            value="chart_of_account.edit"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="chart_of_account.edit"
                                                                            >Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="chart_of_account.delete"
                                                                            value="chart_of_account.delete"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="chart_of_account.delete"
                                                                            >Delete</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>General Ledger</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="general_ledger.index"
                                                                            value="general_ledger.index"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="general_ledger.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="general_ledger.create"
                                                                            value="general_ledger.create"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="general_ledger.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Cash Flow</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="cash_flow.index"
                                                                            value="cash_flow.index"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="cash_flow.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Salary Sheet</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="salary_sheet.index"
                                                                            value="salary_sheet.index"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="salary_sheet.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="salary_sheet.create"
                                                                            value="salary_sheet.create"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="salary_sheet.create"
                                                                            >Generate</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Designation</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="designation.index"
                                                                            value="designation.index"
                                                                        />
                                                                        <label class="custom-control-label" for="designation.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="designation.create"
                                                                            value="designation.create"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="designation.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="designation.edit"
                                                                            value="designation.edit"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="designation.edit"
                                                                            >Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="designation.delete"
                                                                            value="designation.delete"
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="designation.delete"
                                                                            >Delete</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Benefit</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="benefit.index"
                                                                            value="benefit.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="benefit.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="benefit.create"
                                                                            value="benefit.create"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="benefit.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="benefit.edit"
                                                                            value="benefit.edit"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="benefit.edit"
                                                                            >Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="benefit.delete"
                                                                            value="benefit.delete"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="benefit.delete"
                                                                            >Delete</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Employee</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="user.index"
                                                                            value="user.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="user.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="user.create"
                                                                            value="user.create"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="user.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="user.edit"
                                                                            value="user.edit"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="user.edit"
                                                                            >Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="user.delete"
                                                                            value="user.delete"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="user.delete"
                                                                            >Delete</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="user.show"
                                                                            value="user.show"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="user.show"
                                                                            >View</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Role</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="user_role.index"
                                                                            value="user_role.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="user_role.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="user_role.create"
                                                                            value="user_role.create"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="user_role.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="user_role.edit"
                                                                            value="user_role.edit"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="user_role.edit"
                                                                            >Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="user_role.delete"
                                                                            value="user_role.delete"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="user_role.delete"
                                                                            >Delete</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="user_role.show"
                                                                            value="user_role.show"
                                                                            
                                                                        />
                                                                        <label
                                                                            class="custom-control-label"
                                                                            for="user_role.show"
                                                                            >View</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td>Unit</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="unit.index"
                                                                            value="unit.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="unit.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="unit.create"
                                                                            value="unit.create"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="unit.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="unit.edit"
                                                                            value="unit.edit"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="unit.edit"
                                                                            >Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="unit.delete"
                                                                            value="unit.delete"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="unit.delete"
                                                                            >Delete</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Payment Method</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="payment_method.index"
                                                                            value="payment_method.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="payment_method.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="payment_method.create"
                                                                            value="payment_method.create"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="payment_method.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="payment_method.edit"
                                                                            value="payment_method.edit"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="payment_method.edit"
                                                                            >Edit</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="payment_method.delete"
                                                                            value="payment_method.delete"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="payment_method.delete"
                                                                            >Delete</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Transfer Balance</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="transfer_balance.index"
                                                                            value="transfer_balance.index"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="transfer_balance.index"
                                                                            >List</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="custom-control-input"
                                                                            name="role[]"
                                                                            id="transfer_balance.create"
                                                                            value="transfer_balance.create"
                                                                            
                                                                        />
                                                                        <label class="custom-control-label" for="transfer_balance.create"
                                                                            >Create</label
                                                                        >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    
                                                                </td>
                                                                <td>
                                                                    
                                                                </td>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary mt-2 mx-1">Create</button>
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
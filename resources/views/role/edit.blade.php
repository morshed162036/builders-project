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

 
<!-- BEGIN: Content-->
<div class="content-header row">
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5
                    class="content-header-title float-left pr-1 mb-0"
                >
                    Add Permissions
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
                            Add Permissions
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
                        <form action="{{ route('role.update',$role->id) }}" method="post"> @csrf @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <fieldset>
                                            <h5>Role Name</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Name" aria-describedby="basic-addon1" name="role_name" value="{{ $role->name }}" readonly>
                                            </div>
                                        </fieldset>
                                        <fieldset class="mt-2">
                                            <h5>Role Description</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="bx bxs-message"></i></span>
                                                </div>
                                                <textarea class="form-control" id="basicTextarea" rows="3" placeholder="Textarea" name="description">{{ $role->description }}</textarea>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 mt-2">
                                        <h5>Permission</h5>
                                        <table class="table table-bordered table-striped userrole-table table-middle">
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
                                                                @if (in_array('dashboard',$permission))
                                                                    checked
                                                                @endif

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
                                                                @if (in_array('brand.index',$permission))
                                                                    checked
                                                                @endif
                                                                
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
                                                                @if (in_array('brand.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('brand.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('brand.delete',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('brand.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('category.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('category.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('category.delete',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('catalogue.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('catalogue.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('catalogue.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('catalogue.delete',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('product.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('product.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('product.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('product.delete',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('supplier.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('supplier.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('supplier.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('supplier.delete',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('supplier.show',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('advance_supplier.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('payable_supplier.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('client.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('client.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('client.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('client.delete',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('client.show',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('advance_client.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('payable_client.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('stock.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('stock.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('stock.show',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('all_invoice.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('all_invoice.show',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('purchase_invoice.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('purchase_invoice.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('purchase_invoice.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('purchase_invoice.payment_history',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('purchase_invoice.show',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('sale_invoice.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('sale_invoice.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('sale_invoice.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('sale_invoice.payment_history',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('sale_invoice.show',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('project_invoice.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('project_invoice.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('project_invoice.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('project_invoice.show',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('product_return_client.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('product_return_client.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('product_return_client.show',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('product_return_supplier.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('product_return_supplier.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('product_return_supplier.show',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('team.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('team.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('team.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('team.delete',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('team_member.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('team_member.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('team_member.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('team_member.delete',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('project.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('project.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('project.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('project.show',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('estimate_project.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('estimate_project.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('estimate_project.delete',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('estimate_project.show',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('start_project.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('machine_project.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('machine_project.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('machine_project.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('expense_project.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('expense_project.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('expense_project.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('payment_project.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('payment_project.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('accounts_group.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('accounts_group.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('accounts_group.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('accounts_group.delete',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('chart_of_account.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('chart_of_account.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('chart_of_account.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('chart_of_account.delete',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('general_ledger.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('general_ledger.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('cash_flow.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('salary_sheet.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('salary_sheet.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('designation.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('designation.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('designation.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('designation.delete',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('benefit.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('benefit.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('benefit.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('benefit.delete',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('user.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('user.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('user.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('user.delete',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('user.show',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('user_role.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('user_role.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('user_role.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('user_role.delete',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('user_role.show',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('unit.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('unit.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('unit.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('unit.delete',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('payment_method.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('payment_method.create',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('payment_method.edit',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('payment_method.delete',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('transfer_balance.index',$permission))
                                                                    checked
                                                                @endif
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
                                                                @if (in_array('transfer_balance.create',$permission))
                                                                    checked
                                                                @endif
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
                                    <button type="submit" class="btn btn-primary mt-2 mx-1">Update</button>
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
    
<!-- END: Content-->
    
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
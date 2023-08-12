
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
    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Success: </strong>{{ Session::get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h5 class="content-header-title float-left pr-1 mb-0">Supplier Edit</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Suppliers</a>
                            </li>
                            <li class="breadcrumb-item active">Supplier Edit
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
                            <form action="{{ route('supplier.update',$supplier->id) }}" method="post" enctype="multipart/form-data"> @csrf @method('put')
                                <div class="card-body">
                                    <div class="row">
                                        <h2 style="color: rgba(20, 120, 212, 0.815)">Profile</h2>
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Supplier Name</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-file"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Name" aria-describedby="basic-Createon1" name="name" value="{{ $supplier->name }}" required>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Address</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-mail-send"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Address" aria-describedby="basic-Createon1" name="address" value="{{ $supplier->address }}" required>
                                                </div>
                                            </fieldset>
                                        </div>         
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>City</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-file"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="City" aria-describedby="basic-Createon1" name="city" value="{{ $supplier->city }}" required>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Pin Code</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-barcode"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Code" aria-describedby="basic-Createon1" name="pincode" value="{{ $supplier->pincode }}" required>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Email</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-at"></i></span>
                                                    </div>
                                                    <input type="email" class="form-control" placeholder="Email" aria-describedby="basic-Createon1" name="email" value="{{ $supplier->email }}" required>
                                                </div>
                                            </fieldset>
                                        </div>         
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Phone</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-phone"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="01xx" aria-describedby="basic-Createon1" name="phone" maxlength="11" value="{{ $supplier->mobile }}" required>
                                                </div>
                                            </fieldset>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>NID</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-id-card"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="NID Number" aria-describedby="basic-Createon1" name="nid" value="{{ $supplier->nid }}" required>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Trade License</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="License Number" aria-describedby="basic-Createon1" name="trade_license" value="{{ $supplier->trade_license }}" required>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h2 style="color: rgba(20, 120, 212, 0.815); margin-top:1rem;"> Company Profile (If Applicable)</h2>
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Company Name </h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-file"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Name" aria-describedby="basic-Createon1" name="company_name" 
                                                    @isset($supplier->company)  
                                                        value="{{ $supplier->company->name }}" 
                                                    @endisset>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Address</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-mail-send"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Address" aria-describedby="basic-Createon1" name="company_address" @isset($supplier->company)   value="{{ $supplier->company->address }}"@endisset>
                                                </div>
                                            </fieldset>
                                        </div>         
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>City</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-file"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="City" aria-describedby="basic-Createon1" name="company_city" 
                                                    @isset($supplier->company) 
                                                        value="{{ $supplier->company->city }}"
                                                    @endisset>
                                          
                                                </div>
                                            </fieldset>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Pin Code</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-barcode"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Code" aria-describedby="basic-Createon1" name="company_pincode" @isset($supplier->company) value="{{ $supplier->company->pincode }}"@endisset>
                                                </div>
                                            </fieldset>
                                            
                                        </div>
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Email</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-at"></i></span>
                                                    </div>
                                                    <input type="email" class="form-control" placeholder="Email" aria-describedby="basic-Createon1" name="company_email" @isset($supplier->company) value="{{ $supplier->company->email }}"@endisset>
                                                </div>
                                            </fieldset>
                                            
                                        </div>         
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Phone</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-phone"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="01xx" aria-describedby="basic-Createon1" name="company_phone" maxlength="11" @isset($supplier->company) value="{{ $supplier->company->mobile }}"@endisset>
                                                </div>
                                            </fieldset>
                                            
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Web site</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-globe"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="www.https:" aria-describedby="basic-Createon1" name="company_website" @isset($supplier->company) value="{{ $supplier->company->website }}"@endisset>
                                                </div>
                                                
                                            </fieldset>
                                            
                                        </div>
                                        {{-- <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Address Proof</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-image"></i></span>
                                                    </div>
                                                    <input type="file" class="form-control"  aria-describedby="basic-Createon1" name="company_address_proof" >
                                                </div>
                                            </fieldset>
                                        </div>         
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Trade License Certificate</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-image"></i></span>
                                                    </div>
                                                    <input type="file" class="form-control"  aria-describedby="basic-Createon1" name="company_license_certificate" >
                                                </div>
                                            </fieldset>
                                        </div> 
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Tin Certificate</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i class="bx bx-image"></i></span>
                                                    </div>
                                                    <input type="file" class="form-control"  aria-describedby="basic-Createon1" name="company_tin_certificate" >
                                                </div>
                                            </fieldset>
                                        </div>  --}}
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
@endsection

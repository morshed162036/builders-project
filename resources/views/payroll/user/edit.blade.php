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
                <h5 class="content-header-title float-left pr-1 mb-0">User Edit</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a>
                        </li>
                        <li class="breadcrumb-item active">User Edit
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
                        <form action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data"> @csrf @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <fieldset class="mt-2">
                                            <h5>Image</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bxs-message"></i></span>
                                                </div>
                                                <input type="file" class="form-control" aria-describedby="basic-Createon1" name="image" id="image" onchange="loadFile(event)">
                                            </div>
                                        </fieldset>
                                        <img id="output" class="w-25 mt-2" @if ($user->image)
                                            src='{{ asset('images/profile_image/'.$user->image) }}'
                                        @endif>
                                        <fieldset class="mt-2">
                                            <h5>Name</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Name" aria-describedby="basic-Createon1" name="name" value="{{ $user->name }}" required>
                                            </div>
                                        </fieldset >
                                        <fieldset class="mt-2">
                                            <h5>Designation</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <select name="designation_id" id="" class="form-control" required>
                                                    <option value="0">Select</option>
                                                    @isset($designations)
                                                        @foreach ($designations as $designation)
                                                            <option @if ($user->designation_id == $designation->id)
                                                                selected
                                                            @endif value="{{ $designation->id }}">{{ $designation->title }}</option>
                                                        @endforeach
                                                        
                                                    @endisset
                                                </select>
                                            </div>
                                        </fieldset>
                                        <fieldset class="mt-2">
                                            <h5>Email</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <input type="email" class="form-control" placeholder="abc@gmail.com" aria-describedby="basic-Createon1" name="email" value="{{ $user->email }}" required>
                                            </div>
                                        </fieldset>
                                        <fieldset class="mt-2">
                                            <h5>Phone</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bx-spreadsheet"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="017xxxx" aria-describedby="basic-Createon1" name="phone" maxlength="11" value="{{ $user->phone }}" required>
                                            </div>
                                        </fieldset>
                                        <fieldset class="mt-2">
                                            <h5>Address</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bxs-message"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Address" aria-describedby="basic-Createon1" value="{{ $user->address }}" name="address">
                                            </div>
                                        </fieldset>
                                        <fieldset class="mt-2">
                                            <h5>Join Date</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bxs-message"></i></span>
                                                </div>
                                                <input type="date" class="form-control"  aria-describedby="basic-Createon1" name="joining_date" value="{{ $user->info->joining_date }}">
                                            </div>
                                        </fieldset>
                                        <fieldset class="mt-2">
                                            <h5>Resign Date</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bxs-message"></i></span>
                                                </div>
                                                <input type="date" class="form-control"  aria-describedby="basic-Createon1" name="resign_date" value="{{ $user->info->resign_date }}">
                                            </div>
                                        </fieldset>
                                        <fieldset class="mt-2">
                                            <h5>Salary</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bxs-message"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="0" aria-describedby="basic-Createon1" name="salary" value="{{ $user->info->salary}}">
                                            </div>
                                        </fieldset>
                                        {{-- <fieldset class="mt-2">
                                            <h5>Status</h5>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-Createon1"><i class="bx bxs-message"></i></span>
                                                </div>
                                                <select name="status" id="" class="form-control" required>
                                                    <option value="">select</option>
                                                </select>
                                            </div>
                                        </fieldset> --}}
                                        
                                        <div class="row mt-2">
                                            <h3 class="text-primary">Benefits:</h3>
                                            <div class="repeater-default">
                                                <div data-repeater-list="group-benefit">
                                                    @foreach ($user->benefits as $user_benefit)
                                                        <div data-repeater-item>
                                                            <div class="row justify-content-between" id='benefit_details'>
                                                                <div class="col-md-10 col-sm-12 form-group">
                                                                    <label for="benefit_id">Title</label>
                                                                    <select name="benefit_id" id="benefit_id"
                                                                        class="form-control" required>
                                                                        <option value="0">Select</option>
                                                                        @isset($benefits)
                                                                            @foreach ($benefits as $benefit)
                                                                            <option @if ($user_benefit->benefit_id == $benefit->id)
                                                                                selected
                                                                            @endif value="{{ $benefit->id }}">
                                                                                {{ $benefit->title }}</option>
                                                                            @endforeach                            
                                                                        @endisset
                                                                    </select>
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
                                                    @endforeach
                                                </div>
                                                <div class="form-group">
                                                    <div class="col p-0">
                                                        <button class="btn btn-primary" data-repeater-create type="button" id="benefit"><i
                                                                class="bx bx-plus"></i>
                                                            Add
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-primary mt-2 btn-lg">Update</button>
                                    
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
    <script src="{{ asset('admin_template/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
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
    <!-- END: Page JS-->
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
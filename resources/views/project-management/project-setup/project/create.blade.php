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
                    <h5 class="content-header-title float-left pr-1 mb-0">Project Create</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Projects</a>
                            </li>
                            <li class="breadcrumb-item active">Project Create
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
                            <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data"> @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Project</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i
                                                                class="bx bxs-buoy"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Name"
                                                        aria-describedby="basic-Createon1" name="project_name" required>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Client</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i
                                                                class="bx bx-user"></i></span>
                                                    </div>
                                                    <select class="form-control" name="client_id" id="client_id" required>
                                                        <option value="">Select</option>
                                                        @isset($clients)
                                                            @foreach ($clients as $client)
                                                                <option value="{{ $client->id }}">
                                                                    {{ $client->name }}({{ $client->company }})
                                                                </option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Starting Day</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i
                                                                class="bx bx-spreadsheet"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control"
                                                        aria-describedby="basic-Createon1" name="starting_day">
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Expected Finished Day</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i
                                                                class="bx bx-spreadsheet"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control"
                                                        aria-describedby="basic-Createon1" name="expected_finished_day">
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Finished Day</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i
                                                                class="bx bx-spreadsheet"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control"
                                                        aria-describedby="basic-Createon1" name="finished_day">
                                                </div>
                                            </fieldset>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <fieldset class="form-group">
                                                <h5>Status</h5>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-Createon1"><i
                                                                class="bx bx-spreadsheet"></i></span>
                                                    </div>
                                                    <select class="form-control" name="" id="">
                                                        <option value="">Select</option>
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                        <option value="Inquiry">Inquiry</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div> --}}
                                    <button type="submit" class="btn btn-primary mt-2 btn-lg mx-1">Create</button>

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

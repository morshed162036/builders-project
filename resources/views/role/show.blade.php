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
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
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
                                                    <textarea class="form-control" id="basicTextarea" rows="3" placeholder="Textarea" name="role_description" readonly>{{ $role->description }}</textarea>
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
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="dashboardappointment"
                                                                    value="dashboard.appointment"
                                                                    @if (in_array('dashboard.appointment',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="dashbaordappointment"
                                                                    >Calendar Appointment</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Patient</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="patient.list"
                                                                    value="patient.list"
                                                                    @if (in_array('patient.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="patient.list"
                                                                    >Patient List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="patient.create"
                                                                    value="patient.create"
                                                                    @if (in_array('patient.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="patient.create"
                                                                    >Patient Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="patient.edit"
                                                                    value="patient.edit"
                                                                    @if (in_array('patient.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="patient.edit"
                                                                    >Patient Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="patient.delete"
                                                                    value="patient.delete"
                                                                    @if (in_array('patient.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="patient.delete"
                                                                    >Patient Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="patient.view"
                                                                    value="patient.view"
                                                                    @if (in_array('patient.view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="patient.view"
                                                                    >Patient View</label
                                                                >
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Patient Other</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="patient.clinical_notes"
                                                                    value="patient.clinical_notes"
                                                                    @if (in_array('patient.clinical_notes',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="patient.clinical_notes"
                                                                    >Patient Clinical Notes</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="patient.print"
                                                                    value="patient.print"
                                                                    @if (in_array('patient.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="patient.print"
                                                                    >Patient Print</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="patients.documents"
                                                                    value="patients.documents"
                                                                    @if (in_array('patients.documents',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="patients.documents"
                                                                    >Paitent Documents</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="patient.sendmail"
                                                                    value="patient.sendmail"
                                                                    @if (in_array('patient.sendmail',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="patient.sendmail"
                                                                    >Patient Sendmail</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Appointment</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="appointment.list"
                                                                    value="appointment.list"
                                                                    @if (in_array('appointment.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="appointment.list"
                                                                    >Appointment List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="appointment.create"
                                                                    value="appointment.create"
                                                                    @if (in_array('appointment.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="appointment.create"
                                                                    >Appointment Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="appointment.edit"
                                                                    value="appointment.edit"
                                                                    @if (in_array('appointment.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="appointment.edit"
                                                                    >Appointment Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="appointment.delete"
                                                                    value="appointment.delete"
                                                                    @if (in_array('appointment.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="appointment.delete"
                                                                    >Appointment Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="appointment.view"
                                                                    value="appointment.view"
                                                                    @if (in_array('appointment.view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="appointment.view"
                                                                    >Appointment View</label
                                                                >
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Appointment Other</td>
                                                        {{-- <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="appointment.sendmail"
                                                                    value="appointment.sendmail"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="appointment.sendmail"
                                                                    >Appointment Sendmail</label
                                                                >
                                                            </div>
                                                        </td> --}}
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="appointment.print"
                                                                    value="appointment.print"
                                                                    @if (in_array('appointment.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="appointment.print"
                                                                    >Appointment Print</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="appointment.clinical_notes"
                                                                    value="appointment.clinical_notes"
                                                                    @if (in_array('appointment.clinical_notes',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="appointment.clinical_notes"
                                                                    >Appointment Clinical Notes</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="appointment.documents"
                                                                    value="appointment.documents"
                                                                    @if (in_array('appointment.documents',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="appointment.documents"
                                                                    >Appointment Documents</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="appointment.documents_upload"
                                                                    value="appointment.documents_upload"
                                                                    @if (in_array('appointment.documents_upload',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="appointment.documents_upload"
                                                                    >Document Upload</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="appointment.documents_delete"
                                                                    value="appointment.documents_delete"
                                                                    @if (in_array('appointment.documents_delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="appointment.documents_delete"
                                                                    >Document Remove</label
                                                                >
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Prescription</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="prescription.list"
                                                                    value="prescription.list"
                                                                    @if (in_array('prescription.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="prescription.list"
                                                                    >Prescription List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="prescription.create"
                                                                    value="prescription.create"
                                                                    @if (in_array('prescription.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="prescription.create"
                                                                    >Prescription Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="prescription.edit"
                                                                    value="prescription.edit"
                                                                    @if (in_array('prescription.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="prescription.edit"
                                                                    >Prescription Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="prescription.delete"
                                                                    value="prescription.delete"
                                                                    @if (in_array('prescription.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="prescription.delete"
                                                                    >Prescription Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="prescription.view"
                                                                    value="prescription.view"
                                                                    @if (in_array('prescription.view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="prescription.view"
                                                                    >Prescription View</label
                                                                >
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Prescription Other</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="prescription.print"
                                                                    value="prescription.print"
                                                                    @if (in_array('prescription.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="prescription.print"
                                                                    >Prescription Print</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Invoice</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="invoice.list"
                                                                    value="invoice.list"
                                                                    @if (in_array('invoice.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="invoice.list"
                                                                    >Invoice List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="invoice.create"
                                                                    value="invoice.create"
                                                                    @if (in_array('invoice.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="invoice.create"
                                                                    >Invoice Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="invoice.edit"
                                                                    value="invoice.edit"
                                                                    @if (in_array('invoice.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="invoice.edit"
                                                                    >Invoice Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="invoice.delete"
                                                                    value="invoice.delete"
                                                                    @if (in_array('invoice.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="invoice.delete"
                                                                    >Invoice Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="invoice.view"
                                                                    value="invoice.view"
                                                                    @if (in_array('invoice.view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="invoice.view"
                                                                    >Invoice View</label
                                                                >
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Invoice Other</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="invoice.print"
                                                                    value="invoice.print"
                                                                    @if (in_array('invoice.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="invoice.print"
                                                                    >Invoice Print</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="invoice.sentmail"
                                                                    value="invoice.sentmail"
                                                                    @if (in_array('invoice.sentmail',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="invoice.sentmail"
                                                                    >Invoice Sendmail</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="Createpayment"
                                                                    value="Createpayment"
                                                                    @if (in_array('Createpayment',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="Createpayment"
                                                                    >Create Payment</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Invoice Items</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="invoice_item.list"
                                                                    value="invoice_item.list"
                                                                    @if (in_array('invoice_item.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="invoice_item.list"
                                                                    >Items List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="invoice_item.create"
                                                                    value="invoice_item.create"
                                                                    @if (in_array('invoice_item.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="invoice_item.create"
                                                                    >Items Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="invoice_item.edit"
                                                                    value="invoice_item.edit"
                                                                    @if (in_array('invoice_item.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="invoice_item.edit"
                                                                    >Items Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="invoice_item.delete"
                                                                    value="invoice_item.delete"
                                                                    @if (in_array('invoice_item.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="invoice_item.delete"
                                                                    >Items Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="invoice_item.print"
                                                                    value="invoice_item.print"
                                                                    @if (in_array('invoice_item.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="invoice_item.print"
                                                                    >Items Print</label
                                                                >
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Request</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="request.list"
                                                                    value="request.list"
                                                                    @if (in_array('request.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="request.list"
                                                                    >Request List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="request.create"
                                                                    value="request.create"
                                                                    @if (in_array('request.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="request.create"
                                                                    >Request Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="request.edit"
                                                                    value="request.edit"
                                                                    @if (in_array('request.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="request.edit"
                                                                    >Request Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="request.delete"
                                                                    value="request.delete"
                                                                    @if (in_array('request.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="request.delete"
                                                                    >Request Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="request.view"
                                                                    value="request.view"
                                                                    @if (in_array('request.view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="request.view"
                                                                    >Request View</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="request.print"
                                                                    value="request.print"
                                                                    @if (in_array('request.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="request.print"
                                                                    >Request Print</label
                                                                >
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>POS/Bill</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.billing_list"
                                                                    value="medicine.billing_list"
                                                                    @if (in_array('medicine.billing_list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.billing_list"
                                                                    >POS/Bill List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.billing_create"
                                                                    value="medicine.billing_create"
                                                                    @if (in_array('medicine.billing_create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.billing_create"
                                                                    >Bill Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.billing_edit"
                                                                    value="medicine.billing_edit"
                                                                    @if (in_array('medicine.billing_edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.billing_edit"
                                                                    >Bill Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.billing_delete"
                                                                    value="medicine.billing_delete"
                                                                    @if (in_array('medicine.billing_delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.billing_delete"
                                                                    >Bill Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.billing_view"
                                                                    value="medicine.billing_view"
                                                                    @if (in_array('medicine.billing_view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.billing_view"
                                                                    >Bill View</label
                                                                >
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>POS/Bill Other</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.billing_print"
                                                                    value="medicine.billing_print"
                                                                    @if (in_array('medicine.billing_print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.billing_print"
                                                                    >Bill PDF/Print</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Purchase</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.purchase_list"
                                                                    value="medicine.purchase_list"
                                                                    @if (in_array('medicine.purchase_list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.purchase_list"
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
                                                                    id="medicine.purchase_create"
                                                                    value="medicine.purchase_create"
                                                                    @if (in_array('medicine.purchase_create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.purchase_create"
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
                                                                    id="medicine.purchase_edit"
                                                                    value="medicine.purchase_edit"
                                                                    @if (in_array('medicine.purchase_edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.purchase_edit"
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
                                                                    id="medicine.purchase_delete"
                                                                    value="medicine.purchase_delete"
                                                                    @if (in_array('medicine.purchase_delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.purchase_delete"
                                                                    >Purchase Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.purchase_view"
                                                                    value="medicine.purchase_view"
                                                                    @if (in_array('medicine.purchase_view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.purchase_view"
                                                                    >Purchase View</label
                                                                >
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Purchase Other</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.purchase_print"
                                                                    value="medicine.purchase_print"
                                                                    @if (in_array('medicine.purchase_print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.purchase_print"
                                                                    >Purchase PDF/Print</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Stock adjustment</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.stock_list"
                                                                    value="medicine.stock_list"
                                                                    @if (in_array('medicine.stock_list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="medicine.stock_list"
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
                                                                    id="medicine.stock_create"
                                                                    value="medicine.stock_create"
                                                                    @if (in_array('medicine.stock_create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.stock_create"
                                                                    >Stock Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.stock_edit"
                                                                    value="medicine.stock_edit"
                                                                    @if (in_array('medicine.stock_edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.stock_edit"
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
                                                                    id="medicine.stock_delete"
                                                                    value="medicine.stock_delete"
                                                                    @if (in_array('medicine.stock_delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.stock_delete"
                                                                    >Stock Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.stock_view"
                                                                    value="medicine.stock_view"
                                                                    @if (in_array('medicine.stock_view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.stock_view"
                                                                    >Stock View</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.stock_print"
                                                                    value="medicine.stock_print"
                                                                    @if (in_array('medicine.stock_print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="medicine.stock_print"
                                                                    >Stock Print</label
                                                                >
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Medicine</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.list"
                                                                    value="medicine.list"
                                                                    @if (in_array('medicine.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="medicine.list"
                                                                    >Medicine List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.create"
                                                                    value="medicine.create"
                                                                    @if (in_array('medicine.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="medicine.create"
                                                                    >Medicine Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.edit"
                                                                    value="medicine.edit"
                                                                    @if (in_array('medicine.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="medicine.edit"
                                                                    >Medicine Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.delete"
                                                                    value="medicine.delete"
                                                                    @if (in_array('medicine.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.delete"
                                                                    >Medicine Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.view"
                                                                    value="medicine.view"
                                                                    @if (in_array('medicine.view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="medicine.view"
                                                                    >Medicine View</label
                                                                >
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Medicine Other</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.print"
                                                                    value="medicine.print"
                                                                    @if (in_array('medicine.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.print"
                                                                    >Medicine Print</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Medicine Category</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.category_list"
                                                                    value="medicine.category_list"
                                                                    @if (in_array('medicine.category_list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.category_list"
                                                                    >Medicine Category List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.category_create"
                                                                    value="medicine.category_create"
                                                                    @if (in_array('medicine.category_create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.category_create"
                                                                    >Medicine Category Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.category_edit"
                                                                    value="medicine.category_edit"
                                                                    @if (in_array('medicine.category_edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.category_edit"
                                                                    >Medicine Category Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.category_delete"
                                                                    value="medicine.category_delete"
                                                                    @if (in_array('medicine.category_delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="medicine.category_delete"
                                                                    >Medicine Category Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="medicine.category_print"
                                                                    value="medicine.category_print"
                                                                    @if (in_array('medicine.category_print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="medicine.category_print"
                                                                    >Medicine Category Print</label
                                                                >
                                                            </div></td>
                                                            <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Department</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="department.list"
                                                                    value="department.list"
                                                                    @if (in_array('department.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="department.list"
                                                                    >Department List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="department.create"
                                                                    value="department.create"
                                                                    @if (in_array('department.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="department.create"
                                                                    >Department Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="department.edit"
                                                                    value="department.edit"
                                                                    @if (in_array('department.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="department.edit"
                                                                    >Department Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="department.delete"
                                                                    value="department.delete"
                                                                    @if (in_array('department.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="department.delete"
                                                                    >Department Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="department.view"
                                                                    value="department.view"
                                                                    @if (in_array('department.view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="department.view"
                                                                    >Department View</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="department.print"
                                                                    value="department.print"
                                                                    @if (in_array('department.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="department.print"
                                                                    >Department Print</label
                                                                >
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Doctor</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="doctor.list"
                                                                    value="doctor.list"
                                                                    @if (in_array('doctor.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="doctor.list"
                                                                    >Doctor List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="doctor.create"
                                                                    value="doctor.create"
                                                                    @if (in_array('doctor.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="doctor.create"
                                                                    >Doctor Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="doctor.edit"
                                                                    value="doctor.edit"
                                                                    @if (in_array('doctor.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="doctor.edit"
                                                                    >Doctor Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="doctor.delete"
                                                                    value="doctor.delete"
                                                                    @if (in_array('doctor.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="doctor.delete"
                                                                    >Doctor Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="doctor.view"
                                                                    value="doctor.view"
                                                                    @if (in_array('doctor.view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="doctor.view"
                                                                    >Doctor view</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="doctor.print"
                                                                    value="doctor.print"
                                                                    @if (in_array('doctor.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="doctor.print"
                                                                    >Doctor Print</label
                                                                >
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Expenses</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="expenses.list"
                                                                    value="expenses.list"
                                                                    @if (in_array('expenses.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="expenses.list"
                                                                    >Expense List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="expense.create"
                                                                    value="expense.create"
                                                                    @if (in_array('expense.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="expense.create"
                                                                    >Expense Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="expense.edit"
                                                                    value="expense.edit"
                                                                    @if (in_array('expense.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="expense.edit"
                                                                    >Expense Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="expense.delete"
                                                                    value="expense.delete"
                                                                    @if (in_array('expense.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="expense.delete">Expense Delete</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="expense.view"
                                                                    value="expense.view"
                                                                    @if (in_array('expense.view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="expense.view"
                                                                    >Expense View</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="expense.print"
                                                                    value="expense.print"
                                                                    @if (in_array('expense.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="expense.print"
                                                                    >Expense Print</label
                                                                >
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Expenses Type</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="expensetype.list"
                                                                    value="expensetype.list"
                                                                    @if (in_array('expensetype.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="expensetype.list"
                                                                    >Expenses Type List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="expensetype.create"
                                                                    value="expensetype.create"
                                                                    @if (in_array('expensetype.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="expensetype.create"
                                                                    >Expenses Type Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="expensetype.edit"
                                                                    value="expensetype.edit"
                                                                    @if (in_array('expensetype.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="expensetype.edit"
                                                                    >Expenses Type Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="expensetype.delete"
                                                                    value="expensetype.delete"
                                                                    @if (in_array('expensetype.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="expensetype.delete"
                                                                    >Expenses Type Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>                                                         <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="expensetype.view"
                                                                    value="expensetype.view"
                                                                    @if (in_array('expensetype.view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="expensetype.view"
                                                                    >Expenses Type View</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="expensetype.print"
                                                                    value="expensetype.print"
                                                                    @if (in_array('expensetype.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="expensetype.print"
                                                                    >Expense Type Print</label
                                                                >
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Attendance</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="staffattendance.list"
                                                                    value="staffattendance.list"
                                                                    @if (in_array('staffattendance.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="staffattendance.list"
                                                                    >Attendance List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="staffattendance.create"
                                                                    value="staffattendance.create"
                                                                    @if (in_array('staffattendance.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="staffattendance.create"
                                                                    >Attendance Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="staffattendance.view"
                                                                    value="staffattendance.view"
                                                                    @if (in_array('staffattendance.view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="staffattendance.view"
                                                                    >Attendance View</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="staffattendance.print"
                                                                    value="staffattendance.print"
                                                                    @if (in_array('staffattendance.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="staffattendance.print"
                                                                    >Attendance Print</label
                                                                >
                                                            </div></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Salarytemplate</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="salarytemplate.list"
                                                                    value="salarytemplate.list"
                                                                    @if (in_array('salarytemplate.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="salarytemplate.list"
                                                                    >Salary Template List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="salarytemplate.create"
                                                                    value="salarytemplate.create"
                                                                    @if (in_array('salarytemplate.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="salarytemplate.create"
                                                                    >Salary Template Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="salarytemplate.edit"
                                                                    value="salarytemplate.edit"
                                                                    @if (in_array('salarytemplate.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="salarytemplate.edit"
                                                                    >Salary Template Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="salarytemplate.delete"
                                                                    value="salarytemplate.delete"
                                                                    @if (in_array('salarytemplate.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="salarytemplate.delete"
                                                                    >Salary Template Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="salarytemplate.print"
                                                                    value="salarytemplate.print"
                                                                    @if (in_array('salarytemplate.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="salarytemplate.print"
                                                                    >Salary Template Print</label
                                                                >
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Manage Salary</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="managesalary.list"
                                                                    value="managesalary.list"
                                                                    @if (in_array('managesalary.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="managesalary.list"
                                                                    >Manage Salary List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="managesalary.create"
                                                                    value="managesalary.create"
                                                                    @if (in_array('managesalary.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="managesalary.create"
                                                                    >Manage Salary Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="managesalary.edit"
                                                                    value="managesalary.edit"
                                                                    @if (in_array('managesalary.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="managesalary.edit"
                                                                    >Manage Salary Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="managesalary.view"
                                                                    value="managesalary.view"
                                                                    @if (in_array('managesalary.view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="managesalary.view"
                                                                    >Manage Salary View</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="managesalary.print"
                                                                    value="managesalary.print"
                                                                    @if (in_array('managesalary.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="managesalary.print"
                                                                    >Manage Salary Print</label
                                                                >
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Payment history</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="managesalary.history.list"
                                                                    value="managesalary.history.list"
                                                                    @if (in_array('managesalary.history.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="managesalary.history.list"
                                                                    >Payment history List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="managesalary.history.view"
                                                                    value="managesalary.history.view"
                                                                    @if (in_array('managesalary.history.view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="managesalary.history.view"
                                                                    >Payment View</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="managesalary.history.delete"
                                                                    value="managesalary.history.delete"
                                                                    @if (in_array('managesalary.history.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="managesalary.history.delete"
                                                                    >Payment Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="managesalary.history.print"
                                                                    value="managesalary.history.print"
                                                                    @if (in_array('managesalary.history.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="managesalary.history.print"
                                                                    >Payment Print</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Make Payment</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="makepayment.list"
                                                                    value="makepayment.list"
                                                                    @if (in_array('makepayment.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="makepayment.list"
                                                                    >Make payment List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="makepayment.create"
                                                                    value="makepayment.create"
                                                                    @if (in_array('makepayment.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="makepayment.create"
                                                                    >Make Payment Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Birthrecords</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="birthrecord.list"
                                                                    value="birthrecord.list"
                                                                    @if (in_array('birthrecord.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="birthrecord.list"
                                                                    >Birthrecords List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="birthrecord.create"
                                                                    value="birthrecord.create"
                                                                    @if (in_array('birthrecord.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="birthrecord.create"
                                                                    >Birthrecord Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="birthrecord.edit"
                                                                    value="birthrecord.edit"
                                                                    @if (in_array('birthrecord.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="birthrecord.edit"
                                                                    >Birthrecord Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="birthrecord.delete"
                                                                    value="birthrecord.delete"
                                                                    @if (in_array('birthrecord.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="birthrecord.delete"
                                                                    >Birthrecord Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="birthrecord.view"
                                                                    value="birthrecord.view"
                                                                    @if (in_array('birthrecord.view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="birthrecord.view"
                                                                    >Birthrecord View</label
                                                                >
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Birthrecords Other</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="birthrecord.print"
                                                                    value="birthrecord.print"
                                                                    @if (in_array('birthrecord.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="birthrecord.print"
                                                                    >Birthrecord PDF/Print</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Deathrecords</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="deathrecord.list"
                                                                    value="deathrecord.list"
                                                                    @if (in_array('deathrecord.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="deathrecord.list"
                                                                    >Deathrecords List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="deathrecord.create"
                                                                    value="deathrecord.create"
                                                                    @if (in_array('deathrecord.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="deathrecord.create"
                                                                    >Deathrecord Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="deathrecord.edit"
                                                                    value="deathrecord.edit"
                                                                    @if (in_array('deathrecord.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="deathrecord.edit"
                                                                    >Deathrecord Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="deathrecord.delete"
                                                                    value="deathrecord.delete"
                                                                    @if (in_array('deathrecord.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="deathrecord.delete"
                                                                    >Deathrecord Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="deathrecord.view"
                                                                    value="deathrecord.view"
                                                                    @if (in_array('deathrecord.view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="deathrecord.view"
                                                                    >Deathrecord View</label
                                                                >
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Deathrecords Other</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="deathrecord.print"
                                                                    value="deathrecord.print"
                                                                    @if (in_array('deathrecord.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="deathrecord.print"
                                                                    >Deathrecords PDF/Print</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Noticeboard</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="noticeboard.list"
                                                                    value="noticeboard.list"
                                                                    @if (in_array('noticeboard.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="noticeboard.list"
                                                                    >Noticeboard List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="noticeboard.create"
                                                                    value="noticeboard.create"
                                                                    @if (in_array('noticeboard.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="noticeboard.create"
                                                                    >Noticeboard Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="noticeboard.edit"
                                                                    value="noticeboard.edit"
                                                                    @if (in_array('noticeboard.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="noticeboard.edit"
                                                                    >Noticeboard Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="noticeboard.delete"
                                                                    value="noticeboard.delete"
                                                                    @if (in_array('noticeboard.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="noticeboard.delete"
                                                                    >Noticeboard Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="noticeboard.view"
                                                                    value="noticeboard.view"
                                                                    @if (in_array('noticeboard.view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="noticeboard.view"
                                                                    >Noticeboard View</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="noticeboard.print"
                                                                    value="noticeboard.print"
                                                                    @if (in_array('noticeboard.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="noticeboard.print"
                                                                    >Noticeboard Print</label
                                                                >
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>User</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="user.list"
                                                                    value="user.list"
                                                                    @if (in_array('user.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="user.list"
                                                                    >User List</label
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
                                                                    @if (in_array('user.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="user.create"
                                                                    >User Create</label
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
                                                                    @if (in_array('user.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="user.edit"
                                                                    >User Edit</label
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
                                                                    @if (in_array('user.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="user.delete"
                                                                    >User Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="user.view"
                                                                    value="user.view"
                                                                    @if (in_array('user.view',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="user.view"
                                                                    >User View</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="user.print"
                                                                    value="user.print"
                                                                    @if (in_array('user.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="user.print"
                                                                    >User Print</label
                                                                >
                                                            </div></td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td>Subscriber</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="subscribers"
                                                                    value="subscribers"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="subscribers"
                                                                    >Subscriber List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="subscriber.create"
                                                                    value="subscriber.create"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="subscriber.create"
                                                                    >Subscriber Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="subscriber/edit"
                                                                    value="subscriber/edit"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="subscriber/edit"
                                                                    >Subscriber Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="subscriber/delete"
                                                                    value="subscriber/delete"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="subscriber/delete"
                                                                    >Subscriber Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Page</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="pages"
                                                                    value="pages"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="pages"
                                                                    >Page List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="page.create"
                                                                    value="page.create"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="page.create"
                                                                    >Page Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="page/edit"
                                                                    value="page/edit"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="page/edit"
                                                                    >Page Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="page/delete"
                                                                    value="page/delete"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="page/delete"
                                                                    >Page Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other Pages</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="page/menu"
                                                                    value="page/menu"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="page/menu"
                                                                    >Web Menu</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="page/footer"
                                                                    value="page/footer"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="page/footer"
                                                                    >Web Footer</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="page/theme"
                                                                    value="page/theme"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="page/theme"
                                                                    >Web Theme</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="page/settings"
                                                                    value="page/settings"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="page/settings"
                                                                    >Web Settings</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td>Facility</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="facility.list"
                                                                    value="facility.list"
                                                                    @if (in_array('facility.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="facility.list"
                                                                    >Facility List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="facility.create"
                                                                    value="facility.create"
                                                                    @if (in_array('facility.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="facility.create"
                                                                    >Facility Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="facility.edit"
                                                                    value="facility.edit"
                                                                    @if (in_array('facility.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="facility.edit"
                                                                    >Facility Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="facility.delete"
                                                                    value="facility.delete"
                                                                    @if (in_array('facility.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="facility.delete"
                                                                    >Facility Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="facility.print"
                                                                    value="facility.print"
                                                                    @if (in_array('facility.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="facility.print"
                                                                    >Facility Print</label
                                                                >
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Service</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="service.list"
                                                                    value="service.list"
                                                                    @if (in_array('service.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="service.list"
                                                                    >Service List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="service.create"
                                                                    value="service.create"
                                                                    @if (in_array('service.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="service.create"
                                                                    >Service Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="service.edit"
                                                                    value="service.edit"
                                                                    @if (in_array('service.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="service.edit"
                                                                    >Service Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="service.delete"
                                                                    value="service.delete"
                                                                    @if (in_array('service.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="service.delete"
                                                                    >Service Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="service.print"
                                                                    value="service.print"
                                                                    @if (in_array('service.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="service.print"
                                                                    >Service Print</label
                                                                >
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Review</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="review.list"
                                                                    value="review.list"
                                                                    @if (in_array('review.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="review.list"
                                                                    >Review List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="review.edit"
                                                                    value="review.edit"
                                                                    @if (in_array('review.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="review.edit"
                                                                    >Review Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="review.delete"
                                                                    value="review.delete"
                                                                    @if (in_array('review.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="review.delete"
                                                                    >Review Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="review.print"
                                                                    value="review.print"
                                                                    @if (in_array('review.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="review.print"
                                                                    >Review Print</label
                                                                >
                                                            </div></td>
                                                        <td></td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td>Testimonial</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="testimonials"
                                                                    value="testimonials"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="testimonials"
                                                                    >Testimonial List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="testimonial.create"
                                                                    value="testimonial.create"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="testimonial.create"
                                                                    >Testimonial Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="testimonial/edit"
                                                                    value="testimonial/edit"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="testimonial/edit"
                                                                    >Testimonial Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="testimonial/delete"
                                                                    value="testimonial/delete"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="testimonial/delete"
                                                                    >Testimonial Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td>Blog</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="blog.list"
                                                                    value="blog.list"
                                                                    @if (in_array('blog.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="blog.list"
                                                                    >Blog List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="blog.create"
                                                                    value="blog.create"
                                                                    @if (in_array('blog.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="blog.create"
                                                                    >Blog Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="blog.edit"
                                                                    value="blog.edit"
                                                                    @if (in_array('blog.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="blog.edit"
                                                                    >Blog Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="blog.delete"
                                                                    value="blog.delete"
                                                                    @if (in_array('blog.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="blog.delete"
                                                                    >Blog Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="blog.print"
                                                                    value="blog.print"
                                                                    @if (in_array('blog.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="blog.print"
                                                                    >Blog Print</label
                                                                >
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Category</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="categor.list"
                                                                    value="categor.list"
                                                                    @if (in_array('categor.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="categor.list"
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
                                                                    @if (in_array('category.create',$permission))
                                                                        checked
                                                                    @endif    
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
                                                                    @if (in_array('category.edit',$permission))
                                                                        checked
                                                                    @endif    
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
                                                                    @if (in_array('category.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="category.delete"
                                                                    >Category Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="category.print"
                                                                    value="category.print"
                                                                    @if (in_array('category.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="category.print"
                                                                    >Category Print</label
                                                                >
                                                            </div></td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td>Comment</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="comment"
                                                                    value="comment"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="comment"
                                                                    >Comment List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="comment/edit"
                                                                    value="comment/edit"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="comment/edit"
                                                                    >Comment Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="comment/delete"
                                                                    value="comment/delete"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="comment/delete"
                                                                    >Comment Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr> --}}
                                                    {{-- <tr>
                                                        <td>System Info</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="info"
                                                                    value="info"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="info"
                                                                    >System Info</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td>Taxes</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="tax.list"
                                                                    value="tax.list"
                                                                    @if (in_array('tax.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="tax.list"
                                                                    >Taxes List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="tax.create"
                                                                    value="tax.create"
                                                                    @if (in_array('tax.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="tax.create"
                                                                    >Taxes Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="tax.edit"
                                                                    value="tax.edit"
                                                                    @if (in_array('tax.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="tax.edit"
                                                                    >Taxes Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="tax.delete"
                                                                    value="tax.delete"
                                                                    @if (in_array('tax.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="tax.delete"
                                                                    >Taxes Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="tax.print"
                                                                    value="tax.print"
                                                                    @if (in_array('tax.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="tax.print"
                                                                    >Taxes Print</label
                                                                >
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Payment Method</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="paymentmethod.list"
                                                                    value="paymentmethod.list"
                                                                    @if (in_array('paymentmethod.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="paymentmethod.list"
                                                                    >Payment Methods</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="paymentmethod.create"
                                                                    value="paymentmethod.create"
                                                                    @if (in_array('paymentmethod.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="paymentmethod.create"
                                                                    >Payment Method Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="paymentmethod.edit"
                                                                    value="paymentmethod.edit"
                                                                    @if (in_array('paymentmethod.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="paymentmethod.edit"
                                                                    >Payment Method Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="paymentmethod.delete"
                                                                    value="paymentmethod.delete"
                                                                    @if (in_array('paymentmethod.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label
                                                                    class="custom-control-label"
                                                                    for="paymentmethod.delete"
                                                                    >Payment Method Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="paymentmethod.print"
                                                                    value="paymentmethod.print"
                                                                    @if (in_array('paymentmethod.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="paymentmethod.print"
                                                                    >Payment Method Print</label
                                                                >
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Payment Gateway</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="paymentgateway"
                                                                    value="paymentgateway"
                                                                    @if (in_array('paymentgateway',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="paymentgateway"
                                                                    >Payment Gateway</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Clinical Notes</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="clinical_note.list"
                                                                    value="clinical_note.list"
                                                                    @if (in_array('clinical_note.list',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="clinical_note.list"
                                                                    >Clinical Notes List</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="clinical_note.create"
                                                                    value="clinical_note.create"
                                                                    @if (in_array('clinical_note.create',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="clinical_note.create"
                                                                    >Clinical Note Create</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="clinical_note.edit"
                                                                    value="clinical_note.edit"
                                                                    @if (in_array('clinical_note.edit',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="clinical_note.edit"
                                                                    >Clinical Note Edit</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="clinical_note.delete"
                                                                    value="clinical_note.delete"
                                                                    @if (in_array('clinical_note.delete',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="clinical_note.delete"
                                                                    >Clinical Note Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td><div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="clinical_note.print"
                                                                    value="clinical_note.print"
                                                                    @if (in_array('clinical_note.print',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="clinical_note.print"
                                                                    >Clinical Note Print</label
                                                                >
                                                            </div></td>
                                                    </tr>
                                                    
                                                    {{-- <tr>
                                                        <td>Mail</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="send/email"
                                                                    value="send/email"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="send/email"
                                                                    >Send Email</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="sendbulk/email"
                                                                    value="sendbulk/email"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="sendbulk/email"
                                                                    >Send Bulk Email</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="emaillogs"
                                                                    value="emaillogs"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="emaillogs"
                                                                    >Email Log</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="emailsetting"
                                                                    value="emailsetting"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="emailsetting"
                                                                    >Email Settings</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="emailtemplate"
                                                                    value="emailtemplate"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="emailtemplate"
                                                                    >Email Template</label
                                                                >
                                                            </div>
                                                        </td>
                                                    </tr> --}}
                                                    {{-- <tr>
                                                        <td>Media</td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="get/media"
                                                                    value="get/media"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="get/media"
                                                                    >Media on Modal</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="media/upload"
                                                                    value="media/upload"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="media/upload"
                                                                    >Media Upload</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="media/delete"
                                                                    value="media/delete"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="media/delete"
                                                                    >Media Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="upload/gallery"
                                                                    value="upload/gallery"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="upload/gallery"
                                                                    >Gallery Upload</label
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-control-input"
                                                                    name="role[]"
                                                                    id="gallery/delete"
                                                                    value="gallery/delete"
                                                                    @if (in_array('dashboard',$permission))
                                                                        checked
                                                                    @endif    
                                                                />
                                                                <label class="custom-control-label" for="gallery/delete"
                                                                    >Gallery Delete</label
                                                                >
                                                            </div>
                                                        </td>
                                                    </tr>  --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Basic Inputs end -->
        </div>
        </div>
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
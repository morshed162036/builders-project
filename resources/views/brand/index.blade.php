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
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success: </strong>{{ Session::get('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                        @endif
                        <h5 class="content-header-title float-left pr-1 mb-0">Brand Table</h5>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb p-0 mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active">Brands
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- table Transactions start -->
            <section id="table-transactions">
                <div class="card">
                    <div class="card-header">
                        <!-- head -->
                        <h5 class="card-title">Brand List</h5>
                        <!-- Single Date Picker and button -->
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li class="ml-2"><a href="{{ route('brand.create') }}" class="btn btn-primary">+ Create</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- datatable start -->
                    <div class="table-responsive">
                        <div id="table-extended-transactions_wrapper" class="dataTables_wrapper no-footer"><table id="table-extended-transactions" class="table mb-0 dataTable no-footer" role="grid">
                            <thead>
                                <tr role="row"><th class="sorting" tabindex="0" aria-controls="table-extended-transactions" rowspan="1" colspan="1" aria-label="name: activate to sort column ascending" style="width: 306.531px;">Brand</th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="card" style="width: 322.188px;">Description</th><th class="sorting" tabindex="0" aria-controls="table-extended-transactions" rowspan="1" colspan="1" aria-label="date: activate to sort column ascending" style="width: 201.938px;">Address</th><th class="sorting" tabindex="0" aria-controls="table-extended-transactions" rowspan="1" colspan="1" aria-label="status: activate to sort column ascending" style="width: 239.656px;">status</th><th>Action</th></tr>
                            </thead>
                            <tbody>
                                
                                
                                
                                @if ($brands)
                                    @foreach ($brands as $brand)
                                        <tr role="row" class="odd">
                                            <td><img src=" " class="mr-50" alt="logo" height="25" width="35">{{ $brand->name }}</td>
                                            <td class="text-bold-600">{{ $brand->description }}</td>
                                            <td class="">{{ $brand->address }}</td>
                                            <td class="">
                                                @if($brand->status == 'Active')
                                                    <i class="bx bxs-circle success font-small-1 mr-50"></i>
                                                @else
                                                    <i class="bx bxs-circle danger font-small-1 mr-50"></i>
                                                @endif
                                                <span>{{ $brand->status }}</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ route('brand.edit',$brand->id) }}"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                                        <form action="{{ route('brand.destroy',$brand->id) }}" method="post"> @csrf @method('Delete')
                                                            <button type="submit" class="dropdown-item"><i class="bx bx-trash mr-1"></i> delete</button>
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>   
                                    @endforeach
                                @else
                                    {{ 'No Data Found' }}
                                @endif
                            </tbody>
                        </table></div>
                    </div>
                    <!-- datatable ends -->
                </div>
            </section>
            <!-- table Transactions end -->

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
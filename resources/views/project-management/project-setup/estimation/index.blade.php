@extends('layout.layout')

@section('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_template/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
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
    <style>
        a label {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success: </strong>{{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Success: </strong>{{ Session::get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h5 class="content-header-title float-left pr-1 mb-0">Project Estimation Table</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Estimations
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Estimation List</h5>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li class="ml-2"><a href="{{ route('project-estimation.create') }}" class="btn btn-primary">+ Create</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Project Name</th>
                                                <th>Estimated Starting Date</th>
                                                <th>Estimated Ending Date</th>
                                                <th>Estimated Cost</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($estimations)
                                                @foreach ($estimations as $estimation)
                                                    <tr>
                                                        <td>{{ $estimation->project->name }}</td>
                                                        <td>{{ $estimation->starting_date }}</td>
                                                        <td>{{ $estimation->ending_date }}</td>
                                                        <td>{{ $estimation->cost }}</td>
                                                        
                                                        <td>
                                                            <div class="dropdown">
                                                                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    
                                                                    <a class="dropdown-item" href="{{ route('project-estimation.show',$estimation->id) }}"><i class="bx 
                                                                        bxs-spreadsheet mr-1"></i> Details</a>
                                                                    <a class="dropdown-item" href="{{ route('project-estimation.edit',$estimation->id) }}"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                                                    <form action="{{ route('project-estimation.destroy',$estimation->id) }}" method="post"> @csrf @method('Delete')
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
                                        <tfoot>
                                            <tr>
                                                <th>Project Name</th>
                                                <th>Estimated Starting Date</th>
                                                <th>Estimated Starting Date</th>
                                                <th>Estimated Cost</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Scrolling long Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Biscuit powder jelly beans. Lollipop candy canes croissant icing chocolate cake. Cake fruitcake
                        powder pudding pastry
                    </p>
                    <p>
                        Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                        candy
                        gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I love
                        caramels powder
                    </p>
                    <p>
                        Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                        dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop liquorice
                        chocolate marzipan muffin pie liquorice.
                    </p>
                    <p>
                        Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                        Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                        tootsie roll carrot cake soufflé halvah. Biscuit powder jelly beans. Lollipop candy canes
                        croissant icing chocolate cake. Cake fruitcake powder pudding pastry.
                    </p>
                    <p>
                        Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                        candy gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I
                        love caramels powder.
                    </p>
                    <p>
                        dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop liquorice
                        chocolate marzipan muffin pie liquorice.
                    </p>
                    <p>
                        Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                        Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                        tootsie roll carrot cake soufflé halvah.Biscuit powder jelly beans. Lollipop candy canes croissant
                        icing chocolate cake. Cake fruitcake powder pudding pastry.
                    </p>
                    <p>
                        Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                        candy gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I
                        love caramels powder.
                    </p>
                    <p>
                        Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                        dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop liquorice
                        chocolate marzipan muffin pie liquorice.
                    </p>
                    <p>
                        Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                        Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                        tootsie roll carrot cake soufflé halvah. Biscuit powder jelly beans. Lollipop candy canes
                        croissant icing chocolate cake. Cake fruitcake powder pudding pastry.
                    </p>
                    <p>
                        Tootsie roll oat cake I love bear claw I love caramels caramels halvah chocolate bar. Cotton
                        candy gummi bears pudding pie apple pie cookie. Cheesecake jujubes lemon drops danish dessert I
                        love caramels powder.
                    </p>
                    <p>
                        Chocolate cake icing tiramisu liquorice toffee donut sweet roll cake. Cupcake dessert icing
                        dragée dessert. Liquorice jujubes cake tart pie donut. Cotton candy candy canes lollipop liquorice
                        chocolate marzipan muffin pie liquorice.
                    </p>
                    <p>
                        Powder cookie jelly beans sugar plum ice cream. Candy canes I love powder sugar plum tiramisu.
                        Liquorice pudding chocolate cake cupcake topping biscuit. Lemon drops apple pie sesame snaps
                        tootsie roll carrot cake soufflé halvah.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <a href="" class="btn btn-primary ml-1" data-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Edit</span>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
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
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin_template/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/js/scripts/components.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/js/scripts/footer.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin_template/app-assets/js/scripts/datatables/datatable.js') }}"></script>
    <!-- END: Page JS-->
@endsection

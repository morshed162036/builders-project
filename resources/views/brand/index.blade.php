@extends('layout.layout')

@section('content')


        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h5 class="content-header-title float-left pr-1 mb-0">Brand Table</h5>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb p-0 mb-0">
                                <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
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
                                {{-- <li>
                                    <fieldset class="has-icon-left">
                                        <input type="text" class="form-control single-daterange">
                                        <div class="form-control-position">
                                            <i class="bx bx-calendar font-medium-1"></i>
                                        </div>
                                    </fieldset>
                                </li> --}}
                                <li class="ml-2"><button class="btn btn-primary">+ Create</button></li>
                            </ul>
                        </div>
                    </div>
                    <!-- datatable start -->
                    <div class="table-responsive">
                        <div id="table-extended-transactions_wrapper" class="dataTables_wrapper no-footer"><table id="table-extended-transactions" class="table mb-0 dataTable no-footer" role="grid">
                            <thead>
                                <tr role="row"><th class="sorting" tabindex="0" aria-controls="table-extended-transactions" rowspan="1" colspan="1" aria-label="status: activate to sort column ascending" style="width: 239.656px;">status</th><th class="sorting" tabindex="0" aria-controls="table-extended-transactions" rowspan="1" colspan="1" aria-label="name: activate to sort column ascending" style="width: 306.531px;">name</th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="card" style="width: 322.188px;">card</th><th class="sorting" tabindex="0" aria-controls="table-extended-transactions" rowspan="1" colspan="1" aria-label="date: activate to sort column ascending" style="width: 201.938px;">date</th><th>Action</th></tr>
                            </thead>
                            <tbody>
                                
                                
                                
                                
                                
                            <tr role="row" class="odd">
                                    <td class=""><i class="bx bxs-circle success font-small-1 mr-50"></i><span>Paid</span></td>
                                    <td class="text-bold-600">Mike Brennan</td>
                                    <td><img src="../../../app-assets/images/cards/amer-express.png" class="mr-50" alt="card" height="25" width="35"> **** 7617</td>
                                    <td class="">10.09.17</td>
                                    <td>
                                        <div class="dropdown">
                                            <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                                <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                            </div>
                                        </div>
                                    </td>
                                        
                                    
                                </tr><tr role="row" class="even">
                                    <td class=""><i class="bx bxs-circle danger font-small-1 mr-50"></i><span>Expired</span></td>
                                    <td class="text-bold-600">Michael Pena</td>
                                    <td><img src="../../../app-assets/images/cards/mastercard.png" class="mr-50" alt="card" height="25" width="35"> **** 7617</td>
                                    <td class="">11.08.18</td>
                                    <td class="text-bold-600 sorting_1">$564</td>
                                </tr><tr role="row" class="odd">
                                    <td class=""><i class="bx bxs-circle success font-small-1 mr-50"></i><span>Paid</span></td>
                                    <td class="text-bold-600">Michael Pena</td>
                                    <td><img src="../../../app-assets/images/cards/discover.png" class="mr-50" alt="card" height="25" width="35"> **** 7617</td>
                                    <td class="">11.08.18</td>
                                    <td class="text-bold-600 sorting_1">$564</td>
                                </tr><tr role="row" class="even">
                                    <td class=""><i class="bx bxs-circle danger font-small-1 mr-50"></i><span>Expired</span></td>
                                    <td class="text-bold-600">Devin Payne</td>
                                    <td><img src="../../../app-assets/images/cards/discover.png" class="mr-50" alt="card" height="25" width="35"> **** 7617</td>
                                    <td class="">11.08.18</td>
                                    <td class="text-bold-600 sorting_1">$232</td>
                                </tr><tr role="row" class="odd">
                                    <td class=""><i class="bx bxs-circle success font-small-1 mr-50"></i><span>Paid</span></td>
                                    <td class="text-bold-600">Devin Payne</td>
                                    <td><img src="../../../app-assets/images/cards/visa.png" class="mr-50" alt="card" height="25" width="35">
                                        **** 7617</td>
                                    <td class="">11.08.18</td>
                                    <td class="text-bold-600 sorting_1">$232</td>
                                </tr></tbody>
                        </table></div>
                    </div>
                    <!-- datatable ends -->
                </div>
            </section>
            <!-- table Transactions end -->

        </div>

    
@endsection
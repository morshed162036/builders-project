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
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_template/app-assets/css/pages/app-invoice.css') }}">
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
    <!-- app invoice View Page -->
    <section class="invoice-view-wrapper">
        <div class="row">
            <!-- invoice view page -->
            <div class="col-xl-9 col-md-8 col-12">
                <div class="card invoice-print-area">
                    <div class="card-content">
                        <div class="card-body pb-0 mx-25">
                            <!-- header section -->
                            <div class="row">
                                <div class="col-xl-4 col-md-12">
                                    <span class="invoice-number mr-50">Invoice#</span>
                                    <span class="text-primary">{{$invoice->invoice_code}}</span>
                                </div>
                                <div class="col-xl-8 col-md-12">
                                    <div class="d-flex align-items-center justify-content-xl-end flex-wrap">
                                        <div class="mr-3">
                                            <small class="text-muted">Issue Day:</small>
                                            <span>{{$invoice->issue_date}}</span>
                                        </div>
                                        <div class="mr-3">
                                            <small class="text-muted">Due Day:</small>
                                            <span>{{$invoice->due_date}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- logo and title -->
                            <div class="row my-3">
                                <div class="col-6">
                                    <h4 class="text-primary">{{$invoice->invoice_type}}</h4>
                                    {{-- <span>Software Development</span> --}}
                                </div>
                                {{-- <div class="col-6 d-flex justify-content-end">
                                    <img src="../../../app-assets/images/pages/pixinvent-logo.png" alt="logo" height="46" width="164">
                                </div> --}}
                            </div>
                            <hr>
                            <!-- invoice address and contact -->
                            <div class="row invoice-info">
                                {{-- <div class="col-6 mt-1">
                                    <h6 class="invoice-from">Bill From</h6>
                                    <div class="mb-1">
                                        <span>Clevision PVT. LTD.</span>
                                    </div>
                                    <div class="mb-1">
                                        <span>9205 Whitemarsh Street New York, NY 10002</span>
                                    </div>
                                    <div class="mb-1">
                                        <span>hello@clevision.net</span>
                                    </div>
                                    <div class="mb-1">
                                        <span>601-678-8022</span>
                                    </div>
                                </div> --}}
                                @if ($invoice->invoice_type == 'Purchase')
                                    <div class="col-6 mt-1">
                                        <h6 class="invoice-to">Supplier Details</h6>
                                        <div class="mb-1">
                                            <span>{{$invoice->supplier->name}}</span>
                                        </div>
                                        @if ($invoice->supplier->company)
                                            <div class="mb-1">
                                                <span>{{$invoice->supplier->company}}</span>
                                            </div>
                                        @endif
                                        
                                        <div class="mb-1">
                                            <span>{{$invoice->supplier->email}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span>{{$invoice->supplier->phone}}</span>
                                        </div>
                                    </div>
                                @elseif ($invoice->invoice_type == 'Sell')
                                    <div class="col-6 mt-1">
                                        <h6 class="invoice-to">Client Details</h6>
                                        <div class="mb-1">
                                            <span>{{$invoice->client->name}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span>{{$invoice->client->company}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span>{{$invoice->client->email}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span>{{$invoice->client->phone}}</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-6 mt-1">
                                        <h6 class="invoice-to">Client Details</h6>
                                        <div class="mb-1">
                                            <span>{{$invoice->project->client->name}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span>{{$invoice->project->client->company}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span>{{$invoice->project->client->email}}</span>
                                        </div>
                                        <div class="mb-1">
                                            <span>{{$invoice->project->client->phone}}</span>
                                        </div>
                                    </div>

                                @endif
                                
                            </div>
                            <hr>
                        </div>
                        <!-- product details table-->
                        <div class="invoice-product-details table-responsive mx-md-25">
                            <table class="table table-borderless mb-2">
                                <h5 class="ml-2 primary">Product:</h5>
                                <thead>
                                    <tr class="border-0">
                                        <th scope="col">Item</th>
                                        <th scope="col">sku</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col" class="text-right">Cost</th>
                                        {{-- <td class="text-primary text-right font-weight-bold">$28.00</td> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $product_subtotal = 0;
                                    @endphp
                                    @foreach ( $invoice->details as $item)
                                        <tr>
                                            <td>{{ $item->product->title }}</td>
                                            <td>{{ $item->sku }}</td>
                                            <td>{{ $item->quantity }} {{ $item->unit->unit }}</td>
                                            <td>{{ $item->unit_price}}</td>
                                            <td class="text-primary text-right font-weight-bold">{{ $item->total_price}}</td>
                                            @php
                                                $product_subtotal += $item->total_price;
                                            @endphp
                                        </tr>
                                    @endforeach
                                    
                                        {{-- <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right font-weight-bold">SubTotal :<span class="text-primary">{{ $product_subtotal }}</span></td>
                                        </tr> --}}
                                </tbody>
                            </table>
                        </div>

                        <!-- invoice subtotal -->
                        <div class="card-body pt-0 mx-25">
                            <hr>
                            <div class="row">
                                <div class="col-4 col-sm-6 mt-75">
                                    <p>Thanks for your business.</p>
                                    <span class="invoice-title">Payment Status: </span>
                                    <span class="invoice-value text-primary">{{ $invoice->payment_status }}</span>
                                </div>
                                <div class="col-8 col-sm-6 d-flex justify-content-end mt-75">
                                    <div class="invoice-subtotal">
                                        <div class="invoice-calc d-flex justify-content-between">
                                            <span class="invoice-title text-primary"> Total</span>
                                            <span class="invoice-value text-primary">{{ $product_subtotal }}</span>
                                        </div>
                                        <div class="invoice-calc d-flex justify-content-between">
                                            <span class="invoice-title">Discount</span>
                                            <span class="invoice-value">{{$invoice->discount}}</span>
                                        </div>
                                        {{-- <div class="invoice-calc d-flex justify-content-between">
                                            <span class="invoice-title">Tax</span>
                                            <span class="invoice-value">21%</span>
                                        </div> --}}
                                        <hr>
                                        <div class="invoice-calc d-flex justify-content-between">
                                            <span class="invoice-title">Invoice Total</span>
                                            <span class="invoice-value">{{ $invoice->total_amount }}</span>
                                        </div>
                                        <div class="invoice-calc d-flex justify-content-between">
                                            <span class="invoice-title">Paid to date</span>
                                            <span class="invoice-value">{{ $invoice->payment_amount }}</span>
                                        </div>
                                        <div class="invoice-calc d-flex justify-content-between">
                                            <span class="invoice-title">Due Balance</span>
                                            <span class="invoice-value text-danger">{{  $invoice->total_amount - $invoice->payment_amount }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- invoice action  -->
            <div class="col-xl-3 col-md-4 col-12">
                <div class="card invoice-action-wrapper shadow-none border">
                    <div class="card-body">
                        {{-- <div class="invoice-action-btn">
                            <button class="btn btn-primary btn-block invoice-send-btn">
                                <i class="bx bx-send"></i>
                                <span>Send Invoice</span>
                            </button>
                        </div> --}}
                        <div class="invoice-action-btn">
                            <button class="btn btn-light-primary btn-block invoice-print">
                                <span>print</span>
                            </button>
                        </div>
                        {{-- <div class="invoice-action-btn">
                            <a href="app-invoice-edit.html" class="btn btn-light-primary btn-block">
                                <span>Edit Invoice</span>
                            </a>
                        </div> --}}
                        <div class="">
                            <a class="btn btn-success btn-block" href="">
                                <i class='bx bx-dollar'></i>
                                <span>Edit</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('admin_template/app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin_template/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/js/scripts/components.js') }}"></script>
    <script src="{{ asset('admin_template/app-assets/js/scripts/footer.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin_template/app-assets/js/scripts/pages/app-invoice.js') }}"></script>
    <!-- END: Page JS-->
@endsection
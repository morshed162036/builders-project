    <!-- BEGIN: Header-->
    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                        class="ficon bx bx-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#"
                                    data-toggle="tooltip" data-placement="top" title="Email"><i
                                        class="ficon bx bx-envelope"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#"
                                    data-toggle="tooltip" data-placement="top" title="Chat"><i
                                        class="ficon bx bx-chat"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#"
                                    data-toggle="tooltip" data-placement="top" title="Todo"><i
                                        class="ficon bx bx-check-circle"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#"
                                    data-toggle="tooltip" data-placement="top" title="Calendar"><i
                                        class="ficon bx bx-calendar-alt"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i
                                        class="ficon bx bx-star warning"></i></a>
                                <div class="bookmark-input search-input">
                                    <div class="bookmark-input-icon"><i class="bx bx-search primary"></i></div>
                                    <input class="form-control input" type="text" placeholder="Explore Us..."
                                        tabindex="0" data-search="template-search">
                                    <ul class="search-list"></ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link"
                                id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span
                                    class="selected-language">English</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item"
                                    href="#" data-language="en"><i class="flag-icon flag-icon-us mr-50"></i>
                                    English</a><a class="dropdown-item" href="#" data-language="fr"><i
                                        class="flag-icon flag-icon-fr mr-50"></i> French</a><a class="dropdown-item"
                                    href="#" data-language="de"><i class="flag-icon flag-icon-de mr-50"></i>
                                    German</a><a class="dropdown-item" href="#" data-language="pt"><i
                                        class="flag-icon flag-icon-pt mr-50"></i> Portuguese</a></div>
                        </li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                    class="ficon bx bx-fullscreen"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i
                                    class="ficon bx bx-search"></i></a>
                            <div class="search-input">
                                <div class="search-input-icon"><i class="bx bx-search primary"></i></div>
                                <input class="input" type="text" placeholder="Explore Frest..." tabindex="-1"
                                    data-search="template-search">
                                <div class="search-input-close"><i class="bx bx-x"></i></div>
                                <ul class="search-list"></ul>
                            </div>
                        </li>
                        {{-- <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label"
                                href="#" data-toggle="dropdown"><i
                                    class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i><span
                                    class="badge badge-pill badge-danger badge-up">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header px-1 py-75 d-flex justify-content-between"><span class="notification-title">7 new Notification</span><span class="text-bold-400 cursor-pointer">Mark all as read</span></div>
                                </li>
                                <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar mr-1 m-0"><img src="{{ asset('admin_template/app-assets/images/portrait/small/avatar-s-11.jpg') }}" alt="avatar" height="39" width="39"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">Congratulate Socrates Itumay</span> for work anniversaries</h6><small class="notification-text">Mar 15 12:32pm</small>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="d-flex justify-content-between read-notification cursor-pointer">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar mr-1 m-0"><img src="{{ asset('admin_template/app-assets/images/portrait/small/avatar-s-16.jpg') }}" alt="avatar" height="39" width="39"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">New Message</span> received</h6><small class="notification-text">You have 18 unread messages</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between cursor-pointer">
                                        <div class="media d-flex align-items-center py-0">
                                            <div class="media-left pr-0"><img class="mr-1" src="{{ asset('admin_template/app-assets/images/icon/sketch-mac-icon.png') }}" alt="avatar" height="39" width="39"></div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">Updates Available</span></h6><small class="notification-text">Sketch 50.2 is currently newly added</small>
                                            </div>
                                            <div class="media-right pl-0">
                                                <div class="row border-left text-center">
                                                    <div class="col-12 px-50 py-75 border-bottom">
                                                        <h6 class="media-heading text-bold-500 mb-0">Update</h6>
                                                    </div>
                                                    <div class="col-12 px-50 py-75">
                                                        <h6 class="media-heading mb-0">Close</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between cursor-pointer">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar bg-primary bg-lighten-5 mr-1 m-0 p-25"><span class="avatar-content text-primary font-medium-2">LD</span></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">New customer</span> is registered</h6><small class="notification-text">1 hrs ago</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cursor-pointer">
                                        <div class="media d-flex align-items-center justify-content-between">
                                            <div class="media-left pr-0">
                                                <div class="media-body">
                                                    <h6 class="media-heading">New Offers</h6>
                                                </div>
                                            </div>
                                            <div class="media-right">
                                                <div class="custom-control custom-switch">
                                                    <input class="custom-control-input" type="checkbox" checked id="notificationSwtich">
                                                    <label class="custom-control-label" for="notificationSwtich"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between cursor-pointer">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar bg-danger bg-lighten-5 mr-1 m-0 p-25"><span class="avatar-content"><i class="bx bxs-heart text-danger"></i></span></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">Application</span> has been approved</h6><small class="notification-text">6 hrs ago</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between read-notification cursor-pointer">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar mr-1 m-0"><img src="{{ asset('admin_template/app-assets/images/portrait/small/avatar-s-4.jpg') }}" alt="avatar" height="39" width="39"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">New file</span> has been uploaded</h6><small class="notification-text">4 hrs ago</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between cursor-pointer">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar bg-rgba-danger m-0 mr-1 p-25">
                                                    <div class="avatar-content"><i class="bx bx-detail text-danger"></i></div>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">Finance report</span> has been generated</h6><small class="notification-text">25 hrs ago</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between cursor-pointer">
                                        <div class="media d-flex align-items-center border-0">
                                            <div class="media-left pr-0">
                                                <div class="avatar mr-1 m-0"><img src="{{ asset('admin_template/app-assets/images/portrait/small/avatar-s-16.jpg') }}" alt="avatar" height="39" width="39"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">New customer</span> comment recieved</h6><small class="notification-text">2 days ago</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-50 text-primary justify-content-center" href="javascript:void(0)">Read all notifications</a></li>
                            </ul>
                        </li> --}}
                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#"
                                data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span
                                        class="user-name">{{ Auth::guard('web')->user()->name }}</span><span
                                        class="user-status text-muted">@if (Auth::guard('web')->user()->designation)
                                            {{ Auth::guard('web')->user()->designation->title }}
                                        @endif</span>
                                </div><span><img class="round"
                                        src="@if(Auth::guard('web')->user()->image)
                                        {{ asset('images/profile_image').'/'.Auth::guard('web')->user()->image }}
                                        @else
                                        {{ asset('admin_template/app-assets/images/portrait/small/avatar-s-11.jpg') }}
                                        @endif"
                                        alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right pb-0"><a class="dropdown-item"
                                    href="{{ route('user.edit',Auth::guard('web')->user()->id) }}"><i class="bx bx-user mr-50"></i> Edit Profile</a>
                                    <a class="dropdown-item"
                                    href="{{ route('user.change-password') }}"><i class="bx bx-message mr-50"></i> Change Password</a>
                                <div class="dropdown-divider mb-0"></div><a class="dropdown-item"
                                    href="{{ route('admin.logout') }}"><i class="bx bx-power-off mr-50"></i>
                                    Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                        <div class="brand-logo"><img class="logo"
                                src="{{ asset('admin_template/app-assets/images/logo/logo.png') }}" /></div>
                        <h2 class="brand-text mb-0">IEET</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                            class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                            class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                            data-ticon="bx-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
                data-icon-style="">

                {{-- @if (Auth::guard('web')->user()->can(''))
                    
                @endif --}}
                @canany(['brand.index', 'catalogue.index', 'category.index', 'product.index'])
                    <li class=" navigation-header"><span>Product Section</span>
                    </li>
                @endcanany
               
                @can('brand.index')
                    <li class=" nav-item"><a href="{{ route('brand.index') }}"><i class="bx bxl-slack"></i><span class="menu-title">Brand</span></a>
                    </li>
                @endcan
                @can('catalogue.index')
                    <li class=" nav-item"><a href="{{ route('catalogue.index') }}"><i class="bx bx-building"></i><span class="menu-title">Catalogue</span></a>
                    </li>
                @endcan
                @can('category.index')
                    <li class=" nav-item"><a href="{{ route('category.index') }}"><i class="bx bxs-categories"></i><span class="menu-title">Categories</span></a>
                    </li>
                @endcan
                @can('product.index')
                    <li class=" nav-item"><a href="{{ route('product.index') }}"><i class="bx bx-package"></i><span class="menu-title">Product</span></a>
                    </li>
                @endcan
                @canany(['supplier.index', 'advance_supplier.index', 'payable_supplier.index'])
                    <li class=" navigation-header"><span>Supplier Management</span>
                    </li>
                @endcanany
                
                @can('supplier.index')
                    <li class=" nav-item"><a href="{{ route('supplier.index') }}"><i class="bx bx-user"></i><span class="menu-title">Supplier</span></a>
                    </li>
                @endcan
                @can('advance_supplier.index')
                    <li class=" nav-item"><a href="{{ route('supplier.advance') }}"><i class="bx bx-archive-out"></i><span class="menu-title">Advance Supplier</span></a>
                    </li>
                @endcan
                @can('payable_supplier.index')
                    <li class=" nav-item"><a href="{{ route('supplier.payable') }}"><i class="bx bx-archive-out"></i><span class="menu-title">Payable Supplier</span></a>
                    </li>
                @endcan
                
                
                @canany(['client.index', 'advance_client.index', 'payable_client.index'])
                    <li class=" navigation-header"><span>Client Management</span>
                    </li>
                @endcanany
                
                @can('client.index')
                    <li class=" nav-item"><a href="{{ route('client.index') }}"><i class="bx bx-user"></i><span
                        class="menu-title">Client</span></a>
                    </li>
                @endcan
                @can('advance_client.index')
                    <li class=" nav-item"><a href="{{ route('client.advance') }}"><i class="bx bx-archive-in"></i><span class="menu-title">Advance Client</span></a>
                    </li>
                @endcan
                @can('payable_client.index')
                    <li class=" nav-item"><a href="{{ route('client.payable') }}"><i class="bx bx-archive-in"></i><span class="menu-title">Payable Client</span></a>
                    </li>
                @endcan

                
               

                @canany(['stock.index', 'all_invoice.index', 'purchase_invoice.index', 'sale_invoice.index', 'project_invoice.index'])
                    <li class=" navigation-header"><span>Inventory Management</span>
                    </li>
                @endcanany
                
                @can('stock.index')
                    <li class=" nav-item"><a href="{{ route('stock.index') }}"><i class="bx bx-store-alt">
                        </i><span class="menu-title">Stock</span></a>
                    </li>
                @endcan
                @canany(['all_invoice.index', 'product_return_supplier.index'])
                    <li class=" nav-item"><a href="#"><i class="bx bxs-barcode"></i><span class="menu-title">Invoice</span></a>
                        <ul class='menu-content'>
                            @can('all_invoice.index')
                                <li><a href="{{ route('invoice.index') }}"><i class="bx bx-receipt"></i><span class="menu-item" data-i18n="LivIcons">All Invoice</span></a>
                                </li>
                            @endcan
                            @can('purchase_invoice.index')
                                <li><a href="{{ route('purchase_index') }}"><i class="bx bx-receipt"></i><span class="menu-item" data-i18n="LivIcons">Purchase Invoice</span></a>
                                </li>
                            @endcan
                            @can('sale_invoice.index')
                                <li><a href="{{ route('sell_index') }}"><i class="bx bx-receipt"></i><span class="menu-item" data-i18n="LivIcons">Sale Invoice</span></a>
                                </li>
                            @endcan
                            @can('project_invoice.index')
                                <li><a href="{{ route('project_index') }}"><i class="bx bx-receipt"></i><span class="menu-item" data-i18n="LivIcons">Project Invoice</span></a>
                                </li>
                            @endcan  
                        </ul>
                    </li>
                @endcanany
                @canany(['product_return_client.index', 'all_invoice.index', 'purchase_invoice.index', 'sale_invoice.index', 'project_invoice.index'])
                    <li class=" navigation-header"><span>Damage and Return Product</span>
                    </li>
                @endcanany
                
                @can('product_return_client.index')
                    <li class=" nav-item"><a href="{{ route('client-return-product.index') }}"><i class="bx bx-user">
                        </i><span class="menu-title">Client</span></a>
                    </li>
                @endcan
                @can('product_return_supplier.index')
                    <li class=" nav-item"><a href="{{ route('supplier-return-product.index') }}"><i class="bx bx-user">
                        </i><span class="menu-title">Supplier</span></a>
                    </li>
                @endcan
                
               
                {{-- <li class=" nav-item"><a href="#"><i class="bx bx-envelope"></i><span
                            class="menu-title">Invoice</span></a>
                            <ul class='menu-content'>
                                <li><a href="{{ route('invoice.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item" data-i18n="LivIcons">All Invoice</span></a>
                                </li>
                                <li><a href="{{ route('purchase_index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item" data-i18n="LivIcons">Purchase Invoice</span></a>
                                </li>
                                <li><a href="{{ route('sell_index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item" data-i18n="LivIcons">Sale Invoice</span></a>
                                </li>
                                <li><a href="{{ route('project_index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item" data-i18n="LivIcons">Project Invoice</span></a>
                                </li>
                            </ul>
                </li> --}}

                @canany(['team.index', 'team_member.index', 'project.index', 'estimate_project.index', 'start_project.create', 'machine_project.index', 'expense_project.index', 'payment_project.index'])
                    <li class=" navigation-header"><span>Project Management</span>
                    </li>
                    @canany(['team.index', 'team_member.index'])
                        <li class=" nav-item"><a href="#"><i class="bx bx-group"></i><span class="menu-title">Team Setup</span></a>
                            <ul class='menu-content'>
                                @can('team.index')
                                    <li><a href="{{ route('team.index') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="LivIcons">Team</span></a>
                                    </li>
                                @endcan
                                @can('team_member.index')
                                    <li><a href="{{ route('team-members.index') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="LivIcons">Team Members</span></a>
                                    </li>
                                @endcan
                            
                            
                            </ul>
                        </li>
                    @endcanany
                    @canany(['project.index', 'estimate_project.index', 'start_project.create', 'machine_project.index', 'expense_project.index', 'payment_project.index'])
                        <li class=" nav-item"><a href="#"><i class="bx bxs-buoy"></i><span class="menu-title">Project Management</span></a>
                            <ul class='menu-content'>
                                @can('project.index')
                                    <li><a href="{{ route('project.index') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="LivIcons">Project</span></a>
                                </li>
                                @endcan
                                @can('estimate_project.index')
                                    <li><a href="{{ route('project-estimation.index') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="LivIcons">Estimate Project Cost</span></a>
                                </li>
                                @endcan
                                @can('start_project.create')
                                    <li><a href="{{ route('project.start') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="LivIcons">Project Setup</span></a>
                                </li>
                                @endcan
                                @can('machine_project.index')
                                    <li><a href="{{ route('project-machine.index') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="LivIcons">Machine Setup</span></a>
                                </li>
                                @endcan
                                @can('expense_project.index')
                                    <li><a href="{{ route('project-otherexpense.index') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="LivIcons">Project Other Expense</span></a>
                                </li>
                                @endcan
                                @can('payment_project.index')
                                    <li><a href="{{ route('project-payment.index') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="LivIcons">Project Payment</span></a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany
                @endcanany
               
                @canany(['accounts_group.index', 'chart_of_account.index', 'general_ledger.index'])
        
                    <li class=" navigation-header"><span>Accounts</span></li>
                    
                    @can('accounts_group.index')
                        <li class=" nav-item"><a href="{{ route('accounts.index') }}"><i class="bx bx-list-ul"></i><span class="menu-title">Accounts Groups</span></a>
                        </li>
                    @endcan
                    @can('chart_of_account.index')
                        <li class=" nav-item"><a href="{{ route('chart-of-account.index') }}"><i class="bx bx-book-content"></i><span class="menu-title">Chart of Accounts</span></a>
                        </li>
                    @endcan
                    @can('general_ledger.index')
                        <li class=" nav-item"><a href="{{ route('accounts-ledger.index') }}"><i class="bx bx-book-bookmark"></i><span class="menu-title">Accounts Ledgers</span></a>
                        </li>
                    @endcan
                @endcanany
                
                
                @canany(['salary_sheet.create', 'salary_sheet.index'])
                    <li class=" navigation-header"><span>Payroll</span>
                    </li>
                    @can('salary_sheet.create')
                        <li class=" nav-item"><a href="{{ route('salary.create') }}"><i class="bx bx-list-ul"></i><span class="menu-title">Generate Salary Sheet</span></a>
                        </li>
                    @endcan
                    @can('salary_sheet.index')
                        <li class=" nav-item"><a href="{{ route('salary.index') }}"><i class="bx bx-book-content"></i><span class="menu-title">Salary Sheet</span></a>
                        </li>
                    @endcan
                @endcanany

                @can('cash_flow.index')
                <li class=" navigation-header"><span>Reports</span>
                </li>
                <li class=" nav-item"><a href="{{ route('cash-flow.index') }}"><i class="bx bx-repost"></i><span class="menu-title">Cash-In/Out Statement</span></a>
                </li>
                @endcan

                @canany(['designation.index', 'benefit.index', 'user.index', 'user_role.index'])
                    <li class=" navigation-header"><span>Role Management</span>
                    </li>
                    @can('designation.index')    
                        <li class=" nav-item"><a href="{{ route('designation.index') }}"><i class="bx bx-id-card"></i><span class="menu-title" data-i18n="Colors">Designation</span></a>
                        </li>
                    @endcan
                    @can('benefit.index')
                        <li class=" nav-item"><a href="{{ route('benefits.index') }}"><i class="bx bx-user-plus"></i><span class="menu-title" data-i18n="Colors">Benefits</span></a>
                        </li>
                    @endcan
                    
                    @can('user.index')
                        <li class=" nav-item"><a href="{{ route('user.index') }}"><i class="bx bx-user-circle"></i><span class="menu-title" data-i18n="Colors">Employee</span></a>
                        </li>
                    @endcan
                    @can('user_role.index')
                        <li class=" nav-item"><a href="{{ route('role.index') }}"><i class="bx bx-user-circle"></i><span class="menu-title" data-i18n="Colors">User Role</span></a>
                        </li>
                    @endcan
                @endcanany
                @canany(['unit.index', 'payment_method.index', 'transfer_balance.index'])
                    <li class=" navigation-header"><span>Basic Settings</span>
                    </li>
                    @can('unit.index')
                        <li class=" nav-item"><a href="{{ route('unit.index') }}"><i class="bx bx-grid-alt"></i><span class="menu-title" data-i18n="Colors">Unit Management</span></a>
                        </li>
                    @endcan
                    @canany(['payment_method.index', 'transfer_balance.index'])
                        <li class=" nav-item"><a href="#"><i class="bx bx-wallet"></i><span class="menu-title" data-i18n="Icons">Payment Management</span></a>
                            <ul class="menu-content">
                                @can('payment_method.index')
                                    <li><a href="{{ route('payment-method.index') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">Payment Method</span></a>
                                    </li>
                                @endcan
                                @can('transfer_balance.index')
                                    <li><a href="{{ route('payment-transfer.index') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="boxicons">Transfer Balance</span></a>
                                    </li>
                                @endcan
                                

                                {{-- <li><a href="{{ route('transection-history.index') }}"><i
                                            class="bx bx-right-arrow-alt"></i><span class="menu-item"
                                            data-i18n="boxicons">Balance Transaction History</span></a>
                                </li> --}}
                            </ul>
                        </li>
                    @endcanany
                @endcanany
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

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
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html"
                                    data-toggle="tooltip" data-placement="top" title="Email"><i
                                        class="ficon bx bx-envelope"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html"
                                    data-toggle="tooltip" data-placement="top" title="Chat"><i
                                        class="ficon bx bx-chat"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html"
                                    data-toggle="tooltip" data-placement="top" title="Todo"><i
                                        class="ficon bx bx-check-circle"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calendar.html"
                                    data-toggle="tooltip" data-placement="top" title="Calendar"><i
                                        class="ficon bx bx-calendar-alt"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i
                                        class="ficon bx bx-star warning"></i></a>
                                <div class="bookmark-input search-input">
                                    <div class="bookmark-input-icon"><i class="bx bx-search primary"></i></div>
                                    <input class="form-control input" type="text" placeholder="Explore Frest..."
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
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label"
                                href="#" data-toggle="dropdown"><i
                                    class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i><span
                                    class="badge badge-pill badge-danger badge-up">5</span></a>
                            {{-- <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
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
                            </ul> --}}
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#"
                                data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span
                                        class="user-name">{{ Auth::guard('web')->user()->name }}</span><span
                                        class="user-status text-muted">{{ Auth::guard('web')->user()->designation }}</span>
                                </div><span><img class="round"
                                        src="{{ asset('admin_template/app-assets/images/portrait/small/avatar-s-11.jpg') }}"
                                        alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right pb-0"><a class="dropdown-item"
                                    href=""><i class="bx bx-user mr-50"></i> Edit Profile</a><a
                                    class="dropdown-item" href=""><i class="bx bx-envelope mr-50"></i> My
                                    Inbox</a><a class="dropdown-item" href=""><i
                                        class="bx bx-check-square mr-50"></i> Task</a><a class="dropdown-item"
                                    href=""><i class="bx bx-message mr-50"></i> Chats</a>
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

                <li class=" navigation-header"><span>Product Section</span>
                </li>
                <li class=" nav-item"><a href="{{ route('brand.index') }}"><i class="bx bx-envelope"></i><span
                            class="menu-title">Brand</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('catalogue.index') }}"><i class="bx bx-chat"></i><span
                            class="menu-title">Catalogue</span></a>
                <li class=" nav-item"><a href="{{ route('category.index') }}"><i class="bx bx-chat"></i><span
                            class="menu-title">Categories</span></a>
                <li class=" nav-item"><a href="{{ route('product.index') }}"><i class="bx bx-chat"></i><span
                            class="menu-title">Product</span></a>
                </li>

                <li class=" navigation-header"><span>Supplier Management</span>
                </li>
                <li class=" nav-item"><a href="{{ route('supplier.index') }}"><i class="bx bx-envelope"></i><span
                            class="menu-title">Supplier</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('supplier.advance') }}"><i class="bx bx-envelope"></i><span
                            class="menu-title">Advance Supplier</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('supplier.payable') }}"><i class="bx bx-envelope"></i><span
                            class="menu-title">Payable Supplier</span></a>
                </li>


                <li class=" navigation-header"><span>Inventory Management</span>
                </li>
                <li class=" nav-item"><a href="{{ route('stock.index') }}"><i class="bx bx-envelope">
                    </i><span class="menu-title">Stock</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="bx bx-envelope"></i><span
                            class="menu-title">Invoice</span></a>
                            <ul class='menu-content'>
                                <li><a href="{{ route('invoice.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item" data-i18n="LivIcons">All Invoice</span></a>
                                </li>
                                <li><a href="{{ route('purchase_index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item" data-i18n="LivIcons">Purchase Invoice</span></a>
                                </li>
                                <li><a href="{{ route('sell_index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item" data-i18n="LivIcons">Sell Invoice</span></a>
                                </li>
                                <li><a href="{{ route('project_index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                            class="menu-item" data-i18n="LivIcons">Project Invoice</span></a>
                                </li>
                            </ul>
                </li>

                <li class=" navigation-header"><span>Project Management</span>
                </li>
                <li class=" nav-item"><a href="{{ route('client.index') }}"><i class="bx bx-envelope"></i><span
                            class="menu-title">Client</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="bx bx-envelope"></i><span class="menu-title">Team
                            Setup</span></a>
                    <ul class='menu-content'>
                        <li><a href="{{ route('team.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item" data-i18n="LivIcons">Team</span></a>
                        </li>
                        <li><a href="{{ route('team-members.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item" data-i18n="LivIcons">Team Members</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a href="#"><i class="bx bx-envelope"></i><span
                            class="menu-title">Project Setup</span></a>
                    <ul class='menu-content'>
                        <li><a href="{{ route('project.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item" data-i18n="LivIcons">Project</span></a>
                        </li>
                        <li><a href="{{ route('project-estimation.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item"
                                    data-i18n="LivIcons">Estimate Project Cost</span></a>
                        </li>
                        <li><a href=""><i class="bx bx-right-arrow-alt"></i><span class="menu-item"
                                    data-i18n="LivIcons">Setup</span></a>
                        </li>
                        <li><a href=""><i class="bx bx-right-arrow-alt"></i><span class="menu-item"
                                    data-i18n="LivIcons">Project Expense</span></a>
                        </li>
                    </ul>
                </li>


                <li class=" navigation-header"><span>Accounts</span>
                </li>
                <li class=" nav-item"><a href="{{ route('accounts.index') }}"><i class="bx bx-envelope"></i><span
                            class="menu-title">Accounts Groups</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('chart-of-account.index') }}"><i
                            class="bx bx-envelope"></i><span class="menu-title">Chart of Accounts</span></a>
                </li>
                <li class=" nav-item"><a href=""><i class="bx bx-envelope"></i><span
                            class="menu-title">Accounts Ledgers</span></a>
                </li>

                <li class=" navigation-header"><span>Role Management</span>
                </li>
                <li class=" nav-item"><a href="{{ route('designation.index') }}"><i class="bx bx-droplet"></i><span class="menu-title"
                            data-i18n="Colors">Designation</span></a>
                </li>
                <li class=" nav-item"><a href=""><i class="bx bx-droplet"></i><span class="menu-title"
                            data-i18n="Colors">Users</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="bx bx-bulb"></i><span class="menu-title"
                            data-i18n="Icons">Role & Permission</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('role.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item" data-i18n="LivIcons">User Role</span></a>
                        </li>
                        <li><a href=""><i class="bx bx-right-arrow-alt"></i><span class="menu-item"
                                    data-i18n="boxicons">Permission</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" navigation-header"><span>Basic Settings</span>
                </li>
                <li class=" nav-item"><a href="{{ route('unit.index') }}"><i class="bx bx-droplet"></i><span
                            class="menu-title" data-i18n="Colors">Unit Management</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="bx bx-droplet"></i><span class="menu-title"
                            data-i18n="Icons">Payment Management</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('payment-method.index') }}"><i class="bx bx-right-arrow-alt"></i><span
                                    class="menu-item">Payment Method</span></a>
                        </li>
                        <li><a href="{{ route('payment-transfer.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item"
                                    data-i18n="boxicons">Transfer Balance</span></a>
                        </li>
                        <li><a href="{{ route('transection-history.index') }}"><i
                                    class="bx bx-right-arrow-alt"></i><span class="menu-item"
                                    data-i18n="boxicons">Balance Transaction History</span></a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

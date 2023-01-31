<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-purple">
    <!-- Brand Logo -->
    {{--    <a href="#" class="brand-link"> --}}
    {{--        <img src="{{asset('assets/images/logo/pp-wide-logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
    {{--        <span class="brand-text font-weight-light">AdminLTE 3</span> --}}
    {{--    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/admin2/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{--        <div class="form-inline"> --}}
        {{--            <div class="input-group" data-widget="sidebar-search"> --}}
        {{--                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search"> --}}
        {{--                <div class="input-group-append"> --}}
        {{--                    <button class="btn btn-sidebar"> --}}
        {{--                        <i class="fas fa-search fa-fw"></i> --}}
        {{--                    </button> --}}
        {{--                </div> --}}
        {{--            </div> --}}
        {{--        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->


                <li class="nav-item">
                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-user-plus" aria-hidden="true"></i>
                        <p>
                            Client
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('client.create') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Client Entry
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('client.lists') }}" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    Client Lists
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-money-check-alt" aria-hidden="true"></i>
                        <p>
                            Bill
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('campaign.create') }}" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Bill Entry
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('campaign.lists') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    All Billings
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>










                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <p>
                            Reports
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('billing.report.index') }}" class="nav-link">
                                <i class="fa fa-file" aria-hidden="true"></i>
                                <p>Billing reports</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('billing.report.index') }}" class="nav-link">
                                <i class="fa fa-file" aria-hidden="true"></i>
                                <p>Due Bills</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('billing.report.index') }}" class="nav-link">
                                <i class="fa fa-file" aria-hidden="true"></i>
                                <p>Paid Bills</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-trash-alt"></i>
                        <p>
                            Trash
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('trash.campaigns') }}" class="nav-link">
                                <i class="fas fa-th nav-icon"></i>
                                <p>Deleted Campaigns</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('billing.report.index') }}" class="nav-link">
                                <i class="fas fa-th nav-icon"></i>
                                <p>Reports</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

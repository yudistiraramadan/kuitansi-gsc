<div>
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar" data-simplebar>
            <div class="d-flex mb-4 align-items-center justify-content-between">
                <a href="index.html" class="text-nowrap logo-img ms-0 ms-md-1">
                    <img src="{{ asset('template/src/assets/images/logos/dark-logo.svg') }}" width="180" alt="">
                </a>
                <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-8"></i>
                </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                @if (Auth::user()->role_id == 1)
                    <ul id="sidebarnav" class="mb-4 pb-2">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link primary-hover-bg"
                                href="{{ route('dashboard.manajemen') }}" aria-expanded="false">
                                <span class="aside-icon p-2 bg-light-primary rounded-3">
                                    <i class="ti ti-layout-dashboard fs-7 text-primary"></i>
                                </span>
                                <span class="hide-menu ms-2 ps-1">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
                            <span class="hide-menu">UI Componenst</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link warning-hover-bg" href="./ui-buttons.html"
                                aria-expanded="false">
                                <span class="aside-icon p-2 bg-light-warning rounded-3">
                                    <i class="ti ti-article fs-7 text-warning"></i>
                                </span>
                                <span class="hide-menu ms-2 ps-1">Kuitansi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link success-hover-bg" href="./ui-alerts.html"
                                aria-expanded="false">
                                <span class="aside-icon p-2 bg-light-success rounded-3">
                                    <i class="ti ti-alert-circle fs-7 text-success"></i>
                                </span>
                                <span class="hide-menu ms-2 ps-1">User</span>
                            </a>
                        </li>
                    </ul>
                @endif

                @if (Auth::user()->role_id == 2)
                    <ul id="sidebarnav" class="mb-4 pb-2">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link primary-hover-bg" href="#" aria-expanded="false">
                                <span class="aside-icon p-2 bg-light-primary rounded-3">
                                    <i class="ti ti-layout-dashboard fs-7 text-primary"></i>
                                </span>
                                <span class="hide-menu ms-2 ps-1">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
                            <span class="hide-menu">UI Componenst</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link warning-hover-bg" href="./ui-buttons.html"
                                aria-expanded="false">
                                <span class="aside-icon p-2 bg-light-warning rounded-3">
                                    <i class="ti ti-article fs-7 text-warning"></i>
                                </span>
                                <span class="hide-menu ms-2 ps-1">Kuitansi</span>
                            </a>
                        </li>
                    </ul>
                @endif

            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
</div>

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
                <ul id="sidebarnav" class="mb-4 pb-2">
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
                        <span class="hide-menu">Home</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link primary-hover-bg" href="./index.html" aria-expanded="false">
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
                            <span class="hide-menu ms-2 ps-1">Buttons</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link danger-hover-bg" href="./ui-alerts.html"
                            aria-expanded="false">
                            <span class="aside-icon p-2 bg-light-danger rounded-3">
                                <i class="ti ti-alert-circle fs-7 text-danger"></i>
                            </span>
                            <span class="hide-menu ms-2 ps-1">Alerts</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link success-hover-bg" href="./ui-card.html"
                            aria-expanded="false">
                            <span class="aside-icon p-2 bg-light-success rounded-3">
                                <i class="ti ti-cards fs-7 text-success"></i>
                            </span>
                            <span class="hide-menu ms-2 ps-1">Card</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link primary-hover-bg" href="./ui-forms.html"
                            aria-expanded="false">
                            <span class="aside-icon p-2 bg-light-primary rounded-3">
                                <i class="ti ti-file-description fs-7 text-primary"></i>
                            </span>
                            <span class="hide-menu ms-2 ps-1">Forms</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link indigo-hover-bg" href="./ui-typography.html"
                            aria-expanded="false">
                            <span class="aside-icon p-2 bg-light-indigo rounded-3">
                                <i class="ti ti-typography fs-7 text-indigo"></i>
                            </span>
                            <span class="hide-menu ms-2 ps-1">Typography</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
                        <span class="hide-menu">Auth</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link warning-hover-bg" href="./authentication-login.html"
                            aria-expanded="false">
                            <span class="aside-icon p-2 bg-light-warning rounded-3">
                                <i class="ti ti-login fs-7 text-warning"></i>
                            </span>
                            <span class="hide-menu ms-2 ps-1">Login</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link danger-hover-bg" href="./authentication-register.html"
                            aria-expanded="false">
                            <span class="aside-icon p-2 bg-light-danger rounded-3">
                                <i class="ti ti-user-plus fs-7 text-danger"></i>
                            </span>
                            <span class="hide-menu ms-2 ps-1">Register</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
                        <span class="hide-menu">Extra</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link success-hover-bg" href="./icon-tabler.html"
                            aria-expanded="false">
                            <span class="aside-icon p-2 bg-light-success rounded-3">
                                <i class="ti ti-mood-happy fs-7 text-success"></i>
                            </span>
                            <span class="hide-menu ms-2 ps-1">Icons</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link primary-hover-bg" href="./sample-page.html"
                            aria-expanded="false">
                            <span class="aside-icon p-2 bg-light-primary rounded-3">
                                <i class="ti ti-aperture fs-7 text-primary"></i>
                            </span>
                            <span class="hide-menu ms-2 ps-1">Sample Page</span>
                        </a>
                    </li>
                </ul>
                <div class="pb-3 options text-nowrap">
                    <div class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
                        <span class="hide-menu">More options</span>
                    </div>

                    <ul class="sidebar-list">
                        <li class="sidebar-list-item">
                            <i class="ti ti-circle text-primary fs-4"></i>
                            <span class="hide-menu ms-2">Applications</span>
                        </li>
                        <li class="sidebar-list-item">
                            <i class="ti ti-circle text-danger fs-4"></i>
                            <span class="hide-menu ms-2">Form Options</span>
                        </li>
                        <li class="sidebar-list-item">
                            <i class="ti ti-circle text-warning fs-4"></i>
                            <span class="hide-menu ms-2">Table Variations</span>
                        </li>
                        <li class="sidebar-list-item">
                            <i class="ti ti-circle text-success fs-4"></i>
                            <span class="hide-menu ms-2">Charts Selection</span>
                        </li>
                        <li class="sidebar-list-item">
                            <i class="ti ti-circle text-indigo fs-4"></i>
                            <span class="hide-menu ms-2">Widgets</span>
                        </li>
                    </ul>
                </div>

                <div class="mt-5 blocks-card sidebar-ad">
                    <div class="card bg-light-primary">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset('template/src/assets/images/backgrounds/education-blocks.png') }}"
                                    width="136" height="136" class="mt-n9" alt="" />

                                <h5>Are you<br /> satisfied ?</h5>

                                <div class="mt-4">
                                    <a href="" target="_blank" class="btn btn-primary buynow-link w-100 px-2">
                                        Buy Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
</div>

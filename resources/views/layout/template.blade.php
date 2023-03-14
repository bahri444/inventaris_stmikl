<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{$title ?? ''}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico">

    <!-- third party css -->
    <link href="{{ asset('assets') }}/css/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->


    <!-- third party css -->
    <link href="{{ asset('assets') }}/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets') }}/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets') }}/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets') }}/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets') }}/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="{{ asset('assets') }}/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="{{ asset('') }}assets/media/logo.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="{{ asset('') }}assets/images/logo_sm.png" alt="" height="16">
                </span>
            </a>

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="{{ asset('') }}assets/images/logo-dark.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="{{ asset('') }}assets/images/logo_sm_dark.png" alt="" height="16">
                </span>
            </a>

            <div class="h-100" id="leftside-menu-container" data-simplebar="">

                <!--- Sidebar menu -->
                <ul class="side-nav">

                    <li class="side-nav-title side-nav-item">Menu</li>

                    <li class="side-nav-item">
                        <a href="/tanah" class="side-nav-link">
                            <i class="uil-building"></i>
                            <span>Tanah & bangunan</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="/ruang" class="side-nav-link">
                            <i class="uil-home"></i>
                            <span>Ruang</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="/sarana" class="side-nav-link">
                            <i class="uil-wrench"></i>
                            <span>Sarana</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="/sarana" class="side-nav-link">
                            <i class="uil-coins"></i>
                            <span>Sarana ruangan</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="/sarana" class="side-nav-link">
                            <i class="uil-calendar-alt"></i>
                            <span>Periode</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="/user" class="side-nav-link">
                            <i class="uil-users-alt"></i>
                            <span>Akuns</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="/logout" class="side-nav-link">
                            <i class="uil-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                    <!-- <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-store"></i>
                            <span>Pengabdian</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEcommerce">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="apps-ecommerce-products.html">Proposal</a>
                                </li>
                                <li>
                                    <a href="apps-ecommerce-orders.html">Laporan</a>
                                </li>
                                <li>
                                    <a href="apps-ecommerce-products-details.html">Anggota</a>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                </ul>

                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-menu float-end mb-0">

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="{{ asset('') }}assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                </span>
                                <span>
                                    <span class="account-user-name">Soeng Souy</span>
                                    <span class="account-position">Founder</span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout me-1"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>

                    </ul>
                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">
                    @yield('content')

                </div>
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Inventaris STMIK-Lombok | inventarisstmiklombok.ac.id
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->
    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <!-- bundle -->
    <script src="{{ asset('') }}assets/js/vendor.min.js"></script>
    <script src="{{ asset('') }}assets/js/app.min.js"></script>

    <!-- third party js -->
    <script src="{{ asset('') }}assets/js/apexcharts.min.js"></script>
    <script src="{{ asset('') }}assets/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{ asset('') }}assets/js/jquery-jvectormap-world-mill-en.js"></script>

    <script src="{{asset('assets')}}/js/vendor/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/dataTables.bootstrap5.js"></script>
    <script src="{{asset('assets')}}/js/vendor/dataTables.responsive.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/responsive.bootstrap5.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/dataTables.buttons.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/buttons.bootstrap5.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/buttons.html5.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/buttons.flash.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/buttons.print.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/dataTables.keyTable.min.js"></script>
    <script src="{{asset('assets')}}/js/vendor/dataTables.select.min.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <!-- <script src="{{ asset('assets') }}/js/dashboard.js"></script> -->
    <script src="{{asset('assets')}}//js/pages/demo.datatable-init.js"></script>
    <!-- end demo js-->

</body>

</html>
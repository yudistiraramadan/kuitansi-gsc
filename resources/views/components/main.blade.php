<!doctype html>
<html lang="en">

<head>
    {{-- Header --}}
    <x-header></x-header>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <x-sidebar></x-sidebar>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <x-navbar></x-navbar>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Sample Page</h5>
                        <p class="mb-0">This is a sample page </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('template/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('template/src/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('template/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('template/src/assets/js/dashboard.js') }}"></script>
</body>

</html>

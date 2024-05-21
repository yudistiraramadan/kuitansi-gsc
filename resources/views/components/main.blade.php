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
                        {{-- <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5> --}}
                        <x-title>{{ $title }}</x-title>
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-script></x-script>
</body>

</html>

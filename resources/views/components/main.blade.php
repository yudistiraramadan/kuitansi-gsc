<!doctype html>
<html lang="en">

{{-- Header --}}
<x-header>{{ $title }}</x-header>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar -->
        <x-sidebar></x-sidebar>

        <!--  Main wrapper -->
        <div class="body-wrapper">

            <!--  Header -->
            <x-navbar></x-navbar>

            <div class="container-fluid">
                {{-- <div class="card"> --}}
                {{-- <div class="card-body"> --}}
                <x-title>{{ $title }}</x-title>
                {{ $slot }}
                {{-- </div> --}}
                {{-- </div>  --}}
            </div>

        </div>
    </div>
    <x-script></x-script>
</body>

</html>

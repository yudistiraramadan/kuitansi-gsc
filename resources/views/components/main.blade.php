<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Header --}}
    <x-header></x-header>
</head>

<body>
    <div class="wrapper">
        {{-- Sidebar --}}
        <x-sidebar></x-sidebar>

        <div class="main">
            {{-- Navbar --}}
            <x-navbar></x-navbar>

            <main class="content">
                <div class="container-fluid p-0">

                    {{-- Title --}}
                    <x-title>{{ $title }}</x-title>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            {{-- Footer --}}
            <x-footer></x-footer>
        </div>
    </div>

    {{-- Script --}}
    <x-script></x-script>

</body>

</html>

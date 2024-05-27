<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h1>Yudistira</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h1>Ramadan</h1>
                </div>
            </div>
        </div>
    </div>
</x-main>
<script src="{{ asset('asset_offline/js/sweealert2.js') }}"></script>
@if (Session::has('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: '{{ Session::get('success') }}'
        });
    </script>
@endif

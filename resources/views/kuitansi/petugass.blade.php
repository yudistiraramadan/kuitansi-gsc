<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div>
        <p>Note : Berikut daftar kuitansi yang telah dibuat oleh user</p>
    </div>
    <a href="{{ route('create.kuitansi') }}">
        <button class="btn btn-primary mb-2">Tambah</button>
    </a>
    <div class="table-responsive">
        <table class="table table-hover table-bordered" id="tb-kuitansi">
            <thead>
                <tr>
                    <th scope="col" style="text-align:left;">No.</th>
                    <th scope="col">Terima Dari</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Tanggal</th>
                    <th style="text-align: center;" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp

                @foreach ($kuitansis as $kuitansi)
                    <tr>
                        <td style="text-align: left;">{{ $no++ }}.</td>
                        <td>{{ $kuitansi->donatur }}</td>
                        <td>Rp. {{ number_format($kuitansi->nominal, 0, ',', '.') }}</td>
                        <td>{{ $kuitansi->keperluan }}</td>
                        <td>{{ \Carbon\Carbon::parse($kuitansi->tanggal)->locale('id')->isoFormat('D MMMM Y') }}
                        </td>
                        <td style="text-align: center;"><a href="#" class="btn btn-sm btn-danger">Print
                                Kuitansi</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-main>

<script>
    let table = new DataTable('#tb-kuitansi');
</script>

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

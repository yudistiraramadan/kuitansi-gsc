<x-main>
    {{-- <x-slot:title>{{ $title }}</x-slot:title> --}}
    <div>
        <h1 style="font-family:'Nunito'; font-weight:700; color:#222E3C; font-size:24px;" class="h3 mb-3">
            Daftar Kuitansi
        </h1>
    </div>

    <br>

    <a href="/tambah-kuitansi">
        <div class="btn btn-primary" style="margin-bottom: 10px;">Tambah data</div>
    </a>
    &nbsp;
    <a href="#">
        <div class="btn btn-success" style="margin-bottom: 10px;">Export Excel</div>
    </a>


    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="tb-kuitansi">
            <thead>
                <tr>
                    <th scope="col" style="text-align:left;">No.</th>
                    <th scope="col">Terima Dari</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Pembuat</th>
                    <th scope="col">Tanggal</th>
                    <th style="text-align: center;" style="width:10%" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp

                @foreach ($kuitansis as $kuitansi)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $kuitansi->donatur }}</td>
                        <td>Rp. {{ number_format($kuitansi->nominal, 0, ',', '.') }}</td>
                        <td>{{ $kuitansi->keperluan }}</td>
                        <td>
                            <ul>
                                @foreach ($kuitansi->users as $user)
                                    <li>{{ $user->nama }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($kuitansi->tanggal)->locale('id')->isoFormat('D MMMM Y') }}
                        </td>
                        <td>
                            <button class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-main>

<script>
    // $(document).ready(function() {
    //     let table = $('#tb-kuitansi').DataTable({});
    // });
    let table = new DataTable('#tb-kuitansi');
</script>

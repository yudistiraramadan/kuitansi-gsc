<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export Kuitansi</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Donatur</th>
                <th>Guna Keperluan</th>
                <th>Nominal</th>
                <th>Terbilang</th>
                <th>Jenis Donasi</th>
                <th>Metode Pembayaran</th>
                <th>Tanggal Pembuatan</th>
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
                    <td>{{ $kuitansi->keperluan }}</td>
                    <td>{{ $kuitansi->nominal }}</td>
                    <td>{{ $kuitansi->terbilang }}</td>
                    <td>{{ $kuitansi->jenis_donasi }}</td>
                    <td>{{ $kuitansi->pembayaran }}</td>
                    <td>{{ \Carbon\Carbon::parse($kuitansi->tanggal)->locale('id')->isoFormat('D MMMM Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>

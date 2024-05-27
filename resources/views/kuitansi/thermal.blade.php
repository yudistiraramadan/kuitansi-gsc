<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 20px;
            /* Perbesar font size */
            width: 116mm;
            /* Perbesar lebar */
            margin: 0;
            padding: 0;
        }

        .kuitansi {
            width: 100%;
        }

        .header,
        .footer {
            text-align: center;
        }

        .content {
            margin: 20px 0;
            /* Perbesar margin */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 10px;
            /* Perbesar padding */
            text-align: left;
        }

        .total {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="kuitansi">
        <div class="header">
            <h2>LAZ GERAK SEDEKAH CILACAP</h2>
            <p>Jalan Sulawesi, Perum Puri Tanjung Intan No.B2
                Karang Lor, Gunungsimping, Cilacap Tengah 53224</p>
            <p>No Telp: 085228409840</p>
        </div>
        <div class="content">
            <p><strong>Nomor Kuitansi:</strong> {{ $kuitansi->id }}</p>
            <p><strong>Nama Donatur:</strong> {{ $kuitansi->donatur }}</p>
            <p><strong>Nominal:</strong> Rp {{ number_format($kuitansi->nominal, 2, ',', '.') }}</p>
            <p><strong>Keperluan:</strong> {{ $kuitansi->keperluan }}</p>
            <p><strong>Ditambahkan oleh:</strong> A N O M A L I</p>
        </div>
        <div class="footer">
            <p>Thxxx for your donate bruhh :)</p>
        </div>
    </div>
</body>

</html>

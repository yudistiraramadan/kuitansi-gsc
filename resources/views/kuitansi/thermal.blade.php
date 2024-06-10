<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            width: 58mm;
            margin: 0;
            padding: 0;
        }

        .kuitansi {
            width: 100%;
            margin: 0 auto;
            /* Untuk memusatkan konten */
            padding: 5px 0;
            /* Tambahkan padding atas dan bawah */
        }

        .header,
        .footer {
            text-align: center;
        }

        .content {
            margin: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 5px;
            text-align: left;
        }

        .total {
            font-weight: bold;
        }

        img {
            max-width: 50px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="kuitansi">
        <div class="header">
            <img src="https://via.placeholder.com/50" alt="Logo">
            <h2 style="font-size: 12px;">LAZ GERAK SEDEKAH CILACAP</h2>
            <p style="font-size: 10px;">Jalan Sulawesi, Perum Puri Tanjung Intan No.B2<br>Karang Lor, Gunungsimping,
                Cilacap Tengah 53224</p>
        </div>
        <div class="content">
            <p><strong>Nama Donatur:</strong> {{ $kuitansi->nama }}</p>
            <p><strong>Nominal:</strong> Rp {{ number_format($kuitansi->nominal, 0, ',', '.') }}</p>
            <p><strong>Terbilang:</strong> {{ $kuitansi->terbilang }}</p>
            <p><strong>Keperluan:</strong> {{ $kuitansi->keperluan }}</p>
            <p><strong>Ditarik oleh:</strong> {{ Auth::user()->nama }}</p>
            <p><strong>Tanggal:</strong>
                {{ \Carbon\Carbon::parse($kuitansi->created_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}</p>
        </div>
        <div class="footer">
            <p style="font-size: 10px;">Kami ucapkan Jazakumullah Khairan Katsiran, semoga Allah membalas segala amal
                baik saudara/i dengan amal jariyah. Aminn..</p>
        </div>
    </div>
</body>

</html>

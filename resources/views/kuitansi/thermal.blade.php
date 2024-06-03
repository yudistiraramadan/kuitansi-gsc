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
            {{-- <img src="{{ asset('asset_offline/img/gsc.png') }}"> --}}
            <h2 style="text-align: center;">LAZ GERAK SEDEKAH CILACAP</h2>
            <p style="text-align: center;">Jalan Sulawesi, Perum Puri Tanjung Intan No.B2
                Karang Lor, Gunungsimping, Cilacap Tengah 53224</p>
        </div>
        <br>
        <div class="content">
            <p><strong>Nama Donatur:</strong> {{ $kuitansi->donatur }}</p>
            <p><strong>Nominal:</strong> Rp. {{ number_format($kuitansi->nominal, 0, ',', '.') }}</p>
            <p><strong>Terbilang:</strong> {{ $kuitansi->terbilang }}</p>
            <p><strong>Keperluan:</strong> {{ $kuitansi->keperluan }}</p>
            <p><strong>Ditarik oleh:</strong> {{ Auth::user()->nama }}</p>
            <p><strong>Tanggal:</strong>
                {{ \Carbon\Carbon::parse($kuitansi->tanggal)->locale('id')->isoFormat('dddd, D MMMM Y') }}
            </p>
        </div>
        <br>
        <div class="footer">
            <p style="text-align: center;">Kami ucapkan Jazakumullah Khairan Katsiran, semoga Allah membalas segala amal
                baik saudara/i dengan amal
                jariyah Aminn..</p>
        </div>
    </div>
</body>

</html>

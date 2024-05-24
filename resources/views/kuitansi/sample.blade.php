<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kuitansi</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
        }

        .container {
            max-width: 100%;
            /* Sesuaikan dengan ukuran layar */
            height: auto;
            margin: auto;
            padding: 1cm;
            border: 1px solid #ccc;
            background-color: #fff;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <td width="40px"><img src="{{ asset('img/gsc/gsc.png') }}" width="50px" /></td>
                    <td colspan="1" width="100px" style="font-size:14px;">Gerak Sedekah Cilacap</td>
                    <td colspan="2"
                        style="text-align: center; font-size: 22px; font-family:Arial, Helvetica, sans-serif; font-weight:700; letter-spacing:10px">
                        KUITANSI</td>
                    <td width="33%" style="font-size:18px; font-weight:700; text-align:center;">No.
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5">
                        <hr />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Bismillahirahmanirrahim,</td>
                    <td></td>
                    <td></td>
                    <td style="font-size:14px; text-align:right">Jalan Sulawesi, Perum Puri Tanjung Intan No.B2
                        Karang Lor, Gunungsimping, Cilacap Tengah 53224</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label>Telah diterima dari</label>
                    </td>
                    <td width="5%" style="text-align: center">:</td>
                    <td colspan="2">Sigit Rendang</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label>Keperluan</label>
                    </td>
                    <td width="5%" style="text-align: center">:</td>
                    <td colspan="2">Pembangunan Rumah Sholeh</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label>Nominal</label>
                    </td>
                    <td width="5%" style="text-align: center">:</td>
                    <td colspan="2">Rp. 5.000.000</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label>Terbilang</label>
                    </td>
                    <td width="5%" style="text-align: center">:</td>
                    <td colspan="2">LIMA JUTA RUPIAH</td>
                </tr>
                <tr>
                    <td colspan="5">
                        <input type="checkbox">
                        <label>Tunai</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox">
                        <label>Transfer</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox">
                        <label>Lainnya</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="checkbox">
                        <label>Zakat &nbsp;</label>
                    </td>
                    <td colspan="2">
                        <input type="checkbox">
                        <label>Wakaf &nbsp;</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="checkbox">
                        <label>Sedekah &nbsp;</label>
                    </td>
                    <td colspan="2">
                        <input type="checkbox">
                        <label>Kotak Infaq &nbsp;</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="checkbox">
                        <label>Tabung Kebaikan &nbsp;</label>
                    </td>
                    <td colspan="2">
                        <input type="checkbox">
                        <label>Donasi Kemanusiaan &nbsp;</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <hr />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        Cilacap, 07 Mei 2024
                    </td>
                    <td colspan="2" style="text-align: center;">Donatur</td>
                    <td style="text-align: center;">Bendahara</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2" style="text-align: center">
                        {{-- <img src="{{ asset('img/gsc/ttd-bendahara.png') }}" width="130px" /> --}}
                    </td>
                    <td colspan="1" style="text-align: center; position: relative;">
                        <img src="{{ asset('img/gsc/gsc-scann.png') }}" width="130px"
                            style="position: absolute; top:20px; left: 20px; z-index: 0;">
                        <img src="{{ asset('img/gsc/ttd-bendahara.png') }}" width="130px" style="z-index: 1;" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2" style="text-align: center;">(Sigit Rendang)
                    </td>
                    <td colspan="1" style="text-align: center;">(Kholifatun
                        Mualfiyah)</td>
                </tr>
                <tr>
                    <td colspan="5">
                        <hr />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>

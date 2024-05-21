<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

    <script>
        var huruf = [
            '',
            'Satu',
            'Dua',
            'Tiga',
            'Empat',
            'Lima',
            'Enam',
            'Tujuh',
            'Delapan',
            'Sembilan',
            'Sepuluh',
            'Sebelas',
        ];

        // Fungsi untuk mengonversi angka ke terbilang (bahasa Indonesia)
        function convertToWords(nilai) {
            var penyimpanan = '';
            if (nilai < 12) {
                penyimpanan = ' ' + huruf[nilai];
            } else if (nilai < 20) {
                penyimpanan = convertToWords(Math.floor(nilai - 10)) + ' Belas ';
            } else if (nilai < 100) {
                var bagi = Math.floor(nilai / 10);
                penyimpanan = convertToWords(bagi) + ' Puluh ' + convertToWords(nilai % 10);
            } else if (nilai < 200) {
                penyimpanan = ' Seratus ' + convertToWords(nilai - 100);
            } else if (nilai < 1000) {
                var bagi = Math.floor(nilai / 100);
                penyimpanan = convertToWords(bagi) + ' Ratus ' + convertToWords(nilai % 100);
            } else if (nilai < 2000) {
                penyimpanan = ' Seribu ' + convertToWords(nilai - 1000);
            } else if (nilai < 1000000) {
                var bagi = Math.floor(nilai / 1000);
                penyimpanan = convertToWords(bagi) + ' Ribu ' + convertToWords(nilai % 1000);
            } else if (nilai < 1000000000) {
                var bagi = Math.floor(nilai / 1000000);
                penyimpanan = convertToWords(bagi) + ' Juta ' + convertToWords(nilai % 1000000);
            } else if (nilai < 1000000000000) {
                var bagi = Math.floor(nilai / 1000000000);
                penyimpanan = convertToWords(bagi) + ' Miliar ' + convertToWords(nilai % 1000000000);
            } else if (nilai < 1000000000000000) {
                var bagi = Math.floor(nilai / 1000000000000);
                penyimpanan = convertToWords(bagi) + ' Triliun ' + convertToWords(nilai % 1000000000000);
            }
            return penyimpanan.trim();
        }

        // Fungsi untuk mengonversi angka menjadi terbilang dan menempatkannya pada input 'terbilang'
        function konversiTerbilang(input) {
            // Menghapus titik sebelum melakukan format
            var number = input.value.replace(/\./g, '');

            // Menghapus titik jika ada lebih dari satu
            number = number.replace(/\.(?=.*\.)/g, '');

            // Hapus semua karakter non-angka
            number = number.replace(/\D/g, '');

            // Format angka dengan titik sebagai pemisah ribuan
            var formatted = number.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            input.value = formatted;

            // Konversi angka ke terbilang
            var angka = parseInt(number, 10);
            var terbilang = convertToWords(angka);
            document.getElementById("terbilang").value = terbilang.toUpperCase() + ' RUPIAH';
        }
    </script>

    <form action="{{ route('store.kuitansi') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="donatur" class="form-label">Nama Donatur</label>
                    <input type="text" class="form-control" id="donatur" name="donatur" value="{{ old('donatur') }}">
                    <div id="donatur" class="form-text">Terima Dari</div>
                    @error('donatur')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="keperluan" class="form-label">Guna Keperluan</label>
                    <input type="text" class="form-control" id="keperluan" name="keperluan"
                        value="{{ old('keperluan') }}">
                    @error('keperluan')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="nominal" class="form-label">Nominal</label>
                    <input type="text" class="form-control" id="nominal" name="nominal"
                        onkeyup="konversiTerbilang(this)" value="{{ old('nominal') }}">
                    @error('nominal')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="terbilang" class="form-label">Terbilang</label>
                    <input type="text" class="form-control" id="terbilang" name="terbilang" readonly
                        value="{{ old('terbilang') }}">
                    @error('terbilang')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-lg-4">
                <label for="jenis_donasi" class="form-label">Jenis Donasi</label>
                <select class="form-select" name="jenis_donasi" id="jenis_donasi">
                    {{-- <option selected>Jenis Kuitansi</option> --}}
                    <option value="Zakat">Zakat</option>
                    <option value="Tabung Kebaikan">Tabung Kebaikan</option>
                    <option value="Kotak Infaq">Kotak Infaq</option>
                    <option value="Wakaf">Wakaf</option>
                    <option value="Sedekah">Sedekah</option>
                    <option value="Donasi Kemanusiaan">Donasi Kemanusiaan</option>
                </select>
                @error('jenis_donasi')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-lg-4">
                <label for="pembayaran" class="form-label">Metode Pembayaran</label>
                <select class="form-select" name="pembayaran" id="pembayaran">
                    {{-- <option selected>Metode Pembayaran</option> --}}
                    <option value="Tunai">Tunai</option>
                    <option value="Transfer">Transfer</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                @error('pembayaran')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-lg-4">
                <label for="tanggal" class="form-label">Tanggal Pembuatan</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}">
                @error('tanggal')
                    <div class="text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <br>
        {{-- <button type="reset" class="btn btn-md btn-warning">Reset</button> --}}
        <a href="{{ route('daftar.kuitansi') }}">
            <button type="button" class="btn btn-warning">Kembali</button>
        </a>&nbsp;
        <button type="submit" class="btn btn-md btn-success me-3">Simpan</button>
    </form>
</x-main>

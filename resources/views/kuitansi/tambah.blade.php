<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>
    <script src="{{ asset('asset_offline/js/terbilang.js') }}"></script>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('store.kuitansi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="donatur" class="form-label">Cari Donatur:</label>
                            <input type="text" class="form-control" id="donatur" name="donatur" autocomplete="off">
                            <div id="donaturList" class="dropdown-menu"></div>
                            <p id="notFound" style="display:none; color: red;">Donatur tidak ditemukan</p>
                        </div>
                        <input type="hidden" class="form-control" name="donatur_id" id="donatur_id">
                    </div>
                </div>
                <div class="row">
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
                    <div class="col-lg-6">
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
                        <input type="date" name="tanggal" id="tanggal" class="form-control"
                            value="{{ old('tanggal') }}">
                        @error('tanggal')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <br>
                @if (Auth::user()->role_id == 1)
                    <a href="{{ route('daftar.kuitansi') }}">
                        <button type="button" class="btn btn-warning text-white">Kembali</button>
                    </a>&nbsp;
                @endif
                @if (Auth::user()->role_id == 2)
                    <a href="{{ route('kuitansi.petugas') }}">
                        <button type="button" class="btn btn-warning text-white">Kembali</button>
                    </a>&nbsp;
                @endif

                <button type="submit" class="btn btn-md btn-success me-3">Simpan</button>
            </form>
        </div>
    </div>

</x-main>
<script>
    $(document).ready(function() {
        $('#donatur').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
                url: "{{ route('search-donatur.kuitansi') }}",
                type: "GET",
                data: {
                    'query': query
                },
                success: function(data) {
                    $('#donaturList').empty().show();
                    $('#notFound').hide();
                    if (data.length > 0) {
                        $.each(data, function(key, value) {
                            $('#donaturList').append(
                                '<a class="dropdown-item" href="#" data-id="' +
                                value.id + '">' + value.nama + '</a>');
                        });
                    } else {
                        $('#donaturList').hide();
                        $('#notFound').show();
                    }
                }
            });
        });

        $(document).on('click', '.dropdown-item', function() {
            var donaturId = $(this).data('id');
            var donaturName = $(this).text();
            $('#donatur_id').val(donaturId);
            $('#donatur').val(donaturName);
            $('#donaturList').hide();
        });
    });
</script>

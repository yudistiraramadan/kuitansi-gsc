<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('store.donatur') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ old('nama') }}">
                            @error('nama')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label">No Hp / WhatsApp <b>Wajib aktif!</b></label>
                            <input type="text" min="0"
                                onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control"
                                id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
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
                            <label for="alamat">Alamat Lengkap</label>
                            <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label for="" class="form-label">Jenis Kelamin :</label>
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="laki-laki"
                                    value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'checked' : '' }}>
                                <label class="form-check-label" for="laki-laki">
                                    Laki-laki
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="perempuan"
                                    value="Perempuan" {{ old('gender') == 'Perempuan' ? 'checked' : '' }}>
                                <label class="form-check-label" for="perempuan">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <select class="form-select" name="kecamatan" id="kecamatan">
                            {{-- <option selected>Jenis Kuitansi</option> --}}
                            <option value="Adipala">Adipala</option>
                            <option value="Bantarsari">Bantarsari</option>
                            <option value="Binangun">Binangun</option>
                            <option value="Cilacap Selatan">Cilacap Selatan</option>
                            <option value="Cilacap Tengah">Cilacap Tengah</option>
                            <option value="Cilacap Utara">Cilacap Utara</option>
                            <option value="Cimanggu">Cimanggu</option>
                            <option value="Cipari">Cipari</option>
                            <option value="Dayeuhluhur">Dayeuhluhur</option>
                            <option value="Gandrungmangu">Gandrungmangu</option>
                            <option value="Jeruklegi">Jeruklegi</option>
                            <option value="Kampung Laut">Kampung Laut</option>
                            <option value="Karangpucung">Karangpucung</option>
                            <option value="Kawunganten">Kawunganten</option>
                            <option value="Kedungreja">Kedungreja</option>
                            <option value="Kesugihan">Kesugihan</option>
                            <option value="Kroya">Kroya</option>
                            <option value="Majenang">Majenang</option>
                            <option value="Maos">Maos</option>
                            <option value="Nusawungu">Nusawungu</option>
                            <option value="Patimuan">Patimuan</option>
                            <option value="Sampang">Sampang</option>
                            <option value="Sidareja">Sidareja</option>
                            <option value="Wanareja">Wanareja</option>
                        </select>
                        @error('kecamatan')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <br>
                <a href="{{ route('daftar.donatur') }}">
                    <button type="button" class="btn btn-warning text-white">Kembali</button>
                </a>&nbsp;
                <button type="submit" class="btn btn-md btn-success me-3">Simpan</button>
            </form>
        </div>
    </div>
</x-main>

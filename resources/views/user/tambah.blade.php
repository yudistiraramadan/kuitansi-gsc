<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

    <form action="{{ route('store.user') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="{{ old('username') }}">
                    @error('username')
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
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        value="{{ old('password') }}">
                    @error('password')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
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
                    <label for="phone" class="form-label">No Hp / WhatsApp</label>
                    <input type="text" min="0" onkeypress="return event.charCode >= 48 && event.charCode <=57"
                        class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="foto" class="form-label">Upload foto <b>*jika ada</b></label>
                    <input type="file" class="form-control" id="foto" name="foto"
                        value="{{ old('foto') }}">
                    @error('foto')
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
                    <textarea class="form-control" id="alamat" name="alamat"></textarea>
                    @error('alamat')
                        <div class="text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3">
                <label for="" class="form-label">Jenis Kelamin :</label>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="laki-laki" value="Laki-laki"
                            {{ old('gender') == 'Laki-laki' ? 'checked' : '' }}>
                        <label class="form-check-label" for="laki-laki">
                            Laki-laki
                        </label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan"
                            {{ old('gender') == 'Perempuan' ? 'checked' : '' }}>
                        <label class="form-check-label" for="perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-3">
                <label for="" class="form-label">Hak Akses :</label>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role_id" id="manajemen" value="1"
                            {{ old('role_id') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="manajemen">
                            Manajemen
                        </label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role_id" id="petugas" value="2"
                            {{ old('role_id') == '2' ? 'checked' : '' }}>
                        <label class="form-check-label" for="petugas">
                            Petugas
                        </label>
                    </div>
                </div>
                @error('role_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <a href="{{ route('daftar.user') }}">
            <button type="button" class="btn btn-warning text-white">Kembali</button>
        </a>&nbsp;
        <button type="submit" class="btn btn-md btn-success me-3">Simpan</button>
    </form>
</x-main>

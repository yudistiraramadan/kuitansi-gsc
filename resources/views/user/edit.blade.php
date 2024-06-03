<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('update.user', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $user->nama }}">
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
                                value="{{ $user->username }}">
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
                            <label for="phone" class="form-label">No Hp / WhatsApp</label>
                            <input type="text" min="0"
                                onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control"
                                id="phone" name="phone" value="{{ $user->phone }}">
                            @error('phone')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="photo" class="form-label">Upload foto <b>*jika ada</b></label>
                            <input type="file" class="form-control" id="photo" name="photo" value="">
                            @error('photo')
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
                            <textarea class="form-control" id="alamat" name="alamat">{{ $user->alamat }}</textarea>
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
                                <input class="form-check-input" type="radio" name="gender" id="laki-laki"
                                    value="Laki-laki" {{ $user->gender == 'Laki-laki' ? 'checked' : '' }}>
                                <label class="form-check-label" for="laki-laki">
                                    Laki-laki
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="perempuan"
                                    value="Perempuan" {{ $user->gender == 'Perempuan' ? 'checked' : '' }}>
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
                                <input class="form-check-input" type="radio" name="role_id" id="manajemen"
                                    value="1" {{ $user->role_id == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="manajemen">
                                    Manajemen
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role_id" id="petugas"
                                    value="2" {{ $user->role_id == 2 ? 'checked' : '  ' }}>
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
                <button type="submit" class="btn btn-md btn-success me-3">Edit</button>
            </form>
        </div>
    </div>
    <br>
    <div>
        <h1 style="font-family:'Nunito'; font-weight:700; color:#222E3C; font-size:24px;" class="h3 mb-3">
            Edit Password
        </h1>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">

                <form action="{{ route('update.password', $user->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    value="">
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
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" value="">
                                @error('password_confirmation')
                                    <div class="text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-md btn-danger me-3">Edit Passwords</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main>

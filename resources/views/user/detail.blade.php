<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>
    <link rel="stylesheet" href="{{ asset('asset_offline/css/table-responsive.css') }}">

    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('foto-user/' . $user->photo) }}" width="110" class="rounded-3 mb-3"
                            alt="">
                        {{-- <img src="{{ asset('foto-user/' . $data->photo . '') }}" height="320px" alt=""> --}}

                        <h5 class="mb-1">{{ $user->nama }}</h5>
                        @if ($user->role_id == 1)
                            <span class="badge bg-primary-subtle text-primary fw-light rounded-pill">Manajemen</span>
                        @elseif($user->role_id == 2)
                            <span class="mb-1 badge  bg-success-subtle text-success">Petugas</span>
                        @endif
                    </div>

                    <div class="hstack justify-content-between mt-5">
                        <div class="d-flex align-items-center">
                            <span class="bg-success-subtle p-6 rounded-3 round-50 hstack justify-content-center">
                                <i class="ti ti-moon text-success fs-7"></i>
                            </span>

                            <div class="ms-3">
                                <p class="fw-normal text-dark fs-5 mb-0">24</p>
                                <p class="mb-0 fs-3">Bulan ini</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <span class="bg-success-subtle p-6 rounded-3 round-50 hstack justify-content-center">
                                <i class="ti ti-cash-banknote text-success fs-7"></i>
                            </span>

                            <div class="ms-3">
                                <p class="fw-normal text-dark fs-5 mb-0">568</p>
                                <p class="mb-0 fs-3">Keseluruhan</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="pb-1 mb-2 border-bottom">
                            <h6>Informasi Lengkap</h6>
                        </div>

                        <ul>
                            <li class="py-2">
                                <p class="fw-normal text-dark mb-0">
                                    Nama:
                                    <span class="fw-light ms-1">{{ $user->nama }}</span>
                                </p>
                            </li>

                            <li class="py-2">
                                <p class="fw-normal text-dark mb-0">
                                    Username:
                                    <span class="fw-light ms-1">{{ $user->username }}</span>
                                </p>
                            </li>

                            <li class="py-2">
                                <p class="fw-normal text-dark mb-0">
                                    No WhatsApp:
                                    <span class="fw-light ms-1">{{ $user->phone }}</span>
                                </p>
                            </li>

                            <li class="py-2">
                                <p class="fw-normal text-dark mb-0">
                                    Gender:
                                    <span class="fw-light ms-1">{{ $user->gender }}</span>
                                </p>
                            </li>

                            <li class="py-2">
                                <p class="fw-normal text-dark mb-0">
                                    Alamat:
                                    <span class="fw-light ms-1">{{ $user->alamat }}</span>
                                </p>
                            </li>

                        </ul>

                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <a href="{{ route('daftar.user') }}">
                                    <button style="color: white" type="button"
                                        class="btn btn-warning w-100 justify-content-center d-flex align-items-center">
                                        <i class="ti ti-chevron-left fs-5 me-2"></i>
                                        Kembali
                                    </button>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <button type="button"
                                    class="btn btn-primary w-100 justify-content-center me-2 d-flex align-items-center mb-3 mb-sm-0">
                                    <i class="ti ti-edit fs-5 me-2"></i>
                                    Edit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item me-2" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">
                        Riwayat
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false" tabindex="-1">
                        Gaji karyawan
                    </button>
                </li>
            </ul>

            <div class="card mt-4">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="mb-4 border-bottom pb-3">
                                <h4 class="card-title mb-0">Riwayat pembuatan kuitansi selama ini</h4>
                            </div>
                            <div class="table-responsive overflow-x-auto">
                                <table id="tb-riwayat" class="table align-middle text-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Donatur</th>
                                            <th scope="col">Nominal</th>
                                            <th scope="col">Keperluan</th>
                                            <th scope="col">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top">
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($kuitansis as $kuitansi)
                                            <tr>
                                                <td> {{ $no++ }}. </td>
                                                <td>{{ $kuitansi->donatur }}</td>
                                                <td>Rp. {{ number_format($kuitansi->nominal, 0, ',', '.') }}</td>
                                                <td>{{ $kuitansi->keperluan }}</td>
                                                <td>{{ \Carbon\Carbon::parse($kuitansi->tanggal)->locale('id')->isoFormat('D MMMM Y') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="mb-4 border-bottom pb-3">
                                <h4 class="card-title mb-0">Salary Report</h4>
                            </div>
                            <div class="d-flex justify-content-between align-items-start">
                                <span class="badge text-bg-primary">Standard</span>
                                <div class="d-flex justify-content-center">
                                    <sup class="h5 mt-3 mb-0 me-1 text-primary">$</sup>
                                    <h1 class="display-5 mb-0 text-primary">50</h1>
                                    <sub class="fs-6 pricing-duration mt-auto mb-3">/ month</sub>
                                </div>
                            </div>
                            <ul class="g-2 my-4">
                                <li class="mb-2 align-middle">
                                    <i class="ti ti-circle-check fs-5 me-2 text-success"></i>
                                    3 Periods per day
                                </li>

                                <li class="mb-2 align-middle">
                                    <i class="ti ti-circle-check fs-5 me-2 text-success"></i>
                                    Included Documents
                                </li>

                                <li class="mb-2 align-middle">
                                    <i class="ti ti-circle-check fs-5 me-2 text-success"></i>
                                    Free Books
                                </li>

                                <li class="mb-2 align-middle">
                                    <i class="ti ti-circle-check fs-5 me-2 text-success"></i>
                                    Students Help Salary
                                </li>
                            </ul>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>Days</span>
                                <span>75% Completed</span>
                            </div>
                            <div class="progress bg-primary-subtle mb-1">
                                <div class="progress-bar text-bg-primary w-75" role="progressbar" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span>4 days remaining</span>
                            <div class="d-grid w-100 mt-4 pt-2">
                                <button class="btn btn-primary" data-bs-target="#upgradePlanModal"
                                    data-bs-toggle="modal">
                                    Pay Full Salary
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
<script>
    let table = new DataTable('#tb-riwayat');
</script>

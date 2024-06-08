<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>
    <script src="{{ asset('asset_offline/js/apexcharts.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('asset_offline/css/table-responsive.css') }}">

    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">

                    <div class="pb-1 mb-2 border-bottom">
                        <h6>Informasi Lengkap</h6>
                    </div>

                    <ul>
                        <li class="py-2">
                            <p class="fw-normal text-dark mb-0">
                                Nama:
                                <span class="fw-light ms-1">{{ $donatur->nama }}</span>
                            </p>
                        </li>

                        <li class="py-2">
                            <p class="fw-normal text-dark mb-0">
                                Kecamatan:
                                <span class="fw-light ms-1">{{ $donatur->kecamatan }}</span>
                            </p>
                        </li>

                        <li class="py-2">
                            <p class="fw-normal text-dark mb-0">
                                No WhatsApp:
                                <span class="fw-light ms-1">{{ $donatur->phone }}</span>
                            </p>
                        </li>

                        <li class="py-2">
                            <p class="fw-normal text-dark mb-0">
                                Gender:
                                <span class="fw-light ms-1">{{ $donatur->gender }}</span>
                            </p>
                        </li>

                        <li class="py-2">
                            <p class="fw-normal text-dark mb-0">
                                Alamat:
                                <span class="fw-light ms-1">{{ $donatur->alamat }}</span>
                            </p>
                        </li>

                    </ul>

                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <a href="{{ route('daftar.donatur') }}">
                                <button style="color: white" type="button"
                                    class="btn btn-warning w-100 justify-content-center d-flex align-items-center">
                                    <i class="ti ti-chevron-left fs-5 me-2"></i>
                                    Kembali
                                </button>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('edit.donatur', $donatur->id) }}">
                                <button type="button"
                                    class="btn btn-primary w-100 justify-content-center me-2 d-flex align-items-center mb-3 mb-sm-0">
                                    <i class="ti ti-edit fs-5 me-2"></i>
                                    Edit
                                </button>
                            </a>
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
                        Grafis Pendapatan
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
                                            <th scope="col">Petugas</th>
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
                                                <td style="text-align: left;"> {{ $no++ }}. </td>
                                                <td>{{ $kuitansi->nama }}</td>
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
                                <h4 class="card-title mb-0">Nominal perbulan</h4>
                            </div>
                            <div id="chart"></div>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const data = @json($data);
        const months = data.map(item => item.month);
        const nominals = data.map(item => item.total_nominal);

        const options = {
            chart: {
                type: 'line',
                height: '400px' // Sesuaikan tinggi chart disini
            },
            stroke: {
                curve: 'smooth',
            },
            series: [{
                name: 'Nominal',
                data: nominals
            }],
            xaxis: {
                categories: months
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        // Format rupiah tanpa desimal
                        return new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        }).format(value);
                    }
                }
            },
            tooltip: {
                y: {
                    formatter: function(value) {
                        // Format rupiah tanpa desimal
                        return new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        }).format(value);
                    }
                }
            }
        };

        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>

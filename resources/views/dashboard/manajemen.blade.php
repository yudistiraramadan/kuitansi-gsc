<x-main>
    {{-- Apex Charts --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts"> --}}
    <script src="{{ asset('asset_offline/js/apexcharts.js') }}"></script>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pendapatan tiap bulan</h4>
                    <div id="chart">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Akumulasi pendapatan perbulan</div>
                    <div id="chart-month"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Akumulasi pendapatan pertahun</div>
                    <div id="chart-year"></div>
                </div>
            </div>
        </div>
    </div>

</x-main>
<script src="{{ asset('asset_offline/js/sweealert2.js') }}"></script>
@if (Session::has('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: '{{ Session::get('success') }}'
        });
    </script>
@endif

{{-- Line Chart --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const data = @json($chartData);

        const options = {
            chart: {
                type: 'line',
                height: '400px' // Sesuaikan tinggi chart disini
            },
            stroke: {
                curve: 'smooth',
            },
            markers: {
                size: 4,
            },
            series: [{
                name: 'Nominal',
                data: data.nominals.map(nominal => parseFloat(nominal))
            }],
            xaxis: {
                categories: data.months
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

{{-- Donut Month --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var options = {
            series: @json(
                $donationMonth->pluck('total_nominal')->map(function ($value) {
                    return (int) $value;
                })),
            chart: {
                type: 'donut'
            },
            labels: @json($donationMonth->pluck('jenis_donasi')),
            plotOptions: {
                pie: {
                    donut: {
                        size: '65%'
                    }
                }
            },
            dataLabels: {
                formatter: function(val) {
                    return 'Rp ' + val.toLocaleString();
                }
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return 'Rp ' + val.toLocaleString();
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-month"), options);
        chart.render();
    });
</script>

{{-- Donut Year --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var options = {
            series: @json(
                $donationYear->pluck('total_nominal')->map(function ($value) {
                    return (int) $value;
                })),
            chart: {
                type: 'donut'
            },
            labels: @json($donationYear->pluck('jenis_donasi')),
            plotOptions: {
                pie: {
                    donut: {
                        size: '65%'
                    }
                }
            },
            dataLabels: {
                formatter: function(val) {
                    return 'Rp ' + val.toLocaleString();
                }
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return 'Rp ' + val.toLocaleString();
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-year"), options);
        chart.render();
    });
</script>

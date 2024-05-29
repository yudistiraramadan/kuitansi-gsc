<x-main>
    {{-- Apex Charts --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kotak Infaq GSC</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {{-- <link href="{{asset('landingpage/img/favicon.png')}}" rel="icon">
    <link href="{{asset('landingpage/img/apple-touch-icon.png')}}" rel="apple-touch-icon"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset_offline/img/gsc.png') }}">


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landingpage/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landingpage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landingpage/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('landingpage/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landingpage/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landingpage/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('landingpage/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('landingpage/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Arsha
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <link rel="stylesheet" href="{{ asset('asset_offline/css/table-responsive.css') }}">
    <script src="{{ asset('asset_offline/js/apexcharts.js') }}"></script>

    {{-- Datatables --}}
    {{-- <link rel="stylesheet" href="{{ asset('asset_offline/css/datatables.css') }}"> --}}

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="{{ route('landingpage') }}">SIKOFAQ</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="index.html" class="logo me-auto"><img src="{{ asset('landingpage/img/logo.png') }}" alt=""
                    class="img-fluid"></a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Grafik</a></li>
                    <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
                    <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
                    <li><a class="getstarted scrollto" href="https://www.donasi.gsc.or.id/" target="_blank">Donasi
                            Online</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-7 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>Gerak Sedekah Cilacap</h1>
                    <h2>Portal informasi transparansi dana keuangan donasi kotak infaq & tabung kebaikan</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="https://wa.me/+6285701223333" target="_blank"
                            class="btn-get-started scrollto">Konfirmasi Donasi</a>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('asset_offline/img/gsc3d.png') }}" class="img-fluid animated" alt=""
                        style="width: 500px;">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg" style="padding-top: 120px; padding-bottom:120px;">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Layanan</h2>
                    <p>Kami memberikan pelayanan secara profesional dalam memberikan informasi transparansi penggunaan
                        dana infaq sedekah.</p>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4><a href="">Amanah</a></h4>
                            <p>Semua donasi yang terkumpul akan tersalurkan kepada penerima manfaat yang berhak dan
                                tepat.</p>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4><a href="">Cepat dan Mudah</a></h4>
                            <p>Proses donasi yang kamu lakukan hanya dalam hitungan menit dengan berbagai metode
                                pembayaran</p>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-layer"></i></div>
                            <h4><a href="">Transparan</a></h4>
                            <p>Pencairan dan penggunaan donasi yang sudah diterima penggalang dana dapat dilihat di
                                update aktivitas</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about" style="margin-top: 80px;">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Grafik Pendapatan</h2>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                {{-- <h4>Pendapatan Tabung & Kotak Infaq</h4> --}}
                                <h4>Perolehan pertahun</h4>
                                <h6 style="color: #26A0FC;">Tabung Kebaikan : Rp.
                                    {{ number_format($tabung, 0, ',', '.') }}</h6>
                                <h6 style="color: #26E7A6;">Kotak Infaq : Rp. {{ number_format($kotak, 0, ',', '.') }}
                                </h6>
                                <div id="chart-pendapatan-bulanan"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Us Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta" style="height: 500px; margin-top: 80px;">
            <div class="container" data-aos="zoom-in">

                <div class="row">
                    <div class="col-lg-9 text-center text-lg-start">
                        <h3>DONASI ONLINE</h3>
                        <p>Kini tersedia platform donasi online gsc, dapat diakses dengan klik tombol ini yaa</p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="https://www.donasi.gsc.or.id" target="_blank">Donasi
                            Online</a>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Cta Section -->

        <!-- ======= Tabel Donasi ======= -->
        <section id="skills" class="skills section-bg" style="padding-top: 120px;">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Tabel Penarikan</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive table-container">
                                    <table class="table table-hover" id="tb-kuitansi">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:left;">No.</th>
                                                <th scope="col">Terima Dari</th>
                                                <th scope="col">Nominal</th>
                                                <th scope="col">Petugas</th>
                                                <th scope="col">Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp

                                            @foreach ($kuitansis as $kuitansi)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $kuitansi->donatur }}</td>
                                                    <td>{{ $kuitansi->nominal }}</td>
                                                    <td>{{ $kuitansi->nama }}</td>
                                                    <td>{{ $kuitansi->tanggal }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Skills Section -->

        <!-- ======= Skills Section ======= -->
        {{-- <section id="skills" class="skills section-bg">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{asset('landingpage/img/cilacap.png')}}" class="img-fluid" alt="" width="400px">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
                        <h3>Jumlah Munfiq Per Tiap Kecamatan</h3>
                        <p class="fst-italic">
                            Berikut merupakan prosentase jumlah data munfiq di setiap Kecamatan Cilacap.
                        </p>

                        <div class="skills-content">

                            <div class="progress">
                                <span class="skill">Cilacap Tengah <i class="val">75</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill">Cilacap Utara <i class="val">50</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill">Nusawung <i class="val">75%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill">Photoshop <i class="val">55%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="55"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </section> --}}
        <!-- End Skills Section -->






        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>FAQ</h2>
                    <p>Pertanyaan Seputar Kotak Infaq Gerak Sedekah Cilacap.</p>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                                data-bs-target="#faq-list-1">Kapan Kotak Infaq Ditarik <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    Kotak infaq akan ditarik oleh petugas selama kurun waktu sebulan sekali atau
                                    berdasarkan permintaan dari munfiq.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-2" class="collapsed">Tes Dropdown 3<i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Pesan dropdown 3.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-3" class="collapsed">Tes Dropdown 4<i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Pesan dropdown 4.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-4" class="collapsed">Tes Dropdown 5<i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Pesan dropdown 5.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="500">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-5" class="collapsed">Tes Dropdown 5 <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Pesan dropdown 5.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                2023 &copy; Gerak Sedekah Cilacap
            </div>
            <div class="credits">
                Created By <a href="https://www.instagram.com/yudistira8404/" target="_blank">Yudistira RK</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landingpage/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landingpage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landingpage/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landingpage/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landingpage/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('landingpage/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('landingpage/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('landingpage/js/main.js') }}"></script>

    {{-- Apex Charts --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const data = @json($chartData);

            const options = {
                chart: {
                    type: 'line',
                    height: 400
                },
                stroke: {
                    curve: 'smooth',
                },
                series: [{
                    name: 'Tabung Kebaikan',
                    data: data.nominalsTabungKebaikan
                }, {
                    name: 'Kotak Infaq',
                    data: data.nominalsKotakInfaq
                }],
                xaxis: {
                    categories: data.months
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
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

            const chart = new ApexCharts(document.querySelector("#chart-pendapatan-bulanan"), options);
            chart.render();
        });
    </script>

    {{-- Datatables --}}


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tb-kuitansi').DataTable();
        });
    </script>


</body>

</html>

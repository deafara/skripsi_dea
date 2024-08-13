<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Pengunjung')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('template/pengunjung/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('template/pengunjung/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('template/pengunjung/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/pengunjung/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/pengunjung/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('template/pengunjung/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/pengunjung/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('template/pengunjung/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: Jun 02 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="/" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">SIPAGI</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#services">Info Penyakit</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    </main>
    <main class="main">
        @yield('content')
        <div class="container my-5">
            <h2 class="mb-4">Hasil Diagnosa</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $hasil->datadiri->name }}</td>
                        </tr>
                        <tr>
                            <th>No Telp</th>
                            <td>{{ $hasil->datadiri->no_telp }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $hasil->datadiri->address }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ $hasil->datadiri->tanggal }}</td>
                        </tr>
                        <tr>
                            <th>Gejala yang dirasakan</th>
                            <td>
                                @php
                                    $datagejala = App\Models\Hasil::where('id_diagnosa', $hasil->id)->get();
                                @endphp
                                @foreach ($datagejala as $gejala)
                                    <p>{{ $gejala->gejala->nama_gejala }}</p>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Penyakit</th>
                            <td>
                                @php
                                    $datapenyakit = App\Models\HasilPenyakit::where('id_diagnosa', $hasil->id)->get();
                                @endphp
                                @foreach ($datapenyakit as $item)
                                    <p>{{ $item->penyakit->nama_penyakit }} {{ $item->presentase }}%</p>
                                    {{-- <p>{{ $item->presentase }}</p> --}}
                                @endforeach
                            </td>
                            {{-- <td>{{ $hasil->penyakit->nama_penyakit }}</td> --}}
                        </tr>
                        <tr>
                            <th>Persentase</th>
                            <td>{{ $hasil->penyakit->nama_penyakit }} {{ $hasil->presentase }}%</td>
                        </tr>
                        <tr>
                            <th>Solusi</th>
                            <td>{{ $hasil->penyakit->solusi }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center">
                                <a href="{{route('cetak-pdf',$hasil->id)}}" class="btn btn-success">Cetak</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('template/pengunjung/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/pengunjung/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('template/pengunjung/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('template/pengunjung/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('template/pengunjung/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('template/pengunjung/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('template/pengunjung/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('template/pengunjung/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('template/pengunjung/js/main.js') }}"></script>
</body>

</html>

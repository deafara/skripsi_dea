<!-- resources/views/index.blade.php -->
@extends('pengunjung.partials.master')

@section('title', 'Pengunjung')

@section('content')

<!-- Hero Section -->
<section id="hero" class="hero section">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
        <h1>Sistem Pakar Diagnosa Penyakit Gigi</h1>
        <p></p>
        <div class="d-flex">
            <a href="{{ route('form.data.diri') }}" class="btn-get-started">Diagnosa</a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="{{ asset('template/pengunjung/img/about.png') }}" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>
</section><!-- /Hero Section -->

<!-- About Section -->
<section id="about" class="about section">
  <!-- Section Title -->
  {{-- <div class="container section-title" data-aos="fade-up">
    <h2>About Us</h2>
  </div><!-- End Section Title --> --}}

  {{-- <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
          magna aliqua.
        </p>
        <ul>
          <li><i class="bi bi-check2-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
          <li><i class="bi bi-check2-circle"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
          <li><i class="bi bi-check2-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo</span></li>
        </ul>
      </div>
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
        <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
  </div> --}}
</section><!-- /About Section -->

<!-- Why Us Section -->
<section id="why-us" class="section why-us" data-builder="section">
  <div class="container-fluid">
    <div class="row gy-4">
      <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">
        <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
          <h3><strong>UPTD Puskesmas Kertasemaya</strong></h3>
        </div>
        <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">
          <div class="faq-item faq-active">
            <div class="faq-content">
              <p>UPTD Puskesmas Kertasemaya adalah Unit Pelaksana Teknis Dinas Kabupaten Indramayu yang bertempat di Kecamatan Kertasemaya, Jl. By Pass Tulungagung dengan wilayah kerja meliputi 13 desa, yaitu Desa Tulungagung, Desa Kertasemaya, Desa Kliwed, Desa Sukawera, Desa Jengkok, Desa Lemah Ayu, Desa Manguntara, Desa Tegalwirangrong, Desa Tenajar Kidul, Desa Tenajar, Desa Tenajar Lor, Desa Jambe, dan Desa Larangan Jambe. Puskesmas kami adalah Puskesmas Perdesaan dan juga termasuk puskesmas non rawat inap. Kami selalu berupaya memberikan pelayanan prima dengan sepenuh hati bagi para pengguna layanan kami.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->
        </div>
      </div>
      <div class="col-lg-5 order-1 order-lg-2 why-us-img">
        <img src="{{ asset('template/pengunjung/img/puskesmas.jpg') }}" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
      </div>
    </div>
  </div>
</section><!-- /Why Us Section -->

<!-- Services Section -->
<section id="services" class="services section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Info Beberapa Penyakit Gigi</h2>
  </div><!-- End Section Title -->
  <div class="container">
    <div class="row gy-4">
      <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item position-relative">
          <h4><a href="service-details.html" class="stretched-link">Pulpitis</a></h4>
          <p>Pulpitis adalah peradangan pada pulpa gigi, yaitu saluran akar gigi yang berisi saraf dan pembuluh darah</p>
        </div>
      </div><!-- End Service Item -->
      <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
        <div class="service-item position-relative">
          <h4><a href="service-details.html" class="stretched-link">Impacted teeth</a></h4>
          <p>Gigi impaksi adalah gigi yang tidak dapat atau tidak akan dapat tumbuh ke posisi normalnya karena adanya hambatan, baik dari gigi sebelahnya, tulang rahang atau jaringan patologis di sekitarnya</p>
        </div>
      </div><!-- End Service Item -->
      <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
        <div class="service-item position-relative">
          <h4><a href="service-details.html" class="stretched-link">Periodontitis</a></h4>
          <p>Periodontitis adalah infeksi gusi yang dapat menyebabkan kerusakan pada gusi, tulang rahang, dan jaringan lunak di sekitar gusi</p>
        </div>
      </div><!-- End Service Item -->
      <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
        <div class="service-item position-relative">
          <h4><a href="service-details.html" class="stretched-link">Caries of dentine</a></h4>
          <p>Gigi berlubang atau karies adalah kerusakan pada bagian terluar dan terdalam gigi</p>
        </div>
      </div><!-- End Service Item -->
    </div>
  </div>
</section><!-- /Services Section -->

<!-- Call To Action Section -->
<section id="call-to-action" class="call-to-action section">
  <img src="{{ asset('template/pengunjung/img/tentang_kami.jpg') }}" alt="">
  <div class="container">
    <div class="row" data-aos="zoom-in" data-aos-delay="100">
      <div class="col-xl-9 text-center text-xl-start"></div>
      <div class="col-xl-3 cta-btn-container text-center"></div>
    </div>
  </div>
</section><!-- /Call To Action Section -->

<!-- Contact Section -->
<section id="contact" class="contact section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
  </div><!-- End Section Title -->
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">
      <div class="col-lg-5">
        <div class="info-wrap">
          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h3>Address</h3>
              <p>Jl. By Pass Tulungagung</p>
            </div>
          </div><!-- End Info Item -->
          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Call Us</h3>
              <p>0821-1889-4770</p>
            </div>
          </div><!-- End Info Item -->
          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Email Us</h3>
              <p>puskes.kertasemaya@gmail.com</p>
            </div>
          </div><!-- End Info Item -->
        </div>
      </div>
      <div class="col-lg-7">
        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
          <div class="row gy-4">
            <div class="col-md-6">
              <label for="name-field" class="pb-2"></label>
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7927.714384293175!2d108.352117!3d-6.539712000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ec3724e2c674d%3A0xe7e272e1d2c60818!2sPuskesmas%20Kertasemaya!5e0!3m2!1sen!2sid!4v1715964025342!5m2!1sen!2sid" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </form>
      </div><!-- End Contact Form -->
    </div>
  </div>
</section><!-- /Contact Section -->

@endsection

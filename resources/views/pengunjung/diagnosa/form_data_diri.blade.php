@extends('pengunjung.partials.master')

@section('title', 'Form Data Diri')

@section('content')
<section id="form-data-diri" class="form-data-diri section">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Form Data Diri</h2>
    </div>
    <div class="row">
      <div class="col-lg-8 mx-auto">
        @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
        <form action="" method="POST" class="php-email-form">
          @csrf
          <div class="row gy-4">
            <div class="col-md-6">
              <label for="name">Nama Lengkap</label>
              <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="col-md-6">
              <label for="no_telp">No Telepon</label>
              <input type="text" name="no_telp" class="form-control" id="no_telp" required>
            </div>
            <div class="col-md-6">
              <label for="address">Alamat</label>
              <input type="text" name="address" class="form-control" id="address" required>
            </div>
            <div class="col-md-6">
                <label for="tanggal">Tanggal Konsultasi</label>
                <input type="text" name="tanggal" class="form-control" id="tanggal" required>
              </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

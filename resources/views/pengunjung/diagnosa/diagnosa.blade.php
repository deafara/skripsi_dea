@extends('pengunjung.partials.master')

@section('title', 'Form Diagnosa')

@section('content')
<section id="form-diagnosa" class="form-diagnosa section">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Form Diagnosa</h2>
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
          <input type="hidden" name="data_diri_id" value="{{ $dataDiriId }}">
          <div class="row gy-4">
            <div class="col-12">
              <label for="symptoms">Gejala yang Dialami</label>
              <textarea name="symptoms" id="symptoms" class="form-control" rows="5" required></textarea>
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

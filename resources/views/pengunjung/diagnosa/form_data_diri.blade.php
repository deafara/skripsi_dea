@extends('pengunjung.partials.master')

@section('title', 'Form Data Diri')

<style>
    /* Style tambahan untuk memastikan form ditampilkan dengan benar */
    .form-container {
        display: none; /* Sembunyikan semua form secara default */
    }
    .form-container.active {
        display: block; /* Tampilkan form yang aktif */
    }
</style>

@section('content')
    <section id="form-data-diri" class="form-data-diri section">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Form Data Diri</h2>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    {{-- <form action="{{ route('calculate') }}" method="POST" class="php-email-form">
                        @csrf --}}
                        {{-- form data diri --}}
                        {{-- <div class="row gy-4">
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
                                <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                            </div>
                            <div class="col-12 text-center">
                                <a href="diagnosa/1">selanjutnya</a> --}}
                                {{-- <button type="submit" class="btn btn-primary">Selanjutnya</button> --}}
                            {{-- </div>
                        </div> --}}
                        {{-- form gejala --}}
                        {{-- <div class="row gy-4">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gejala</th>
                                                <th>Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($gejala as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>Apakah {{ $row->nama_gejala }} ?</td>
                                                    <td>
                                                        <div class="form-group">
                                                            <select class="form-control" id="diagnosa"
                                                                name="gejala[{{ $row->id }}]">
                                                                <option value="tidak" read-only>Tidak</option>
                                                                <option value="iya|{{ $row->id }}">Iya</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </form> --}}
                    <form action="{{ route('calculate') }}" method="POST" >
                        @csrf
                        {{-- form data diri --}}
                        <div id="form-datadiri" class="form-container active">
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
                                    <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="button" class="btn btn-primary" id="next-button">Selanjutnya</button>
                                </div>
                            </div>
                        </div>
                        {{-- form gejala --}}
                        <div id="form-gejala" class="form-container">
                            <div class="row gy-4">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Gejala</th>
                                                    <th>Pilihan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($gejala as $row)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>Apakah {{ $row->nama_gejala }} ?</td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="form-control" id="diagnosa" name="gejala[{{ $row->id }}]">
                                                                    <option value="tidak">Tidak</option>
                                                                    <option value="iya|{{ $row->id }}">Iya</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="button" class="btn btn-secondary" id="back-button">Kembali</button>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var nextButton = document.getElementById('next-button');
        var backButton = document.getElementById('back-button');
        var formDataDiri = document.getElementById('form-datadiri');
        var formGejala = document.getElementById('form-gejala');

        nextButton.addEventListener('click', function() {
            formDataDiri.classList.remove('active');
            formGejala.classList.add('active');
        });

        backButton.addEventListener('click', function() {
            formGejala.classList.remove('active');
            formDataDiri.classList.add('active');
        });
    });
</script>
@section('scripts')
    {{-- <script>
        document.getElementById('selanjutnya-button').addEventListener('click', function() {
            document.getElementById('form-data-diri-form').submit();
        });
    </> --}}


@endsection

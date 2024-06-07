@extends('admin.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gejala</h1>
        </div>
        <div class="container-fluid">

            <form action="{{ route('gejalas.update', $gejala->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="kode_gejala">Kode Gejala:</label>
                    <input type="text" class="form-control" id="kode_gejala" name="kode_gejala"
                        value="{{ $gejala->kode_gejala }}" disabled>
                </div>

                <div class="form-group">
                    <label for="nama_gejala">Nama Gejala</label>
                    <input type="text" class="form-control" id="nama_gejala" name="nama_gejala"
                        value="{{ $gejala->nama_gejala }}" required>
                </div>

                <!-- Tambahkan input lain sesuai kebutuhan -->

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/gejalas" class="btn btn-secondary">Batal</a>
            </form>


        </div>
    </div>
    <!-- /Page Content -->

    </div>
@endsection

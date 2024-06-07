@extends('admin.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Penyakit</h1>
        </div>
        <div class="container-fluid">

            <form action="{{ route('penyakits.update', $penyakit->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="kode_penyakit">Kode Penyakit:</label>
                    <input type="text" class="form-control" id="kode_penyakit" name="kode_penyakit"
                        value="{{ $penyakit->kode_penyakit }}" disabled>
                </div>

                <div class="form-group">
                    <label for="nama_penyakit">Nama Penyakit</label>
                    <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit"
                        value="{{ $penyakit->nama_penyakit }}" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi:</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                        value="{{ $penyakit->deskripsi }}" required>
                </div>

                <div class="form-group">
                    <label for="solusi">Solusi:</label>
                    <input type="text" class="form-control" id="solusi" name="solusi" value="{{ $penyakit->solusi }}"
                        required>
                </div>

                <!-- Tambahkan input lain sesuai kebutuhan -->

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/penyakits" class="btn btn-secondary">Batal</a>
            </form>


        </div>
    </div>
    <!-- /Page Content -->

    </div>
@endsection

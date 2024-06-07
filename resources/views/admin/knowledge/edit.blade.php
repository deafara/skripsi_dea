@extends('admin.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Basis Pengetahuan</h1>
        </div>
        <div class="container-fluid">

            <form action="{{ route('knowledges.update', $knowledge->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="id_penyakit">Penyakit:</label>
                    <input type="text" class="form-control" id="id_penyakit" name="id_penyakit"
                        value="{{ $penyakit->id_penyakit }}" disabled>
                </div>

                <div class="form-group">
                    <label for="id_gejala">Gejala</label>
                    <input type="text" class="form-control" id="id_gejala" name="id_gejala"
                        value="{{ $gejala->id_gejala }}" required>
                </div>

                <div class="form-group">
                    <label for="MB">MB</label>
                    <input type="text" class="form-control" id="MB" name="MB"
                        value="{{ $knowledge->MB }}" required>
                </div>

                <div class="form-group">
                    <label for="MD">MD</label>
                    <input type="text" class="form-control" id="MD" name="MD" value="{{ $knowledge->MD }}"
                        required>
                </div>

                <!-- Tambahkan input lain sesuai kebutuhan -->

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/knowledges" class="btn btn-secondary">Batal</a>
            </form>


        </div>
    </div>
    <!-- /Page Content -->

    </div>
@endsection

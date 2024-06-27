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
                    <select name="id_penyakit" id="id_penyakit" class="form-control" required>
                        <option value="" disabled selected>Pilih Penyakit</option>
                        @foreach ($penyakitList as $penyakitItem)
                            <option value="{{ $penyakitItem->id }}" {{ $penyakitItem->id == $knowledge->id_penyakit ? 'selected' : '' }}>
                                {{ $penyakitItem->kode_penyakit . ' - ' . $penyakitItem->nama_penyakit }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_gejala">Gejala:</label>
                    <select name="id_gejala" id="id_gejala" class="form-control" required>
                        <option value="" disabled selected>Pilih Gejala</option>
                        @foreach ($gejalaList as $gejalaItem)
                            <option value="{{ $gejalaItem->id }}" {{ $gejalaItem->id == $knowledge->id_gejala ? 'selected' : '' }}>
                                {{ $gejalaItem->kode_gejala . ' - ' . $gejalaItem->nama_gejala }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="MB">MB</label>
                    <input type="text" class="form-control" id="MB" name="MB" value="{{ $knowledge->MB }}" required>
                </div>

                <div class="form-group">
                    <label for="MD">MD</label>
                    <input type="text" class="form-control" id="MD" name="MD" value="{{ $knowledge->MD }}" required>
                </div>

                <!-- Tambahkan input lain sesuai kebutuhan -->

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/knowledges" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection

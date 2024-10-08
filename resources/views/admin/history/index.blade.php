@extends('admin.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">History Diagnosa</h1>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    {{-- <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#addGejalaModal">Tambah</button> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>No Telepon</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Diagnosa</th>
                                    <th>Nama Penyakit</th>
                                    <th>Gejala yang di rasakan</th>
                                    <th>Persentase</th>
                                    <th>Solusi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($histori as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->datadiri->name }}</td>
                                        <td>{{ $row->datadiri->no_telp }}</td>
                                        <td>{{ $row->datadiri->address }}</td>
                                        <td>{{ $row->datadiri->tanggal }}</td>
                                        <td>{{ $row->penyakit->nama_penyakit }}</td>
                                        @php
                                            $datagejala = App\Models\Hasil::where('id_diagnosa', $row->id)->get();
                                        @endphp
                                        <td>
                                            @foreach ($datagejala as $gejala)
                                                <p>{{ $gejala->gejala->nama_gejala }},</p>
                                            @endforeach
                                        </td>
                                        <td>{{ $row->presentase }}%</td>
                                        <td>{{ $row->penyakit->solusi }}</td>
                                        {{-- <td>
                                            <div class="btn-group">
                                                        <a href="{{ route('gejalas.edit', $row->id) }}"
                                                            class="btn btn-primary">Edit</a>
                                                        <form id="deleteForm{{ $row->id }}"
                                                            action="{{ route('gejalas.destroy', $row->id) }}"
                                                            method="POST" style="margin-left: 5px;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="confirmDelete({{ $row->id }})">Hapus</button>
                                                        </form>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Insert -->
        <div class="modal fade" id="addGejalaModal" tabindex="-1" aria-labelledby="addGejalaModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addGejalaModalLabel">Tambah Gejala</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('gejalas.store') }}" method="POST" id="addGejalaForm">
                            @csrf
                            <div class="mb-3">
                                <label for="kode_gejala" class="form-label">Kode Gejala</label>
                                <input type="text" class="form-control" id="kode_gejala" name="kode_gejala">
                            </div>
                            <div class="mb-3">
                                <label for="nama_gejala" class="form-label">Nama Gejala</label>
                                <input type="text" class="form-control" id="nama_gejala" name="nama_gejala" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Delete Confirmation -->
        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog"
            aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Penghapusan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger" onclick="deleteGejala()">Hapus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Include Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

        <script>
            function confirmDelete(id) {
                if (confirm("Apakah Anda yakin ingin menghapus item ini?")) {
                    document.getElementById('deleteForm' + id).submit();
                }
            }
        </script>
    </div>
@endsection

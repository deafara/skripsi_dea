@extends('admin.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Basis Pengetahuan</h1>
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
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#addKnowledgeModal">Tambah</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Penyakit</th>
                                    <th>Gejala</th>
                                    <th>MB</th>
                                    <th>MD</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($knowledges as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->penyakit ? $row->penyakit->kode_penyakit . ' - ' . $row->penyakit->nama_penyakit : 'Data tidak ditemukan' }}</td>
                                        <td>{{ $row->gejala ? $row->gejala->kode_gejala . ' - ' . $row->gejala->nama_gejala : 'Data tidak ditemukan' }}</td>
                                        <td>{{ $row->MB }}</td>
                                        <td>{{ $row->MD }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('knowledges.edit', $row->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <form id="deleteForm{{ $row->id }}"
                                                    action="{{ route('knowledges.destroy', $row->id) }}" method="POST"
                                                    style="margin-left: 5px;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="confirmDelete({{ $row->id }})">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Insert -->
        <div class="modal fade" id="addKnowledgeModal" tabindex="-1" aria-labelledby="addKnowledgeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addKnowledgeModalLabel">Tambah Knowledge</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('knowledges.store') }}" method="POST" id="addKnowledgeForm">
                        @csrf
                        <div class="mb-3">
                            <div class="form-group">
                                <label>Penyakit</label>
                                <select name="id_penyakit" class="form-control" required>
                                    <option value="" disabled selected>Pilih</option>
                                    @foreach ($penyakit as $row)
                                        <option value="{{ $row->id }}">
                                            {{ $row->kode_penyakit . ' - ' . $row->nama_penyakit }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label>Gejala</label>
                                <select name="id_gejala" class="form-control" required>
                                    <option value="" disabled selected>Pilih</option>
                                    @foreach ($gejala as $row)
                                        <option value="{{ $row->id }}">
                                            {{ $row->kode_gejala . ' - ' . $row->nama_gejala }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="MB" class="form-label">MB</label>
                            <input type="text" class="form-control" id="MB" name="MB" required>
                        </div>
                        <div class="mb-3">
                            <label for="MD" class="form-label">MD</label>
                            <input type="text" class="form-control" id="MD" name="MD" required>
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
                        <button type="button" class="btn btn-danger" onclick="deleteKnowledge()">Hapus</button>
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

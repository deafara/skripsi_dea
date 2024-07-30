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
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('calculate') }}" method="POST">
                        @csrf
                        <input type="hidden" name="data_diri_id" value="{{ $dataDiriId }}">
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
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h3 {
            text-align: center;
            font-size: 24px;
        }

        .datadiri-table {
            width: 95%;
            margin: 0 auto 20px auto;
            border-collapse: collapse;
        }

        .datadiri-table th,
        .datadiri-table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }

        .datadiri-table .label {
            font-weight: bold;
            background: #3498db;
            color: white;
        }

        table {
            width: 95%;
            border-collapse: collapse;
            margin: 0 auto 20px auto;
        }

        tr:nth-of-type(odd) {
            background: #eee;
        }

        th {
            background: #3498db;
            color: white;
            font-weight: bold;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }

        .kesimpulan-table {
            width: 95%;
            margin: 0 auto 20px auto;
            border-collapse: collapse;
        }

        .kesimpulan-table th,
        .kesimpulan-table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <h3>Hasil Diagnosa</h3>
    <table class="datadiri-table">
        <tr>
            <th class="label">Nama</th>
            <td>{{ $data->datadiri->name }}</td>
            <th class="label">No Telp</th>
            <td>{{ $data->datadiri->no_telp }}</td>
        </tr>
        <tr>
            <th class="label">Alamat</th>
            <td>{{ $data->datadiri->address }}</td>
            <th class="label">Tanggal</th>
            <td>{{ $data->datadiri->tanggal }}</td>
        </tr>
    </table>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Gejala</th>
            </tr>
        </thead>
        <tbody>
            @php
                $datagejala = App\Models\Hasil::where('id_diagnosa', $data->id)->get();
            @endphp
            @foreach ($datagejala as $index => $gejala)
                <tr>
                    <td data-column="no">{{ $index + 1 }}</td>
                    <td data-column="gejala">{{ $gejala->gejala->nama_gejala }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Penyakit</th>
                <th>Persentase</th>
            </tr>
        </thead>
        <tbody>
            @php
                $datapenyakit = App\Models\HasilPenyakit::where('id_diagnosa', $data->id)->get();
            @endphp
            @foreach ($datapenyakit as $index => $penyakit)
                <tr>
                    <td data-column="no">{{ $index + 1 }}</td>
                    <td data-column="gejala">{{ $penyakit->penyakit->nama_penyakit }}</td>
                    <td data-column="gejala">{{ $penyakit->presentase }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <h3>Kesimpulan</h3>
        <table class="kesimpulan-table">
            <thead>
                <tr>
                    <th>Penyakit</th>
                    <th>Persentase</th>
                    <th>Solusi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data->penyakit->nama_penyakit }}</td>
                    <td>{{ $data->presentase  }}%</td>
                    <td>
                        {{-- @php
                            $solusi = App\Models\Penyakit::where('nama_penyakit', $data['kesimpulan']['name'])->first();
                        @endphp --}}
                        {{ $data->penyakit->solusi }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>

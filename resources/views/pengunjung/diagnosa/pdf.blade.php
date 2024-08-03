<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>

    <style>
        table {
            width: 95%;
            border-collapse: collapse;
            margin: 50px auto;
        }

        /* Zebra striping */
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
    </style>

</head>

<body>
    <p>{{$datadiri->name}}</p>
    <p>{{$datadiri->no_telp}}</p>
    <p>{{$datadiri->address}}</p>
    <p>{{$datadiri->tanggal}}</p>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Gejala</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['gejala'] as $index => $gejala)
                <tr>
                    <td data-column="no">{{ $index + 1 }}</td>
                    <td data-column="gejala">{{ $gejala }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Penyakit</th>
                <th>Persentase</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cf as $index => $penyakit)
                <tr>
                    <td data-column="no">{{ $index + 1 }}</td>
                    <td data-column="gejala">{{ $penyakit['name'] }}</td>
                    <td data-column="gejala">{{ ($penyakit['value'] * 100) . '%' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <div>
        <h3>Kesimpulan</h3>
        <p>{{ $data['kesimpulan']['name'] }} dengan nilai {{ ($data['kesimpulan']['value'] * 100)   . '%' }}</p>
    </div>
</body>

</html>

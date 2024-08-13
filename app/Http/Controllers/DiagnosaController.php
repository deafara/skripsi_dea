<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\DataDiri;
use App\Models\Hasil;
use App\Models\HasilPenyakit;
use PDF;


class DiagnosaController extends Controller
{
    public function index($dataDiriId)
    {
        // Ambil data gejala dari database
        $gejala = Gejala::all();

        return view('pengunjung.diagnosa.diagnosa', compact('gejala', 'dataDiriId'));
    }

    // function calculate(Request $request){

    //     // dd($request->all());
    //     $penyakits = Penyakit::with('knowledge')->get();
    //     $cf = [];
    //     $gejalas = [];

    //     foreach($request->gejala as $gejala){
    //         if($gejala != 'tidak')
    //             $gejalas[] = str_replace('iya|', '', $gejala);
    //     }

    //     foreach($gejalas as $gejala){
    //         $data = Gejala::find($gejala);
    //         $data_gejala[] = $data->nama_gejala;
    //     }

    //     foreach($penyakits as $i => $penyakit){
    //         $data = [];
    //         $cf_combine = 0;

    //         foreach($gejalas as $key => $gejala){
    //             $knowledge = $penyakit->knowledge->where('id_gejala', $gejala)->first();

    //             if($knowledge){
    //                 $mb = (float) str_replace(',', '.', $knowledge->MB);
    //                 $md = (float) str_replace(',', '.', $knowledge->MD);
    //                 $cf_current = $mb - $md;

    //                 if(count($data) == 0){
    //                     $cf_combine = $cf_current;
    //                 } else {
    //                     $cf_combine = $cf_combine + ($cf_current * (1 - $cf_combine));
    //                 }

    //                 $data[$key] = [
    //                     'mb' => $mb,
    //                     'md' => $md,
    //                     'cf' => $cf_current
    //                 ];
    //             }
    //         }

    //         if(count($data) > 0){
    //             $cf[$i] = [
    //                 'name'  => $penyakit->nama_penyakit,
    //                 'value' => $cf_combine
    //             ];
    //         }
    //     }

    //     $arr_keys = array_keys($cf);
    //     $column = array_column($cf, 'value');
    //     $max = max($column);
    //     $index = array_search($max, $column);

    //     $hasil = [
    //         "gejala" => $data_gejala,
    //         "kesimpulan" => $cf[$arr_keys[$index]]
    //     ];
    //     // dd($hasil['kesimpulan']['name']);
    //     $datadiri = DataDiri::create([
    //         'name'=> $request->name,
    //         'no_telp'=> $request->no_telp,
    //         'address'=> $request->address,
    //         'tanggal'=> $request->tanggal,
    //     ]);
    //     $caridiagnosa = Penyakit::where('nama_penyakit', $hasil['kesimpulan']['name'])->first();
    //     $tambahdiagnosa = Diagnosa::create([
    //         'id_penyakit' => $caridiagnosa->id,
    //         'id_datadiri' => $datadiri->id,
    //     ]);
    //     $pdf = PDF::loadView('pengunjung.diagnosa.pdf', ['data' =>  $hasil , 'cf' => $cf, 'datadiri'=>$datadiri])
    //         ->setPaper('a4', 'portrait');

    //     return $pdf->stream();
    // }
    public function calculate(Request $request)
{
    // Ambil data penyakit beserta knowledge-nya
    $penyakits = Penyakit::with('knowledge')->get();
    $cf = [];
    $gejalas = [];
    $data_gejala = [];

    // Filter dan ambil data gejala dari request
    foreach($request->gejala as $gejala){
        if($gejala != 'tidak') {
            $gejalas[] = str_replace('iya|', '', $gejala);
        }
    }

    foreach($gejalas as $gejala){
        $data = Gejala::find($gejala);
        if ($data) {
            $data_gejala[] = $data->nama_gejala;
        }
    }

    // Hitung certainty factor untuk setiap penyakit
    foreach($penyakits as $i => $penyakit){
        $data = [];
        $cf_combine = 0;

        foreach($gejalas as $key => $gejala){
            $knowledge = $penyakit->knowledge->where('id_gejala', $gejala)->first();

            if($knowledge){
                $mb = (float) str_replace(',', '.', $knowledge->MB);
                $md = (float) str_replace(',', '.', $knowledge->MD);
                $cf_current = $mb - $md;

                if(count($data) == 0){
                    $cf_combine = $cf_current;
                } else {
                    $cf_combine = $cf_combine + ($cf_current * (1 - $cf_combine));
                }

                $data[$key] = [
                    'mb' => $mb,
                    'md' => $md,
                    'cf' => $cf_current
                ];
            }
        }

        if(count($data) > 0){
            $cf[$i] = [
                'name'  => $penyakit->nama_penyakit,
                'value' => $cf_combine
            ];
        }
    }

    // Tentukan penyakit dengan CF tertinggi
    $arr_keys = array_keys($cf);
    $column = array_column($cf, 'value');
    $max = max($column);
    $index = array_search($max, $column);

    $hasil = [
        "gejala" => $data_gejala,
        "kesimpulan" => $cf[$arr_keys[$index]]
    ];
    $names = array_column($cf, 'name');
    $presentase = array_column($cf, 'value');

// Mengalikan setiap elemen dalam array dengan 100
    $hitungpresentase = array_map(function($value) {
        return $value * 100;
    }, $presentase);

    // dd($hitungpresentase);

    // Pastikan pembuatan DataDiri dan Diagnosa hanya dilakukan sekali
    $datadiri = DataDiri::updateOrCreate(
        ['name' => $request->name, 'no_telp' => $request->no_telp, 'address' => $request->address, 'tanggal' => $request->tanggal],
        ['name' => $request->name, 'no_telp' => $request->no_telp, 'address' => $request->address, 'tanggal' => $request->tanggal]
    );

    $caridiagnosa = Penyakit::where('nama_penyakit', $hasil['kesimpulan']['name'])->first();

    if ($caridiagnosa) {
        $tambahdiagnosa = Diagnosa::updateOrCreate(
            [
                'id_penyakit' => $caridiagnosa->id,
                'id_datadiri' => $datadiri->id
            ],
            ['presentase' => $hasil['kesimpulan']['value'] * 100]
        );

        // Loop untuk setiap gejala
        foreach ($data_gejala as $nama_gejala) {
            $carigejala = Gejala::where('nama_gejala', $nama_gejala)->first();
            if ($carigejala) {
                Hasil::updateOrCreate(
                    [
                        'id_diagnosa' => $tambahdiagnosa->id,
                        'id_gejala' => $carigejala->id,
                    ]
                );
            }
        }
        foreach ($names as $key => $nama_penyakit) {
            $caripenyakit = Penyakit::where('nama_penyakit', $nama_penyakit)->first();
            if ($caripenyakit) {
                HasilPenyakit::updateOrCreate(
                    [
                        'id_diagnosa' => $tambahdiagnosa->id,
                        'id_penyakit' => $caripenyakit->id,
                    ],
                    ['presentase' => $hitungpresentase[$key]]  // Akses nilai yang benar dari array
                );
            }
        }

    }

    // $pdf = PDF::loadView('pengunjung.diagnosa.pdf', ['data' =>  $hasil , 'cf' => $cf, 'datadiri' => $datadiri])
    //     ->setPaper('a4', 'portrait');

    // return $pdf->stream();
    $caridatahasil = Diagnosa::where('id_datadiri',$datadiri->id)->first();
    $data['hasil'] = $caridatahasil;
    // dd($caridatahasil);
    return view('pengunjung.diagnosa.hasil',$data);
}
public function cetak($id)  {
    $data = Diagnosa::where('id',$id)->first();
    // dd($data);
    $pdf = PDF::loadView('pengunjung.diagnosa.pdf', ['data' =>  $data])
            ->setPaper('a4', 'portrait');

    return $pdf->stream();

}



}

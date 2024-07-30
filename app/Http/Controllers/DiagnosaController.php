<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\Penyakit;


class DiagnosaController extends Controller
{
    public function index($dataDiriId)
    {
        // Ambil data gejala dari database
        $gejala = Gejala::all();

        return view('pengunjung.diagnosa.diagnosa', compact('gejala', 'dataDiriId'));
    }

    function calculate(Request $request){
        $penyakits = Penyakit::with('knowledge')->get();
        $cf = [];

        foreach($request->gejala as $gejala){
            if($gejala != 'tidak')
                $gejalas[] = str_replace('iya|', '', $gejala);
        }

        foreach($penyakits as $i => $penyakit){
            $data = [];

            try{
                foreach($gejalas as $key => $gejala){
                    $knowledge = null;
                    $knowledge = $penyakit->knowledge->where('id_gejala', $gejala)->first();

                    if($knowledge){
                        if(count($data) == 0){
                            $mb = 0;
                            $md = 0;
                            $mb_new = (float)$string_with_dot = str_replace(',', '.', $knowledge->MB);
                            $md_new = (float)$string_with_dot = str_replace(',', '.', $knowledge->MD);
                        }else{
                            $mb = $data[$key - 1]['mb'];
                            $md = $data[$key - 1]['md'];
                            $mb_new = $mb + ($mb_new * (1 - $mb));
                            $md_new = $md + ($md_new * (1 - $md));

                        }

                        $data[$key] = [
                            'mb' => (float)$string_with_dot = str_replace(',', '.', $knowledge->MB),
                            'md' => (float)$string_with_dot = str_replace(',', '.', $knowledge->MD)
                        ];

                    }
                }
            }catch(\Exception $e){
                dd($e->getMessage(), $data, $knowledge, $key);
            }
            // dd($data, $mb_new, $md_new);

            if(count($data) > 0)
                $cf[$i] = [
                    'name'  => $penyakit->nama_penyakit,
                    'value' => $mb_new - $md_new
                ];

        }
        // dd($cf, $gejalas);

        $arr_keys = array_keys($cf);
        // dd($arr_keys);

        $column = array_column($cf, 'value');
        $max = max($column);
        // dd($max);
        $index = array_search($max, $column);
        // dd($index);

        return $cf[$arr_keys[$index]];
        $result['cf'] = $cf[$arr_keys[$index]];



        // return pdf('pengunjung.diagnosa.hasil', $result);

    }
}

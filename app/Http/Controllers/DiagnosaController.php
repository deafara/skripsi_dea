<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosa;

class DiagnosaController extends Controller
{
    public function index($dataDiriId)
    {
        return view('pengunjung.diagnosa.diagnosa', ['dataDiriId' => $dataDiriId]);
    }

    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'data_diri_id' => 'required|exists:data_diris,id',
            'symptoms' => 'required|string',
        ]);

        // Simpan data diagnosa ke database
        Diagnosa::create($validatedData);

        return redirect()->route('diagnosa.index', ['dataDiriId' => $request->data_diri_id])->with('success', 'Form berhasil dikirim!');
    }
}

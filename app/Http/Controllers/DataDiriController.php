<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiri;

class DataDiriController extends Controller
{
    public function create()
    {
        return view('pengunjung.diagnosa.form_data_diri');
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'no_telp' => 'required|integer',
            'address' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        // Simpan data
        $dataDiri = DataDiri::create($validatedData);

        // Redirect ke halaman diagnosa dengan ID data diri
        return redirect()->route('diagnosa', ['dataDiriId' => $dataDiri->id]);
    }
}


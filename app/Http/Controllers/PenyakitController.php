<?php

namespace App\Http\Controllers;
use App\Models\Penyakit;

use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
    {
        $penyakits = Penyakit::all();
        return view('admin.penyakit.index', compact('penyakits'));
    }

    public function store(Request $request){
        Penyakit::create([
            'kode_penyakit' => $request->kode_penyakit,
            'nama_penyakit' => $request->nama_penyakit,
            'deskripsi' => $request->deskripsi,
            'solusi' => $request->solusi,
        ]);
        return redirect()->back()->with('succes', 'Penyakit berhasil ditambahkan.');
    }

    public function edit($id){
        $penyakit = Penyakit::findOrFail($id);
        return view('admin.penyakit.edit', compact('penyakit'));
    }

    public function update(Request $request, $id){
        $penyakits = Penyakit::findOrFail($id);
        $penyakits->update($request->all());
        return redirect()->route('penyakits.index')->with('success', 'Penyakit berhasil diperbarui');
    }

    public function destroy(Penyakit $penyakits){
        $penyakits->delete();
        return redirect()->route('penyakits.index')->with('success', 'Penyakit deleted successfully');
    }
    
}

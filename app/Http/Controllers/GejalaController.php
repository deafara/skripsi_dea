<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
        return view('admin.gejala.index', compact('gejala'));
    }

    public function store(Request $request)
    {
        Gejala::create([
            'kode_gejala' => $request->kode_gejala,
            'nama_gejala' => $request->nama_gejala,
        ]);
        return redirect()->back()->with('success', 'Gejala berhasil ditambahkan.');
    }

    public function edit($id){
        $gejala = Gejala::findOrFail($id);
        return view('admin.gejala.edit', compact('gejala'));
    }

    public function update(Request $request, $id){
        $gejala = Gejala::findOrFail($id);
        $gejala->update($request->all());
        return redirect()->route('gejalas.index')->with('success', 'Gejala berhasil diperbarui');
    }

    public function destroy(Gejala $gejala){
        $gejala->delete();
        return redirect()->route('gejalas.index')->with('success', 'Gejala berhasil dihapus');
    }
}

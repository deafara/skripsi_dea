<?php
namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
    {
        $penyakit = Penyakit::all();
        return view('admin.penyakit.index', compact('penyakit'));
    }

    public function store(Request $request){
        Penyakit::create([
            'kode_penyakit' => $request->kode_penyakit,
            'nama_penyakit' => $request->nama_penyakit,
            'deskripsi' => $request->deskripsi,
            'solusi' => $request->solusi,
        ]);
        return redirect()->back()->with('success', 'Penyakit berhasil ditambahkan.');
    }

    public function edit($id){
        $penyakit = Penyakit::findOrFail($id);
        return view('admin.penyakit.edit', compact('penyakit'));
    }

    public function update(Request $request, $id){
        $penyakit = Penyakit::findOrFail($id);
        $penyakit->update($request->all());
        return redirect()->route('penyakits.index')->with('success', 'Penyakit berhasil diperbarui');
    }

    public function destroy(Penyakit $penyakit){
        $penyakit->delete();
        return redirect()->route('penyakits.index')->with('success', 'Penyakit berhasil dihapus');
    }
}

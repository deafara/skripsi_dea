<?php

namespace App\Http\Controllers;

use App\Models\Knowledge;
use App\Models\Penyakit;
use App\Models\Gejala;
use Illuminate\Http\Request;

class KnowledgeController extends Controller
{
    public function index()
    {
        $knowledges = Knowledge::all();
        $penyakit = Penyakit::all();
        $gejala = Gejala::all();
        return view('admin.knowledge.index', compact('knowledges', 'penyakit', 'gejala'));
    }

    public function store(Request $request)
    {
        Knowledge::create([
            'id_penyakit' => $request->id_penyakit,
            'id_gejala' => $request->id_gejala,
            'MB' => $request->MB,
            'MD' => $request->MD,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
{
    $knowledge = Knowledge::findOrFail($id);
    $penyakitList = Penyakit::all(); // Get all penyakit
    $gejalaList = Gejala::all(); // Get all gejala

    return view('admin.knowledge.edit', compact('knowledge', 'penyakitList', 'gejalaList'));
}



public function update(Request $request, $id)
{
    $knowledge = Knowledge::findOrFail($id);

    // Update the knowledge object with request data
    $knowledge->update([
        'id_penyakit' => $request->id_penyakit,
        'id_gejala' => $request->id_gejala,
        'MB' => $request->MB,
        'MD' => $request->MD,
    ]);

    return redirect()->route('knowledges.index')->with('success', 'Data berhasil diperbarui');
}



    public function destroy(Knowledge $knowledge)
    {
        $knowledge->delete();
        return redirect()->route('knowledges.index')->with('success', 'Data berhasil dihapus');
    }
}

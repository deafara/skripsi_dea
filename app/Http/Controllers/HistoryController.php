<?php

namespace App\Http\Controllers;
use App\Models\Diagnosa;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $histori = Diagnosa::all();
        $data['histori'] = $histori;
        return view('admin.history.index',$data);
    }

    public function store(Request $request)
{
    // Validate and process the form data
    $dataDiri = DataDiri::create($request->all());

    // Redirect to the "Form Diagnosa" view with the necessary data
    return redirect()->route('diagnosa.view', ['dataDiriId' => $dataDiri->id]);
}

}

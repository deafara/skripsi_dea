<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {

        return view('admin.history.index');
    }

    public function store(Request $request)
{
    // Validate and process the form data
    $dataDiri = DataDiri::create($request->all());

    // Redirect to the "Form Diagnosa" view with the necessary data
    return redirect()->route('diagnosa.view', ['dataDiriId' => $dataDiri->id]);
}

}

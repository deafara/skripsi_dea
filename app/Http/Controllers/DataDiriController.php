<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataDiriController extends Controller
{
    public function showForm()
    {
        return view('pengunjung.diagnosa.form_data_diri');
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\HistoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/pengunjung', function () {
    return view('pengunjung.index');
});

// Rute untuk form data diri
Route::get('/form-data-diri', [DataDiriController::class, 'create'])->name('form_data_diri');
Route::post('/data_diri', [DataDiriController::class, 'store'])->name('data_diri.store');

// Rute untuk diagnosa
Route::get('/diagnosa/{dataDiriId}', [DiagnosaController::class, 'index'])->name('diagnosa');
Route::post('hitung-diagnosa', [DiagnosaController::class, 'calculate'])->name('calculate');

// Route lainnya
Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::resource('gejalas', GejalaController::class);
Route::resource('penyakits', PenyakitController::class);
Route::resource('knowledges', KnowledgeController::class);
Route::resource('histories', HistoryController::class);

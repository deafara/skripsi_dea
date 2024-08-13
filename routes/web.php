<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

// Halaman Welcome
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.admin');
    })->name('admin.admin');

    // Rute Resource untuk Admin
    Route::resource('gejalas', GejalaController::class);
    Route::resource('penyakits', PenyakitController::class);
    Route::resource('knowledges', KnowledgeController::class);
    Route::resource('histories', HistoryController::class);
});

// Halaman Pengunjung
Route::get('/pengunjung', function () {
    return view('pengunjung.index');
});
 Route::get('/pengunjung/hasil', function () {
    return view('pengunjung.diagnosa.hasil');
});
Route::get('cetak-pdf/{id}',[DiagnosaController::class,'cetak'])->name('cetak-pdf');

// Rute untuk Form Data Diri
Route::get('/form-data-diri', [DataDiriController::class, 'create'])->name('form_data_diri');
Route::post('/data_diri', [DataDiriController::class, 'store'])->name('data_diri.store');

// Rute untuk Diagnosa
Route::get('/diagnosa/{dataDiriId}', [DiagnosaController::class, 'index'])->name('diagnosa');
Route::post('hitung-diagnosa', [DiagnosaController::class, 'calculate'])->name('calculate');



// Rute Autentikasi
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

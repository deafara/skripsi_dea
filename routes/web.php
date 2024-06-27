<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\KnowledgeController;

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
Route::get('/form-data-diri', [DataDiriController::class, 'showForm'])->name('form.data.diri');
Route::get('/diagnosa/{id}', [DiagnosaController::class, 'index'])->name('form.data.diri');
// Route::get('/diagnosa', 'DiagnosaController@index')->name('diagnosa');
// Route::post('/diagnosa', [DiagnosaController::class, 'submit'])->name('diagnosa.submit');

Route::resource('gejalas', GejalaController::class);
Route::resource('penyakits', PenyakitController::class);
Route::resource('knowledges', KnowledgeController::class);

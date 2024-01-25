<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::post('loginaksi',  [\App\Http\Controllers\LoginController::class, 'loginaksi'])->name('loginaksi');
Route::get('dashboard',  [\App\Http\Controllers\LoginController::class, 'dashboard'])->name('dashboard');

Route::resource('/siswa',
\App\Http\Controllers\siswaController::class)->middleware('auth');

Route::resource('/kemajuan',
\App\Http\Controllers\KemajuanController::class)->middleware('auth');

Route::resource('/kehadiran',
\App\Http\Controllers\KehadiranController::class)->middleware('auth');

// Route::resource('/kelas',
// \App\Http\Controllers\KelasController::class)->middleware('auth');
Route::post('/kelas/create', [\App\Http\Controllers\KelasController::class, 'create'])->name('kelas.create');
Route::post('/kelas/store', [\App\Http\Controllers\KelasController::class, 'store'])->name('kelas.store');
Route::get('/kelas/edit/{id}', [\App\Http\Controllers\KelasController::class, 'edit'])->name('kelas.edit');
Route::put('/kelas/update/{id}', [\App\Http\Controllers\KelasController::class, 'update'])->name('kelas.update');
Route::delete('/kelas/delete/{id}', [\App\Http\Controllers\KelasController::class, 'destroy'])->name('kelas.destroy');

Route::get('/listsiswa', [\App\Http\Controllers\KehadiranController::class, 'listsiswa'])->name('listsiswa');

Route::resource('/kebutuhan', 
\App\Http\Controllers\KebutuhanController::class)->middleware('auth');

Route::resource('/riwayat_medis', 
\App\Http\Controllers\Riwayat_medisController::class)->middleware('auth');


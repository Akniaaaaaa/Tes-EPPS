<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/store-login', [AuthController::class, 'store'])->name('store-login');

Auth::routes();
Route::middleware('auth:pegawai')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::get('/admin/soal', [App\Http\Controllers\AdminController::class, 'soal'])->name('soal');
    Route::get('/admin/hasil', [App\Http\Controllers\HasilController::class, 'hasil_peserta'])->name('hasil');
    Route::get('/admin/tambah_soal', [App\Http\Controllers\AdminController::class, 'tambah_soal'])->name('admin/tambah_soal');
    Route::post('/admin/soal', [App\Http\Controllers\AdminController::class, 'store']);
    Route::get('/admin/peserta', [App\Http\Controllers\AdminController::class, 'peserta'])->name('admin/peserta');
    Route::post('/admin/tambah_peserta', [App\Http\Controllers\AdminController::class, 'tambah_peserta'])->name('admin/tambah_peserta');
    Route::get('/admin/info/{peserta}', [App\Http\Controllers\AdminController::class, 'info_peserta'])->name('admin/info');
    Route::get('/admin/hapus/{peserta}', [App\Http\Controllers\AdminController::class, 'hapus_peserta'])->name('admin/info');
    Route::get('/admin/cari_soal', [App\Http\Controllers\AdminController::class, 'cari_soal']);
    Route::get('/admin/{id}/hapus_soal', [App\Http\Controllers\AdminController::class, 'hapus_soal']);
    Route::get('/admin/{id}/edit_soal', [App\Http\Controllers\AdminController::class, 'edit_soal']);
    Route::get('/admin/jadwal_tes', [App\Http\Controllers\JadwalController::class, 'index'])->name('admin/jadwal_tes');
    Route::get('/admin/ubah_jadwal/{id}', [App\Http\Controllers\JadwalController::class, 'ubah_jadwal'])->name('admin/ubah_jadwal');
    Route::get('/admin/hapus_jadwal_tes/{id}', [App\Http\Controllers\JadwalController::class, 'hapus_jadwal_tes'])->name('admin/hapus_jadwal_tes');
    Route::get('/admin/info_peserta/{id}', [App\Http\Controllers\HasilController::class, 'info_peserta'])->name('admin/info_peserta');
    Route::get('/admin/tambah_jadwal', [App\Http\Controllers\JadwalController::class, 'create'])->name('admin/tambah_jadwal');
    Route::post('/admin/store_jadwal', [App\Http\Controllers\JadwalController::class, 'store']);
    Route::patch('/admin/store_ubah_jadwal', [App\Http\Controllers\JadwalController::class, 'store_ubah_jadwal']);
    Route::post('/admin/analisis/{id}', [App\Http\Controllers\HasilController::class, 'analisis'])->name('admin/analisis');
});
Route::get('/peserta/buat_akun', [App\Http\Controllers\PesertaController::class, 'buat_akun'])->name('peserta/buat_akun');
Route::post('/peserta/store_akun', [App\Http\Controllers\PesertaController::class, 'store_akun'])->name('peserta/store_akun');
Route::middleware('auth:peserta')->group(function () {
    Route::get('/peserta/petunjuk', [App\Http\Controllers\PesertaController::class, 'petunjuk'])->name('petunjuk');
    Route::get('/peserta/jadwal', [App\Http\Controllers\JadwalController::class, 'jadwal_peserta'])->name('jadwal_peserta');
    Route::get('/peserta/ubah_akun/{peserta}', [App\Http\Controllers\PesertaController::class, 'ubah_akun'])->name('peserta/ubah_akun');
    Route::post('/peserta/simpan_perubahan/{peserta}', [App\Http\Controllers\PesertaController::class, 'simpan_perubahan'])->name('peserta/simpan_perubahan');
    Route::get('/peserta/token', [App\Http\Controllers\JadwalController::class, 'token'])->name('token.peserta');
    Route::post('/peserta/jawaban', [App\Http\Controllers\PesertaController::class, 'jawaban'])->name('peserta.jawaban');
    Route::get('/peserta/soal/{nomor}', [App\Http\Controllers\PesertaController::class, 'lihat'])->name('soal');
    Route::get('/peserta/hpp/{peserta}', [App\Http\Controllers\HasilController::class, 'hasil'])->name('hasil.peserta');
    Route::get('/peserta/hasil/{id}', [App\Http\Controllers\HasilController::class, 'cetak_hasil'])->name('hpp.peserta');
    Route::get('/peserta/profile/{peserta}', [App\Http\Controllers\PesertaController::class, 'profile'])->name('profile.peserta');
    Route::get('/peserta/konfirmasi_token/{peserta}', [App\Http\Controllers\JadwalController::class, 'konfirmasi_token'])->name('konfirmasi_token.peserta');
    Route::get('/peserta/jadwal/{peserta}', [App\Http\Controllers\PesertaController::class, 'jadwal_peserta'])->name('jadwal.peserta');
    Route::get('/peserta/petunjuk', [App\Http\Controllers\PesertaController::class, 'petunjuk'])->name('petunjuk');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

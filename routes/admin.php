<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\UlasanController;
use App\Http\Middleware\IsAdmin;

Route::middleware(['admin', 'isadmin'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/buat', [UserController::class, 'buat'])->name('buat');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
    Route::get('/del/{id}', [UserController::class, 'destroy'])->name('destroy');

    Route::resource('/loker', LokerController::class);
    Route::get('/bikin', [LokerController::class, 'create'])->name('bikin');
    Route::post('/simpan', [LokerController::class, 'store'])->name('simpan');
    Route::get('/ganti/{id}', [LokerController::class, 'edit'])->name('ganti');
    Route::post('/upgrade/{id}', [LokerController::class, 'update'])->name('upgrade');
    Route::get('/apus/{id}', [LokerController::class, 'destroy'])->name('apus');

    Route::resource('/lamaran', LamaranController::class);
    Route::get('/tambah', [LamaranController::class, 'create'])->name('tambah');
    Route::post('/save', [LamaranController::class, 'store'])->name('save');
    Route::get('/cetakLamaran', [LamaranController::class, 'cetak'])->name('cetak');
    Route::get('/ubah/{id}', [LamaranController::class, 'edit'])->name('ubah');
    Route::post('/perbarui/{id}', [LamaranController::class, 'update'])->name('perbarui');
    Route::get('/hapus/{id}', [LamaranController::class, 'destroy'])->name('hapus');
    Route::get('/unduh-Laporan-Data-Lamaran-Kerja-pdf', [LamaranController::class, 'unduhpdf'])->name('unduhpdf');
    Route::get('/unduh-Laporan-Data-Lamaran-Kerja-xlsx', [LamaranController::class, 'unduhexcel'])->name('unduhexcel');

    Route::resource('/informasi', InformasiController::class);
    Route::get('/made', [InformasiController::class, 'create'])->name('made');
    Route::post('/post', [InformasiController::class, 'store'])->name('post');
    Route::get('/new/{id}', [InformasiController::class, 'edit'])->name('new');
    Route::put('/baru/{id}', [informasiController::class, 'update'])->name('rubah');
    Route::get('/buang/{id}', [informasiController::class, 'destroy'])->name('buang');

    Route::resource('/ulasan', UlasanController::class);
    Route::get('/new', [UlasanController::class, 'create'])->name('baru');
    Route::post('/create', [UlasanController::class, 'store'])->name('simpan');
    Route::get('/change/{id}', [UlasanController::class, 'edit'])->name('mengubah');
    Route::put('/changed/{id}', [UlasanController::class, 'update'])->name('mengupdate');
    Route::get('/sampah/{id}', [UlasanController::class, 'destroy'])->name('sampah');
});

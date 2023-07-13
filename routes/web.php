<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\UlasanController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use App\Http\Middleware\IsCountry;


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

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'loginUser']);
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/daftar', [UserController::class, 'registerUser'])->name('registrasi');

Route::middleware([IsUser::class])->group(function () {


    Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');

});

// require __DIR__ . '/admin.php';
Route::middleware([IsCountry::class])->group(function () {

    Route::get('/country.dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/country.lamaran', [LamaranController::class, 'index'])->name('lamaran');
    Route::get('/tambah', [LamaranController::class, 'create'])->name('tambah');
    Route::post('/save', [LamaranController::class, 'store'])->name('save');
    Route::get('/cetakLamaran', [LamaranController::class, 'cetak'])->name('cetak');
    Route::get('/ubah/{id}', [LamaranController::class, 'edit'])->name('ubah');
    Route::post('/perbarui/{id}', [LamaranController::class, 'update'])->name('perbarui');
    Route::get('/hapus/{id}', [LamaranController::class, 'destroy'])->name('hapus');
    Route::get('/unduh-Laporan-Data-Lamaran-Kerja-pdf', [LamaranController::class, 'unduhpdf'])->name('unduhpdf');
    Route::get('/unduh-Laporan-Data-Lamaran-Kerja-xlsx', [LamaranController::class, 'unduhexcel'])->name('unduhexcel');


    Route::get('/country.ulasan', [UlasanController::class, 'index'])->name('ulasan');
    Route::get('/new', [UlasanController::class, 'create'])->name('baru');
    Route::post('/country.create', [UlasanController::class, 'store'])->name('simpan');
    Route::get('/change/{id}', [UlasanController::class, 'edit'])->name('mengubah');
    Route::put('/country.changed/{id}', [UlasanController::class, 'update'])->name('mengupdate');
    Route::get('/sampah/{id}', [UlasanController::class, 'destroy'])->name('sampah');

    Route::get('/country.loker', [LokerController::class, 'index'])->name('loker');
    Route::get('/bikin', [LokerController::class, 'create'])->name('bikin');
    Route::post('/country.simpan', [LokerController::class, 'store'])->name('simpan');
    Route::get('/ganti/{id}', [LokerController::class, 'edit'])->name('ganti');
    Route::post('/country.upgrade/{id}', [LokerController::class, 'update'])->name('upgrade');
    Route::get('/apus/{id}', [LokerController::class, 'destroy'])->name('apus');

});


Route::middleware([IsAdmin::class])->group(function () {

    Route::get('/validasi/{value}/{id}', [UserController::class, 'validasi'])->name('validasi');

    Route::get('/kelolaadmin', [UserController::class, 'keladmin'])->name('kelolaadmin');
    Route::get('/kelolapencaker', [UserController::class, 'kelpencaker'])->name('kelolapencaker');
    Route::get('/kelolaperusahaan', [UserController::class, 'kelperusahaan'])->name('kelolaperusahaan');
    Route::get('/kelolaalumni', [UserController::class, 'kelalumni'])->name('kelolaalumni');

    Route::resource('/lamaran', LamaranController::class);
    Route::get('/tambah', [LamaranController::class, 'create'])->name('tambah');
    Route::post('/save', [LamaranController::class, 'store'])->name('save');
    Route::get('/cetakLamaran', [LamaranController::class, 'cetak'])->name('cetak');
    Route::get('/ubah/{id}', [LamaranController::class, 'edit'])->name('ubah');
    Route::post('/perbarui/{id}', [LamaranController::class, 'update'])->name('perbarui');
    Route::get('/hapus/{id}', [LamaranController::class, 'destroy'])->name('hapus');
    Route::get('/unduh-Laporan-Data-Lamaran-Kerja-pdf', [LamaranController::class, 'unduhpdf'])->name('unduhpdf');
    Route::get('/unduh-Laporan-Data-Lamaran-Kerja-xlsx', [LamaranController::class, 'unduhexcel'])->name('unduhexcel');

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

    Route::resource('/kegiatan', KegiatanController::class);
    Route::get('/bakal', [KegiatanController::class, 'create'])->name('bakal');
    Route::post('/cadang', [KegiatanController::class, 'store'])->name('cadang');
    Route::get('/alih/{id}', [KegiatanController::class, 'edit'])->name('alih');
    Route::post('/atur/{id}', [KegiatanController::class, 'update'])->name('atur');
    Route::get('/cabut/{id}', [KegiatanController::class, 'destroy'])->name('apus');

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

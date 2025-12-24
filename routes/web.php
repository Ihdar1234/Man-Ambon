<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    WelcomeController,
    ArtikelController,
    GaleriController,
    DetailController,
    LihatController,
    LayananPublikController,
    PelayananController,
    MapelController,
    UploadController,
    ArtikelVoteController,
    VisiMisiController,
    VisiController,
    StrukturController,
    StrukturOrganisasiController,
    KalenderController,
    PdfController,
    PrifiewController,
    BeritaController,
    SurveiLayananController,
    SurveiController,
    AuthController,
    DaftarSiswaController,
    DokumenSiswaController,
    PTSPController,
    PengajuanController,
    OperatorController,
    Operator\ProfileController
};

use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Laravolt\Indonesia\Models\Province;


// -------------------------
// Authentication
// -------------------------
// =================== LOGIN KHUSUS ===================
Route::get('/login/admin', [AuthController::class, 'showAdminLogin'])->name('login.admin.login-admin');
Route::post('/login/admin', [AuthController::class, 'loginAdmin'])->name('login.admin.post');
// Login siswa
Route::get('/login/siswa', [AuthController::class, 'showSiswaLogin'])->name('login.siswa.login-siswa');
Route::post('/login/siswa', [AuthController::class, 'loginSiswa'])->name('login.siswa.post');

// Login masyarakat
Route::get('/login/masyarakat', [AuthController::class, 'showMasyarakatLogin'])->name('login.masyarakat.login-masyarakat');
Route::post('/login/masyarakat', [AuthController::class, 'loginMasyarakat'])->name('login.masyarakat.post');

// Login Operator & TU digabung

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// 🟢 REGISTER SISWA
Route::get('/register-siswa', [AuthController::class, 'showSiswaRegister'])->name('register.siswa');
Route::post('/register-siswa', [AuthController::class, 'registerSiswa'])->name('register.siswa.post');

// 🟢 REGISTER MASYARAKAT
Route::get('/register-masyarakat', [AuthController::class, 'showMasyarakatRegister'])->name('register.masyarakat');
Route::post('/register-masyarakat', [AuthController::class, 'registerMasyarakat'])->name('register.masyarakat.post');

// 🏠 DASHBOARD PER ROLE


// routes/web.php
Route::middleware(['auth', 'role:operator'])->group(function () {
    Route::get('/dashboard/operator/home', [OperatorController::class, 'dashboard'])->name('dashboard.operator.home.index');
    Route::get('/dashboard/operator/pengajuan', [OperatorController::class, 'pengajuan'])->name('dashboard.operator.pengajuan.index');
    Route::get('/dashboard/operator/pengajuan/{id}', [OperatorController::class, 'detail'])->name('dashboard.operator.pengajuan.show');
    Route::post('/dashboard/operator/pengajuan/{id}/status', 
    [OperatorController::class, 'updateStatus']
)->name('operator.pengajuan.status');
    Route::get('/dashboard/operator/users', fn() => 'users')->name('dashboard.operator.users.index');
   Route::get('/dashboard/operator/pengaturan', function () {
    return view('dashboard.operator.pengaturan.index');
})->name('dashboard.operator.pengaturan.index');

Route::delete('/dashboard/operator/pengajuan/{id}', [OperatorController::class, 'destroy'])
     ->name('operator.pengajuan.destroy');

Route::get('/dashboard/operator/profile', [ProfileController::class, 'index'])->name('operator.profile');
    Route::post('profile', [ProfileController::class, 'update'])->name('operator.profile.update');

Route::post('/dashboard/operator/pengajuan/{id}/kirimfile', [OperatorController::class, 'kirimFile'])->name('dashboard.operator.pengajuan.kirimfile');
});

Route::get('/siswa/dashboard', fn() => view('dashboard.siswa.siswa'))->name('siswa');
Route::get('/masyarakat/dashboard', fn() => view('dashboard.masyarakat'))->name('masyarakat.dashboard');
// -------------------------
// PDF
// -------------------------
Route::get('/pdf-drive/{slug}', [PdfController::class, 'openDrive'])->name('pdfs.navbar');

// -------------------------
// Halaman Depan (Home)
// -------------------------
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita{slug}', [BeritaController::class, 'show'])->name('berita.show');

// Detail artikel & galeri di home
Route::get('/home/artikel/{slug}', [LihatController::class, 'lihat'])->name('home.artikel.lihat');
Route::get('/home/{slug}', [DetailController::class, 'detail'])->name('home.detail');

// Voting artikel
Route::post('/artikel/{slug}/vote', [WelcomeController::class, 'vote'])->name('artikel.vote');

// -------------------------
// Layout Preview
// -------------------------
Route::view('/layouts', 'layouts.app');

// -------------------------

// Admin Routes
// -------------------------
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/login/operator', [AuthController::class, 'showOperatorLogin'])->name('login.operator.login-operator');
Route::post('/login/operator', [AuthController::class, 'loginOperator'])->name('login.operator.post');
Route::get('/register-operator', [AuthController::class, 'showOperatorRegister'])->name('register.operator');
Route::post('/register-operator', [AuthController::class, 'registerOperator'])->name('register.operator.post');

    // Dashboard
    Route::get('/backend', fn() => view('backend.dashboard'))->name('dashboard');

    // Kalender
    Route::resource('kalender', KalenderController::class);

    // Galeri
    Route::prefix('gambar')->name('gambar.')->group(function () {
        Route::get('/', [GaleriController::class, 'index'])->name('index');
        Route::get('/create', [GaleriController::class, 'create'])->name('create');
        Route::post('/store', [GaleriController::class, 'store'])->name('store');
        Route::get('/{galeri:slug}', [GaleriController::class, 'show'])->name('show');
        Route::get('/{galeri:slug}/edit', [GaleriController::class, 'edit'])->name('edit');
        Route::put('/{galeri:slug}', [GaleriController::class, 'update'])->name('update');
        Route::delete('/{galeri:slug}', [GaleriController::class, 'destroy'])->name('destroy');
    });

    // Tambah Galeri
    Route::resource('tambah', GaleriController::class)->names([
        'index'   => 'tambah.index',
        'create'  => 'tambah.create',
        'store'   => 'tambah.store',
        'show'    => 'tambah.show',
        'edit'    => 'tambah.edit',
        'update'  => 'tambah.update',
        'destroy' => 'tambah.destroy',
    ]);

    // Visi & Misi
    Route::resource('visi-misi', VisiMisiController::class);

    // Struktur
    Route::resource('struktur', StrukturController::class);

    // Survei Layanan (grafik)
    Route::get('/survei/grafik', [SurveiLayananController::class, 'grafik'])->name('survei.grafik');
});


// -------------------------
// Halaman Statis
// -------------------------
Route::view('/sejarah', 'sejarah.index');


// halaman pelayanan publik
Route::view('/layanan/publik', 'layanan.publik.index');
// -------------------------
// Artikel
// -------------------------
Route::resource('artikel', ArtikelController::class);

// -------------------------
// Mapel (Mata Pelajaran)
// -------------------------
Route::resource('mapel', MapelController::class);
Route::post('mapel/mass-destroy', [MapelController::class, 'massDestroy'])->name('mapel.massDestroy');

// -------------------------
// Layanan Publik / Survei
// -------------------------
Route::get('/survei', [SurveiLayananController::class, 'form'])->name('survei.form');
Route::get('/survei', [SurveiLayananController::class, 'index'])->name('survei.index');
Route::post('/survei', [SurveiLayananController::class, 'store'])->name('survei.store');

// -------------------------
// Visi
// -------------------------
Route::get('/visi', [VisiController::class, 'index'])->name('visi.index');
Route::get('/visi/{slug}', [VisiController::class, 'show'])->name('visi.show');

// -------------------------
// Struktur Organisasi
// -------------------------
Route::get('/organisasi', [StrukturOrganisasiController::class, 'index'])->name('organisasi.index');

// -------------------------
// PDF Routes
// -------------------------
Route::prefix('pdfs')->group(function () {
    Route::get('/', [PdfController::class, 'index'])->name('pdfs.index');
    Route::get('/create', [PdfController::class, 'create'])->name('pdfs.create');
    Route::post('/store', [PdfController::class, 'store'])->name('pdfs.store');
    Route::get('/{id}/edit', [PdfController::class, 'edit'])->name('pdfs.edit');
    Route::put('/{id}', [PdfController::class, 'update'])->name('pdfs.update');
    Route::delete('/{id}', [PdfController::class, 'destroy'])->name('pdfs.destroy');

    // Buka langsung di Google Drive
    Route::get('/drive/{slug}', [PdfController::class, 'openDrive'])->name('pdfs.drive');
});

// -------------------------
// Preview
// -------------------------
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/layouts', function () {
        return view('siswa.layouts.siswa');
    })->name('layouts');
Route::get('/siswa', function () {
    // Contoh data dummy
    $totalDokumen = \App\Models\DokumenSiswa::where('user_id', Auth::id())->count();
    $status = 'verifikasi';
    $totalMapel = 6;
    $notifikasiBaru = 2;
    $notifikasis = collect([
        (object)['pesan' => 'Dokumen kamu sudah diverifikasi.', 'created_at' => now()->subHours(3)],
        (object)['pesan' => 'Pengumuman jadwal ujian masuk telah tersedia.', 'created_at' => now()->subDay()],
    ]);
    return view('siswa.index', compact('totalDokumen', 'status', 'totalMapel', 'notifikasiBaru', 'notifikasis'));
})->name('index');

    // 📋 CRUD Daftar Siswa
    Route::resource('/daftar', DaftarSiswaController::class);

    // 📂 CRUD Dokumen Siswa (upload image/pdf)
    Route::resource('/dokumen', DokumenSiswaController::class);

});

// PTSP index

// Route::middleware(['auth','role:operator'])->group(function() {
//     Route::get('/dashboard/operator', [OperatorController::class, 'app'])->name('dashboard.operator.app');
// });


Route::get('/ptsp', [PTSPController::class, 'index'])->name('ptsp.index');
Route::post('/ptsp/store', [PTSPController::class, 'store'])->name('ptsp.store');


Route::get('/ajax/provinces', function () {
    return Province::select('code', 'name')->orderBy('name')->get();
});

Route::get('/ajax/cities/{province}', function ($province) {
    return City::where('province_code', $province)
        ->select('code', 'name')
        ->orderBy('name')
        ->get();
});

Route::get('/ajax/districts/{city}', function ($city) {
    return District::where('city_code', $city)
        ->select('code', 'name')
        ->orderBy('name')
        ->get();
});

Route::get('/ajax/villages/{district}', function ($district) {
    return Village::where('district_code', $district)
        ->select('code', 'name')
        ->orderBy('name')
        ->get();
});
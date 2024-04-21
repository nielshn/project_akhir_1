<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriPelaporController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\PelaporController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\UpdatePasswordController;
use Illuminate\Support\Facades\Route;

// untuk guest
Route::get('/', [GuestController::class, 'index'])->name('guest');
Route::get('detailKategori/{id}/{slug}', [GuestController::class, 'kategori'])->name('detail.kategori');
Route::get('announce', [GuestController::class, 'announcement'])->name('announcement');
Route::get('announce/{id}/{slug}', [GuestController::class, 'showAnnounce'])->name('announcement.detail');
Route::get('download', [GuestController::class, 'file'])->name('download');
Route::get('foto', [GuestController::class, 'foto'])->name('foto');
Route::get('laporan/create', [PelaporController::class, 'create'])->name('laporan.create');
Route::post('laporan/create', [PelaporController::class, 'store']);
Route::get('visiMisi', [GuestController::class, 'showVisiMisi'])->name('visiMisi');
Route::get('sejarah', [GuestController::class, 'showSejarah'])->name('sejarah');
Route::get('personil', [GuestController::class, 'showPersonil'])->name('personil');
Route::get('ruanglingkup', [GuestController::class, 'showRuangLingkup'])->name('ruang.lingkup');
Route::get('tugasfungsi', [GuestController::class, 'showTugasFungsi'])->name('tugas.fungsi');
Route::get('tanggungjawab', [GuestController::class, 'showTanggungJawab'])->name('tanggung.jawab');
Route::get('strukturOrganisasi', [GuestController::class, 'showStruktur'])->name('struktur');
Route::get('question', [GuestController::class, 'question'])->name('question');
Route::get('Artikel/{id}/{slug}', [GuestController::class, 'showArtikel'])->name('detailArtikel');
Route::get('Berita/{id}/{slug}', [GuestController::class, 'showBerita'])->name('detailBerita');
Route::get('AllNews', [GuestController::class, 'allnews'])->name('allNews');
Route::get('AllArtikel', [GuestController::class, 'allArtikel'])->name('allArtikel');
Route::get('AllEvent', [GuestController::class, 'allevent'])->name('allEvent');
Route::get('Event/{id}/{slug}', [GuestController::class, 'showEvent'])->name('detailEvent');
Route::get('detailFoto/{id}/{slug}', [GuestController::class, 'showFoto'])->name('multi.image');
Route::view('contact', 'guest.contact')->name('contact');

// Route for Admin
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [AuthenticatedSessionController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboard/{id}', [AuthenticatedSessionController::class, 'notification'])->name('notif');
    Route::get('timeline', [TimelineController::class, '__invoke'])->name('timeline');
    Route::get('password/edit', [UpdatePasswordController::class, 'edit'])->name('resetPassword.edit');
    Route::put('password/update', [UpdatePasswordController::class, 'update'])->name('resetPassword.update');
    Route::get('laporan', [PelaporController::class, 'index'])->name('laporan.index');
    Route::delete('laporan/{id}', [PelaporController::class, 'destroy'])->name('laporan.destroy');
    Route::resource('faq', FAQController::class);
    Route::resource('meta', MetaController::class)->except(['show']);
    Route::resource('event', EventController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('galery', GaleryController::class);
    Route::resource('kategoriPelapor', KategoriPelaporController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('file', FileController::class);
    Route::resource('profil', ProfilController::class);
    Route::resource('pengumuman', PengumumanController::class);
});
require __DIR__ . '/auth.php';

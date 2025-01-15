<?php

use App\Livewire\Pages\Admin\Dashboard;
use App\Livewire\Pages\Admin\DataPublik\Informasi\Aksi;
use App\Livewire\Pages\Admin\DataPublik\Beranda\Carousel;
use App\Livewire\Pages\Admin\DataPublik\Beranda\Catatan;
use App\Livewire\Pages\Admin\DataPublik\Beranda\Footer;
use App\Livewire\Pages\Admin\DataPublik\Beranda\Layanan;
use App\Livewire\Pages\Admin\DataPublik\Beranda\Sambutan as BerandaSambutan;
use App\Livewire\Pages\Admin\DataPublik\Beranda\Video;
use App\Livewire\Pages\Admin\DataPublik\Bipa\Pendaftaran as BipaPendaftaran;
use App\Livewire\Pages\Admin\DataPublik\Bipa\PlacementTest as BipaPlacementTest;
use App\Livewire\Pages\Admin\DataPublik\Bipa\Program as BipaProgram;
use App\Livewire\Pages\Admin\DataPublik\Faq as DataPublikFaq;
use App\Livewire\Pages\Admin\DataPublik\Informasi\JadwalKelas as InformasiJadwalKelas;
use App\Livewire\Pages\Admin\DataPublik\Informasi\JadwalTes as InformasiJadwalTes;
use App\Livewire\Pages\Admin\DataPublik\Informasi\Jenis;
use App\Livewire\Pages\Admin\DataPublik\Informasi\PendaftaranEpt as InformasiPendaftaranEpt;
use App\Livewire\Pages\Admin\DataPublik\Layanan\Bipa as LayananBipa;
use App\Livewire\Pages\Admin\DataPublik\Layanan\Ept as LayananEpt;
use App\Livewire\Pages\Admin\DataPublik\Layanan\PelatihanBahasa as LayananPelatihanBahasa;
use App\Livewire\Pages\Admin\DataPublik\Profil\Gallery as ProfilGallery;
use App\Livewire\Pages\Admin\DataPublik\Profil\Pengajar as ProfilPengajar;
use App\Livewire\Pages\Admin\DataPublik\Profil\Sambutan as ProfilSambutan;
use App\Livewire\Pages\Admin\DataPublik\Profil\StrukturOrganisasi as ProfilStrukturOrganisasi;
use App\Livewire\Pages\Admin\DataPublik\Profil\VisiMisi as ProfilVisiMisi;
use App\Livewire\Pages\Admin\Settings;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Public\Beranda;
use App\Livewire\Pages\Public\Bipa\Pendaftaran;
use App\Livewire\Pages\Public\Bipa\PlacementTest;
use App\Livewire\Pages\Public\Bipa\Program;
use App\Livewire\Pages\Public\Faq;
use App\Livewire\Pages\Public\Informasi\JadwalKelas;
use App\Livewire\Pages\Public\Informasi\JadwalTes;
use App\Livewire\Pages\Public\Informasi\Jenis as InformasiJenis;
use App\Livewire\Pages\Public\Informasi\PendaftaranEpt;
use App\Livewire\Pages\Public\Layanan\Bipa;
use App\Livewire\Pages\Public\Layanan\Ept;
use App\Livewire\Pages\Public\Layanan\PelatihanBahasa;
use App\Livewire\Pages\Public\Profil\Gallery;
use App\Livewire\Pages\Public\Profil\Pengajar;
use App\Livewire\Pages\Public\Profil\Sambutan;
use App\Livewire\Pages\Public\Profil\StrukturOrganisasi;
use App\Livewire\Pages\Public\Profil\VisiMisi;

Route::get('/', Beranda::class)->name('beranda');

Route::prefix('profil')->group(function () {
  Route::get('/sambutan', Sambutan::class)->name('profil.sambutan');
  Route::get('/visi-misi', VisiMisi::class)->name('profil.visi-misi');
  Route::get('/struktur-organisasi', StrukturOrganisasi::class)->name('profil.struktur-organisasi');
  Route::get('/pengajar', Pengajar::class)->name('profil.pengajar');
  Route::get('/gallery', Gallery::class)->name('profil.gallery');
});
Route::prefix('layanan')->group(function () {
  Route::get('/ept', Ept::class)->name('layanan.ept');
  Route::get('/bipa', Bipa::class)->name('layanan.bipa');
  Route::get('/pelatihan-bahasa', PelatihanBahasa::class)->name('layanan.pelatihan-bahasa');
});
Route::prefix('informasi')->group(function () {
  Route::get('/pendaftaran-ept', PendaftaranEpt::class)->name('informasi.pendaftaran-ept');
  Route::get('/jadwal-kelas', JadwalKelas::class)->name('informasi.jadwal-kelas');
  Route::get('/jadwal-tes', JadwalTes::class)->name('informasi.jadwal-tes');
  Route::get('/{jenis}/{id?}', InformasiJenis::class)->name('informasi.jenis');
});
Route::prefix('bipa')->group(function () {
  Route::get('/program', Program::class)->name('bipa.program');
  Route::get('/pendaftaran', Pendaftaran::class)->name('bipa.pendaftaran');
  Route::get('/placement-test', PlacementTest::class)->name('bipa.placement-test');
});

Route::get('/faq', Faq::class)->name('faq');

// Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

Route::middleware(['auth', 'verified'])->group(function () {
  Route::get('dashboard', Dashboard::class)->name('dashboard');
  Route::get('settings', Settings::class)->name('settings');
  Route::prefix('data-publik')->group(function () {
    Route::prefix('beranda')->group(function () {
      Route::get('carousel', Carousel::class)->name('data-publik.beranda.carousel');
      Route::get('layanan', Layanan::class)->name('data-publik.beranda.layanan');
      Route::get('sambutan', BerandaSambutan::class)->name('data-publik.beranda.sambutan');
      Route::get('video', Video::class)->name('data-publik.beranda.video');
      Route::get('catatan', Catatan::class)->name('data-publik.beranda.catatan');
      Route::get('footer', Footer::class)->name('data-publik.beranda.footer');
    });
    Route::prefix('profil')->group(function () {
      Route::get('sambutan', ProfilSambutan::class)->name('data-publik.profil.sambutan');
      Route::get('visi-misi', ProfilVisiMisi::class)->name('data-publik.profil.visi-misi');
      Route::get('struktur-organisasi', ProfilStrukturOrganisasi::class)->name('data-publik.profil.struktur-organisasi');
      Route::get('pengajar', ProfilPengajar::class)->name('data-publik.profil.pengajar');
      Route::get('gallery', ProfilGallery::class)->name('data-publik.profil.gallery');
    });
    Route::prefix('layanan')->group(function () {
      Route::get('ept', LayananEpt::class)->name('data-publik.layanan.ept');
      Route::get('bipa', LayananBipa::class)->name('data-publik.layanan.bipa');
      Route::get('pelatihan-bahasa', LayananPelatihanBahasa::class)->name('data-publik.layanan.pelatihan-bahasa');
    });
    Route::prefix('informasi')->group(function () {
      Route::get('pendaftaran-ept', InformasiPendaftaranEpt::class)->name('data-publik.informasi.pendaftaran-ept');
      Route::get('jadwal-kelas', InformasiJadwalKelas::class)->name('data-publik.informasi.jadwal-kelas');
      Route::get('jadwal-tes', InformasiJadwalTes::class)->name('data-publik.informasi.jadwal-tes');
      Route::get('{jenis}', Jenis::class)->name('data-publik.informasi.jenis');
      Route::get('{jenis}/{aksi}/{id?}', Aksi::class)->name('data-publik.informasi.jenis.aksi');
    });
    Route::prefix('bipa')->group(function () {
      Route::get('program', BipaProgram::class)->name('data-publik.bipa.program');
      Route::get('pendaftaran', BipaPendaftaran::class)->name('data-publik.bipa.pendaftaran');
      Route::get('placement-test', BipaPlacementTest::class)->name('data-publik.bipa.placement-test');
    });
    Route::get('/faq', DataPublikFaq::class)->name('data-publik.faq');
  });
});

require __DIR__.'/auth.php';

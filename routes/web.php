<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SessionController;
use App\Http\Controllers\Backsite\DataPasarController;
use App\Http\Controllers\Backsite\KecamatanController;
use App\Http\Controllers\Backsite\AduanController;
use App\Http\Controllers\Backsite\MottoController;
use App\Http\Controllers\Frontsite\VisiController;
use App\Http\Controllers\Backsite\BeritaController;
use App\Http\Controllers\Backsite\KontakController;
use App\Http\Controllers\Backsite\LembagaController;
use App\Http\Controllers\Backsite\PotensiController;
use App\Http\Controllers\Backsite\SejarahController;
use App\Http\Controllers\Backsite\StrukturController;
use App\Http\Controllers\Backsite\VisiMisiController;
use App\Http\Controllers\Frontsite\BerandaController;
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\FasilitasController;
use App\Http\Controllers\Backsite\GeografisController;
use App\Http\Controllers\Backsite\IdentitasController;
use App\Http\Controllers\Backsite\PerangkatController;
use App\Http\Controllers\Backsite\JenisSuratController;
use App\Http\Controllers\Backsite\PengumumanController;
use App\Http\Controllers\Frontsite\MottoDesaController;
use App\Http\Controllers\Backsite\PengajuanController;
use App\Http\Controllers\Backsite\DataUmkmController;
use App\Http\Controllers\Backsite\KategoriKoperasiController;
use App\Http\Controllers\Backsite\KategoriUmkmController;
use App\Http\Controllers\Backsite\KoperasiController;
use App\Http\Controllers\Frontsite\BeritaDesaController;
use App\Http\Controllers\Frontsite\KontakDesaController;
use App\Http\Controllers\Frontsite\LayananDesaController;
use App\Http\Controllers\Frontsite\LembagaDesaController;
use App\Http\Controllers\Frontsite\PotensiDesaController;
use App\Http\Controllers\Frontsite\SejarahDesaController;
use App\Http\Controllers\Frontsite\StrukturDesaController;
use App\Http\Controllers\Frontsite\FasilitasDesaController;
use App\Http\Controllers\Frontsite\GeografisDesaController;
use App\Http\Controllers\Frontsite\PerangkatDesaController;
use App\Http\Controllers\Frontsite\PengajuanSuratController;
use App\Http\Controllers\Frontsite\PengumumanDesaController;
use App\Http\Controllers\Frontsite\AduanMasyarakatController;
use App\Http\Controllers\Frontsite\PasarDinasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',function(){
    return redirect()->route('beranda.index');
});

Route::get('/login',[SessionController::class, 'index'])->name('login');
Route::post('/login-proses',[SessionController::class, 'login_proses'])->name('login-proses');
Route::post('/logout',[SessionController::class, 'logout'])->name('logout');

//Beranda
Route::get('/beranda',[BerandaController::class,'index'])->name('beranda.index');

//Berita
Route::get('/berita-desa',[BeritaDesaController::class,'index'])->name('berita-desa.index');
Route::get('/berita-desa/{id}/detail', [BeritaDesaController::class, 'show'])->name('berita-desa.show');

//VisiMisi
Route::get('/visi-misi',[VisiController::class,'index'])->name('visi-misi.index');

//Motto
Route::get('/motto-desa',[MottoDesaController::class,'index'])->name('motto-desa.index');

//Sejarah
Route::get('/sejarah-desa',[SejarahDesaController::class,'index'])->name('sejarah-desa.index');

//Geografis
Route::get('/geografis-desa',[GeografisDesaController::class,'index'])->name('geografis-desa.index');

//Struktur
Route::get('/struktur-desa',[StrukturDesaController::class,'index'])->name('struktur-desa.index');

//Perangkat
Route::get('/perangkat-desa',[PerangkatDesaController::class,'index'])->name('perangkat-desa.index');

//Fasilitas
Route::get('/fasilitas-desa',[FasilitasDesaController::class,'index'])->name('fasilitas-desa.index');
Route::get('/fasilitas-desa/{id}/detail', [FasilitasDesaController::class, 'show'])->name('fasilitas-desa.show');

//Lembaga
Route::get('/lembaga-desa',[LembagaDesaController::class,'index'])->name('lembaga-desa.index');
Route::get('/lembaga-desa/{id}/detail', [LembagaDesaController::class, 'show'])->name('lembaga-desa.show');

//Potensi Desa
Route::get('/potensi-desa',[PotensiDesaController::class,'index'])->name('potensi-desa.index');
Route::get('/potensi-desa/{id}/detail', [PotensiDesaController::class, 'show'])->name('potensi-desa.show');

//Potensi Desa
Route::get('/pengumuman-desa',[PengumumanDesaController::class,'index'])->name('pengumuman-desa.index');
Route::get('/pengumuman-desa/{id}/detail', [PengumumanDesaController::class, 'show'])->name('pengumuman-desa.show');

//kontak
Route::get('/kontak-desa',[KontakDesaController::class,'index'])->name('kontak-desa.index');
Route::post('/kontak-desa',[KontakDesaController::class,'store'])->name('kontak-desa.store');

//Layanan
Route::get('/layanan-desa',[LayananDesaController::class,'index'])->name('layanan-desa.index');

//Pengajuan
Route::get('/pengajuan-surat', [PengajuanSuratController::class, 'index'])->name('pengajuan-surat.index');
Route::get('/pengajuan-surat/create', [PengajuanSuratController::class, 'create'])->name('pengajuan-surat.create');
Route::post('/pengajuan-surat/store', [PengajuanSuratController::class, 'store'])->name('pengajuan-surat.store');
Route::get('/pengajuan-surat/{pengajuan_surat}/edit', [PengajuanSuratController::class, 'edit'])->name('pengajuan-surat.edit');
Route::put('/pengajuan-surat/{pengajuan_surat}/update', [PengajuanSuratController::class, 'update'])->name('pengajuan-surat.update');
Route::delete('/pengajuan-surat/{pengajuan_surat}/destroy', [PengajuanSuratController::class, 'destroy'])->name('pengajuan-surat.destroy');
Route::get('/pengajuan-surat/{id}/show', [PengajuanSuratController::class, 'show'])->name('pengajuan-surat.show');

//Aduan
Route::get('/aduan-masyarakat', [AduanMasyarakatController::class, 'index'])->name('aduan-masyarakat.index');
Route::get('/aduan-masyarakat/create', [AduanMasyarakatController::class, 'create'])->name('aduan-masyarakat.create');
Route::post('/aduan-masyarakat/store', [AduanMasyarakatController::class, 'store'])->name('aduan-masyarakat.store');
Route::get('/aduan-masyarakat/{aduan_masyarakat}/edit', [AduanMasyarakatController::class, 'edit'])->name('aduan-masyarakat.edit');
Route::put('/aduan-masyarakat/{aduan_masyarakat}/update', [AduanMasyarakatController::class, 'update'])->name('aduan-masyarakat.update');
Route::delete('/aduan-masyarakat/{aduan_masyarakat}/destroy', [AduanMasyarakatController::class, 'destroy'])->name('aduan-masyarakat.destroy');
Route::get('/aduan-masyarakat/{id}/show', [AduanMasyarakatController::class, 'show'])->name('aduan-masyarakat.show');

//Umkm
//Route::get('/umkm-dinas',[UmkmDinasController::class,'index'])->name('umkm-dinas.index');
//Route::get('/umkm-dinas/{id}/detail', [UmkmDinasController::class, 'show'])->name('umkm-dinas.show');

//Koperasi
//Route::get('/koperasi-dinas',[KoperasiDinasController::class,'index'])->name('koperasi-dinas.index');
//Route::get('/koperasi-dinas/{id}/detail', [KoperasiDinasController::class, 'show'])->name('koperasi-dinas.show');

//Pasar
Route::get('/pasar-dinas',[PasarDinasController::class,'index'])->name('pasar-dinas.index');
Route::get('/pasar-dinas/{id}/detail', [PasarDinasController::class, 'show'])->name('pasar-dinas.show');


//Industri
//Route::get('/industri-dinas',[IndustriDinasController::class,'index'])->name('industri-dinas.index');
//Route::get('/industri-dinas/{id}/detail', [IndustriDinasController::class, 'show'])->name('industri-dinas.show');





Route::middleware(['auth.check', 'preventCache'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //identitas
    Route::get('/identitas', [IdentitasController::class, 'index'])->name('identitas.index');
    Route::get('/identitas/first', [IdentitasController::class, 'show'])->name('identitas.show');
    Route::post('/identitas', [IdentitasController::class, 'update'])->name('identitas.update');

    //visimisi
    Route::get('/visimisi', [VisiMisiController::class, 'index'])->name('visimisi.index');
    Route::get('/visimisi/first', [VisiMisiController::class, 'show'])->name('visimisi.show');
    Route::post('/visimisi', [VisiMisiController::class, 'update'])->name('visimisi.update');

    //Motto
    Route::get('/motto', [MottoController::class, 'index'])->name('motto.index');
    Route::get('/motto/first', [MottoController::class, 'show'])->name('motto.show');
    Route::post('/motto', [MottoController::class, 'update'])->name('motto.update');
    
    //sejarah
    Route::get('/sejarah', [SejarahController::class, 'index'])->name('sejarah.index');
    Route::get('/sejarah/first', [SejarahController::class, 'show'])->name('sejarah.show');
    Route::post('/sejarah', [SejarahController::class, 'update'])->name('sejarah.update');

    //Geografis
    Route::get('/geografis', [GeografisController::class, 'index'])->name('geografis.index');
    Route::get('/geografis/first', [GeografisController::class, 'show'])->name('geografis.show');
    Route::post('/geografis', [GeografisController::class, 'update'])->name('geografis.update');
    
    //Geografis
    Route::get('/struktur', [StrukturController::class, 'index'])->name('struktur.index');
    Route::get('/struktur/first', [StrukturController::class, 'show'])->name('struktur.show');
    Route::post('/struktur', [StrukturController::class, 'update'])->name('struktur.update');

    //Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{berita}/update', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{berita}/destroy', [BeritaController::class, 'destroy'])->name('berita.destroy');
    Route::get('/berita/{id}/show', [BeritaController::class, 'show'])->name('berita.show');
    
    //Perangkat
    Route::get('/perangkat', [PerangkatController::class, 'index'])->name('perangkat.index');
    Route::get('/perangkat/create', [PerangkatController::class, 'create'])->name('perangkat.create');
    Route::post('/perangkat/store', [PerangkatController::class, 'store'])->name('perangkat.store');
    Route::get('/perangkat/{perangkat}/edit', [PerangkatController::class, 'edit'])->name('perangkat.edit');
    Route::put('/perangkat/{perangkat}/update', [PerangkatController::class, 'update'])->name('perangkat.update');
    Route::delete('/perangkat/{perangkat}/destroy', [PerangkatController::class, 'destroy'])->name('perangkat.destroy');
    Route::get('/perangkat/{id}/show', [PerangkatController::class, 'show'])->name('perangkat.show');
    
    //Fasilitas
    Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');
    Route::get('/fasilitas/create', [FasilitasController::class, 'create'])->name('fasilitas.create');
    Route::post('/fasilitas/store', [FasilitasController::class, 'store'])->name('fasilitas.store');
    Route::get('/fasilitas/{fasilitas}/edit', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
    Route::put('/fasilitas/{fasilitas}/update', [FasilitasController::class, 'update'])->name('fasilitas.update');
    Route::delete('/fasilitas/{fasilitas}/destroy', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');
    Route::get('/fasilitas/{id}/show', [FasilitasController::class, 'show'])->name('fasilitas.show');
    
    //Pengumuman
    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
    Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
    Route::post('/pengumuman/store', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::get('/pengumuman/{pengumuman}/edit', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
    Route::put('/pengumuman/{pengumuman}/update', [PengumumanController::class, 'update'])->name('pengumuman.update');
    Route::delete('/pengumuman/{pengumuman}/destroy', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');
    Route::get('/pengumuman/{id}/show', [PengumumanController::class, 'show'])->name('pengumuman.show');

    //Potensi
    Route::get('/potensi', [PotensiController::class, 'index'])->name('potensi.index');
    Route::get('/potensi/create', [PotensiController::class, 'create'])->name('potensi.create');
    Route::post('/potensi/store', [PotensiController::class, 'store'])->name('potensi.store');
    Route::get('/potensi/{potensi}/edit', [PotensiController::class, 'edit'])->name('potensi.edit');
    Route::put('/potensi/{potensi}/update', [PotensiController::class, 'update'])->name('potensi.update');
    Route::delete('/potensi/{potensi}/destroy', [PotensiController::class, 'destroy'])->name('potensi.destroy');
    Route::get('/potensi/{id}/show', [PotensiController::class, 'show'])->name('potensi.show');

    //kontak
    Route::get('/kontak',[KontakController::class, 'index'])->name('kontak.index');
    Route::get('/kontak/{id}/show', [KontakController::class, 'show'])->name('kontak.show');
    Route::delete('/kontak/{kontak}/destroy', [KontakController::class, 'destroy'])->name('kontak.destroy');


    //Jenis Surat
    Route::get('/jenis-surat', [JenisSuratController::class, 'index'])->name('jenis-surat.index');
    Route::get('/jenis-surat/create', [JenisSuratController::class, 'create'])->name('jenis-surat.create');
    Route::post('/jenis-surat/store', [JenisSuratController::class, 'store'])->name('jenis-surat.store');
    Route::get('/jenis-surat/{jenis_surat}/edit', [JenisSuratController::class, 'edit'])->name('jenis-surat.edit');
    Route::put('/jenis-surat/{jenis_surat}/update', [JenisSuratController::class, 'update'])->name('jenis-surat.update');
    Route::delete('/jenis-surat/{jenis_surat}/destroy', [JenisSuratController::class, 'destroy'])->name('jenis-surat.destroy');
    Route::get('/jenis-surat/{id}/show', [JenisSuratController::class, 'show'])->name('jenis-surat.show');

     //Kategori Umkm
     Route::get('/kategoriumkm', [KategoriUmkmController::class, 'index'])->name('kategoriumkm.index');
     Route::get('/kategoriumkm/create', [KategoriUmkmController::class, 'create'])->name('kategoriumkm.create');
     Route::post('/kategoriumkm/store', [KategoriUmkmController::class, 'store'])->name('kategoriumkm.store');
     Route::get('/kategoriumkm/{kategoriumkm}/edit', [KategoriUmkmController::class, 'edit'])->name('kategoriumkm.edit');
     Route::put('/kategoriumkm/{kategoriumkm}/update', [KategoriUmkmController::class, 'update'])->name('kategoriumkm.update');
     Route::delete('/kategoriumkm/{kategoriumkm}/destroy', [KategoriUmkmController::class, 'destroy'])->name('kategoriumkm.destroy');
     Route::get('/kategoriumkm/{id}/show', [KategoriUmkmController::class, 'show'])->name('kategoriumkm.show');
 
      //JData UmKM
    Route::get('dataumkm', [DataUmkmController::class, 'index'])->name('dataumkm.index');
    Route::get('/dataumkm/create', [DataUmkmController::class, 'create'])->name('dataumkm.create');
    Route::post('/dataumkm/store', [DataUmkmController::class, 'store'])->name('dataumkm.store');
    Route::get('/dataumkm/{dataumkm}/edit', [DataUmkmController::class, 'edit'])->name('dataumkm.edit');
    Route::put('/dataumkm/{dataumkm}/update', [DataUmkmController::class, 'update'])->name('dataumkm.update');
    Route::delete('/dataumkm/{dataumkm}/destroy', [DataUmkmController::class, 'destroy'])->name('dataumkm.destroy');
    Route::get('/dataumkm/{id}/show', [DataUmkmController::class, 'show'])->name('dataumkm.show');
  

    //kecamatan
    Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan.index');
    Route::get('/kecamatan/create', [KecamatanController::class, 'create'])->name('kecamatan.create');
    Route::post('/kecamatan/store', [KecamatanController::class, 'store'])->name('kecamatan.store');
    Route::get('/kecamatan/{kecamatan}/edit', [KecamatanController::class, 'edit'])->name('kecamatan.edit');
    Route::put('/kecamatan/{kecamatan}/update', [KecamatanController::class, 'update'])->name('kecamatan.update');
    Route::delete('/kecamatan/{kecamatan}/destroy', [KecamatanController::class, 'destroy'])->name('kecamatan.destroy');
    Route::get('/kecamatan/{id}/show', [KecamatanController::class, 'show'])->name('kecamatan.show');

    //kategori Koperasi
    Route::get('/kategorikoperasi', [KategoriKoperasiController::class, 'index'])->name('kategorikoperasi.index');
    Route::get('/kategorikoperasi/create', [KategoriKoperasiController::class, 'create'])->name('kategorikoperasi.create');
    Route::post('/kategorikoperasi/store', [KategoriKoperasiController::class, 'store'])->name('kategorikoperasi.store');
    Route::get('/kategorikoperasi/{kategorikoperasi}/edit', [KategoriKoperasiController::class, 'edit'])->name('kategorikoperasi.edit');
    Route::put('/kategorikoperasi/{kategorikoperasi}/update', [KategoriKoperasiController::class, 'update'])->name('kategorikoperasi.update');
    Route::delete('/kategorikoperasi/{kategorikoperasi}/destroy', [KategoriKoperasiController::class, 'destroy'])->name('kategorikoperasi.destroy');
    Route::get('/kategorikoperasi/{id}/show', [KategoriKoperasiController::class, 'show'])->name('kategorikoperasi.show');
    //Aduan
    Route::get('/aduan',[AduanController::class, 'index'])->name('aduan.index');
    Route::get('/aduan/{id}/show', [AduanController::class, 'show'])->name('aduan.show');
    Route::delete('/aduan/{aduan}/destroy', [AduanController::class, 'destroy'])->name('aduan.destroy');
    
    //Pengajuan
    Route::get('/pengajuan',[PengajuanController::class, 'index'])->name('pengajuan.index');
    Route::get('/pengajuan/{id}/show', [PengajuanController::class, 'show'])->name('pengajuan.show');
    Route::delete('/pengajuan/{pengajuan}/destroy', [PengajuanController::class, 'destroy'])->name('pengajuan.destroy');

    //Data Pasar
     Route::get('/datapasar',[DataPasarController::class, 'index'])->name('datapasar.index');
     Route::get('/datapasar/{id}/show', [DataPasarController::class, 'show'])->name('datapasar.show');
     Route::delete('/datapasar/{datapasar}/destroy', [DataPasarController::class, 'destroy'])->name('datapasar.destroy');
     Route::get('/datapasar/create', [DataPasarController::class, 'create'])->name('datapasar.create');
     Route::post('/datapasar/store', [DataPasarController::class, 'store'])->name('datapasar.store');
     Route::get('/datapasar/{datapasar}/edit', [DataPasarController::class, 'edit'])->name('datapasar.edit');
     Route::put('/datapasar/{datapasar}/update', [DataPasarController::class, 'update'])->name('datapasar.update');
     Route::delete('/datapasar/{datapasar}/destroy', [DataPasarController::class, 'destroy'])->name('datapasar.destroy');

     //Data Koperasi
     Route::get('/koperasi',[KoperasiController::class, 'index'])->name('koperasi.index');
     Route::get('/koperasi/{id}/show', [KoperasiController::class, 'show'])->name('koperasi.show');
     Route::delete('/koperasi/{koperasi}/destroy', [KoperasiController::class, 'destroy'])->name('koperasi.destroy');
     Route::get('/koperasi/create', [KoperasiController::class, 'create'])->name('koperasi.create');
     Route::post('/koperasi/store', [KoperasiController::class, 'store'])->name('koperasi.store');
     Route::get('/koperasi/{koperasi}/edit', [KoperasiController::class, 'edit'])->name('koperasi.edit');
     Route::put('/koperasi/{koperasi}/update', [KoperasiController::class, 'update'])->name('koperasi.update');
     Route::delete('/koperasi/{koperasi}/destroy', [KoperasiController::class, 'destroy'])->name('koperasi.destroy');
   
     //Lembaga
    Route::get('/lembaga', [LembagaController::class, 'index'])->name('lembaga.index');
    Route::get('/lembaga/create', [LembagaController::class, 'create'])->name('lembaga.create');
    Route::post('/lembaga/store', [LembagaController::class, 'store'])->name('lembaga.store');
    Route::get('/lembaga/{lembaga}/edit', [LembagaController::class, 'edit'])->name('lembaga.edit');
    Route::put('/lembaga/{lembaga}/update', [LembagaController::class, 'update'])->name('lembaga.update');
    Route::delete('/lembaga/{lembaga}/destroy', [LembagaController::class, 'destroy'])->name('lembaga.destroy');
    Route::get('/lembaga/{id}/show', [LembagaController::class, 'show'])->name('lembaga.show');
    

});

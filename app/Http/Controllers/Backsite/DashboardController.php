<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Berita;
use App\Models\Kontak;
use App\Models\Potensi;
use App\Models\Fasilitas;
use App\Models\Perangkat;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataPasar;
use App\Models\DataUmks;
use App\Models\Koperasi;

class DashboardController extends Controller
{
    public function index(){

        $berita = Berita::count();
        $perangkat = Perangkat::count();
        $fasilitas = Fasilitas::count();
        $pengumuman = Pengumuman::count();
        $potensi = Potensi::count();
        $kontak = Kontak::count();
        $datapasar = DataPasar::count();
        $dataumkm = DataUmks::count();
        $koperasi = Koperasi::count();

        return view('pages.backsite.dashboard.index', compact('berita', 'perangkat', 'fasilitas', 'pengumuman',  'potensi', 'kontak', 'datapasar', 'dataumkm', 'koperasi'));
    }
}

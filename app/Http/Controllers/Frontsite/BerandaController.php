<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\Motto;
use App\Models\Berita;
use App\Models\Sejarah;
use App\Models\VisiMisi;
use App\Models\Geografis;
use App\Models\Identitas;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function index() {

        $identitas = Identitas::first();
        $geografis = Geografis::first();
        $visi = VisiMisi::first();
        $motto = Motto::first();
        $sejarah = Sejarah::first();
        $berita = Berita::latest()->take(3)->get();
$pengumuman = Pengumuman::latest()->take(3)->get();

// Check if there are fewer than three items available
if ($berita->count() < 3) {
    // Handle the case where fewer than three items are available
    // For example, you could fetch additional items from another source
}

if ($pengumuman->count() < 3) {
    // Handle the case where fewer than three items are available
}


        return view('pages.frontsite.beranda.index', compact('identitas', 'geografis', 'berita', 'pengumuman','visi','motto','sejarah'));
    }
}

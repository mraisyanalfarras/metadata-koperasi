<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::all();
        return view('pages.backsite.pengajuan.index', compact('pengajuan'));
    }

    public function show($id)
    {
        $pengajuan = Pengajuan::with('jenisSurat')->findOrFail($id);
        return view('pages.backsite.pengajuan.show', compact('pengajuan'));
    }

    public function destroy($id)
    {
        $pengajuan = Pengajuan::find($id);

        if ($pengajuan->ktp) {
            Storage::delete('ktp' . $pengajuan->ktp);
        } if ($pengajuan->kk) {
            Storage::delete('kk' . $pengajuan->kk);
        }
    
        $pengajuan->delete();
        return redirect()->route('pengajuan.index')->with('success', 'pengajuan deleted successfully');

    }

  
}

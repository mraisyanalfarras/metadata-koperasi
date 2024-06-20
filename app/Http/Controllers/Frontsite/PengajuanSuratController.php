<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\Identitas;
use App\Models\Pengajuan;
use App\Models\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\PengajuanRequest;

class PengajuanSuratController extends Controller
{
    public function create()
    {
        $pengajuan = Pengajuan::all();
        $identitas = Identitas::first();
        $jenisSurat = JenisSurat::all();
        return view('pages.frontsite.pengajuan.create',compact('pengajuan','identitas','jenisSurat'));
    }

    public function store(PengajuanRequest $request)
    {

        $ktp = '';
        $kk = '';

        if ($request->file('ktp')) {
            $extension = $request->file('ktp')->getClientOriginalExtension();
            $ktp = $request->nik . '.' . now()->timestamp . '.' . $extension;
            $request->file('ktp')->storeAs('ktp', $ktp);
        } if ($request->file('kk')) {
            $extension = $request->file('kk')->getClientOriginalExtension();
            $kk = $request->judul . '.' . now()->timestamp . '.' . $extension;
            $request->file('kk')->storeAs('kk', $kk);
        }

        $tanggal = Carbon::createFromFormat('Y-m-d', $request->tanggal)->format('Y-m-d');

        Pengajuan::create([
            'nik' => $request->nik,
            'email' => $request->email,
            'nama' => $request->nama,
            'tanggal' => $tanggal,
            'id_jenis_surats' => $request->id_jenis_surats,
            'ktp' => $ktp,
            'kk' => $kk,
            'no_hp' => $request->no_hp
        ]);

        return redirect()->route('pengajuan-surat.create')->with('success', 'Pengajuan Anda telah terkirim. Silahkan Tunggu Pihak Kami Menghubungi Anda. Terima kasih!');
    }

}

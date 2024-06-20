<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataUmks extends Model
{
    use SoftDeletes;
    
    protected $table = 'dataumkms';

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];

    protected $fillable = [
       
        'nama_umkm',
        'id_kategoriumkm',
        'alamat',
        'pemilik',
        'no_telp',
        'foto',
        'email',
        'tgl_berdiri',
    ];

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\Pengajuan', 'id_jenis_surats', 'id');
    // }

    public function kategoriUmkm()
    {
        return $this->belongsTo('App\Models\KategoriUmkm', 'id_kategoriumkm', 'id');
    }
}

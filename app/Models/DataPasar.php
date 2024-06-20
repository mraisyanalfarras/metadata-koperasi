<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPasar extends Model
{
    use SoftDeletes;
    
    protected $table = 'datapasars';

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];

    protected $fillable = [
       
        'namapasar',
        'id_kecamatan',
        'foto',
        'alamat',
        'jumlah_kios',
    ];

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\Pengajuan', 'id_jenis_surats', 'id');
    // }

    public function Kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'id_kecamatan', 'id');
    }
}

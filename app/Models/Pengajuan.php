<?php

namespace App\Models;

use App\Models\JenisSurat;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengajuan extends Model
{
    use softDeletes;
    
    protected $table = 'pengajuans';

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nik',
        'email',
        'nama',
        'tanggal',
        'id_jenis_surats',
        'ktp',
        'kk',
        'no_hp',
    ];

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\Pengajuan', 'id_jenis_surats', 'id');
    // }

    public function jenisSurat()
    {
        return $this->belongsTo('App\Models\JenisSurat', 'id_jenis_surats', 'id');
    }
}

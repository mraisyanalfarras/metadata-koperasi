<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class JenisSurat extends Model
{
    use softDeletes;

    protected $table = 'jenis_surats';

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kode_surat',
        'nama_surat',
    ];

    public function pengajuan()
    {
        return $this->hasMany('App\Models\Pengajuan', 'id_jenis_surats');
    }
}

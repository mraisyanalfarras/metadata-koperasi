<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Industri extends Model
{
    use SoftDeletes;
    
    protected $table = 'industris';

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];

    protected $fillable = [
       
        'nama_industri',
        'id_kategoriindustris        ',
        'Nama_Pemilik',
        'alamat',
        'deskripsi',
        'foto',
        'no_telp',
    ];

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\Pengajuan', 'id_jenis_surats', 'id');
    // }

    public function KategoriIndustri()
    {
        return $this->belongsTo('App\Models\KategoriIndustri', 'id_kategoriindustris', 'id');
    }
}

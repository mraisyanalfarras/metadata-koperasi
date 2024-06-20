<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Koperasi extends Model
{
    use SoftDeletes;
    
    protected $table = 'koperasis';

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];

    protected $fillable = [
       
        'nama_koperasi',
        'id_kategorikoperasi',
        'foto',
        'alamat',
        'kecamatan',
    ];
    
    public function kategorikoperasi()
    {
        return $this->belongsTo('App\Models\KategoriKoperasi', 'id_kategorikoperasi', 'id');
    }
}

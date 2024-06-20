<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriKoperasi extends Model
{
    use SoftDeletes;

    protected $table = 'kategorikoperasi';

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
    ];

    public function koperasi()
    {
        return $this->hasMany('App\Models\Koperasi', 'id_kategorikoperasi');
    }
}

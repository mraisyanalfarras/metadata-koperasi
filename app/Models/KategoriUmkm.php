<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriUmkm extends Model
{
    protected $table = 'kategoriumkm';

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
    ];

    public function dataumkm()
    {
        return $this->hasMany('App\Models\DataUmks', 'id_kategoriumkm');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Pengumuman extends Model
{
    use softDeletes;
    
    protected $table = 'pengumumen';

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];

    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Identitas extends Model
{
    use softDeletes;

    protected $table = 'identitas';

    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama_desa',
        'hari_kerja',
        'jam_kerja',
        'no_hp',
        'email',
        'link_fb',
        'link_twit',
        'link_ig',
        'logo',
        'maps',
    ];
}
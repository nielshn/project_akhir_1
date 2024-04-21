<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPelapor extends Model
{
    use HasFactory;

    protected $table = 'kategori_pelapor';
    protected $fillable = [
        'nama_kategori',
        'slug_kategori',
    ];

    protected $hidden = [];

}

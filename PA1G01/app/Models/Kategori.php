<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori',
        'slug'
    ];

    protected $hidden = [];

    public function beritas()
    {
        return $this->hasMany(Berita::class, 'kategori_id', 'id');
    }
    public function artikels()
    {
        return $this->hasMany(Artikel::class, 'kategori_id', 'id');
    }
    public function event()
    {
        return $this->hasMany(Event::class, 'kategori_id', 'id');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'beritas';
    protected $fillable = [
        'judulBerita', 'slug', 'body', 'kategori_id', 'user_id', 'gambar_berita', 'is_active', 'views'
    ];

    protected $hidden = [];
    public function kategori (){
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

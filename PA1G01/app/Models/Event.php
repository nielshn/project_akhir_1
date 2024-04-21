<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $fillable = [
        'judul', 'slug', 'kategori_id', 'user_id', 'gambar_event', 'is_active', 'views', 'body',
    ];
    protected $hidden = [];
    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

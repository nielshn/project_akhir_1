<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multipic extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'galery_id',
    ];
    protected $hidden = [];

    public function galery(){
        return $this->belongsTo(Galery::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Galery extends Model
{
    use HasFactory;

    protected $table = 'galeri';
    protected $fillable = [
        'nama',
        'description',
        'slug',
    ];
    protected $hidden = [];

    public function images(): HasMany {
        return $this->hasMany(Multipic::class);
    }
}

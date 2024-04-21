<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;
    protected $table = 'meta';
    protected $fillable = [
        'meta_key', 'meta_title', 'meta_description'
    ];

    protected $hidden = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class FAQ extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'faqs';
    protected $hidden = [];

    protected $fillable = [
        'pertanyaan', 'jawaban',
    ];
}

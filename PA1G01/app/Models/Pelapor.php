<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pelapor extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'pelapor';

    protected $fillable = [
        'nama_pelapor',
        'noTelepon',
        'judul_laporan',
        'email',
        'kategoriPelapor_id',
        'unit_pelapor',
        'body',
        'bukti_pelapor',
        'lampiran',
        'lampiran_path'
    ];
    protected $hidden = [];
    public function kategoriPelapor()
    {
        return $this->belongsTo(KategoriPelapor::class, 'kategoriPelapor_id', 'id');
    }
}

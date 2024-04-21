<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'no_telepon',
        'alamat',
        'foto_profil',
        'facebook',
        'twitter',
        'instagram',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function updatePassword($newPassword)
    {
        $this->password = Hash::make($newPassword);
        $this->save();
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    public function unitKerja()
    {
        return $this->hasMany(UnitKerja::class);
    }

    public function artikel()
    {
        return $this->hasMany(Artikel::class);
    }

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }

    public function pengumuman() {
        return $this->hasMany(Pengumuman::class);
    }
}

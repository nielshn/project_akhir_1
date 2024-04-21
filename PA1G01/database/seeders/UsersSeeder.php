<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'no_telepon' => '081234567890',
            'alamat' => 'Jl. Sudirman No. 123',
            'foto_profil' => 'admin.jpg',
            'facebook' => 'admin_fb',
            'twitter' => 'admin_twitter',
            'instagram' => 'admin_ig',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
    }
}

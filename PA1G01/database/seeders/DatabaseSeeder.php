<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // how to call userSeeder in database
        $this->call(
            [
                UsersSeeder::class,
            ]
        );
    }
}

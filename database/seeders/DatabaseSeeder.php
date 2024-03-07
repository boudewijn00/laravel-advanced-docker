<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->delete();

        User::factory()->create([
            'name' => 'boudewijn overvliet',
            'email' => 'boudewijn@nlockd.com',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'marck mulder',
            'email' => 'marck@nlockd.com',
            'password' => bcrypt('password'),
        ]);
    }
}

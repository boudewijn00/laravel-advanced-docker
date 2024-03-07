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
            'name' => 'Test User',
            'email' => 'boudewijn@nlockd.com',
            'password' => bcrypt('password'),
        ]);
    }
}

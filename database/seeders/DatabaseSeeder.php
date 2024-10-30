<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        User::factory()->create([
            'name' => 'dea',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('123'),
        ]);
        User::factory()->create([
            'name' => 'cahyadi',
            'email' => 'karyawan@example.com',
            'role' => 'karyawan',
            'password' => bcrypt('123'),
        ]);
        User::factory()->create([
            'name' => 'deddy',
            'email' => 'client@example.com',
            'role' => 'client',
            'password' => bcrypt('123'),
        ]);
    }
}

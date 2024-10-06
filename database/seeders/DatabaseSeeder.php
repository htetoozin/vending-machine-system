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
            'name' => 'Jack Doe',
            'role_id' => 1,
            'email' => 'admin@example.com',
            'password' => 123456
        ]);

        User::factory()->create([
            'name' => 'Veki Dunk',
            'email' => 'veki@example.com',
            'role_id' => 2,
            'password' => 123456
        ]);
    }
}

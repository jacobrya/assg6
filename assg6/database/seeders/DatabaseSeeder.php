<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'role' => 'user',
        ]);

        User::factory()->create([
            'name' => 'Moderator',
            'email' => 'moderator@example.com',
            'role' => 'moderator',
        ]);
    }
}

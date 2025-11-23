<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Owner User',
            'email' => 'owner@gmail.com',
            'type' => 'owner',
        ]);

        User::factory()->create([
            'name' => 'Agency User',
            'email' => 'agency@gmail.com',      
            'type' => 'agency',
        ]);

        User::factory()->create([
            'name' => 'Business User',
            'email' => 'business@gmail.com',
            'type' => 'business',
        ]);
    }
}

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
        User::create([
            'name' => 'Client User',
            'email' => 'client@gmail.com',
            'email_verified_at' => now(),
            'password' => 'password',
            'type' => 'client',
        ]);

        User::create([
            'name' => 'Agent User',
            'email' => 'agent@gmail.com',  
            'email_verified_at' => now(),
            'password' => 'password',    
            'type' => 'agent',
        ]);

        User::create([
            'name' => 'Company User',
            'email' => 'company@gmail.com',
            'email_verified_at' => now(),
            'password' => 'password',
            'type' => 'company',
        ]);
    }
}

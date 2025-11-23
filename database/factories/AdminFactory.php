<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
  
     /**
     * The current password being used by the factory.
     */
    protected static ?string $password;



    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
             'password' => static::$password ??= 'password',
             'remember_token' => Str::random(10),
            
        ];
    }
}

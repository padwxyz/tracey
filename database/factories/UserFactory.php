<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'gender' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'phone_number' => $this->faker->numerify('08##########'),
            'role' => $this->faker->randomElement(['user', 'admin']),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'location_id' => Location::factory(),
            'category_name' => $this->faker->word(),
        ];
    }
}

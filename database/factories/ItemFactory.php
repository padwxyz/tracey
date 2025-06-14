<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'item_name' => $this->faker->word(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'condition' => $this->faker->randomElement(['Normal', 'Not normal']),
            'brand' => $this->faker->company(),
            'type' => $this->faker->word(),
        ];
    }
}

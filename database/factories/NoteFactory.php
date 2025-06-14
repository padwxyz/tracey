<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Item;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'location_id' => Location::factory(),
            'category_id' => Category::factory(),
            'item_id' => Item::factory(),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'problem' => $this->faker->sentence(),
            'activity' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['todo', 'pending', 'inprogress', 'done', 'cancel']),
            'image' => 'dummy.jpg',
        ];
    }
}

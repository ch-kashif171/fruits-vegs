<?php

namespace Database\Factories;

use App\Models\ProduceItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProduceItem>
 */
class ProduceItemFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'icon' => '🍊',
            'theme' => fake()->randomElement(['t1', 't2', 't3', 't4', 't5', 't6']),
            'sort_order' => fake()->numberBetween(0, 20),
        ];
    }
}

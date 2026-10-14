<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Page>
 */
class PageFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->words(2, true);

        return [
            'slug' => str($title)->slug()->toString(),
            'title' => ucfirst($title),
            'meta_description' => fake()->sentence(),
            'hero_title' => fake()->sentence(4),
            'hero_subtitle' => fake()->sentence(12),
            'hero_image' => null,
            'extra' => [],
        ];
    }
}

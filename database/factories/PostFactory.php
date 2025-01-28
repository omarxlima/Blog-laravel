<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id, 
            'name' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'yt_iframe' => $this->faker->optional()->url, 
            'meta_title' => $this->faker->sentence,
            'meta_keyword' => $this->faker->words(3, true),
            'meta_description' => $this->faker->paragraph,
            'status' => $this->faker->boolean ? 1 : 0, 
            'created_by' => $this->faker->randomNumber(), 
        ];
    }
}

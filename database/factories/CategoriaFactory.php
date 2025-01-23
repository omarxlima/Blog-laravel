<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppModelsCategoria>
 */
class CategoriaFactory extends Factory
{
    protected $model = Categoria::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->text,
            'meta_keyword' => $this->faker->word,
            'navbar_status' => $this->faker->boolean(50),
            'status' => $this->faker->boolean(80),
            'created_by' => User::factory(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}

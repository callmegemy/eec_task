<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),  // to make sure that we have data in categories table tp prevent any errors
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->paragraph,
            'code' => strtoupper(Str::random(8)),
            'image' => $this->faker->imageUrl(400, 400, 'products', true),
            'price' => $this->faker->numberBetween(1, 10000),
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}

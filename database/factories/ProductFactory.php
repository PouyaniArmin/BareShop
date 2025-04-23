<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10, 200),
            'stock' => $this->faker->numberBetween(1, 100),
            'discount' => $this->faker->randomFloat(2, 0, 50),
            'is_active' => $this->faker->boolean(),
            'category_id' => $this->faker->numberBetween(1, 3),
            'seller_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

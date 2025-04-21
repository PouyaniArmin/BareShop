<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'product_id' => Product::inRandomOrder()->first()?->id ?? Product::factory(),
            'quantity' => $this->faker->numberBetween(1, 5),
            'total_price' => $this->faker->randomFloat(2, 10, 500),
            'status' => $this->faker->randomElement(['pending', 'completed', 'canceled']),
            'payment_method' => $this->faker->randomElement(['credit_card', 'paypal', 'cash']),
            'order_date' => now(),
        ];
    }
}

<?php

namespace Database\Factories;

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
            'name' => fake()->randomElement(['Coke', 'Pepsi', 'Water', 'Phone', 'Watch', 'Camera', 'Laptop', 'Tablet']),
            'price' => fake()->randomFloat(2, 100, 100000),
            'quantity_available' => random_int(1, 1000),

        ];
    }
}

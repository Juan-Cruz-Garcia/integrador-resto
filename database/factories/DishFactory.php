<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dish>
 */
class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()-> sentence(6,true),
            'description' => fake()->paragraph(4,true),
            'category_id' => rand(1,4),
            'price' => fake()->randomFloat(2,800,10000),
            'image' => 'https://loremflickr.com/100/100/hamburger',
            'is_available' => $this->faker->boolean(90),

        ];
    }
}

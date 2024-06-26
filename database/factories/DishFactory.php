<?php

namespace Database\Factories;

use App\Models\Dish;
use Illuminate\Database\Eloquent\Factories\Factory;

class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryNames = [
            1 => 'Entrada',
            2 => 'Plato Principal',
            3 => 'Acompañamiento',
            4 => 'Postre',
            5 => 'Bebida',
        ];

        $categoryId = $this->faker->numberBetween(1, 5);

        return [
            'name' => $this->faker->words(4, true),
            'description' => $this->faker->paragraph(4, true),
            'category_id' => $categoryId,
            'price' => $this->faker->randomFloat(2, 800, 10000),
            'is_available' => $this->faker->boolean(80),
        ];
    }
}

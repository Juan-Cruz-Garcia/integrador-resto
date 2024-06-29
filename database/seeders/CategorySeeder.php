<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $categoryNames = [
            1 => 'Entrada',
            2 => 'Plato Principal',
            3 => 'Acompañamiento',
            4 => 'Postre',
            5 => 'Bebida',
        ];

        foreach ($categoryNames as $name) {
            Category::create(['value' => $name]);
        }
    }
}

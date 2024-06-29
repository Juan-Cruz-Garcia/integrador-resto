<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class DishController extends Controller
{
    public function landingpage()
    {
         // Obtener 3 platos al azar
         $randomDishes = Dish::inRandomOrder()->limit(3)->get();
        return view('web.welcome',compact('randomDishes'));
    }

    public function index()
    {
        $dishes = Dish::paginate(6);
        return view('web.dishes.index', compact('dishes'));
    }

    public function show($id)
    {
        $dish = Dish::find($id);
        return view('web.dishes.show', compact('dish'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Category;

class DishController extends Controller
{
    // Variable para almacenar las categorías
    protected $categories;

    //permite disponibilidad en todas las vistas instaciadas de este controlador
    public function __construct()
    {
        $this->categories = Category::all();
        view()->share('categories', $this->categories); // se pasan las categorías a todas las vistas.
    }

    public function landingpage()
    {
        // Obtener 3 platos al azar que estén disponibles
        $randomDishes = Dish::where('is_available', 1)->inRandomOrder()->limit(3)->get();
        return view('web.welcome', compact('randomDishes'));
    }


    public function index()
    {
        // Filtrar los platos que están disponibles
        $dishes = Dish::where('is_available', 1)->paginate(6);
        if (request()->has($orderBy)) {
            $dishes = Dish::where('is_available', 1)->-orderBy($orderBy)>paginate(6);

        }

        return view('web.dishes.index', compact('dishes'));
    }


    public function show($id)
    {
        $dish = Dish::find($id);
        return view('web.dishes.show', compact('dish'));
    }
}

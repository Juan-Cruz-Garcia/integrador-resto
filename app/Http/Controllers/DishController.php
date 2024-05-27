<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class DishController extends Controller
{
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

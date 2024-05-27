<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;

class DishController extends Controller
{
    public function landingpage()
    {
        return view('backoffice.landingpage');
    }
    public function index()
    {
        $dishes = Dish::paginate(6);
        return view('backoffice.dishes.index', compact('dishes'));
    }

    public function create($id = null)
    {
        if ($id) {
            $dish = Dish::find($id);
           } else {
           $dish = new Dish;
        }
        return view('backoffice.dishes.create', compact('dish'));
    }

    public function store(Request $request)
    {
        if ($request->has('id')) { // actualizar
            $dish = Dish::find($request->input('id'));
        } else { // crear
            $dish = new Dish;
        }

        $dish->name = $request->input('name');
        $dish->description = $request->input('description');
        $dish->category_id = $request->input('category_id');
        $dish->price = $request->input('price');
        $dish->image = $request->input('image');
        $dish->image_alt = $request->input('image_alt');
        $dish->is_available = $request->boolean('is_available');

        $dish->save();

        return redirect()->route('backoffice.dishes.index');
    }
}

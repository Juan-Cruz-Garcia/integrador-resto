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
        $dishes = Dish::orderBy('id', 'asc')->paginate(6);
        return view('backoffice.dishes.index', compact('dishes'));
    }

    public function available($id)
    {
        $dish = Dish::find($id);
        $dish->is_available = !$dish->is_available;
        $dish->save();

        return redirect()->route('backoffice.dishes.index');
    }

    public function categories($id)
    {
        $dish = Dish::find($id);
        $dish->category_id = request()->input('category');
        $dish->save();

        return redirect()->route('backoffice.dishes.index');
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

    public function store(Request $request, $id = null)
    {
        //averigua si se esta editando o creando un plato
        if ($request->has('id')) { // actualizar
            $dish = Dish::find($request->input('id'));
        } else { // crear
            $dish = new Dish;
        }
        //si hay imagen le cambia el nombre
        if (request()->has('image')) {
            //obtiene el nombre del plato para colocar en la base de datos
            $name = \Str::of($request->input('name')) //trae el nombre
                ->slug() //lo convierte a url-friendly
                ->append('.' . $id . '.' . request()->file('image')->extension()); //agrega el id y la extension al nombre
            $dish->image = $request->file('image')->storeAs('dishes', $name);
        }

        //trae los datos del fomrulario
        $dish->name = $request->input('name');
        $dish->description = $request->input('description');
        $dish->category_id = $request->input('category_id');
        $dish->price = $request->input('price');
        $dish->image_alt = $request->input('image_alt');
        $dish->is_available = $request->boolean('is_available');

        $dish->save();

        return redirect()->route('backoffice.dishes.index');
    }
}

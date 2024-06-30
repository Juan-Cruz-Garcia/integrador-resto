<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Image;

class DishController extends Controller
{
    //-------vistas-------
    //panel de administrador
    public function landingpage()
    {
        return view('backoffice.landingpage');
    }
    //tabla de todos los productos
    public function index()
    {
        $dishes = Dish::orderBy('id', 'asc')->paginate(6);
        return view('backoffice.dishes.index', compact('dishes'));
    }
    //formulario de creacion y edicion
    public function create($id = null)
    {
        if ($id) {
            $dish = Dish::find($id);
        } else {
            $dish = new Dish;
        }
        return view('backoffice.dishes.create', compact('dish'));
    }

    //-----funcionalidades-------
    //accion cambiar disponibilidad
    public function available($id)
    {
        $dish = Dish::find($id);
        $dish->is_available = !$dish->is_available;
        $dish->save();

        return redirect()->route('backoffice.dishes.index');
    }

    //cambiar la categoria
    public function categories($id)
    {
        $dish = Dish::find($id);
        $dish->category_id = request()->input('category');
        $dish->save();

        return redirect()->route('backoffice.dishes.index');
    }

    // guardar un producto
    public function store(Request $request, $id = null)
    {
        // Verifica si se está editando o creando un plato
        $dish = $request->has('id') ? Dish::find($request->input('id')) : new Dish;
    
        // Inicializa la variable $image a null
        $image = null;
    
        // Verifica si se ha subido una imagen
        if ($request->hasFile('image')) {
            $image = new Image;
            $image->src = $request->file('image')->store('dishes');
            $image->size = $request->file('image')->getSize();
            $image->extension = $request->file('image')->getClientOriginalExtension();
            $image->image_alt = $request->input('image_alt');
            $image->save();
    
            // Asigna el id de la imagen al plato solo si se subió y guardó una imagen
            $dish->image_id = $image->id;
        }
    
        // Trae los datos del formulario
        $dish->name = $request->input('name');
        $dish->description = $request->input('description');
        $dish->category_id = $request->input('category_id');
        $dish->price = $request->input('price');
        $dish->is_available = $request->boolean('is_available');
    
        $dish->save();
    
        return redirect()->route('backoffice.dishes.index');
    }
    
}

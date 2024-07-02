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


    public function index($category = null)
    {
        // Construir la consulta
        $query = Dish::where('is_available', 1);

        // Si se proporciona una categoría, filtrar por esa categoría
        if ($category) {
            $query->where('category_id', $category);
        }
        if (request()->has('filtro')) {
            $query->orderBy('price', request()->input('filtro'));
        }

        // Paginar los resultados y obtener los platos
        $dishes = $query->paginate(6);
        return view('web.dishes.index', compact('dishes'));
    }


    public function show($id)
    {
        $dish = Dish::find($id);
        return view('web.dishes.show', compact('dish'));
    }

    public function add($id)
    {
        // Obtener el carrito de la sesión si no existe se inicializa como un array vacío
        $cart = session('cart', []);
        // Verificar si el producto ya está en el carrito
        if (!isset($cart[$id])) {
            // Si no está inicializa la cantidad del producto en 0
            $cart[$id] = 0;
        }
        // Incrementar la cantidad del producto
        $cart[$id]++;
        // Guardar el carrito actualizado en la sesión
        session(['cart' => $cart]);
        // Redirigir de vuelta a la página de platos
        return redirect()->route('web.cart.checkout');
    }
    public function remove($id)
    {

        $cart = session('cart');
        if (isset($cart[$id])) {
            // Decrementar la cantidad del producto en el carrito
            $cart[$id]--;

            // Si la cantidad llega a 0 o menos, eliminar el producto del carrito
            if ($cart[$id] <= 0) {
                unset($cart[$id]);
            }

            // Guardar el carrito actualizado en la sesión
            session(['cart' => $cart]);
        }
        // Redirigir de vuelta a la página de platos
        return redirect()->back();
    }


     public function checkout()
     {
         //dd(session('cart'));
         $dishes = Dish::whereIn('id', array_keys(session('cart')))->get();
         $total = 0;
         $quantities = [];
         //dd($dishes);
         foreach ($dishes as $dish) {
             $quantities[$dish->id] = session('cart')[$dish->id];
             //dd($dishes,$quantities);
             $total += session('cart')[$dish->id] * $dish->price;
         }
      
         //dd($dishes, $quantities, $total);
         return view('web.cart.checkout', compact('dishes', 'quantities', 'total'));
     }

}

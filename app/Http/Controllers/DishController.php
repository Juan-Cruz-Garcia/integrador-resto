<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Category;
use App\Models\Item;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

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

        if (!Auth::check()) {
            return $this->landingpage();
        }
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

        if (!Auth::check()) {
            return $this->landingpage();
        }
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
        if (!Auth::check()) {
            return $this->landingpage();
        }
        $cart = session('cart');
        $dishes = [];
        $total = 0;
        $quantities = [];
        //dd(session('cart'));
        foreach ($cart as $id => $quantity) {
            $dish = Dish::find($id);
            $dishes[] = $dish;
            $quantities[$id] = $quantity;
            $total += $quantities[$id] * $dish->price;
        }
        //dd($dishes, $quantities, $total);
        return view('web.cart.checkout', compact('dishes', 'quantities', 'total'));
    }




    public function buy()
    {
        //dd(Auth::check());
        if (!Auth::check()) {
            return $this->landingpage();
        }
        $cart = session('cart');
        $total = 0;
        $items = [];

        // Recorrer los elementos del carrito
        foreach ($cart as $id => $quantity) {
            $dish = Dish::find($id);
            // Calcular el total acumulado
            $total += $quantity * $dish->price;
            // Crear un nuevo item
            $items[] = new Item([
                'dish_id' => $dish->id,
                'quantity' => $quantity,
                'price' => $dish->price,
            ]);
        }
        //dd($total, $items,session());

        // Crear una nueva venta
        $sale = new Sale([
            'user_id' => auth()->user()->id,
            'total' => $total,
        ]);
        // Guardar la venta
       $sale->save();

        foreach ($items as $item) {
            $item->sale_id = $sale->id;
        }
        
        //dd($sale,$items);

        // Guardar los items relacionados con la venta
        $sale->items()->saveMany($items);

        // Verificar los items guardados
        //dd($sale->items);

        session()->remove('cart');
        return $this->index();
    }


    public function logout()
    {
        Auth::logout();
        return $this->landingpage();
    }
}

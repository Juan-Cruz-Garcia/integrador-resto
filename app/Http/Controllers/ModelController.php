<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class ModelController extends Controller
{
     static function all()
    {
        return Dish::all();
    }
}

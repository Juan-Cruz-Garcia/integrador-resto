<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

     protected $fillable = ['sale_id', 'dish_id', 'quantity', 'price'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PizzaTopping extends Model
{
    public function orders()
    {
        return $this->belongsToMany(PizzaOrder::class, 'pizza_topping_order');
    }
}

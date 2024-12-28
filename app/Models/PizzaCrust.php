<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PizzaCrust extends Model
{
    public function orders()
    {
        return $this->belongsToMany(PizzaOrder::class, 'pizza_crust_order');
    }
}

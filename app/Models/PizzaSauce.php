<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PizzaSauce extends Model
{
    public function orders()
    {
        return $this->belongsToMany(PizzaOrder::class, 'pizza_sauce_order');
    }
}

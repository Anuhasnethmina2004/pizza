<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PizzaOrder extends Model
{
    protected $fillable = ['user_id','toppings','crust','sauce','paid','name','cart_id','cheese_level','favorite', 'price', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    // Additional relationships for crust, sauce, and toppings
}


<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\PizzaOrder;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {

        $pastOrders = Cart::where('delivery_status', 3)->orderBy('date', 'desc')->get();


        $favoritePizzas = PizzaOrder::where('favorite', 1)->where('user_id',auth()->id())->get();

       
        $pendingDeliveries = Cart::where('delivery_status', '!=', 3)->where('user_id',auth()->id())->orderBy('date', 'asc')->get();

        return view('profile', [
            'pastOrders' => $pastOrders,
            'favoritePizzas' => $favoritePizzas,
            'pendingDeliveries' => $pendingDeliveries,
        ]);
    }
}


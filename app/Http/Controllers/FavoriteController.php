<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PizzaOrder;
use App\Commands\AddFavoritePizzaCommand;
use App\Commands\CommandInvoker;

class FavoriteController extends Controller
{
    public function addFavorite(Request $request, CommandInvoker $invoker)
    {
        $favoritePizza = PizzaOrder::findOrFail($request->favorite_pizza_id);

        $command = new AddFavoritePizzaCommand(auth()->id(), $favoritePizza);

        $invoker->addCommand($command);
        $invoker->executeCommands();

        return redirect()->route('cart.view')->with('success', 'Favorite pizza added to cart!');
    }
}

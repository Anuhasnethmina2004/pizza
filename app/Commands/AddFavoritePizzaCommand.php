<?php

namespace App\Commands;

use App\Models\PizzaOrder;

class AddFavoritePizzaCommand implements Command
{
    protected $userId;
    protected $favoritePizza;

    public function __construct($userId, $favoritePizza)
    {
        $this->userId = $userId;
        $this->favoritePizza = $favoritePizza;
    }

    public function execute()
    {
        PizzaOrder::create([
            'user_id' => $this->userId,
            'crust' => $this->favoritePizza->crust,
            'sauce' => $this->favoritePizza->sauce,
            'toppings' => $this->favoritePizza->toppings,
            'cheese_level' => $this->favoritePizza->cheese_level,
            'price' => $this->favoritePizza->price,
            'status' => '0',
            'paid' => false,
        ]);
    }
}

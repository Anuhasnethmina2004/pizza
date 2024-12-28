<?php
namespace App\Builders;

use App\Models\PizzaOrder;
use App\Models\PizzaCrust;
use App\Models\PizzaSauce;
use App\Models\PizzaTopping;

class PizzaOrderBuilder
{
    private $data = [];
    private $price = 0;

    public function setCrust($crustId)
    {
        $crust = PizzaCrust::findOrFail($crustId);
        $this->data['crust'] = $crustId;
        $this->price += $crust->price;
        return $this;
    }

    public function setSauce($sauceId)
    {
        $sauce = PizzaSauce::findOrFail($sauceId);
        $this->data['sauce'] = $sauceId;
        $this->price += $sauce->price;
        return $this;
    }

    public function setToppings($toppingIds)
    {
        $toppings = PizzaTopping::whereIn('id', $toppingIds)->get();
        $this->data['toppings'] = json_encode($toppingIds);
        $this->price += $toppings->sum('price');
        return $this;
    }

    public function setCheeseLevel($level)
    {
        $this->data['cheese_level'] = $level;
        return $this;
    }

    public function setName($name)
    {
        $this->data['name'] = $name;
        return $this;
    }

    public function setFavorite($favorite)
    {
        $this->data['favorite'] = $favorite;
        return $this;
    }

    public function build($userId)
    {
        $this->data['user_id'] = $userId;
        $this->data['price'] = $this->price;
        $this->data['status'] = '0';
        $this->data['paid'] = false;

        return PizzaOrder::create($this->data);
    }
}

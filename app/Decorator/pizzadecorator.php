<?php
// Component
interface Pizza {
    public function getDescription(): string;
    public function cost(): float;
}

// Concrete component
class PlainPizza implements Pizza {
    public function getDescription(): string {
        return "Plain Pizza";
    }

    public function cost(): float {
        return 8.00; // Base cost of the plain pizza
    }
}

// Decorator
abstract class PizzaDecorator implements Pizza {
    protected $pizza;

    public function __construct(Pizza $pizza) {
        $this->pizza = $pizza;
    }

    public function getDescription(): string {
        return $this->pizza->getDescription();
    }

    public function cost(): float {
        return $this->pizza->cost();
    }
}

// Concrete decorator for extra cheese
class ExtraCheeseDecorator extends PizzaDecorator {
    public function getDescription(): string {
        return $this->pizza->getDescription() . " + Extra Cheese";
    }

    public function cost(): float {
        return $this->pizza->cost() + 1.50; // Additional cost for extra cheese
    }
}

// Concrete decorator for pepperoni
class PepperoniDecorator extends PizzaDecorator {
    public function getDescription(): string {
        return $this->pizza->getDescription() . " + Pepperoni";
    }

    public function cost(): float {
        return $this->pizza->cost() + 2.00; // Additional cost for pepperoni
    }
}

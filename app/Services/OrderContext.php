<?php
namespace App\Services;

use App\Models\Cart;
use App\States\DeliveryState;

class OrderContext
{
    private DeliveryState $state;

    public function __construct(DeliveryState $state)
    {
        $this->state = $state;
    }

    public function setState(DeliveryState $state): void
    {
        $this->state = $state;
    }

    public function handle(Cart $cart): void
    {
        $this->state->handle($cart);
    }

    public function next(Cart $cart): void
    {
        $nextState = $this->state->next($cart);
        if ($nextState) {
            $this->setState($nextState);
            $this->handle($cart);
        }
    }

    public function currentState(): string
    {
        return $this->state->name();
    }
}

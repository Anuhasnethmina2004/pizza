<?php
namespace App\States;

use App\Models\Cart;

class OutForDeliveryState implements DeliveryState
{
    public function handle(Cart $cart): void
    {
        $cart->delivery_status = \App\Constants\DeliveryStatus::OUT_FOR_DELIVERY;
        $cart->save();
    }

    public function next(Cart $cart): ?DeliveryState
    {
        return new DeliveredState();
    }

    public function name(): string
    {
        return 'Out for Delivery';
    }
}

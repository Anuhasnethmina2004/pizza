<?php
namespace App\States;

use App\Models\Cart;

class DeliveredState implements DeliveryState
{
    public function handle(Cart $cart): void
    {
        $cart->delivery_status = \App\Constants\DeliveryStatus::DELIVERED;
        $cart->save();
    }

    public function next(Cart $cart): ?DeliveryState
    {
        return null; // End of the workflow
    }

    public function name(): string
    {
        return 'Delivered';
    }
}

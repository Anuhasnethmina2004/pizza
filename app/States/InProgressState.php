<?php
namespace App\States;

use App\Models\Cart;

class InProgressState implements DeliveryState
{
    public function handle(Cart $cart): void
    {
        $cart->delivery_status = \App\Constants\DeliveryStatus::IN_PROGRESS;
        $cart->save();
    }

    public function next(Cart $cart): ?DeliveryState
    {
        return new OutForDeliveryState();
    }

    public function name(): string
    {
        return 'In Progress';
    }
}

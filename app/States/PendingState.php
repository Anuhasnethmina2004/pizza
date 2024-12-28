<?php
namespace App\States;

use App\Models\Cart;

class PendingState implements DeliveryState
{
    public function handle(Cart $cart): void
    {
        $cart->delivery_status = \App\Constants\DeliveryStatus::PENDING;
        $cart->save();
    }

    public function next(Cart $cart): ?DeliveryState
    {
        return new InProgressState();
    }

    public function name(): string
    {
        return 'Pending';
    }
}

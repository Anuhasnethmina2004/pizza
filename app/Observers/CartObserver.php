<?php
namespace App\Observers;

use App\Models\Cart;
use App\Notifications\OrderStatusChanged;
use Illuminate\Support\Facades\Notification;
use App\Events\OrderStatusUpdated;
class CartObserver
{
    public function updated(Cart $cart)
    {
        // Check if the delivery status has changed
        if ($cart->isDirty('delivery_status')) {
            // Fire the event
            event(new OrderStatusUpdated($cart));
        }
    }
}

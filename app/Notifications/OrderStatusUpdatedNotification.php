<?php
namespace App\Notifications;

use App\Models\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\User;
use App\Constants\DeliveryStatus;
class OrderStatusUpdatedNotification extends Notification
{
    use Queueable;

    public $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function via($notifiable)
    {
        return ['mail']; // Or add database or other channels if needed
    }

    public function toMail($notifiable)
    {

        $user = User::find($this->cart->user_id); // Retrieve the user associated with the cart
        $statuses = DeliveryStatus::getStatuses();
        return (new MailMessage)
                    ->subject('Your Order Status Has Been Updated')
                    ->line('Your order status has been updated to: ' . $statuses[$this->cart->delivery_status])
                    ->action('View Order', url('/orders/' . $this->cart->id));
    }
}

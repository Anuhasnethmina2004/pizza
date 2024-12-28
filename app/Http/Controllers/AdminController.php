<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\PizzaOrder;
use App\Constants\DeliveryStatus;
use Illuminate\Http\Request;
use App\Events\OrderStatusUpdated;

// states
use App\Services\OrderContext;
use App\States\PendingState;
use App\States\InProgressState;
use App\States\OutForDeliveryState;
use App\States\DeliveredState;
class AdminController extends Controller
{
    public function index()
    {

        $orders = Cart::all();
        $statuses = DeliveryStatus::getStatuses();
        return view('admin.orders', compact('orders', 'statuses'));
    }

    // public function updateStatus(Request $request, $id)
    // {
    //     $cart = Cart::findOrFail($id);
    //     // $cart->status = $request->input('status');
    //     $cart->delivery_status = $request->input('delivery_status');
    //     $cart->save();

    //     event(new OrderStatusUpdated($cart));

    //     return redirect()->back()->with('success', 'Order status updated successfully.');
    // }



public function updateStatus(Request $request, $id)
{
    $cart = Cart::findOrFail($id);

    // Map delivery_status values to state classes
    $stateMap = [
        \App\Constants\DeliveryStatus::PENDING => PendingState::class,
        \App\Constants\DeliveryStatus::IN_PROGRESS => InProgressState::class,
        \App\Constants\DeliveryStatus::OUT_FOR_DELIVERY => OutForDeliveryState::class,
        \App\Constants\DeliveryStatus::DELIVERED => DeliveredState::class,
    ];

    // Get the current state class
    $currentStateClass = $stateMap[$cart->delivery_status] ?? PendingState::class;
    $currentState = new $currentStateClass();

    // Create the context
    $context = new OrderContext($currentState);

    // Transition to the selected state
    $selectedStateClass = $stateMap[$request->input('delivery_status')] ?? null;

    if ($selectedStateClass) {
        $selectedState = new $selectedStateClass();
        $context->setState($selectedState);
        $context->handle($cart);
    }

    event(new OrderStatusUpdated($cart));

    return redirect()->back()->with('success', 'Order status updated to ' . $context->currentState());
}



    public function showOrderDetails($orderId)
{
    // Fetch order with related pizza orders and feedbacks
    $order = Cart::findOrFail($orderId);
    $PizzaOrders = PizzaOrder::where('cart_id', $orderId)->get();
    // dd( $PizzaOrders);
    // Statuses for the delivery status dropdown
    $statuses = DeliveryStatus::getStatuses();
    return view('admin.details', compact('order','PizzaOrders', 'statuses'));
}
}

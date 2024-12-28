@extends('layouts.admin')

@section('content')

<style>
    body {
        background-color: #121212;
        color: #fff;
        font-family: 'Arial', sans-serif;
    }

    .container {
        max-width: 1200px;
        margin-top: 30px;
    }

    .order-details-container {
        background-color: #1c1c1c;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.5);
    }

    h1, h5, h6 {
        font-weight: 600;
    }

    .order-summary, .pizza-orders-details, .feedback-section, .update-delivery-status {
        background-color: #2c2c2c;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
    }

    .pizza-detail, .feedback-item {
        background-color: #333;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .update-delivery-status form {
        display: flex;
        align-items: center;
    }

    /* Button Styling */
    .custom-btn {
        background-color: #f8b400;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 16px;
        display: inline-flex;
        align-items: center;
    }

    .custom-btn:hover {
        background-color: #e09d00;
    }

    .custom-btn:focus {
        outline: none;
    }

    .custom-btn i {
        margin-right: 8px;
    }

    /* Select Field Styling */
    .custom-select {
        background-color: #333;
        color: white;
        border-radius: 5px;
        padding: 8px;
        font-size: 14px;
        margin-right: 15px;
        width: 200px;
    }

    /* Emoji for Friendly UI */
    .emoji {
        font-size: 20px;
        margin-right: 5px;
    }

    .order-summary p,
    .pizza-orders-details p,
    .feedback-section p {
        font-size: 16px;
        line-height: 1.6;
    }

    /* Header Styling */
    h1 {
        font-size: 28px;
        margin-bottom: 20px;
    }

    h5 {
        font-size: 20px;
        margin-bottom: 10px;
    }

    h6 {
        font-size: 18px;
        margin-bottom: 5px;
    }
</style>

<div class="container">
    <h1 class="text-center text-white">Order Details for Order #{{ $order->id }} 🛍️</h1>

    <div class="order-details-container">
        <!-- Order Summary -->
        <div class="order-summary">
            <h5 class="text-white">Order Summary 📝</h5>
            <p><strong>User:</strong> {{ $order->user->name ?? 'Guest' }}</p>
            <p><strong>Delivery Address:</strong> {{ $order->delivery_address }}</p>
            <p><strong>Total Price:</strong> ${{ $order->price }}</p>
            <p><strong>Status:</strong> {{ $statuses[$order->status] ?? 'Unknown' }}</p>
            <p><strong>Delivery Status:</strong> {{ $statuses[$order->delivery_status] ?? 'Unknown' }}</p>
        </div>

        <!-- Pizza Orders -->
        <div class="pizza-orders-details">
            <h5 class="text-white">Pizza Orders 🍕</h5>
            @foreach ($PizzaOrders as $pizzaOrder)
            <div class="pizza-detail">
                <h6>Pizza: {{ App\Models\PizzaCrust::where('id', $pizzaOrder->crust)->first()->name }} with {{ App\Models\PizzaSauce::where('id', $pizzaOrder->sauce)->first()->name }} Sauce</h6>
                <p><strong>Toppings:</strong>
                    @php
                            $toppingNames = App\Models\PizzaTopping::whereIn('id', json_decode($pizzaOrder->toppings))->pluck('name');
                        @endphp
                        {{ $toppingNames->implode(', ') }}
                </p>
                <p><strong>Extra Cheese Level:</strong> {{ $pizzaOrder->cheese_level }}</p>
                <p><strong>Price:</strong> ${{ $pizzaOrder->price }}</p>
            </div>
            @endforeach
        </div>

        <!-- Customer Feedback -->
        <div class="feedback-section">
            <h5 class="text-white">Customer Feedback 💬</h5>
            @if ($order->feedback->count() > 0)
                @foreach ($order->feedback as $feedback)
                    <div class="feedback-item">
                        <p><strong>Rating:</strong> {{ $feedback->rating }} / 5 🌟</p>
                        <p><strong>Comment:</strong> {{ $feedback->comment }}</p>
                    </div>
                @endforeach
            @else
                <p>No feedback available for this order. 🤔</p>
            @endif
        </div>

        <!-- Update Delivery Status -->
        <div class="update-delivery-status">
            <h5 class="text-white">Update Delivery Status 📦</h5>
            <form action="{{ route('admin.orders.update.delivery', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <select name="delivery_status" class="form-select custom-select">
                    @foreach ($statuses as $key => $value)
                        <option value="{{ $key }}" {{ $order->delivery_status == $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn custom-btn">
                    <i class="fas fa-sync-alt"></i> Update Delivery Status
                </button>
            </form>
        </div>
    </div>
</div>

@endsection

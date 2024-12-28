
@extends('layouts.header')

@section('content')

<style>
    .profile-container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        border-radius: 8px;
        background: #1c1c1c;
        color: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }
    .profile-title {
        text-align: center;
        margin-bottom: 20px;
        font-size: 2rem;
        color: #f8b400;
    }
    .profile-section {
        margin-bottom: 30px;
    }
    .section-title {
        font-size: 1.5rem;
        margin-bottom: 15px;
        color: #f8b400;
    }
    .empty-message {
        text-align: center;
        color: #aaa;
        font-size: 1rem;
    }
    .profile-table {
        width: 100%;
        border-collapse: collapse;
    }
    .profile-table th, .profile-table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #444;
    }
    .profile-table th {
        background-color: #2c2c2c;
        color: #f8b400;
    }
    .list-group-item {
        background: #2c2c2c;
        color: #fff;
        border: 1px solid #444;
        padding: 10px;
        margin-bottom: 5px;
    }
    .list-group-item strong {
        color: #f8b400;
    }
</style>
<style>
    .table td, .table th {
        vertical-align: middle;
    }
    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.2rem;
    }
</style>
<style>
    /* Custom styles for rating stars */
    .rating-stars i {
        font-size: 1.5rem;
    }

    .btn-warning {
        background-color: #f8b400;
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 1rem;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }
</style>
<!-- Add FontAwesome for star icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div class="profile-container dark-theme">
    <h1 class="profile-title">👤 Your Profile</h1>

    {{-- Pending Deliveries Section --}}
    <section class="profile-section">
        <h2 class="section-title">🚚 Pending Deliveries</h2>
        <div class="card">
            <div class="card-body">
                @if($pendingDeliveries->isEmpty())
                    <p class="empty-message">No pending deliveries found.</p>
                @else
                    <table class="table profile-table">
                        <thead>
                            <tr>
                                <th>Delivery Address</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendingDeliveries as $delivery)
                                <tr>
                                    <td>{{ $delivery->delivery_address }}</td>
                                    <td>
                                        @switch($delivery->delivery_status)
                                            @case(0)
                                                Pending Approval
                                                @break
                                            @case(1)
                                                Preparing
                                                @break
                                            @case(2)
                                                On the Way
                                                @break
                                            @case(3)
                                                Delivered
                                                @break
                                            @default
                                                Unknown
                                        @endswitch
                                    </td>
                                    <td>{{ $delivery->date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </section>

    <section class="profile-section">
        <h2 class="section-title">❤️ Favorite Pizzas</h2>
        <div class="card">
            <div class="card-body">
                @if($favoritePizzas->isEmpty())
                    <p class="empty-message">No favorite pizzas found.</p>
                @else
                    <table class="table profile-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($favoritePizzas as $pizza)
                                <tr>
                                    <td>{{ $pizza->name }}</td>
                                    <td>${{ $pizza->price }}</td>
                                    <td>
                                        <form action="{{ route('favorite.add') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="favorite_pizza_id" value="{{ $pizza->id }}">
                                            <button type="submit" class="btn btn-warning btn-sm">Add to Cart</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </section>

    {{-- Past Orders Section --}}
    <section class="profile-section">
        <h2 class="section-title">📜 Past Orders</h2>
        <div class="card">
            <div class="card-body">
                @if($pastOrders->isEmpty())
                    <p class="empty-message">No past orders found.</p>
                @else
                    <table class="table profile-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Total Price</th>
                                <th>Item Count</th>
                                <th>Status</th>
                                <th>Feedback</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pastOrders as $order)
                                <tr>
                                    <td>{{ $order->date }}</td>
                                    <td>${{ $order->price }}</td>
                                    <td>{{ $order->item_count }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    <td>
                                        @php
                                            // Check if feedback already exists for this order
                                            $existingFeedback = $order->feedback()->first();
                                        @endphp

                                        @if($existingFeedback)
                                            {{-- If feedback exists, show the rating as stars --}}
                                            <div class="rating-stars">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i class="fa{{ $i <= $existingFeedback->rating ? 's' : 'r' }} fa-star" style="color: gold;"></i>
                                                @endfor
                                            </div>
                                        @else
                                            {{-- If no feedback, show the "Add Feedback" button --}}
                                            <form action="{{ route('feedback.create') }}" method="GET">
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                <button type="submit" class="btn btn-warning">Add Feedback</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </section>

</div>

@endsection

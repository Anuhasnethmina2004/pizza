@extends('layouts.header')
@section('content')
    <div class="cart-container dark-theme">
        <h1 class="cart-title">🛒 Your Cart</h1>
        @if ($pizzas->isEmpty())
            <p class="empty-message">Your cart is empty. Add some pizzas to get started!</p>
        @else
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Crust</th>
                        <th>Sauce</th>
                        <th>Toppings</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pizzas as $pizza)
                        <tr>
                            <td>{{ App\Models\PizzaCrust::where('id', $pizza->crust)->first()->name }}</td>
                            <td>{{ App\Models\PizzaSauce::where('id', $pizza->sauce)->first()->name }}</td>
                            <td>
                                @php
                                    $toppingNames = App\Models\PizzaTopping::whereIn(
                                        'id',
                                        json_decode($pizza->toppings),
                                    )->pluck('name');
                                @endphp
                                {{ $toppingNames->implode(', ') }}
                            </td>
                            <td>${{ $pizza->price }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $pizza->id) }}" method="POST" class="remove-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-dark">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @php
                $loyaltyPoints=10;
            @endphp
            {{-- <div class="cart-summary">
                <h2 class="summary-title">Cart Summary</h2>

                <div class="summary-details">
                    <p><strong>Original Total:</strong> ${{ $totalPrice }}</p>
                    <p><strong>Loyalty Points Applied:</strong> ${{ min($loyaltyPoints, $totalPrice) }}</p>

                    @if (session('discount'))
                        <p><strong>Discount ({{ session('discount')['code'] }}):</strong> -${{ session('discount')['value'] }}</p>
                    @endif

                    <p><strong>Total After Discount:</strong>
                        ${{ $totalPrice - (session('discount')['value'] ?? 0) }}
                    </p>
                </div>

                <form action="{{ route('cart.apply_discount') }}" method="POST" class="discount-form">
                    @csrf
                    <input type="text" name="discount_code" placeholder="Enter discount code" class="discount-input">
                    <button type="submit" class="btn-dark">Apply</button>
                </form>

                <a href="{{ route('cart.checkout_form') }}" class="btn-dark checkout-btn">Proceed to Checkout</a>
            </div> --}}
            {{-- <div class="cart-summary">
                <h2 class="summary-title">Cart Summary</h2>

                <div class="summary-details">
                    <p>
                        <span class="summary-label"><strong>Original Total:</strong></span>
                        <span class="summary-value">${{ $totalPrice }}</span>
                    </p>
                    <p>
                        <span class="summary-label"><strong>Loyalty Points Applied:</strong></span>
                        <span class="summary-value">
                            ${{ min($loyaltyPoints, $totalPrice) }}
                        </span>
                    </p>

                    @if (session('discount'))
                        <p>
                            <span class="summary-label"><strong>Discount ({{ session('discount')['code'] }}):</strong></span>
                            <span class="summary-value">-${{ session('discount')['value'] }}</span>
                        </p>
                    @endif

                    <p>
                        <span class="summary-label"><strong>Total After Discount:</strong></span>
                        <span class="summary-value">
                            ${{ $totalPrice - (session('discount')['value'] ?? 0) }}
                        </span>
                    </p>
                </div>

                <form action="{{ route('cart.apply_discount') }}" method="POST" class="discount-form">
                    @csrf
                    <input type="text" name="discount_code" placeholder="Enter discount code" class="discount-input">
                    <button type="submit" class="btn-dark">Apply</button>
                </form>

                <a href="{{ route('cart.checkout_form') }}" class="btn-dark checkout-btn">Proceed to Checkout</a>
            </div> --}}
            <div class="cart-summary">
                <h2 class="summary-title">Cart Summary</h2>

                <div class="summary-details">
                    <p>
                        <span class="summary-label"><strong>Original Total:</strong></span>
                        <span class="summary-value">${{ $totalPrice }}</span>
                    </p>
                    <p>
                        <span class="summary-label"><strong>Loyalty Points Applied:</strong></span>
                        <span class="summary-value">${{ min($loyaltyPoints, $totalPrice) }}</span>
                    </p>

                    @if (session('discount'))
                        <p>
                            <span class="summary-label"><strong>Discount ({{ session('discount')['code'] }}):</strong></span>
                            <span class="summary-value">-${{ session('discount')['value'] }}</span>
                        </p>
                    @endif

                    @if ($promotion)
                        <p>
                            <span class="summary-label"><strong>Promotion ({{ $promotion->name }}):</strong></span>
                            <span class="summary-value">-${{ $promotion->value }}</span>
                        </p>
                    @endif

                    <p>
                        <span class="summary-label"><strong>Total After Discounts:</strong></span>
                        <span class="summary-value">
                            ${{ $totalPrice - (session('discount')['value'] ?? 0) - ($promotion->value ?? 0) }}
                        </span>
                    </p>
                </div>

                <form action="{{ route('cart.apply_discount') }}" method="POST" class="discount-form">
                    @csrf
                    <input type="text" name="discount_code" placeholder="Enter discount code" class="discount-input">
                    <button type="submit" class="btn-dark">Apply</button>
                </form>

                <a href="{{ route('cart.checkout_form') }}" class="btn-dark checkout-btn">Proceed to Checkout</a>
            </div>

        @endif
    </div>

    <style>

.cart-summary .summary-details p {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 8px 0;
}

.cart-summary .summary-label {
    flex: 1;
    text-align: left;
    padding-right: 10px;
}

.cart-summary .summary-value {
    flex: 0 0 100px;
    text-align: right;
}

        .cart-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: #1c1c1c;
            color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        .cart-title {
            text-align: center;
            color: #f8b400;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        .cart-table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        .cart-table th, .cart-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #444;
        }

        .cart-table th {
            background: #2c2c2c;
            color: #f8b400;
        }

        .cart-summary {
            padding: 20px;
            background: #2c2c2c;
            border-radius: 8px;
        }

        .summary-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #f8b400;
        }

        .summary-details p {
            margin: 5px 0;
        }

        .btn-dark {
            background: #f8b400;
            color: #1c1c1c;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            transition: background 0.3s;
        }

        .btn-dark:hover {
            background: #ffa800;
        }

        .checkout-btn {
            width: 100%;
            text-align: center;
            display: block;
        }

        .discount-form {
            margin: 15px 0;
            display: flex;
            justify-content: space-between;
        }

        .discount-input {
            flex: 1;
            padding: 10px;
            border: 1px solid #444;
            border-radius: 5px;
            margin-right: 10px;
            color: #fff;
            background: #1c1c1c;
        }

        .discount-input::placeholder {
            color: #aaa;
        }

        .empty-message {
            text-align: center;
            color: #ccc;
            font-size: 1rem;
        }
    </style>
@endsection

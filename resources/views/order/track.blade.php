<h1>Order #{{ $order->id }} - Status: {{ $order->status }}</h1>
<ul>
    <li>Crust: {{ $order->crusts->pluck('name')->join(', ') }}</li>
    <li>Sauce: {{ $order->sauces->pluck('name')->join(', ') }}</li>
    <li>Toppings: {{ $order->toppings->pluck('name')->join(', ') }}</li>
    <li>Total Price: ${{ $order->total_price }}</li>
</ul>

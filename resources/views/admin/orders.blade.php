@extends('layouts.admin')

@section('content')
<style>
    body {
        background-color: #121212;
        color: #fff;
    }

    .container {
        max-width: 1200px;
    }

    .order-management-container {
        background-color: #1c1c1c;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    .custom-table {
        width: 100%;
        background-color: #333;
        color: #fff;
        border-radius: 8px;
        margin-top: 20px;
        border-collapse: separate;
    }

    .custom-table th, .custom-table td {
        padding: 12px;
        text-align: left;
        font-size: 14px;
    }

    .custom-table th {
        background-color: #444;
    }

    .custom-table tr:hover {
        background-color: #555;
    }

    .custom-btn {
        background-color: #f8b400;
        color: #fff;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .custom-btn:hover {
        background-color: #e09d00;
    }

    .custom-select {
        background-color: #333;
        color: white;
        border-radius: 5px;
        padding: 8px;
        font-size: 14px;
    }

    .custom-modal-header, .custom-modal-footer {
        background-color: #444;
    }

    .custom-modal-body {
        background-color: #2c2c2c;
    }

    .pizza-detail {
        background-color: #333;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .modal-title {
        color: #f8b400;
        font-size: 18px;
        font-weight: bold;
    }

    .modal-body h6 {
        color: #f8b400;
    }

    .modal-body p {
        color: #ccc;
    }
</style>
{{-- <div class="container mt-5">
    <h1 class="text-center text-white mb-4">Manage Orders</h1>

    <div class="order-management-container">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Delivery Address</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Delivery Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? 'Guest' }}</td>
                    <td>{{ $order->delivery_address }}</td>
                    <td>${{ $order->price }}</td>
                    <td>{{ $statuses[$order->status] ?? 'Unknown' }}</td>
                    <td>{{ $statuses[$order->delivery_status] ?? 'Unknown' }}</td>
                    <td>
                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="d-flex">
                                <select name="delivery_status" class="form-select custom-select">
                                    @foreach ($statuses as $key => $value)
                                    <option value="{{ $key }}" {{ $order->delivery_status == $key ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn custom-btn ms-2">Update</button>
                            </div>
                        </form>
                        <button class="btn custom-btn mt-2" data-bs-toggle="modal" data-bs-target="#orderDetailsModal{{ $order->id }}">View Details</button>
                    </td>
                </tr>

                <!-- Modal for Pizza Details -->
                <div class="modal fade" id="orderDetailsModal{{ $order->id }}" tabindex="-1" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header custom-modal-header">
                                <h5 class="modal-title" id="orderDetailsModalLabel">Order Details for Order #{{ $order->id }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body custom-modal-body">
                                @foreach ($order->pizzaOrders as $pizzaOrder)
                                    <div class="pizza-detail mb-3">
                                        <h6>Pizza: {{ $pizzaOrder->crust->name }} - {{ $pizzaOrder->sauce->name }}</h6>
                                        <p><strong>Toppings:</strong>
                                            @foreach (json_decode($pizzaOrder->toppings) as $topping)
                                                {{ $topping->name }},
                                            @endforeach
                                        </p>
                                        <p><strong>Extra Cheese Level:</strong> {{ $pizzaOrder->cheese_level }}</p>
                                        <p><strong>Price:</strong> ${{ $pizzaOrder->price }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="modal-footer custom-modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div> --}}







<div class="container mt-5">
    <h1 class="text-center text-white mb-4">Manage Orders</h1>

    <div class="order-management-container">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Delivery Address</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Delivery Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td >{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? 'Guest' }}</td>
                    <td>{{ $order->delivery_address }}</td>
                    <td>${{ $order->price }}</td>
                    <td>{{ $statuses[$order->status] ?? 'Unknown' }}</td>
                    <td>{{ $statuses[$order->delivery_status] ?? 'Unknown' }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="d-flex">
                                @csrf
                                @method('PUT')
                                <select name="delivery_status" class="form-select custom-select">
                                    @foreach ($statuses as $key => $value)
                                        <option value="{{ $key }}" {{ $order->delivery_status == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn custom-btn ms-2">  <i class="fas fa-sync-alt"></i> Update</button>
                                <a href="{{ route('admin.orders.details', $order->id) }}" class="btn custom-btn ms-2"> <i class="fas fa-eye"></i>View Details</a>
                            </form>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


{{-- @push('scripts') --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
{{-- @endpush --}}

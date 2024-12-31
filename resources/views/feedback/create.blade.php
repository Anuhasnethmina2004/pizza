@extends('layouts.header')

@section('content')
<style>
    body {
        background-color: #121212;
        color: #fff;
    }

    .feedback-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        border-radius: 8px;
        background: #1e1e1e;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .feedback-title {
        text-align: center;
        margin-bottom: 20px;
        font-size: 2rem;
        color: #f8b400;
    }

    .form-label {
        font-size: 1rem;
        color: #f8b400;
    }

    .form-control, .form-select {
        background-color: #2e2e2e;
        color: #fff;
        border: 1px solid #444;
        border-radius: 4px;
        padding: 10px;
    }

    .form-control:focus, .form-select:focus {
        border-color: #f8b400;
        box-shadow: 0 0 5px rgba(248, 180, 0, 0.5);
    }

    .btn-warning {
        background-color: #f8b400;
        border-color: #f8b400;
        color: #121212;
        font-size: 1rem;
        padding: 10px 20px;
        border-radius: 4px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-warning:hover {
        background-color: #d49b00;
        color: #fff;
    }

    .pizza-summary {
        margin-bottom: 20px;
    }

    .pizza-summary-item {
        background: #2e2e2e;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 10px;
        color: #fff;
        border: 1px solid #444;
    }

    .pizza-summary-item h4 {
        color: #f8b400;
    }

    .pizza-summary-item p {
        margin: 5px 0;
    }
</style>

<div class="feedback-container">
    <h1 class="feedback-title">Submit Feedback for Cart #{{ $orderId }}</h1>

    <!-- Display Pizza Summary -->
    <div class="pizza-summary">
        <h2 class="text-warning">Pizza Summary</h2>
        @foreach($pizzas as $pizza)
            <div class="pizza-summary-item">
                <h4>{{ $pizza->name }}</h4>
                <p>Crust: {{ $pizza->crust }}</p>
                <p>Sauce: {{ $pizza->sauce }}</p>
                {{-- <p>Toppings: {{ implode(', ', $pizza->toppings ?? []) }}</p> --}}
                <p>Price: ${{ $pizza->price }}</p>
            </div>
        @endforeach
    </div>
<style>

    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #ccc;
    }
    .form-group input,.form-group select, .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #444;
        border-radius: 5px;
        background: #2c2c2c;
        color: #fff;
        font-size: 1rem;
    }
    .form-group input::placeholder, .form-group textarea::placeholder {
        color: #777;
    }
    .readonly-field {
        background-color: #2c2c2c;
        color: #aaa;
    }
    .form-actions {
        text-align: center;
        margin-top: 20px;
    }
</style>
    <!-- Feedback Form -->
    <form action="{{ route('feedback.store') }}" method="POST">
        @csrf
        <input type="hidden" name="order_id" value="{{ $orderId }}">

        <div class="form-group">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" placeholder="Rate between 1 and 5" required>
        </div>
        <div class="form-group">
            <label for="comment" class="form-label">Comment</label>
            <textarea name="comment" id="comment" rows="4" class="form-control" placeholder="Write your feedback here..."></textarea>
        </div>
        <button type="submit" class="btn btn-warning">Submit Feedback</button>
    </form>
</div>
@endsection

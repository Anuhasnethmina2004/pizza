

@extends('layouts.header')

@section('content')

<style>
    .pizza-creator-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        border-radius: 8px;
        background: #1c1c1c;
        color: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }
    .title {
        text-align: center;
        margin-bottom: 20px;
        font-size: 2rem;
        color: #f8b400;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-label {
        font-weight: bold;
        display: block;
        margin-bottom: 8px;
    }
    .form-select, .form-input {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 1rem;
    }
    .form-select:focus, .form-input:focus {
        outline: none;
        border-color: #f8b400;
        box-shadow: 0 0 5px #f8b400;
    }
    .toppings-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .checkbox-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .btn {
        width: 100%;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #f8b400;
        color: #fff;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .btn:hover {
        background-color: #e09d00;
    }
</style>
<div class="pizza-creator-container dark-theme">
    <h1 class="title">🍕 Create Your Perfect Pizza</h1>

    <form action="{{ route('pizza.add_to_cart') }}" method="POST" class="pizza-form">
        @csrf

        <!-- Crust Selection -->
        <div class="form-group">
            <label for="crust" class="form-label">Choose Your Crust:</label>
            <select name="crust_id" id="crust" class="form-select">
                @foreach($crusts as $crust)
                    <option value="{{ $crust->id }}">{{ $crust->name }} (${{ $crust->price }})</option>
                @endforeach
            </select>
        </div>

        <!-- Sauce Selection -->
        <div class="form-group">
            <label for="sauce" class="form-label">Pick a Sauce:</label>
            <select name="sauce_id" id="sauce" class="form-select">
                @foreach($sauces as $sauce)
                    <option value="{{ $sauce->id }}">{{ $sauce->name }} (${{ $sauce->price }})</option>
                @endforeach
            </select>
        </div>

        <!-- Toppings -->
        <div class="form-group">
            <label for="toppings" class="form-label">Choose Your Toppings:</label>
            <div class="toppings-container">
                @foreach($toppings as $topping)
                    <div class="checkbox-item">
                        <input type="checkbox" name="topping_ids[]" id="topping-{{ $topping->id }}" value="{{ $topping->id }}">
                        <label for="topping-{{ $topping->id }}">{{ $topping->name }} (${{ $topping->price }})</label>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Cheese Level -->
        <div class="form-group">
            <label for="cheese-level" class="form-label">Cheese Level:</label>
            <select id="cheese-level" name="cheese_level" class="form-select">
                <option value="light">Light Cheese</option>
                <option value="regular" selected>Regular Cheese</option>
                <option value="extra">Extra Cheese</option>
            </select>
        </div>

        <!-- Favorite Pizza -->
        <div class="form-group">
            <div class="checkbox-item">
                <input type="checkbox" id="favorite" name="favorite" value="1">
                <label for="favorite">Mark as Favorite 🧀🍕</label>
            </div>
        </div>

        <!-- Custom Pizza Name -->
        <div class="form-group">
            <label for="pizza-name" class="form-label">Name Your Pizza:</label>
            <input type="text" id="pizza-name" name="name" placeholder="e.g., Vitos's Special Pizza" class="form-input">
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <button type="submit" class="btn btn-dark">Add to Cart</button>
        </div>
    </form>
</div>

@endsection

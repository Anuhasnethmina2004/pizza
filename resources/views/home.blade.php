@extends('layouts.header')

@section('title', 'Pizza Delivery App')

@section('content')
<div style="background-color: #121212; color: #fff; padding-bottom: 50px;">
    <!-- Hero Section -->
    <div style="text-align: center; padding: 60px 20px; background: linear-gradient(to right, #ff7e5f, #feb47b);">
        <h1 style="font-size: 3rem; font-weight: bold; color: #fff;">Welcome to Pizza Haven!</h1>
        <p style="font-size: 1.2rem; margin: 20px 0;">Delicious pizzas delivered fresh to your doorstep!</p>
        <a href="#menu" style="padding: 15px 30px; background-color: #ff5722; color: #fff; text-decoration: none; font-size: 1rem; border-radius: 30px; display: inline-block; margin-top: 20px;">Explore Menu</a>
    </div>

    <!-- Featured Pizzas -->
    <div id="menu" style="padding: 50px 20px;">
        <h2 style="text-align: center; font-size: 2rem; margin-bottom: 40px; color: #feb47b;">Our Bestsellers</h2>
        <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
            <div style="background-color: #1f1f1f; border-radius: 8px; overflow: hidden; width: 300px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
                <img src="/images/margherita.jpg" alt="Margherita Pizza" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 20px;">
                    <h3 style="font-size: 1.5rem; color: #ff7e5f; margin-bottom: 10px;">Margherita</h3>
                    <p style="font-size: 1rem; color: #ccc;">Classic cheese and tomato base.</p>
                    <button style="padding: 10px 20px; background-color: #ff5722; border: none; color: #fff; border-radius: 4px; margin-top: 15px; cursor: pointer;">Order Now</button>
                </div>
            </div>
            <div style="background-color: #1f1f1f; border-radius: 8px; overflow: hidden; width: 300px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
                <img src="/images/pepperoni.jpg" alt="Pepperoni Pizza" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 20px;">
                    <h3 style="font-size: 1.5rem; color: #ff7e5f; margin-bottom: 10px;">Pepperoni</h3>
                    <p style="font-size: 1rem; color: #ccc;">Loaded with pepperoni and cheese.</p>
                    <button style="padding: 10px 20px; background-color: #ff5722; border: none; color: #fff; border-radius: 4px; margin-top: 15px; cursor: pointer;">Order Now</button>
                </div>
            </div>
            <div style="background-color: #1f1f1f; border-radius: 8px; overflow: hidden; width: 300px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
                <img src="/images/veggie.jpg" alt="Veggie Pizza" style="width: 100%; height: 200px; object-fit: cover;">
                <div style="padding: 20px;">
                    <h3 style="font-size: 1.5rem; color: #ff7e5f; margin-bottom: 10px;">Veggie Delight</h3>
                    <p style="font-size: 1rem; color: #ccc;">Fresh veggies on a cheese base.</p>
                    <button style="padding: 10px 20px; background-color: #ff5722; border: none; color: #fff; border-radius: 4px; margin-top: 15px; cursor: pointer;">Order Now</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div style="padding: 40px 20px; background-color: #1f1f1f; text-align: center;">
        <h2 style="font-size: 2rem; color: #feb47b; margin-bottom: 20px;">Contact Us</h2>
        <p style="font-size: 1rem; color: #ccc;">Have questions? Reach out to us at <a href="mailto:info@pizzahaven.com" style="color: #ff7e5f; text-decoration: none;">info@pizzahaven.com</a>.</p>
    </div>
</div>
@endsection

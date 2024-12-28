{{-- @extends('layouts.header')

@section('title', 'Register')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; height: 80vh;">
    <form action="{{ route('register') }}" method="POST" style="background-color: #1f1f1f; padding: 20px; border-radius: 8px; width: 300px;">
        @csrf
        <h2 style="text-align: center; color: #ffffff;">Register</h2>
        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; color: #888;">Name:</label>
            <input type="text" name="name" id="name" style="width: 100%; padding: 10px; background-color: #2c2c2c; border: 1px solid #444; color: #fff;" required>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; color: #888;">Email:</label>
            <input type="email" name="email" id="email" style="width: 100%; padding: 10px; background-color: #2c2c2c; border: 1px solid #444; color: #fff;" required>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; color: #888;">Password:</label>
            <input type="password" name="password" id="password" style="width: 100%; padding: 10px; background-color: #2c2c2c; border: 1px solid #444; color: #fff;" required>
        </div>
        <button type="submit" style="width: 100%; padding: 10px; background-color: #5bc0de; border: none; color: #fff; cursor: pointer; border-radius: 4px;">Register</button>
    </form>
</div>
@endsection

@include('layouts.footer') --}}
@extends('layouts.header')

@section('title', 'Register')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; height: 80vh; background-color: #121212;">
    <form action="{{ route('register') }}" method="POST" style="background-color: #1f1f1f; padding: 25px 30px; border-radius: 10px; width: 100%; max-width: 400px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
        @csrf
        <h2 style="text-align: center; color: #ffffff; margin-bottom: 20px;">Register</h2>
        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; color: #888; margin-bottom: 5px;">Name:</label>
            <input type="text" name="name" id="name" style="width: 100%; padding: 10px; background-color: #2c2c2c; border: 1px solid #444; border-radius: 5px; color: #fff;" required>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; color: #888; margin-bottom: 5px;">Email:</label>
            <input type="email" name="email" id="email" style="width: 100%; padding: 10px; background-color: #2c2c2c; border: 1px solid #444; border-radius: 5px; color: #fff;" required>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; color: #888; margin-bottom: 5px;">Password:</label>
            <input type="password" name="password" id="password" style="width: 100%; padding: 10px; background-color: #2c2c2c; border: 1px solid #444; border-radius: 5px; color: #fff;" required>
        </div>
        <button type="submit" style="width: 100%; padding: 12px; background-color: #5bc0de; border: none; color: #fff; cursor: pointer; border-radius: 5px; font-weight: bold; font-size: 1rem; text-transform: uppercase;">Register</button>
    </form>
</div>
@endsection

@include('layouts.footer')

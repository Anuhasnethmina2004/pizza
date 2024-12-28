@extends('layouts.header')

@section('title', 'Login')

@section('content')
<div class="login-container">
    <form action="{{ route('login') }}" method="POST" class="login-form">
        @csrf
        <h2 class="login-title">Login</h2>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="btn-dark">Login</button>
    </form>
</div>

<style>
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
        background-color: #121212;
    }
    .login-form {
        background-color: #1f1f1f;
        padding: 30px;
        border-radius: 10px;
        width: 350px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }
    .login-title {
        text-align: center;
        color: #f8b400;
        margin-bottom: 20px;
        font-size: 1.8rem;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        color: #888;
        margin-bottom: 8px;
    }
    .form-group input {
        width: 100%;
        padding: 12px 15px;
        background-color: #2c2c2c;
        border: 1px solid #444;
        border-radius: 6px;
        color: #fff;
        font-size: 14px;
    }
    .form-group input::placeholder {
        color: #777;
    }
    .btn-dark {
        width: 100%;
        padding: 12px;
        background-color: #d9534f;
        border: none;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        border-radius: 6px;
        transition: background-color 0.3s ease;
    }
    .btn-dark:hover {
        background-color: #c9302c;
    }
</style>
@endsection

@include('layouts.footer')

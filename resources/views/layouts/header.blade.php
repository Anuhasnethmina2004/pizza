<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Pizza Haven</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #fff;
        }

        /* Header */
        header {
            background-color: #1f1f1f;
            padding: 10px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #f8b400;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 15px;
        }

        .nav-links a, .nav-links form button {
            text-decoration: none;
            color: #ffffff;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .nav-links a:hover,
        .nav-links form button:hover {
            background-color: #f8b400;
            color: #121212;
        }

        .btn-primary {
            background-color: #d9534f;
            color: #fff;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #c9302c;
        }

        .btnheader {
            border: none;
            background: none;
            cursor: pointer;
            color: #fff;
        }

        .btnheader:hover {
            background-color: #f8b400;
            color: #121212;
        }

        /* Footer */
        footer {
            background-color: #1f1f1f;
            padding: 15px 0;
            text-align: center;
            font-size: 0.85rem;
            color: #888;
            margin-top: 20px;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.3);
        }

        footer p {
            margin: 0;
        }

        /* Main Content */
        main {
            max-width: 1200px;
            margin: 20px auto;
            padding: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <nav class="navbar">
            <a href="/" class="logo">Pizza Haven</a>
            <div class="nav-links">
                <a href="{{route('home')}}">Home</a>

                <a href="{{ route('pizza.builder') }}">Pizza Builder</a>
                <a href="{{ route('cart.view') }}">Cart</a>
                @if(!empty(auth()->id()))
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button class="btnheader" type="submit">Logout</button>
                </form>
                <a href="{{ route('profile') }}">Profile</a>
                @else
                <a href="/login">Login</a>
                <a href="/register" class="btn-primary">Sign Up</a>
                @endif
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                @if (session()->has('success'))
                    Swal.fire({
                        title: 'Success',
                        text: @json(session('success')),
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                @elseif (session()->has('error'))
                    Swal.fire({
                        title: 'Error',
                        text: @json(session('error')),
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                @endif
            });
        </script>
        @yield('content')
    </main>




    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} Pizza Haven. All rights reserved.</p>
    </footer>
</body>
</html>

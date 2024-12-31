<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Pizza Haven</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* General Reset */
        .swal-modal {
  font-family: sans-serif;
}

.swal-text {
  text-align: center;
}

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
        /* .nav-links form button:hover {
            background-color: #f8b400;
            color: #121212;
        } */



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
    <style>
        *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        scroll-behavior: smooth;
      }
      body{
        font-family: sans-serif;
        background: #000;
        color: white;
      }


      /*main*/
      .logo{
        text-align: center;
      }
      .lline{
        position: absolute;
        width: 40%;
        top: 8vh;
        border: 2px solid #ec953c;
      }
      .rline{
        position: absolute;
        width: 40%;
        top: 8vh;
        right: 0;
        border: 2px solid #ec953c;
      }
      .menu{
        text-align: center;
        list-style: none;
      }
      .menu ul li{
        display: inline-block;
        padding: 1vh 4vh 0;
      }
      .menu ul li a{
        font-size: 3vh;
        color: white;
        font-family: 'Quicksand';
        letter-spacing: 1px;
        text-transform: uppercase;
        text-decoration: none;
        transition: ease-in-out 100ms;
      }
      .menu ul li a:hover{
        color: #ec953c;
      }
      .menu ul li .active{
        color: #ec953c;
      }

      .menu ul li button{
        font-size: 3vh;
        color: white;
        font-family: 'Quicksand';
        letter-spacing: 1px;
        text-transform: uppercase;
        text-decoration: none;
        transition: ease-in-out 100ms;
      }
      /* .menu ul li button:hover{
        color: #ec953c;
      } */
      .menu ul li .active{
        color: #ec953c;
      }


      /*FormDesign*/
      .formDesign{
        width: 70%;
        margin: 0 auto;
        border: 2px solid white;
        border-radius: 5px;
        display: block;
      }
      .formDesign h2{
        background-color: #ec953c;
        color: white;
        text-align: center;
        text-transform:uppercase;
        padding: 4vh 0;
        margin-bottom: 2vh;
      }
      #form{
        margin-bottom: 8vh;
      }
      form{
        padding: 5vh;
      }
      form label{
        color: #ec953c;
        font-size: 2.4vh;
      }
      form button{
        border-radius: 5px;
      }
      .form-check label{
        color: white;
      }
      .rpizza, .lpizza{
        position: absolute;
      }
      .rpizza{
        width: 20%;
        margin: 9vh auto;
        right: 5.5vh;
      }
      .lpizza{
        left: 5.6vh;
        width: 20%;
        overflow: hidden;
      }

      /*Footer*/
      #footer{
        background-color: #111111;
        bottom: 0;
        padding: 3vh 0;
      }
      .footerText{
        padding-bottom: 2vh;
      }
      .left{
        float: left;
      }
      .right{
        float: right;
      }


      /*Successful*/
      .bg-pizza{
        background: url('https://i.postimg.cc/1tcRYdzn/4.jpg');
        height: 72vh;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
      .layer{
        background-color: #ec953c5e;
        height: 72vh;
      }
      .successfulBox{
        text-transform: uppercase;
        text-align: center;
        font-size: 6vh;
        width: 50%;
        padding-top: 8vh;
      }
      #marginbt {
        margin: 40px 0;
      }

      .container {
        max-width: 1200px;
        margin: 0 auto;
      }

      .row {
        display: flex;
        gap: 20px; /* Optional: Adds space between columns */
      }

      .col-6 {
        flex: 1 1 50%; /* Ensures each column takes 50% width */
        box-sizing: border-box;
      }

      .land-img-pos img {
        max-width: 100%; /* Ensures the image is responsive */
        height: auto;
      }

      .land-txt-pos h1 {
        margin-bottom: 10px;
      }

      .land-txt-pos {
        text-align: center;
      }

      .fbtn {
        margin-top: 20px;
        background-color: #ff4500;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        /* width: 200px; */
        height: 50px;
        display: flex !important;
  justify-content: center !important;
  align-items: center !important;
  text-align: center !important;  width: 100%; /* Full width of the column */
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
      }

      .fbtn a {
        color: white;
        text-decoration: none;
      }

      .ebtn {
        margin-top: 10px;
        background-color: #ddd;
        color: black;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
      }

      </style>
    <!-- Header -->
    {{-- <header>
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
    </header> --}}

    <span class="lline"></span>
    <span class="rline"></span>
    <div>
      <div class="container">
        <div class="logo">
          <img src="https://i.postimg.cc/T1gVSfDj/6.png" alt="logo" width="300px" height="100px"><br>
        </div>
        <div class="menu">
          <ul>
            <li>   <a href="{{route('home')}}">Home</a></li>
            <li><a href="{{ route('pizza.builder') }}">Order Now</a></li>
            <li><a href="{{ route('cart.view') }}">Cart</a></li>
            @if(!empty(auth()->id()))
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <li>  <button class="btnheader" type="submit">Logout</button></li>
            </form>
            <li> <a href="{{ route('profile') }}">Profile</a></li>
            @else
            <li> <a href="/login">Login</a></li>
                <li>  <a href="/register" class="btn-primary">Sign Up</a></li>
            @endif

           
          </ul>
        </div>
      </div>
    </div>

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

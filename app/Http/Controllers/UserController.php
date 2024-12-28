<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Show the register form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle the login logic
    // public function login(Request $request)
    // {


    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('home')->with('success', 'You are now logged in!');
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ])->onlyInput('email');
    // }

    public function login(Request $request)
    {
        // Check if the email and password match the predefined admin credentials
        if ($request->email === 'admin@gmail.com' && $request->password === 'admin') {
            // Perform the login for the admin user (you can either create a special admin user or hard-code these credentials)
            $adminUser = User::where('email', 'admin@gmail.com')->first(); // Find the admin user

            // if ($adminUser) {
                Auth::login($adminUser);
                return redirect()->route('admin.orders.index')->with('success', 'You are now logged in as admin!');
            // } else {
            //     // Optionally, you could create the admin user here if it doesn't exist
            //     // User::create(['email' => 'admin', 'password' => bcrypt('admin')]);

            //     // return back()->withErrors([
            //     //     'email' => 'Admin user does not exist.',
            //     // ])->onlyInput('email');
            // }
        }

        // If the credentials are not the admin ones, attempt regular authentication
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('home')->with('success', 'You are now logged in!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Handle the registration logic
    public function register(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|min:6|confirmed',
        // ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('home')->with('success', 'Your account has been created!');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'You have been logged out!');
    }
}


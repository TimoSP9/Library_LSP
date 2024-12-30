<?php

namespace App\Http\Controllers;

use App\Models\Register; // Make sure to import the Register model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('Login'); // Make sure you have the login.blade.php file
    }

    // Handle the login logic
    public function login(Request $request)
    {
        //dd($request->all());
        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Retrieve user by email
        $user = Register::where('email', $request->input('email'))->first();

        // Check if the user exists and the password matches
        if ($user && $user->password === $request->input('password')) {
            // Manually log the user in
            Auth::login($user);

            // Redirect to intended page (or dashboard)
            return redirect()->intended('/home'); // Change to your dashboard URL
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    // Optionally, handle logout
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }
}

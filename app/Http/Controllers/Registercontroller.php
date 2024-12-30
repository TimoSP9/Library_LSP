<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Register;


class RegisterController extends Controller
{
    use ValidatesRequests;

    // Show the registration form
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Handle the registration logic
    public function register(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'email' => 'required|email|unique:register,email',
            'password' => 'required|min:4',  // If no confirmation field, remove the 'confirmed'
        ]);

        // Create the user in the database
        Register::create(
            $request->all()
            // 'email' => $request->email,
            // 'password' => Hash::make($request->password),
        );

        // Redirect to login with success message
        return redirect()->route('login')->with('status', 'Registration successful! Please log in.');
    }
}

    // // Show the registration form
    // public function showRegistrationForm()
    // {
    //     return view('auth.register');
    // }

    // // Handle the registration logic
    // public function register(Request $request)
    // {
    //     $this->validate($request, [
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:6',
    //     ]);

    //     // Create the user
    //     User::create([
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     // Redirect to login or wherever after registration
//     return redirect()->route('login')->with('status', 'Registration successful! Please log in.');
// }

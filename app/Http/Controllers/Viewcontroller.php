<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Register;

class Viewcontroller extends Controller
{
    public function index()
    {
        return view('Login');
    }

    // public function login(Request $request)
    // {
    //     // Validate the form data
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:6',
    //     ]);

    //     // Attempt to log the user in
    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //         // Authentication passed, redirect based on role or success
    //         $user = Auth::user();
            
    //         if ($user->role === 'admin') {
    //             return redirect()->route('admin.home');
    //         } else if ($user->role === 'user') {
    //             return redirect()->route('user.home');
    //         }
    //     }

    //     // If login fails, redirect back with an error message
    //     return back()->withErrors(['email' => 'Invalid login credentials.']);
    // }
    
}

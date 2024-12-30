<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Return as ReturnModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReturnController extends Controller
{
    // Display the return form
    public function index()
    {
        $user = Auth::user(); // Get the logged-in user
        $borrowedBooks = Borrow::all(); // Fetch borrowed books by the user
        return view('Return', compact('user', 'borrowedBooks'));
    }

    // Handle the return logic
    public function store(Request $request)
    {
        $request->validate([
            'book1' => 'nullable|string',
            'book2' => 'nullable|string',
            'book3' => 'nullable|string',
        ]);

        // Store the return data
        ReturnModel::create([
            'book1' => $request->book1,
            'book2' => $request->book2,
            'book3' => $request->book3,
        ]);

        // Optionally, you may want to update the borrow table to indicate the books have been returned
        // Borrow::where('user_id', $request->user()->id)
        //     ->whereIn('book1', [$request->book1, $request->book2, $request->book3])
        //     ->update(['status' => 'returned']);

        return redirect()->route('return.Return')->with('success', 'Books returned successfully');
    }
}

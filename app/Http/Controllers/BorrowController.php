<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    // Display the borrow form
    public function borrow()
    {
        // Fetch all books to populate the borrow form
        $books = Book::all(); // Fetch all books from the Book model
        return view('Borrow', compact('books'));
    }

    // Store the borrow data in the database
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request data, ensuring that book1 is required, and book2 and book3 are optional
        $request->validate([
            'book1' => 'required|exists:books,title',  // Ensure book1 exists in the books table
            'book2' => 'nullable|exists:books,title',  // Ensure book2 exists if provided
            'book3' => 'nullable|exists:books,title',  // Ensure book3 exists if provided
        ]);
        
        // Store the borrow data in the database
        Borrow::create([
            'book1' => $request->book1, // Store book1 as the foreign key (book1_id)
            'book2' => $request->book2, // Store book2 as the foreign key (book2_id)
            'book3' => $request->book3, // Store book3 as the foreign key (book3_id)
            'user_id' => auth()->id(), // Store the currently authenticated user's ID
        ]);
        
        // Redirect with a success message after successful borrowing
        return redirect()->route('borrow')->with('success', 'Books borrowed successfully!');
    }
}

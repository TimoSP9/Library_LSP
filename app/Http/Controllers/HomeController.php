<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve all books from the database
        $books = Book::all();
    
        // Pass books to the view
        return view('HomeUser', compact('books'));
    }

    public function adminpageindex()
    {
        // Retrieve all books from the database
        $books = Book::all();
    
        // Pass books to the view
        return view('HomeAdmin', compact('books'));
    }
}

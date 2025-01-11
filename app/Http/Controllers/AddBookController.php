<?php

namespace App\Http\Controllers;

use App\Models\Book; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Import Log untuk mencatat log

class AddBookController extends Controller
{
    public function create()
    {
        return view('AddBook');
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'title' => 'required|string|max:255',
            'writer' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'year' => 'required|integer|min:1000|max:9999',
        ]);

        // Log untuk memastikan data yang akan disimpan
        Log::info('Data yang akan disimpan: ', [
            'title' => $request->input('title'),
            'writer' => $request->input('writer'),
            'genre' => $request->input('genre'),
            'year' => $request->input('year')
        ]);

        // Simpan buku ke database
        $book = Book::create([
            'title' => $request->input('title'),
            'writer' => $request->input('writer'),
            'genre' => $request->input('genre'),
            'year' => $request->input('year'),
        ]);

        // Cek jika berhasil disimpan
        if ($book) {
            // Catat log keberhasilan
            Log::info('Buku berhasil ditambahkan: ', ['book_id' => $book->id]);

            // Redirect dengan pesan sukses
            return redirect()->route('home')->with('success', 'Book added successfully');
        } else {
            // Catat log jika terjadi error
            Log::error('Gagal menambahkan buku');
            
            // Redirect dengan pesan error
            return redirect()->route('home')->with('error', 'Failed to add the book.');
        }
    }
}

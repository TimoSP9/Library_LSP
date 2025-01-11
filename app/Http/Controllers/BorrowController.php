<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    // Display the borrow form
    public function borrow()
    {
        // Fetch all books to populate the borrow form
        $books = Book::all(); // Ambil semua buku dari model Book
        $userId = auth()->id(); // Ambil ID pengguna yang login
        return view('Borrow', compact('books'));
    }

    // Store the borrow data in the database (proses peminjaman buku)
    public function store(Request $request)
    {
        // Validasi data input peminjaman
        $request->validate([
            'name'  => 'required|string', // Validasi nama peminjam
            'book1' => 'required|exists:books,title',  
            'book2' => 'nullable|exists:books,title',  
            'book3' => 'nullable|exists:books,title',  
        ]);
        
        // Simpan data peminjaman buku
        Borrow::create([
            'name' => $request->name,
            'book1' => $request->book1, 
            'book2' => $request->book2, 
            'book3' => $request->book3, 
            'user_id' => auth()->id(), // ID pengguna yang login
            'return' => 0, // Buku belum dikembalikan (default 0)
        ]);
        
        // Redirect dengan pesan sukses
        return redirect()->route('borrow')->with('success', 'Buku berhasil dipinjam!');
    }

    // Display the return form
    public function returnForm()
    {
        // Fetch all borrowers who haven't returned their books, grouped by 'name'
        $borrowers = Borrow::where('return', 0)->distinct('name')->get(); // Peminjam yang belum mengembalikan
        return view('return', compact('borrowers'));
    }

    // API to fetch borrowed books based on borrower name
    public function getBorrowedBooks($borrowerName)
    {
        // Get the borrow records where the borrower name matches and return is 0
        $borrow = Borrow::where('name', $borrowerName)->where('return', 0)->get();
        if ($borrow->count() > 0) {
            // Mapping each borrowed record
            $books = $borrow->map(function($b) {
                return [
                    'book1' => $b->book1,
                    'book2' => $b->book2,
                    'book3' => $b->book3
                ];
            });

            \Log::info('Borrowed Books:', $books->toArray());

            return $books;
        }

        return response()->json([]);
    }

    // Store the return data
    public function storeReturn(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string', // Validate borrower name instead of user_id
            'book1'    => 'required|string',
            'book2'    => 'nullable|string',
            'book3'    => 'nullable|string',
        ]);

        // Update kolom return pada borrow record
        $borrow = Borrow::where('name', $request->input('name'))->where('return', 0)->first();

        if ($borrow) {
            // Cek apakah buku yang dikembalikan cocok dengan yang dipinjam
            if (
                $borrow->book1 == $request->book1 ||
                $borrow->book2 == $request->book2 ||
                $borrow->book3 == $request->book3
            ) {
                // Update kolom return menjadi 1 (buku sudah dikembalikan)
                $borrow->update(['return' => 1]);

                // Catat log keberhasilan
                \Log::info('Buku berhasil dikembalikan: ', [
                    'borrower_name' => $borrow->name,
                    'books' => [$borrow->book1, $borrow->book2, $borrow->book3]
                ]);

                return redirect()->route('return')->with('success', 'Buku berhasil dikembalikan!');
            } else {
                return redirect()->route('return')->with('error', 'Buku yang dikembalikan tidak sesuai.');
            }
        }

        // Jika borrow tidak ditemukan
        return redirect()->route('return')->with('error', 'Gagal mengembalikan buku.');
    }
}

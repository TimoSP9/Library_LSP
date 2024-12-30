<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert dummy data using Eloquent Model
        Book::create([
            'title' => 'The Great Gatsby',
            'writer' => 'F. Scott Fitzgerald',
            'genre' => 'Fiction',
            'year' => '1925',
        ]);

        Book::create([
            'title' => '1984',
            'writer' => 'George Orwell',
            'genre' => 'Dystopian',
            'year' => '1949',
        ]);

        Book::create([
            'title' => 'To Kill a Mockingbird',
            'writer' => 'Harper Lee',
            'genre' => 'Fiction',
            'year' => '1960',
        ]);

        Book::create([
            'title' => 'Pride and Prejudice',
            'writer' => 'Jane Austen',
            'genre' => 'Romance',
            'year' => '1813',
        ]);

        Book::create([
            'title' => 'The Catcher in the Rye',
            'writer' => 'J.D. Salinger',
            'genre' => 'Fiction',
            'year' => '1951',
        ]);
    }
}

<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\AddBookController;
use App\Http\Controllers\HistoryController;


// Login and Register Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/borrow', [BorrowController::class, 'borrow'])->name('borrow');
Route::post('/borrow', [BorrowController::class, 'store'])->name('borrow.store');

Route::post('/book/store', [AddBookController::class, 'store'])->name('book.store');

// Route untuk return book form dan proses return
Route::get('/return', [BorrowController::class, 'returnForm'])->name('return');
Route::post('/return', [BorrowController::class, 'storeReturn'])->name('return.store');

Route::get('/history', [HistoryController::class, 'index'])->name('history');


// API untuk mendapatkan buku yang dipinjam oleh peminjam yang dipilih
Route::get('/get-borrowed-books/{borrowerName}', [BorrowController::class, 'getBorrowedBooks']);


Route::get('home/user', function () {
    return view('HomeUser'); // Make sure this view exists in 'resources/views/HomeUser.blade.php'
})->name('HomeUser');  // This is the correct route name for User Home

Route::get('/admin', [HomeController::class, 'adminpageindex'])->name('admin.home');

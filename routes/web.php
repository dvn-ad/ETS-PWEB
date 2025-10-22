<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Book;
use App\Http\Controllers\Admin\BookController as AdminBookController;

Route::get('/', function () {
    $books = Book::with(['author', 'publisher'])->latest()->get();
    return view('home', compact('books'));
});

Route::post('/register', [UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']); 
Route::post('/login', [UserController::class, 'login']);

// Admin-only CRUD for books
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::resource('books', AdminBookController::class)->except(['show']);
});
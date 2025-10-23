<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\AuthorController as AdminAuthorController;
use App\Http\Controllers\Admin\PublisherController as AdminPublisherController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

Route::get('/', function () {
    return view('home');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('books.public');

    Route::get('/authors', function () {
        $authors = Author::withCount('books')->latest()->get();
        return view('authors.index', compact('authors'));
    })->name('authors.public');

    Route::get('/publishers', function () {
        $publishers = Publisher::withCount('books')->latest()->get();
        return view('publishers.index', compact('publishers'));
    })->name('publishers.public');

    Route::resource('review', App\Http\Controllers\ReviewController::class)->only(['index', 'create', 'store']);
});

Route::post('/register', [UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']); 
Route::post('/login', [UserController::class, 'login']);

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::resource('books', AdminBookController::class)->except(['show']);
    Route::resource('authors', AdminAuthorController::class)->except(['show']);
    Route::resource('publishers', AdminPublisherController::class)->except(['show']);
    Route::resource('users', AdminUserController::class)->except(['show']);
});
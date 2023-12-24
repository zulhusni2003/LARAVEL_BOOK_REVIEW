<?php
// This page: Contains routes for handling web-based interactions, often associated with HTML views.

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;

// Redirect the root URL to the 'books.index' route
Route::get('/', function () {
    return redirect()->route('books.index');
});

// GET /books/{book}/reviews/create (create): Display a form to create a new review for a specific book
// POST /books/{book}/reviews (store)       : Store a new review for a specific book

// Resourceful routes for handling Book-related actions
Route::resource('books', BookController::class)
    ->only(['index', 'show']);

// Resourceful routes for handling Review-related actions scoped to a Book
Route::resource('books.reviews', ReviewController::class)
    ->scoped(['review' => 'book'])
    ->only(['create', 'store']);


    
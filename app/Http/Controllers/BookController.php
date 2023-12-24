<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve input values from the request
        $title = $request->input('title');
        $filter = $request->input('filter', '');

        // Initialize a query builder for the Book model
        $books = Book::when(
            $title,
            fn($query, $title) => $query->title($title)
        );

        // Apply filters based on the specified value of the 'filter' parameter
        $books = match ($filter) {
            'popular_last_month' => $books->popularLastMonth(),
            'popular_last_6months' => $books->popularLast6Months(),
            'highest_rated_last_month' => $books->highestRatedLastMonth(),
            'highest_rated_last_6months' => $books->highestRatedLast6Months(),
            default => $books->latest()->withAvg('reviews', 'rating')->withCount('reviews')
        };

        // Generate a cache key based on the filter and title
        $cacheKey = 'books:' . $filter . ':' . $title;

        // Retrieve books from cache if available; otherwise, execute the query and store the result in the cache for 1 hour (3600 seconds)
        $books = cache()->remember(
            $cacheKey,
            3600,
            fn() => $books->get()
        );

        // Return the 'books.index' view, passing the retrieved books to be displayed
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        // Generate a cache key based on the book's ID
        $cacheKey = 'book:' . $id;

        // Retrieve the book from cache if available; otherwise, execute the query and store the result in the cache for 1 hour (3600 seconds)
        $book = cache()->remember(
            $cacheKey,
            3600,
            fn() =>
            Book::with([
                'reviews' => fn($query) => $query->latest()
            ])->withAvg('reviews', 'rating')->withCount('reviews')->findOrFail($id)
        );

         // Return the 'books.show' view, passing the retrieved book details for display
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

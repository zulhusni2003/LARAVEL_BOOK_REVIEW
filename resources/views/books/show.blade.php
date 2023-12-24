@extends('layouts.app') <!-- Extend the 'layouts.app' layout -->

@section('content') <!-- Define the 'content' section to be filled by this view -->
  <form method="POST" action="{{ route('books.reviews.create', $book) }}" class="bg-gradient-to-r from-white to-blue-500 p-6 rounded-lg shadow-md mb-8">
    @csrf <!-- CSRF token for form submission security -->
    <h1 class="mb-4 text-3xl font-semibold text-black">{{ $book->title }}</h1>
    <div class="book-info">
      <div class="book-author mb-2 text-lg font-semibold text-black-100">by {{ $book->author }}</div>
      <div class="book-rating flex items-center">
        <div class="mr-2 text-base font-medium text-yellow-300">
          <x-star-rating :rating="$book->reviews_avg_rating" /> <!-- Display star rating component -->
        </div>
        <span class="text-sm text-black-200">
          {{ $book->reviews_count }} {{ Str::plural('review', $book->reviews_count) }}
        </span>
      </div>
    </div>

    <br> <!-- Link to add a review -->
    <a href="{{ route('books.reviews.create', $book) }}" class="custom-button mb-8">
      Add a review!
    </a> 

    <h2 class="mb-4 text-2xl font-semibold text-gray-800">Reviews</h2>
    <ul>
      @forelse ($book->reviews as $review)
        <li class="book-item mb-6 bg-white p-4 rounded shadow-md">
          <div class="flex items-center justify-between">
            <div class="font-semibold">
              <x-star-rating :rating="$review->rating" /> <!-- Display star rating component for each review -->
            </div>
            <div class="text-gray-500">
              {{ $review->created_at->format('M j, Y') }} <!-- Display the review creation date -->
            </div>
          </div>
          <p class="text-gray-700 mt-2">{{ $review->review }}</p> <!-- Display the review content -->
        </li>
      @empty
        <li class="mb-4">
          <div class="empty-book-item p-4 rounded bg-white shadow-md">
            <p class="empty-text text-lg font-semibold">No reviews yet</p>
          </div>
        </li>
      @endforelse
      <a href="{{ route('books.index') }}" class="custom-button mb-4">
        Back
      </a> <!-- Link to go back to the Books index -->
    </ul>
  </form>
@endsection <!-- End of the 'content' section -->

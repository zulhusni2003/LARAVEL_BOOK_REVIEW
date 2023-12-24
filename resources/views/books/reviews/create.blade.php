@extends('layouts.app') <!-- Extend the 'layouts.app' layout -->

@section('content') <!-- Define the 'content' section to be filled by this view -->
  <div class="flex items-center justify-center min-h-screen bg-blue-500">
    <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
      <center><h1 class="text-3xl font-semibold mb-6 text-gray-800">Add Review <br> for <br> {{ $book->title }}</h1></center>

      <form method="POST" action="{{ route('books.reviews.store', $book) }}" class="space-y-4">
        @csrf <!-- CSRF token for form submission security -->

        <div>
          <label for="review" class="block text-sm font-medium text-gray-700">Review</label>
          <textarea name="review" id="review" required class="input w-full h-32 border border-gray-300 rounded focus:outline-none focus:border-blue-500"></textarea>
        </div>

        <div>
          <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
          <select name="rating" id="rating" class="input border border-gray-300 rounded w-full focus:outline-none focus:border-blue-500" required>
          <!-- Dropdown option for selecting a rating -->
          <option value="">Select a Rating</option>
          <!-- Loop to dynamically generate rating options from 1 to 5 -->
          @for ($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
          @endfor
          </select>
        </div>

        <button type="submit" class="btn w-full bg-blue-500 hover:bg-blue-600 text-white focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">Add Review</button>
      </form>

      <div class="mt-4 text-center">
        <a href="{{ url()->previous() }}" class="text-blue-500 hover:underline">Back to Books</a>
      </div>
    </div>
  </div>
@endsection <!-- End of the 'content' section -->

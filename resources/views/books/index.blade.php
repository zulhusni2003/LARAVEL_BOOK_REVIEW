@extends('layouts.app') <!-- Extend the 'layouts.app' layout to have connection -->

@section('content') <!-- Define the 'content' section to be filled by this view -->

  <div class="min-h-screen flex items-center justify-center overflow-hidden relative">
    <!-- Video background -->
    <video autoplay muted loop class="fixed inset-0 object-cover w-full h-full">
      <source src="{{ asset('media/ocean.mp4') }}" type="video/mp4">
    </video>

    <!-- Overlay -->
    <div class="fixed inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 text-white text-center">

    <h1 class="ml10">
      <span class="text-wrapper">
        <span class="letters">Discover Amazing Books</span>
      </span>
    </h1>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

      <!-- Search form -->
      <form method="GET" action="{{ route('books.index') }}" class="mb-8 bg-gradient-to-r from-purple-600 to-indigo-600 p-8 rounded-lg shadow-md">
        <div class="flex items-center space-x-4">
          <input type="text" name="title" placeholder="Search by title" value="{{ request('title') }}" class="p-4 border border-transparent focus:outline-none focus:ring focus:border-indigo-400 rounded-md bg-white text-gray-800 placeholder-gray-500 flex-grow" />
          <button type="submit" class="py-4 px-8 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 focus:outline-none focus:ring focus:border-indigo-300 transition duration-300 ease-in-out">Search</button>
          <a href="{{ route('books.index') }}" class="py-4 px-8 bg-purple-500 text-white rounded-md hover:bg-purple-600 focus:outline-none focus:ring focus:border-purple-300 transition duration-300 ease-in-out">Clear</a>
        </div>
      </form>

      <!-- Filter buttons -->
      <div class="filter-container mb-4 flex space-x-4">
      @php
        // Define an array of filters with keys and corresponding labels
        $filters = [
          '' => 'Latest',
          'popular_last_month' => 'Popular Last Month',
          'popular_last_6months' => 'Popular Last 6 Months',
          'highest_rated_last_month' => 'Highest Rated Last Month',
          'highest_rated_last_6months' => 'Highest Rated Last 6 Months',
          ];
        @endphp
        @foreach ($filters as $key => $label)
          <!-- Loop through each filter in the defined array -->
          <a href="{{ route('books.index', [...request()->query(), 'filter' => $key]) }}"
            class="py-2 px-4 rounded-md text-white transition duration-300 ease-in-out 
               {{ request('filter') === $key || (request('filter') === null && $key === '') ? 'bg-gradient-to-r from-purple-500 to-pink-500' : 'bg-gradient-to-r from-indigo-500 to-indigo-700 hover:from-indigo-600 hover:to-indigo-800' }}">
          <!-- Generate a link for each filter with conditional styling -->
        {{ $label }} </a>
        @endforeach
      </div>

      <!-- List of books -->
      <ul class="grid gap-8">
        @forelse ($books as $book)
          <li>
            <div class="bg-white p-6 rounded-lg shadow-md">
              <a href="{{ route('books.show', $book) }}" class="text-2xl font-semibold text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out">{{ $book->title }}</a>
              <p class="text-gray-600">by {{ $book->author }}</p>
              <div class="mt-4 flex items-center justify-between">
                <div class="text-green-500 font-bold"><x-star-rating :rating="$book->reviews_avg_rating" /></div>
                <div class="text-gray-600">{{ $book->reviews_count }} {{ Str::plural('review', $book->reviews_count) }}</div>
              </div>
            </div>
          </li>
          @empty
          <li>
            <div class="bg-white p-6 rounded-lg shadow-md">
              <p class="text-2xl text-gray-800">No books found</p>
              <a href="{{ route('books.index') }}" class="text-purple-500 hover:underline">Reset criteria</a>
            </div>
          </li>
        @endforelse
      </ul>
    </div>
  </div>

  <!-- for text animation purpose -->
  <script>
  // Wrap every letter in a span
  var textWrapper = document.querySelector('.ml10 .letters');
  textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

  anime.timeline({loop: true})
    .add({
      targets: '.ml10 .letter',
      rotateY: [-90, 0],
      duration: 1300,
      delay: (el, i) => 45 * i
    }).add({
      targets: '.ml10',
      opacity: 0,
      duration: 1000,
      easing: "easeOutExpo",
      delay: 1000
    });
</script>

@endsection <!-- End of the 'content' section -->

<?php
// Purpose of this page is:
// The provided DatabaseSeeder class serves the purpose of seeding 
// your application's database with sample data.
namespace Database\Seeders;

// Import dulu
use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   // Pastikan Book di import dh diatas
        // Create 33 books, each with a random number of good reviews
        Book::factory(33)->create()->each(function ($book) {
            $numReviews = random_int(5, 30);
            Review::factory()->count($numReviews)
                ->good() // Define the reviews as good
                ->for($book) // Associate reviews with the book
                ->create();
        });

        // Create another 33 books, each with a random number of average reviews
        Book::factory(33)->create()->each(function ($book) {
            $numReviews = random_int(5, 30);
            Review::factory()->count($numReviews)
                ->average() // Define the reviews as average
                ->for($book) // Associate reviews with the book
                ->create();
        });

        // Create 34 books, each with a random number of bad reviews
        Book::factory(34)->create()->each(function ($book) {
            $numReviews = random_int(5, 30);
            Review::factory()->count($numReviews)
                ->bad() // Define the reviews as bad
                ->for($book) // Associate reviews with the book
                ->create();
        });
    }
}

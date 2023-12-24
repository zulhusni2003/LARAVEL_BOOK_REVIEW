<?php
// This page to used for generating fake data for the Book model
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Add definiton for both models
            // ni nk insert seed dalam table
            // Define default attributes for the Book model
            'title' => fake()->sentence(3), // Generate a fake title with 3 words
            'author' => fake()->name, // Generate a fake author name
            'created_at' => fake()->dateTimeBetween('-2 years'), // Generate a fake creation date within the last 2 years
            'updated_at' => fake()->dateTimeBetween('created_at', 'now') // Generate a fake update date between the creation date and now
        ];
    }
}

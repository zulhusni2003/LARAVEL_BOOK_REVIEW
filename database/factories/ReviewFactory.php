<?php
// This page to used for generating fake data for the Review model
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Define default attributes for the Review model
            // Insert seed data into the table
            'book_id' => null, // Default to null (you might want to associate it with a book later)
            'review' => fake()->paragraph, // Generate a fake review paragraph
            'rating' => fake()->numberBetween(1, 5), // Generate a fake rating between 1 and 5
            'created_at' => fake()->dateTimeBetween('-2 years'), // Generate a fake creation date within the last 2 years
            'updated_at' => fake()->dateTimeBetween('created_at', 'now') // Generate a fake update date between the creation date and now
        ];
    }

    // Generate a state method called good
    public function good()
    {
        return $this->state(function (array $attributes) {
            // Override the 'rating' attribute to be a good rating (4 or 5)
            return [
                'rating' => fake()->numberBetween(4, 5)
            ];
        });
    }

    // Generate a state method called average
    public function average()
    {
        return $this->state(function (array $attributes) {
            // Override the 'rating' attribute to be an average rating (2 to 5)
            return [
                'rating' => fake()->numberBetween(2, 5)
            ];
        });
    }

    // Generate a state method called bad
    public function bad()
    {
        return $this->state(function (array $attributes) {
            // Override the 'rating' attribute to be a bad rating (1 to 3)
            return [
                'rating' => fake()->numberBetween(1, 3)
            ];
        });
    }
}

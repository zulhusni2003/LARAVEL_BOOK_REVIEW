<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory; 

    // Specify the fillable attributes for mass assignment
    protected $fillable = ['review', 'rating'];

    // Define a relationship: a review belongs to a book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    protected static function booted()
    {
        static::updated(fn(Review $review) => cache()->forget('book:' . $review->book_id));
        static::deleted(fn(Review $review) => cache()->forget('book:' . $review->book_id));
        static::created(fn(Review $review) => cache()->forget('book:' . $review->book_id));
    }
}

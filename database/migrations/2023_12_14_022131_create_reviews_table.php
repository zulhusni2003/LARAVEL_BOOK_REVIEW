<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); //Auto increment

            //Step 1 create FK
            // $table->unsignedBigInteger('book_id'); //book_id as a foreign keys and this also defining as new columns

            // Add your data you want to put in your table here:
            $table->text('review');
            $table->unsignedTinyInteger('rating');

            $table->timestamps(); // Ni created_at & updated_at

            //Step 2 create FK
            //Define FK
            //When a book record is deleted from database, all related reviews should be removed too.
            // $table->foreign('book_id')->references('id')->on('books')
            // ->onDelete('cascade');

            // This one is simple one to create FK
            $table->foreignID('book_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

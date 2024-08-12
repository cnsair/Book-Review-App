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
            $table->id();

            $table->unsignedBigInteger('book_id'); //type 1, step 1 in creating a relation

            $table->text('review');
            $table->unsignedTinyInteger('rating');

            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade'); //type 1, step 2 in creating a relation

            //$table->foreignId('book_id')->constrained()->cascadeOnDelete(); //type 2, only step in creating a relation
        });
    }

    

    //         //$table->foreign('book_id')->references('id')->on('books')->onDelete('cascade'); //type 1, step 2 in creating a relation

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

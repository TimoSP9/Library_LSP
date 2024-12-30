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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            // Assuming 'id' is the primary key in the 'books' table
            $table->unsignedBigInteger('book1')->nullable();
            $table->unsignedBigInteger('book2')->nullable();
            $table->unsignedBigInteger('book3')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // Foreign key constraints to the 'books' table
            $table->foreign('book1')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('book2')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('book3')->references('id')->on('books')->onDelete('cascade');

            // Foreign key constraint to the 'users' table
            $table->foreign('user_id')->references('id')->on('register')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};

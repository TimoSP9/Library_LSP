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

            $table->string('name');
            // Assuming 'id' is the primary key in the 'books' table
            $table->string('book1')->nullable();
            $table->string('book2')->nullable();
            $table->string('book3')->nullable();
            $table->unsignedBigInteger('user_id');

            $table->boolean('return')->default(0);
            $table->timestamps();

            // Foreign key constraint to the 'users' table
            $table->foreign('user_id')->references('id')->on('register')->onDelete('no action');
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

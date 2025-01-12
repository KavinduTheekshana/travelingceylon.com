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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Blog title
            $table->string('slug')->unique(); // Unique URL-friendly identifier
            $table->text('content'); // Blog content
            $table->unsignedBigInteger('user_id'); // Author of the post
            $table->unsignedBigInteger('category_id')->nullable(); // Associated category
            $table->string('image')->nullable(); // Featured image URL
            $table->boolean('status')->default(1);
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

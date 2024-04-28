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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('country')->nullable();
            $table->string('number');
            $table->string('date_arrivel')->nullable();
            $table->string('date_departure')->nullable();
            $table->string('adults')->nullable();
            $table->string('children')->nullable();
            $table->string('room_single')->nullable();
            $table->string('room_double')->nullable();
            $table->longText('meal')->nullable();
            $table->longText('hotel')->nullable();
            $table->longText('holiday_type')->nullable();
            $table->longText('like_to_see')->nullable();
            $table->longText('activities')->nullable();
            $table->longText('vehicle')->nullable();
            $table->longText('note')->nullable();
            $table->boolean('read')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};

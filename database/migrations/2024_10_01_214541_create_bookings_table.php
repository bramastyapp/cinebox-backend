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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seat_id')->constrained()->cascadeOnDelete();
            $table->foreignId('room_book_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('code');
            $table->string('movie_id')->nullable();
            $table->string('date');
            $table->boolean('is_customer')->default(0);
            $table->bigInteger('tax')->nullable();
            $table->bigInteger('discount_id')->nullable();
            $table->bigInteger('total_price');
            $table->enum('status', ['waiting', 'approved', 'canceled'])->default('waiting');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

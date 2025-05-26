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
            $table->unsignedBigInteger('user_id');         // User who made the booking
            $table->unsignedBigInteger('vendor_id');       // Vendor ID (referencing the vendors table)
            $table->unsignedBigInteger('availability_id'); // ID from availabilities table
            $table->date('date');                          // Booking date
            $table->time('time_slot');                     // Time slot for the booking
            $table->text('note')->nullable();              // Optional note
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed']); // Status of the booking
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreign('availability_id')->references('id')->on('availabilities')->onDelete('cascade');
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

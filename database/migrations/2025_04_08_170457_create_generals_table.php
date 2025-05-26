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
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('office_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('office_phone')->nullable();

            // Location
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->decimal('lat', 10, 7)->nullable(); // precise lat/long
            $table->decimal('long', 10, 7)->nullable();

            // Social Media
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generals');
    }
};

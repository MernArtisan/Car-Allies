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
        Schema::create('home_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // Banner title (optional)
            $table->text('description')->nullable(); // Banner description (optional)
            $table->string('image'); // Image path or URL
            $table->string('link')->nullable(); // Optional link associated with the banner
            $table->boolean('status')->default(1); // Status: active/inactive
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_banners');
    }
};

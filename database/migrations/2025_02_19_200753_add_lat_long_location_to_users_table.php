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
        Schema::table('users', function (Blueprint $table) {
            $table->string('location')->nullable()->after('fcm_token'); // Adds location column after fcm_token
            $table->decimal('lat', 10, 7)->nullable()->after('location'); // Adds latitude column after location
            $table->decimal('long', 10, 7)->nullable()->after('lat'); // Adds longitude column after lat
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['location', 'lat', 'long']); // Removes the columns if rolled back
        });
    }
};

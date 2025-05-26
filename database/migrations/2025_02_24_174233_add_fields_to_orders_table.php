<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->string('email')->after('name');
            $table->string('phone')->after('email');
            $table->string('country')->after('phone');
            $table->string('state')->after('country');
            $table->string('city')->after('state');
            $table->string('zip')->after('city');
            $table->string('address')->after('zip');
            $table->string('company_name')->nullable()->after('address');
            $table->string('company_address')->nullable()->after('company_name');
            $table->text('order_notes')->nullable()->after('company_address');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'name', 
                'email', 
                'phone', 
                'country', 
                'state', 
                'city', 
                'zip', 
                'address', 
                'company_name', 
                'company_address', 
                'order_notes'
            ]);
        });
    }
};

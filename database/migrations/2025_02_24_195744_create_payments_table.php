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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Reference to the user making the payment
            $table->unsignedBigInteger('order_id'); // Reference to the order being paid for
            $table->unsignedBigInteger('vendor_id'); // Reference to the vendor receiving the payment
            $table->decimal('amount', 10, 2); // Amount paid
            $table->string('status')->default('pending'); // Payment status (e.g., pending, completed, failed)
            $table->string('payment_method')->nullable(); // Payment method (e.g., credit card, bank transfer)
            $table->string('transaction_id')->nullable(); // Transaction ID for reference
            $table->timestamp('paid_at')->nullable(); // When the payment was made
            $table->timestamps();

            // Foreign keys and relationships
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

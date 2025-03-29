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
            $table->id('payment_id');
            $table->unsignedBigInteger('booking_id')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->decimal('amount', 10, 2)->nullable(false);
            $table->enum('payment_method', ['UPI', 'Credit Card', 'Debit Card', 'Net Banking'])->nullable(false);
            $table->string('transaction_id')->unique()->nullable(false);
            $table->enum('status',['success','failed','pending'])->default('pending');
            $table->timestamp('payment_date')->useCurrent();
            $table->foreign('booking_id')->references('booking_id')->on('bookings')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
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

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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id('complaint_id');
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('room_id')->nullable(false);
            $table->unsignedBigInteger('owner_id')->nullable(false);
            $table->text('complaint_text')->nullable(false);
            $table->enum('status', ['pending','resolved', 'rejected'])->default('pending');
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('room_id')->references('room_id')->on('rooms')->onDelete('cascade');
            $table->foreign('owner_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};

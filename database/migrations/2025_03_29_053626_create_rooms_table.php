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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id');
            $table->unsignedBigInteger('owner_id')->nullable(false);
            $table->string('title')->nullable(false);
            $table->text('description');
            $table->decimal('price',10,2);
            $table->string('location')->nullable(false);
            $table->text('amenities');
            $table->boolean('available')->default(true);
            $table->boolean('is_verified')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('owner_id')->references('user_id')->on('users')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};

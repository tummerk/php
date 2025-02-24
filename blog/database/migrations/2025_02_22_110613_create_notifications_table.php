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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->unsignedBigInteger('people_id')->nullable();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('people_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('category_notifications');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};

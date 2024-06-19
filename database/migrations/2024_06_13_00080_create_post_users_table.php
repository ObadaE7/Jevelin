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
        Schema::create('post_users', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->enum('reaction', ['like', 'dislike'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_users');
    }
};
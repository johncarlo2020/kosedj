<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->index(['user_id'], 'user-answer');
            $table->foreign('user_id', 'user-answer')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('question_id');
            $table->index(['question_id'], 'collection-question');
            $table->foreign('question_id', 'collection-question')->references('id')->on('questions')->onDelete('restrict')->onUpdate('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};

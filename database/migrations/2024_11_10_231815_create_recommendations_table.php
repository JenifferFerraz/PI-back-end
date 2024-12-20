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
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('recommendation');
            $table->string('reason'); // Add this line for the reason column
            $table->foreignId('question_id')
                  ->constrained('questions')
                  ->onDelete('cascade');
            $table->foreignId('option_id')
                  ->constrained('options')
                  ->onDelete('cascade');
            $table->json('percentages'); // Add this line for the percentages column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};
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
        Schema::create('sobriety_answere', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sobriety_id')->nullable();
            $table->string('question')->nullable();
            $table->string('answere_one')->nullable();
            $table->string('marks_one')->nullable();
            $table->string('answere_two')->nullable();
            $table->string('marks_two')->nullable();
            $table->string('answere_three')->nullable();
            $table->string('marks_three')->nullable();
            $table->string('answere_four')->nullable();
            $table->string('marks_four')->nullable();
            $table->string('answere_five')->nullable();
            $table->string('marks_five')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sobriety_answere');
    }
};

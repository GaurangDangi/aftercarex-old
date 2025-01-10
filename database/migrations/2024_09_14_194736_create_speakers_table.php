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
        Schema::create('speakers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('institution_id')->nullable();
            $table->string('name')->nullable();
            $table->string('country_code',10)->nullable();
            $table->bigInteger('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('password')->nullable();
            $table->string('role')->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speakers');
    }
};

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
        Schema::create('verify_otp', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('institution_id')->nullable();
            $table->integer('otp')->nullable();
            $table->tinyInteger('verified')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verify_otp');
    }
};

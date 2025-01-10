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
        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('clinic_id')->nullable();
            $table->string('name')->nullable();
            $table->bigInteger('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
            $table->tinyInteger('sms_service')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client');
    }
};

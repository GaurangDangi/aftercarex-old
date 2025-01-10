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
        Schema::create('clinic', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_person')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->bigInteger('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->decimal('subscription_price', $precision = 10, $scale = 2)->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinic');
    }
};

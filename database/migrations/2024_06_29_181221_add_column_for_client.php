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
        Schema::table('client', function (Blueprint $table) {
            $table->integer('aftercare_service_length')->nullable()->after('note');
            $table->date('service_date')->nullable()->after('aftercare_service_length');
            $table->string('type')->nullable()->after('service_date');
            $table->string('category')->nullable()->after('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client', function (Blueprint $table) {
            $table->dropColumn('aftercare_service_length');
            $table->dropColumn('service_date');
            $table->dropColumn('type');
            $table->dropColumn('category');
        });
    }
};

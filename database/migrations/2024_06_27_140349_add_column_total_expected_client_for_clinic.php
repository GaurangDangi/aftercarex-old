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
        Schema::table('clinic', function (Blueprint $table) {
            $table->bigInteger('total_expected_client')->nullable()->after('status');
        });

        Schema::table('client', function (Blueprint $table) {
            $table->text('note')->nullable()->after('sms_service');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clinic', function (Blueprint $table) {
            $table->dropColumn('total_expected_client');
        });

        Schema::table('client', function (Blueprint $table) {
            $table->dropColumn('note');
        });
    }
};

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
        Schema::table('institution', function (Blueprint $table) {
            $table->string('strip_customer_id')->nullable()->after('group_counselors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('institution', function (Blueprint $table) {
            $table->dropColumn('strip_customer_id');
        });
    }
};

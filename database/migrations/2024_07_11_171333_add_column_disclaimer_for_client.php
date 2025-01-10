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
            $table->integer('disclaimer')->default(0)->after('category')->nullable();
        });

        Schema::table('templates', function (Blueprint $table) {
            $table->renameColumn('abuse', 'addiction');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client', function (Blueprint $table) {
            $table->dropColumn('disclaimer');
        });

        Schema::table('templates', function (Blueprint $table) {
            $table->renameColumn('addiction', 'abuse');
        });
    }
};

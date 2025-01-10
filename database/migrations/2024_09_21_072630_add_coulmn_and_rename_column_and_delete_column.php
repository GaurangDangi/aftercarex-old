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
        Schema::table('resource_library', function (Blueprint $table) {
            $table->dropColumn('short_description');
            $table->renameColumn('long_description', 'description');
            $table->tinyInteger('popular')->nullable()->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resource_library', function (Blueprint $table) {
            $table->text('short_description')->nullable()->after('title');
            $table->renameColumn('description', 'long_description');
            $table->dropColumn('popular');
        });
    }
};

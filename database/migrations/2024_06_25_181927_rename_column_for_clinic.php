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
            $table->renameColumn('name_of_person', 'name_of_clinic');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clinic', function (Blueprint $table) {
            $table->renameColumn('name_of_clinic', 'name_of_person');
        });
    }
};

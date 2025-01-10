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
            $table->text('institution_name')->nullable()->after('id');
            $table->text('company_website')->nullable()->after('total_expected_client');
            $table->string('radha')->nullable()->after('company_website');
            $table->string('white_label_client')->nullable()->after('radha');
            $table->string('group_counselors')->nullable()->after('white_label_client');
            $table->string('content_creation_access')->nullable()->after('group_counselors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('institution', function (Blueprint $table) {
            $table->dropColumn('institution_name');
            $table->dropColumn('company_website');
            $table->dropColumn('radha');
            $table->dropColumn('white_label_client');
            $table->dropColumn('group_counselors');
            $table->dropColumn('content_creation_access');
        });
    }
};

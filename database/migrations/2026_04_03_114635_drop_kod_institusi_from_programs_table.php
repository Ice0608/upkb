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
        if (Schema::hasColumn('programs', 'kod_institusi')) {
            Schema::table('programs', function (Blueprint $table) {
                $table->dropColumn('kod_institusi');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasColumn('programs', 'kod_institusi')) {
            Schema::table('programs', function (Blueprint $table) {
                $table->string('kod_institusi');
            });
        }
    }
};

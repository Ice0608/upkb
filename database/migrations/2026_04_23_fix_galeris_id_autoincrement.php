<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Modify the id column to be auto-increment
        DB::statement('ALTER TABLE galeris MODIFY id BIGINT UNSIGNED AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert changes if needed
        DB::statement('ALTER TABLE galeris MODIFY id BIGINT UNSIGNED NOT NULL');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $tables = [
            'institusis' => 'BIGINT UNSIGNED',
            'elauns' => 'BIGINT UNSIGNED',
            'galeris' => 'BIGINT UNSIGNED',
            'failed_jobs' => 'BIGINT UNSIGNED',
        ];

        foreach ($tables as $table => $type) {
            if (Schema::hasTable($table)) {
                DB::statement("ALTER TABLE `$table` MODIFY `id` $type NOT NULL AUTO_INCREMENT");
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = ['institusis', 'elauns', 'galeris', 'failed_jobs'];

        foreach ($tables as $table) {
            if (Schema::hasTable($table)) {
                DB::statement("ALTER TABLE `$table` MODIFY `id` BIGINT UNSIGNED NOT NULL");
            }
        }
    }
};

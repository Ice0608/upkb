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
            'yuran_pendaftarans',
            'yuran_pilihans',
            'yuran_asramas',
            'yuran_pengajians',
            'elauns',
        ];

        foreach ($tables as $table) {
            if (Schema::hasTable($table) && Schema::hasColumn($table, 'id')) {
                DB::statement("ALTER TABLE `$table` MODIFY `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT");
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'yuran_pendaftarans',
            'yuran_pilihans',
            'yuran_asramas',
            'yuran_pengajians',
            'elauns',
        ];

        foreach ($tables as $table) {
            if (Schema::hasTable($table) && Schema::hasColumn($table, 'id')) {
                DB::statement("ALTER TABLE `$table` MODIFY `id` BIGINT UNSIGNED NOT NULL");
            }
        }
    }
};

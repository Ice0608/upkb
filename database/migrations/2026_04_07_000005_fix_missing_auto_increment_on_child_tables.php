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
            'syarat_kelayakans',
            'silibuses',
            'kerjayas',
            'yuran_pendaftarans',
            'yuran_pilihans',
            'yuran_pengajians',
        ];

        foreach ($tables as $table) {
            if (Schema::hasTable($table)) {
                DB::statement("ALTER TABLE `$table` MODIFY `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY");
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'syarat_kelayakans',
            'silibuses',
            'kerjayas',
            'yuran_pendaftarans',
            'yuran_pilihans',
            'yuran_pengajians',
        ];

        foreach ($tables as $table) {
            if (Schema::hasTable($table)) {
                DB::statement("ALTER TABLE `$table` MODIFY `id` BIGINT UNSIGNED NOT NULL");
            }
        }
    }
};

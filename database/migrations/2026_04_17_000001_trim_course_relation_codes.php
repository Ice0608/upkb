<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $this->trimColumns('institusis', ['kod_institusi']);
        $this->trimColumns('kursuses', ['kod_institusi', 'kod_kursus']);
        $this->trimColumns('galeris', ['kod_institusi', 'kod_kursus']);
        $this->trimColumns('syarat_kelayakans', ['kod_institusi', 'kod_kursus']);
        $this->trimColumns('silibuses', ['kod_institusi', 'kod_kursus']);
        $this->trimColumns('kerjayas', ['kod_institusi', 'kod_kursus']);
        $this->trimColumns('yuran_pendaftarans', ['kod_institusi', 'kod_kursus']);
        $this->trimColumns('yuran_pilihans', ['kod_institusi', 'kod_kursus']);
        $this->trimColumns('yuran_asramas', ['kod_institusi', 'kod_kursus']);
        $this->trimColumns('yuran_pengajians', ['kod_institusi', 'kod_kursus']);
        $this->trimColumns('elauns', ['kod_institusi', 'kod_kursus']);
        $this->trimColumns('pelajar', ['kod_institusi', 'kod_kursus']);
    }

    public function down(): void
    {
        // Trimming existing whitespace is irreversible.
    }

    private function trimColumns(string $table, array $columns): void
    {
        if (! Schema::hasTable($table)) {
            return;
        }

        $assignments = [];

        foreach ($columns as $column) {
            if (Schema::hasColumn($table, $column)) {
                $assignments[] = sprintf('`%s` = TRIM(`%s`)', $column, $column);
            }
        }

        if ($assignments === []) {
            return;
        }

        DB::statement(sprintf('UPDATE `%s` SET %s', $table, implode(', ', $assignments)));
    }
};
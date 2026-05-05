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
        if (Schema::hasTable('pembayaran')) {
            DB::statement('ALTER TABLE `pembayaran` MODIFY `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('pembayaran')) {
            DB::statement('ALTER TABLE `pembayaran` MODIFY `id` BIGINT UNSIGNED NOT NULL');
        }
    }
};

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
        Schema::table('galeris', function (Blueprint $table) {
            $table->string('penerangan')->nullable()->after('imej');
            $table->dropColumn('kod_khusus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            if (Schema::hasColumn('galeris', 'penerangan')) {
                $table->dropColumn('penerangan');
            }
            $table->string('kod_khusus')->nullable()->after('imej');
        });
    }
};

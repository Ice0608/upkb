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
        Schema::table('syarat_kelayakans', function (Blueprint $table) {
            if (Schema::hasColumn('syarat_kelayakans', 'syarat_kelayakan')) {
                $table->dropColumn('syarat_kelayakan');
            }
        });

        Schema::table('kerjayas', function (Blueprint $table) {
            if (Schema::hasColumn('kerjayas', 'bidang_kerjaya')) {
                $table->dropColumn('bidang_kerjaya');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('syarat_kelayakans', function (Blueprint $table) {
            if (! Schema::hasColumn('syarat_kelayakans', 'syarat_kelayakan')) {
                $table->text('syarat_kelayakan')->nullable()->after('kod_kursus');
            }
        });

        Schema::table('kerjayas', function (Blueprint $table) {
            if (! Schema::hasColumn('kerjayas', 'bidang_kerjaya')) {
                $table->string('bidang_kerjaya')->nullable()->after('kod_kursus');
            }
        });
    }
};

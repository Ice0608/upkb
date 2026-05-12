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
            if (! Schema::hasColumn('syarat_kelayakans', 'gambar')) {
                $table->string('gambar')->nullable()->after('syarat_kelayakan');
            }
        });

        Schema::table('kerjayas', function (Blueprint $table) {
            if (! Schema::hasColumn('kerjayas', 'gambar')) {
                $table->string('gambar')->nullable()->after('bidang_kerjaya');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('syarat_kelayakans', function (Blueprint $table) {
            if (Schema::hasColumn('syarat_kelayakans', 'gambar')) {
                $table->dropColumn('gambar');
            }
        });

        Schema::table('kerjayas', function (Blueprint $table) {
            if (Schema::hasColumn('kerjayas', 'gambar')) {
                $table->dropColumn('gambar');
            }
        });
    }
};

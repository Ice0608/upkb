<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('institusis', function (Blueprint $table) {
            $table->string('jenis_institusi')->nullable()->after('nama_institusi');
            $table->string('gambar_institusi')->nullable()->after('jenis_institusi');
        });

        DB::table('institusis')
            ->whereNotNull('jenis_program')
            ->update(['jenis_institusi' => DB::raw('jenis_program')]);

        Schema::table('institusis', function (Blueprint $table) {
            if (Schema::hasColumn('institusis', 'jenis_program')) {
                $table->dropColumn('jenis_program');
            }
            if (Schema::hasColumn('institusis', 'kod_khusus')) {
                $table->dropColumn('kod_khusus');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('institusis', function (Blueprint $table) {
            if (!Schema::hasColumn('institusis', 'jenis_program')) {
                $table->string('jenis_program')->nullable()->after('nama_institusi');
            }
            if (!Schema::hasColumn('institusis', 'kod_khusus')) {
                $table->string('kod_khusus')->nullable()->after('mengenai_institusi');
            }
            if (Schema::hasColumn('institusis', 'jenis_institusi')) {
                $table->dropColumn('jenis_institusi');
            }
            if (Schema::hasColumn('institusis', 'gambar_institusi')) {
                $table->dropColumn('gambar_institusi');
            }
        });
    }
};

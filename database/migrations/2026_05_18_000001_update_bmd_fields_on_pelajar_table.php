<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $oldColumns = array_filter(
            ['status_perkahwinan', 'spm_credit', 'pekerjaan_bapa', 'pendapatan_bapa', 'pekerjaan_ibu', 'pendapatan_ibu'],
            fn (string $column) => Schema::hasColumn('pelajar', $column)
        );

        if ($oldColumns !== []) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->dropColumn($oldColumns));
        }

        if (! Schema::hasColumn('pelajar', 'email_ibubapa')) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->string('email_ibubapa')->nullable()->after('no_tel_ibu'));
        }

        if (! Schema::hasColumn('pelajar', 'str')) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->boolean('str')->default(false)->after('jumlah_tanggungan'));
        }
    }

    public function down(): void
    {
        $newColumns = array_filter(
            ['email_ibubapa', 'str'],
            fn (string $column) => Schema::hasColumn('pelajar', $column)
        );

        if ($newColumns !== []) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->dropColumn($newColumns));
        }

        if (! Schema::hasColumn('pelajar', 'status_perkahwinan')) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->enum('status_perkahwinan', ['Bujang', 'Berkahwin', 'Duda', 'Balu/Janda/Ibu Tunggal'])->nullable()->after('program'));
        }

        if (! Schema::hasColumn('pelajar', 'spm_credit')) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->double('spm_credit')->nullable()->after('ic_pelajar'));
        }

        if (! Schema::hasColumn('pelajar', 'pekerjaan_bapa')) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->string('pekerjaan_bapa')->nullable()->after('no_tel_bapa'));
        }

        if (! Schema::hasColumn('pelajar', 'pendapatan_bapa')) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->string('pendapatan_bapa')->nullable()->after('pekerjaan_bapa'));
        }

        if (! Schema::hasColumn('pelajar', 'pekerjaan_ibu')) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->string('pekerjaan_ibu')->nullable()->after('no_tel_ibu'));
        }

        if (! Schema::hasColumn('pelajar', 'pendapatan_ibu')) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->string('pendapatan_ibu')->nullable()->after('pekerjaan_ibu'));
        }
    }
};

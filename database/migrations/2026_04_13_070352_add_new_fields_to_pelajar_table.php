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
        if (! Schema::hasColumn('pelajar', 'noreff')) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->string('noreff')->nullable()->after('id'));
        }

        if (! Schema::hasColumn('pelajar', 'program')) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->enum('program', ['Diploma', 'TVET', 'Sains Kesihatan'])->nullable()->after('noreff'));
        }

        if (! Schema::hasColumn('pelajar', 'email_ibubapa')) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->string('email_ibubapa')->nullable()->after('no_tel_ibu'));
        }

        if (! Schema::hasColumn('pelajar', 'str')) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->boolean('str')->default(false)->after('jumlah_tanggungan'));
        }

        if (! Schema::hasColumn('pelajar', 'pilihan_pertama')) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->string('pilihan_pertama')->nullable()->after('str'));
        }

        if (! Schema::hasColumn('pelajar', 'pilihan_kedua')) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->string('pilihan_kedua')->nullable()->after('pilihan_pertama'));
        }

        if (! Schema::hasColumn('pelajar', 'pilihan_ketiga')) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->string('pilihan_ketiga')->nullable()->after('pilihan_kedua'));
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $columns = array_filter(
            ['noreff', 'program', 'email_ibubapa', 'str', 'pilihan_pertama', 'pilihan_kedua', 'pilihan_ketiga'],
            fn (string $column) => Schema::hasColumn('pelajar', $column)
        );

        if ($columns !== []) {
            Schema::table('pelajar', fn (Blueprint $table) => $table->dropColumn($columns));
        }
    }
};

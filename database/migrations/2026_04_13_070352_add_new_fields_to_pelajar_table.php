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
        Schema::table('pelajar', function (Blueprint $table) {
            $table->string('noreff')->nullable()->after('id');
            $table->enum('program', ['Diploma', 'TVET', 'Sains Kesihatan'])->nullable()->after('noreff');
            $table->enum('status_perkahwinan', ['Bujang', 'Berkahwin', 'Duda', 'Balu/Janda/Ibu Tunggal'])->nullable()->after('program');
            $table->double('spm_credit')->nullable()->after('ic_pelajar');
            $table->string('pekerjaan_bapa')->nullable()->after('no_tel_bapa');
            $table->string('pekerjaan_ibu')->nullable()->after('no_tel_ibu');
            $table->string('pilihan_pertama')->nullable()->after('jumlah_tanggungan');
            $table->string('pilihan_kedua')->nullable()->after('pilihan_pertama');
            $table->string('pilihan_ketiga')->nullable()->after('pilihan_kedua');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelajar', function (Blueprint $table) {
            $table->dropColumn(['noreff', 'program', 'status_perkahwinan', 'spm_credit', 'pekerjaan_bapa', 'pekerjaan_ibu', 'pilihan_pertama', 'pilihan_kedua', 'pilihan_ketiga']);
        });
    }
};

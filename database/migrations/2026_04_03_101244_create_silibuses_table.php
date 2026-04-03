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
        Schema::create('silibuses', function (Blueprint $table) {
            $table->id();
            $table->string('kod_institusi');
            $table->string('kod_khusus');
            $table->string('topik');
            $table->text('isi_kandungan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('silibuses');
    }
};

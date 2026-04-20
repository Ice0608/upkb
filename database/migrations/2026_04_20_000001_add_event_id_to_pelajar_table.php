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
        if (Schema::hasColumn('pelajar', 'event_id')) {
            return;
        }

        Schema::table('pelajar', function (Blueprint $table) {
            $table->foreignId('event_id')->nullable()->after('pilihan_ketiga')->constrained('event')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasColumn('pelajar', 'event_id')) {
            return;
        }

        Schema::table('pelajar', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
            $table->dropColumn('event_id');
        });
    }
};
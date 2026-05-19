<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pelajar', function (Blueprint $table) {
            // Add new email fields
            if (! Schema::hasColumn('pelajar', 'email_bapa')) {
                $table->string('email_bapa')->nullable()->after('no_tel_bapa');
            }
            if (! Schema::hasColumn('pelajar', 'email_ibu')) {
                $table->string('email_ibu')->nullable()->after('no_tel_ibu');
            }
            
            // Drop old combined field if it exists
            if (Schema::hasColumn('pelajar', 'email_ibubapa')) {
                $table->dropColumn('email_ibubapa');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pelajar', function (Blueprint $table) {
            // Recreate old field
            if (! Schema::hasColumn('pelajar', 'email_ibubapa')) {
                $table->string('email_ibubapa')->nullable()->after('no_tel_ibu');
            }
            
            // Drop new fields
            if (Schema::hasColumn('pelajar', 'email_bapa')) {
                $table->dropColumn('email_bapa');
            }
            if (Schema::hasColumn('pelajar', 'email_ibu')) {
                $table->dropColumn('email_ibu');
            }
        });
    }
};

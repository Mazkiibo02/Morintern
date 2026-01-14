<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {
            // Rename columns
            $table->renameColumn('feedback', 'kritik_saran');
            $table->renameColumn('file_penilaian', 'file_path');
            $table->renameColumn('user_id', 'created_by');

            // Drop unwanted columns
            $table->dropColumn(['nilai_angka', 'rubrik_skor']);
        });
    }

    public function down(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {
            // Rename columns back
            $table->renameColumn('kritik_saran', 'feedback');
            $table->renameColumn('file_path', 'file_penilaian');
            $table->renameColumn('created_by', 'user_id');

            // Add back old columns
            $table->integer('nilai_angka')->nullable();
            $table->json('rubrik_skor')->nullable();
        });
    }
};

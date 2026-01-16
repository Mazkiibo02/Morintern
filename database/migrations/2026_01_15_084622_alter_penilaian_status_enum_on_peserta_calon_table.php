<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE peserta_calon MODIFY COLUMN penilaian_status ENUM('pending', 'lulus', 'tidak_lulus') NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE peserta_calon MODIFY COLUMN penilaian_status ENUM('Lulus', 'Tidak Lulus') NULL");
    }
};

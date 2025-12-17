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
        Schema::table('pesertas', function (Blueprint $table) {
            // Kita tambah kolom status dulu kalau belum ada
            if (!Schema::hasColumn('pesertas', 'status')) {
                $table->enum('status', ['peserta', 'selesai', 'dropout'])->default('peserta')->after('id');
            }

            // Tambah kolom penilaian tanpa ketergantungan kolom 'status'
            $table->text('kritik_saran')->nullable();
            $table->string('file_penilaian')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesertas', function (Blueprint $table) {
            //
        });
    }
};

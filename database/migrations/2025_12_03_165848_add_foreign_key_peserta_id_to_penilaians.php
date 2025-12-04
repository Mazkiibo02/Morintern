<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {
            // Cek dulu kalau FK belum ada
            if (!Schema::hasColumn('penilaians', 'peserta_id')) {
                $table->foreignId('peserta_id')->nullable()->after('id');
            }

            // Tambah FK + index hanya kalau belum ada
            $table->foreign('peserta_id')
                  ->references('id')
                  ->on('pesertas')
                  ->onDelete('cascade');
                  
            $table->index('peserta_id');
        });
    }

    public function down(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {
            $table->dropForeign(['peserta_id']);
            $table->dropIndex(['peserta_id']);
            $table->dropColumn('peserta_id');
        });
    }
};
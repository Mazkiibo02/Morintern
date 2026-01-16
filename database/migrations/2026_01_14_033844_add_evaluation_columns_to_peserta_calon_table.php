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
        Schema::table('peserta_calon', function (Blueprint $table) {
            if (!Schema::hasColumn('peserta_calon', 'penilaian_status')) {
                $table->enum('penilaian_status', ['pending', 'lulus', 'tidak_lulus'])->nullable()->after('status');
            }
            if (!Schema::hasColumn('peserta_calon', 'kritik_saran')) {
                $table->text('kritik_saran')->nullable()->after('penilaian_status');
            }
            if (!Schema::hasColumn('peserta_calon', 'file_penilaian')) {
                $table->string('file_penilaian')->nullable()->after('kritik_saran');
            }
            if (!Schema::hasColumn('peserta_calon', 'dinilai_oleh')) {
                $table->foreignId('dinilai_oleh')->nullable()->constrained('users')->onDelete('set null')->after('file_penilaian');
            }
            if (!Schema::hasColumn('peserta_calon', 'dinilai_pada')) {
                $table->timestamp('dinilai_pada')->nullable()->after('dinilai_oleh');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peserta_calon', function (Blueprint $table) {
            if (Schema::hasColumn('peserta_calon', 'dinilai_pada')) {
                $table->dropColumn('dinilai_pada');
            }
            if (Schema::hasColumn('peserta_calon', 'dinilai_oleh')) {
                $table->dropForeign(['dinilai_oleh']);
                $table->dropColumn('dinilai_oleh');
            }
            if (Schema::hasColumn('peserta_calon', 'file_penilaian')) {
                $table->dropColumn('file_penilaian');
            }
            if (Schema::hasColumn('peserta_calon', 'kritik_saran')) {
                $table->dropColumn('kritik_saran');
            }
            if (Schema::hasColumn('peserta_calon', 'penilaian_status')) {
                $table->dropColumn('penilaian_status');
            }
        });
    }
};

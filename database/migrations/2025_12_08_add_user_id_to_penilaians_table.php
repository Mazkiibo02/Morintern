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
        // Make migration idempotent: only add column/index/foreign if it doesn't exist yet
        if (!Schema::hasColumn('penilaians', 'user_id')) {
            Schema::table('penilaians', function (Blueprint $table) {
                // Tambah kolom user_id untuk mencatat mentor/admin yang memberikan penilaian
                $table->foreignId('user_id')->nullable()->after('peserta_id');

                // Tambah foreign key
                $table->foreign('user_id')
                      ->references('id')
                      ->on('users')
                      ->onDelete('set null');

                // Tambah index untuk performa
                $table->index('user_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropIndex(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
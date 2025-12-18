<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('pesertas')) {
            return;
        }

        Schema::table('pesertas', function (Blueprint $table) {
            if (!Schema::hasColumn('pesertas', 'status')) {
                $table->enum('status', [
                    'pendaftar',
                    'menunggu',
                    'mendaftar',
                    'diterima',
                    'ditolak',
                ])->default('pendaftar')->after('id');
            }
        });
    }

    public function down(): void
    {
        if (!Schema::hasTable('pesertas')) {
            return;
        }

        Schema::table('pesertas', function (Blueprint $table) {
            if (Schema::hasColumn('pesertas', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};

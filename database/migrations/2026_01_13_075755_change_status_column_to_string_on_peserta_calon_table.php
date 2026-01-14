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
        if (!Schema::hasTable('peserta_calon')) {
            return;
        }

        // Check if status column exists
        if (!Schema::hasColumn('peserta_calon', 'status')) {
            // Add status column if it doesn't exist
            Schema::table('peserta_calon', function (Blueprint $table) {
                $table->string('status', 20)->default('pendaftar')->after('email');
            });
        } else {
            // Modify existing status column from ENUM to VARCHAR
            // First, update any existing values that might not match our new values
            DB::table('peserta_calon')
                ->whereIn('status', ['diterima', 'accepted'])
                ->update(['status' => 'peserta']);
            
            DB::table('peserta_calon')
                ->whereIn('status', ['rejected', 'menunggu', 'mendaftar'])
                ->update(['status' => 'ditolak']);
            
            // Now change the column type
            Schema::table('peserta_calon', function (Blueprint $table) {
                $table->string('status', 20)->default('pendaftar')->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!Schema::hasTable('peserta_calon')) {
            return;
        }

        // Revert back to enum if needed (not recommended)
        // For safety, we'll just leave it as string in rollback
    }
};

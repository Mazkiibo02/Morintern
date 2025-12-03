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
        Schema::table('penilaians', function (Blueprint $table) {
            $table->foreignId('peserta_id')->nullable()->constrained('pesertas')->onDelete('cascade')->after('id');
        });
        
        // Sync enum status di pesertas
        DB::statement("ALTER TABLE pesertas MODIFY COLUMN status ENUM('aktif', 'selesai', 'dropout') DEFAULT 'aktif'");
        
        // Update data lama (kalau ada 'diterima' dari promosi)
        DB::statement("UPDATE pesertas SET status = 'aktif' WHERE status = 'diterima'");
    }
};

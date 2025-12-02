<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Laravel cuma cek apakah tabel ada, nggak ubah apa-apa
        Schema::table('peserta_calon', function ($table) {
            // kosongin aja, biar nggak error duplicate column
        });
    }
    public function down(): void { Schema::dropIfExists('peserta_calon'); }
};
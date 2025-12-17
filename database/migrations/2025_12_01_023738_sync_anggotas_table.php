<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('anggotas', function ($table) {
            // kosongin aja
        });
    }
    public function down(): void { Schema::dropIfExists('anggotas'); }
};
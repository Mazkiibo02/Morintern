<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('postingan_magangs', function (Blueprint $table) {
            $table->string('durasi')->after('deskripsi');
        });
    }

    
    public function down(): void
    {
        Schema::table('postingan_magangs', function (Blueprint $table) {
            $table->dropColumn('durasi');
        });
    }
};

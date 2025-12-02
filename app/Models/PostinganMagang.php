<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostinganMagang extends Model
{
    protected $table = 'postingan_magangs';

    protected $fillable = ['judul_posisi', 'deskripsi', 'kuota', 'durasi', 'spesialisasi_id'];

    public function spesialisasi()
    {
        return $this->belongsTo(Spesialisasi::class);
    }
}
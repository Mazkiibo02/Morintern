<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggotas';

    protected $fillable = [
        'ketua_id', 'kelompok_id', 'nama_lengkap', 'email', 'no_telp',
        'github', 'linkedin', 'spesialisasi_id'
    ];

    public function ketua()
    {
        return $this->belongsTo(PesertaCalon::class, 'ketua_id');
    }

    public function spesialisasi()
    {
        return $this->belongsTo(Spesialisasi::class);
    }
}
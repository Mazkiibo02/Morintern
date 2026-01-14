<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penilaian extends Model
{
    protected $table = 'penilaians';

    protected $fillable = [
        'peserta_calon_id',
        'kritik_saran',
        'file_path',
        'created_by',
    ];

    /**
     * Relasi ke PesertaCalon
     */
    public function pesertaCalon(): BelongsTo
    {
        return $this->belongsTo(PesertaCalon::class, 'peserta_calon_id');
    }

    /**
     * Relasi ke User sebagai creator
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
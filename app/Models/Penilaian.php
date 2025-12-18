<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penilaian extends Model
{
    protected $table = 'penilaians';

    protected $fillable = [
        'peserta_id',
        'user_id',
        'nama',
        'nilai_rata_rata',
        'masukan',
        'file_penilaian',
    ];

    protected $casts = [
        'nilai_rata_rata' => 'decimal:2',
    ];

    /**
     * Relasi ke Peserta (active intern)
     */
    public function peserta(): BelongsTo
    {
        return $this->belongsTo(Peserta::class);
    }

    /**
     * Relasi ke User (mentor/admin)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    protected $fillable = [
        'tipe_status',
        'nama_status',
    ];

    /**
     * Relasi ke Peserta
     */
    public function pesertas(): HasMany
    {
        return $this->hasMany(Peserta::class);
    }

    /**
     * Relasi ke PesertaCalon
     */
    public function pesertaCalons(): HasMany
    {
        return $this->hasMany(PesertaCalon::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spesialisasi extends Model
{
    use SoftDeletes;

    protected $table = 'spesialisasis';  // INI YANG WAJIB ADA!

    protected $fillable = [
        'nama_spesialisasi',
        'deskripsi'
    ];

    public function pesertaCalons()
    {
        return $this->hasMany(PesertaCalon::class);
    }

    public function postinganMagangs()
    {
        return $this->hasMany(PostinganMagang::class);
    }
}